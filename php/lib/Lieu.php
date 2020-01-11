<?php
namespace Lieu;

class Lieu
{

    private $id;

    private $nom;

    private $commentaire;

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    private function setNom($sNom)
    {
        if (preg_match("/^[a-zA-Z]{1,64}$/", $sNom)) {

            $this->nom = $sNom;
        } else {

            throw new \InvalidArgumentException('Nom invalide. Accepte : 1 à 64 lettres. Saisie : ' . $sNom);
        }
    }

    private function setCommentaire($sCommentaire)
    {

        // TODO : Nettoyer les balises
        $this->commentaire = $sCommentaire;
    }

    public function __construct($cNom, $cCommentaire)
    {
        try {

            $this->setNom($cNom);
            $this->setCommentaire($cCommentaire);
        } catch (\IllegalArgumentException $e) {

            throw $e;
        }

        return true;
    }

}