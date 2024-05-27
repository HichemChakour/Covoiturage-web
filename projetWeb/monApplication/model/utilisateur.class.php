<?php

use Doctrine\Common\Collections\ArrayCollection;

/** 
 * @Entity
 * @Table(name="jabaianb.utilisateur")
 */
class utilisateur{

	/** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */ 
	public $id;

	/** @Column(type="string", length=45) */ 
	public $identifiant;
		
	/** @Column(type="string", length=45) */ 
	public $pass;

	/** @Column(type="string", length=45) */ 
	public $nom;

	/** @Column(type="string", length=45) */ 
	public $prenom;

	/** @Column(type="string", length=200) */ 
	public $avatar;

	//affiche les informations de l'utilisateur
	public  function _toString() {
        return "<h4>Nom : </h4><p>$this->nom </p>
			<h4>Prenom : </h4><p>$this->prenom </p>
			<h4>Identifiant : </h4><p>$this->identifiant</p>
				";
    }   
	
}

?>
