<?php

class Format{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getFormats() {
        $this->db->query('SELECT * FROM tbformat
                            ORDER BY FORMAT ASC');
        $result = $this->db->resultSet();
        return $result;
    }

    public function addFormat($data) {
        $this->db->query('INSERT INTO tbformat(FORMAT) '
                . 'VALUES (:FORMAT)');
        $this->db->bind(':FORMAT', $data['FORMAT']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//
    public function getFormatById($id) {
        $this->db->query('SELECT * FROM tbformat WHERE IDFORMAT = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

//    //delete
    public function deleteFormat($id) {
        $this->db->query('DELETE FROM tbformat WHERE IDFORMAT = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}