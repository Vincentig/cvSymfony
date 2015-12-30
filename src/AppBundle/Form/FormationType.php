<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\DateTime;

class FormationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateDepart', BirthdayType::class)
            ->add('dateFin', DateType::class, array(
                'years'         => range("1950", date('Y') + 5)
            ))
            ->add('ecole', TextType::class)
            ->add('diplome', TextType::class)
            ->add('contenu', TextareaType::class)
            ->add('skills', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array(
                'class' => 'AppBundle:Skill',
                'property' => 'nom',
                'multiple' => true,
                'expanded' => true
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Formation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_formation';
    }
}
