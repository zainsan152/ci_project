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
		$this->load->library('pagination');
		$config = [
			'base_url' => base_url('admin/welcome'),
			'per_page' => 2,
			'total_rows' => $this->ar->num_rows(),
			'full_tag_open' => "<ul class = 'pagination'>",
			'full_tag_close' => "</ul>",
			'next_tag_open' => "<li>",
			'next_tag_close' => "</li>",
			'prev_tag_open' => "<li>",
			'prev_tag_close' => "</li>",
			'num_tag_open' => "<li>",
			'num_tag_close' => "</li>",
			'cur_tag_open' => "<li class = 'active'><a>",
			'cur_tag_close' => "</a></li>",
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
		$config=[
		'upload_path'=>'./upload/',
		'allowed_types'=>'gif|jpg|png',
				];
				$this->load->library('upload' , $config);
		$this->form_validation->set_error_delimiters('<div class = "text-danger">' , '</div>');
		if ($this->form_validation->run('add_article_rule') && $this->upload->do_upload())
		{
			$post = $this->input->post();
			$data = $this->upload->data();
			$image_path=base_url("upload/".$data['raw_name'].$data['file_ext']);
     
        	$post['image_path']=$image_path;

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
			$upload_error=$this->upload->display_errors();
			$this->load->view('admin/add_article' , compact('upload_error'));
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

		public function edituser($id)
		{
			$this->load->model('loginmodel');
			$article = $this->loginmodel->find_article($id);
			/*echo "<pre>";
			print_r($rt);*/
			$this->load->view('admin/edit_article' , ['article'=>$article]);
		}
		
		public function updatearticle($articleid)
		{
			/*print_r($this->input->post());
			exit();*/
		if ($this->form_validation->run('add_article_rule'))
		{
			$post = $this->input->post();
			//$articleid = $post['article_id'];
			//unset($articleid);
			$this->load->model('loginmodel');
			if($this->loginmodel->update_article($articleid , $post ))
			{
				$this->session->set_flashdata('insert_success' , 'Article Successfully Updated');
				return redirect('admin/welcome');
			}
			else
			{
				$this->session->set_flashdata('insert_failed' , 'Article not Updated');
				return redirect('admin/edituser');
			}
		}
		else
		{
			$this->load->view('admin/dashboard');
		}	
			
		}
	
}
?>