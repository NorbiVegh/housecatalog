<?php


@include "config.php";

if(isset($_POST["submit"])){
    
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $pass = md5($_POST["password"]);
    $cpass = md5($_POST["cpassword"]);
    $user_type = $_POST["user_type"];

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = "používateľ už existuje!";
    }else{
        if($pass != $cpass){
            $error[] = "Heslá sa nezhodujú!";
        }else{
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
    }
};



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Rodan Co. | Registrácia </title>
    <link rel="icon" type="image/x-icon" href="./img/about-2.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- kniznice-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
<div class="container-xxl bg-white p-0">

<!--navigacny panel -->

<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href=""
                class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 text-primary ">RODAN Co.</h1>
            </a>
        </div>

        <div class="col-lg-9">
            <div class="row gx-0 bg-white d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">

                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-envelope text-primary me-2"></i>
                        <p class="mb-0">rodanco@gmail.com</p>
                    </div>

                    <div class="h-100 d-inline-flex align-items-center py-2">
                        <i class="fa fa-phone-alt text-primary me-2"></i>
                        <p class="mb-0">09 88 666 777</p>
                    </div>

                </div>

                <!--socialne ikony-->

                <div class="col-lg-5 px-5 text-end">
                    <div class="d-inline-flex align-items-center py-2">
                        <a href="" class="me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="" class="me-3"><i class="fab fa-twitter"></i></a>
                        <a href="" class="me-3"><i class="fab fa-instagram"></i></a>

                    </div>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <a href="" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 text-primary text-uppercase">RODAN Co.</h1>
                </a>
                <!--tlacidlo pre zariadenia-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--menu veci-->

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="index.php" class="nav-item nav-link active">Naspäť na hlavnú stránku</a>
                    </div>
                    <!--tlacidlo-->
                    <a href="login.php" class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block">Prihlásiť sa<i class="fa fa-arrow-right ms-3"></i>
                    </a>
                </div>
            </nav>
        </div>
    </div>
</div>

<div class="form-container">
    <form action="" method="post">
        <h3>Registruj sa</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>
        <input type="text" name="name" required placeholder="Zadaj svoje meno">
        <input type="email" name="email" required placeholder="Zadaj svoj email">
        <input type="password" name="password" required placeholder="Zadaj svoje heslo">
        <input type="password" name="cpassword" required placeholder="Potvrd svoje heslo">
        <select name="user_type">
            <option value="user">Používateľ</option>
            <option value="admin">Admin</option>
        </select>
        <div class="g-recaptcha pt-2" style="transform: scale(0.77); 
                            -webkit-transform: scale(0.77); transform-origin: 0 0;
                            -webkit-transform-origin: 0 0;" data-theme="dark"
                            data-sitekey="6LffD6EkAAAAAEfmYfAK-W0dUYN53rhZXyvlj_c3"></div>
        <input type="submit" name="submit" value="Registrovať" class="form-btn">
        <p>Už máš u nás účet?<a href="login.php"> Prihlásiť sa</a></p>
    </form>
</div>
    




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="main.js"></script>


</body>