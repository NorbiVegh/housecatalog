<?php
session_start();

@include "config.php";
@include "db_connection.php";

if (!isset($_SESSION["admin_name"])) {
    header("location:login.php");
    exit();
}

// funkcia na databazu
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

<!-- hlava -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rodan Co. | Admin CMS</title>

    <link rel="icon" type="image/x-icon" href="./img/about-2.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>

        .btn-back {
            display: inline-block;
            background-color: #007bff; 
            color: #fff; 
            padding: 10px 15px;
            border-radius: 5px;
            position: absolute;
            top: 20px;
            left: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-decoration: none;
        }

        .btn-back i {
            margin-right: 5px;
        }
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">
    <div class="container-xxl bg-white p-0">

    <p><a href="index.php" class="btn-back"><i class="fas fa-arrow-left"></i>Naspäť na stránku</a></p>

        
        <!-- Navigacia -->

        <div class="container-xxl py-5" id="ponuka">
            <div class="container">
                <div class="text-center wow fadeIn">
                    <h6 class="section-title text-center text-primary text-uppercase">Ponuka domov | Admin CMS </h6>
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
                                        <a href="manage_home_offers.php?id=<?php echo $offer['id']; ?>" class="btn btn-sm btn-dark rounded py-2 px-4">Upraviť</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="main.js"></script>
</body>
</html>
