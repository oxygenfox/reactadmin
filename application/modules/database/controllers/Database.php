<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Database extends MY_Controller
{
    public function __construct()
    {
        if (!$this->session->userdata('role')) {
            redirect('auth');
        }
        if ($this->session->userdata('role')) {
            $this->db->select('*');
            $this->db->from('user_access');
            $this->db->join('user_submenu', 'user_access.id_menu=user_submenu.id_menu', 'inner');
            $this->db->where('user_access.id_role', $this->session->userdata('role'));
            $this->db->where('user_submenu.url', 'database');
            $access = $this->db->get()->result();
            if (!$access) {
                redirect('page');
            }
        }
        parent::__construct();
        $this->load->model('database_model', 'model');
    }

    public function index()
    {
        $x = $this->model->tampiltabel(); //AMBIL DATA TABEL-TABEL

        $data = [
            'title' => 'Database',
            'tabel' => $x
        ];

        $this->load->view('_layout/admin/head', $data);
        $this->load->view('index', $data);
    }

    public function backup()
    {

        $tabel = $this->input->post('tabel');
        $this->load->dbutil();
        $prefs = array(
            'tables'      => array($tabel),
            'format'      => 'sql',
            'filename'    => 'my_db_backup.sql'
        );
        $backup = &$this->dbutil->backup($prefs);

        $db_name = 'backup-on-' . $tabel . '-' . date("d-m-Y") . '.sql'; //NAMAFILENYA

        $save = 'assets/database/' . $db_name;

        $this->load->helper('file');

        write_file($save, $backup);

        $this->load->helper('download');

        force_download($db_name, $backup);
    }

    public function restore()
    {

        $this->load->helper('file');

        $config['upload_path'] = "./assets/database/";
        $config['allowed_types'] = "jpg|png|gif|jpeg|bmp|sql|x-sql";
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload("datafile")) {
            $error = array('error' => $this->upload->display_errors());
            echo "GAGAL UPLOAD";
            var_dump($error);
            exit();
        }

        $file = $this->upload->data();  //DIUPLOAD DULU KE DIREKTORI assets/database/
        $fotoupload = $file['file_name'];

        $isi_file = file_get_contents('./assets/database/' . $fotoupload); //PANGGIL FILE YANG TERUPLOAD
        $string_query = rtrim($isi_file, "\n;");
        $array_query = explode(";", $string_query);   //JALANKAN QUERY MERESTORE KEDATABASE
        foreach ($array_query as $query) {
            $this->db->query($query);
        }

        $path_to_file = './assets/database/' . $fotoupload;
        if (unlink($path_to_file)) {   // HAPUS FILE YANG TERUPLOAD
            redirect('database');
        } else {
            echo 'errors occured';
        }
    }
}
