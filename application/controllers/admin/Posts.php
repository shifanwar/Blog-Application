<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

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
		$query = $this->db->query("SELECT * FROM `posts` ORDER BY postid DESC");
		$data['result']=$query->result_array();
		$this->load->view('adminpanel/readpostview', $data);
	}

	function createpost()
	{
		$this->load->view('adminpanel/createpostview');
		//$this->load->helper(array("url","form"));
	}

	function createpost_post()
	{
		//print_r($_POST);
		//print_r($_FILES);

		if ($_FILES)
		{
			//image is passed for upload
				$config['upload_path']          = './assets/upload/';
                $config['allowed_types']        = 'gif|jpg|png';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('post_img'))
                {
                        $error = array('error' => $this->upload->display_errors());
						die("Error");
                        //$this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        //echo "<pre>";
                        //print_r($data);
                        //echo $data['upload_data']['file_name'];

                        $fileurl = "./assets/upload/".$data['upload_data']['file_name'];
                        $post_title = $_POST['post_title'];
                        $post_desc = $_POST['post_desc'];
                        
                        $query = $this->db->query("INSERT INTO `posts`(`post_title`, `post_desc`, `post_img`) VALUES ('$post_title','$post_desc','$fileurl')");

                        if($query)
                        {
                        	$this->session->set_flashdata('inserted', 'yes');
                        	redirect('admin/posts/createpost');
                        }
                        else
                        {
                        	$this->session->set_flashdata('inserted', 'no');
                        	redirect('admin/posts/createpost');
                        }

                        //$this->load->view('upload_success', $data);
                }
		}
		else
		{
			//image is not passed for upload
		}
	}

	function updatepost($postid)
	{
		//print_r($postid);
		$query = $this->db->query("SELECT `post_title`, `post_desc`, `post_img`, `status` FROM `posts` WHERE `postid`='$postid'");
		$data['result'] = $query->result_array();
		$data['postid'] = $postid;

		$this->load->view("adminpanel/updatepost",$data);
	}

	function updatepost_post()
	{
		//print_r($_POST); die();
		print_r($_FILES);
		if ($_FILES['post_img']['name'])
		{
			//die("update file");

			//update img

			$config['upload_path']          = './assets/upload/';
                $config['allowed_types']        = 'gif|jpg|png';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('post_img'))
                {
                        $error = array('error' => $this->upload->display_errors());
						die("Error");
                        //$this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        // echo "<pre>";
                        // print_r($data['upload_data']['file_name']);

                         $filename_location = "assets/upload/". $data['upload_data']['file_name'];
                         $post_title = $_POST['post_title'];
                         $post_desc = $_POST['post_desc'];
                         $postid = $_POST['postid'];
                         $publish_unpublish = $_POST['publish_unpublish'];

                         $query = $this->db->query("UPDATE `posts` SET `post_title`='$post_title', `post_desc`='$post_desc',
                         	`post_img`='$filename_location', `status`='$publish_unpublish' WHERE `postid`='$postid'");

                         if($query)
                        {
                        	$this->session->set_flashdata('updated', 'yes');
                        	redirect('admin/posts/');
                        }
                        else
                        {
                        	$this->session->set_flashdata('updated', 'no');
                        	redirect('admin/posts/');
                        }

                }
		}
		else
		{
			//die("update without file");

			$post_title = $_POST['post_title'];
                         $post_desc = $_POST['post_desc'];
                         $postid = $_POST['postid'];
                         $publish_unpublish = $_POST['publish_unpublish'];

                         $query = $this->db->query("UPDATE `posts` SET `post_title`='$post_title', `post_desc`='$post_desc', `status`='$publish_unpublish' WHERE `postid`='$postid'");

                         if($query)
                        {
                        	$this->session->set_flashdata('updated', 'yes');
                        	redirect('admin/posts/');
                        }
                        else
                        {
                        	$this->session->set_flashdata('updated', 'no');
                        	redirect('admin/posts/');
                        }
		}
		//$this->load->view("adminpanel/updatepost");
	}

	function deletepost()
	{
		//print_r($_POST);

		 $delete_id = $_POST['delete_id'];
		 $qu = $this->db->query("DELETE FROM `posts` WHERE `postid`='$delete_id'");

		if ($qu)
		{
			echo "deleted";
		}
		else
		{
			echo "not deleted";
		}
	}
}

