<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'sekolah';
        $this->id = 'id_sekolah';
    }
    public function getProfile()
    {
        return $this->db->get_where($this->table, [$this->id => 1])->row();
    }
    public function getMedsos()
    {
        return $this->db->get('medsos')->result();
    }
    public function update()
    {
        $gambar_lama = $this->input->post('gambarLama');
        if ($_FILES['gambar']['name']) {
            $upload = $this->_uploadImage();
            if ($gambar_lama != "noimage.png") {
                unlink("assets/img/profile/" . $gambar_lama . "");
            }
        } else {
            $upload = $gambar_lama;
        }
        $data = [
            'nama' => htmlspecialchars($_POST['nama']),
            'nohp' => htmlspecialchars($_POST['no']),
            'alamat' => htmlspecialchars($_POST['alamat']),
            'logo' => $upload
        ];
        $this->db->where($this->id, 1);
        $this->db->update($this->table, $data);
        $result = [
            'status' => true,
            'pesan' => 'Profile Berhasil Diperbaharui'
        ];
        return $result;
    }
    private function _uploadImage()
    {
        $config['upload_path']          = './assets/img/profile/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $gbr = $this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/img/profile/' . $gbr['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '100%';
            $config['width'] = 200;
            $config['height'] = 200;
            $config['new_image'] = './assets/img/profile/' . $gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            return $this->upload->data("file_name");
        }
        return "noimage.png";
    }
}
