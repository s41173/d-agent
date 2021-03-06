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
        .border{ border: 1px solid #CCC;}
        .tables tr { line-height: 16px; }
    </style>

</head>
<body>
 <div class="container">
     
      <div class="row pad-top-botm">
         <div class="col-md-5 col-sm-6">
            <img width="200" src="<?php echo isset($p_logo) ? $p_logo : ''; ?>" style="padding-bottom:20px;" /> 
         </div>
          
          <div class="col-md-5 col-sm-6 col-md-offset-1"> 
          <table class="tables" style="font-size:13px;">
        <tr> <td> <strong> From </strong> </td> <td> : </td> <td> <?php echo isset($from) ? $from : ''; ?> </td> </tr>
        <tr> <td> <strong> Campaign To </strong> </td> <td> : </td> <td> <?php echo isset($to) ? $to : ''; ?> </td> </tr>
        <tr> <td> <strong> Type </strong> </td> <td> : </td> <td> <?php echo isset($type) ? $type : ''; ?> </td> </tr>
        <tr> <td> <strong> Subject </strong> </td> <td> : </td> <td> <?php echo isset($subject) ? $subject : ''; ?> </td> </tr>
        <tr> <td> <strong> Category </strong> </td> <td> : </td> <td> <?php echo isset($category) ? $category : ''; ?> </td> </tr>
        <tr> <td> <strong> Article </strong> </td> <td> : </td> <td> <?php echo isset($article) ? $article : ''; ?> </td> </tr>
        <tr> <td> <strong> Publish </strong> </td> <td> : </td> <td> <?php echo isset($dates) ? $dates : ''; ?> </td> </tr>
          </table>      
         </div>
     </div>
     <h2 style="text-align:center; margin:0; padding:0; font-weight:bold;"> Campaign Receipt </h2> <br>
     
     <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <?php echo isset($content) ? $content : ''; ?>
         </div>
     </div>

      <div class="row pad-top-botm">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             <a href="" onclick="window.print();" class="btn btn-primary btn-lg" >Print Receipt</a>
         </div>
      </div>
 </div>

</body>
</html>
   