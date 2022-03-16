<?php

    class Auth_model extends CI_Model {

        public function login($email, $password){
            $this->db->where("email", $email);
            $this->db->where("password", $password);
            return $this->db->get("users");
        }

        public function register($data){
            return $this->db->insert("users", $data);
        }

        public function getAccount($id){
            $this->db->where("id", $id);
            return $this->db->get("users");
        }

        public function getAccounts(){
            return $this->db->get("users");
        }

        public function updateAccount($id, $data){
            $this->db->where("id", $id);
            $this->db->update("users", $data);
            return $this->db->affected_rows();
        }

        public function deleteAccount($id){
            $this->db->where("id", $id);
            $this->db->delete("users");
            return $this->db->affected_rows();

        }
    }