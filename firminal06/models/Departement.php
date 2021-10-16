<?php
class Departement
{
    private $departementID;
    private $departementNom;

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
    public function setDepartementID($departementID)
    {
        $departementID = (int) $departementID;
        if($departementID > 0)
            $this->departementID = $departementID;
    }
    public function setDepartementNom($departementNom)
    {
        if(is_string($departementNom))
            $this->departementNom = $departementNom;
    }


    // GETTERS
    public function getDepartementID()
    {
        return $this->departementID;
    }
    public function getDepartementNom()
    {
        return $this->departementNom;
    }
}