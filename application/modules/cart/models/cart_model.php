<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends Custom_Model
{
    protected $logs;
    
    function __construct()
    {
        parent::__construct();
        $this->logs = new Log_lib();
        $this->com = new Components();
        $this->com = $this->com->get_id('cart');
        $this->tableName = 'cart';
    }
    
    protected $field = array('id', 'agent_id', 'product_id', 'qty', 'tax', 'amount', 'price', 'attribute', 'description' , 'created');
    protected $com;
    
    function get_by_agent($agent=null)
    {
        $this->db->select($this->field);
        $this->cek_null($agent, 'agent_id');
        $this->db->order_by('created', 'desc'); 
        $this->db->from($this->tableName); 
        return $this->db->get(); 
    }
    
    function delete_by_agent($agent=null){
        
        $this->db->where('agent_id', $agent);
        $this->db->delete($this->tableName);
    }
    
    function updateid($uid, $users)
    {
        $this->db->where('id', $uid);
        $this->db->update($this->tableName, $users);
        
        $val = array('created' => date('Y-m-d H:i:s'));
        $this->db->where('id', $uid);
        $this->db->update($this->tableName, $val);
    }

}

?>