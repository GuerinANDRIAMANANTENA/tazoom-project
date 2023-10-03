<?php

class Devis{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getDeviss() {
//        $datecreation = date('Y-m-d');
        $this->db->query('SELECT DESIGNATION,QTE,PU,(QTE*PU) AS TOTAL 
                            FROM tbdevis
                            ORDER BY DESIGNATION ASC');
        $result = $this->db->resultSet();
        return $result;
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

    public function addDevis($data) {
        $this->db->query('INSERT INTO tbdevis(FAMILLE,SOUSFAMILLE,DESIGNATION,QTE,PU,DESCRIPTION,ACTIVITE,SESSION) '
                . 'VALUES (:FAMILLE,:SOUSFAMILLE,:DESIGNATION,:QTE,:PU,:DESCRIPTION,:ACTIVITE,:SESSION)');
        $this->db->bind(':FAMILLE', $data['FAMILLE']);
        $this->db->bind(':SOUSFAMILLE', $data['SOUSFAMILLE']);
        $this->db->bind(':DESIGNATION', $data['DESIGNATION']);
        $this->db->bind(':QTE', $data['QTE']);
        $this->db->bind(':PU', $data['PU']);
        $this->db->bind(':DESCRIPTION', $data['DESCRIPTION']);
        $this->db->bind(':ACTIVITE', $data['ACTIVITE']);
        $this->db->bind(':SESSION', $data['SESSION']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//
    public function getDevisById($id) {
        $this->db->query('SELECT * FROM tbdevis WHERE IDDEVIS = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    
//
    public function updateDevis($data) {
        $this->db->query('UPDATE tbdevis SET '
                . 'CUSTOMER = :CUSTOMER, '
                . 'SOCIETE = :SOCIETE, '
                . 'EMAIL = :EMAIL, '
                . 'CONTACT = :CONTACT, '
                . 'DESCRIPTION = :DESCRIPTION '
                . ' WHERE IDDEVIS = :id');
        $this->db->bind(':id', $data['IDDEVIS ']);
        $this->db->bind(':CUSTOMER', $data['CUSTOMER']);
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
    public function deleteDevis($id) {
        $this->db->query('DELETE FROM tbdevis WHERE IDDEVIS = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}