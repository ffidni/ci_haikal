<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("Init.php");

class Blog extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
    }



	public function index()
	{
        $query = $this->Blog_model->getBlogs();
        $data = Init::initDatas("Homepage", $this);
        $data['blogs'] = $query->result_array();
		$this->load->view('blog', $data);
	}

    public function detail($url)
    {
        $query = $this->Blog_model->getSingleBlog("url", $url);
        $data = Init::initDatas($data['blog']['title'], $this);
        $data['blog'] = $query->row_array();
        $this->load->view('detail', $data);
    }


    public function makeUrl($title){
        $newUrl = strtolower(join("-", explode(' ', $title)));
        return $newUrl;
    }

    public function add()
    {
        if ($this->input->post()){
            $data['title'] = $this->input->post('title');
            $data['content'] = $this->input->post('content');
            $data['url'] = $this->makeUrl($this->input->post('title'));
            $is_success =  $this->Blog_model->insertBlog($data);
            if ($is_success){
                echo "Berhasil $is_success";
                redirect('/');
            } else {
                echo "Gagal";
            }
        }

        $data = Init::initDatas("Tambah Artikel", $this);
        $this->load->view('form_add', $data);
    }

    public function edit($id)
    {

        if ($this->input->post()){
            $data['title'] = $this->input->post('title');
            $data['content'] = $this->input->post('content');
            $data['url'] = $this->input->post('url');
            $affected =  $this->Blog_model->updateBlog($id, $data);
            echo "$affected data diperbarui";
            redirect('/');
        }

        $query = $this->Blog_model->getSingleBlog("id", $id);
        $data['blog'] = $query->row_array(); 
        Init::initDatas("Edit Artikel", $this);
        $this->load->view('form_edit', $data);
    }

    public function delete($id)
    {
        $this->Blog_model->deleteBlog($id);
        redirect('/');

    }
}
