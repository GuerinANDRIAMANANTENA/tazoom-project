<?php

/*
 *     Created on : 14 mars 2023, 11:28:15
   *   Author     : GUERIN ANDRIAMANANTENA
   *   Framework to SINFO 1.0 Alpha version
   *   Developped by : GUERIN ANDRIAMANANTENA
   *    e-Mail      : ghyslainguerin@gmail.com 
 * AND guerinandriamanantena@outlook.com
   *   copyright (c) MARS 2023
   *   Database Configuration Class (MySqlidb)
   *   WordKey     : MVC, DEFINE ROOTPATH
   *   WhatApps : +261(0)346266633
 */

class Pages extends Controller {

    public function __construct() {
        $this->postModelOne = $this->model('User');
        $this->postModelTwo = $this->model('Caisse');
        $this->postModelTree = $this->model('Todolist');
        $this->postModelFour = $this->model('Agenda');
        $this->postModelFive = $this->model('Work');
    }

    public function index() {
        if (isLoggedIn()) {
//            redirect('910814');
        }

        $user = $this->postModelOne->getUsers();
        $allcaisse = $this->postModelTwo->getCaissesAll();
        $todolist = $this->postModelTree->getTodolists();
        $agenda = $this->postModelFour->getAgendastoday();
        $work = $this->postModelFive->getProductions();

        $data = [
            'By' => '910814211027',
            'Frameworkto' => 'Guerin ANDRIAMANANTENA',
            'Sutiation' => 'Ingénieur Informaticien',
            'Contact' => '+26134(0)6266633',
            'MailOne' => 'ghyslainguerin@gmail.com',
            'MailTwo' => 'guerinandriamanantena@outlook.com',
            'allcaisses' => $allcaisse, 
            'todolists' => $todolist, 
            'agendas' => $agenda,
            'works' => $work,
            'TitleProject' => 'Tableau de Bord',
            
            'users' => $user
        ];

        $this->view('pages/index', $data);
    }
    
    public function addtodolist() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'TODOLIST' => trim($_POST['TODOLIST']),
            ];

            if (empty($data['TODOLIST'])) {
                $data['body_err'] = 'Please enter the todolist content';
            }

            //validate error free
            if (empty($data['title_err']) && empty($data['body_err'])) {
                if ($this->postModelTree->addTodolist($data)) {
                    flash('postmessage', "Ajout,<br>"
                            . "<span style=''>L&acute;ajout a &eacute;t&eacute; effectu&eacute; avec succ&egrave;ss.<span>");
                    redirect('index');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('pages/index', $data);
            }
        } else {
            $data = [
                'TODOLIST' => (isset($_POST['TODOLIST']) ? trim($_POST['TODOLIST']) : '')
            ];
            $this->view('pages/index', $data);
        }
    }
    
    public function addagenda() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'DATEEVENT' => trim($_POST['DATEEVENT']),
                'EVENT' => trim($_POST['EVENT']),
                'HORSBEGING' => trim($_POST['HORSBEGING']),
                'HORSEND' => trim($_POST['HORSEND']),
            ];

            if (empty($data['EVENT'])) {
                $data['body_err'] = 'Please enter the athome content';
            }

            if (empty($data['body_err'])) {
                if ($this->postModelFour->addAgenda($data)) {
                    flash('postmessage', "Ajout, <br>"
                            . "<span style=''>L&acute;ajout a &eacute;t&eacute; effectu&eacute; avec succ&egrave;ss.<span>");
                    redirect('index');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('pages/index', $data);
            }
        } else {
            $data = [
                'DATEEVENT' => (isset($_POST['DATEEVENT']) ? trim($_POST['DATEEVENT']) : ''),
                'EVENT' => (isset($_POST['EVENT']) ? trim($_POST['EVENT']) : ''),
                'HORSBEGING' => (isset($_POST['HORSBEGING']) ? trim($_POST['HORSBEGING']) : ''),
                'HORSEND' => (isset($_POST['HORSEND']) ? trim($_POST['HORSEND']) : '')
            ];
            $this->view('pages/index', $data);
        }
    }
    
    public function addincaisse() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'DATETODAY' => trim($_POST['DATETODAY']),
                'NUMSUIVIE' => trim($_POST['NUMSUIVIE']),
                'NUMPIECE' => trim($_POST['NUMPIECE']),
                'DESIGNATION' => trim($_POST['DESIGNATION']),
                'INMONTANT' => trim($_POST['INMONTANT']),
                'OUTMONTANT' => trim($_POST['OUTMONTANT']),
                'USER' => trim($_POST['USER']),
                'TYPECAISSE' => trim($_POST['TYPECAISSE']),
            ];

            if (empty($data['EVENT'])) {
                $data['body_err'] = 'Please enter the athome content';
            }

            if (empty($data['body_err'])) {
                if ($this->postModelTwo->addCaisse($data)) {
                    flash('postmessage', "Ajout, <br>"
                            . "<span style=''>L&acute;ajout a &eacute;t&eacute; effectu&eacute; avec succ&egrave;ss.<span>");
                    redirect('index');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('pages/index', $data);
            }
        } else {
            $data = [
                'DATETODAY' => (isset($_POST['DATETODAY']) ? trim($_POST['DATETODAY']) : ''),
                'NUMSUIVIE' => (isset($_POST['NUMSUIVIE']) ? trim($_POST['NUMSUIVIE']) : ''),
                'NUMPIECE' => (isset($_POST['NUMPIECE']) ? trim($_POST['NUMPIECE']) : ''),
                'DESIGNATION' => (isset($_POST['DESIGNATION']) ? trim($_POST['DESIGNATION']) : ''),
                'INMONTANT' => (isset($_POST['INMONTANT']) ? trim($_POST['INMONTANT']) : ''),
                'OUTMONTANT' => (isset($_POST['OUTMONTANT']) ? trim($_POST['OUTMONTANT']) : ''),
                'USER' => (isset($_POST['USER']) ? trim($_POST['USER']) : ''),
                'TYPECAISSE' => (isset($_POST['TYPECAISSE']) ? trim($_POST['TYPECAISSE']) : '')
            ];
            $this->view('pages/index', $data);
        }
    }

}
