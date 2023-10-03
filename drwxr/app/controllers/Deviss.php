<?php

class Deviss extends Controller {

    private $postModel;

    public function __construct() {
        //new model instance
        $this->postModel = $this->model('Devis');
        $this->postModelTwo = $this->model('Customer');
    }

    public function index() {
        $deviss = $this->postModel->getDeviss();
        $data = ['deviss' => $deviss, 'TitleProject' => 'Nouveau devis'];
        $this->view('pages/newdevis', $data);
    }

    public function deviss() {
        $devis = $this->postModel->getDeviss();
        $data = ['deviss' => $devis,
            'TitleProject' => 'Devis'];
        $this->view('pages/newdevis', $data);
    }
    public function selectcus() {
        $customer = $this->postModelTwo->getCustomers();
        $data = ['customers' => $customer];
        $this->view('pages/selectcustumer', $data);
    }


    //add new typeMissings
    public function add() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'FAMILLE' => trim($_POST['FAMILLE']),
                'SOUSFAMILLE' => trim($_POST['SOUSFAMILLE']),
                'DESIGNATION' => trim($_POST['DESIGNATION']),
                'QTE' => trim($_POST['QTE']),
                'PU' => trim($_POST['PU']),
                'DESCRIPTION' => trim($_POST['DESCRIPTION']),
                'ACTIVITE' => trim($_POST['ACTIVITE']),
                'SESSION' => trim($_POST['SESSION']),
            ];

            if (empty($data['FAMILLE'])) {
                $data['body_err'] = 'Please enter the devis content';
            }

            //validate error free
            if (empty($data['body_err'])) {
                if ($this->postModel->addDevis($data)) {
                    flash('postmessage', "Ajout,  <br>"
                            . "<span style=' '>L&acute;ajout a &eacute;t&eacute; effectu&eacute; avec succ&egrave;ss.<span>");
                    redirect('deviss');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('pages/newdevis', $data);
            }
        } else {
            $data = [
                'FAMILLE' => (isset($_POST['FAMILLE']) ? trim($_POST['FAMILLE']) : ''),
                'SOUSFAMILLE' => (isset($_POST['SOUSFAMILLE']) ? trim($_POST['SOUSFAMILLE']) : ''),
                'DESIGNATION' => (isset($_POST['DESIGNATION']) ? trim($_POST['DESIGNATION']) : ''),
                'QTE' => (isset($_POST['QTE']) ? trim($_POST['QTE']) : ''),
                'PU' => (isset($_POST['PU']) ? trim($_POST['PU']) : ''),
                'DESCRIPTION' => (isset($_POST['DESCRIPTION']) ? trim($_POST['DESCRIPTION']) : ''),
                'PU' => (isset($_POST['PU']) ? trim($_POST['PU']) : ''),
                'ACTIVITE' => (isset($_POST['PU']) ? trim($_POST['ACTIVITE']) : ''),
                'SESSION' => (isset($_POST['PU']) ? trim($_POST['SESSION']) : '')
            ];
            $this->view('pages/newdevis', $data);
        }
    }

    public function confirmdelete($id) {
        $devis = $this->postModel->getDevisById($id);
        $data = [
            'deviss' => $devis, 'TitleProject' => 'Confirmation'
        ];
        $this->view('pages/newdevisdel', $data);
    }
    
    public function selectcuslabel($id) {
        $customer = $this->postModelTwo->getLoadCustomerById($id);
        $deviss = $this->postModel->getDeviss();
        
        $data = ['customers' => $customer, 'deviss' => $deviss];
        $this->view('pages/newdevis', $data);
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'IDCUSTOMER ' => $id,
                'CODECUSTOMER' => trim($_POST['CODECUSTOMER']),
                'RAISONSOCIAL' => trim($_POST['RAISONSOCIAL']),
                'ADRESSE' => trim($_POST['ADRESSE']),
                'NIF' => trim($_POST['NIF']),
                'STAT'=> trim($_POST['STAT']),
                'RCS' => trim($_POST['RCS']),
            ];
            //validate the body
            if (empty($data['CUSTOMER'])) {
                $data['devis_err'] = 'Please enter the permission content';
            }

            //validate error free
            if (empty($data['devis_err'])) {
                if ($this->postModel->updateDevis($data)) {
                    flash('postmessage', "Modification, <br>"
                            . "<span style=''>La modification a &eacute;t&eacute; effectu&eacute; avec succ&egrave;s.<span>");
                  redirect('deviss');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('pages/newdevisupg', $data);
            }
        } else {
            $post = $this->postModel->getDevisById($id);
            $data = [
                'IDCUSTOMER ' => $id,
                'CODECUSTOMER' => $post->CODECUSTOMER,
                'RAISONSOCIAL' => $post->RAISONSOCIAL,
                'ADRESSE' => $post->ADRESSE,
                'NIF' => $post->NIF,
                'STAT' => $post->STAT,
                'RCS' => $post->RCS
            ];
            $this->view('pages/newdevisupg', $data);
        }

        $deviss = $this->postModel->getDeviss();
        $data = ['devisss' => $deviss];

        $this->view('settings/readdevis', $data);
    }

    //delete post
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->deleteDevis($id)) {
                flash('postmessage', "Suppression,<br>"
                        . "<span style=''>La suppression a r&eacute;ussi.<span>");
                redirect('deviss');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('pages/newdevisdel');
        }
    }

}
