<?php
class Recompense
{
    private $recompenseID;
    private $recompenseNom;
    private $recompensePrix;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method))
                $this->$method($value);
        }
    }

    // SETTERS
    public function setRecompenseID($recompenseID)
    {
        $recompenseID = (int) $recompenseID;
        if($recompenseID > 0)
            $this->recompenseID = $recompenseID;
    }
    public function setRecompenseNom($recompenseNom)
    {
        if(is_string($recompenseNom))
            $this->recompenseNom = $recompenseNom;
    }
    public function setRecompensePrix($recompensePrix)
    {
        $recompensePrix = (int) $recompensePrix;
        if($recompensePrix > 0)
            $this->recompensePrix = $recompensePrix;
    }


    // GETTERS
    public function getRecompenseID()
    {
        return $this->recompenseID;
    }
    public function getRecompenseNom()
    {
        return $this->recompenseNom;
    }
    public function getRecompensePrix()
    {
        return $this->recompensePrix;
    }
}