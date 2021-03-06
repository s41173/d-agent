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

</head>
<body>
 <div class="container">
     
      <div class="row pad-top-botm ">
         <div class="col-lg-4 col-md-4 col-sm-6 ">
    <img class="img-responsive" src="<?php echo isset($p_logo) ? $p_logo : ''; ?>" style="padding-bottom:20px;" /> 
         </div>
          <div class="col-lg-8 col-md-8 col-sm-6">
           <strong> <?php echo isset($p_name) ? $p_name : ''; ?> </strong> <br />
           <?php echo isset($p_address) ? $p_address : ''; ?>
           <br /> <?php echo isset($p_zip) ? $p_zip : ''; ?> , <?php echo isset($p_city) ? $p_city : ''; ?>,
           <br /> Indonesia.    
         </div>
     </div>
     <div  class="row text-center contact-info">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             <span> <strong> Invoice No : </strong>  <?php echo isset($so) ? $so : ''; ?> </span>
             <span> <strong>Email : </strong>  <?php echo isset($p_email) ? $p_email : ''; ?> </span>
             <span> <strong>Call : </strong>  <?php echo isset($p_phone) ? $p_phone : ''; ?> </span>
             <hr />
         </div>
     </div>
     <div  class="row pad-top-botm client-info">
         <div class="col-lg-6 col-md-6 col-sm-6">
         <h4>  <strong> Customer : </strong></h4>
           <strong> <?php echo isset($c_name) ? $c_name : ''; ?> </strong> <br />
           <b>Address :</b> <?php echo isset($c_address) ? $c_address : ''; ?> , <?php echo isset($c_zip) ? $c_zip : ''; ?>, 
           <br />
           <?php echo isset($c_city) ? $c_city : ''; ?> - Indonesia. <br />
           <b>Call :</b> <?php echo isset($c_phone) ? $c_phone : ''; ?> <br />
           <b>E-mail :</b> <?php echo isset($c_email) ? $c_email : ''; ?>
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
               <h4>  <strong>Payment Details </strong></h4>
                Currency : IDR <br>
                <b>Bill Amount :  Rp <?php echo isset($tot_amt) ? $tot_amt : '0'; ?>,- </b> <br />
                   Bill Date :  <?php echo isset($due_date) ? $due_date : ''; ?> <br />
                <b>Payment Type : <?php echo isset($payment) ? $payment : ''; ?> </b> <br />
                <b>Payment Status : <?php echo isset($paid) ? $paid : ''; ?> </b> <br />
                Purchase Date :  <?php echo isset($dates) ? $dates : ''; ?>
         </div>
     </div>
     <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="table-responsive">
         <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th> No.</th>
                            <th> Product </th>
                            <th> Qty </th>
                            <th> Unit Price </th>
                            <th> Tax </th>
                             <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                                
            <?php
                
                function product($pid)
                {
                    $val = new Product_lib();
                    return ucfirst($val->get_name($pid));
                }      
                                
                if ($items)
                {
                    $i=1;
                    foreach($items as $res)
                    {
                        echo"
                        <tr>
                            <td>".$i."</td>
                            <td> ".product($res->product_id)." </td>
                            <td>".$res->qty."</td>
                            <td align=\"right\">".idr_format(intval($res->qty*$res->price))."</td>
                            <td align=\"right\">".idr_format($res->tax)."</td>
                            <td align=\"right\">".idr_format($res->amount)."</td>
                        </tr>
                        "; $i++;
                    }
                }
            ?>              
                            <tr>
                                <td colspan="4"> </td>
                                <td align='right'> <b> Total : </b>  </td>
                                <td align="right"> <?php echo isset($amount) ? $amount : '0'; ?> </td>
                            </tr>  
                            <tr>
                                <td colspan="4"> </td>
                                <td align='right'> <b> Shipping : </b>  </td>
                                <td align="right"> <?php echo isset($shipping) ? $shipping : '0'; ?> </td>
                            </tr>  
                            <tr>
                                <td colspan="4"> </td>
                                <td align='right'> <b> Bill Amount : </b>  </td>
                                <td align="right"> <b> <?php echo isset($tot_amt) ? $tot_amt : '0'; ?> </b> </td>
                            </tr>  
                                
                            </tbody>
                        </table>
               </div>
             <hr />
         </div>
     </div>
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <strong> Important: </strong>
             <ol>
                  <li>
                    This is an electronic generated invoice so doesn't require any signature.
                 </li>
                 <li>
            Please read all terms and polices on <b> <?php echo $p_name; ?> </b> for returns, replacement and other issues.
                 </li>
             </ol>
             </div>
         </div>
     
      <div class="row pad-top-botm">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             <a href="" onclick="window.print();" class="btn btn-primary btn-lg" >Print Invoice</a>
         </div>
      </div>
 </div>

</body>
</html>
   