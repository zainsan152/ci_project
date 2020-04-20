<?php
/**
*
*/
class admin extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		if(! $this->session->userdata('id'))
			return redirect('login');
	}
	public function logout()
	{
		$this->session->unset_userdata('id');
		return redirect('login');
	}
	
	
	
	public function welcome()
	{
		/*if(! $this->session->userdata('id'))
			return redirect('admin/login');*/
		$this->load->model('loginmodel' , 'ar');
		$config = [
			'base_url' => base_url('admin/welcome'),
			'per_page' => 2,
			'total_rows' => $this->ar->num_rows(),
					];

		$this->pagination->initialize($config);

		$articles = $this->ar->articleList($config['per_page'] , $this->uri->segment(3));
		$this->load->view('admin/dashboard' , ['articles' => $articles]);
	}
	public function adduser()
	{
		$this->load->view('admin/add_article');
	}
	
	public function userValidation()
	{
		$this->form_validation->set_error_delimiters('<div class = "text-danger">' , '</div>');
		if ($this->form_validation->run('add_article_rule'))
		{
			$post = $this->input->post();
			$this->load->model('loginmodel');
			if($this->loginmodel->add_articles($post))
			{
				$this->session->set_flashdata('insert_success' , 'Article Successfully Inserted');
				return redirect('admin/welcome');
			}
			else
			{
				$this->session->set_flashdata('insert_failed' , 'Article not inserted');
				return redirect('admin/adduser');
			}
		}
		else
		{
			$this->load->view('admin/add_article');
		}
	}
	public function delarticle()
	{
		$id = $this->input->post('id');
			$this->load->model('loginmodel');
			if($this->loginmodel->del($id))
			{
				$this->session->set_flashdata('delete_success' , 'Article Successfully Deleted');
				return redirect('admin/welcome');
			}
			else
			{
				$this->session->set_flashdata('delete_failed' , 'Article not Deleted');
				return redirect('admin/welcome');
			}
		}
		
	
}
?>