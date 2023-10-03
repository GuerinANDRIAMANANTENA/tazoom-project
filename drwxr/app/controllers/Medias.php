<?php

class Medias extends Controller {

    private $postModel;

    public function __construct() {
        //new model instance
        $this->postModel = $this->model('Media');
    }

    public function index() {
        $media = $this->postModel->getMedias();
        $data = ['medias' => $media, 'TitleProject' => 'Section'];
        $this->view('settings/media', $data);
    }

    public function medias() {
        $media = $this->postModel->getMedias();
        $data = ['medias' => $media,
            'TitleProject' => 'Media'];
        $this->view('settings/media', $data);
    }

    //add new
    public function add() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'MEDIA' => trim($_POST['MEDIA']),
            ];

            if (empty($data['MEDIA'])) {
                $data['body_err'] = 'Please enter the media content';
            }

            //validate error free
            if (empty($data['body_err'])) {
                if ($this->postModel->addMedia($data)) {
                    flash('postmessage', "Ajout, <bWte;ajout a &eacute;t&eacute; effectu&eacute; avec succ&egrave;ss.<span>");
                    redirect('medias');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('settings/media', $data);
            }
        } else {
            $data = [
                'MEDIA' => (isset($_POST['MEDIA']) ? trim($_POST['MEDIA']) : '')
            ];
            $this->view('settings/media', $data);
        }
    }

    public function confirmdelete($id) {
        $media = $this->postModel->getMediaById($id);
        $data = [
            'medias' => $media, 'TitleProject' => 'Confirmation'
        ];
        $this->view('settings/mediadel', $data);
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                 'IDMEDIA ' => $id,
                'MEDIA' => trim($_POST['MEDIA']),
                'SOCIETE' => trim($_POST['SOCIETE']),
                'EMAIL' => trim($_POST['EMAIL']),
                'CONTACT' => trim($_POST['CONTACT']),
                'DESCRIPTION' => trim($_POST['DESCRIPTION']),
            ];
            //validate the body
            if (empty($data['MEDIA'])) {
                $data['media_err'] = 'Please enter the permission content';
            }

            //validate error free
            if (empty($data['media_err'])) {
                if ($this->postModel->updateMedia($data)) {
                    flash('postmessage', "Modification,<br>"
                            . "<span style=''>La modification a &eacute;t&eacute; effectu&eacute; avec succ&egrave;s.<span>");
                  redirect('medias');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('settings/mediaupg', $data);
            }
        } else {
            $post = $this->postModel->getMediaById($id);
            $data = [
                'IDMEDIA ' => $id,
                'MEDIA' => $post->MEDIA,
                'SOCIETE' => $post->SOCIETE,
                'EMAIL' => $post->EMAIL,
                'CONTACT' => $post->CONTACT,
                'DESCRIPTION' => $post->DESCRIPTION, 
                'TitleProject' => 'Client'
            ];
            $this->view('settings/mediaupg', $data);
        }

        $medias = $this->postModel->getMedias();
        $data = ['mediass' => $medias];

        $this->view('settings/readmedia', $data);
    }

    //delete post
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->deleteMedia($id)) {
                flash('postmessage', "Suppression,<br>"
                        . "<span style=''>La suppression a r&eacute;ussi.<span>");
                redirect('medias');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('settings/mediadel');
        }
    }

}
