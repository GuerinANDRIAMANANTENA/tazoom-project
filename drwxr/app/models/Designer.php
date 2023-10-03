<?php

class Designer{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getDesingers() {
        $this->db->query('SELECT * FROM tbdesigner
                            ORDER BY DESIGNER ASC');
        $result = $this->db->resultSet();
        return $result;
    }

    public function addDesinger($data) {
        $this->db->query('INSERT INTO tbdesigner(DESIGNER) '
                . 'VALUES (:DESIGNER)');
        $this->db->bind(':DESIGNER', $data['DESIGNER']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//
    public function getDesingerById($id) {
        $this->db->query('SELECT * FROM tbdesigner WHERE IDDESIGNER = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
//
    public function updateDesinger($data) {
        $this->db->query('UPDATE tbdesigner SET '
                . 'DESIGNER = :DESIGNER, '
                . 'SOCIETE = :SOCIETE, '
                . 'EMAIL = :EMAIL, '
                . 'CONTACT = :CONTACT, '
                . 'DESCRIPTION = :DESCRIPTION '
                . ' WHERE IDDESIGNER = :id');
        $this->db->bind(':id', $data['IDDESIGNER ']);
        $this->db->bind(':DESIGNER', $data['DESIGNER']);
        $this->db->bind(':SOCIETE', $data['SOCIETE']);
        $this->db->bind(':EMAIL', $data['EMAIL']);
        $this->db->bind(':CONTACT', $data['CONTACT']);
        $this->db->bind(':DESCRIPTION', $data['DESCRIPTION']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//
//    //delete
    public function deleteDesinger($id) {
        $this->db->query('DELETE FROM tbdesigner WHERE IDDESIGNER = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}