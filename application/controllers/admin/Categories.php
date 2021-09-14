<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends MY_Controller{

	public function __construct(){
		parent::__construct();		
		$this->load->model('admin/category_model', 'category_model');

	}

	//-----------
	public function index()
	{
		$data['categories'] = $this->category_model->get_rows();
		$data['title'] = 'Categories';
		$data['view'] = 'admin/categories/category_list';
		$this->load->view('layout', $data);
	}

	
	//----------
	public function add_category()
	{
		if($this->input->post('add')){
			$this->form_validation->set_rules('category_name', 'Category name', 'required');
			 if($this->form_validation->run() == FALSE){
        $data['view'] = 'admin/categories/category_add';
				$this->load->view('layout', $data);
      }else{
      	$data = array(
      		'category_name' => $this->input->post('category_name')
      	);
      	$data = $this->security->xss_clean($data);
      	$result = $this->category_model->insert_row($data);
      	if($result){
      		$this->session->set_flashdata('success', 'Success! Category created successfully.');
					redirect(base_url('admin/categories'));
      	}else{
      		$this->session->set_flashdata('warning', 'Sorry! Something went wrong.');
					redirect(base_url('admin/categories'));
      	}

      }
		}else{
			redirect(base_url('admin/categories'));
		}
	}


	//----------
	public function edit_category($id)
	{
		if($this->input->post('edit')){
			$this->form_validation->set_rules('category_name', 'Category name', 'required');
			 if($this->form_validation->run() == FALSE){
        $data['view'] = 'admin/categories/category_edit';
				$this->load->view('layout', $data);
      }else{
      	$data = array(
      		'category_name' => $this->input->post('category_name')      		
      	);
      	$data = $this->security->xss_clean($data);
      	$result = $this->category_model->edit_row($data, $id);
      	if($result){
      		$this->session->set_flashdata('success', 'Success! Changes saved successfully.');
					redirect(base_url('admin/categories'));
      	}else{
      		$this->session->set_flashdata('warning', 'Sorry! Something went wrong.');
					redirect(base_url('admin/edit_category'));
      	}
      }
		}else{
			$data['category'] = $this->category_model->get_row($id);
			$data['view'] = 'admin/categories/category_edit';
			$this->load->view('layout', $data);
		}
	}
	
	
	//---------------
	public function delete_category($id){
		$this->db->where('category_id', $id);
		$this->db->delete('r3_categories');

		$this->session->set_flashdata('success', 'Data has been deleted successfully!');
		redirect(base_url('admin/categories'));
	}


}
