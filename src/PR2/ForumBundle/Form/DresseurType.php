<?php

namespace PR2\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use PR2\CoreBundle\Form\ImageType;

class DresseurType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom', 'text')
            ->add('nom', 'text')
            ->add('age', 'number')
            ->add('descPhy', 'textarea', array(
                'label' => 'Description physique',
                'required' => false
            ))
            ->add('descPsy', 'textarea', array(
                'label' => 'Description psychologique',
                'required' => false
            ))
            ->add('histoire', 'textarea', array(
                'label' => 'Histoire',
                'required' => false
            ))
            ->add('lieu', 'entity', array(
                'label' => 'Lieu de départ',
                'class' => 'PR2ForumBundle:Lieu',
                'property' => 'nom',
                'multiple' => false))
            ->add('image', new ImageType(), array('required'=>false));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PR2\ForumBundle\Entity\Dresseur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pr2_forumbundle_dresseur';
    }
}


