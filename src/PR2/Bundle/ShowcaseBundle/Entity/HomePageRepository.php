<?php

namespace PR2\Bundle\ShowcaseBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * HomePageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class HomePageRepository extends EntityRepository
{
	public function getActive()
	{
		return $this->_em->createQuery('SELECT hp FROM PR2ShowcaseBundle:HomePage hp WHERE hp.isActive = true')
                         ->getResult();
	}
}
