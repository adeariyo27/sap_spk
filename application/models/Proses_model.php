<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Proses_model extends CI_Model
{	
    function __construct()
    {
    	parent::__construct(); 
        $this->load->library('m_db');
        $this->load->model('Kriteria_model','mod_kriteria');
        $this->load->model('Subkriteria_model','mod_subkriteria');
    }
    
	
	function proseshitung()
	{
		$dKriteria=$this->mod_kriteria->kriteria_data();
			$dAlternatif=$this->m_db->get_data('alternatif');
			if(!empty($dAlternatif))
			{
				
				foreach($dAlternatif as $rAlternatif)
				{
					$alternatifID=$rAlternatif->id_alternatif;
					$pembeliID=$rAlternatif->id_pembeli;
					$nama_pembeli=field_value('pembeli','id_pembeli',$pembeliID,'nama_pembeli');			
					if(!empty($dKriteria))
					{
						$total=0;
						foreach($dKriteria as $rKriteria)
						{						
							$kriteriaid=$rKriteria->id_kriteria;
							$subkriteria=alternatif_nilai($alternatifID,$kriteriaid);
							// $nilaiID=field_value('kriteria','id_kriteria',$subkriteria,'id_kriteria');
							// $nilai=field_value('kriteria','id_kriteria',$nilaiID,'nama_kriteria');
							$prioritaskriteria = ambil_prioritas_kriteria($kriteriaid);
							$prioritassubkriteria=ambil_prioritas($subkriteria);
	
							$prioritas=$prioritassubkriteria*$prioritaskriteria;
	
							$total+=$prioritas;						
						}						
					}
					
					$shasil=array(
					'id_alternatif'=>$alternatifID,
					);
					$dhasil=array(
					'total'=>$total,
					);
					$this->m_db->edit_row('alternatif',$dhasil,$shasil);
			
					$dPH=$this->m_db->get_data('alternatif');
					$kuota = 100;
					$rank=0;
					foreach($dPH as $rPH)
					{
						$rank+=1;
						$d=array();
						if($rank <= $kuota)
						{
							$d=array(
							'status'=>'Unggulan',
							);
						}else{
							$d=array(
							'status'=>'Belum Unggulan',
							);
						}
						$this->m_db->edit_row('alternatif',$d,array('id_alternatif'=>$rPH->id_alternatif));
					}
					
					return true;
				}								
			}else{
				return false;
			}
			
		}
	
}