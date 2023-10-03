<?php

class Designers extends Controller {

    private $postModel;

    public function __construct() {
        //new model instance
        $this->postModel = $this->model('Designer');
    }

    public function index() {
        $desinger = $this->postModel->getDesingers();
        $data = ['desingers' => $desinger, 'TitleProject' => 'Designer'];
        $this->view('settings/designer', $data);
    }

    public function desingers() {
        $desinger = $this->postModel->getDesingers();
        $data = ['desingers' => $desinger,
            'TitleProject' => 'Desinger'];
        $this->view('settings/desinger', $data);
    }

    //add new
    public function add() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'DESIGNER' => trim($_POST['DESIGNER']),
            ];

            if (empty($data['DESIGNER'])) {
                $data['body_err'] = 'Please enter the desinger content';
            }

            //validate error free
            if (empty($data['body_err'])) {
                if ($this->postModel->addDesinger($data)) {
                    flash('postmessage', "Ajout,<br>"
                            . "<span style=' '>L&acute;ajout a &eacute;t&eacute; effectu&eacute; avec succ&egrave;ss.<span>");
                    redirect('designers');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('settings/desinger', $data);
            }
        } else {
            $data = [
                'DESIGNER' => (isset($_POST['DESIGNER']) ? trim($_POST['DESIGNER']) : '')
            ];
            $this->view('settings/desinger', $data);
        }
    }

    public function confirmdelete($id) {
        $desinger = $this->postModel->getDesingerById($id);
        $data = [
            'desingers' => $desinger, 'TitleProject' => 'Confirmation'
        ];
        $this->view('settings/designerdel', $data);
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                 'IDDESIGNER ' => $id,
                'DESIGNER' => trim($_POST['DESIGNER']),
                'SOCIETE' => trim($_POST['SOCIETE']),
                'EMAIL' => trim($_POST['EMAIL']),
                'CONTACT' => trim($_POST['CONTACT']),
                'DESCRIPTION' => trim($_POST['DESCRIPTION']),
            ];
            //validate the body
            if (empty($data['DESIGNER'])) {
                $data['desinger_err'] = 'Please enter the permission content';
            }

            //validate error free
            if (empty($data['desinger_err'])) {
                if ($this->postModel->updateDesinger($data)) {
                    flash('postmessage', "Modification, "
                            . "<span style=''>La modification a &eacute;t&eacute; effectu&eacute; avec succ&egrave;s.<span>");
                  redirect('desingers');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('settings/desingerupg', $data);
            }
        } else {
            $post = $this->postModel->getDesingerById($id);
            $data = [
                'IDDESIGNER ' => $id,
                'DESIGNER' => $post->DESIGNER,
                'SOCIETE' => $post->SOCIETE,
                'EMAIL' => $post->EMAIL,
                'CONTACT' => $post->CONTACT,
                'DESCRIPTION' => $post->DESCRIPTION, 
                'TitleProject' => 'Client'
            ];
            $this->view('settings/desingerupg', $data);
        }

        $desingers = $this->postModel->getDesingers();
        $data = ['desingerss' => $desingers];

        $this->view('settings/readdesinger', $data);
    }

    //delete post
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->deleteDesinger($id)) {
                flash('postmessage', "Suppression,<br>"
                        . "<span style=''>La suppression a r&eacute;ussi.<span>");
                redirect('designers');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('settings/designerdel');
        }
    }

}
