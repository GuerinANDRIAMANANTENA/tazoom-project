<?php

class User{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getUsers() {
        $this->db->query('SELECT * FROM tbusers ORDER BY LASTNAME ASC');
        $result = $this->db->resultSet();
        return $result;
    }
}