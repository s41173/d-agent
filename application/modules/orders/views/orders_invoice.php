<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="<?php echo base_url().'images/'; ?>fav_icon.png" >
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title> <?php echo isset($title) ? $title : '' ; ?> </title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link type="text/css" media="all" href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" />
	  <!-- CUSTOM STYLE  -->
    <link type="text/css" media="all" href="<?php echo base_url(); ?>css/receipt/custom-style.css" rel="stylesheet" />
    <!-- GOOGLE FONTS -->
    <link type="text/css" media="all" href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
    
    <style type="text/css">
        .border{ border: 1px solid red;}
    </style>

  <script type="text/javascript">
    
    function closeWindow() {
    setTimeout(function() {
    window.close();
    }, 60000);
    }

    </script> 
    
</head>
<body onload="closeWindow();">
 <div class="container">
     
      <div class="row pad-top-botm">
          
         <div class="col-md-12 col-sm-12">
            <img src="<?php echo base_url(); ?>images/property/kop-surat.png" style="padding-bottom:0px; width:100%;" /> 
         </div>
          
     </div>
     <h2 style="text-align:center; margin:0; padding:0; font-weight:bold;"> Offer Order Receipt </h2> <br>
     <div  class="row text-center contact-info">
         <div class="col-md-12 col-sm-12">
             <hr />
             <span> <strong> Receipt Code : </strong>  <?php echo isset($code) ? $code : ''; ?> </span>
             <span> <strong> Date : </strong>  <?php echo isset($dates) ? $dates : ''; ?> </span>
             <span> <strong> Agent : </strong>  <?php echo isset($agent) ? $agent : ''; ?> </span>
             <span> <strong> Status : </strong>  <?php echo isset($status) ? $status : ''; ?> </span>
             <hr />
         </div>
     </div>
     
     <div class="row">
         
         <div class="col-lg-4 col-md-12 col-sm-12 col-lg-offset-1">
             <img class="img-responsive" src="<?php echo isset($image) ? $image : ''; ?>">
         </div>
         
         <div class="col-lg-7 col-md-12 col-sm-12">
             <br>
             <?php echo isset($content) ? $content : ''; ?>
         </div>
     </div>

 </div>

</body>
</html>
   