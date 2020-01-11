<?php
namespace Membre;

const LISTE_FONCTIONS = array(
    "CADRE",
    "DELEGUE",
    "MEMBRE"
);

class Membre
{

    private $id;

    private $prenom;

    private $nom;

    private $datenaissance;

    private $photopath;

    private $fonction;

    public function getId()
    {
        return $this->id;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    public function getPhotopath()
    {
        return $this->photopath;
    }

    public function getFonction()
    {
        return $this->fonction;
    }
    
    private function setPrenom($sPrenom)
    {
        if (preg_match("/^[a-zA-Z]{1,25}$/", $sPrenom)) {

            $this->prenom = $sPrenom;
        } else {

            throw new \InvalidArgumentException('Prenom invalide. Accepte : 1 à 25 lettres. Saisie : ' . $sPrenom);
        }
    }

    private function setNom($sNom)
    {
        if (preg_match("/^[a-zA-Z]{1,25}$/", $sNom)) {

            $this->nom = $sNom;
        } else {

            throw new \InvalidArgumentException('Nom invalide. Accepte : 1 à 25 lettres. Saisie : ' . $sNom);
        }
    }

    private function setDatenaissance($sDatenaissance)
    {
        if (empty($sDatenaissance) or preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $sDatenaissance)) {

            $this->datenaissance = $sDatenaissance;
        } else {

            throw new \InvalidArgumentException('Date de naissance invalide. Accepte : Format AAAA-MM-JJ ou vide. Saisie : ' . $sDatenaissance);
        }
    }

    public function setPhotopath($sPhotopath)
    {
        $this->photopath = $sPhotopath;
    }

    private function setFonction($sFonction)
    {
        if (in_array($sFonction, LISTE_FONCTIONS, true)) {

            $this->fonction = $sFonction;
        } else {

            throw new \InvalidArgumentException('Fonction invalide. Accepte : CADRE, DELEGUE, MEMBRE. Saisie : ' . $sFonction);
        }
    }

    public function __construct($cPrenom, $cNom, $cDatenaissance, $cPhotoPath, $cFonction)
    {
        try {
            $this->setPrenom($cPrenom);
            $this->setNom($cNom);
            $this->setDatenaissance($cDatenaissance);
            $this->setPhotopath($cPhotoPath);
            $this->setFonction($cFonction);
        } catch (\IllegalArgumentException $e) {

            throw $e;
        }

        return true;
    }
}