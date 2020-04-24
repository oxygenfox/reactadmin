<?php
class Database_model extends CI_Model
{
    public function tampiltabel()
    {
        return $this->db->query("show tables")->result();
    }
}
