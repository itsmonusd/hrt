
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Common extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('CommonModel');
        $this->load->helper('message');

	}

    public function changeStatus($table,$id,$status)
    {
        $currentTab = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

        $statusChange = $this->CommonModel->changeStatus($table,$id,$status);

        $response = array('status' => $statusChange ? 'true' : 'false', 'msg' => $statusChange ? messages()['success'] : messages()['tryAgain'] );
        $this->session->set_flashdata('toaster', $response);
        return redirect($currentTab);        
    }

    public function deleteData($table,$id)
    {
        $currentTab = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

        $deleteData = $this->CommonModel->deleteData($table,$id);

        $response = array('status' => $deleteData ? 'true' : 'false', 'msg' => $deleteData ? messages()['success'] : messages()['tryAgain'] );
        // echo json_encode($response);
        $this->session->set_flashdata('toaster', $response);
        return redirect($currentTab);
    }


}

?>