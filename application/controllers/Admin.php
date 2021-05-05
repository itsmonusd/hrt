
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel');
        $this->load->helper('message');
		$this->load->helper('constant_helper');
	}

	public function index()
	{
		$this->load->view('admin/common/dashboard/head');
		$this->load->view('admin/common/dashboard/sidebar');
		$this->load->view('admin/common/dashboard/topnavbar');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/common/dashboard/footer');
		$this->load->view('admin/common/dashboard/footer-scripts');
	}

	public function category()
	{

		$data['num'] = $this->AdminModel->category_fetch();
		$data['i'] = 0;
		$this->load->view('admin/common/dashboard/head');
		$this->load->view('admin/common/dashboard/sidebar');
		$this->load->view('admin/common/dashboard/topnavbar');
		$this->load->view('admin/category', $data);
		$this->load->view('admin/common/dashboard/footer');
		$this->load->view('admin/common/dashboard/footer-scripts');
	}

	// to add a new category or update category
    public function save_category($page,$id)
	{
        $currentTab = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

		$this->form_validation->set_rules('category', 'Category', 'required');
		if ($this->form_validation->run()) {

			if($id=='new'){
				$formData = array(
					'categoryName' => $this->input->post('category'),
					'status' => true,
					'createdAt'=>currentDate()
				);
			}else{
				$formData = array(
					'categoryName' => $this->input->post('category'),
					'updatedAt'=>currentDate()
				);
			}

			$saveData = $this->AdminModel->saveCategory($id,$formData);

			$response = array('status' => $saveData ? 'true' : 'false', 'msg' => $saveData ? messages()['categorySaved'] : messages()['tryAgain'] );
			$this->session->set_flashdata('toaster', $response);
			return redirect($currentTab);
			

		}else{
            $response = array('status' => 'false', 'msg' => messages()['tryAgain']);
            $this->session->set_flashdata('toaster', $response);
            return redirect($currentTab);
        }
	}

	// blogs
	public function blogs()
	{
		$filter = 'ALL';
		$data['data'] = $this->AdminModel->blogsFetch($filter);
		$this->load->view('admin/common/dashboard/head');
		$this->load->view('admin/common/dashboard/sidebar');
		$this->load->view('admin/common/dashboard/topnavbar');
		$this->load->view('admin/blogs/blogs', $data);
		$this->load->view('admin/common/dashboard/footer');
		$this->load->view('admin/common/dashboard/footer-scripts');
		$this->load->view('admin/blogs/blogs-script');
	}

	// to add a new blogs or update blogs
    public function saveBlogs($page,$id)
	{
        $currentTab = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		if ($this->form_validation->run()) {

			$formData = array(
				'title' => $this->input->post('title'),
				'keywords' => $this->input->post('keywords'),
				'image' => $this->input->post('file'),
				'description' => $this->input->post('description'),
			);

			//Config
			$config['upload_path']          = './assets/uploads/blogs/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 1000;
			$config['encrypt_name'] = true;
			$config['overwrite'] = true;

			$this->load->library('upload', $config);
			
			if(!empty($_FILES['file']['name']))
			{
				if ($this->upload->do_upload('file')){
					$fileName = $this->upload->data('file_name');	 
				}else{
					$response = array('status' => 'false', 'msg' => $this->upload->display_errors());
					$this->session->set_flashdata('toaster', $response);
					return redirect($currentTab);
				}
			}else{
				$fileName = null;
			}

			if($id=='new'){
				$formData['status'] = true;
				$formData['createdAt'] = currentDate();
				$formData['image'] = $fileName;
			}else{
				$formData['image'] = !empty($_FILES['file']['name']) ? $fileName : $this->input->post('oldImage');
				$formData['updatedAt'] = currentDate();
			}

			$saveData = $this->AdminModel->saveBlogs($id,$formData);

			$response = array('status' => $saveData ? 'true' : 'false', 'msg' => $saveData ? messages()['categorySaved'] : messages()['tryAgain'] );
			$this->session->set_flashdata('toaster', $response);
			return redirect($currentTab);
			

		}else{
            $response = array('status' => 'false', 'msg' => messages()['tryAgain']);
            $this->session->set_flashdata('toaster', $response);
            return redirect($currentTab);
        }
	}

	// Our team
	public function ourTeam()
	{
		$filter = 'ALL';
		$data['data'] = $this->AdminModel->teamFetch($filter);
		$this->load->view('admin/common/dashboard/head');
		$this->load->view('admin/common/dashboard/sidebar');
		$this->load->view('admin/common/dashboard/topnavbar');
		$this->load->view('admin/our-team', $data);
		$this->load->view('admin/common/dashboard/footer');
		$this->load->view('admin/common/dashboard/footer-scripts');
	}

	// to add a new team or update team
    public function saveOurTeam($page,$id)
	{
        $currentTab = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('speciality', 'Speciality', 'required');
		if ($this->form_validation->run()) {

			$formData = array(
				'name' => $this->input->post('name'),
				'speciality' => $this->input->post('speciality'),
				'staffImage' => $this->input->post('file'),
				'socialMediaLink' => $this->input->post('socialMediaLink'),
			);

			//Config
			$config['upload_path']          = './assets/uploads/teams/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 1000;
			$config['encrypt_name'] = true;
			$config['overwrite'] = true;

			$this->load->library('upload', $config);
			
			if(!empty($_FILES['file']['name']))
			{
				if ($this->upload->do_upload('file')){
					$fileName = $this->upload->data('file_name');	 
				}else{
					$response = array('status' => 'false', 'msg' => $this->upload->display_errors());
					$this->session->set_flashdata('toaster', $response);
					return redirect($currentTab);
				}
			}else{
				$fileName = null;
			}

			if($id=='new'){
				$formData['status'] = true;
				$formData['createdAt'] = currentDate();
				$formData['staffImage'] = $fileName;
			}else{
				$formData['staffImage'] = !empty($_FILES['file']['name']) ? $fileName : $this->input->post('oldImage');
				$formData['updatedAt'] = currentDate();
			}

			$saveData = $this->AdminModel->saveOurTeam($id,$formData);

			$response = array('status' => $saveData ? 'true' : 'false', 'msg' => $saveData ? messages()['ourTeamSaved'] : messages()['tryAgain'] );
			$this->session->set_flashdata('toaster', $response);
			return redirect($currentTab);
			

		}else{
            $response = array('status' => 'false', 'msg' => messages()['tryAgain']);
            $this->session->set_flashdata('toaster', $response);
            return redirect($currentTab);
        }
	}


}