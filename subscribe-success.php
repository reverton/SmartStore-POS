<!DOCTYPE html>
<html lang="en">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>SmartStore - Point of Sale | POS</title>
    <!-- metatags-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="SmartStore Point of Sale System, Powered by Reverton.Net Limited">
    <!--/metatags-->
    <link href="homepagefiles/bootstrap.css" rel="stylesheet">
    <!--bootstrap-css-->
    <link href="homepagefiles/style.css" rel="stylesheet">
    <!--style-css-->
    <link rel="stylesheet" href="homepagefiles/lightbox.min.css">
    <!--lightbox-->
    <link href="homepagefiles/popuo-box.css" rel="stylesheet" type="text/css" media="all">
    <link href="homepagefiles/font-awesome.min.css" rel="stylesheet">
    <!--fontawesome-css-->
    <link rel="shortcut icon" href="homepagefiles/icon.png">
  </head>
  <body>
    <section class="agile-navigation">
      <div class="container">
        
        <div class="agile-text">
              <div style="max-width:600px; margin: auto; color: white;">
              <button type="button" class="btn btn-primary" onclick="window.location.href='index.html'"> Home </button> 
                <button type="button" class="btn btn-primary" onclick="window.location.href=''"> Login </button>
<button type="button" class="btn btn-primary" onclick="window.location.href='demo.html'"> Demo </button>
              </div>
            
              <div style="max-width:700px; margin: auto; color: white; background: rgba(8, 8, 8, 0.67); padding:20px;">
                  <h1> <strong>Account Creation Successful</strong></h1><br/>
             
                  <h3> Dear <?php echo $_GET['n']; ?>, thanks for choosing Smartstore.</h3><br/>
                  <?php
                   if($_GET['am'] == 0.00){
                       echo '<h3> Your set up will be configured and detail sent to you shortly. <br/><br/>Thanks </h3>';   
                   } else {
                       echo '<h3> You can proceed to make payment of N'.$_GET["am"].' Your login details will be made available to you as soon as your payment is acknowledged </h3><br/>
                  <h3> There are two ways to pay; Through Bank Deposit/Transfer and Online Payment </h3><br/>
                  <h3> For Bank Payment, make your payment to: <br/>
                      Ecobank, 4032007746, Reverton.Net Limited <br/>
                      send your teller Details to info@reverton.net after payment
                  </h3><br/>
                  <form ><label>For Online Payment, Click the pay button</label>
    <script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" onclick="payWithPaystack()" style=" background-color: green;"> Pay </button> 
</form>';   
                    }   
                  ?>
                  
        
            </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </section>
    <!--footer-->
   <section class="agile-footer">
      <footer> ©
        <script>document.write(new Date().getFullYear())</script>SmartStore<br>
  <span style="float:left"><i style="color:#FFF;">Powered by</i>
      <a href="http://www.reverton.net" target="_blank" title="Reverton.Net Limited"><strong>Reverton.Net Ltd</strong></a>
  </span>
<strong> 
<span style="float:right"><img src="homepagefiles/rightIcon.jpg" class="img-responsive" style="max-height:30px; max-width:100px;" alt="Reverton.Net Logo"></span>
</strong> 
<br/><br/>
      </footer>
    </section>
  <!--/footer--> 
  </body>
</html>

 
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_bb7aa940a861ccba63011edacc97e3a22e872727',
      email: '<?php echo $_GET['em']; ?>',
      amount: <?php echo $_GET['am'].'00'; ?>,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                  display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "<?php echo $_GET['pn']; ?>"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
          window.location.href='payment-success.php?n=<?php echo $_GET['n']; ?>';
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>