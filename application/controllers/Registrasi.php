<?php 
    class registrasi extends CI_Controller
    { 
        public function index() 
        { 
            $this->form_validation->set_rules('nama','Nama','required',['required'=>'Nama Wajib Diisi']); 
            $this->form_validation->set_rules('username','Username','required',['required'=>'Username wajib diisi']);
            $this->form_validation->set_rules('register_password','Password','required',['required' =>'password wajib diisi']); 
            $this->form_validation->set_rules('register_email','Email','required',['required' =>'email wajib diisi']); 
            if($this->form_validation->run() == FALSE)
            { 
                redirect('auth/login'); 
            }
            else
            { 
                $data = array( 
                'id' => '', 
                'nama' => $this->input->post('nama'), 
                'username' => $this->input->post('username'), 
                'password' => $this->input->post('register_password'),
                'email' => $this->input->post('register_email'), 
                'role_id' => 2, 
                ); 
                $this->db->insert('tb_user',$data); 
                $this->load->view('registrasi_success'); 
            } 
        } 
    } 
?>