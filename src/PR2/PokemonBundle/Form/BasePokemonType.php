<?php

namespace PR2\PokemonBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use PR2\CoreBundle\Form\ImageType;

class BasePokemonType extends AbstractType
{
    private $types = [
        'Aucun'=>'Aucun',
        'Normal'=>'Normal',
        'Feu'=>'Feu',
        'Eau'=>'Eau',
        'Électrique'=>'Électrique',
        'Herbe'=>'Herbe',
        'Glace'=>'Glace',
        'Combat'=>'Combat',
        'Poison'=>'Poison',
        'Sol'=>'Sol',
        'Vol'=>'Vol',
        'Psychique'=>'Psychique',
        'Insecte'=>'Insecte',
        'Roche'=>'Roche',
        'Fantôme'=>'Fantôme',
        'Dragon'=>'Dragon',
        'Ténèbres'=>'Ténèbres',
        'Métal'=>'Métal',
        'Fée'=>'Fée'
    ];

    private $expTypes = [
        'Erratic'=>'Erratic',
        'Fast'=>'Fast',
        'Medium Fast'=>'Medium Fast',
        'Medium Slow'=>'Medium Slow',
        'Slow'=>'Slow',
        'Fluctuating'=>'Fluctuating',
    ];

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('noNational')
            ->add('nom')
            ->add('type1', 'choice', [
                'choices' => $this->types
            ])
            ->add('type2', 'choice', [
                'choices' => $this->types
            ])
            ->add('classification')
            ->add('grandeur')
            ->add('poids')
            ->add('tauxCapture')
            ->add('basePasOeuf')
            ->add('typeExp', 'choice', [
                'choices' => $this->expTypes
            ])
            ->add('baseJoie')
            ->add('tauxFuite')
            ->add('description')
            ->add('basePV')
            ->add('baseAtt')
            ->add('baseDef')
            ->add('baseSpAtt')
            ->add('baseSpDef')
            ->add('baseVit')
            ->add('methodeEvo')
            ->add('chanceM')
            ->add('chanceF')
            ->add('baseExp')
            ->add('starter', null, ['required'=>false])
            ->add('image', new ImageType(), array('required'=>false));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PR2\PokemonBundle\Entity\BasePokemon'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pr2_pokemonbundle_basepokemon';
    }
}
