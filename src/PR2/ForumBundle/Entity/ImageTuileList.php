<?php

namespace PR2\ForumBundle\Entity;

use PR2\ForumBundle\Entity\ImageTuile;

class ImageTuileList
{
	private $imageTuiles;

	public function __construct()
    {
    	$this->imageTuiles = new \Doctrine\Common\Collections\ArrayCollection();
    	$this->imageTuiles[] = new ImageTuile("Vide","vide.png");
    	$this->imageTuiles[] = new ImageTuile("Village","ville1.png");
    	$this->imageTuiles[] = new ImageTuile("Village (Ouest)","ville2.png");
    	$this->imageTuiles[] = new ImageTuile("Village (Est)","ville3.png");
    	$this->imageTuiles[] = new ImageTuile("Village (Nord)","ville4.png");
    	$this->imageTuiles[] = new ImageTuile("Village (Sud)","ville5.png");
    	$this->imageTuiles[] = new ImageTuile("Ville (Nord-Ouest)","ville6.png");
    	$this->imageTuiles[] = new ImageTuile("Ville (Nord-Est)","ville7.png");
    	$this->imageTuiles[] = new ImageTuile("Ville (Sud-Est)","ville8.png");
    	$this->imageTuiles[] = new ImageTuile("Ville (Sud-Ouest)","ville9.png");
    	$this->imageTuiles[] = new ImageTuile("Ville (Nord)","ville10.png");
    	$this->imageTuiles[] = new ImageTuile("Ville (Sud)","ville11.png");
    	$this->imageTuiles[] = new ImageTuile("Route Verticale","route1.png");
    	$this->imageTuiles[] = new ImageTuile("Route Horizontale","route2.png");
        $this->imageTuiles[] = new ImageTuile("Route Tournante","route3.png");
        $this->imageTuiles[] = new ImageTuile("Route Tournante","route4.png");
        $this->imageTuiles[] = new ImageTuile("Route Tournante","route5.png");
        $this->imageTuiles[] = new ImageTuile("Route Tournante","route6.png");
        $this->imageTuiles[] = new ImageTuile("Route Carrefour","route7.png");
        $this->imageTuiles[] = new ImageTuile("Route en T","route8.png");
        $this->imageTuiles[] = new ImageTuile("Route en T","route9.png");
        $this->imageTuiles[] = new ImageTuile("Route en T","route10.png");
        $this->imageTuiles[] = new ImageTuile("Route en T","route11.png");
        $this->imageTuiles[] = new ImageTuile("Lieu Diver (Petit)","special1.png");
        $this->imageTuiles[] = new ImageTuile("Lieu Diver","special2.png");
        $this->imageTuiles[] = new ImageTuile("Lieu Diver","special3.png");
        $this->imageTuiles[] = new ImageTuile("Lieu Diver","special4.png");
        $this->imageTuiles[] = new ImageTuile("Lieu Diver","special5.png");
        $this->imageTuiles[] = new ImageTuile("Lieu Diver","special6.png");
    }

    public function getList() 
    {
    	return $this->imageTuiles;
    }

}