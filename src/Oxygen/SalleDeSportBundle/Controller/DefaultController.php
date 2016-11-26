<?php

namespace Oxygen\SalleDeSportBundle\Controller;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Oxygen\SalleDeSportBundle\Form;
use Oxygen\SalleDeSportBundle\Entity\Adherent;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OxygenSalleDeSportBundle:Default:index.html.twig');
    }
    
    public function afterLoginSuccessAction() {
        //return $this->render('OxygenSalleDeSportBundle:Default:profile.html.twig');
        $query = $this->getDoctrine()->getEntityManager()
                        ->createQuery(
                                'SELECT u FROM OxygenSalleDeSportBundle:Adherent u WHERE u.roles LIKE :role'
                        )->setParameter('role', '%"ROLE_ADMIN"%');

        $trainers = $query->getResult();
        return $this->render('OxygenSalleDeSportBundle:Default:profile.html.twig', array(
                    'trainers' => $trainers
        ));
    }

    public function addNewTrainerAction(Request $request)
    {
        $trainer = new Adherent();
        $form = $this->createForm(new adherentType(), $trainer);
        if ($request->getMethod() == 'POST') {
                $form->handleRequest($request);    
                $userManager = $this->get('fos_user.user_manager');
                $trainer = $userManager->createUser();
                $trainer->setPlainPassword($form->get('password')->getData());
                $trainer->addRole("ROLE_ADMIN");
                $trainer->setEnabled(true);
                $trainer->setUsername($form->get('username')->getData());
                $trainer->setEmail($form->get('email')->getData());
                $userManager->updateUser($trainer);
                $em = $this->getDoctrine()->getManager();
                $em->persist($trainer);
                $em->flush();
                return $this->redirectToRoute('oxygen_salle_de_sport_profile_homepage');
        }
        $em = $this->getDoctrine()->getManager();
        $trainers = $em->getRepository("SalleDeSportBundle:Adherent")->findByRole('ADMIN');  
        return $this->render('OxygenSalleDeSportBundle:User:newTrainer.html.twig',array(
            'form' => $form->createView(),
            'trainers' => $trainers
        ));
    }
}
