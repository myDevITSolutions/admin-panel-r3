<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends MY_Controller{

	public function __construct(){
		parent::__construct();		
		$this->load->model('admin/subject_model', 'subject_model');

	}

	//-----------
	public function index()
	{
		$data['subjects'] = $this->subject_model->get_rows();
		$data['title'] = 'Subjects';
		$data['view'] = 'admin/subjects/subject_list';
		$this->load->view('layout', $data);
	}

	
	//----------
	public function add_subject()
	{
		if($this->input->post('add')){
			$this->form_validation->set_rules('subject_name', 'Subject name', 'required');
			 if($this->form_validation->run() == FALSE){
			 	$data['subjects'] = $this->subject_model->get_rows();
        $data['view'] = 'admin/subjects/subject_list';
				$this->load->view('layout', $data);
      }else{
      	$data = array(
      		'subject_name' => $this->input->post('subject_name')
      	);
      	$data = $this->security->xss_clean($data);
      	$result = $this->subject_model->insert_row($data);
      	if($result){
      		$this->session->set_flashdata('success', 'Success! Subject created successfully.');
					redirect(base_url('admin/subjects'));
      	}else{
      		$this->session->set_flashdata('warning', 'Sorry! Something went wrong.');
					redirect(base_url('admin/subjects'));
      	}

      }
		}else{
			redirect(base_url('admin/subjects'));
		}
	}

	
	//----------
	public function edit_subject($id)
	{
		if($this->input->post('edit')){
			$this->form_validation->set_rules('subject_name', 'Subject name', 'required');
			 if($this->form_validation->run() == FALSE){
			 	$data['subject'] = $this->subject_model->get_row($id);
        $data['view'] = 'admin/subjects/subject_edit';
				$this->load->view('layout', $data);
      }else{
      	$data = array(
      		'subject_name' => $this->input->post('subject_name')      		
      	);
      	$data = $this->security->xss_clean($data);
      	$result = $this->subject_model->edit_row($data, $id);
      	if($result){
      		$this->session->set_flashdata('success', 'Success! Changes saved successfully.');
					redirect(base_url('admin/subjects'));
      	}else{
      		$this->session->set_flashdata('warning', 'Sorry! Something went wrong.');
					redirect(base_url('admin/subjects/edit_subject/'.$id));
      	}
      }
		}else{
			$data['subject'] = $this->subject_model->get_row($id);
			$data['view'] = 'admin/subjects/subject_edit';
			$this->load->view('layout', $data);
		}
	}
	
	
	//---------------
	public function delete_subject($id){
		$this->db->where('subject_id', $id);
		$this->db->delete('r3_subjects');

		$this->session->set_flashdata('success', 'Data has been deleted successfully!');
		redirect(base_url('admin/subjects'));
	}
	
	
}
