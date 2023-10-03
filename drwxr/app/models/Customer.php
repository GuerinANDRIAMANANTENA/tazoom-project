<?php

class Customer{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getCustomers() {
        $this->db->query('SELECT * FROM tbcustomer
                            ORDER BY RAISONSOCIAL ASC');
        $result = $this->db->resultSet();
        return $result;
    }

    public function addCustomer($data) {
        $this->db->query('INSERT INTO tbcustomer(CODECUSTOMER,RAISONSOCIAL,ADRESSE,EMAIL,CONTACT,NIF,STAT,RCS) '
                . 'VALUES (:CODECUSTOMER,:RAISONSOCIAL,:ADRESSE,:EMAIL,:CONTACT,:NIF,:STAT,:RCS)');
        $this->db->bind(':CODECUSTOMER', $data['CODECUSTOMER']);
        $this->db->bind(':RAISONSOCIAL', $data['RAISONSOCIAL']);
        $this->db->bind(':ADRESSE', $data['ADRESSE']);
        $this->db->bind(':EMAIL', $data['EMAIL']);
        $this->db->bind(':CONTACT', $data['CONTACT']);
        $this->db->bind(':NIF', $data['NIF']);
        $this->db->bind(':STAT', $data['STAT']);
        $this->db->bind(':RCS', $data['RCS']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//
    public function getCustomerById($id) {
        $this->db->query('SELECT * FROM tbcustomer WHERE IDCUSTOMER = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    
    
    public function getLoadCustomerById($id) {
        $this->db->query('SELECT * FROM tbcustomer WHERE IDCUSTOMER = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
//
    public function updateCustomer($data) {
        $this->db->query('UPDATE tbcustomer SET '
                . 'CODECUSTOMER = :CODECUSTOMER, '
                . 'RAISONSOCIAL = :RAISONSOCIAL, '
                . 'ADRESSE = :ADRESSE, '
                . 'EMAIL = :EMAIL, '
                . 'CONTACT = :CONTACT, '
                . 'NIF = :NIF, '
                . 'STAT = :STAT, '
                . 'RCS = :RCS'
                . ' WHERE IDCUSTOMER = :id');
        $this->db->bind(':id', $data['IDCUSTOMER']);
        $this->db->bind(':CODECUSTOMER', $data['CODECUSTOMER']);
        $this->db->bind(':RAISONSOCIAL', $data['RAISONSOCIAL']);
        $this->db->bind(':ADRESSE', $data['ADRESSE']);
        $this->db->bind(':EMAIL', $data['EMAIL']);
        $this->db->bind(':CONTACT', $data['CONTACT']);
        $this->db->bind(':NIF', $data['NIF']);
        $this->db->bind(':STAT', $data['STAT']);
        $this->db->bind(':RCS', $data['RCS']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//
//    //delete
    public function deleteCustomer($id) {
        $this->db->query('DELETE FROM tbcustomer WHERE IDCUSTOMER   = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}