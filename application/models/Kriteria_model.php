<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{

    public $table = 'kriteria';
    public $id = 'id_kriteria';
    public $order = 'ASC';
    private $tb_kriteria='kriteria';        
    private $tb_subkriteria='subkriteria';

    function __construct()
    {
        parent::__construct();
        $this->load->library('m_db');
    }

     function kriteria_data($where=array(),$orderK="id_kriteria ASC")
    {
        $d=$this->m_db->get_data($this->tb_kriteria,$where,$orderK);
        return $d;
    }

    function kriteria_info($kriteriaID,$output)
    {
        $s=array(
        'id_kriteria'=>$kriteriaID,
        );
        $item=$this->m_db->get_row($this->tb_kriteria,$s,$output);
        return $item;
    }

    function subkriteria_data($where=array(),$orderK="nama_subkriteria ASC")
    {
        $d=$this->m_db->get_data($this->tb_subkriteria,$where,$orderK);
        return $d;
    }

    function subkriteria_child($kriteriaID,$orderK="nama_subkriteria")
    {
        $s=array(
        'id_kriteria'=>$kriteriaID,
        );
        $d=$this->subkriteria_data($s,$orderK);
        return $d;
    }

     function jumlah(){
        return $this->db->get('kriteria');
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
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_kriteria', $q);
	$this->db->or_like('nama_kriteria', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kriteria', $q);
	$this->db->or_like('nama_kriteria', $q);
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

}

/* End of file Kriteria_model.php */
/* Location: ./application/models/Kriteria_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-22 18:21:00 */
/* http://harviacode.com */