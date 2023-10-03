<?php

class Activity{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getActivitys() {
        $this->db->query('SELECT * FROM tbactivity
                            ORDER BY ACTIVITY ASC');
        $result = $this->db->resultSet();
        return $result;
    }

    public function addActivity($data) {
        $this->db->query('INSERT INTO tbactivity(ACTIVITY) '
                . 'VALUES (:ACTIVITY)');
        $this->db->bind(':ACTIVITY', $data['ACTIVITY']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//
    public function getActivityById($id) {
        $this->db->query('SELECT * FROM tbactivity WHERE IDACTIVITY = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
//
    public function updateActivity($data) {
//        $this->db->query('UPDATE tbactivity SET '
//                . 'ACTIVITY = :ACTIVITY, '
//                . 'SOCIETE = :SOCIETE, '
//                . 'EMAIL = :EMAIL, '
//                . 'CONTACT = :CONTACT, '
//                . 'DESCRIPTION = :DESCRIPTION '
//                . ' WHERE IDACTIVITY = :id');
//        $this->db->bind(':id', $data['IDACTIVITY ']);
//        $this->db->bind(':ACTIVITY', $data['ACTIVITY']);
//        $this->db->bind(':SOCIETE', $data['SOCIETE']);
//        $this->db->bind(':EMAIL', $data['EMAIL']);
//        $this->db->bind(':CONTACT', $data['CONTACT']);
//        $this->db->bind(':DESCRIPTION', $data['DESCRIPTION']);
//
//        //execute 
//        if ($this->db->execute()) {
//            return true;
//        } else {
//            return false;
//        }
    }
//
//    //delete
    public function deleteActivity($id) {
        $this->db->query('DELETE FROM tbactivity WHERE IDACTIVITY = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}