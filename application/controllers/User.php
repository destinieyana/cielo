<?php

class User extends CI_Controller{

	public function index()
	{
        //echo "Hello World";
        $this->load->Helper(array('form', 'url'));
        $this->load->view('userform');
    }

    public function signup()
    {
       //use $this->input->post('value');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'callback_valid_date');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('fav_color', 'Favorite Color', 'required');

        if ($this->form_validation->run() == false){
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            echo json_encode(['success' => "Form submitted successfully!"]);
            $this->load->model('user_model');
            try {
                $this->user_model->insert_user_info();
            } catch (\Exception $e) {
                print_r($e->getMessage());
            }
        }
    }

    public function valid_date($date)
    {
        $this->form_validation->set_message('valid_date', 'Invalid Date of Birth');

        if ( preg_match("/([0-9]{4})-([0-9]{2})-([0-9]{2})/", $date)) {
            $arr = explode("-", $date);
            $yyyy = $arr[0];
            $mm = $arr[1];
            $dd = $arr[2];
            return ( checkdate($mm, $dd, $yyyy) );
        } else {
            return false;
        }
    }

}
