<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Blog_model');
    }

	public function index()
	{
        $query = $this->Blog_model->getBlogs();
        $data['blogs'] = $query->result_array();
		$this->load->view('blog', $data);
	}

    public function detail($url)
    {
        $query = $this->Blog_model->getSingleBlog("url", $url);
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
            } else {
                echo "Gagal";
            }
        }
        $this->load->view('form_add');
    }

    public function edit($id)
    {

        if ($this->input->post()){
            $data['title'] = $this->input->post('title');
            $data['content'] = $this->input->post('content');
            $data['url'] = $this->input->post('url');
            $affected =  $this->Blog_model->updateBlog($id, $data);
            echo "$affected data diperbarui";
        }

        $query = $this->Blog_model->getSingleBlog("id", $id);
        $data['blog'] = $query->row_array(); 


        $this->load->view('form_edit', $data);
    }

    public function delete($id)
    {
        $this->Blog_model->deleteBlog($id);
        redirect('/');

    }
}
