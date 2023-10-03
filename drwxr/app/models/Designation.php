<?php

class Designation{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getDesignations() {
         $this->db->query('SELECT 
                            tbdesignation.IDDESIGNATION,
                            tbmedia.MEDIA,
                            tbmtype.MTYPE,
                            tbdesignation.DESIGNATION
                        FROM tbdesignation
                            INNER JOIN tbmedia
                        ON tbdesignation.IDSECTION = tbmedia.IDMEDIA 
                            INNER JOIN tbmtype
                        ON tbmtype.IDMTYPE = tbdesignation.IDMTYPE 
                        ORDER BY tbdesignation.DESIGNATION ASC');
        $result = $this->db->resultSet();
        return $result;
    }
    

    public function addDesignation($data) {
        $this->db->query('INSERT INTO tbdesignation(IDSECTION,IDMTYPE,DESIGNATION) '
                . 'VALUES (:IDSECTION,:IDMTYPE,:DESIGNATION)');
        $this->db->bind(':IDSECTION', $data['IDSECTION']);
        $this->db->bind(':IDMTYPE', $data['IDMTYPE']);
        $this->db->bind(':DESIGNATION', $data['DESIGNATION']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//
    public function getDesignationById($id) {
//        $this->db->query('SELECT * FROM tbdesignation WHERE IDDESIGNATION = :id');
        $this->db->query('SELECT 
                            tbdesignation.IDDESIGNATION,
                            tbmedia.MEDIA,
                            tbmtype.MTYPE,
                            tbdesignation.DESIGNATION
                        FROM tbdesignation
                            INNER JOIN tbmedia
                        ON tbdesignation.IDSECTION = tbmedia.IDMEDIA 
                            INNER JOIN tbmtype
                        ON tbmtype.IDMTYPE = tbdesignation.IDMTYPE 
                         WHERE IDDESIGNATION = :id
                        ORDER BY tbdesignation.DESIGNATION ASC');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

//    //delete
    public function deleteDesignation($id) {
        $this->db->query('DELETE FROM tbdesignation WHERE IDDESIGNATION = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}