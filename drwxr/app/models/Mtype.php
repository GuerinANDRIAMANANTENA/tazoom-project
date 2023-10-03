<?php

class Mtype{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getMtypes() {
        $this->db->query('SELECT 
                            tbmtype.IDMTYPE,
                            tbmedia.MEDIA,
                            tbmtype.MTYPE
                        FROM tbmtype
                            INNER JOIN tbmedia
                        ON tbmtype.IDSECTION = tbmedia.IDMEDIA 
                        ORDER BY tbmtype.MTYPE ASC');
        $result = $this->db->resultSet();
        return $result;
    }

    public function addMtype($data) {
        $this->db->query('INSERT INTO tbmtype(IDSECTION,MTYPE) '
                . 'VALUES (:IDSECTION,:MTYPE)');
        $this->db->bind(':IDSECTION', $data['IDSECTION']); 
        $this->db->bind(':MTYPE', $data['MTYPE']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//
    public function getMtypeById($id) {
//        $this->db->query('SELECT * FROM tbmtype WHERE IDMTYPE = :id');
        $this->db->query('SELECT 
                            tbmtype.IDMTYPE,
                            tbmedia.MEDIA,
                            tbmtype.MTYPE
                        FROM tbmtype
                            INNER JOIN tbmedia
                        ON tbmtype.IDSECTION = tbmedia.IDMEDIA 
                         WHERE IDMTYPE = :id
                        ORDER BY tbmtype.MTYPE ASC');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

//    //delete
    public function deleteMtype($id) {
        $this->db->query('DELETE FROM tbmtype WHERE IDMTYPE = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}