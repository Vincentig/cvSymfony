<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Personne;
use AppBundle\Entity\Skill;

/**
 * prefix catalogue
 * @Route("/admin")
 */
class adminController extends Controller {

    /**
     * @Route("/ajouter/personne",
     *      name="cv_admin_ajouter_personne")
     */
    public function ajouterPersonneAction() {


        $personne = new Personne();


        $form = $this->createForm(new \AppBundle\Form\PersonneType(), $personne);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                // $personne->getImage()->upload();
                $em = $this->getDoctrine()->getManager();
                $em->persist($personne);
                $session = $this->get('session');
                try {
                    $em->flush();
                    $session->getFlashBag()->add(
                            'info', 'Personne enregistrée'
                    );
                    $url = $this->generateUrl('cv_homepage');
                    return $this->redirect($url);
                } catch (Exception $ex) {
                    echo 'erreur enregistrement personne';
                }
            }
        }

        return $this->render('admin/ajouter_personne.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    /**
     * @Route("/modifier/personne/{id}",
     *      name="cv_admin_modifier_personne",
     *      defaults={"id":1},
     *      requirements={"id": "\d+"}))
     */
    public function modifierPersonneAction($id) {

        $em = $this->getDoctrine()->getManager();
        $personne = $em->getRepository('AppBundle:Personne')->find($id);


        $form = $this->createForm(new \AppBundle\Form\PersonneType(), $personne);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                // $personne->getImage()->upload();

                $session = $this->get('session');
                try {
                    $em->flush();
                    $session->getFlashBag()->add(
                            'info', 'Personne modifié'
                    );
                    $url = $this->generateUrl('cv_homepage');
                    return $this->redirect($url);
                } catch (Exception $ex) {
                    echo 'erreur enregistrement personne';
                }
            }
        }

        return $this->render('admin/ajouter_personne.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    /**
     * @Route("/ajouter/skill",
     *      name="cv_admin_ajouter_skill")
     */
    public function ajouterSkillAction() {

        $em = $this->getDoctrine()->getManager();
        $personne = $em->getRepository('AppBundle:Personne')->find(1);


        $form = $this->createForm(new \AppBundle\Form\PersonneSkillType(), $personne);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {

                $session = $this->get('session');
                try {
                    $em->flush();
                    $session->getFlashBag()->add(
                            'info', 'skill enregistrée'
                    );
                    $url = $this->generateUrl('cv_homepage');
                    return $this->redirect($url);
                } catch (Exception $ex) {
                    echo 'erreur enregistrement skill';
                }
            }
        }

        return $this->render('admin/ajouter_skill.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
