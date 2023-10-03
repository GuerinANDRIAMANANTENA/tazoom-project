<?php

class Caisses extends Controller {

    private $postModel;

    public function __construct() {
        //new model instance
        $this->postModel = $this->model('Caisse');
    }

    public function index() {
        $caissein = $this->postModel->getCaissesIn();
        $caisseout = $this->postModel->getCaissesOut();
        $approcaisse = $this->postModel->getCaissesApprocaisse();
        $data = [
            'incaisses' => $caissein, 
            'outcaisses' => $caisseout, 
            'approcaisses' => $approcaisse, 
            'TitleProject' => 'Caisses'];
        $this->view('pages/caisse', $data);
    }

    public function caisses() {
        $caisse = $this->postModel->getCaisses();
        $data = ['caisses' => $caisse,
            'TitleProject' => 'Caisse'];
        $this->view('pages/caisse', $data);
    }

    //add new typeMissings
//    public function add() {
//        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//            $data = [
//                'DATETODAY' => trim($_POST['DATETODAY']),
//                'NUMSUIVIE' => trim($_POST['NUMSUIVIE']),
//                'NUMPIECE' => trim($_POST['NUMPIECE']),
//                'DESIGNATION' => trim($_POST['DESIGNATION']),
//                'INMONTANT' => trim($_POST['INMONTANT']),
//                'OUTMONTANT' => trim($_POST['OUTMONTANT']),
//                'USER' => trim($_POST['USER']),
//                'TYPECAISSE' => trim($_POST['TYPECAISSE']),
//            ];
//
//            if (empty($data['CAISSE'])) {
//                $data['body_err'] = 'Please enter the caisse content';
//            }
//
//            //validate error free
//            if (empty($data['body_err'])) {
//                if ($this->postModel->addCaisse($data)) {
//                    flash('postmessage', "Ajout,  <br>"
//                            . "<span style=' '>L&acute;ajout a &eacute;t&eacute; effectu&eacute; avec succ&egrave;ss.<span>");
//                    redirect('index');
//                } else {
//                    die('something went wrong');
//                }
//            } else {
//                $this->view('pages/index', $data);
//            }
//        } else {
//            $data = [
//                'DATETODAY' => (isset($_POST['DATETODAY']) ? trim($_POST['DATETODAY']) : ''),
//                'NUMSUIVIE' => (isset($_POST['NUMSUIVIE']) ? trim($_POST['NUMSUIVIE']) : ''),
//                'NUMPIECE' => (isset($_POST['NUMPIECE']) ? trim($_POST['NUMPIECE']) : ''),
//                'DESIGNATION' => (isset($_POST['DESIGNATION']) ? trim($_POST['DESIGNATION']) : ''),
//                'INMONTANT' => (isset($_POST['INMONTANT']) ? trim($_POST['INMONTANT']) : ''),
//                'OUTMONTANT' => (isset($_POST['OUTMONTANT']) ? trim($_POST['OUTMONTANT']) : ''),
//                'USER' => (isset($_POST['USER']) ? trim($_POST['USER']) : ''),
//                'TYPECAISSE' => (isset($_POST['TYPECAISSE']) ? trim($_POST['TYPECAISSE']) : '')
//            ];
//            $this->view('pages/index', $data);
//        }
//    }

    public function confirmdelete($id) {
        $caisse = $this->postModel->getCaisseById($id);
        $data = [
            'caisses' => $caisse, 'TitleProject' => 'Confirmation'
        ];
        $this->view('pages/caissedel', $data);
    }

//    public function edit($id) {
//        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//            $data = [
//                'IDCAISSE ' => $id,
//                'CAISSE' => trim($_POST['CAISSE']),
//                'SOCIETE' => trim($_POST['SOCIETE']),
//                'EMAIL' => trim($_POST['EMAIL']),
//                'CONTACT' => trim($_POST['CONTACT']),
//                'DESCRIPTION' => trim($_POST['DESCRIPTION']),
//            ];
//            //validate the body
//            if (empty($data['CAISSE'])) {
//                $data['caisse_err'] = 'Please enter the permission content';
//            }
//
//            //validate error free
//            if (empty($data['caisse_err'])) {
//                if ($this->postModel->updateCaisse($data)) {
//                    flash('postmessage', "Modification, <br>"
//                            . "<span style=''>La modification a &eacute;t&eacute; effectu&eacute; avec succ&egrave;s.<span>");
//                    redirect('caisses');
//                } else {
//                    die('something went wrong');
//                }
//            } else {
//                $this->view('pages/caisseupg', $data);
//            }
//        } else {
//            $post = $this->postModel->getCaisseById($id);
//            $data = [
//                'IDCAISSE ' => $id,
//                'CAISSE' => $post->CAISSE,
//                'SOCIETE' => $post->SOCIETE,
//                'EMAIL' => $post->EMAIL,
//                'CONTACT' => $post->CONTACT,
//                'DESCRIPTION' => $post->DESCRIPTION,
//                'TitleProject' => 'Client'
//            ];
//            $this->view('pages/caisseupg', $data);
//        }
//
//        $caisses = $this->postModel->getCaisses();
//        $data = ['caissess' => $caisses];
//
//        $this->view('pages/readcaisse', $data);
//    }

    //delete post
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->deleteCaisse($id)) {
                flash('postmessage', "Suppression,<br>"
                        . "<span style=''>La suppression a r&eacute;ussi.<span>");
                redirect('caisses');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('pages/caissedel');
        }
    }

}
