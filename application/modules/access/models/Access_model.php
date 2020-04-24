<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'user_access';
        $this->id = 'id_access';
    }
    public function aksi()
    {
        $id_role = htmlspecialchars($_POST['id_role']);
        $id_menu = htmlspecialchars($_POST['id_menu']);
        $cek = $this->db->get_where($this->table, ['id_role' => $id_role, 'id_menu' => $id_menu])->row();
        if ($cek) {
            $this->db->where($this->id, $cek->id_access);
            $this->db->delete($this->table);
            return false;
        }
        $data = [
            'id_role' => $id_role,
            'id_menu' => $id_menu
        ];
        $this->db->insert($this->table, $data);
        return true;
    }
}
