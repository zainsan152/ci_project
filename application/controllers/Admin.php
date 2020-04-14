<?php 


/**
  * 
  */
 class admin extends My_Controller
 {
 	
 	
	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('uname' , 'User Name' , 'required|alpha');
		$this->form_validation->set_rules('pass' , 'Password' , 'required|max_length[12]');
		$this->form_validation->set_error_delimiters('<div class = "text-danger">' , '</div>');

		if ($this->form_validation->run())
		{
			echo "Validation Successfull";
		}
		else
		{
			$this->load->view('Users/articleList');
		}
	}
 }


  ?>
