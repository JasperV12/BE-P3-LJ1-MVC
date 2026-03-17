<?php

class Zangeres
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllZangeressen()
    {
        $sql = 'SELECT  z.Id
                       ,z.Voornaam
                       ,z.Achternaam
                       ,z.Land
                       ,z.Genre
                       ,z.Grammyawards
                       ,CONCAT("€ ", FORMAT(z.Vermogen, 0)) as Vermogen
                       ,DATE_FORMAT(z.Geboortedatum, "%d/%m/%Y") as Geboortedatum
                
                FROM   Zangeressen z

                ORDER BY z.Vermogen DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function delete($Id)
    {
        $sql = "DELETE FROM Zangeressen WHERE Id = :Id";
        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Zangeressen (Voornaam, Achternaam, Land, Genre, Grammyawards, Vermogen, Geboortedatum) 
                VALUES (:voornaam, :achternaam, :land, :genre, :grammyawards, :vermogen, :geboortedatum)";

        $this->db->query($sql);

        $this->db->bind(':voornaam', $data['voornaam'], PDO::PARAM_STR);
        $this->db->bind(':achternaam', $data['achternaam'], PDO::PARAM_STR);
        $this->db->bind(':land', $data['land'], PDO::PARAM_STR);
        $this->db->bind(':genre', $data['genre'], PDO::PARAM_STR);
        $this->db->bind(':grammyawards', $data['grammyawards'], PDO::PARAM_INT);
        $this->db->bind(':vermogen', $data['vermogen'], PDO::PARAM_STR);
        $this->db->bind(':geboortedatum', $data['geboortedatum'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function getZangeresById($id)
    {
        $sql = 'SELECT Id
                      ,Voornaam
                      ,Achternaam
                      ,Land
                      ,Genre
                      ,Grammyawards
                      ,Vermogen
                      ,Geboortedatum
                FROM Zangeressen
                WHERE Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateZangeres($request)
    {
        $sql = 'UPDATE Zangeressen
                SET    Voornaam = :voornaam
                      ,Achternaam = :achternaam
                      ,Land = :land
                      ,Genre = :genre
                      ,Grammyawards = :grammyawards
                      ,Vermogen = :vermogen
                      ,Geboortedatum = :geboortedatum
                WHERE Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $request['id'], PDO::PARAM_INT);
        $this->db->bind(':voornaam', $request['voornaam'], PDO::PARAM_STR);
        $this->db->bind(':achternaam', $request['achternaam'], PDO::PARAM_STR);
        $this->db->bind(':land', $request['land'], PDO::PARAM_STR);
        $this->db->bind(':genre', $request['genre'], PDO::PARAM_STR);
        $this->db->bind(':grammyawards', $request['grammyawards'], PDO::PARAM_INT);
        $this->db->bind(':vermogen', $request['vermogen'], PDO::PARAM_STR);
        $this->db->bind(':geboortedatum', $request['geboortedatum'], PDO::PARAM_STR);

        return $this->db->execute();
    }
}
