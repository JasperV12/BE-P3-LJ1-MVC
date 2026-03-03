<?php

class Sneaker
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSneakers()
    {
        $sql = 'SELECT  Merk
                       ,Model
                       ,Type
                
                FROM   Sneakers

                ORDER BY Merk ASC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }
}