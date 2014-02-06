<?php
 
namespace PR2\ForumBundle\Form;
 
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
 
class MembreEditType extends MembreType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    // On fait appel à la méthode buildForm du parent, qui va ajouter tous les champs à $builder
    parent::buildForm($builder, $options);
 
    // On peut supprimer celui ou ceux qu'on ne veut pas dans le formulaire de modification
    //$builder->remove('date');
  }
 
  // On modifie cette méthode, car les deux formulaires doivent avoir un nom différent
  public function getName()
  {
    return 'pr2_forumbundle_membreedittype';
  }
}