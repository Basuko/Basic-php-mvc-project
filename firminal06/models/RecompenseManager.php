<?php
class RecompenseManager extends Model
{
    public function getRecompenses()
    {
        $this->getBdd(); // ligne devenue inutile, car l'attribut de la connex est définie ds la requête qu'on appelle.
        return $this->getAll('recompense', 'Recompense'); // 'nomdelatable', 'nomdelobjet' ==> créés dans 'Recompense.php'
    }
}