<?php

namespace AppBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Skill;
use AppBundle\Form\SkillType;

/**
 * Skill controller.
 *
 * @Route("/admin/skill")
 */
class SkillController extends Controller
{

    /**
     * Lists all Skill entities.
     *
     * @Route("/", name="admin_skill")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Skill')->findBy(
            array('personne'=>$this->getUser()),
            array( 'ordre'=>'ASC')
        );

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Skill entity.
     *
     * @Route("/", name="admin_skill_create")
     * @Method("POST")
     * @Template("AppBundle:Skill:new.html.twig")
     */
    public function createAction(Request $request)
    {
//        $entity = new Skill();
//        $form = $this->createCreateForm($entity);



        $em = $this->getDoctrine()->getManager();
        $personne = $em->getRepository('AppBundle:Personne')->find(1);

        $originalSkills = new ArrayCollection();
        // Create an ArrayCollection of the current Tag objects in the database
        foreach ($personne->getSkills() as $skill) {
            $originalSkills->add($skill);

        }

        $form = $this->createCreateForm( $personne);
        $form->handleRequest($request);


   // var_dump($request->);




        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            //$personne=$this->getUser();
           // $entity->setPersonne($personne);

          //  $em->persist($entity);

            //var_dump($personne->getSkills());

            $i=0;
            foreach ($originalSkills as $skill) {
                if (false === $personne->getSkills()->contains($skill)) {
                    echo 'Dans le if<br/>';
                    // remove the Task from the Tag
                    //$tag->getTasks()->removeElement($task);

                    // if it was a many-to-one relationship, remove the relationship like this
                    // $tag->setTask(null);

                   // $em->persist($tag);

                    // if you wanted to delete the Tag entirely, you can also do that
                     $em->remove($skill);
                }
                else{
                    echo 'dans le else <br/>';
                    //$skill->setOrdre($i);
                   // var_dump($skill->getOrdre());
                 ////   $em->detach($skill);
                   // $em->persist($skill);
                }
                $i++;
            }

//            $i=0;
//            foreach ($personne->getSkills() as $skill) {
//
//
//                    $skill->setOrdre($i);
//                    var_dump($skill->getOrdre(), $skill->getNom());
//                    ////   $em->detach($skill);
//                    // $em->persist($skill);
//
//                $i++;
//            }





            $em->flush();

            return $this->redirect($this->generateUrl('admin_skill'));
        }

        return array(
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Skill entity.
     *
     * @param Skill $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm( $entity)
    {
        $form = $this->createForm(new \AppBundle\Form\PersonneSkillsType(), $entity, array(
            'action' => $this->generateUrl('admin_skill_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Skill entity.
     *
     * @Route("/new", name="admin_skill_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
//        $entity = new Skill();
//        $form   = $this->createCreateForm($entity);

        $em = $this->getDoctrine()->getManager();
        $personne = $em->getRepository('AppBundle:Personne')->find(1);
        $form = $this->createCreateForm( $personne);



        return array(
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Skill entity.
     *
     * @Route("/{id}", name="admin_skill_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Skill')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Skill entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Skill entity.
     *
     * @Route("/{id}/edit", name="admin_skill_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Skill')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Skill entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Skill entity.
    *
    * @param Skill $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Skill $entity)
    {
        $form = $this->createForm(new SkillType(), $entity, array(
            'action' => $this->generateUrl('admin_skill_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Skill entity.
     *
     * @Route("/{id}", name="admin_skill_update")
     * @Method("PUT")
     * @Template("AppBundle:Skill:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Skill')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Skill entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_skill_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Skill entity.
     *
     * @Route("/{id}", name="admin_skill_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Skill')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Skill entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_skill'));
    }

    /**
     * Creates a form to delete a Skill entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_skill_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
