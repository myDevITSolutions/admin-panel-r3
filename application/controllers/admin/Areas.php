<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends MY_Controller{

	public function __construct(){
		parent::__construct();		
		$this->load->model('admin/area_model', 'area_model');

	}

	//-----------
	public function index()
	{
		$data['areas'] = $this->area_model->get_rows();
		$data['title'] = 'Categories';
		$data['view'] = 'admin/areas/area_list';
		$this->load->view('layout', $data);
	}

	
	//----------
	public function add_area()
	{
		if($this->input->post('add')){
			$this->form_validation->set_rules('area_name', 'Area name', 'required');
			 if($this->form_validation->run() == FALSE){
        $data['view'] = 'admin/areas/area_list';
				$this->load->view('layout', $data);
      }else{
      	$data = array(
      		'area_name' => $this->input->post('area_name')
      	);
      	$data = $this->security->xss_clean($data);
      	$result = $this->area_model->insert_row($data);
      	if($result){
      		$this->session->set_flashdata('success', 'Success! Area created successfully.');
					redirect(base_url('admin/areas'));
      	}else{
      		$this->session->set_flashdata('warning', 'Sorry! Something went wrong.');
					redirect(base_url('admin/areas'));
      	}

      }
		}else{
			redirect(base_url('admin/categories'));
		}
	}

	
	//----------
	public function edit_area($id)
	{
		if($this->input->post('edit')){
			$this->form_validation->set_rules('area_name', 'Area name', 'required');
			 if($this->form_validation->run() == FALSE){
        $data['view'] = 'admin/areas/area_edit';
				$this->load->view('layout', $data);
      }else{
      	$data = array(
      		'area_name' => $this->input->post('area_name')      		
      	);
      	$data = $this->security->xss_clean($data);
      	$result = $this->area_model->edit_row($data, $id);
      	if($result){
      		$this->session->set_flashdata('success', 'Success! Changes saved successfully.');
					redirect(base_url('admin/areas'));
      	}else{
      		$this->session->set_flashdata('warning', 'Sorry! Something went wrong.');
					redirect(base_url('admin/areas/edit_area/'.$id));
      	}
      }
		}else{
			$data['area'] = $this->area_model->get_row($id);
			$data['view'] = 'admin/areas/area_edit';
			$this->load->view('layout', $data);
		}
	}
	
	
	//---------------
	public function delete_area($id){
		$this->db->where('area_id', $id);
		$this->db->delete('r3_areas');

		$this->session->set_flashdata('success', 'Data has been deleted successfully!');
		redirect(base_url('admin/categories'));
	}

	
}
