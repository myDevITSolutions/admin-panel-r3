<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rules extends MY_Controller{

	public function __construct(){
		parent::__construct();		
		$this->load->model('admin/rule_model', 'rule_model');

	}

	//-----------
	public function index()
	{
		$data['rules'] = $this->rule_model->get_rows();
		$data['categories'] = $this->rule_model->get_categories();
		$data['areas'] = $this->rule_model->get_areas();
		$data['subjects'] = $this->rule_model->get_subjects();
		$data['topics'] = $this->rule_model->get_topics();
		//echo "<pre>";
		//print_r($data['areas']);
		//die();
		$data['title'] = 'Rules';
		$data['view'] = 'admin/rules/rule_list';
		$this->load->view('layout', $data);
	}
	
	//----------
	public function add_rule()
	{
		if($this->input->post('add')){
			$this->form_validation->set_rules('rule_name', 'Rule name', 'required');
			//$this->form_validation->set_rules('rule_graphic', 'Rule file', 'required');
			if($this->form_validation->run() == FALSE){
			 	$data['categories'] = $this->rule_model->get_categories();
				$data['areas'] = $this->rule_model->get_areas();
				$data['subjects'] = $this->rule_model->get_subjects();
				$data['topics'] = $this->rule_model->get_topics();
				$data['title'] = 'Rule Add';
        $data['view'] = 'admin/rules/rule_add';
				$this->load->view('layout', $data);
      }else{

      	$imageCount = count($_FILES['rule_graphic']['name']);
      	if($imageCount>0){
      		$data = array(
	      		'rule_name' => $this->input->post('rule_name'),
	      		//'rule_graphic' => $upload_data['file_name'],
	      		'category_id' => $this->input->post('category_id'),
	      		'area_id' => $this->input->post('area_id'),
	      		'subject_id' => $this->input->post('subject_id'),
	      		'topic_id' => $this->input->post('topic_id'),
	      		'rule_type' => $this->input->post('rule_type'),
	      		'created_at' => date('Y-m-d H:i:s')
      		);
      		$data = $this->security->xss_clean($data);
	      	$rule_id = $this->rule_model->insert_row($data);
      	}
      	if($rule_id){
      		for ($i=0; $i < $imageCount; $i++) {
		  		 	$_FILES['file']['name']       = $_FILES['rule_graphic']['name'][$i];
		        $_FILES['file']['type']       = $_FILES['rule_graphic']['type'][$i];
		        $_FILES['file']['tmp_name']   = $_FILES['rule_graphic']['tmp_name'][$i];
		        $_FILES['file']['error']      = $_FILES['rule_graphic']['error'][$i];
		        $_FILES['file']['size']       = $_FILES['rule_graphic']['size'][$i];

		        //file upload 
		      	$config['upload_path']          = './files/rule_graphics/';
		        $config['allowed_types']        = 'gif|jpg|png';
		        $config['max_size']             = 5000;
		        $config['max_width']            = 1024;
		        $config['max_height']           = 1024;
		        $config['encrypt_name']         = TRUE;

		        $this->load->library('upload', $config);

		        if($this->upload->do_upload('file')){
	            // Uploaded file data
	            $imageData = $this->upload->data();
	            $uploadImgData[$i]['rule_graphic'] = $imageData['file_name'];

	            $data_graphic = array(
	            	'rule_id' => $rule_id,
	            	'graphic_name' => $uploadImgData[$i]['rule_graphic']
	            );
	            $data_graphic = $this->security->xss_clean($data_graphic);
	            $this->rule_model->insert_graphics($data_graphic);
		        }else{
		        	$data['error'] = array('error' => $this->upload->display_errors());
		          $data['rules'] = $this->rule_model->get_rows();
							$data['title'] = 'Rules';
							$data['view'] = 'admin/rules/rule_list';
							$this->load->view('layout', $data);
		        }
      		}
      		$this->session->set_flashdata('success', 'Success! Rule created successfully.');
					redirect(base_url('admin/rules'));
      	}else{
      		$this->session->set_flashdata('warning', 'Sorry! Something went wrong.');
					redirect(base_url('admin/rules'));
      	}
      }
		}else{
			$data['categories'] = $this->rule_model->get_categories();
			$data['areas'] = $this->rule_model->get_areas();
			$data['subjects'] = $this->rule_model->get_subjects();
			$data['topics'] = $this->rule_model->get_topics();
			$data['title'] = 'Rule Add';
			$data['view'] = 'admin/rules/rule_add';
			$this->load->view('layout', $data);
		}
	}

	//-----------------
	public function view_rule($id){
		$data['rule'] = $this->rule_model->get_rule_data($id);	
		$data['graphics'] = $this->rule_model->get_rule_graphics($id);		
		$data['title'] = 'Rule Add';
		$data['view'] = 'admin/rules/rule_view';
		$this->load->view('layout', $data);
	}

	/*
	//----------
	public function edit_role($id)
	{
		if($this->input->post('edit')){
			$this->form_validation->set_rules('role_name', 'Role name', 'required');
			 if($this->form_validation->run() == FALSE){
        $data['view'] = 'admin/roles/role_add';
				$this->load->view('layout', $data);
      }else{
      	$data = array(
      		'role_name' => $this->input->post('role_name'),
      		'role_desc' => $this->input->post('role_desc')
      	);
      	$data = $this->security->xss_clean($data);
      	$result = $this->role_model->edit_row($data, $id);
      	if($result){
      		$this->session->set_flashdata('success', 'Success! Role created successfully.');
					redirect(base_url('admin/roles'));
      	}else{
      		$this->session->set_flashdata('warning', 'Sorry! Something went wrong.');
					redirect(base_url('admin/add_role'));
      	}
      }
		}else{
			$data['role'] = $this->role_model->get_row($id);
			$data['view'] = 'admin/roles/role_edit';
			$this->load->view('layout', $data);
		}
	}
	*/
	
	//---------------
	public function delete_rule($id){
		//$rule = $this->rule_model->get_row($id);
		//$file_name = $rule['rule_graphic'];
		//$path = base_url().'files/rule_images/'.$file_name;

		//if(file_exists())

		$this->db->where('rule_id', $id);
		$this->db->delete('r3_rules_testing');

		$this->session->set_flashdata('success', 'Rule has been deleted successfully!');
		redirect(base_url('admin/rules'));
	}
	

}
