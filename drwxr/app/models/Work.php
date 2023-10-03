<?php

class Work{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getProductions() {
//        $this->db->query('SELECT * FROM tbproduction
//                            ORDER BY NUMSUIVIE ASC');
        $this->db->query('SELECT 
                            tbproduction.IDPRODUCTION,
                            tbproduction.DATETODAY,
                            tbproduction.NUMSUIVIE,
                            tbproduction.NUMBA,
                            tbcustomer.RAISONSOCIAL,
                            tbproduction.NUMBCPO,
                            tbproduction.DESIGNATION,
                            tbproduction.MEDIA,
                            tbproduction.DIMENTION,
                            tbproduction.FORMAT,
                            tbproduction.FINITIONS,
                            tbproduction.QUANTITE,
                            tbproduction.DEADLINE,
                            tbproduction.DESIGNER,
                            tbproduction.LIVREELE,
                            tbproduction.REMARQUE,
                            tbproduction.STATUS,
                            tbproduction.USERRECU,
                            tbproduction.YEARNOW
                        FROM tbproduction
                            INNER JOIN tbcustomer
                        ON tbproduction.CUSTOMER = tbcustomer.IDCUSTOMER
                        ORDER BY tbproduction.NUMSUIVIE ASC');
        $result = $this->db->resultSet();
        return $result;
    }

    public function addProduction($data) {
        $this->db->query('INSERT INTO tbproduction(DATETODAY,NUMSUIVIE,NUMBA,CUSTOMER,NUMBCPO,'
                . 'DESIGNATION,MEDIA,DIMENTION,FORMAT,FINITIONS,QUANTITE,DEADLINE,DESIGNER,LIVREELE,'
                . 'REMARQUE,STATUS,USERRECU,YEARNOW) '
                . 'VALUES (:DATETODAY,:NUMSUIVIE,:NUMBA,:CUSTOMER,:NUMBCPO,'
                . ':DESIGNATION,:MEDIA,:DIMENTION,:FORMAT,:FINITIONS,:QUANTITE,'
                . ':DEADLINE,:DESIGNER,:LIVREELE,'
                . ':REMARQUE,:STATUS,:USERRECU,:YEARNOW)');
        $this->db->bind(':DATETODAY', $data['DATETODAY']);
        $this->db->bind(':NUMSUIVIE', $data['NUMSUIVIE']);
        $this->db->bind(':NUMBA', $data['NUMBA']);
        $this->db->bind(':CUSTOMER', $data['CUSTOMER']);
        $this->db->bind(':NUMBCPO', $data['NUMBCPO']);
        $this->db->bind(':DESIGNATION', $data['DESIGNATION']);
        $this->db->bind(':MEDIA', $data['MEDIA']);
        $this->db->bind(':DIMENTION', $data['DIMENTION']);
        $this->db->bind(':FORMAT', $data['FORMAT']);
        $this->db->bind(':FINITIONS', $data['FINITIONS']);
        $this->db->bind(':QUANTITE', $data['QUANTITE']);
        $this->db->bind(':DEADLINE', $data['DEADLINE']);
        $this->db->bind(':DESIGNER', $data['DESIGNER']);
        $this->db->bind(':LIVREELE', $data['LIVREELE']);
        $this->db->bind(':REMARQUE', $data['REMARQUE']);
        $this->db->bind(':STATUS', $data['STATUS']);
        $this->db->bind(':USERRECU', $data['USERRECU']);
        $this->db->bind(':YEARNOW', $data['YEARNOW']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//
    public function getProductionById($id) {
        $this->db->query('SELECT * FROM tbproduction WHERE IDPRODUCTION = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
//
    public function updateProduction($data) {
        $this->db->query('UPDATE tbproduction SET '
                . 'DATETODAY = :DATETODAY, '
                . 'NUMSUIVIE = :NUMSUIVIE, '
                . 'NUMBA = :NUMBA, '
                . 'CUSTOMER = :CUSTOMER, '
                . 'NUMBCPO = :NUMBCPO, '
                . 'DESIGNATION = :DESIGNATION, '
                . 'MEDIA = :MEDIA, '
                . 'DIMENTION = :DIMENTION, '
                . 'FORMAT = :FORMAT, '
                . 'FINITIONS = :FINITIONS, '
                . 'QUANTITE = :QUANTITE, '
                . 'DEADLINE = :DEADLINE, '
                . 'DESIGNER = :DESIGNER, '
                . 'LIVREELE = :LIVREELE, '
                . 'REMARQUE = :REMARQUE, '
                . 'STATUS = :STATUS, '
                . 'USERRECU = :USERRECU,'
                . 'YEARNOW = :YEARNOW '
                . ' WHERE IDPRODUCTION = :id');
        $this->db->bind(':id', $data['IDPRODUCTION']);
        $this->db->bind(':DATETODAY', $data['DATETODAY']);
        $this->db->bind(':NUMSUIVIE', $data['NUMSUIVIE']);
        $this->db->bind(':NUMBA', $data['NUMBA']);
        $this->db->bind(':CUSTOMER', $data['CUSTOMER']);
        $this->db->bind(':NUMBCPO', $data['NUMBCPO']);
        $this->db->bind(':DESIGNATION', $data['DESIGNATION']);
        $this->db->bind(':MEDIA', $data['MEDIA']);
        $this->db->bind(':DIMENTION', $data['DIMENTION']);
        $this->db->bind(':FORMAT', $data['FORMAT']);
        $this->db->bind(':FINITIONS', $data['FINITIONS']);
        $this->db->bind(':QUANTITE', $data['QUANTITE']);
        $this->db->bind(':DEADLINE', $data['DEADLINE']);
        $this->db->bind(':DESIGNER', $data['DESIGNER']);
        $this->db->bind(':LIVREELE', $data['LIVREELE']);
        $this->db->bind(':REMARQUE', $data['REMARQUE']);
        $this->db->bind(':STATUS', $data['STATUS']);
        $this->db->bind(':USERRECU', $data['USERRECU']);
        $this->db->bind(':YEARNOW', $data['YEARNOW']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//
//    //delete
    public function deleteProduction($id) {
        $this->db->query('DELETE FROM tbproduction WHERE IDPRODUCTION = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}