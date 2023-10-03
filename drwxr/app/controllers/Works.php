<?php

class Works extends Controller {

    private $postModel;

    public function __construct() {
        //new model instance
        $this->postModel = $this->model('Work');
    }

    public function index() {
        $work = $this->postModel->getProductions();
        $data = ['works' => $work, 'TitleProject' => 'Nouveau travaux'];
        $this->view('pages/work', $data);
    }

    public function works() {
        $work = $this->postModel->getProductions();
        $data = ['works' => $work,
            'TitleProject' => 'Production'];
        $this->view('pages/work', $data);
    }

    //add new typeMissings
    public function add() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'DATETODAY' => trim($_POST['DATETODAY']),
                'NUMSUIVIE' => trim($_POST['NUMSUIVIE']),
                'NUMBA' => trim($_POST['NUMBA']),
                'CUSTOMER' => trim($_POST['CUSTOMER']),
                'NUMBCPO' => trim($_POST['NUMBCPO']),
                'DESIGNATION' => trim($_POST['DESIGNATION']),
                'MEDIA' => trim($_POST['MEDIA']),
                'DIMENTION' => trim($_POST['DIMENTION']),
                'FORMAT' => trim($_POST['FORMAT']),
                'FINITIONS' => trim($_POST['FINITIONS']),
                'QUANTITE' => trim($_POST['QUANTITE']),
                'DEADLINE' => trim($_POST['DEADLINE']),
                'DESIGNER' => trim($_POST['DESIGNER']),
                'LIVREELE' => trim($_POST['LIVREELE']),
                'REMARQUE' => trim($_POST['REMARQUE']),
                'STATUS' => trim($_POST['STATUS']),
                'USERRECU' => trim($_POST['USERRECU']),
                'YEARNOW' => trim($_POST['YEARNOW']),
            ];

            if (empty($data['CUSTOMER'])) {
                $data['body_err'] = 'Please enter the work content';
            }

            //validate error free
            if (empty($data['body_err'])) {
                if ($this->postModel->addProduction($data)) {
                    flash('postmessage', "Ajout,  <br>"
                            . "<span style=' '>L&acute;ajout a &eacute;t&eacute; effectu&eacute; avec succ&egrave;ss.<span>");
                    redirect('works');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('pages/work', $data);
            }
        } else {
            $data = [
                 'DATETODAY' => (isset($_POST['DATETODAY']) ? trim($_POST['DATETODAY']) : ''),
                 'NUMSUIVIE' => (isset($_POST['NUMSUIVIE']) ? trim($_POST['NUMSUIVIE']) : ''),
                 'NUMBA' => (isset($_POST['NUMBA']) ? trim($_POST['NUMBA']) : ''),
                 'CUSTOMER' => (isset($_POST['CUSTOMER']) ? trim($_POST['CUSTOMER']) : ''),
                 'NUMBCPO' => (isset($_POST['NUMBCPO']) ? trim($_POST['NUMBCPO']) : ''),
                 'DESIGNATION' => (isset($_POST['DESIGNATION']) ? trim($_POST['DESIGNATION']) : ''),
                 'MEDIA' => (isset($_POST['MEDIA']) ? trim($_POST['MEDIA']) : ''),
                 'DIMENTION' => (isset($_POST['DIMENTION']) ? trim($_POST['DIMENTION']) : ''),
                 'FORMAT' => (isset($_POST['FORMAT']) ? trim($_POST['FORMAT']) : ''),
                 'FINITIONS' => (isset($_POST['FINITIONS']) ? trim($_POST['FINITIONS']) : ''),
                 'QUANTITE' => (isset($_POST['QUANTITE']) ? trim($_POST['QUANTITE']) : ''),
                 'DEADLINE' => (isset($_POST['DEADLINE']) ? trim($_POST['DEADLINE']) : ''),
                 'DESIGNER' => (isset($_POST['DESIGNER']) ? trim($_POST['DESIGNER']) : ''),
                 'LIVREELE' => (isset($_POST['LIVREELE']) ? trim($_POST['LIVREELE']) : ''),
                 'REMARQUE' => (isset($_POST['REMARQUE']) ? trim($_POST['REMARQUE']) : ''),
                 'STATUS' => (isset($_POST['STATUS']) ? trim($_POST['STATUS']) : ''),
                 'USERRECU' => (isset($_POST['USERRECU']) ? trim($_POST['USERRECU']) : ''),
                 'YEARNOW' => (isset($_POST['YEARNOW']) ? trim($_POST['YEARNOW']) : ''),
            ];
            $this->view('pages/work', $data);
        }
    }

    public function confirmdelete($id) {
        $work = $this->postModel->getProductionById($id);
        $data = [
            'works' => $work, 'TitleProject' => 'Confirmation'
        ];
        $this->view('pages/workdel', $data);
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'IDPRODUCTION' => $id,
                'DATETODAY' => trim($_POST['DATETODAY']),
                'NUMSUIVIE' => trim($_POST['NUMSUIVIE']),
                'NUMBA' => trim($_POST['NUMBA']),
                'CUSTOMER' => trim($_POST['CUSTOMER']),
                'NUMBCPO' => trim($_POST['NUMBCPO']),
                'DESIGNATION' => trim($_POST['DESIGNATION']),
                'MEDIA' => trim($_POST['MEDIA']),
                'DIMENTION' => trim($_POST['DIMENTION']),
                'FORMAT' => trim($_POST['FORMAT']),
                'FINITIONS' => trim($_POST['FINITIONS']),
                'QUANTITE' => trim($_POST['QUANTITE']),
                'DEADLINE' => trim($_POST['DEADLINE']),
                'DESIGNER' => trim($_POST['DESIGNER']),
                'LIVREELE' => trim($_POST['LIVREELE']),
                'REMARQUE' => trim($_POST['REMARQUE']),
                'STATUS' => trim($_POST['STATUS']),
                'USERRECU' => trim($_POST['USERRECU']),
                'YEARNOW' => trim($_POST['YEARNOW']),
            ];
            //validate the body
            if (empty($data['CUSTOMER'])) {
                $data['work_err'] = 'Please enter the permission content';
            }

            //validate error free
            if (empty($data['work_err'])) {
                if ($this->postModel->updateProduction($data)) {
                    flash('postmessage', "Modification, <br>"
                            . "<span style=''>La modification a &eacute;t&eacute; effectu&eacute; avec succ&egrave;s.<span>");
                    redirect('works');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('pages/workupg', $data);
            }
        } else {
            $post = $this->postModel->getProductionById($id);
            $data = [
                
                'IDPRODUCTION' => $id,
                'DATETODAY' => $post->DATETODAY,
                'NUMSUIVIE' => $post->NUMSUIVIE,
                'NUMBA' => $post->NUMBA,
                'CUSTOMER' => $post->CUSTOMER,
                'NUMBCPO' => $post->NUMBCPO,
                'DESIGNATION' => $post->DESIGNATION,
                'MEDIA' => $post->MEDIA,
                'DIMENTION' => $post->DIMENTION,
                'FORMAT' => $post->FORMAT,
                'FINITIONS' => $post->FINITIONS,
                'QUANTITE' => $post->QUANTITE,
                'DEADLINE' => $post->DEADLINE,
                'DESIGNER' => $post->DESIGNER,
                'LIVREELE' => $post->LIVREELE,
                'REMARQUE' => $post->REMARQUE,
                'STATUS' => $post->STATUS,
                'USERRECU' => $post->USERRECU,
                'YEARNOW' => $post->YEARNOW,
                
                'TitleProject' => 'Travaux'
            ];
            $this->view('pages/workupg', $data);
        }

        $works = $this->postModel->getProductions();
        $data = ['workss' => $works];

        $this->view('pages/readwork', $data);
    }

    //delete post
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->deleteProduction($id)) {
                flash('postmessage', "Suppression,<br>"
                        . "<span style=''>La suppression a r&eacute;ussi.<span>");
                redirect('works');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('pages/workdel');
        }
    }

}
