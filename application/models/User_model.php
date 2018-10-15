<?php

class User_model extends CI_model{
   
    const TABLE_NAME = 'user';

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

       // Try to insert the user. Log any failures so we can backfill later
       try {
           $this->db->insert(self::TABLE_NAME, $this);
       } catch (\Exception $e) {

           error_log(sprintf("Failed to insert the following user: Name(%s) DOB(%s) Email(%s) FavColor(%s)",
               $this->name,
               $this->date_of_birth,
               $this->email,
               $this->fav_color
           ));
       }
    }

    public function emailIsUnique(string $email): bool
    {
        return !$this->db->get_where(self::TABLE_NAME, array('email' => $email), 1)->num_rows();
    }
}
