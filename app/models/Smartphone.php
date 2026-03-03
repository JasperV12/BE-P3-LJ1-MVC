<?php

class Smartphone
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSmartphones()
    {
        $sql = 'SELECT  Merk
                       ,Model
                       ,Prijs
                       ,Geheugen
                       ,Besturingssysteem
                       ,CONCAT(Schermgrootte, " inch") as Schermgrootte
                       ,DATE_FORMAT(Releasedatum, "%d/%m/%Y") as Releasedatum
                       ,CONCAT(MegaPixels, " MP") as MegaPixels
                
                FROM   Smartphones

                ORDER BY Prijs DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }
}