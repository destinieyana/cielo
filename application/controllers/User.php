<?php

class User extends CI_Controller{

    const VALIDATION_ERROR_DOB = 'Invalid Date of Birth';
    const VALIDATION_ERROR_EMAIL = 'This email is already in use';
    const REGEX_DOB = '/^([0-9]{4})-([0-9]{2})-([0-9]{2})/';

	public function index()
	{
        $this->load->Helper(array('form', 'url'));
        $this->load->view('userform');
    }

    public function signup()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'callback_valid_date');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_valid_email');
        $this->form_validation->set_rules('fav_color', 'Favorite Color', 'required');

        if ($this->form_validation->run() == false){
            return $this->respond(400, ['error' => validation_errors()]);
        }

        // Quick API Response
        $this->respond(202, ['success' => "Form submitted successfully!"]);

        $this->addNewUser();
    }

    private function addNewUser()
    {
        $this->load->model('user_model');
        $this->user_model->insert_user_info();
    }

    private function respond(int $code, array $data)
    {
        $this->output->set_status_header($code);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
    }

    public function valid_date(string $date): bool
    {
        $this->form_validation->set_message('valid_date', self::VALIDATION_ERROR_DOB);

        if ( !preg_match(self::REGEX_DOB, $date)) {
            return false;
        }

        $arr = explode("-", $date);
        return ( checkdate($arr[1], $arr[2], $arr[0]) );
    }

    public function valid_email(string $email): bool {

        $this->load->model('user_model');

        if(!$this->user_model->emailIsUnique($email)) {
            $this->form_validation->set_message('valid_email', self::VALIDATION_ERROR_EMAIL);
            return false;
        }

        return true;
    }
}
