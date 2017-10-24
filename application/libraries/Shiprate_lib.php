<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shiprate_lib extends Custom_Model {
    
    public function __construct($deleted=NULL)
    {
        $this->deleted = $deleted;
        $this->tableName = 'shiprate';
    }

    protected $field = array('id', 'courier', 'dest_id', 'type', 'rate', 'created', 'updated', 'deleted');

    function combo_courier()
    {
//        $this->db->select('nama');
        $val = $this->db->get($this->tableName)->result();
        if (!$val){ $data['options'][''] = '--'; }else{
           foreach($val as $row){$data['options'][$row->courier] = $row->courier;}    
        }
        return $data;
    }

}

/* End of file Property.php */