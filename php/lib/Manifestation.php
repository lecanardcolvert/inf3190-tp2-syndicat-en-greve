<?php
namespace Manifestation;

class Manifestation
{

    private $id;

    private $lieu;

    private $membre;

    private $date;
    
    public function getId()
    {
        return $this->id;
    }

    public function getLieu()
    {
        return $this->lieu;
    }

    public function getMembre()
    {
        return $this->membre;
    }

    public function getDate()
    {
        return $this->date;
    }
    
    private function setLieu($iLieu)
    {

        // TODO : Check if Lieu exists
        
        $this->lieu = $iLieu;
        
    }

    private function setMembre($iMembre)
    {

        // TODO : Check if Membre exists
        
        $this->membre = $iMembre;
        
    }

    private function setDate($sDate)
    {
        if (empty($sDate) or preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $sDate)) {
            
            $this->date = $sDate;
            
        } else {
            
            throw new \InvalidArgumentException('Date invalide. Accepte : Format AAAA-MM-JJ ou vide. Saisie : ' . $sDate);
            
        }
    }

    public function __construct($iLieu, $iMembre, $sDate)
    {
        try {
            
            $this->setLieu($iLieu);
            $this->setMembre($iMembre);
            $this->setDate($sDate);

        } catch (\IllegalArgumentException $e) {

            throw $e;
        }

        return true;
    }
}