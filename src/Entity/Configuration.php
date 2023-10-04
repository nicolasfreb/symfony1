<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="configuration")
 * */
class Configuration
{
    /**
    * @ORM\Id()
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    public $id;

    /**
    * @ORM\Column(type="string")
    * @Assert\NotBlank(message = "Le titre ne peux pas être vide")
    */
    public $propriete;

    /**
    * @ORM\Column(type="string")
    * @Assert\NotBlank(message = "Le titre ne peux pas être vide")
    */
    public $valeur;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPropriete()
    {
        return $this->propriete;
    }

    /**
     * @param mixed $propriete
     */
    public function setPropriete($propriete): void
    {
        $this->propriete = $propriete;
    }

    /**
     * @return mixed
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * @param mixed $valeur
     */
    public function setValeur($valeur): void
    {
        $this->valeur = $valeur;
    }


}