<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topics extends MY_Controller{

	public function __construct(){
		parent::__construct();		
		$this->load->model('admin/topic_model', 'topic_model');

	}

	//-----------
	public function index()
	{
		$data['topics'] = $this->topic_model->get_rows();
		$data['title'] = 'Topics';
		$data['view'] = 'admin/topics/topic_list';
		$this->load->view('layout', $data);
	}

	
	//----------
	public function add_topic()
	{
		if($this->input->post('add')){
			$this->form_validation->set_rules('topic_name', 'Topic name', 'required');
			 if($this->form_validation->run() == FALSE){
			 	$data['topics'] = $this->topic_model->get_rows();
        $data['view'] = 'admin/topics/topic_list';
				$this->load->view('layout', $data);
      }else{
      	$data = array(
      		'topic_name' => $this->input->post('topic_name')
      	);
      	$data = $this->security->xss_clean($data);
      	$result = $this->topic_model->insert_row($data);
      	if($result){
      		$this->session->set_flashdata('success', 'Success! Topic created successfully.');
					redirect(base_url('admin/topics'));
      	}else{
      		$this->session->set_flashdata('warning', 'Sorry! Something went wrong.');
					redirect(base_url('admin/topics'));
      	}

      }
		}else{
			redirect(base_url('admin/topics'));
		}
	}

	
	//----------
	public function edit_topic($id)
	{
		if($this->input->post('edit')){
			$this->form_validation->set_rules('topic_name', 'Topic name', 'required');
			 if($this->form_validation->run() == FALSE){
			 	$data['topic'] = $this->topic_model->get_row($id);
        $data['view'] = 'admin/topics/topic_edit';
				$this->load->view('layout', $data);
      }else{
      	$data = array(
      		'topic_name' => $this->input->post('topic_name')      		
      	);
      	$data = $this->security->xss_clean($data);
      	$result = $this->topic_model->edit_row($data, $id);
      	if($result){
      		$this->session->set_flashdata('success', 'Success! Changes saved successfully.');
					redirect(base_url('admin/topics'));
      	}else{
      		$this->session->set_flashdata('warning', 'Sorry! Something went wrong.');
					redirect(base_url('admin/topics/edit_topic/'.$id));
      	}
      }
		}else{
			$data['topic'] = $this->topic_model->get_row($id);
			$data['view'] = 'admin/topics/topic_edit';
			$this->load->view('layout', $data);
		}
	}
	
	
	//---------------
	public function delete_topic($id){
		$this->db->where('topic_id', $id);
		$this->db->delete('r3_topics');

		$this->session->set_flashdata('success', 'Data has been deleted successfully!');
		redirect(base_url('admin/topics'));
	}
	
	
}
