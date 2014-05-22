<?php

namespace PR2\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use PR2\ForumBundle\Form\MessageType;

class SujetType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('resume')
            ->add('auteur', 'entity', array(
                'class' => 'PR2ForumBundle:Dresseur',
                'multiple' => false))
            ->add('messages', new MessageType(), array('required' => true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PR2\ForumBundle\Entity\Sujet'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pr2_forumbundle_sujet';
    }
}
