<?php

namespace PR2\ForumBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PR2\ForumBundle\Entity\TypeLieu;

class LoadTypeLieuData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $entities = new \Doctrine\Common\Collections\ArrayCollection();

        $entities[] = new TypeLieu('Ville', '');
        $entities[] = new TypeLieu('Village', '');
        $entities[] = new TypeLieu('Route', '');
        $entities[] = new TypeLieu('Forêt', '');
        $entities[] = new TypeLieu('Grotte', '');
        $entities[] = new TypeLieu('Étage', '');
        $entities[] = new TypeLieu('Plage', '');
        $entities[] = new TypeLieu('Mer', '');
        $entities[] = new TypeLieu('Lac', '');
        $entities[] = new TypeLieu('Piste cyclable', '');
        $entities[] = new TypeLieu('Maison', '');
        $entities[] = new TypeLieu('Centre Pokémon', '');
        $entities[] = new TypeLieu('Magasin', '');
        $entities[] = new TypeLieu('Gym', '');

        foreach ($entities as $entity) {
            $manager->persist($entity);
            $manager->flush();
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }
}