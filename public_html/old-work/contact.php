<!DOCTYPE html>
<html>
<title>Knollenberg</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4 {font-family: "Raleway", Arial, sans-serif}
h1 {letter-spacing: 6px}
.w3-row-padding img {margin-bottom: 12px}
.photo-head{
    height:100px;
}
input,textarea{width:100%;}
</style>
<body>

<!-- !PAGE CONTENT! -->
<div class="w3-content" style="max-width:1500px">

<!-- Header -->
<header class="w3-panel w3-center w3-opacity" style="padding:60px 16px">

  <h1>Knollenberg Foundation</h1>
   <h1 class="w3-xlarge">Presents Projects</h1>

  <div class="w3-padding-32">
    <div class="w3-bar w3-border">
      <a href="index.php" class="w3-bar-item w3-button">Home</a>
      <a href="projects.php" class="w3-bar-item w3-button  ">Projects</a>
      <a href="contact.php" class="w3-bar-item w3-button">Contact</a>

    </div>
  </div>
</header>

<div class="w3-row " style="padding:15px;">


        <div class="w3-quarter">&nbsp;</div>

        <div class="w3-half">
           <h3 class="w3-left">
          Contact Us
        </h3>


            <form action="" method="post" >
                <div class="w3-row ">

                             Name<br />
                            <input type="text" name="name" /> <br />

                </div>
                <div class="w3-row ">

                            Email<br />
                            <input type="text" name="email" /><br /><br />

                </div>
                <div class="w3-row ">

                            Message<br />
                            <textarea name="message" cols="50" rows="5"></textarea>

                </div>
                <div class="w3-row ">

                             <input type="submit"/>

                </div>
                <div class="w3-row">
                      <?php
                          if ($_POST['message']) {
                            $message = $_POST['message'];
                            $email = $_POST['email'];
                            $name = $_POST['name'];
                            $headers = "From: ".$name."<".$email.">";

                            mail('forteworks@gmail.com', "Contact from Knollenberg Foundation Visitor", $message, $headers);

                            echo "Thanks for contacting us!<br /><br />";
                          }
                        ?>
                </div>


            </form>
        </div>
        <div class="w3-quarter">&nbsp;</div>
</div>


<div class="w3-center">
<p>
Contact:</br>
Larry Raymond</br>
601 Breckenridge Lane</br>
Louisville, Kentucky  40207</br>
Ph:<a href="tel:5023657823">502.365.7823</a>
U. S.
    </p>
</div>
<!-- End Page Content -->
</div>
<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-large">
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">w3.css</a> and <a href="https://www.sprite-pilot.com/" target="_blank" class="w3-hover-text-green">Sprite-Pilot</a> </p>
</footer>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109067630-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109067630-1');
</script>

</body>
</html>
