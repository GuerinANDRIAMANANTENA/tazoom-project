<?php

class Agenda{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAgendas() {
        $this->db->query('SELECT * FROM tbagenda
                            ORDER BY DATEEVENT ASC');
        $result = $this->db->resultSet();
        return $result;
    }
    
    public function getAgendastoday() {
        $datetoday = date('Y-m-d');
        $this->db->query("SELECT * FROM tbagenda
                                WHERE DATEEVENT ='".$datetoday."'
                            ORDER BY HORSBEGING ASC");
        $result = $this->db->resultSet();
        return $result;
    }

    public function addAgenda($data) {
        $this->db->query('INSERT INTO tbagenda(DATEEVENT,EVENT,HORSBEGING,HORSEND) '
                . 'VALUES (:DATEEVENT,:EVENT,:HORSBEGING,:HORSEND)');
        $this->db->bind(':DATEEVENT', $data['DATEEVENT']);
        $this->db->bind(':EVENT', $data['EVENT']);
        $this->db->bind(':HORSBEGING', $data['HORSBEGING']);
        $this->db->bind(':HORSEND', $data['HORSEND']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//
    public function getAgendaById($id) {
        $this->db->query('SELECT * FROM tbagenda WHERE IDAGENDA = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
//
//    public function updateAgenda($data) {
//        $this->db->query('UPDATE tbagenda SET AGENDA = :AGENDA WHERE IDAGENDA = :id');
//        $this->db->bind(':id', $data['IDAGENDA']);
//        $this->db->bind(':AGENDA', $data['AGENDA']);
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
    public function deleteAgenda($id) {
        $this->db->query('DELETE FROM tbagenda WHERE IDAGENDA = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}