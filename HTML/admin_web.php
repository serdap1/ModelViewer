<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Model-viewer</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- model-viewer -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.min.js"></script>

</head>

<body>
    <?php
    @include 'config.php';
    session_start();
    if (isset($_POST['submit'])) {
        session_destroy();
        header('location: user_web.php');
    }
    if (isset($_FILES['file'])) {
        $errors = [];
        $name = $_POST['text'];
        $file_name = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $location = "assets/modelviewer/";
        if ($_FILES["file"]["size"] > 30000000) {
            $errors[] = "File exceeds maximum size (30MB)";
        }
          
        // Allow certain file formats
        if($imageFileType != "glb") {
            $errors[] = "Sorry, only GLB files are allowed.";
            $uploadOk = 0;
        }
        if(empty($errors)){
            $upload = move_uploaded_file($tmp_name, $location . $file_name);
            $insert_data = "INSERT INTO `datalink` (`id`, `name`, `link`) VALUES
                (' ','$name', '$location$file_name')";
            mysqli_query($conn, $insert_data);
            if ($upload) {
                echo "The file has been uploaded";
            } else {
               echo "An error occurred. Please contact the administrator.";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }
        
    }
    ?>
    <!-- header section starts  -->

    <header class="header">
        <a href="#" class="logo"> <i class=" fas fa-solid fa-vr-cardboard"></i> model-viewer </a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#products">products</a>
            <a href="#edit"> user edit</a>
            <a href="#review">review</a>
        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-user" id="login-btn"></div>

        </div>

        <form action="" class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <div class="shopping-cart">

        </div>

        <form action="" class="login-form" method="POST">
            <h3>profile</h3>
            <div class="box">
                <img src="assets/images/AI1.jpg" alt="" class="box">
                <h4>admin</h4>
            </div>

            <p>Group: SE2022-NHOM-2.1</p>
            <p>Topic: 3D/AR</p>
            <p>Phone: +345678999</p>
            <p>Address: HaNoi-VietNam</p>
            <p>Universe: Đại học KHTN-Đại học QG Hà Nội</p>
            <input type="submit" name="submit" value="logout" class="btn">
            <div class="fas fa-sign-out-alt" id="logout-btn"></div>
        </form>

    </header>

    <!-- home section start -->
    <section class="home" id="home">
        <div class="content">
            <h3>Augmented Reality and <span>Virtual Reality</span></h3>
            <p>technology is the closest thing to magic that exists in this world</p>
        </div>
    </section>
    <!-- home section end -->

    <!-- products section starts -->
    <section class="products" id="products">

        <h1 class="heading"> our <span>products</span> </h1>

        <div class="swiper product-slider">

            <div class="swiper-wrapper">
                <?php
                $select = " select * from datalink ";
                $result = mysqli_query($conn, $select);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        echo '
                            <div class="swiper-slide box"> 
                            <model-viewer src="' . $row["link"] . '" alt="model robot" auto-rotate camera-controls ar ios-src="assets/login/Drossel.gltf"></model-viewer>
                            <h3>' . $row["name"] . '</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <a href="view.php?id=' . $row["id"] . '" class="btn">view</a>
                            </div>';
                    }
                }
                ?>
            </div>
        </div>

    </section>

    <!-- products section end -->

    <!-- user edit section start -->
    <section class="edit" id="edit">
        <h1 class="heading"> user <span>edit</span> </h1>
        <div class="box">
            <form enctype="multipart/form-data" method="post">
                <input type="file" name="file" id="file">
                <input type="text" name="text" placeholder="Enter file name" required>
                <input type="submit" value="upload" class="btn">
            </form>
        </div>
    </section>

    <!-- user edit section end -->

    <!-- review section starts  -->

    <section class="review" id="review">

        <h1 class="heading"> customer's <span>review</span> </h1>

        <div class="box-container">

            <div class="box">
                <img src="assets/images/traianime.jpg" alt="">
                <p>Life is a story makes yours the best seller</p>
                <h3>dong duc anh</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="box">
                <img src="assets/images/AI1.jpg" alt="">
                <p></p>
                <h3>nguyen duc chinh</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="box">
                <img src="assets/images/AI1.jpg" alt="">
                <p></p>
                <h3>lam son dat</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="box">
                <img src="assets/images/AI1.jpg" alt="">
                <p></p>
                <h3>tran tien hao</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

        </div>

    </section>

    <!-- review section ends -->

    <!-- footer section starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3> model-viewer <i class="fas fa-shopping-basket"></i> </h3>
                <p>future technology</p>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#" class="links"> <i class="fas fa-phone"></i> +123-456-7890 </a>
                <a href="#" class="links"> <i class="fas fa-phone"></i> +111-222-3333 </a>
                <a href="#" class="links"> <i class="fas fa-envelope"></i> t65@hus.edu.vn </a>
                <a href="#" class="links"> <i class="fas fa-map-marker-alt"></i> nguyenTrai, hanoi, vietnam </a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="#home" class="links"> <i class="fas fa-arrow-right"></i> home </a>
                <a href="#products" class="links"> <i class="fas fa-arrow-right"></i> products </a>
                <a href="#edit" class="links"> <i class="fas fa-arrow-right"></i> user edit </a>
                <a href="#review" class="links"> <i class="fas fa-arrow-right"></i> review </a>
            </div>

            <div class="box">
                <h3>newsletter</h3>
                <p>subscribe for latest updates</p>
                <input type="email" placeholder="your email" class="email">
                <input type="submit" value="subscribe" class="btn">
                <img src="image/payment.png" class="payment-img" alt="">
            </div>

        </div>

        <div class="credit"> created by <span> group SE2022-2.1 </span> | all rights reserved </div>

    </section>

    <!-- footer section ends -->

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>
</body>

</html>
