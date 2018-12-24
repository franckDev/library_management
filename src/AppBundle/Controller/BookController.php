<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Book controller.
 *
 * @Route("book")
 */
class BookController extends Controller
{

    /**
     * 
     * Profil administrateur => Liste des livres d'un utilisateur
     *
     * @Route("/{user_id}", name="user_book_list")
     * @Method("GET")
     */
    public function indexUserAction($user_id)
    {
        // Role de l'utilisateur
        $role = $this->getUser()->getRoles()[0];
        
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('AppBundle:User')->find($user_id);
        
        $username = $user->getUsername();
        
        $books = $user->getBooks()->ToArray();

        return $this->render('book/index.html.twig', array(
            'books' => $books,
            'user_name' => $username,
            'user_id' => $user_id,
            'role' => $role,
        ));
    }

    /**
     * Profil administrateur création d'un nouveau livre pour un utilisateur
     *
     * @Route("/new/{user_id}", name="book_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $user_id)
    {
        $book = new Book();
        
        $form = $this->createForm('AppBundle\Form\BookType', $book);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            // On récupère l'utilisateur
            $em = $this->getDoctrine()->getManager();
            
            $user = $em->getRepository('AppBundle:User')->find($user_id);
            
            // On récupère le fichier
            $file = $request->files->get("appbundle_book")["encryptName"];
            
            // On génère un nom unique pour ce fichier 
            $filename = md5(uniqid()).'.'.$file->getClientOriginalExtension();
            
            // On déplace ensuite le fichier dans le dossier prévu à cet effet
            $file->move(
                $this->container->getParameter('multimedias_directory'),
                $filename
            );
            
            // On enregistre le nom crypté
            $book->setEncryptName($filename);
            
            // On enregistre l'utilisateur
            $book->setUser($user);
            
            $em->persist($book);
            
            $em->flush();
            
            // Profil pour redirection
            $role = $this->getUser()->getRoles()[0];
            
            if($role == "ROLE_ADMIN")
                return $this->redirectToRoute('user_book_list', array('user_id' => $user->getId()));
            else
                return $this->redirectToRoute('users');
        }

        return $this->render('book/new.html.twig', array(
            'book' => $book,
            'form' => $form->createView(),
            'user_id' => $user_id,
        ));
    }

    /**
     * Profil administrateur => Modification d'un livre de n'importe lequel utilisateur
     * Profil utilisateur => Modification d'un de ses propres livres
     *
     * @Route("/{id}/edit", name="book_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Book $book)
    {
        $editForm = $this->createForm('AppBundle\Form\BookType', $book, array('attr'=> array('novalidate'=>'novalidate')));
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('users');
        }

        return $this->render('book/edit.html.twig', array(
            'book' => $book,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Administrateur => Suppression d'un livre de n'importe lequel utilisateur
     * Utilisateur => Suppression d'un de ses propres livres
     *
     * @Route("/del/{id}", name="book_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Book $book)
    {
        $form = $this->createDeleteForm($book);
        $form->handleRequest($request);
        
        // Si on reçoit une requête Ajax
        if($request->isXMLHttpRequest())
        {
            // On récupère l'id du livre à supprimer
            $id = $book->getId();
            
            // On récupère le nom du fichier
            $filename = $book->getEncryptName();
            
            if($id != "")
            {
                $em = $this->getDoctrine()->getManager();
                
                // On récupére les infos du livre
                $user = $em->getRepository('AppBundle:Book')->find($id);
                
                // On le supprime
                $em->remove($user);
                
                // On instancie un objet fichier system
                $fs = new Filesystem();
                
                // On définit le chemin de la suppression du fichier
                $path = $this->container->getParameter('multimedias_directory')."/".$filename;
                
                // On supprime le fichier
                $fs->remove($path);   
                
                $em->flush();
                
                $message = "Suppression effectuée avec succès !";

            }else{
                
                $message = "Impossible de récupérer l'identifiant du livre à supprimer !";
                
            }
            
            // Puis on le renvoie dans un tableau en Json
            return new JsonResponse(array('msg' => json_encode($message)));

        }
        
        // // Puis on le renvoie dans un tableau en Json
        return new Response("Erreur : Ce n'est pas une requête Ajax", 400);
    }
    
    /**
     * Création d'un formulaire de suppression de livre
     *
     * @param Book $book Entité livre
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Book $book)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('book_delete', array('id' => $book->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

}
