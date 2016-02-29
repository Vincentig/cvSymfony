<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class cvController extends Controller {

    /**
     * @Route("/",
     *      name="cv_homepage")
     */
    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
//        $personne = $em->getRepository('AppBundle:Personne')->find(1);
        $personne = $em->getRepository('AppBundle:Personne')->getFullCv(1);

        return $this->render('cv/index.html.twig', array(
                    'personne' => $personne
        ));
    }

}
