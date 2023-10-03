<?php

class Activitys extends Controller {

    private $postmodel;

    public function __construct() {
        $this->postmodel = $this->model('Activity');
    }

    public function index() {
        $activity = $this->postmodel->getActivitys();
        $data = ['activitys' => $activity, 'TitleProject' => 'Activit&eacute;'];
        $this->view('pages/activity', $data);
    }

    public function activitys() {
        $activity = $this->postmodel->getActivitys();
        $data = ['activitys' => $activity,
            'TitleProject' => 'Activity'];
        $this->view('pages/activity', $data);
    }

    //add new
    public function add() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'ACTIVITY' => trim($_POST['ACTIVITY']),
            ];

            if (empty($data['ACTIVITY'])) {
                $data['body_err'] = 'Please enter the activity content';
            }

            //validate error free
            if (empty($data['body_err'])) {
                if ($this->postmodel->addActivity($data)) {
                    flash('postmessage', "Ajout,<br>"
                            . "<span style=' '>L&acute;ajout a &eacute;t&eacute; effectu&eacute; avec succ&egrave;ss.<span>");
                    redirect('activitys');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('pages/activity', $data);
            }
        } else {
            $data = [
                'ACTIVITY' => (isset($_POST['ACTIVITY']) ? trim($_POST['ACTIVITY']) : '')
            ];
            $this->view('pages/activity', $data);
        }
    }

    public function confirmdelete($id) {
        $activity = $this->postmodel->getActivityById($id);
        $data = [
            'activitys' => $activity, 'TitleProject' => 'Confirmation'
        ];
        $this->view('pages/activitydel', $data);
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                 'IDACTIVITY ' => $id,
                'ACTIVITY' => trim($_POST['ACTIVITY']),
                'SOCIETE' => trim($_POST['SOCIETE']),
                'EMAIL' => trim($_POST['EMAIL']),
                'CONTACT' => trim($_POST['CONTACT']),
                'DESCRIPTION' => trim($_POST['DESCRIPTION']),
            ];
            //validate the body
            if (empty($data['ACTIVITY'])) {
                $data['activity_err'] = 'Please enter the permission content';
            }

            //validate error free
            if (empty($data['activity_err'])) {
                if ($this->postmodel->updateActivity($data)) {
                    flash('postmessage', "Modification, "
                            . "<span style=''>La modification a &eacute;t&eacute; effectu&eacute; avec succ&egrave;s.<span>");
                  redirect('activitys');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('pages/activityupg', $data);
            }
        } else {
            $post = $this->postmodel->getActivityById($id);
            $data = [
                'IDACTIVITY ' => $id,
                'ACTIVITY' => $post->ACTIVITY,
                'SOCIETE' => $post->SOCIETE,
                'EMAIL' => $post->EMAIL,
                'CONTACT' => $post->CONTACT,
                'DESCRIPTION' => $post->DESCRIPTION, 
                'TitleProject' => 'Client'
            ];
            $this->view('pages/activityupg', $data);
        }

        $activitys = $this->postmodel->getActivitys();
        $data = ['activityss' => $activitys];

        $this->view('pages/readactivity', $data);
    }

    //delete post
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postmodel->deleteActivity($id)) {
                flash('postmessage', "Suppression,<br>"
                        . "<span style=''>La suppression a r&eacute;ussi.<span>");
                redirect('activitys');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('pages/activitydel');
        }
    }

}
