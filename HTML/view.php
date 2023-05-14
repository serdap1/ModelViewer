<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Model-Viewer</title>
    <link rel="stylesheet" href="css/view.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <!-- model-viewer -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.min.js"></script>


</head>
<?php
@include 'config.php';
session_start();
$select = 'select * from datalink where id = ' . $_GET['id'];
$result = mysqli_query(mysqli_connect('localhost', 'root', '', 'nhom2_1'), $select);
$product = mysqli_fetch_assoc($result);
?>

<body>
    <!-- header section start -->
    <header class="header">
        <a href="" class="logo"> <i class=" fas fa-sharp fa-solid fa-eye"></i> View Model-Viewer</a>
    </header>
    <!-- header section end -->

    <!-- section 3d view start -->
    <section class="view">
        <div class="box">
            <!-- chèn mô hình 3d  start-->
            <model-viewer src="<?= $product['link'] ?>" alt="model robot" auto-rotate camera-controls ar ios-src="<?= $product['link'] ?> " shadow-intensity="1" autoplay>
                <div class="progress-bar hide" slot="progress-bar">
                    <div class="update-bar"></div>
                </div>
                <button slot="ar-button" id="ar-button">
                    View in your space
                </button>
                <div id="ar-prompt">
                    <img src="assets/images/ar_hand_prompt.png">
                </div>
            </model-viewer>
            <!-- chèn mô hình 3d end -->

        </div>
        <div class="content">
            <h3><?= $product['name'] ?></h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="close">
            <a href="javascript:history.back()" class="btn">back</a>
            </div>
        </div>
        
    </section>
    <!-- section 3d view end -->
    <script src="view_script.js"></script>
</body>


</html>