<?php

class Todolist{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getTodolists() {
        $this->db->query('SELECT * FROM tbtodolist
                            ORDER BY TODOLIST ASC');
        $result = $this->db->resultSet();
        return $result;
    }

    public function addTodolist($data) {
        $this->db->query('INSERT INTO tbtodolist(TODOLIST) VALUES (:TODOLIST)');
        $this->db->bind(':TODOLIST', $data['TODOLIST']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//
    public function getTodolistById($id) {
        $this->db->query('SELECT * FROM tbtodolist WHERE IDTODOLIST = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
//
    public function updateTodolist($data) {
        $this->db->query('UPDATE tbtodolist SET TODOLIST = :TODOLIST WHERE IDTODOLIST = :id');
        $this->db->bind(':id', $data['IDTODOLIST']);
        $this->db->bind(':TODOLIST', $data['TODOLIST']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//
//    //delete
    public function deleteTodolist($id) {
        $this->db->query('DELETE FROM tbtodolist WHERE IDTODOLIST = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}