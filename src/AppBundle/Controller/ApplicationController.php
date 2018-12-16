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
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        
        // Page d'accueil du site
        return $this->render('library/accueil.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
        
    }
    
    /**
     * @Route("/new", name="user_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('AppBundle\Form\UserType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('users', array('id' => $user->getId()));
        }

        return $this->render('library/users/user/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }
    
    /**
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
     * @Route("/users", name="users")
     */
    public function userAction(Request $request)
    {
        
        // Aucun utilisateur de connecté
        if(empty($this->getUser()))
            return new RedirectResponse($this->generateUrl('homepage'));
        
        // Role de l'utilisateur
        $role = $this->getUser()->getRoles()[0];
        
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:User')->findAll();
 
        if($role == "ROLE_ADMIN")
        {
            
            // Page d'accueil de l'administrateur
            return $this->render('library/users/admin/index.html.twig', array(
                'users' => $users,
            ));
            
        }
        elseif($role == "ROLE_USER")
        {
            
            // Page d'accueil de l'utilisateur lambda
            return $this->render('library/users/user/index.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            ]); 
            
        }
    }
    
    
    /**
     * @Route("/delete/{id}", name="delete_user")
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
    
    
}
