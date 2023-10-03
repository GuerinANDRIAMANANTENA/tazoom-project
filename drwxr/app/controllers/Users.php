<?php

class Users extends Controller {

    private $postModel;

    public function __construct() {
        //new model instance
        $this->postModel = $this->model('User');
    }

    public function index() {
        $user = $this->postModel->getUsers();
        $data = ['users' => $user, 'TitleProject' => 'Liste utlisateur'];
        $this->view('settings/user', $data);
    }

    public function users() {
        $user = $this->postModel->getUsers();
        $data = ['readusers' => $user,
            'TitleProject' => 'Utilisateur'];
        $this->view('settings/readuser', $data);
    }

}
