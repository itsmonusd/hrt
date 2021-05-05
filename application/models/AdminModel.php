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

			// =================================patner featured =========================================
			public function patnerFeaturedFetch($where)
			{
				$sql = $this->db->where($where)->order_by("createdAt", "desc")->get('ourpartner');
				return $sql->num_rows() > 0 ? $sql->result() : false;
			}

			public function savePatnerFeatured($id,$formData)
			{
				if($id=='new'){
					return $this->db->insert('ourpartner', $formData); 
				}else{
					return $this->db->where('id',$id)->set($formData)->update('ourpartner');
				}
			}

			// ===========================================setting===================================
			public function settingFetch()
			{
				$sql = $this->db->get('setting');
				return $sql->num_rows() > 0 ? $sql->result() : false;
			}

			public function saveSettings($id,$formData)
			{
				if($id==null){
					return $this->db->insert('setting',$formData);
				}else{
					return $this->db->where('id',$id)->set($formData)->update('setting');
				}
			}

			// ====================================policy==========================================
			public function getPolicy($where)
			{
				$sql = $this->db->where($where)->get('policies');
				return $sql->num_rows() > 0 ? $sql->result() : false;
			}

			public function savePolicy($method,$formData,$policy)
			{
				if($method=='post'){
					return $this->db->insert('policies',$formData);
				}else{
					return $this->db->where('policyName',$policy)->set($formData)->update('policies');
				}
			}

			// ========================================gallery=====================================
			public function saveGalleryImages($formData)
			{
				return $this->db->insert('gallery',$formData);
			}

			public function getGalleryImages()
			{
				$sql = $this->db->order_by('createdAt','desc')->get('gallery');
				return $sql->num_rows() > 0 ? $sql->result() : false;
			}


			// =======================================save itieanary=======================================
			public function saveItinerary($formData,$type,$id)
			{
				if($type=='post'){
					return $this->db->insert('itinerary',$formData);
				}else{
					return $this->db->where('id',$id)->set($formData)->update('itinerary');
				}
			}

			public function deleteOldHighlight($itineraryId)
			{
				return $this->db->where('itineraryId',$itineraryId)->delete('highlights');
			}

			public function saveHighlight($highlightData)
			{
				return $this->db->insert('highlights',$highlightData);
			}

			public function getItinerary($where,$key)
			{
				// SELECT `itinerary`.*,GROUP_CONCAT(`highlights`.`title`) , GROUP_CONCAT(`highlights`.`image`) FROM `itinerary` INNER JOIN `highlights` ON `highlights`.`itineraryId` = `itinerary`.`id` WHERE itinerary.id = '1' ORDER BY `itinerary`.`id` DESC 
				$sql = $this->db->select('itinerarys.*,highlights.id,highlights.title,highlights.image as highlightImage,highlights.description as highlightDescription')
						->from('itinerary')
						->join('highlights', 'highlights.itineraryId = itinerary.id', 'left')
						->where($where)
						->order_by("itinerary.id", "desc")
						->get();
						return $sql->num_rows() > 0 ? $sql->result() : false;
			}
			
		}

