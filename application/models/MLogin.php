<?php

    class MLogin extends CI_Model{
        function cekLogin($table,$where){
            return $this->db->get_where($table,$where);
        }
    }

?>