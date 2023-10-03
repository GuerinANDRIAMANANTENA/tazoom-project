<?php

class Upgradpwds extends Controller {
//class Upgradpwds {

    public function __construct() {
        $this->postModelOne = $this->model('User');
    }

    public function index() {
        $user = $this->postModelOne->getUsers();
        $data = [
            'users' => $user,
            'titleOne' => 'Utilisateur',
            'titleTwo' => 'Changement mot de passe'
        ];

        $this->view('settings/upgradpwd', $data);
    }

}
