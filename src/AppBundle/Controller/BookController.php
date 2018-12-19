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
     * Lists all book entities.
     *
     * @Route("/", name="book_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $books = $em->getRepository('AppBundle:Book')->findAll();

        return $this->render('book/index.html.twig', array(
            'books' => $books,
        ));
    }

    /**
     * Creates a new book entity.
     *
     * @Route("/new", name="book_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $book = new Book();
        
        $form = $this->createForm('AppBundle\Form\BookType', $book);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            // On récupère l'utilisateur
            $user = $this->getUser();
            
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
            
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($book);
            
            $em->flush();

            return $this->redirectToRoute('users');
        }

        return $this->render('book/new.html.twig', array(
            'book' => $book,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a book entity.
     *
     * @Route("/{id}", name="book_show")
     * @Method("GET")
     */
    public function showAction(Book $book)
    {
        $deleteForm = $this->createDeleteForm($book);

        return $this->render('book/show.html.twig', array(
            'book' => $book,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing book entity.
     *
     * @Route("/{id}/edit", name="book_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Book $book)
    {
        $deleteForm = $this->createDeleteForm($book);
        $editForm = $this->createForm('AppBundle\Form\BookType', $book);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('book_edit', array('id' => $book->getId()));
        }

        return $this->render('book/edit.html.twig', array(
            'book' => $book,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a book entity.
     *
     * @Route("book/del/{id}", name="book_delete")
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
     * Creates a form to delete a book entity.
     *
     * @param Book $book The book entity
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
