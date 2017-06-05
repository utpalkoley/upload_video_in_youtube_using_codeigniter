<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');

	}
	public function index(){

		$this->load->view('welcome_message');

	}
	public function uploadVideo(){
		//
		$file_ext = pathinfo($_FILES['video_file']['name'],PATHINFO_EXTENSION);
		$file_name = rand(100,100000000).".".$file_ext;
		$config['upload_path']          = './upload/';
		$config['file_name']            = $file_name;
        $config['allowed_types']        = 'gif|jpg|png|mp4';
        $config['max_size']             = 100000;
        $config['max_width']            = 2024;
        $config['max_height']           = 2024;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('video_file')){
        	$this->session->set_userdata("video_name",$file_name);
        	redirect('Welcome/youtube');
        }
	}
	public function youtube() {
		
		$this->load->library('google_client_api');
		$v_name = $this->session->userdata('video_name');
		///echo $this->rahul->my_function();
		//exit;
		$video= "upload/".$v_name;
		$title= "This is your video";
		$desc= "This is your video.Just play it.Enjoy it.Thank you.";
		$tags=["uk","youtubeapi3"];
		$privacy_status="public";
		$youtube=$this->google_client_api->youtube_upload($video,$title,$desc,$tags,$privacy_status);
		print_r($youtube);
		//echo "hi";
		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
