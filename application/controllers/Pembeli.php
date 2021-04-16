<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembeli extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembeli_model');
        $this->load->library('Form_validation');
        $this->load->library('Ion_auth');
        ceklogin();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pembeli/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembeli/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembeli/';
            $config['first_url'] = base_url() . 'pembeli/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pembeli_model->total_rows($q);
        $pembeli = $this->Pembeli_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembeli_data' => $pembeli,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template/backend/dashboard', 'pembeli/pembeli_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pembeli_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_pembeli' => $row->id_pembeli,
                'nama_pembeli' => $row->nama_pembeli,
                'nama_kepsek' => $row->nama_kepsek,
                'alamat_pembeli' => $row->alamat_pembeli,
                'visi' => $row->visi,
                'misi' => $row->misi,
                'ktp' => $row->ktp,
                'no_telpon' => $row->no_telpon,
	        );

            $this->template->load('template/backend/dashboard', 'pembeli/pembeli_read', $data);
        } else {
            $this->session->set_flashdata('gagal', 'Record Not Found');
            redirect(site_url('pembeli'));
        }
    }

    public function uploadFile($file)
    {
        $filename = str_replace(' ', '_',$path = $file['ktp']['name']);
        $config['upload_path']          = './uploads/pembeli/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['file_name']            = $filename;
        $config['overwrite']			= true;
        $config['max_size']             = 5120; // 1MB #ukuran maksimal gambar

        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('ktp')){
            // $error = array('error' => $this->upload->display_errors());
           return 'default.png';
        }

        return $filename;
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah Data',
                'action' => site_url('pembeli/create_action'),
                'id_pembeli' => set_value('id_pembeli'),
                'nama_pembeli' => set_value('nama_pembeli'),
                'nama_kepsek' => set_value('nama_kepsek'),
                'alamat_pembeli' => set_value('alamat_pembeli'),
                'visi' => set_value('visi'),
                'misi' => set_value('misi'),
                'no_telpon' => set_value('no_telpon'),
                'ktp' => set_value('ktp'),
            );
        $this->template->load('template/backend/dashboard', 'pembeli/pembeli_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $upload = $this->uploadFile($_FILES);
            $data = array(
                'nama_pembeli' => $this->input->post('nama_pembeli',TRUE),
                'nama_kepsek' => $this->input->post('nama_kepsek',TRUE),
                'alamat_pembeli' => $this->input->post('alamat_pembeli',TRUE),
                'visi' => $this->input->post('visi',TRUE),
                'misi' => $this->input->post('misi',TRUE),
                'no_telpon' => $this->input->post('no_telpon',TRUE),
                'ktp' => $upload,
            );

            $this->Pembeli_model->insert($data);
            $this->session->set_flashdata('sukses', 'Calon Pembeli Berhasil Ditambahkan');
            redirect(site_url('pembeli'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pembeli_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('pembeli/update_action'),
                'id_pembeli' => set_value('id_pembeli', $row->id_pembeli),
                'nama_pembeli' => set_value('nama_pembeli', $row->nama_pembeli),
                'nama_kepsek' => set_value('nama_kepsek', $row->nama_kepsek),
                'alamat_pembeli' => set_value('alamat_pembeli', $row->alamat_pembeli),
                'visi' => set_value('visi', $row->visi),
                'misi' => set_value('misi', $row->misi),
                'no_telpon' => set_value('no_telpon', $row->no_telpon),
            );
            $this->template->load('template/backend/dashboard', 'pembeli/pembeli_form', $data);
        } else {
            $this->session->set_flashdata('gagal', 'Data Calon Pembeli Tidak dapat Ditemukan');
            redirect(site_url('pembeli'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembeli', TRUE));
        } else {
            $data = array(
                'nama_pembeli' => $this->input->post('nama_pembeli',TRUE),
                'nama_kepsek' => $this->input->post('nama_kepsek',TRUE),
                'alamat_pembeli' => $this->input->post('alamat_pembeli',TRUE),
                'visi' => $this->input->post('visi',TRUE),
                'misi' => $this->input->post('misi',TRUE),
                'no_telpon' => $this->input->post('no_telpon',TRUE),
	        );

            $this->Pembeli_model->update($this->input->post('id_pembeli', TRUE), $data);
            $this->session->set_flashdata('sukses', 'Informasi Calon Pembeli Berhasil Diperbarui');
            redirect(site_url('pembeli'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pembeli_model->get_by_id($id);

        if ($row) {
            $this->Pembeli_model->delete($id);
            $this->session->set_flashdata('sukses', 'Data Calon Pembeli Telah Dihapus');
            redirect(site_url('pembeli'));
        } else {
            $this->session->set_flashdata('gagal', 'Data Calon Pembeli Tidak dapat Ditemukan');
            redirect(site_url('pembeli'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_pembeli', 'Nama Pembeli', 'trim|required');
	$this->form_validation->set_rules('nama_kepsek', 'nama kepsek', 'trim|required');
	$this->form_validation->set_rules('alamat_pembeli', 'alamat pembeli', 'trim|required');
	$this->form_validation->set_rules('visi', 'visi', 'trim|required');
	$this->form_validation->set_rules('misi', 'misi', 'trim|required');
	$this->form_validation->set_rules('no_telpon', 'no telpon', 'trim|required|numeric');

	$this->form_validation->set_rules('id_pembeli', 'id_pembeli', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pembeli.xls";
        $judul = "pembeli";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Pembeli");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Kepsek");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat Pembeli");
        xlsWriteLabel($tablehead, $kolomhead++, "Visi");
        xlsWriteLabel($tablehead, $kolomhead++, "Misi");
        xlsWriteLabel($tablehead, $kolomhead++, "No Telpon");

        foreach ($this->Pembeli_model->get_all() as $data) {
                $kolombody = 0;

                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_pembeli);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_kepsek);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat_pembeli);
            xlsWriteLabel($tablebody, $kolombody++, $data->visi);
            xlsWriteLabel($tablebody, $kolombody++, $data->misi);
            xlsWriteLabel($tablebody, $kolombody++, $data->no_telpon);

            $tablebody++;
                $nourut++;
            }

            xlsEOF();
            exit();
        }

}

/* End of file Pembeli.php */
/* Location: ./application/controllers/Pembeli.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-23 05:12:40 */
/* http://harviacode.com */