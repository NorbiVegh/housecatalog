<?php

include "db_connection.php";



function fetchHomeOffers()
{
    global $conn;
    $sql = "SELECT * FROM home_offers";
    $result = mysqli_query($conn, $sql);
    $homeOffers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $homeOffers;
}

$homeOffers = fetchHomeOffers();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rodan Co. | Katalóg domov </title>
    <link rel="icon" type="image/x-icon" href="./img/about-2.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
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

<body data-bs-spy="scroll" data-bs-target=".navbar">
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
                                <a href="" class="nav-item nav-link active">Domov</a>
                                <a href="#onas" class="nav-item nav-link">O nás</a>
                                <a href="#ponuka" class="nav-item nav-link">Ponuka</a>
                                <a href="#sluzby" class="nav-item nav-link">Služby</a>
                                <a href="#kontakt" class="nav-item nav-link">Kontakt</a>
                            </div>
                            <!--tlacidlo-->
                            <a href="login.php" class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block">Prihlásiť sa<i class="fa fa-arrow-right ms-3"></i>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>




        <!--hlavicka -->
        <div class="container-fluid p-0 mb-5">
            <div class="carousel slide" id="header-carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="./img/carousel-1.jpg" alt="" class="w-100">

                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h5 class="section-title text-white text-uppercase mb-3 animated slideInDown">Katalóg
                                    domov</h5>
                            </div>
                            <h1 class="display-3 text-white mb-4 animated slideInDown">Pozrite sa na náš výber!</h1>
                            <!--tlacidlo-->
                            <a href="#ponuka" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Katalóg</a>
                        </div>
                    </div>


                    <div class="carousel-item">
                        <img src="./img/carousel-2.jpg" alt="" class="w-100">

                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h5 class="section-title text-white text-uppercase mb-3 animated slideInDown">Katalóg
                                    domov</h5>
                            </div>
                            <h1 class="display-3 text-white mb-4 animated slideInDown">Pozrite sa na náš výber!</h1>
                            <!--tlacidlo-->
                            <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Katalóg</a>
                        </div>
                    </div>


                </div>

                <!--control button-->
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="visually-hidden">Predošlé</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="visually-hidden">Ďaľšie</span>
                </button>
            </div>
        </div>

        <!--o nas-->
        <div class="container-xxl py-5" id="onas">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">O nás</h6>
                        <h1 class="mb-4">Vitajte v<span class="text-primary"> RODAN Co.</span></h1>
                        <p class="mb-4">RODAN Co. je renomovaná spoločnosť pôsobiaca v oblasti katalógu domov. Svojou
                            dlhoročnou prítomnosťou na trhu a skúsenosťami si získala dôveru mnohých zákazníkov.</p>

                        <div class="row g-3 pb-4">

                            <div class="col-sm-4 wow fadeIn">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users fa-2x text-primary mb-2"></i>

                                        <h2 class="mb-1" data-toggle="counter-up">1000+</h2>
                                        <p class="mb-0">Zákazníkov</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 wow fadeIn">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-house fa-2x text-primary mb-2"></i>

                                        <h2 class="mb-1" data-toggle="counter-up">100+</h2>
                                        <p class="mb-0">Domov</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 wow fadeIn">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-list-check fa-2x text-primary mb-2"></i>

                                        <h2 class="mb-1" data-toggle="counter-up">1000+</h2>
                                        <p class="mb-0">Objednávok</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!--nejake obrazky-->
                        <a href="#ponuka" class="btn btn-primary py-3 px-5 mt-2">Dozvedieť sa viac</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img src="./img/about-1.jpg" alt="" style="margin-top: 25%;"
                                    class="img-fluid rounder w-75 wow zoomIn">
                            </div>
                            <div class="col-6 text-start">
                                <img src="./img/about-2.jpg" alt="" class="img-fluid rounder w-100 wow zoomIn">
                            </div>
                            <div class="col-6 text-end">
                                <img src="./img/about-3.jpg" alt="" class="img-fluid rounder w-50 wow zoomIn">
                            </div>
                            <div class="col-6 text-start">
                                <img src="./img/about-4.jpg" alt="" class="img-fluid rounder w-75 wow zoomIn">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--ponuka domov-->
        <div class="container-xxl py-5" id="ponuka">
            <div class="container">
                <div class="text-center wow fadeIn">
                    <h6 class="section-title text-center text-primary text-uppercase">Naša ponuka domov</h6>
                    <h1 class="mb-5">Objavte našu ponuku <span class="text-primary text-uppercase">domov</span></h1>
                </div>

                <div class="row g-4">

                
                <?php foreach ($homeOffers as $offer) { ?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-name="p-<?php echo $offer['id']; ?>">
                            <div class="rooms-item shadow rounded overflow-hidden">
                                <div class="position-relative">
                                    <img src="./img/<?php echo $offer['photo_path']; ?>" alt="" class="img-fluid">
                                    <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded px-3 ms-4">
                                        <?php echo number_format($offer['price'], 2); ?>€
                                    </small>
                                </div>
                                <div class="p-4 mt-2">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0"><?php echo $offer['title']; ?></h5>
                                    </div>

                                    <div class="d-flex mb-3">
                                        <div class="border-end me-3 pe-3">
                                            <i class="fa fa-bed text-primary me-2"></i><?php echo $offer['bedrooms']; ?> izby
                                        </div>
                                        <div class="border-end me-3 pe-3">
                                            <i class="fa fa-building-lock text-primary me-2"></i><?php echo $offer['area']; ?> m2
                                        </div>
                                    </div>
                                    <p class="text-body mb-3"><?php echo $offer['description']; ?></p>
                                    <div class="d-flex justify-content-between">
                                        <a href="" class="btn btn-sm btn-dark rounded py-2 px-4">Objednať</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>



                </div>
            </div>
        </div>


       
        <!--sluzby-->

        <div class="container-xxl py-5" id="sluzby">
            <div class="container">
                <div class="text-center wow fadeInUp">
                    <h6 class="section-title text-center text-primary text-uppercase">Naše služby</h6>
                    <h1 class="mb-5">Objavte naše <span class="text-primary text-uppercase">služby</span></h1>
                </div>

                <div class="row g-4">


                    <div class="col-lg-4 col-md-6 wow fadeInUp">
                        <a href="" class="service-item rounded">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div
                                    class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-sticky-note fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Podrobné informácie o domoch</h5>
                            <p class="text-body mb-0">Poskytujeme detailné informácie o jednotlivých domoch, vrátane
                                fotografií, popisu, rozlohy, vybavenia a ďalších dôležitých údajov, aby záujemcovia
                                získali lepší prehľad o nehnuteľnostiach, ich lokalite a možnostiach financovania.</p>
                        </a>
                    </div>


                    <div class="col-lg-4 col-md-6 wow fadeInUp">
                        <a href="" class="service-item rounded">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div
                                    class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-comment fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Komunikácia s predajcami</h5>
                            <p class="text-body mb-0">Umožňujeme priamu komunikáciu medzi záujemcami a predajcami
                                nehnuteľností. Záujemcovia môžu posielať otázky, vyjadrovať záujem o nehnuteľnosti a
                                získavať kontaktné informácie od predajcov prostredníctvom webovej stránky.</p>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp">
                        <a href="" class="service-item rounded">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div
                                    class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-bell fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Notifikácie o nových ponukách</h5>
                            <p class="text-body mb-0">Registrovaní používatelia web stránky dostávajú notifikácie o
                                nových
                                ponukách nehnuteľností, ktoré zodpovedajú ich preferenciám. Táto služba umožňuje
                                užívateľom
                                byť vždy informovaní o aktuálnych ponukách a mať prvé možnosti vyjadriť záujem o nové
                                nehnuteľnosti.</p>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <!--recenzie-->
        <div class="container-xxl testimonial my-5 py-5 bg-dark wow zoomIn">
            <div class="container">
                <div class="owl-carousel testimonial-carousel py-5" style="display: block">

                    <!--prva-->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>Katalóg domov RODAN Co. je skvelým zdrojom informácií a nápadov pre všetkých, ktorí snívajú o
                            vlastnom útulnom a štýlovom domove.</p>
                        <div class="d-flex align-items-center">
                            <img src="./img/testimonial-1.jpg" alt="" class="img-fluid flex-shrink-0 rounded"
                                style="width: 45px; height: 45px;">

                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Michaela K.</h6>
                                <small>Zákazník</small>
                            </div>
                        </div>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mn-n1"></i>
                    </div>
                    <!--prva-->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>Katalóg mi poskytol široký výber nádherných domov a pomohol mi nájsť ten správny štýl, ktorý
                            som hľadal pre svoj budúci dom.</p>
                        <div class="d-flex align-items-center">
                            <img src="./img/testimonial-2.jpg" alt="" class="img-fluid flex-shrink-0 rounded"
                                style="width: 45px; height: 45px;">

                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Daniel S.</h6>
                                <small>Zákazník</small>
                            </div>
                        </div>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>

                    <!--prva-->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>RODAN Co. ma nadchol svojou širokou ponukou domov a detailnými popismi, čo mi pomohlo pri
                            plánovaní môjho vysnívaného domu.</p>
                        <div class="d-flex align-items-center">
                            <img src="./img/testimonial-3.jpg" alt="" class="img-fluid flex-shrink-0 rounded"
                                style="width: 45px; height: 45px;">

                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Martin P.</h6>
                                <small>Zákazník</small>
                            </div>
                        </div>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>


                    <!--prva-->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>Katalóg domov je architektonickým pokladom plným inšpirácie a ideálnym sprievodcom pre výber
                            dokonalého domu.</p>
                        <div class="d-flex align-items-center">
                            <img src="./img/testimonial-4.jpg" alt="" class="img-fluid flex-shrink-0 rounded"
                                style="width: 45px; height: 45px;">

                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Simona F.</h6>
                                <small>Zákazník</small>
                            </div>
                        </div>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>


                </div>
            </div>
        </div>

        <!--newsletter-->
        <div class="container newsletter mt-5 wow fadeIn">
            <div class="row justify-content-center">
                <div class="col-lg-10 border rounded p-1">
                    <div class="border rounded text-center p-5 bg-white">
                        <h4 class="mb-4">Chcete od nás dostávať novinky? Prihláste sa na náš<span
                                class="text-primary text-uppercase"> newsletter</span></h4>

                        <div class="mx-auto position-relative" style="max-width: 400px;">
                            <input type="text" class="form-control w-100 py-3 ps-4 pe-5"
                                placeholder="Zadajte Váš email.">
                            <button class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">Chcem novinky</button>
                        </div>

                    </div>
                </div>

            </div>
        </div>


        <!--footer-->
        <div class="container-fluid bg-dark text-light footer wow fadeIn" id="kontakt">
            <div class="container pb-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-4">
                        <div class="bg-primary rounded p-4">
                            <a href="">
                                <h1 class="text-white mb-3">RODAN Co.</h1>
                            </a>

                            <p class="text-white mb-0">
                                Katalóg domov</a>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Kontakt</h6>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Zochova 9, Bratislava, Slovensko</p>
                        <p class="mb-2"><i class="fa fa-phone me-3"></i>09 88 666 777</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>rodanco@gmail.com</p>

                        <div class="d-flex pt-2">
                            <a href="" class="btn btn-outline-light btn-social"><i class="fab fa-twitter"></i></a>
                            <a href="" class="btn btn-outline-light btn-social"><i class="fab fa-facebook"></i></a>
                            <a href="" class="btn btn-outline-light btn-social"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>


                </div>
            </div>
            <!--copyright-->
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy;<a href="" class="border-bottom">RODAN Co.</a> | Všetky práva vyhradené.
                        </div>

                        <div class="col-md-6 text-center text-md-end">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="#" class="to-top">
            <i class="fas fa-chevron-up"></i>
        </a>


        <!--navigacny panel -->
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="main.js"></script>
</body>

</html>