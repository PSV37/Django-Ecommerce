<?php

class RegisterModel extends CI_Model
{
    public function insert_data($data)
    {
        $this->db->insert(TBL_ADMIN,$data);
        
        if( $this->db->affected_rows() >=1)
        {
            return  TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}

