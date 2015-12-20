<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use \Symfony\Component\Form\Extension\Core\Type\TextareaType;
use \Symfony\Component\Form\Extension\Core\Type\EmailType;
use \Symfony\Component\Form\Extension\Core\Type\UrlType;

class PersonneType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nom', TextType::class)
                ->add('prenom', TextType::class)
                ->add('metier', TextType::class)
                ->add('adresse', TextareaType::class)
                ->add('cp', TextType::class)
                ->add('ville', TextType::class)
                ->add('email', TextType::class)
                ->add('telephone', TextType::class, array('required' => false))
                ->add('dateNaissance', BirthdayType::class)
                ->add('presentation', TextareaType::class)
                ->add('facebook', UrlType::class, array('required' => false))
                ->add('twitter', UrlType::class, array('required' => false))
                ->add('viadeo', UrlType::class, array('required' => false))
                ->add('linkedin', UrlType::class, array('required' => false))
                ->add('ok', SubmitType::class)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Personne'
        ));
    }

}
