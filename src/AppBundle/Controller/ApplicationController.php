<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApplicationController extends Controller
{
    /**
     * Aucun profil page d'accueil du site
     * 
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // On charge la liste des livres 
        $em = $this->getDoctrine()->getManager();
        
        $books = $em->getRepository('AppBundle:Book')->findAll();
        
        if(count($books) > 0){
            
            $array_book = array();
            $nb_book = 0;
            
            // On créé un tableau de livre
            foreach ($books as $book) {
                
                array_push($array_book, $book);
                
            }
            
            // On génère un nombre aléatoire
            $nb_book = rand(0,count($array_book)-1);
            
            // Puis on récupère le nom du livre correspondant
            $book_name = $array_book[$nb_book]->getEncryptName();
            
            // Avec sa description et son titre
            $book_title = $array_book[$nb_book]->getTitle();
            $book_description = $array_book[$nb_book]->getShortDescription();  
            
        }else{
            
            $book_name = "Accueil_book.pdf";
            $book_title = "Titre du fichier PDF";
            $book_description = "Description du fichier PDF";
            
        }
        
        // Page d'accueil du site
        return $this->render('library/accueil.html.twig', array(
            'name' => $book_name,
            'title' => $book_title,
            'description' => $book_description,
        ));
        
    }
    
    /**
     * Profil administrateur ou utilisateur edition du profil 
     * 
     * @Route("/{id}/edit", name="user_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, User $user)
    {
        
        $editForm = $this->createForm('AppBundle\Form\UserType', $user);
        
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('users');
        }

        return $this->render('library/users/user/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
        ));
        
    }
    
    /**
     * Profil administrateur création d'un nouvel utilisateur
     *
     * @Route("/new", name="user_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        
        // Contrôle du profil
        $role = $this->getUser()->getRoles()[0];
        
        if($role == "ROLE_ADMIN"){
            
            $user = new User();
            
            $form = $this->createForm('AppBundle\Form\UserType', $user);
            
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
    
                return $this->redirectToRoute('users', array('id' => $user->getId()));
            }
    
            return $this->render('library/users/admin/new.html.twig', array(
                'user' => $user,
                'form' => $form->createView(),
            ));         
            
        }else{
            
            // Redirection vers l'accueil
            return new RedirectResponse($this->generateUrl('homepage'));
            
        }
        
    }
    
    /**
     * Profil administrateur => Liste des utilisateurs
     * Profil utilisateur => Liste des livres
     * 
     * @Route("/users", name="users")
     */
    public function userAction(Request $request)
    {
        
        // Aucun utilisateur de connecté
        if(empty($this->getUser()))
            return new RedirectResponse($this->generateUrl('homepage'));
        
        // Role de l'utilisateur
        $role = $this->getUser()->getRoles()[0];
        
 
        if($role == "ROLE_ADMIN")
        {
            $em = $this->getDoctrine()->getManager();

            $users = $em->getRepository('AppBundle:User')->findAll();
            
            // Page d'accueil de l'administrateur
            return $this->render('library/users/admin/index.html.twig', array(
                'users' => $users,
                'role' => $role,
            ));
            
        }
        elseif($role == "ROLE_USER")
        {
            
            // Utilisateur
            $user = $this->getUser();
            
            $user_id = $user->getId();
            
            $username = $user->getUsername();

            $books = $user->getBooks();
            
            // Page d'accueil de l'utilisateur lambda
            return $this->render('book/index.html.twig', array(
                'books' => $books,
                'user_name' => $username,
                'role' => $role,
                'user_id' => $user_id,
            ));
            
        }
    }
    
    
    /**
     * Profil administrateur suppression d'un utilisateur (Ajax)
     * 
     * @Route("/delete/{id}", name="user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, User $user)
    {
        // Si on reçoit une requête Ajax
        if($request->isXMLHttpRequest())
        {
            // On récupère l'id de l'utilisateur à supprimer
            $id = $request->get('id');
            
            if($id != "")
            {
                $em = $this->getDoctrine()->getManager();
                
                // On récupére les infos de l'utilisateur
                $user = $em->getRepository('AppBundle:User')->find($id);
                
                // On le supprime
                $em->remove($user);
                
                $em->flush();
                
                $message = "Suppression effectuée avec succès !";

            }else{
                
                $message = "Impossible de récupérer l'identifiant de l'utilisateur à supprimer !";
                
            }

        }

        // Puis on le renvoie dans un tableau en Json
        return new JsonResponse(array('msg' => json_encode($message, JSON_UNESCAPED_UNICODE)));
    }

    /**
     * Profil administrateur ou utilisateur (Ajax)
     * 
     * @Route("/controleL/{login}", name="user_login")
     * @Method("POST")
     */
    public function controleLoginAction(Request $request)
    {
        // Si on reçoit une requête Ajax
        if($request->isXMLHttpRequest())
        {
            // On récupère le login de l'utilisateur à controler
            $login = $request->get('login');
            
            if($login != "")
            {
                $em = $this->getDoctrine()->getManager();
                
                // On vérifie l'existence du login
                $user = $em->getRepository('AppBundle:User')->findOneBy(['username' => $login]);

                if(count($user) > 0)
                    $message = 0;
                else
                    $message = 1;

            }else{
                
                $message = "Vous devez saisir un nom d'utilisateur !";
                
            }

        }

        // Puis on le renvoie dans un tableau en Json
        return new JsonResponse(array('msg' => json_encode($message, JSON_UNESCAPED_UNICODE)));

    }

    /**
     * Profil administrateur ou utilisateur (Ajax)
     * 
     * @Route("/controleM/{mail}", name="user_email")
     * @Method("POST")
     */
    public function controleMailAction(Request $request)
    {
        // Si on reçoit une requête Ajax
        if($request->isXMLHttpRequest())
        {
            // On récupère le mail de l'utilisateur à controler
            $mail = $request->get('email');
            
            if($mail != "")
            {
                $em = $this->getDoctrine()->getManager();
                
                // On vérifie l'existence de l'adresse mail
                $user = $em->getRepository('AppBundle:User')->findOneBy(['email' => $mail]);

                if(count($user) > 0)
                    $message = 0;
                else
                    $message = 1;

            }else{
                
                $message = "Vous devez saisir une adresse mail !";
                
            }

        }

        // Puis on le renvoie dans un tableau en Json
        return new JsonResponse(array('msg' => json_encode($message, JSON_UNESCAPED_UNICODE)));

    }
    
    
}
