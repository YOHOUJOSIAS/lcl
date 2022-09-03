<?php

    try{
        $db = new PDO('mysql:host=localhost;dbname=lcl_banques;charset=utf8','root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }catch(PDOException $e){
                    echo 'message '.$e->getMessage().'<br>';
                    echo 'erreur '.$e->getError().'<br>';
        }

    if(isset($_POST['submit'])){ 
        $contnumber = $_POST['contnumber'];
        $pass = $_POST['pass'];
        //var_dump($contnumber,$pass);

        $getUsers = $db->prepare('SELECT * FROM `user` WHERE contnumber =? AND password=?');
        $getUsers->execute([$contnumber,$pass]);
        $data = $getUsers->fetch(PDO::FETCH_OBJ);
        //var_dump($data);
        $_SESSION["user"] = $data;

    }
    ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body style="margin:0%; padding:0%">
      <div class="container-build">
          <div class="row">
              <div class="col-lg-2">
                  <h3>BICICI</h3>
                  <h6>Groupe BNP PARIBAS</h6>
                  

                  <div style="height: 460px; background-color:black; width:170px; margin-top:45px" class="col-xs col-md col-lg">
                  <h6 style="color: white;">RMATION</h4>
                  <div style="background-color: green; width:170px; height:30px;padding-top:5px">
                  <h6 style="color: white;">elles Konto</h4>
                  </div>

                  <div style="background-color: green; width:170px; height:30px;padding-top:5px ;margin-top:20px ">
                  <h6 style="color: white;">Konto</h4>
                  </div>

                  <div style="background-color: green; width:170px; height:30px;padding-top:5px ;margin-top:20px ">
                  <h6 style="color: white;">Karten</h4>
                  </div>

                  <div style="background-color: green; width:170px; height:30px;padding-top:5px ;margin-top:20px ">
                  <h6 style="color: white;">Kredit</h4>
                  </div><br>

                  <h6 style="color: white; font-size:14px">RAGUNGSMANGEMENT</h4><br>

                  <div style="background-color: green; width:170px; height:30px;padding-top:5px">
                  <h6 style="color: white;">Uberweisungen</h4>
                  </div>

                  <div style="background-color: green; width:170px; height:30px;padding-top:5px ;margin-top:20px ">
                  <h6 style="color: white;">anger hinzufugen</h4>
                  </div>

                  <div style="background-color: green; width:170px; height:30px;padding-top:5px ;margin-top:20px ">
                  <h6 style="color: white;">destinataires</h4>
                  </div>

                  <div style="background-color: green; width:170px; height:30px;padding-top:5px ;margin-top:20px ">
                  <h6 style="color: white;">en einen Transfer</h4>
                  </div>
                  


                  </div>
              </div>
<div class="col-lg-10">
    <div class="row">
         <div class="col-lg-3">
             <img src="img/Carte-Visa-Classic.png" style="height: 100px;" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" height="50px" alt="">
         </div>
         <div class="col-lg-3">
         <img src="img/illu.png" style="height: 100px;" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" height="50px" alt="">

         </div>
         <div style="background-color:lightgray; padding-bottom:14px; height:100px; width: 290px; text-align:center" class="col-lg-6">
             <h6 style="font-size:15px ; color:black">Willkommen in Ihrem KundenBereich</h6>
             <p style="color:black; font-weight:bold"><?=$_SESSION['user']-> username?></p> 
             <p style="color:blue; font-weight:bold"><?=$_SESSION['user']-> pays?></p> 
             
         </div>
    </div><br>
    <div class="container-build" style="margin-right:80px;">
    <div  class="row" style="background-color:green; color:white; height:25px;">
    <div class="col-lg">
        <p>Zuhause</p>
    </div>
    <div class="col-lg">
        <p>Gruppe</p>
    </div>
    <div class="col-lg">
        <p>Investition</p>
    </div>
    <div class="col-lg">
        <p>Sozialabgabe</p>
    </div>
    <div class="col-lg">
        <p>Sicherheitscenter</p>
    </div>
    <div class="col-lg">
        <p>Karriere</p>
    </div>
    <div class="col-lg">
        <p>Betrugsbericht</p>
    </div>
    <div class="col-lg">
        <p>Kontaktiere un</p>
    </div>
  
</div>

 <div class="row"  style="padding-top: 5px;">
     <h6>Aktuelles Kontos</h6>
     <h6 style="color: blue;"><?=$_SESSION['user']-> username?> - <a href="" style="color:blue; font-weight:bold"><?=$_SESSION['user']-> contnumber?></a></h6>
     <h6>Angaben zum Bankkontoinhaber</h6>

<div style="background-color: lightgray; height:205px; width:600px; font-size:small" class="col-lg-6">
  <div class="row">
      
      
      <div class="col-lg-6 col-sm">
          <small style="font-weight: bold;color:black">Bankkontoinhaber :</small>
      </div>
      <div class="col-lg-6 col-sm">
          <small style="font-weight: bold;color:black"><?=$_SESSION['user']-> username?></small>
      </div>
      <!-- deuxieme part -->

      <div class="col-lg-6">
          <small style="font-weight: bold;color:black">Kontounummer :</small>
      </div>
      <div class="col-lg-6">
          <small style="font-weight: bold;color:black"><a href="" style="color: blue;"><?=$_SESSION['user']-> contnumber?></a></small>
      </div>

       <!-- deuxieme part -->
       <div class="col-lg-6">
          <small style="font-weight: bold;color:black">IBAN :</small>
      </div>
      <div class="col-lg-6">
          <small style="font-weight: bold;color:black">FR08  <small style="font-weight: bold;color:black; font-size:12px"><?=$_SESSION['user']-> numbank?></small> <a href="" style="color: blue;"><?=$_SESSION['user']-> contnumber?></a> &ensp;<b><?=$_SESSION['user']-> rib?></b></small>
      </div>
       <!-- deuxieme part -->

       <div class="col-lg-6">
          <small style="font-weight: bold;color:black">Bankleitzahhl:</small>
      </div>
      <div class="col-lg-6">
          <small style="font-weight: bold;color:black"><?=$_SESSION['user']-> numbank?></small>
      </div>
      <!-- deuxieme part -->
      <div class="col-lg-6">
          <small style="font-weight: bold;color:black">Agenturecode :</small>
      </div>
      <div class="col-lg-6">
          <small style="font-weight: bold;color:black"><?=$_SESSION['user']-> numagan?></small>
      </div>

 <!-- deuxieme part -->

      <div class="col-lg-6">
          <small style="font-weight: bold;color:black">SWIFT-Code :</small>
      </div>
      <div class="col-lg-6">
          <small style="font-weight: bold;color:black"><?=$_SESSION['user']-> codeuser?></small>
      </div>
 <!-- deuxieme part -->
 <div class="col-lg-6">
          <small style="font-weight: bold;color:black">RIB-Schussel :</small>
      </div>
      <div class="col-lg-6">
          <small style="font-weight: bold;color:black"><?=$_SESSION['user']-> rib?></small>
      </div>

      <!-- deuxieme part -->
      <div class="col-lg-6">
          <small style="font-weight: bold;color:black">Domizilierung von Fonds :</small>
      </div>
      <div class="col-lg-6">
          <small style="font-weight: bold;color:black"><?=$_SESSION['user']-> homefond?></small>
      </div>
 <!-- deuxieme part -->
      <div class="col-lg-6">
          <small style="font-weight: bold;color:black">Kontostatus :</small>
      </div>
      <div class="col-lg-6">
          <small style="font-weight: bold;color:red"><?=$_SESSION['user']-> statucompte?></small>
      </div>
 
 
  </div>
  

</div>

<b style="color: black; font-size:smaller">Die Erklarung Ihrer fianZiellen Situation</b>
<div style="background-color: lightgray; height:95px; font-size:15px; font-size:small">
  <div class="row">
  <div class="col-lg-6">
      <p style="color: black; font-weight:bold">AKTUELLES KONTOS</p>
  </div>
  <div class="col-lg-6" style="text-align:end ; padding-right:158px">
      <p style="color: black; font-weight:bold">GELDBETRAG</p>
  </div>

  
  <div class="col-lg-3">
      <p style="color: blue; font-weight:bold"><?=$_SESSION['user']-> username?></p>
  </div>
  <div class="col-lg-3" style="text-align:end ; padding-right:295px">
      <p style="color: blue; font-weight:bold"><b style="color:blue">-</b><?=$_SESSION['user']-> contnumber?></p>
  </div>
  <div class="col-lg-3" style="text-align:end ;">
      <p style="color: green; font-weight:bold"><?=$_SESSION['user']-> montant1?>€</p>
  </div>


  <div class="col-md-3 col-xs-3">
      <p style="color: blue; font-weight:bold"></p>
  </div>
  <div  class="col-md-3 col-xs-3" style="text-align:end ;">
      <p style="color: black; font-weight:bold">BI</p>
  </div>
  <div class="col-md-3 col-xs-3" style="text-align:end ;">
      <p style="color: black; font-weight:bold"><?=$_SESSION['user']-> montant1?>€</p>
  </div>
  </div>


  <div class="container-build">
    <div  class="row" style="background-color:green; color:white; height:25px;">
    <p style="text-align: end;">Die Weltbank</p>
    </div>
  </div>


<div class="row">
    <div class="col-lg-6  ">
        <p>Sitemap &ensp;&ensp; Nous contacter &ensp;&ensp; Land </p>
    </div>

    <div class="col-lg-6">
        <p style="text-align:end ;">Terms & Bedingungen / Privacy Policy</p>
    </div>
</div>


  
</div>






 </div>
 
    </div>
    
  


</div>

              
          </div>
         
      </div>

    <script src="js/jquery.min.js "></script>
    <script src="js/bootstrap.bundle.min.js "></script>
    <script src="js/owl.carousel.min.js "></script>
    <script src="js/app.js "></script>
</body>
</html>
 

