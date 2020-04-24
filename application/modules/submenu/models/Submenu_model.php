<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Submenu_model extends CI_Model
{
    function __construct()
    {
        $this->table = 'user_submenu';
        $this->id = 'id_submenu';
        $this->column_order = array(null, 'title', 'icon', 'url', null, 'is_active', null);
        $this->column_search = array('title');
        $this->order = array('no_urut' => 'asc');
    }

    public function getRows($postData, $id)
    {
        $this->_get_datatables_query($postData);
        if ($postData['length'] != -1) {
            $this->db->limit($postData['length'], $postData['start']);
        }
        $this->db->where('id_menu', $id);
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
        $title = htmlspecialchars($_POST['title']);
        $id_menu = htmlspecialchars($_POST['id_m']);
        $icon = htmlspecialchars($_POST['icon']);
        $url = htmlspecialchars($_POST['url']);
        $order = count($this->db->get_where($this->table, ['id_menu' => $id_menu])->result()) + 1;
        $data = [
            'id_menu' => $id_menu,
            'title' => $title,
            'icon' => $icon,
            'url' => $url,
            'is_active' => 1,
            'no_urut' => $order
        ];
        $this->db->insert($this->table, $data);
        return "Data Submenu Berhasil Ditambah";
    }
    public function edit()
    {
        $id = htmlspecialchars($_POST['id']);
        $id_menu = htmlspecialchars($_POST['id_m']);
        $title = htmlspecialchars($_POST['title']);
        $icon = htmlspecialchars($_POST['icon']);
        $url = htmlspecialchars($_POST['url']);
        $data = [
            'title' => $title,
            'icon' => $icon,
            'id_menu' => $id_menu,
            'url' => $url
        ];
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        return "Data Submenu Berhasil diubah";
    }
    public function hapus()
    {
        $id = htmlspecialchars($_POST['id']);
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return "Data Submenu Berhasil dihapus";
    }
    public function active()
    {
        $id = $this->input->post('id');
        $active = $this->input->post('active');
        if ($active == 1) {
            $this->db->set('is_active', 0);
            $data['active'] = 'false';
        } else {
            $this->db->set('is_active', 1);
            $data['active'] = 'true';
        }
        $this->db->where($this->id, $id);
        $data['data'] = $this->db->update($this->table);
        return $data;
    }
    public function down()
    {
        $order = $this->input->post('no_order');
        $id_menu = $this->input->post('id_menu');
        $id_submenu = $this->input->post('id_submenu');
        $hitung = count($this->db->get_where($this->table, ['id_menu' => $id_menu])->result());
        if ($order < $hitung) {
            $up = $this->db->get_where($this->table, ['id_menu' => $id_menu, 'no_urut' => $order + 1])->row();
            $this->db->set('no_urut', $order + 1);
            $this->db->where($this->id, $id_submenu);
            $this->db->update($this->table);
            if($up){
                $this->db->set('no_urut', $up->no_urut - 1);
                $this->db->where($this->id, $up->id_submenu);
                $this->db->update($this->table);
            }
            return true;
        }
        return false;
    }
    public function up()
    {
        $order = $this->input->post('no_order');
        $id_menu = $this->input->post('id_menu');
        $id_submenu = $this->input->post('id_submenu');
        if ($order > 1) {
            $up = $this->db->get_where($this->table, ['id_menu' => $id_menu, 'no_urut' => $order - 1])->row();
            $this->db->set('no_urut', $order - 1);
            $this->db->where($this->id, $id_submenu);
            $this->db->update($this->table);
            if($up){
                $this->db->set('no_urut', $up->no_urut + 1);
                $this->db->where($this->id, $up->id_submenu);
                $this->db->update($this->table);
            }
            return true;
        }
        return false;
    }
}
