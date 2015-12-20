<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ExperienceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateDepart', BirthdayType::class)
            ->add('dateFin', BirthdayType::class, array('required' => false))
            ->add('entreprise', TextType::class)
            ->add('poste', TextType::class)
            ->add('contenu', TextareaType::class)

            ->add('skills', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array(
                'class' => 'AppBundle:Skill',
                'property' => 'nom',
                'multiple' => true,
                'expanded' => true,
//                    'query_builder' => function($er) use ($produit){
//                    $qb = $er->createQueryBuilder('i');
//                    $qb->leftJoin('i.produits', 'p')
//                            ->where('p = :produit')
//                            ->setParameter('produit',$produit);
//                    return $qb;
//                    }
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Experience'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_experience';
    }
}
