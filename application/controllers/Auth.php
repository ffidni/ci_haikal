<?php

    require_once("Init.php");

    class Auth extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $data = array();
        }

        public function index()
        {
            $this->load->view("login");
        }

        public function loginProccess()
        {
            if ($this->input->post()){
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $encrypt = md5($password);
                $query = $this->Auth_model->login($email, $encrypt);
                if($query->num_rows() > 0) {
                    $result = $query->result_array()[0];
                    $this->session->set_userdata($result);
                    redirect("/");
                } else {
                    echo "Login gagal";
                }                

            }
        }

        public function deleteAccount($id){
            if ($id != $this->session->userdata("id")){
                $affected = $this->Auth_model->deleteAccount($id);
                if ($affected){
                    redirect(site_url("auth/account"));
                }
            } else {
                echo "Can't delete your own account!";
            }

        }

        public function account(){
            $data = Init::initDatas("Daftar Akun", $this);
            $data['accounts'] = $this->Auth_model->getAccounts()->result();
            $this->load->view("account", $data);
        }

        public function editAccount($id){
            if ($this->input->post()){
                $email = $this->input->post('email');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $encrypt = md5($password); 

                $data = array('username' => $username, 'email' => $email, 'password' => $encrypt);
                $affected = $this->Auth_model->updateAccount($id, $data);
                if ($affected){
                    redirect('/');
                } else {
                    echo "Update akun gagal.";
                }
            }
            $data = Init::initDatas("Edit Akun", $this);
            $data['account'] = $this->Auth_model->getAccount($id)->row_array();
            $this->load->view("edit_account", $data);
        }

        public function registerProcess(){
            if ($this->input->post()){
                $email = $this->input->post('email');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $encrypt = md5($password);            

                $data = array('username' => $username, 'email' => $email, 'password' => $encrypt);
                $result = $this->Auth_model->register($data);
                if ($result == 0){
                    echo "Register gagal";
                } else {
                    echo "Register berhasil";
                    redirect("auth/login");
                }
            }
        }   


        public function register(){
            $data = Init::initDatas("Register", $this);
            $this->load->view("register");

        }

        public function login(){
            $data = Init::initDatas("Login", $this);
            $this->load->view("login");
        }

        public function logoutProcess(){
            $this->session->sess_destroy();
            redirect("/");
        }

    }