<?php
class EnqueteManager extends Model
{
    public function getEnquetes()
    {
        // $this->getBdd(); ligne devenue inutile, car l'attribut de la connexion est définie dans la requête qu'on appelle.
        return $this->getAll('enquete', 'Enquete'); // 'nomdelatable', 'nomdelobjet' ==> créés dans 'Enquete.php'
    }
}