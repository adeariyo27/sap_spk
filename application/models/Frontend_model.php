<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Frontend_model extends CI_Model
{	
    function __construct()
    {
    	parent::__construct(); 
    	
    }
    
    function tampilkan_data(){
    	// $sql = " SELECT
					// alternatif.status,
					// alternatif.total,
					// pembeli.nama_pembeli,
					// pembeli.alamat_pembeli,
					// pembeli.id_pembeli,
					// alternatif.id_pembeli,
					// alternatif.id_alternatif
					// FROM
					// alternatif
					// INNER JOIN pembeli ON pembeli.id_pembeli = alternatif.id_pembeli ORDER BY total DESC ";
    	$sql = " SELECT
					pembeli.nama_pembeli,
					pembeli.alamat,
					pembeli.id_pembeli,
					alternatif.id_pembeli,
					alternatif.id_alternatif
					FROM
					alternatif
					INNER JOIN pembeli ON pembeli.id_pembeli = alternatif.id_pembeli";
    	return $this->db->query($sql);
    }

    function tampilkan_detail($id_pembeli){
  		// $param = array('id_pembeli' =>$id_pembeli);
		// return $this->db->get_where('pembeli', $param);
		$sql = " SELECT
					alternatif_nilai.id_alternatif_nilai,
					alternatif_nilai.id_alternatif,
					alternatif_nilai.id_kriteria,
					alternatif_nilai.id_subkriteria,
					alternatif.id_alternatif,
					alternatif.id_pembeli,
					alternatif.status,
					alternatif.total,
					kriteria.id_kriteria,
					kriteria.nama_kriteria,
					subkriteria.id_subkriteria,
					subkriteria.nama_subkriteria,
					subkriteria.id_kriteria,
					pembeli.id_pembeli,
					pembeli.nama_pembeli,
					pembeli.nama_kepsek,
					pembeli.alamat_pembeli,
					pembeli.visi,
					pembeli.misi,
					pembeli.no_telpon
					FROM
					alternatif_nilai
					INNER JOIN alternatif ON alternatif_nilai.id_alternatif = alternatif.id_alternatif
					INNER JOIN kriteria ON alternatif_nilai.id_kriteria = kriteria.id_kriteria
					INNER JOIN subkriteria ON kriteria.id_kriteria = subkriteria.id_kriteria AND alternatif_nilai.id_subkriteria = subkriteria.id_subkriteria
					INNER JOIN pembeli ON alternatif.id_pembeli = pembeli.id_pembeli
					WHERE pembeli.id_pembeli = '$id_pembeli'
				 ";
				 return $this->db->query($sql);

    }

    function detail_kriteria($id_pembeli)
    {
    	$sql = " SELECT
					alternatif_nilai.id_alternatif_nilai,
					alternatif_nilai.id_alternatif,
					alternatif_nilai.id_kriteria,
					alternatif_nilai.id_subkriteria,
					alternatif.id_alternatif,
					alternatif.id_pembeli,
					alternatif.status,
					alternatif.total,
					kriteria.id_kriteria,
					kriteria.nama_kriteria,
					subkriteria.id_subkriteria,
					subkriteria.nama_subkriteria,
					subkriteria.id_kriteria,
					pembeli.id_pembeli,
					pembeli.nama_pembeli,
					pembeli.nama_kepsek,
					pembeli.alamat_pembeli,
					pembeli.visi,
					pembeli.misi,
					pembeli.no_telpon
					FROM
					alternatif_nilai
					INNER JOIN alternatif ON alternatif_nilai.id_alternatif = alternatif.id_alternatif
					INNER JOIN kriteria ON alternatif_nilai.id_kriteria = kriteria.id_kriteria
					INNER JOIN subkriteria ON kriteria.id_kriteria = subkriteria.id_kriteria AND alternatif_nilai.id_subkriteria = subkriteria.id_subkriteria
					INNER JOIN pembeli ON alternatif.id_pembeli = pembeli.id_pembeli
					WHERE pembeli.id_pembeli = '$id_pembeli'
				 ";
				 return $this->db->query($sql);
    }
	
}