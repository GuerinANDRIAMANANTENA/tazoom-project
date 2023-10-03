<?php

class Mtypes extends Controller {

    private $postModel;

    public function __construct() {
        //new model instance
        $this->postModel = $this->model('Mtype');
    }

    public function index() {
        $mtyme = $this->postModel->getMtypes();
        $data = ['mtymes' => $mtyme, 'TitleProject' => 'M&eacute;dia/Type'];
        $this->view('settings/mtype', $data);
    }

    public function mtymes() {
        $mtyme = $this->postModel->getMtypes();
        $data = ['mtymes' => $mtyme,
            'TitleProject' => 'Mtype'];
        $this->view('settings/mtyme', $data);
    }

    //add new
    public function add() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'IDSECTION' => trim($_POST['IDSECTION']),
                'MTYPE' => trim($_POST['MTYPE']),
            ];

            if (empty($data['MTYPE'])) {
                $data['body_err'] = 'Please enter the mtyme content';
            }

            //validate error free
            if (empty($data['body_err'])) {
                if ($this->postModel->addMtype($data)) {
                    flash('postmessage', "Ajout, <br> L&eacute;ajout a &eacute;t&eacute; effectu&eacute; avec succ&egrave;ss.<span>");
                    redirect('mtymes');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('settings/mtyme', $data);
            }
        } else {
            $data = [
                'IDSECTION' => (isset($_POST['IDSECTION']) ? trim($_POST['IDSECTION']) : ''),
                'MTYPE' => (isset($_POST['MTYPE']) ? trim($_POST['MTYPE']) : '')
            ];
            $this->view('settings/mtyme', $data);
        }
    }

    public function confirmdelete($id) {
        $mtyme = $this->postModel->getMtypeById($id);
        $data = [
            'mtymes' => $mtyme, 'TitleProject' => 'Confirmation'
        ];
        $this->view('settings/mtypedel', $data);
    }

    //delete post
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->deleteMtype($id)) {
                flash('postmessage', "Suppression,<br>"
                        . "<span style=''>La suppression a r&eacute;ussi.<span>");
                redirect('mtymes');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('settings/mtymedel');
        }
    }

}
