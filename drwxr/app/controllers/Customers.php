<?php

class Customers extends Controller {

    private $postModel;

    public function __construct() {
        //new model instance
        $this->postModel = $this->model('Customer');
    }

    public function index() {
        $customer = $this->postModel->getCustomers();
        $data = ['customers' => $customer, 'TitleProject' => 'Client'];
        $this->view('settings/customer', $data);
    }

    public function customers() {
        $customer = $this->postModel->getCustomers();
        $data = ['customers' => $customer,
            'TitleProject' => 'Client'];
        $this->view('settings/customer', $data);
    }
    //add new typeMissings
    public function add() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'CODECUSTOMER' => trim($_POST['CODECUSTOMER']),
                'RAISONSOCIAL' => trim($_POST['RAISONSOCIAL']),
                'ADRESSE' => trim($_POST['ADRESSE']),
                'EMAIL' => trim($_POST['EMAIL']),
                'CONTACT' => trim($_POST['CONTACT']),
                'NIF' => trim($_POST['NIF']),
                'STAT' => trim($_POST['STAT']),
                'RCS' => trim($_POST['RCS'])
            ];

            if (empty($data['RAISONSOCIAL'])) {
                $data['body_err'] = 'Please enter the customer content';
            }

            //validate error free
            if (empty($data['body_err'])) {
                if ($this->postModel->addCustomer($data)) {
                    flash('postmessage', "Ajout,  <br>"
                            . "<span style=' '>L&acute;ajout a &eacute;t&eacute; effectu&eacute; avec succ&egrave;ss.<span>");
                    redirect('customers');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('settings/customer', $data);
            }
        } else {
            $data = [
                'CODECUSTOMER' => (isset($_POST['CODECUSTOMER']) ? trim($_POST['CODECUSTOMER']) : ''),
                'RAISONSOCIAL' => (isset($_POST['RAISONSOCIAL']) ? trim($_POST['RAISONSOCIAL']) : ''),
                'ADRESSE' => (isset($_POST['ADRESSE']) ? trim($_POST['ADRESSE']) : ''),
                'EMAIL' => (isset($_POST['EMAIL']) ? trim($_POST['EMAIL']) : ''),
                'CONTACT' => (isset($_POST['CONTACT']) ? trim($_POST['CONTACT']) : ''),
                'NIF' => (isset($_POST['NIF']) ? trim($_POST['NIF']) : ''),
                'STAT' => (isset($_POST['NIF']) ? trim($_POST['STAT']) : ''),
                'RCS' => (isset($_POST['RCS']) ? trim($_POST['RCS']) : '')
            ];
            $this->view('settings/customer', $data);
        }
    }

    public function confirmdelete($id) {
        $customer = $this->postModel->getCustomerById($id);
        $data = [
            'customers' => $customer, 'TitleProject' => 'Confirmation'
        ];
        $this->view('settings/customerdel', $data);
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                 'IDCUSTOMER' => $id,
                'CODECUSTOMER' => trim($_POST['CODECUSTOMER']),
                'RAISONSOCIAL' => trim($_POST['RAISONSOCIAL']),
                'ADRESSE' => trim($_POST['ADRESSE']),
                'EMAIL' => trim($_POST['EMAIL']),
                'CONTACT' => trim($_POST['CONTACT']),
                'NIF' => trim($_POST['NIF']),
                'STAT' => trim($_POST['STAT']),
                'RCS' => trim($_POST['RCS']),
            ];
            //validate the body
            if (empty($data['RAISONSOCIAL'])) {
                $data['customer_err'] = 'Please enter the permission content';
            }

            //validate error free
            if (empty($data['customer_err'])) {
                if ($this->postModel->updateCustomer($data)) {
                    flash('postmessage', "Modification, <br>"
                            . "<span style=''>La modification a &eacute;t&eacute; effectu&eacute; avec succ&egrave;s.<span>");
                  redirect('customers');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('settings/customerupg', $data);
            }
        } else {
            $post = $this->postModel->getCustomerById($id);
            $data = [
                'IDCUSTOMER' => $id,
                'CODECUSTOMER' => $post->CODECUSTOMER,
                'RAISONSOCIAL' => $post->RAISONSOCIAL,
                'ADRESSE' => $post->ADRESSE,
                'EMAIL' => $post->EMAIL,
                'CONTACT' => $post->CONTACT,
                'NIF' => $post->NIF, 
                'STAT' => $post->STAT, 
                'RCS' => $post->RCS, 
                'TitleProject' => 'Client'
            ];
            $this->view('settings/customerupg', $data);
        }

        $customers = $this->postModel->getCustomers();
        $data = ['customerss' => $customers];

        $this->view('settings/readcustomer', $data);
    }

    //delete post
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->deleteCustomer($id)) {
                flash('postmessage', "Suppression,<br>"
                        . "<span style=''>La suppression a r&eacute;ussi.<span>");
                redirect('customers');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('settings/customerdel');
        }
    }

}
