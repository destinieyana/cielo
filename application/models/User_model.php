<?php

class User_model extends CI_model{
   
    public $name;
    public $date_of_birth;
    public $email;
    public $fav_color;

    public function __construct()
    {
        $this->load->database();
    }
    

    public function insert_user_info()
    {
       $this->name = $this->input->post('name'); 
       $this->date_of_birth = $this->input->post('date_of_birth');
       $this->email = $this->input->post('email'); 
       $this->fav_color = $this->input->post('fav_color');

       $this->db->insert('user_info', $this);
    }
}
