<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();        
        $this->load->library('Form_validation');
        $this->load->library('M_db');
		$this->load->model('Pembeli_model','mod_pembeli');
		$this->load->model('Kriteria_model','mod_kriteria');
		$this->load->model('Alternatif_model','mod_alternatif');
		$this->load->library('Ion_auth');
		ceklogin();

    }
    
    function index()
    {
		$q = urldecode($this->input->get('q', TRUE));

		$config['total_rows'] = $this->mod_alternatif->total_rows($q);

     	$sql="SELECT alternatif.id_alternatif,pembeli.id_pembeli,pembeli.nama_pembeli,pembeli.pekerjaan,pembeli.penghasilan,pembeli.riwayat_kredit,pembeli.usia,pembeli.uang_muka,pembeli.jangka_waktu FROM alternatif LEFT JOIN pembeli ON alternatif.id_pembeli = pembeli.id_pembeli";
        
		$data = array(
            'q' => $q,
            'total_rows' => $config['total_rows'],
        );
		$data['data']=$this->m_db->get_query_data($sql);
		$this->template->load('template/backend/dashboard', 'alternatif/alternatif_list', $data);
    }

    function create()
    {
    			
			$id_pembeli=$this->input->post('id_pembeli');
			$kriteria=$this->input->post('kriteria');
			$this->mod_alternatif->alternatif_add($id_pembeli,$kriteria);

			$d2=$this->m_db->get_data('alternatif');
			if(!empty($d2))
			{
				$listPembeli="";
				foreach($d2 as $r)
				{
					$listPembeli.=$r->id_pembeli.",";
				}
				$listPembeli=substr($listPembeli,0,-1);
				
				$sql="Select * from pembeli Where id_pembeli NOT IN ($listPembeli)";
				$d['pembeli']=$this->m_db->get_query_data($sql);
				$d['kriteria']=$this->mod_kriteria->kriteria_data();
	        	$this->template->load('template/backend/dashboard', 'alternatif/alternatif_form', $d);
			}else{

	        $d['pembeli']=$this->mod_pembeli->pembeli_data();
	        $d['kriteria']=$this->mod_kriteria->kriteria_data();
	        $this->template->load('template/backend/dashboard', 'alternatif/alternatif_form', $d);
	    }
		
	}

	function hapus()
	{
		$id=$this->input->get('alternatif');
		if($this->mod_alternatif->alternatif_delete($id)==TRUE)
		{
			$this->session->set_flashdata('sukses', 'Alternatif Berhasil Dihapus');
			redirect('alternatif');
		}else{
			$this->session->set_flashdata('gagal', 'Alternatif Gagal Dihapus');
			redirect('alternatif');
		}
	}
    
}
