<?php

class Caisse{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getCaissesAll() {
        $datetoday = date('Y-m-d');
        $this->db->query("SELECT * FROM tbcaisse
                            WHERE TYPECAISSE IN('INCAISSE', 'APPROCAISSE')
                            AND DATETODAY ='".$datetoday."'
                            ORDER BY NUMSUIVIE ASC");
        $result = $this->db->resultSet();
        return $result;
    }
    public function getCaissesIn() {
        $this->db->query('SELECT * FROM tbcaisse
                            WHERE TYPECAISSE="INCAISSE"
                            ORDER BY DATETODAY DESC');
        $result = $this->db->resultSet();
        return $result;
    }
    public function getCaissesOut() {
//        $datetoday = date('Y-m-d');
        $this->db->query("SELECT * FROM tbcaisse
                            WHERE TYPECAISSE='OUTCAISSE'  
                            ORDER BY DATETODAY DESC");
        $result = $this->db->resultSet();
        return $result;
    }
    public function getCaissesApprocaisse() {
//        $datetoday = date('Y-m-d');
        $this->db->query("SELECT * FROM tbcaisse
                            WHERE TYPECAISSE='APPROCAISSE' ");
        $result = $this->db->resultSet();
        return $result;
    }
    public function getCaissesLastcaisse() {
//        $datetoday = date('Y-m-d');
//        $this->db->query("SELECT * FROM tbcaisse
//                            WHERE TYPECAISSE='LASTCAISSE' 
//                                AND SUM(INMONTANT) AS LATSCAISSE
//                                AND DATATODAY ='".$datetoday."' ");
//        $result = $this->db->resultSet();
//        return $result;
    }

    public function addCaisse($data) {
        $this->db->query('INSERT INTO tbcaisse(DATETODAY,NUMSUIVIE,NUMPIECE,'
                . 'DESIGNATION,INMONTANT,OUTMONTANT,USER,TYPECAISSE) '
                . 'VALUES (:DATETODAY,:NUMSUIVIE,:NUMPIECE,:DESIGNATION,:INMONTANT, '
                . ':OUTMONTANT,:USER,:TYPECAISSE)');
        $this->db->bind(':DATETODAY', $data['DATETODAY']);
        $this->db->bind(':NUMSUIVIE', $data['NUMSUIVIE']);
        $this->db->bind(':NUMPIECE', $data['NUMPIECE']);
        $this->db->bind(':DESIGNATION', $data['DESIGNATION']);
        $this->db->bind(':INMONTANT', $data['INMONTANT']);
        $this->db->bind(':OUTMONTANT', $data['OUTMONTANT']);
        $this->db->bind(':USER', $data['USER']);
        $this->db->bind(':TYPECAISSE', $data['TYPECAISSE']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//
    public function getCaisseById($id) {
        $this->db->query('SELECT * FROM tbcaisse WHERE IDCAISSE = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
//
//    public function updateCaisse($data) {
//        $this->db->query('UPDATE tbcaisse SET '
//                . 'CAISSE = :CAISSE, '
//                . 'SOCIETE = :SOCIETE, '
//                . 'EMAIL = :EMAIL, '
//                . 'CONTACT = :CONTACT, '
//                . 'DESCRIPTION = :DESCRIPTION '
//                . ' WHERE IDCAISSE = :id');
//        $this->db->bind(':id', $data['IDCAISSE ']);
//        $this->db->bind(':CAISSE', $data['CAISSE']);
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
//    }
//
//    //delete
    public function deleteCaisse($id) {
        $this->db->query('DELETE FROM tbcaisse WHERE IDCAISSE = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}