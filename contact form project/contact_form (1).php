<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'php mailer/src/Exception.php';
require 'php mailer/src/PHPMailer.php';
require 'php mailer/src/SMTP.php';
if(isset($_POST["send"])){
  $mail = new PHPMailer(true);

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'subhadeep12102001@gmail.com'; //gmail
  $mail->Password = 'feidncgkqcbeirvm'; //gmail app password
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;

  $mail->setFrom('subhadeep12102001@gmail.com');

  $mail->addAddress($_POST["email"]);

  $mail->isHTML(true);



}
$error="";
if($_POST){
    if(!$_POST["email"]){
        $error.="<p>Email is required</p>";
    }
    if(!$_POST["Subject"]){
        $error.="<p>Subject is required</p>";
    }
    if(!$_POST["textarea"]){
        $error.="<p>Content is required</p>";
    }
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL == false )) {
        $error.="<p>Email is not valid</p>";
    }
    if($error!=""){
       echo $error; 
    }else{
       $emailto="2025it11subhadeep@buie.ac.in";
       $subject=$_POST["Subject"];
       $content= $_POST["textarea"];
       $headers = "From: ".$_POST["email"];
       if(mail($emailto,$subject,$content,$headers)){
           echo "Your mail is sent!";
       }else{
           echo "Try Again";
       }
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container">
  <h1>Get in Touch!</h1>
  <div id="error"></div>
  <form method="post">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Subject</label>
    <input type="text" class="form-control" id="Subject" name="Subject" placeholder="Subject">
  </div>
   <div class="form-group">
    <label for="textarea">Example textarea</label>
    <textarea class="form-control" id="textarea" name="textarea" rows="3"></textarea>
  </div>
 
    
  <button type="submit" class="btn btn-primary" id="submit">Submit</button>
</form>
  </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    $("form").submit(function(e){
        e.preventDefault();
        var error="";
        if(($("#email").val() == "")){
            error+= "<p>Please fill email field</p>";
        }
        if(($("#Subject").val() == "")){
            error+= "<p>Please fill subject field</p>";
        }
        if(($("#textarea").val() == "")){
            error+= "<p>Please fill content field</p>";
        }
        if(error!=""){
            $("#error").html(error);
        }
        else{
            $("form").unbind("submit").submit();
        }
    });
    </script>
  </body>

</html>