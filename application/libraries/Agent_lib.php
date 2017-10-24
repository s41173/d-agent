<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent_lib extends Main_model {

    public function __construct($deleted=NULL)
    {
        $this->deleted = $deleted;
        $this->tableName = 'agent';
    }

    private $ci;
    
    protected $field = array('id', 'code', 'name', 'type', 'address', 'phone1', 'phone2', 'fax', 'email', 'password',
                             'website', 'state', 'city', 'region', 'zip', 'notes', 'image', 'joined', 'acc_no', 'acc_name', 'acc_bank',
                             'status', 'created', 'updated', 'deleted');
       
    function get_name($id=null)
    {
        if ($id)
        {
            $this->db->select($this->field);
            $this->db->where('id', $id);
            $val = $this->db->get($this->tableName)->row();
            if ($val){ return ucfirst($val->name); }
        }
        else if($id == 0){ return 'Top'; }
        else { return ''; }
    }
    
    function get_type($id=null)
    {
        if ($id)
        {
            $this->db->select($this->field);
            $this->db->where('id', $id);
            $val = $this->db->get($this->tableName)->row();
            if ($val){ return $val->type; }else { return 0; }
        }
        else { return 0; }
    }
    
    function get_cust_type($type=null)
    {
        $this->db->select($this->field);
        $this->db->where('type', $type);
        $this->db->where('status', 1);
        $this->db->where('deleted', $this->deleted);
        $val = $this->db->get($this->tableName)->result();
        return $val;
    }
    
    function get_details($id)
    {
       $this->db->where('id', $id);
       return $this->db->get($this->tableName); 
    }
    
    function combo()
    {
        $this->db->select($this->field);
        $this->db->where('deleted', NULL);
        $this->db->order_by('name', 'asc');
        $val = $this->db->get($this->tableName)->result();
        $data = null;
        if ($val){
          foreach($val as $row){ $data['options'][$row->id] = ucfirst($row->name); }    
        }else{ $data['options'][''] = '--'; }
        return $data;
    }


}

/* End of file Property.php */