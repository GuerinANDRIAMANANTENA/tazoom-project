<?php

class Media{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getMedias() {
        $this->db->query('SELECT * FROM tbmedia
                            ORDER BY MEDIA ASC');
        $result = $this->db->resultSet();
        return $result;
    }

    public function addMedia($data) {
        $this->db->query('INSERT INTO tbmedia(MEDIA) '
                . 'VALUES (:MEDIA)');
        $this->db->bind(':MEDIA', $data['MEDIA']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//
    public function getMediaById($id) {
        $this->db->query('SELECT * FROM tbmedia WHERE IDMEDIA = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

//    //delete
    public function deleteMedia($id) {
        $this->db->query('DELETE FROM tbmedia WHERE IDMEDIA = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}