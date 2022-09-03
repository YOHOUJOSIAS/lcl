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

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">

    <title>Banque et Assurances</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">
    
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="container-fluid">
                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-12 bg-cover" style="background-image: url(img/c2.jpg); min-height:300px;">
                                <div>

                                </div>
                            </div>
                            <div class="col-lg-8">
                                <form class="p-lg-5 col-12 row g-3" method="POST" action="login.php">
                                    <div>
                                        <h1>Connectez-vous</h1>

                                    </div>
                                    <div>
                                        <label for="userName" class="form-label">Identifiant</label>
                                        <input type="text" name="contnumber" class="form-control" required="Identifiant obligatoire" id="userName" aria-describedby="emailHelp">
                                    </div>
                                    <div>
                                        <label for="userName" class="form-label">Code d'accès</label>
                                        <input type="password" name="pass" required="Mot de pass obligatoire obligatoire" class="form-control" id="userName" aria-describedby="emailHelp">
                                    </div>
                                    <div>
                                        <a href="" class="txt1" style="text-decoration: none;">
                                            forget password?
                                        </a>
                                    </div>


                                    <div class="col-12">
                                        <button type="submit" name="submit" class="btn btn-brand">Se Connecter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    


    <!-- TOP NAV -->
    <div class="top-nav" id="home">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <p> <i class='bx bxs-envelope'></i>relationclientele@LCL.fr </p>
                    <p> <i class='bx bxs-phone-call'></i> 09 69 36 30 30</p>
                </div>
                <div class="col-auto social-icons">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-pinterest'></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- BOTTOM NAV -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <img src="img/unnamed.png" , style="height: 100px; width: fit-content;  margin-right: 10px;">
            <a class="navbar-brand" href="#" style="font-size: 16px;">Ma vie ,Ma ville, Ma banque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Comptes et Carte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Epargner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Emprunter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">S'Assurer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Similateur et Devis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reviews">Ma Vie</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#blog">Decouvrier LCL</a>
                    </li> -->
                </ul>
                <?php
               
                if(isset($_SESSION["user"]) && $_SESSION["user"]){
                      
                    
                    ?>
                
                <P>ID:<?= $_SESSION['user']->idcompte ?></P><br>
                <P>User:<?= $_SESSION['user']->codeuser ?></P>
                <?php }else{  ?>
                    
                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-brand ms-lg-3">Mon espace</a>
             
               <?php  } ?>
            </div>
            </div>
    </nav>/

    <!-- SLIDER -->
    <div class="owl-carousel owl-theme hero-slider">
        <div class="slide slide1">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <h6 class="text-white text-uppercase">BIENVENUE SUR MA BANQUE LCL</h6>
                        <h1 class="display-3 my-4">Des solutions adaptées pour tous besoins
                            <br /> ouverture de compte en ligne</h1>
                        <a href="#" class="btn btn-brand">Je decouvre</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="slide slide2">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1 text-white" style="text-align: center;">
                        <h6 class="text-white text-uppercase ">FLEX, le crédit instantané</h6>
                        <h1 class="display-3 my-4 ">Financez vos achats en 3 clics !<br />depuis votre smartphone </h1>
                        <a href="# " class="btn btn-brand ">Decouvrir</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ABOUT -->


    <!-- MILESTONE -->


    <section id="services " class="text-center ">
        <div class="container ">
            <div class="row ">
                <div class="col-12 ">
                    <div class="intro ">

                        <h1>Parlons de vos Besoins</h1>
                    </div>
                </div>
            </div>
            <div class="row g-4 " style="background-color:rgb(5, 5, 131) ;">
                <div class="col-lg-4 col-md-6">
                    <div class="service ">
                        <img src="img/accounts.png " alt=" ">
                        <h5>Ouvrir un Compte en Ligne</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <div class="service ">
                        <img src="img/salary.png " alt=" ">
                        <h5>Simuler un pret Immobilier</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <div class="service ">
                        <img src="img/loger.png" alt=" ">
                        <h5>Tous nos simulateurs et Dévis</h5>
                    </div>
                </div>

            </div>
        </div>
        </div>
        
    </section>




    <footer>
        <div class="footer-top text-center ">
            <div class="container ">
                <div class="row justify-content-center ">
                    <div class="col-lg-6 text-center ">
                        <h4 class="navbar-brand ">LCL Banque et Assurances</h4>
                        <p>Pour la bonne exécution de vos contrats, et en cas de réclamations/contestations, votre Conseiller est joignable sur sa ligne directe (appel non surtaxé). un message par votre messagerie sécurisée, il vous le donnera à nouveau
                            en retour.</p>
                        <div class="col-auto social-icons ">
                            <a href="# "><i class='bx bxl-facebook'></i></a>
                            <a href="# "><i class='bx bxl-twitter'></i></a>
                            <a href="# "><i class='bx bxl-instagram'></i></a>
                            <a href="# "><i class='bx bxl-pinterest'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center ">
            <p class="mb-0 ">Copyright@2022. All rights Reserved</p>
        </div>
    </footer>


    <!-- Modal -->
    <!-- Modal -->
 
    <script src="js/jquery.min.js "></script>
    <script src="js/bootstrap.bundle.min.js "></script>
    <script src="js/owl.carousel.min.js "></script>
    <script src="js/app.js "></script>
</body>

</html>