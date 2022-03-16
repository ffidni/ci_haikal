<?php

    class Init extends CI_Controller {

        public static function initDatas($title, $obj){
            $data["id"] = $obj->session->userdata("id");
            $data["email"] = $obj->session->userdata("email");
            $data["is_admin"] = $obj->session->userdata("is_admin");
            $data["title"] = $title;
            $obj->load->view('navbar', $data);
            $obj->load->view('head', $data);
            return $data;
        }

    }