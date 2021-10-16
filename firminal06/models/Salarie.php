<?php
class Salarie
{
    private $salarieID;
    private $salarieNom;
    private $salariePrenom;
    private $salarieSexe;
    private $salarieNaiss;
    private $salarieCode;
    private $salariePoint;
    private $departementID;

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
    public function setSalarieID($salarieID)
    {
        $salarieID = (int) $salarieID;
        if($salarieID > 0)
            $this->salarieID = $salarieID;
    }
    public function setSalarieNom($salarieNom)
    {
        if(is_string($salarieNom))
            $this->salarieNom = $salarieNom;
    }
    public function setSalariePrenom($salariePrenom)
    {
        if(is_string($salariePrenom))
            $this->salariePrenom = $salariePrenom;
    }
    public function setSalarieSexe($salarieSexe)
    {
        if(($salarieSexe = 'H') || ($salarieSexe = 'F') || ($salarieSexe = 'X'))
            $this->salarieSexe = $salarieSexe;
    }
    public function setSalarieNaiss($salarieNaiss)
    {
            $this->salarieNaiss = $salarieNaiss;

    }
    public function setSalarieCode($salarieCode)
    {
        if(is_string($salarieCode))
            $this->salarieCode = $salarieCode;
    }
    public function setSalariePoint($salariePoint)
    {
        $salariePoint = (int) $salariePoint;
        if($salariePoint >= 0)
            $this->salariePoint = $salariePoint;
    }
    public function setDepartementID($departementID)
    {
        $departementID = (int) $departementID;
        if($departementID > 0)
            $this->departementID = $departementID;
    }



    // GETTERS
    public function getSalarieID()
    {
        return $this->salarieID;
    }
    public function getSalarieNom()
    {
        return $this->salarieNom;
    }
    public function getSalariePrenom()
    {
        return $this->salariePrenom;
    }
    public function getSalarieSexe()
    {
        return $this->salarieSexe;
    }
    public function getSalarieNaiss()
    {
        return $this->salarieNaiss;
    }
    public function getSalarieCode()
    {
        return $this->salarieCode;
    }
    public function getSalariePoint()
    {
        return $this->salariePoint;
    }
    public function getDepartementID()
    {
        return $this->departementID;
    }
}