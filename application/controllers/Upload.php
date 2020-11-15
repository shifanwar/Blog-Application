<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('upload_view');
	}

	function do_upload()
	{
		//print_r($_FILES);

		$config['upload_path']          = './assets/upload/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('customefile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error); die();
                       // $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
						echo "<br><h1>Uploaded successfully</h>";
                        //$this->load->view('upload_success', $data);
                }
	}
}
