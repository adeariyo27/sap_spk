<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembeli extends CI_Controller
{
    private $namaFile;
    private $isCreate = true;

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
                'pas_foto' => $row->pas_foto,
                'ktp' => $row->ktp,
                'kk' => $row->kk,
                'surat_nikah' => $row->surat_nikah,
                'slip_gaji' => $row->slip_gaji,
                'sk_terakhir' => $row->sk_terakhir,
                'surat_ket_kerja' => $row->surat_ket_kerja,
                'siup' => $row->siup,
                'daftar_perusahaan' => $row->daftar_perusahaan,
                'surat_ket_dom' => $row->surat_ket_dom,
                'laporan_keuangan' => $row->laporan_keuangan,
                'npwp' => $row->npwp,
                'buku_tabungan' => $row->buku_tabungan,
                'rekening_koran' => $row->rekening_koran,
                'surat_pernyataan' => $row->surat_pernyataan,
	        );

            $this->template->load('template/backend/dashboard', 'pembeli/pembeli_read', $data);
        } else {
            $this->session->set_flashdata('gagal', 'Data Calon Pembeli Tidak Dapat Ditemukan');
            redirect(site_url('pembeli'));
        }
    }

    public function uploadFile($file, $attributeName, $id = null)
    {
        $filename = uniqid() .'-'. str_replace(' ', '_', $file[$attributeName]['name']);
        $config['upload_path']          = './uploads/pembeli/';
        $config['allowed_types']        = 'pdf';
        $config['file_name']            = $filename;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB #ukuran maksimal gambar

        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload($attributeName)){
           return $this->isCreate == true ? $this->create() : $this->update($id);
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
                'usia' => set_value('usia'),
                'status' => array('','Lajang','Menikah','Cerai'),
                'alamat' => set_value('alamat'),
                'pekerjaan' => array('','Pegawai Negeri Sipil','Karyawan Swasta','Wiraswasta'),
                'penghasilan' => set_value('penghasilan'),
                'riwayat_kredit' => array('','Kolektibilitas - 1','Kolektibilitas - 2','Kolektibilitas - 3', 'Kolektibilitas - 4', 'Kolektibilitas - 5'),
                'uang_muka' => array('',7000000,8500000,10000000),
                'jangka_waktu' => array('','10 Tahun','15 Tahun','20 Tahun'),
                'agama' => array('','Islam','Kristen Protestan','Kristen Katolik','Hindhu','Buddha','Konghuchu'),
                'no_telpon' => set_value('no_telpon'),
                'pas_foto' => set_value('pas_foto'),
                'ktp' => set_value('ktp'),
                'kk' => set_value('kk'),
                'surat_nikah' => set_value('surat_nikah'),
                'slip_gaji' => set_value('slip_gaji'),
                'sk_terakhir' => set_value('sk_terakhir'),
                'surat_ket_kerja' => set_value('surat_ket_kerja'),
                'siup' => set_value('siup'),
                'daftar_perusahaan' => set_value('daftar_perusahaan'),
                'surat_ket_dom' => set_value('surat_ket_dom'),
                'laporan_keuangan' => set_value('laporan_keuangan'),
                'npwp' => set_value('npwp'),
                'buku_tabungan' => set_value('buku_tabungan'),
                'rekening_koran' => set_value('rekening_koran'),
                'surat_pernyataan' => set_value('surat_pernyataan'),
            );
        $this->template->load('template/backend/dashboard', 'pembeli/pembeli_form', $data);
    }
    
    public function create_action() 
    {
        $this->_createrules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
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
                'pas_foto' =>$this->uploadFile($_FILES, 'pas_foto'),
                'ktp' => $this->uploadFile($_FILES, 'ktp'),
                'kk' => $this->uploadFile($_FILES, 'kk'),
                'surat_nikah' => $_FILES['surat_nikah']['name'] !== null ? $this->uploadFile($_FILES, 'surat_nikah') : null, ## unrequired handler
                'slip_gaji' => $_FILES['slip_gaji']['name'] !== null ? $this->uploadFile($_FILES, 'slip_gaji') : null, ## unrequired handler
                'sk_terakhir' => $_FILES['sk_terakhir']['name'] !== null ? $this->uploadFile($_FILES, 'sk_terakhir') : null, ## unrequired handler
                'surat_ket_kerja' => $_FILES['surat_ket_kerja']['name'] !== null ? $this->uploadFile($_FILES, 'surat_ket_kerja') : null, ## unrequired handler
                'siup' => $_FILES['siup']['name'] !== null ? $this->uploadFile($_FILES, 'siup') : null, ## unrequired handler
                'daftar_perusahaan' => $_FILES['daftar_perusahaan']['name'] !== null ? $this->uploadFile($_FILES, 'daftar_perusahaan') : null, ## unrequired handler
                'surat_ket_dom' => $_FILES['surat_ket_dom']['name'] !== null ? $this->uploadFile($_FILES, 'surat_ket_dom') : null, ## unrequired handler
                'laporan_keuangan' => $_FILES['laporan_keuangan']['name'] !== null ? $this->uploadFile($_FILES, 'laporan_keuangan') : null, ## unrequired handler
                'npwp' =>$this->uploadFile($_FILES, 'npwp'),
                'buku_tabungan' => $this->uploadFile($_FILES, 'buku_tabungan'),
                'rekening_koran' => $this->uploadFile($_FILES, 'rekening_koran'),
                'surat_pernyataan' => $this->uploadFile($_FILES, 'surat_pernyataan'),
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
                'status' => array('','Lajang','Menikah','Cerai'),
                'statusdb' => set_value('status', $row->status),
                'alamat' => set_value('alamat', $row->alamat),
                'pekerjaan' => array('','Pegawai Negeri Sipil','Karyawan Swasta','Wiraswasta'),
                'pekerjaandb' => set_value('pekerjaan', $row->pekerjaan),
                'penghasilan' => set_value('penghasilan', $row->penghasilan),
                'riwayat_kredit' => array('','Kolektibilitas - 1','Kolektibilitas - 2','Kolektibilitas - 3', 'Kolektibilitas - 4', 'Kolektibilitas - 5'),
                'riwayat_kreditdb' => set_value('riwayat_kredit', $row->riwayat_kredit),
                'uang_muka' => array('',7000000,8500000,10000000),
                'uang_mukadb' => set_value('uang_muka',$row->uang_muka),
                'jangka_waktu' => array('','10 Tahun','15 Tahun','20 Tahun'),
                'jangka_waktudb' => set_value('jangka_waktu', $row->jangka_waktu),
                'agama' => array('','Islam','Kristen Protestan','Kristen Katolik','Hindhu','Buddha','Konghuchu'),
                'agamadb' => set_value('agama', $row->agama),
                'no_telpon' => set_value('no_telpon', $row->no_telpon),
                'pas_foto' => set_value('pas_foto', $row->pas_foto),
                'ktp' => set_value('ktp', $row->ktp),
                'kk' => set_value('kk', $row->kk),
                'surat_nikah' => set_value('surat_nikah', $row->surat_nikah),
                'slip_gaji' => set_value('slip_gaji', $row->slip_gaji),
                'sk_terakhir' => set_value('sk_terakhir', $row->sk_terakhir),
                'surat_ket_kerja' => set_value('surat_ket_kerja', $row->surat_ket_kerja),
                'siup' => set_value('siup', $row->siup),
                'daftar_perusahaan' => set_value('daftar_perusahaan', $row->daftar_perusahaan),
                'surat_ket_dom' => set_value('surat_ket_dom', $row->surat_ket_dom),
                'laporan_keuangan' => set_value('laporan_keuangan', $row->laporan_keuangan),
                'npwp' => set_value('npwp', $row->npwp),
                'buku_tabungan' => set_value('buku_tabungan', $row->buku_tabungan),
                'rekening_koran' => set_value('rekening_koran', $row->rekening_koran),
                'surat_pernyataan' => set_value('surat_pernyataan', $row->surat_pernyataan),
            );
            $this->template->load('template/backend/dashboard', 'pembeli/pembeli_form_edit', $data);
        } else {
            $this->session->set_flashdata('gagal', 'Data Calon Pembeli Tidak Dapat Ditemukan');
            redirect(site_url('pembeli'));
        }
    }
    
    public function update_action() 
    {
        $this->_updaterules();
        $this->isCreate = false;

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembeli', TRUE));
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

            $detail = $this->Pembeli_model->get_by_id($this->input->post('id_pembeli'));

            // get all files and insert one by one if it's exist
            if (isset($_FILES)) {
                foreach ($_FILES as $key => $value) {
                    if (!empty($value['tmp_name'])) {
                        $data[$key] = $newFile = $this->uploadFile($_FILES, $key, $this->input->post('id_pembeli', TRUE));

                        // replace current file and update table
                        unlink('./uploads/pembeli/'. $detail->$key);
                        $this->Pembeli_model->update($this->input->post('id_pembeli'), [$key => $newFile]);
                    }
                }
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
        $filedelete = array($row->pas_foto, $row->ktp, $row->kk, $row->surat_nikah, $row->slip_gaji, $row->sk_terakhir, $row->surat_ket_kerja, $row->siup, $row->daftar_perusahaan, $row->surat_ket_dom, $row->laporan_keuangan, $row->npwp, $row->buku_tabungan, $row->rekening_koran, $row->surat_pernyataan);

        if ($row) {
            $this->Pembeli_model->delete($id);
            foreach($filedelete as $fd) {
                unlink($lokasiktp.$fd);
            }
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
	
    $fileList = ['pas_foto', 'ktp', 'kk', 'surat_nikah', 'slip_gaji', 'sk_terakhir', 'surat_ket_kerja', 'siup', 'daftar_perusahaan', 'surat_ket_dom', 'laporan_keuangan', 'npwp', 'buku_tabungan', 'rekening_koran', 'surat_pernyataan']; # please add new list for all field for file (same to field name on DB)
    $fileListreq = ['pas_foto', 'kk', 'ktp', 'npwp', 'buku_tabungan', 'rekening_koran', 'surat_pernyataan'];

    // loop all file validation
    for ($i=0; $i < count($fileListreq) ; $i++) { 
        if (empty($_FILES[$fileListreq[$i]]['name'])) {
            $this->form_validation->set_rules($fileListreq[$i], str_replace('_', ' ', ucwords($fileListreq[$i])), 'required');
        }
        if(!empty($_FILES[$fileListreq[$i]]['name'])) {
            $maxsize    = 1048576;
            $acceptable = array(
                'application/pdf'
            );
        
            if(($_FILES[$fileListreq[$i]]['size'] >= $maxsize) || ($_FILES[$fileListreq[$i]]["size"] == 0)) {
                return $this->form_validation->set_rules($fileListreq[$i], str_replace('_', ' ', ucwords($fileListreq[$i])), 'isset');
            }
        
            if((!in_array($_FILES[$fileListreq[$i]]['type'], $acceptable)) && (!empty($_FILES[$fileListreq[$i]]["type"]))) {
                return $this->form_validation->set_rules($fileListreq[$i], str_replace('_', ' ', ucwords($fileListreq[$i])), 'isset');
            }
        }
    }

    for ($i=0; $i < count($fileList) ; $i++) { 
        if(!empty($_FILES[$fileList[$i]]['name'])) {
            $maxsize    = 1048576;
            $acceptable = array(
                'application/pdf'
            );
        
            if(($_FILES[$fileList[$i]]['size'] >= $maxsize) || ($_FILES[$fileList[$i]]["size"] == 0)) {
                return $this->form_validation->set_rules($fileList[$i], str_replace('_', ' ', ucwords($fileList[$i])), 'isset');
            }
        
            if((!in_array($_FILES[$fileList[$i]]['type'], $acceptable)) && (!empty($_FILES[$fileList[$i]]["type"]))) {
                return $this->form_validation->set_rules($fileList[$i], str_replace('_', ' ', ucwords($fileList[$i])), 'isset');
            }
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
    
    $fileList = ['pas_foto', 'ktp', 'kk', 'surat_nikah', 'slip_gaji', 'sk_terakhir', 'surat_ket_kerja', 'siup', 'daftar_perusahaan', 'surat_ket_dom', 'laporan_keuangan', 'npwp', 'buku_tabungan', 'rekening_koran', 'surat_pernyataan']; # please add new list for all field for file (same to field name on DB)

    // loop all file validation
    for ($i=0; $i < count($fileList) ; $i++) { 
        if(!empty($_FILES[$fileList[$i]]['name'])) {
            $maxsize    = 1048576;
            $acceptable = array(
                'application/pdf'
            );
        
            if(($_FILES[$fileList[$i]]['size'] >= $maxsize) || ($_FILES[$fileList[$i]]["size"] == 0)) {
                return $this->form_validation->set_rules($fileList[$i], str_replace('_', ' ', ucwords($fileList[$i])), 'isset');
            }
        
            if((!in_array($_FILES[$fileList[$i]]['type'], $acceptable)) && (!empty($_FILES[$fileList[$i]]["type"]))) {
                return $this->form_validation->set_rules($fileList[$i], str_replace('_', ' ', ucwords($fileList[$i])), 'isset');
            }
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