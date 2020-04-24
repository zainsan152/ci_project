<?php
/**
*
*/
class loginmodel extends CI_Model
{
	
	public function isvalidate($username , $password)
	{
		$q = $this->db->where(['username' => $username, 'password' => $password])
					->get('users');
						//print_r($q);
					
						if($q->num_rows())
						{
							return $q->row()->id;
						}
						else
						{
							return false;
						}
	}
	public function articleList($limit , $offset)
	{
		$id = $this->session->userdata('id');
		$q = $this->db->select()
				->from('articles')
				->where(['user_id' => $id])
				->limit($limit , $offset)
				->get();
		return $q->result();
	}

	public function add_articles($array)
	{
		
		/*$affected_rows*/ return $this->db->insert('articles' , $array);
	}
	
	public function add_user($array)
	{
		return $this->db->insert('users' , $array);		
	}

	public function del($id)
	{
		return $this->db->delete('articles' , ['id'=>$id]);
	}

	public function num_rows()
	{
		$id = $this->session->userdata('id');
		$q = $this->db->select()
				->from('articles')
				->where(['user_id' => $id])
				//->limit($limit , $offset)
				->get();
		return $q->num_rows();	
	}

	public function find_article($articleid)
	{
		$q = $this->db->select(['article_title' , 'article_body' , 'id'])
		->where('id' , $articleid)->get('articles');

		return $q->row();
	}

	public function update_article($articleid , Array $article)
	{
		return $this->db->where('id' , $articleid)
				->update('articles' , $article);
		//$this->db->update('articles' , $articles , "id = ")
	}
}
?>