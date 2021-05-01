<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembeli extends CI_Controller
{
    public $namaFile;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembeli_model');
        $this->load->library('Form_validation');
        $this->load->library('Ion_auth');
        $this->load->helper('file');
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
                'usia' => $row->usia,
                'status' => $row->status,
                'alamat' => $row->alamat,
                'pekerjaan' => $row->pekerjaan,
                'penghasilan' => $row->penghasilan,
                'riwayat_kredit' => $row->riwayat_kredit,
                'uang_muka' => $row->uang_muka,
                'jangka_waktu' => $row->jangka_waktu,
                'agama' => $row->agama,
                'no_telpon' => $row->no_telpon,
                'ktp' => $row->ktp,
	        );

            $this->template->load('template/backend/dashboard', 'pembeli/pembeli_read', $data);
        } else {
            $this->session->set_flashdata('gagal', 'Data Calon Pembeli Tidak Dapat Ditemukan');
            redirect(site_url('pembeli'));
        }
    }

    public function uploadFile($file, $attributeName,$folder)
    {
        $filename = str_replace(' ', '_', $file[$attributeName]['name']);
        $config['upload_path']          = $folder;
        $config['allowed_types']        = 'pdf';
        $config['file_name']            = $filename;
        $config['overwrite']			= true;
        $config['max_size']             = 5120; // 1MB #ukuran maksimal gambar

        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload($attributeName)){
           $this->session->set_flashdata('gagal', $this->upload->display_errors());
           return false;
        }

        $this->namaFile = $filename;
        return true;
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah Data',
                'action' => site_url('pembeli/create_action'),
                'id_pembeli' => set_value('id_pembeli'),
                'nama_pembeli' => set_value('nama_pembeli'),
                'usia' => set_value('usia'),
                'status' => set_value('status'),
                'alamat' => set_value('alamat'),
                'pekerjaan' => set_value('pekerjaan'),
                'penghasilan' => set_value('penghasilan'),
                'riwayat_kredit' => set_value('riwayat_kredit'),
                'uang_muka' => set_value('uang_muka'),
                'jangka_waktu' => set_value('jangka_waktu'),
                'agama' => set_value('agama'),
                'no_telpon' => set_value('no_telpon'),
                'ktp' => set_value('ktp'),
            );
        $this->template->load('template/backend/dashboard', 'pembeli/pembeli_form', $data);
    }
    
    public function create_action() 
    {
        $this->_createrules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            // start upload file
            $attribute = 'ktp'; #nama attribute input form (representasi dari nama tabel di db)
            $folder = './uploads/pembeli/';
            $upload = $this->uploadFile($_FILES, $attribute, $folder);
            // end upload file

            if ($upload == false)  return redirect(site_url('pembeli'));

            $data = array(
                'nama_pembeli' => $this->input->post('nama_pembeli',TRUE),
                'usia' => $this->input->post('usia',TRUE),
                'status' => $this->input->post('status',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'pekerjaan' => $this->input->post('pekerjaan',TRUE),
                'penghasilan' => $this->input->post('penghasilan',TRUE),
                'riwayat_kredit' => $this->input->post('riwayat_kredit',TRUE),
                'uang_muka' => $this->input->post('uang_muka',TRUE),
                'jangka_waktu' => $this->input->post('jangka_waktu',TRUE),
                'agama' => $this->input->post('agama',TRUE),
                'no_telpon' => $this->input->post('no_telpon',TRUE),
                'ktp' => $this->namaFile,
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
                'usia' => set_value('usia', $row->usia),
                'status' => set_value('status', $row->status),
                'alamat' => set_value('alamat', $row->alamat),
                'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
                'penghasilan' => set_value('penghasilan', $row->penghasilan),
                'riwayat_kredit' => set_value('riwayat_kredit', $row->riwayat_kredit),
                'uang_muka' => set_value('uang_muka', $row->uang_muka),
                'jangka_waktu' => set_value('jangka_waktu', $row->jangka_waktu),
                'agama' => set_value('agama', $row->agama),
                'no_telpon' => set_value('no_telpon', $row->no_telpon),
                'ktp' => set_value('ktp', $row->ktp),
            );
            $this->template->load('template/backend/dashboard', 'pembeli/pembeli_form', $data);
        } else {
            $this->session->set_flashdata('gagal', 'Data Calon Pembeli Tidak Dapat Ditemukan');
            redirect(site_url('pembeli'));
        }
    }
    
    public function update_action() 
    {
        $this->_updaterules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembeli', TRUE));
        } else {
            if (!empty($_FILES['ktp']['name'])) {
                // start upload file
                $attribute = 'ktp'; #nama attribute input form (representasi dari nama tabel di db)
                $folder = './uploads/pembeli/';
                // unlink($folder.$this->$_FILES['ktp']['name']);
                // print_r($_FILES); exit;
                $upload = $this->uploadFile($_FILES, $attribute, $folder);
                // end upload file

                if ($upload == false)  return redirect(site_url('pembeli'));

                $data = array(
                    'nama_pembeli' => $this->input->post('nama_pembeli',TRUE),
                    'usia' => $this->input->post('usia',TRUE),
                    'status' => $this->input->post('status',TRUE),
                    'alamat' => $this->input->post('alamat',TRUE),
                    'pekerjaan' => $this->input->post('pekerjaan',TRUE),
                    'penghasilan' => $this->input->post('penghasilan',TRUE),
                    'riwayat_kredit' => $this->input->post('riwayat_kredit',TRUE),
                    'uang_muka' => $this->input->post('uang_muka',TRUE),
                    'jangka_waktu' => $this->input->post('jangka_waktu',TRUE),
                    'agama' => $this->input->post('agama',TRUE),
                    'no_telpon' => $this->input->post('no_telpon',TRUE),
                    'ktp' => $this->namaFile,
                );
            } else {
                $data = array(
                    'nama_pembeli' => $this->input->post('nama_pembeli',TRUE),
                    'usia' => $this->input->post('usia',TRUE),
                    'status' => $this->input->post('status',TRUE),
                    'alamat' => $this->input->post('alamat',TRUE),
                    'pekerjaan' => $this->input->post('pekerjaan',TRUE),
                    'penghasilan' => $this->input->post('penghasilan',TRUE),
                    'riwayat_kredit' => $this->input->post('riwayat_kredit',TRUE),
                    'uang_muka' => $this->input->post('uang_muka',TRUE),
                    'jangka_waktu' => $this->input->post('jangka_waktu',TRUE),
                    'agama' => $this->input->post('agama',TRUE),
                    'no_telpon' => $this->input->post('no_telpon',TRUE),
                );
            }

            $this->Pembeli_model->update($this->input->post('id_pembeli', TRUE), $data);
            $this->session->set_flashdata('sukses', 'Informasi Calon Pembeli Berhasil Diperbarui');
            redirect(site_url('pembeli'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pembeli_model->get_by_id($id);
        $lokasiktp = './uploads/pembeli/';
        $filektp = $row->ktp;

        if ($row) {
            $this->Pembeli_model->delete($id);
            unlink($lokasiktp.$filektp);
            $this->session->set_flashdata('sukses', 'Data Calon Pembeli Telah Dihapus');
            redirect(site_url('pembeli'));
        } else {
            $this->session->set_flashdata('gagal', 'Data Calon Pembeli Tidak dapat Ditemukan');
            redirect(site_url('pembeli'));
        }
    }
    // ------------------------- RULES FILE SIZE ALT ------------------------------------------------- 
    // if(!empty($_FILES['ktp']['name']) && ($_FILES['ktp']['error']==1 || $_FILES['ktp']['size']>1048576))
    // {
    //     return $this->form_validation->set_rules('ktp', 'ktp', 'isset');
    // }

    public function _createrules() 
    {
	$this->form_validation->set_rules('nama_pembeli', 'Nama Pembeli', 'trim|required');
	$this->form_validation->set_rules('usia', 'Usia', 'trim|required');
	$this->form_validation->set_rules('status', 'Status', 'trim|required');
	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
	$this->form_validation->set_rules('penghasilan', 'Penghasilan', 'trim|required');
	$this->form_validation->set_rules('riwayat_kredit', 'Riwayat Kredit', 'trim|required');
	$this->form_validation->set_rules('uang_muka', 'Uang Muka', 'trim|required');
	$this->form_validation->set_rules('jangka_waktu', 'Jangka Waktu', 'trim|required');
	$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
	$this->form_validation->set_rules('no_telpon', 'No. Handphone', 'trim|required|numeric');
    if (empty($_FILES['ktp']['name'])) {
        $this->form_validation->set_rules('ktp', 'KTP', 'required');
    }
    if(!empty($_FILES['ktp']['name'])) {
        $maxsize    = 1048576;
        $acceptable = array(
            'application/pdf'
        );
    
        if(($_FILES['ktp']['size'] >= $maxsize) || ($_FILES["ktp"]["size"] == 0)) {
            return $this->form_validation->set_rules('ktp', 'KTP', 'isset');
        }
    
        if((!in_array($_FILES['ktp']['type'], $acceptable)) && (!empty($_FILES["ktp"]["type"]))) {
            return $this->form_validation->set_rules('ktp', 'KTP', 'isset');
        }
    }

	$this->form_validation->set_rules('id_pembeli', 'id_pembeli', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
    public function _updaterules() 
    {
	$this->form_validation->set_rules('nama_pembeli', 'Nama Pembeli', 'trim|required');
	$this->form_validation->set_rules('usia', 'Usia', 'trim|required');
    $this->form_validation->set_rules('status', 'Status', 'trim|required');
	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
    $this->form_validation->set_rules('penghasilan', 'Penghasilan', 'trim|required');
	$this->form_validation->set_rules('riwayat_kredit', 'Riwayat Kredit', 'trim|required');
	$this->form_validation->set_rules('uang_muka', 'Uang Muka', 'trim|required');
	$this->form_validation->set_rules('jangka_waktu', 'Jangka Waktu', 'trim|required');
	$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
	$this->form_validation->set_rules('no_telpon', 'No. Handphone', 'trim|required|numeric');
    if(!empty($_FILES['ktp']['name'])) {
        $maxsize    = 1048576;
        $acceptable = array(
            'application/pdf'
        );
    
        if(($_FILES['ktp']['size'] >= $maxsize) || ($_FILES["ktp"]["size"] == 0)) {
            return $this->form_validation->set_rules('ktp', 'KTP', 'isset');
        }
    
        if((!in_array($_FILES['ktp']['type'], $acceptable)) && (!empty($_FILES["ktp"]["type"]))) {
            return $this->form_validation->set_rules('ktp', 'KTP', 'isset');
        }
    }

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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama");
        xlsWriteLabel($tablehead, $kolomhead++, "Usia");
        xlsWriteLabel($tablehead, $kolomhead++, "Status");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
        xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan");
        xlsWriteLabel($tablehead, $kolomhead++, "Penghasilan");
        xlsWriteLabel($tablehead, $kolomhead++, "Riwayat Kredit");
        xlsWriteLabel($tablehead, $kolomhead++, "Uang Muka");
        xlsWriteLabel($tablehead, $kolomhead++, "Jangka Waktu Pembayaran");
        xlsWriteLabel($tablehead, $kolomhead++, "Agama");
        xlsWriteLabel($tablehead, $kolomhead++, "No. Handphone");

        foreach ($this->Pembeli_model->get_all() as $data) {
                $kolombody = 0;

                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_pembeli);
            xlsWriteLabel($tablebody, $kolombody++, $data->usia);
            xlsWriteLabel($tablebody, $kolombody++, $data->status);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
            xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan);
            xlsWriteLabel($tablebody, $kolombody++, $data->penghasilan);
            xlsWriteLabel($tablebody, $kolombody++, $data->riwayat_kredit);
            xlsWriteLabel($tablebody, $kolombody++, $data->uang_muka);
            xlsWriteLabel($tablebody, $kolombody++, $data->jangka_waktu);
            xlsWriteLabel($tablebody, $kolombody++, $data->agama);
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