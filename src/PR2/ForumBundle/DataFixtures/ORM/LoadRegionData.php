<?php

namespace PR2\ForumBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PR2\ForumBundle\Entity\Region;

class LoadRegionData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $entities = new \Doctrine\Common\Collections\ArrayCollection();

        $entities[] = new Region('Kanto', $this->getReference('image1'), 'Kanto est la première région en matière de dressage de Pokémon. Elle abrite en effet le professeur Oak inventeur du Pokédex National, et grand-père de Gary Oak aussi connu sous le nom de Blue, qui s\'est fait un nom à la fois en tant que champion de la Ligue Pokémon Indigo avant de devenir Champion du gym de Viridian City.');
        $entities[] = new Region('Johto', $this->getReference('image2'), 'Johto est l\'une des régions du monde Pokémon, située à l\'ouest de Kanto et au nord-est d\'Hoenn.');
        $entities[] = new Region('Hoenn', $this->getReference('image3'), 'Hoenn est une région située au sud-ouest de Johto et de Kanto. C\'est une région pourvue d\'un climat très varié. Un volcan, quelques îles et des forêts, villes, routes en font tout le charme.');

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
        return 2; // the order in which fixtures will be loaded
    }
}