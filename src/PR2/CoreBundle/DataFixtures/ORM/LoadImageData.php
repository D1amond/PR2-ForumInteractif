<?php

namespace PR2\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PR2\CoreBundle\Entity\Image;

class LoadImageData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $data = new \Doctrine\Common\Collections\ArrayCollection();

        $data[] = new Image('jpg');
        $data[] = new Image('jpg');
        $data[] = new Image('png');

        foreach ($data as $key => $entry) {
            $manager->persist($entry);
            $manager->flush();

            $this->addReference('image'.($key + 1), $entry);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}