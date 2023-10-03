<?php

class Designations extends Controller {

    private $postModel;

    public function __construct() {
        //new model instance
        $this->postModel = $this->model('Designation');
    }

    public function index() {
        $designation = $this->postModel->getDesignations();
        $data = ['designations' => $designation, 'TitleProject' => 'D&eacute;signation'];
        $this->view('settings/designation', $data);
    }

    public function designations() {
        $designation = $this->postModel->getDesignations();
        $data = ['designations' => $designation,
            'TitleProject' => 'Designation'];
        $this->view('settings/designation', $data);
    }

    //add new typeMissings
    public function add() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'IDSECTION' => trim($_POST['IDSECTION']),
                'IDMTYPE' => trim($_POST['IDMTYPE']),
                'DESIGNATION' => trim($_POST['DESIGNATION']),
            ];

            if (empty($data['DESIGNATION'])) {
                $data['body_err'] = 'Please enter the athome content';
            }

            //validate error free
            if (empty($data['body_err'])) {
                if ($this->postModel->addDesignation($data)) {
                    flash('postmessage', "Ajout, <br>"
                            . "<span style=''>L&acute;ajout a &eacute;t&eacute; effectu&eacute; avec succ&egrave;ss.<span>");
                    redirect('designations');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('settings/designation', $data);
            }
        } else {
            $data = [
                'IDSECTION' => (isset($_POST['IDSECTION']) ? trim($_POST['IDSECTION']) : ''),
                'IDMTYPE' => (isset($_POST['IDMTYPE']) ? trim($_POST['IDMTYPE']) : ''),
                'DESIGNATION' => (isset($_POST['DESIGNATION']) ? trim($_POST['DESIGNATION']) : '')
            ];
            $this->view('settings/designation', $data);
        }
    }

    public function confirmdelete($id) {
        $designation = $this->postModel->getDesignationById($id);
        $data = [
            'designations' => $designation, 'TitleProject' => 'Confirmation'
        ];
        $this->view('settings/designationdel', $data);
    }

    //delete post
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->deleteDesignation($id)) {
                flash('postmessage', "Suppression, <br>"
                        . "<span style=''>La suppression a r&eacute;ussi.<span>");
                redirect('designations');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('settings/designationdel');
        }
    }

}
