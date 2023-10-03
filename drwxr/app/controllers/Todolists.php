<?php

class Todolists extends Controller {

    private $postModel;

    public function __construct() {
//        if (!isLoggedIn()) {
//            redirect('users/login');
//        }
//        
        //new model instance
        $this->postModel = $this->model('Todolist');
    }

    public function index() {
        $todolist = $this->postModel->getTodolists();
        $data = ['todolists' => $todolist, 'TitleProject' => 'To do list'];
        $this->view('settings/todolist', $data);
    }

    public function todolists() {
        $todolist = $this->postModel->getTodolists();
        $data = ['todolists' => $todolist,
            'TitleProject' => 'To do list'];
        $this->view('settings/todolist', $data);
    }

    public function todolistindex() {
//        $todolists = $this->postModel->getTodolists();
//        $data = ['tbtodolist' => $todolists];
//
//        $this->view('settings/todolist', $data);
    }

    //add new typeMissings
    public function add() {
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
                if ($this->postModel->addTodolist($data)) {
                    flash('postmessage', "Ajout,<br>"
                            . "<span style=''>L&acute;ajout a &eacute;t&eacute; effectu&eacute; avec succ&egrave;ss.<span>");
                    redirect('todolists');
//                    redirect('settings/todolist');
                } else {
                    die('something went wrong');
                }
            } else {
//                $this->view('todolists/add', $data);
                $this->view('settings/todolist', $data);
            }
        } else {
            $data = [
                'TODOLIST' => (isset($_POST['TODOLIST']) ? trim($_POST['TODOLIST']) : '')
            ];
            $this->view('settings/todolist', $data);
        }
    }

    //show single post 
    public function show($id) {
        $post = $this->postModel->getTodolistById($id);
        $data = [
            'todolist' => $post
        ];
        $this->view('settings/todolist', $data);
    }

    public function confirmdelete($id) {
        $todolist = $this->postModel->getTodolistById($id);
        $data = [
            'todolists' => $todolist, 'TitleProject' => 'Confirmation'
        ];
        $this->view('settings/todolistdel', $data);
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'IDTODOLIST' => $id,
                'TODOLIST' => trim($_POST['TODOLIST']),
            ];
            //validate the body
            if (empty($data['TODOLIST'])) {
                $data['body_err'] = 'Please enter the post content';
            }

            //validate error free
            if (empty($data['title_err']) && empty($data['body_err'])) {
                if ($this->postModel->updateTodolist($data)) {
                    flash('postmessage', "Succ&egrave;Ss,<br> "
                            . "<span style=' '>La modification a &eacute;t&eacute; effectu&eacute; avec succ&egrave;s.<span>");
//                    redirect('settings/todolist');
                    redirect('todolists');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('settings/todolistedit', $data);
            }
        } else {
            $post = $this->postModel->getTodolistById($id);
            $data = [
                'IDTODOLIST' => $id,
                'TODOLIST' => $post->TODOLIST, 'TitleProject' => 'To do list'
            ];
            $this->view('settings/todolistedit', $data);
        }

        $todolists = $this->postModel->getTodolists();
        $data = ['todolistss' => $todolists];

        $this->view('settings/todolistliste', $data);
    }

    //delete post
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->deleteTodolist($id)) {
                flash('postmessage', "Suppression,<br>"
                        . "<span style=''>La suppression a r&eacute;ussi.<span>");
                redirect('todolists');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('settings/todolistdel');
        }
    }

}
