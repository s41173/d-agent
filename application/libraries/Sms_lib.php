<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms_lib extends Main_model {

    public function __construct($deleted=NULL)
    {
        $this->deleted = $deleted;
        $this->error = new Error_lib();
    }
       
    private $error;
    function send($telepon=0,$text=""){
        
        $userkey = "osh2b5"; //userkey lihat di zenziva
        $passkey = "12011989"; // set passkey di zenziva
        $message = $text;
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://reguler.zenziva.net/apps/smsapi.php",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "userkey=".$userkey."&passkey=".$passkey."&nohp=".$telepon."&pesan=".urlencode($message)
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        if ($err){ $this->error->create(0, $err); }
        else 
        { 
           $com = new Components();
           $com = $com->get_id('sms'); 
           $XMLdata = new SimpleXMLElement($response);
           $status = (string)$XMLdata->message[0]->text;
           if (strtolower($status) == "success"){ return TRUE; }else{ $this->error->create($com, $status); return FALSE; }
        }
        
    }

}

/* End of file Property.php */