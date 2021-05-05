<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

		class AdminModel extends CI_Model
		 {
			// ==================================category=======================================
			public function saveCategory($id,$formData)
			{
				if($id=='new'){
					return $this->db->insert('category', $formData); 
				}else{
					return $this->db->where('id',$id)->set($formData)->update('category');
				}
			}

			// fetch category
			public function category_fetch() 
			{
                   $sql= $this->db->order_by("createdAt", "desc")->get('category');
				   return $sql->result();                   
			}


			// ==========================================blogs=========================================
			// fetch blogs data with filter
			public function blogsFetch($filter)
			{
				if($filter=='ALL'){
					$sql = $this->db->order_by("createdAt", "desc")->get('blogs');
				}
				return $sql->num_rows() > 0 ? $sql->result() : false;
			}

			public function saveBlogs($id,$formData)
			{
				if($id=='new'){
					return $this->db->insert('blogs', $formData); 
				}else{
					return $this->db->where('id',$id)->set($formData)->update('blogs');
				}
			}

			// ==========================our team==================================
			public function teamFetch($filter)
			{
				if($filter=='ALL'){
					$sql = $this->db->order_by("createdAt", "desc")->get('ourteam');
				}
				return $sql->num_rows() > 0 ? $sql->result() : false;
			}
			
			public function saveOurTeam($id,$formData)
			{
				if($id=='new'){
					return $this->db->insert('ourTeam', $formData); 
				}else{
					return $this->db->where('id',$id)->set($formData)->update('ourTeam');
				}
			}

						
		}

