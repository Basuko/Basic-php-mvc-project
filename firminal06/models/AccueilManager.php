<?php
class DepartementManager extends Model
{
    public function getDepartements()
    {
        // $this->getBdd(); ligne devenue inutile, car l'attribut de la connexion est définie dans la requête qu'on appelle.
        return $this->getAll('departement', 'Departement'); // 'nomdelatable', 'nomdelobjet' ==> créés dans 'Departement.php'
    }

    public function getDepartement($departementID)
    {
        // $this->getBdd(); ligne devenue inutile, car l'attribut de la connexion est définie dans la requête qu'on appelle.
        return $this->getOne('departement', 'Departement', 'departementID'); // 'nomdelatable', 'nomdelobjet', 'nomdelid'
                            // ==> créés dans 'Departement.php'
    }

    public function setDepartement()
    {
        // $this->getBdd(); ligne devenue inutile, car l'attribut de la connexion est définie dans la requête qu'on appelle.
        return $this->setOne('departement', 'Departement'); // 'nomdelatable', 'nomdelobjet'
        // ==> créés dans 'Departement.php'
    }
}