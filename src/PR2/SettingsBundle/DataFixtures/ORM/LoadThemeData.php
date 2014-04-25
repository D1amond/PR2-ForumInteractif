<?php

namespace PR2\ForumBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PR2\SettingsBundle\Entity\Theme;

class LoadThemeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $data = new \Doctrine\Common\Collections\ArrayCollection();

        $data[] = new Theme('Défaut', 0, $this->getReference('image4'));

        foreach ($data as $entry) {
            $manager->persist($entry);
            $manager->flush();
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}