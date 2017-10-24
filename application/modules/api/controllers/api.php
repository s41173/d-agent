<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends MX_Controller {


   public function __construct()
   {
        parent::__construct();


        $this->load->helper('date');
        $this->log = new Log_lib();
        $this->load->library('email');
        $this->login = new Login_lib();
        $this->com = new Components();
        $this->com = $this->com->get_id('login');

        $this->properti = $this->property->get();
        
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token'); 

        // Your own constructor code
   }

   private $date,$time,$log,$login;
   private $properti,$com;

   function index()
   {
       redirect('login');
   }
   
   public function category(){
        
        $datas = (array)json_decode(file_get_contents('php://input'));
        $parent = $datas['id'];
        
        $lib = new Categoryproduct_lib();
        $result = $lib->get_based_parent($parent);
        
        if ($result){
	foreach($result as $res)
	{
	   $output[] = array ("id" => $res->id, "name" => $res->name, "image" => base_url().'images/category/'.$res->image);
	}
        $response['content'] = $output;
            $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response,128))
            ->_display();
            exit; 
        }
    }
    
    public function series(){
        
        $datas = (array)json_decode(file_get_contents('php://input'));
        $category = $datas['category'];
        
        $lib = new Product_lib();
        $model = new Model_lib();
        $result = $lib->get_series_based_cat($category);
        
        foreach ($result as $value) { $output[] = array ("id" => $value->model, "name" => $model->get_name($value->model)); }
        $response['content'] = $output;
            $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response,128))
            ->_display();
            exit; 
    }
    
    public function product(){
        
        $datas = (array)json_decode(file_get_contents('php://input'));
        $cat   = $datas['category'];
        $model = $datas['model'];
        
        $lib = new Product_lib();
        $result = $lib->get_poduct_based_cat_model($cat,$model);
        
        foreach($result as $res){
            $output[] = array ("id" => $res->id, "sku" => $res->sku, "name" => $res->name, "image" => base_url().'images/product/'.$res->image);
        }
        $response['content'] = $output;
            $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response,128))
            ->_display();
            exit; 
    }
    
     public function product_detail(){
        
        $datas = (array)json_decode(file_get_contents('php://input'));
        $pid   = $datas['pid'];
        
        $lib = new Product_lib();
        $cat = new Categoryproduct_lib();
        $model = new Model_lib();
        
        $res = $lib->get_detail_based_id($pid);
        $output[] = array ("id" => $res->id, "sku" => $res->sku, "name" => $res->name,
                           "category" => $cat->get_name($res->category), "model" => $model->get_name($res->model),
                           "image" => base_url().'images/product/'.$res->image);
         
        $response['content'] = $output;
            $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response,128))
            ->_display();
            exit; 
    }
    
    public function calculator(){
       
        $datas = (array)json_decode(file_get_contents('php://input'));
        
        $pid = $datas['pid'];
        $width = $datas['width'];
        $height = $datas['height'];
        $heightkm = $datas['heightkmtop'];
        $heightkm1 = $datas['heightkmbot'];
        $color = $datas['color'];
        $type = $datas['type'];
        $kusen = $datas['kusen'];
        $glass = $datas['glass'];
        
        $material = new Material_lib();
        $formula = new Formula_lib();
        $assembly = new Assembly_lib();
        $materiallist = new Material_list_lib();
        $model = new Model_lib();
        $product = new Product_lib();
        
        $matlist = $assembly->get_details($pid)->result();
        $total = 0;
        $i=1;
        $datax = "";
        
        foreach ($matlist as $res){
            
            $nama = $materiallist->get_name($res->material);
            $harga = $material->get_price($pid, $res->material, $color, $type, $glass);
            $size = $formula->calculate($model->get_name($product->get_model($pid)),$nama, $width, $height, $pid, $heightkm, $heightkm1, $kusen);
            $brutto = round(floatval($size*$harga));
            
            $total = $total+$brutto;
            $output[] = array ("no" => $i, "name" => $nama, "size" => $size, "amount" => idr_format($brutto));
            $i++;
        }
        
         $response['content'] = $output;
         $response['total'] = idr_format(round(floatval(1.1*$total)));
            $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response,128))
            ->_display();
            exit;  
    }
    
    function get_color($pid=null){
        
        $lib = new Product_lib();
        $colorlib = new Color_lib();
        $res = $lib->get_detail_based_id($pid);
        $color = explode(',', $res->color);
        $data=null;
        
        for($i=0; $i<count($color); $i++){ $data['options'][$color[$i]] = strtoupper($colorlib->get_name($color[$i]));}
        $js = "class='form-control' id='ccolor' tabindex='-1' style='width:100%;' "; 
        echo form_dropdown('ccolor', $data, isset($default['color']) ? $default['color'] : '', $js);
    }
    
    function get_glass($type=null){
        
        $material = new Material_lib();
        $result = $material->combo_glass($type);
        $js = "class='form-control' id='cglass' tabindex='-1' style='width:100%;' "; 
        echo form_dropdown('cglass', $result, isset($default['glass']) ? $default['glass'] : '', $js);
    }
    
    function contact(){
        
       $datax = (array)json_decode(file_get_contents('php://input')); 
       
       $this->load->library('email');
       $this->email->from($datax['email'], $datax['name']);
       $this->email->to($this->properti['email']);  
       $this->email->subject('Contact Message : '.$datax['name']);
       $this->email->message($datax['message']);	

       if ($this->email->send()){ $stts = 'true'; }else{ $stts = (string)$this->email->print_debugger(); }

       $response = array('status' => $stts);
       $this->output
        ->set_status_header(201)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, 128))
        ->_display();
        exit;
   }
    


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */