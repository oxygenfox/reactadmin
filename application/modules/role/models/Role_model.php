<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Role_model extends CI_Model
{
    function __construct()
    {
        $this->table = 'user_role';
        $this->id = 'id_role';
        $this->column_order = array(null, 'role', null);
        $this->column_search = array('role');
        $this->order = array('id_role' => 'asc');
    }

    public function getRows($postData)
    {
        $this->_get_datatables_query($postData);
        if ($postData['length'] != -1) {
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function countAll()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function countFiltered($postData)
    {
        $this->_get_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
    private function _get_datatables_query($postData)
    {

        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($postData['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                } else {
                    $this->db->or_like($item, $postData['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }
        if (isset($postData['order'])) {
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    
    public function tambah()
    {
        $role = htmlspecialchars($_POST['role']);
        $cek = $this->db->get_where($this->table, ['role' => $role])->row();
        if ($cek) {
            $data = [
                'status' => false,
                'pesan' => "role sudah ada"
            ];
            return $data;
        }
        $this->db->set('role', $role);
        $this->db->insert($this->table);
        $data = [
            'status' => true,
            'pesan' => "Role Berhasil Ditambah"
        ];
        return $data;
    }
    
    public function edit()
    {
        $id = htmlspecialchars($_POST['id']);
        $role = htmlspecialchars($_POST['role']);
        $this->db->set('role', $role);
        $this->db->where($this->id, $id);
        $this->db->update($this->table);
        
        $data = [
            'status' => true,
            'pesan' => "Data Berhasil diubah"
        ];
        
        return $data;
    }
    public function hapus()
    {
        $id = htmlspecialchars($_POST['id']);
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        
        $data = [
            'status' => true,
            'pesan' => "Data berhasil dihapus"
        ];
        
        return $data;
    }
}
