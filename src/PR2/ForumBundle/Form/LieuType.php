<?php

namespace PR2\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use PR2\CoreBundle\Form\ImageType;

class LieuType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text')
            ->add('categorie', 'text')
            ->add('description', 'textarea')
            ->add('region', 'entity', array(
                'class' => 'PR2ForumBundle:Region',
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
            'data_class' => 'PR2\ForumBundle\Entity\Lieu'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pr2_forumbundle_lieu';
    }
}
