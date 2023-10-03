<?php

class Formats extends Controller {

    private $postModel;

    public function __construct() {
        //new model instance
        $this->postModel = $this->model('Format');
    }

    public function index() {
        $format = $this->postModel->getformats();
        $data = ['formats' => $format, 'TitleProject' => 'Type du format/famille'];
        $this->view('settings/format', $data);
    }

    public function formats() {
        $format = $this->postModel->getformats();
        $data = ['formats' => $format,
            'TitleProject' => 'format'];
        $this->view('settings/format', $data);
    }

    //add new
    public function add() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'FORMAT' => trim($_POST['FORMAT']),
            ];

            if (empty($data['FORMAT'])) {
                $data['body_err'] = 'Please enter the format content';
            }

            //validate error free
            if (empty($data['body_err'])) {
                if ($this->postModel->addformat($data)) {
                    flash('postmessage', "Ajout,<br>"
                            . "<span style=' '>L&acute;ajout a &eacute;t&eacute; effectu&eacute; avec succ&egrave;ss.<span>");
                    redirect('formats');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('settings/format', $data);
            }
        } else {
            $data = [
                'FORMAT' => (isset($_POST['FORMAT']) ? trim($_POST['FORMAT']) : '')
            ];
            $this->view('settings/format', $data);
        }
    }

    public function confirmdelete($id) {
        $format = $this->postModel->getformatById($id);
        $data = [
            'formats' => $format, 'TitleProject' => 'Confirmation'
        ];
        $this->view('settings/formatdel', $data);
    }

    
    //delete post
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->deleteformat($id)) {
                flash('postmessage', "Suppression,<br>"
                        . "<span style=' '>La suppression a r&eacute;ussi.<span>");
                redirect('formats');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('settings/formatdel');
        }
    }

}
