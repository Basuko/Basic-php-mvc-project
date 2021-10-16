<?php
class Enquete
{
    private $enqueteID;
    private $enqueteNom;

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
    public function setEnqueteID($enqueteID)
    {
        $enqueteID = (int) $enqueteID;
        if($enqueteID > 0)
            $this->enqueteID = $enqueteID;
    }
    public function setEnqueteNom($enqueteNom)
    {
        if(is_string($enqueteNom))
            $this->enqueteNom = $enqueteNom;
    }


    // GETTERS
    public function getEnqueteID()
    {
        return $this->enqueteID;
    }
    public function getEnqueteNom()
    {
        return $this->enqueteNom;
    }
}