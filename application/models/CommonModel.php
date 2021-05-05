<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

    class CommonModel extends CI_Model
    {
        public function changeStatus($table,$id,$status)
        {
            return $this->db->where('id',$id)->set('status', $status)->update($table);
        }

        public function deleteData($table,$id)
        {
            return $this->db->where('id',$id)->delete($table);
        }
    }

?>