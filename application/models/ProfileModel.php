<?php

class ProfileModel extends CI_Model{
    
     public function get_user_role($id) {
        $this->db->select('role');
        $q = $this->db->where(['id' => $id])
                ->get('tbl_role');
        if ($q->num_rows()) {
            return $q->row();
        } else {
            return false;
        }
    }
    
    public function check_data($id)
    { 
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('id',$id);
        $qs = $this->db->get();
        if($qs->num_rows() == 1){
        return $qs->row();
        }
        else
        {
        return FALSE;
        }
    }

    public  function update_user_data($user_id,$data){
        $this->db->where('id', $user_id);
        $this->db->update(TBL_ADMIN, $data);
        return true;
    }
    
    
     public function update_profile($user_id, $img){
        if ($user_id != '' && $img!='') {
            $sql = $this->db->where('id', $user_id)
                   ->update(TBL_ADMIN, array('image' => $img));
        }
        if ($this->db->affected_rows()) {
            return true;
        }
        return false;
    }
    
    
    
}
    