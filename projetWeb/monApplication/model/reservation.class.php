<?php

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="jabaianb.reservation")
 */
class reservation {
    /** @Id @Column(type="integer")
     *  @GeneratedValue
     */
    public $id;

    /** 
     * @ManyToOne(targetEntity="voyage")
     * @JoinColumn(name="voyage", referencedColumnName="id")
     */
    public $voyage;

    /** 
     * @ManyToOne(targetEntity="utilisateur")
     * @JoinColumn(name="voyageur", referencedColumnName="id")
     */
    public $voyageur;

    //affiche les informations de la reservation pour les utilisateur
    public  function _toString() {
        return "<h3>Trajet : ".$this->voyage->trajet->depart."-".$this->voyage->trajet->arrivee.
                "</h3><h4>Voyage avec : </h4><p>".$this->voyage->conducteur->nom.
                "<h4>Heure de depart : </h4><p>".$this->voyage->heureDepart."H</p>";
    }   

}
?>