<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 26/03/2018
 * Time: 20:19
 */

class Topic extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('topic/topicModel');
    }

    public function processTopic()
    {
        $errors = array();

        $this->form_validation->set_rules('title_post', 'title', 'required|xss_clean|max_length[140]');
        $this->form_validation->set_rules('body_post','message','required|xss_clean');

        $id_user = $this->session->id;
        $id_board = $this->input->post('id_board');
        $title = $this->input->post('title_post');
        $body = $this->input->post('body_post');

        $dataMessages = array(
            'id_topic' => 0,
            'id_board' => $id_board,
            'id_user' => $id_user,
            'title' => $title,
            'body' => $body,
            'poster_time' => time()
        );

        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
        }elseif($this->topicModel->add_post($dataMessages) != '-1'){
            $errors['error'] = false;
            $errors['url'] = base_url('Forum/board/'.$id_board.'');
        }else{
            $errors['error'] = true;
        }

        echo json_encode($errors);

    }

    public function reply($id_topic)
    {
        $errors = array();
        $topic = $this->topicModel->get_data_topic_by_id($id_topic);

        $id_user = $this->session->id;
        $title = "RE: ".$topic[0]['title'];
        $body = $this->input->post('topic_body');

        $this->form_validation->set_rules('topic_body','message','required|xss_clean');

        $dataReply = array(
            'id_topic' => $topic[0]['id_topic'],
            'id_board' => $topic[0]['id_board'],
            'id_user' => $id_user,
            'title' => $title,
            'body' => $body,
            'poster_time' => time()
        );

        if($this->form_validation->run() == FALSE){
            $errors = $this->form_validation->error_array();
        }elseif($this->topicModel->add_reply($dataReply)){
            $errors['error'] = false;
        }else{
            $errors['error'] = true;
        }

        echo json_encode($errors);
    }

    public function processEdit()
    {
        $errors = new stdClass();

        $id_user = $this->session->id;
        $id_msg = $this->input->post('id_msg');
        $body_msg = $this->input->post('topic_body');
        $title_msg = $this->input->post('topic_title');

        $this->form_validation->set_rules('topic_body','message','required|xss_clean');

        $newDataMessage = [
            'body' => $body_msg,
            'modified_time' => time()
        ];

        if( !null == $title_msg ) {
           $newDataMessage['title'] = $title_msg;
        }


        if($this->form_validation->run() == FALSE){
            $errors->success = false;
            $errors->value = $this->form_validation->error_array();
        }elseif($this->topicModel->updateMessageTopic($id_msg, $newDataMessage)){
            $errors->success = true;
            $errors->value = 'Cambios Guardados correctamente';
            $errors->url = base_url('Forum/topic/');
        }else{
            $errors->success = false;
            $errors->value = 'No se pudo completar su solicitud en estos momentos.';
        }

        echo json_encode($errors);
    }

    public function closeTopic()
    {
        $error = new stdClass();

        $id_topic = $this->input->post('id_topic');
        $this->form_validation->set_rules('id_topic','id_topic','required|xss_clean|numeric');

        $newDataTopic = [
            'locked' => 1
        ];

        if($this->form_validation->run() == FALSE){
            $error->success = false;
            $error->value = $this->form_validation->error_string();
        }elseif (true === $this->topicModel->updateTopic($id_topic,$newDataTopic)) {
            $error->success = true;
            $error->value = 'El tema ha sido cerrado.';
        }else{
            $error->success = false;
            $error->value = 'Hubo un error y no se pudo completar su peticion.';
        }

        echo json_encode($error);
    }

}
