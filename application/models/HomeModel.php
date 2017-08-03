<?php

class HomeModel extends CI_Model {

    public function check_data($email, $password) {
        $this->db->select('tu.*,r.role as role_name');
        $this->db->join(TBL_ROLE . ' as r', 'r.id=tu.user_role', 'inner');
        $this->db->from(TBL_ADMIN . ' as tu ');
        $this->db->where(['tu.email' => $email, 'tu.password' => $password]);
        $query = $this->db->get();
         //echo $this->db->last_query();
         //exit;
        if ($query->num_rows()) {
            return $query->row();
            // return True;
        } else {
            return false;
        }
    }

}
