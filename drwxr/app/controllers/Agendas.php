<?php

class Agendas extends Controller {

    private $postModel;

    public function __construct() {
        //new model instance
        $this->postModel = $this->model('Agenda');
    }

    public function index() {
        $agenda = $this->postModel->getAgendas();
        $data = ['agendas' => $agenda, 'TitleProject' => 'Agenda'];
        $this->view('settings/agenda', $data);
    }

    public function agendas() {
        $agenda = $this->postModel->getAgendas();
        $data = ['agendas' => $agenda,
            'TitleProject' => 'Agenda'];
        $this->view('settings/agenda', $data);
    }

    //add new typeMissings
    public function add() {
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

            //validate error free
            if (empty($data['body_err'])) {
                if ($this->postModel->addAgenda($data)) {
                    flash('postmessage', "Ajout, <br>"
                            . "<span style=''>L&acute;ajout a &eacute;t&eacute; effectu&eacute; avec succ&egrave;ss.<span>");
                    redirect('agendas');
//                    redirect('settings/athome');
                } else {
                    die('something went wrong');
                }
            } else {
//                $this->view('athomes/add', $data);
                $this->view('settings/athome', $data);
            }
        } else {
            $data = [
                'DATEEVENT' => (isset($_POST['DATEEVENT']) ? trim($_POST['DATEEVENT']) : ''),
                'EVENT' => (isset($_POST['EVENT']) ? trim($_POST['EVENT']) : ''),
                'HORSBEGING' => (isset($_POST['HORSBEGING']) ? trim($_POST['HORSBEGING']) : ''),
                'HORSEND' => (isset($_POST['HORSEND']) ? trim($_POST['HORSEND']) : '')
            ];
            $this->view('settings/athome', $data);
        }
    }

    //show single post 
//    public function show($id) {
//        $post = $this->postModel->getAgendaById($id);
//        $data = [
//            'agenda' => $post
//        ];
//        $this->view('settings/agenda', $data);
//    }

    public function confirmdelete($id) {
        $agenda = $this->postModel->getAgendaById($id);
        $data = [
            'agendas' => $agenda, 'TitleProject' => 'Confirmation'
        ];
        $this->view('settings/agendadel', $data);
    }

//    public function edit($id) {
//        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//            $data = [
//                'IDAGENDA' => $id,
//                'AGENDA' => trim($_POST['AGENDA']),
//            ];
//            //validate the body
//            if (empty($data['AGENDA'])) {
//                $data['agenda_err'] = 'Please enter the post content';
//            }
//
//            //validate error free
//            if (empty($data['title_err']) && empty($data['agenda_err'])) {
//                if ($this->postModel->updateAgenda($data)) {
//                    flash('postmessage', "Succ&egrave;Ss, "
//                            . "<span style=' padding: 0 10px;'>La modification a &eacute;t&eacute; effectu&eacute; avec succ&egrave;s.<span>");
//                  redirect('agendas');
//                } else {
//                    die('something went wrong');
//                }
//            } else {
//                $this->view('settings/agendaedit', $data);
//            }
//        } else {
//            $post = $this->postModel->getAgendaById($id);
//            $data = [
//                'IDAGENDA' => $id,
//                'AGENDA' => $post->AGENDA, 'TitleProject' => 'Agenda'
//            ];
//            $this->view('settings/agendaedit', $data);
//        }
//
//        $agendas = $this->postModel->getAgendas();
//        $data = ['agendass' => $agendas];
//
//        $this->view('settings/agendaliste', $data);
//    }

    //delete post
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->deleteAgenda($id)) {
                flash('postmessage', "Suppression, <br>"
                        . "<span style=''>La suppression a r&eacute;ussi.<span>");
                redirect('agendas');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('settings/agendadel');
        }
    }

}
