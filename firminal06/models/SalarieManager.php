<?php
class SalarieManager extends Model
{
    public function getSalaries()
    {
        // $this->getBdd(); ligne devenue inutile, car l'attribut de la connexion est définie dans la requête qu'on appelle.
        return $this->getAll('salarie', 'Salarie'); // 'nomdelatable', 'nomdelobjet' ==> créés dans 'Salarie.php'
    }

    public function getSalariesBySexe()
    {
        // $this->getBdd(); ligne devenue inutile, car l'attribut de la connexion est définie dans la requête qu'on appelle.
        return $this->getBySexe('salarie', 'Salarie'); // 'nomdelatable', 'nomdelobjet' ==> créés dans 'Salarie.php'
    }

    public function createSalarie()
    {
        // $this->getBdd(); ligne devenue inutile, car l'attribut de la connexion est définie dans la requête qu'on appelle.
        return $this->getBySexe('salarie', 'Salarie'); // 'nomdelatable', 'nomdelobjet' ==> créés dans 'Salarie.php'
    }
}