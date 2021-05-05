
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

	// patner featured
	public function patnerFeatured($filter)
	{
		if (!in_array($filter, array('all','partner','featured'), true )) 
			return redirect('pagenotfound');
		$where = ($filter == 'patner') ? array('featuredPartner'=>$filter) : (($filter=='featured')  ? array('featuredPartner'=>$filter) : array());
		$data['data'] = $this->AdminModel->patnerFeaturedFetch($where);
		$this->load->view('admin/common/dashboard/head');
		$this->load->view('admin/common/dashboard/sidebar');
		$this->load->view('admin/common/dashboard/topnavbar');
		$this->load->view('admin/patner-featured', $data);
		$this->load->view('admin/common/dashboard/footer');
		$this->load->view('admin/common/dashboard/footer-scripts');
	}

	// to add a new blogs or update blogs
    public function savePatnerFeatured($page,$id)
	{
        $currentTab = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

		$this->form_validation->set_rules('featuredPartner', 'Featured / Partner', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		if ($this->form_validation->run()) {
			$formData = array(
				'name' => $this->input->post('name'),
				'featuredPartner' => $this->input->post('featuredPartner'),
				'logo' => $this->input->post('file'),
				'website' => $this->input->post('website'),
			);

			//Config
			$config['upload_path']          = './assets/uploads/patners/';
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
				$formData['logo'] = $fileName;
			}else{
				$formData['logo'] = !empty($_FILES['file']['name']) ? $fileName : $this->input->post('oldImage');
				$formData['updatedAt'] = currentDate();
			}

			$saveData = $this->AdminModel->savePatnerFeatured($id,$formData);

			$response = array('status' => $saveData ? 'true' : 'false', 'msg' => $saveData ? messages()['patnerFeaturedSaved'] : messages()['tryAgain'] );
			$this->session->set_flashdata('toaster', $response);
			return redirect($currentTab);
			

		}else{
            $response = array('status' => 'false', 'msg' => messages()['tryAgain']);
            $this->session->set_flashdata('toaster', $response);
            return redirect($currentTab);
        }
	}

	// settings
	public function settings()
	{
		$where = array('');
		$data['policy'] = $this->AdminModel->getPolicy($where);
		$data['data'] = $this->AdminModel->settingFetch();
		$this->load->view('admin/common/dashboard/head');
		$this->load->view('admin/common/dashboard/sidebar');
		$this->load->view('admin/common/dashboard/topnavbar');
		$this->load->view('admin/settings',$data);
		$this->load->view('admin/common/dashboard/footer');
		$this->load->view('admin/common/dashboard/footer-scripts');
	}

	public function saveSettings()
	{
        $currentTab = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

			$id = $this->input->post('id') ? $this->input->post('id') : null;

			$formData = array(
				'companyName' => $this->input->post('companyName'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'googleAddressLink' => $this->input->post('googleAddressLink'),
				'facebook' => $this->input->post('facebook'),
				'insta' => $this->input->post('insta'),
				'twitter' => $this->input->post('twitter'),
				'logo' => $this->input->post('logo'),
				'bannerSlider1' => $this->input->post('bannerSlider1'),
				'bannerSlider2' => $this->input->post('bannerSlider2'),
				'bannerSlider3' => $this->input->post('bannerSlider3'),
				'status'=>true
			);

			//Config
			$config['upload_path']          = './assets/uploads/home/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 1000;
			$config['encrypt_name'] = true;
			$config['overwrite'] = true;

			$this->load->library('upload', $config);
			
			if(!empty($_FILES['logo']['name']))
			{
				if ($this->upload->do_upload('logo')){
					$logo = $this->upload->data('file_name');	 
				}else{
					$response = array('status' => 'false', 'msg' => $this->upload->display_errors());
					$this->session->set_flashdata('toaster', $response);
					return redirect($currentTab);
				}
			}else{
				$logo = null;
			}

			// banner images
			if(!empty($_FILES['bannerSlider1']['name']))
			{
				if ($this->upload->do_upload('bannerSlider1')){
					$bannerSlider1 = $this->upload->data('file_name');	 
				}else{
					$response = array('status' => 'false', 'msg' => $this->upload->display_errors());
					$this->session->set_flashdata('toaster', $response);
					return redirect($currentTab);
				}
			}else{
				$bannerSlider1 = null;
			}

			if(!empty($_FILES['bannerSlider2']['name']))
			{
				if ($this->upload->do_upload('bannerSlider2')){
					$bannerSlider2 = $this->upload->data('file_name');	 
				}else{
					$response = array('status' => 'false', 'msg' => $this->upload->display_errors());
					$this->session->set_flashdata('toaster', $response);
					return redirect($currentTab);
				}
			}else{
				$bannerSlider2 = null;
			}

			if(!empty($_FILES['bannerSlider3']['name']))
			{
				if ($this->upload->do_upload('bannerSlider3')){
					$bannerSlider3 = $this->upload->data('file_name');	 
				}else{
					$response = array('status' => 'false', 'msg' => $this->upload->display_errors());
					$this->session->set_flashdata('toaster', $response);
					return redirect($currentTab);
				}
			}else{
				$bannerSlider3 = null;
			}

			if($id==null){
				$formData['createdAt'] = currentDate();
			}else{
				$formData['logo'] = !empty($_FILES['logo']['name']) ? $logo : $this->input->post('oldLogo');
				$formData['bannerSlider1'] = !empty($_FILES['bannerSlider1']['name']) ? $bannerSlider1 : $this->input->post('oldBannerSlider1');
				$formData['bannerSlider2'] = !empty($_FILES['bannerSlider2']['name']) ? $bannerSlider2 : $this->input->post('oldBannerSlider2');
				$formData['bannerSlider3'] = !empty($_FILES['bannerSlider3']['name']) ? $bannerSlider3 : $this->input->post('oldBannerSlider3');
				$formData['updatedAt'] = currentDate();
			}

			$saveData = $this->AdminModel->saveSettings($id,$formData);

			$response = array('status' => $saveData ? 'true' : 'false', 'msg' => $saveData ? messages()['patnerFeaturedSaved'] : messages()['tryAgain'] );
			$this->session->set_flashdata('toaster', $response);
			return redirect($currentTab);
			
	}

	// policy save 
	public function policySave($policy)
	{
		$currentTab = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

		if (!in_array($policy, array('terms','privacy','cancel','covid'), true )) 
			return redirect('pagenotfound');

		$this->form_validation->set_rules('policy', 'Policy', 'required');
		if ($this->form_validation->run()) {
			$where = array('policyName'=>$policy);
			$getPolicy = $this->AdminModel->getPolicy($where);
			$method = $getPolicy ? 'put' : 'post';
			$formData = array(
				'policyName' => $policy,
				'description' => $this->input->post('policy'),
				'status'=>true,
			);
			$method=='post' ? $formData['createdAt']= currentDate() : $formData['updatedAt'] = currentDate();

			$savePolicy = $this->AdminModel->savePolicy($method,$formData,$policy);
			$response = array('status' => $savePolicy ? 'true' : 'false', 'msg' => $savePolicy ? messages()['policySaved'] : messages()['tryAgain'] );
			$this->session->set_flashdata('toaster', $response);
			return redirect($currentTab);
		}else{
			$response = array('status' => 'false', 'msg' => messages()['formRequired']);
            $this->session->set_flashdata('toaster', $response);
            return redirect($currentTab);	
		}
		
	}

	// gallery
	public function gallery()
	{
		$this->load->view('admin/common/dashboard/head');
		$this->load->view('admin/common/dashboard/sidebar');
		$this->load->view('admin/common/dashboard/topnavbar');
		$this->load->view('admin/gallery');
		$this->load->view('admin/common/dashboard/footer');
		$this->load->view('admin/common/dashboard/footer-scripts');
	}

	// upload gallery Images
	public function galleryImageUpload()
	{
        $currentTab = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

		// set configuration 
		$config['upload_path'] = 'assets/uploads/gallery'; 
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = '2048';
		$config['file_name'] = $_FILES['file']['name'];
		$config['encrypt_name'] = true;
		$config['overwrite'] = true;

		$this->load->library('upload',$config); 

		if(!empty($_FILES['file']['name']))
		{
			if ($this->upload->do_upload('file')){
				$fileName = $this->upload->data('file_name');	 
			}else{
				$response = array('status' => 'false', 'msg' => $this->upload->display_errors());
				echo json_encode($response);
			}
		}
		$formData = array(
			'image'=>$fileName,
			'status'=>true,
			'createdAt'=>currentDate()
		);
		$saveGalleryImages = $this->AdminModel->saveGalleryImages($formData);
		$response = array('status' => $saveGalleryImages ? 'true' : 'false', 'msg' => $saveGalleryImages ? messages()['galleryImageSaved'] : messages()['tryAgain'] );
		echo json_encode($response);
	}

	// get gallery Image ajax request
	public function getGalleryImages()
	{
		$data = $this->AdminModel->getGalleryImages();
		$response = array('status' => $data ? 'true' : 'false', 'msg' => $data ? messages()['galleryImageFetched'] : messages()['tryAgain'] , 'data'=> $data);
		echo json_encode($response);
	}

	// itinerary
	public function itinerary()
	{
		$this->load->view('admin/common/dashboard/head');
		$this->load->view('admin/common/dashboard/sidebar');
		$this->load->view('admin/common/dashboard/topnavbar');
		$this->load->view('admin/itinerary/itinerary');
		$this->load->view('admin/common/dashboard/footer');
		$this->load->view('admin/common/dashboard/footer-scripts');
	}

	// load itinerary action page
	public function actionItinerary($action,$id)
	{
		$data['category'] = $this->AdminModel->category_fetch();

		$where = array('');
		$key = 'all';
		$data['data'] = $this->AdminModel->getItinerary($where,$key);

		$this->load->view('admin/common/dashboard/head');
		$this->load->view('admin/common/dashboard/sidebar');
		$this->load->view('admin/common/dashboard/topnavbar');
		$this->load->view('admin/itinerary/actionItinerary',$data);
		$this->load->view('admin/common/dashboard/footer');
		$this->load->view('admin/common/dashboard/footer-scripts');
	}

	public function saveItinerary()
	{
        $currentTab = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
		$this->form_validation->set_rules('category[]', 'Category', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Short description', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('duration', 'Duration', 'required');
		if ($this->form_validation->run()) {

			// declare form method
			$id = $this->input->post('itineraryId');
			$type = empty($id) ? 'post' : 'put';

			// join category
			$categoryIds = implode(', ', $this->input->post('category'));

			// get form inputs
			$formData = array(
				'categoryId'=>$categoryIds,
				'title'=>$this->input->post('title'),
				'description'=>$this->input->post('description'),
				'price'=>$this->input->post('price'),
				'duration'=>$this->input->post('duration'),
				'places'=>$this->input->post('places'),
				'keywords'=>$this->input->post('keywords'),
				'dayDescription'=>$this->input->post('dayDescription'),
				'inclusion'=>$this->input->post('inclusion'),
				'exclusion'=>$this->input->post('exclusion'),
			);

			//Config
			$config['upload_path']          = './assets/uploads/itinerary/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 1000;
			$config['encrypt_name'] = true;
			$config['overwrite'] = true;

			$this->load->library('upload', $config);
			
			if(!empty($_FILES['coverImage']['name']))
			{
				if ($this->upload->do_upload('coverImage')){
					$coverImage = $this->upload->data('file_name');	 
				}else{
					$response = array('status' => 'false', 'msg' => $this->upload->display_errors());
					$this->session->set_flashdata('toaster', $response);
					return redirect($currentTab);
				}
			}else{
				$coverImage = null;
			}

			// banner images
			if(!empty($_FILES['bannerSlider1']['name']))
			{
				if ($this->upload->do_upload('bannerSlider1')){
					$bannerSlider1 = $this->upload->data('file_name');	 
				}else{
					$response = array('status' => 'false', 'msg' => $this->upload->display_errors());
					$this->session->set_flashdata('toaster', $response);
					return redirect($currentTab);
				}
			}else{
				$bannerSlider1 = null;
			}

			if(!empty($_FILES['bannerSlider2']['name']))
			{
				if ($this->upload->do_upload('bannerSlider2')){
					$bannerSlider2 = $this->upload->data('file_name');	 
				}else{
					$response = array('status' => 'false', 'msg' => $this->upload->display_errors());
					$this->session->set_flashdata('toaster', $response);
					return redirect($currentTab);
				}
			}else{
				$bannerSlider2 = null;
			}

			if(!empty($_FILES['bannerSlider3']['name']))
			{
				if ($this->upload->do_upload('bannerSlider3')){
					$bannerSlider3 = $this->upload->data('file_name');	 
				}else{
					$response = array('status' => 'false', 'msg' => $this->upload->display_errors());
					$this->session->set_flashdata('toaster', $response);
					return redirect($currentTab);
				}
			}else{
				$bannerSlider3 = null;
			}

			// end of banner images


			if($type=='post'){
				$formData['createdAt'] = currentDate();
			}else{
				$formData['coverImage'] = !empty($_FILES['coverImage']['name']) ? $coverImage : $this->input->post('oldCoverImage');
				$formData['bannerSlider1'] = !empty($_FILES['bannerSlider1']['name']) ? $bannerSlider1 : $this->input->post('oldBannerSlider1');
				$formData['bannerSlider2'] = !empty($_FILES['bannerSlider2']['name']) ? $bannerSlider2 : $this->input->post('oldBannerSlider2');
				$formData['bannerSlider3'] = !empty($_FILES['bannerSlider3']['name']) ? $bannerSlider3 : $this->input->post('oldBannerSlider3');
				$formData['updatedAt'] = currentDate();
			}


			// save itinerary
			$itineraryId = $this->AdminModel->saveItinerary($formData,$type,$id);

			// get highlight Form Data 
			//Config highlight
			$config['upload_path']          = './assets/uploads/itinerary/highlight/';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = 1000;
			$config['encrypt_name'] = true;
			$config['overwrite'] = true;

			$this->load->library('upload', $config);

			$files = $_FILES;
			$cpt = count($_FILES['highlightImg']['name']);
			for($i=0; $i<$cpt; $i++)
			{
				$_FILES['highlightImg']['name']= $files['highlightImg']['name'][$i];// time() for time in seconds becauze we may need if same name uploaded file name
				$_FILES['highlightImg']['type']= $files['highlightImg']['type'][$i];
				$_FILES['highlightImg']['tmp_name']= $files['highlightImg']['tmp_name'][$i];
				$_FILES['highlightImg']['error']= $files['highlightImg']['error'][$i];
				$_FILES['highlightImg']['size']= $files['highlightImg']['size'][$i];
				if(!empty($_FILES['highlightImg']['name'][$i]))
				{
					$this->upload->initialize($config);
					if($this->upload->do_upload('highlightImg')){
						$fileName = $_FILES['highlightImg']['name'];
						$images[] = $fileName;
					}else{
						$errors[] = $this->upload->display_errors();
					}
					
				}else{
					$images[$i] = null;
				}
			}
			// $fileName = implode(',',$images);

			$deletOldHighlight = $this->AdminModel->deleteOldHighlight($id);
			
			$highlightTitle = $this->input->post('highlightTitle');
			$highlightDescription = $this->input->post('highlightDescription');

			foreach ($highlightTitle as $keys => $value ) {
				$highlightData = array(
					'itineraryId'=>$itineraryId,
					'title' =>$value,
					'description' =>$highlightDescription[$keys],
					'image' =>$images[$keys],
					'status'=>true,
					'createdAt'=>currentDate()
				);		
				$saveHighlight = $this->AdminModel->saveHighlight($highlightData);
			}


			

		}else{
			$response = array('status' => 'false', 'msg' => messages()['requiredFeilds']);
            $this->session->set_flashdata('toaster', $response);
            return redirect($currentTab);
		}
	}
}