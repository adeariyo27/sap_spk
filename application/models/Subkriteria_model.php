<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subkriteria_model extends CI_Model
{

    public $table = 'subkriteria';
    public $id = 'id_subkriteria';
    public $order = 'ASC';
    public $id_kriteria = 'id_kriteria';

    function __construct()
    {
        parent::__construct();
    }

    function jumlah(){
        return $this->db->get('subkriteria');
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function index(){
        $query = " SELECT
                    subkriteria.id_subkriteria,
                    subkriteria.nama_subkriteria,
                    subkriteria.id_kriteria,
                    subkriteria.tipe,
                    subkriteria.nilai_minimum,
                    subkriteria.nilai_maksimum,
                    subkriteria.op_min,
                    subkriteria.op_max,
                    kriteria.id_kriteria,
                    kriteria.nama_kriteria
                    FROM
                    subkriteria
                    INNER JOIN kriteria ON kriteria.id_kriteria = subkriteria.id_kriteria";
                    return $this->db->query($query);
    }

    function get_by_kriteria_id($id_kriteria)
    {
        $query = " SELECT
                    subkriteria.id_subkriteria,
                    subkriteria.nama_subkriteria,
                    subkriteria.id_kriteria,
                    subkriteria.tipe,
                    subkriteria.nilai_minimum,
                    subkriteria.nilai_maksimum,
                    subkriteria.op_min,
                    subkriteria.op_max,
                    kriteria.id_kriteria,
                    kriteria.nama_kriteria
                    FROM
                    subkriteria 
                    INNER JOIN kriteria ON '$id_kriteria' = subkriteria.id_kriteria  WHERE kriteria.id_kriteria = '$id_kriteria' ORDER BY nama_subkriteria ASC  ";
                    return $this->db->query($query);
    }
    
    function subkriteria_add($tipe,$id_kriteria,$nama_subkriteria,$nilai_minimum,$nilai_maksimum,$op_max,$op_min)
    {
        $data=array();
        if($tipe=="teks")
        {
            $data=array(
            'nama_subkriteria'=>$nama_subkriteria,
            'id_kriteria'=>$id_kriteria,
            'tipe'=>$tipe,
            );
        }else{
            $data=array(
            'nama_subkriteria'=>$nilai_minimum." - ".$nilai_maksimum,
            'id_kriteria'=>$id_kriteria,
            'tipe'=> $tipe,
            'nilai_minimum'=>$nilai_minimum,
            'nilai_maksimum'=>$nilai_maksimum,
            'op_min'=>$op_min,
            'op_max'=>$op_max,
            );
        }
        $this->db->insert($this->table, $data);
    }

    function subkriteria_edit($subkriteriaID,$tipe,$kriteria,$nama_subkriteria,$nilai_minimum,$nilai_maksimum,$op_max,$op_min)
    {
        $s=array(
        'id_subkriteria'=>$subkriteriaID,
        );
        $d=array();
        if($tipe=="teks")
        {
            $d=array(
            'nama_subkriteria'=>$nama_subkriteria,
            'id_kriteria'=>$kriteria,
            'tipe'=>$tipe,
            'nilai_minimum'=>NULL,
            'nilai_maksimum'=>NULL,
            'op_min'=>NULL,
            'op_max'=>NULL,
            );
        }else{
            $d=array(
            'nama_subkriteria'=>$nilai_minimum." - ".$nilai_maksimum,
            'id_kriteria'=>$kriteria,
            'tipe'=>$tipe,
            'nilai_minimum'=>$nilai_minimum,
            'nilai_maksimum'=>$nilai_maksimum,
            'op_min'=>$op_min,
            'op_max'=>$op_max,
            );
        }
        
        if($this->m_db->edit_row($this->table,$d,$s)==TRUE)
        {
            return true;
        }else{
            return false;
        }
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_subkriteria', $q);
    	$this->db->or_like('nama_subkriteria', $q);
    	$this->db->or_like('id_kriteria', $q);
    	$this->db->or_like('tipe', $q);
    	$this->db->or_like('nilai_minimum', $q);
    	$this->db->or_like('nilai_maksimum', $q);
    	$this->db->or_like('op_min', $q);
    	$this->db->or_like('op_max', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_subkriteria', $q);
	$this->db->or_like('nama_subkriteria', $q);
	$this->db->or_like('id_kriteria', $q);
	$this->db->or_like('tipe', $q);
	$this->db->or_like('nilai_minimum', $q);
	$this->db->or_like('nilai_maksimum', $q);
	$this->db->or_like('op_min', $q);
	$this->db->or_like('op_max', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    
    function delete_by_kriteria($id_kriteria)
    {
        $this->db->where($this->id_kriteria, $id_kriteria);
        $this->db->delete($this->table);
    }

    

}

/* End of file Subkriteria_model.php */
/* Location: ./application/models/Subkriteria_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-29 15:35:40 */
/* http://harviacode.com */