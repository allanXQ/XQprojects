<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>contact form - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    body{background-image:url('/bidding template/assets/images/end.svg');}
    form{padding:5px;}
.get-in-touch {
  background-color: white;
  max-width: 800px;
  margin: 50px auto;
  position: relative;

}
.get-in-touch .title {
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 3px;
  font-size: 3.2em;
  line-height: 48px;
  padding-bottom: 48px;
     color: #5543ca;
    background: #5543ca;
    background: -moz-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
    background: -webkit-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
    background: linear-gradient(to right,#f4524d  0%,#5543ca  100%) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
}

.contact-form .form-field {
  position: relative;
  margin: 32px 0;
}
.contact-form .input-text {
  display: block;
  width: 100%;
  height: 36px;
  border-width: 0 0 2px 0;
  border-color: #5543ca;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
}
.contact-form .input-text:focus {
  outline: none;
}
.contact-form .input-text:focus + .label,
.contact-form .input-text.not-empty + .label {
  -webkit-transform: translateY(-24px);
          transform: translateY(-24px);
}
.contact-form .label {
  position: absolute;
  left: 20px;
  bottom: 11px;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
  color: #5543ca;
  cursor: text;
  transition: -webkit-transform .2s ease-in-out;
  transition: transform .2s ease-in-out;
  transition: transform .2s ease-in-out,
  -webkit-transform .2s ease-in-out;
}
.contact-form .submit-btn {
  display: inline-block;
  background-color: #000;
   background-image: linear-gradient(125deg,#a72879,#064497);
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-size: 16px;
  padding: 8px 16px;
  border: none;
  width:200px;
  cursor: pointer;
}

    </style>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />');
            else $('head > link').filter(':first').replaceWith(defaultCSS);
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height());
          window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
    </script>
</head>
<body>
    <section class="get-in-touch">
   <h1 class="title">Login</h1>
   <form class="contact-form row" action='login.php' method="post">
      <div class="form-field col-lg-6">
         <input id="name" class="input-text js-input" type="text" name='username' required>
         <label class="label" for="username">Username</label>
      </div>
       <div class="form-field col-lg-6 ">
         <input id="password" class="input-text js-input" type="text" name='password' required>
         <label class="label" for="password">Password</label>
      </div>
      <div class="form-field col-lg-12">
         <input class="submit-btn" type="submit" value="Submit" name='submit'>
      </div>

      <div class="form-field col-lg-12">
         <input class="submit-btn" type="submit" value="Submit" name='submit'>
         <a href="/freelance/ecommerce/php/admin/register.php" style="margin-left:10%">Login</a>
      </div>
   </form>
</section>
	<script type="text/javascript">
		</script>


           <?php
           session_start();
           ini_set('display_errors', 1);
           ini_set('display_startup_errors', 1);
           error_reporting(E_ALL);
           
           if(isset($_POST['submit'])){
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }

            $username=test_input($_POST['username']);
            $passwd=test_input($_POST['password']);
            $password=$passwd;

            $filepath = '../database/admin.xml';
            $xml = file_get_contents($filepath);
            
            # search if username or email or phone already exists
            if (strpos($xml, "<username>$username</username>") and
            strpos($xml, "<password>$password</password>") == true) {
              // Start the session
              session_start();
              $_SESSION["adminusername"] = $username;
              header('location:/freelance/ecommerce/php/admin/users.php');
            }
            else{
             echo 'invalid user';
            die();
            }
            }


           ?>
  </body>
</html>
