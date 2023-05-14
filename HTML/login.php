<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    body {
        background-image: url('assets/images/background_login.jpg');
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
</style>

<body>
    <?php
    @include 'config.php';
    session_start();
    if (isset($_POST['submit'])) {
        $account = $_POST['account'];
        $password = $_POST['password'];
        $select = " select * from users where account = '$account' and password = '$password'";
        $result = mysqli_query($conn, $select);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            header('location:admin_web.php');
        } else {
            $error[] = 'Incorrect account or password!';
        }
    }
    ?>
    <div class="container">
        <div class="cover">
            <div class="front">
                <img src="assets\images\universe.jpg" alt="">
                <div class="text">
                    <span class="text-1">Welcome to <br> 3D/AR UNIVERSE</span>
                    <span class="text-2">Let's go</span>
                    <br>
                    <model-viewer src="assets/login/Drossel.glb" class="model-robot" ar ar-modes="webxr scene-viewer quick-look" camera-controls shadow-intensity="1" autoplay>
                    </model-viewer>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Login</div>
                    <form action="" method="post">
                        <div class="input-boxes">
                            <?php
                            if (isset($error)) {
                                foreach ($error as $error) {
                                    echo '<span class="error-msg">' . $error . '</span>';
                                };
                            };
                            ?>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="account" name="account" placeholder="Enter your account" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <div class="text"><a href="#">Forgot password?</a></div>
                            <div class="button input-box">
                                <input type="submit" name="submit" value="Sumbit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>