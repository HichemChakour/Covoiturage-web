<?php

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="jabaianb.voyage")
 */
class voyage {
    /** @Id @Column(type="integer")
     *  @GeneratedValue
     */
    public $id;

   
     /** 
     * @ManyToOne(targetEntity="utilisateur")
     * @JoinColumn(name="conducteur", referencedColumnName="id")
     */
    public $conducteur;

    
    /** 
     * @ManyToOne(targetEntity="trajet")
     * @JoinColumn(name="trajet", referencedColumnName="id")
     */
    public $trajet;

    /** @Column(type="integer") */
    public $tarif;

    /** @Column(type="integer") */
    public $nbPlace;

    /** @Column(type="integer") */
    public $heureDepart;

    /** @Column(type="integer") */
    public $contraintes;

    public  function _toString() {
        return "<h3>".$this->trajet->depart."-".$this->trajet->arrivee." </h3> 
        Conducteur : ".$this->conducteur->nom." ".$this->conducteur->prenom.
        "<br>Distance trajet : ".$this->trajet->distance." km".
        "<br>Prix : ".$this->tarif." €".
        "<br>place : ".$this->nbPlace.
        "<br>heure de depart : ".$this->heureDepart."H";
        
    }   

}
?>