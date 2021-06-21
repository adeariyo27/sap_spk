<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alternatif_model extends CI_Model
{	

	private $tb_alternatif='alternatif';
	private $tb_alternatif_nilai='alternatif_nilai';
    function __construct()
    {
         $this->load->library('M_db');
    }
    
	function total_rows($q = NULL) 
	{
        $this->db->like('id_alternatif', $q);
		$this->db->from($this->tb_alternatif);
        return $this->db->count_all_results();
    }
	
	function alternatif_add($id_pembeli,$kriteriaData=array(), $sub=array())
	{
        if($this->m_db->is_bof('pembeli')==FALSE)
        {
        	if(!empty($kriteriaData))
        	{
				$d=array(
				'id_pembeli'=>$id_pembeli,
				);
				if($this->m_db->add_row('alternatif',$d)==TRUE)
				{
					$alternatifID=$this->m_db->last_insert_id();
					foreach($kriteriaData as $rK=>$rV)
					{
						$d2=array(
						'id_alternatif'=>$alternatifID,
						'id_kriteria'=>$rK,
						'id_subkriteria'=>$rV,
						'id_nilai'=>$rV,
						);
						$this->m_db->add_row('alternatif_nilai',$d2);
					}
					$this->session->set_flashdata('sukses', 'Alternatif Berhasil Ditambahkan');
					redirect('Alternatif','refresh');
				}else{
					//echo "GAGAL TAMBAH PESERTA";
					return false;
				}
			}else{
				//echo "DATA KRITERIA TAK ADA";
				return false;
			}		
		}else{
			//echo "SISWA TIDAK ADA";
			return false;
		}
	}

	function alternatif_delete($id_alternatif)
	{
		$s=array(
		'id_alternatif'=>$id_alternatif,
		);
		if($this->m_db->delete_row($this->tb_alternatif,$s)==TRUE)
		if($this->m_db->delete_row($this->tb_alternatif_nilai,$s)==TRUE)
		{
			return true;
		}else{
			return false;
		}
	}
	


}