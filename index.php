<?php
error_reporting(0);
include 'config.php';

if(!isset($_SESSION['email'] ) == 0) {
    header('Location: view/admin/');
}

$status = 0;

if(isset($_POST['login'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    try {
        //$sql = "SELECT * FROM users WHERE name = :name AND password = :password";
        $sql = "SELECT * FROM user WHERE email = :email AND is_active = 1 AND role_id >= 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        //$stmt->bindParam(':password', $password);
        $stmt->execute();

        $row = $stmt->fetch();
        $hash_password = $row['password'];
        if (password_verify($password, $hash_password)){
            $count = $stmt->rowCount();
            if($count == 1) {
                $_SESSION['email'] = $email;
                $_SESSION['nama'] = $row['name'];
                $_SESSION['gambar'] = $row['image'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['level_id'] = $row['role_id'];
                header("Location: view/admin/");
                return;
            }else{
                $status = 1;
            }
        }
        $status = 1;
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en" class="no-outlines">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- ==== Document Title ==== -->
    <title>Dashboard - DAdmin</title>

    <!-- ==== Document Meta ==== -->
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- ==== Favicon ==== -->
    <link rel="icon" href="favicon.png" type="image/png">

    <!-- ==== Google Font ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CMontserrat:400,500">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" href="assets/css/morris.min.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/jquery-jvectormap.min.css">
    <link rel="stylesheet" href="assets/css/horizontal-timeline.min.css">
    <link rel="stylesheet" href="assets/css/weather-icons.min.css">
    <link rel="stylesheet" href="assets/css/dropzone.min.css">
    <link rel="stylesheet" href="assets/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="assets/css/ion.rangeSlider.skinFlat.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/fullcalendar.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Page Level Stylesheets -->

</head>
<body>

<!-- Wrapper Start -->
<div class="wrapper">
    <!-- Login Page Start -->
    <div class="m-account-w" data-bg-img="assets/img/account/wrapper-bg.jpg">
        <div class="m-account">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <!-- Login Content Start -->
                    <div class="m-account--content-w" data-bg-img="assets/img/account/content-bg.jpg">
                        <div class="m-account--content">
                            <h2 class="h2">Don't have an account?</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <a href="register.html" class="btn btn-rounded">Register Now</a>
                        </div>
                    </div>
                    <!-- Login Content End -->
                </div>

                <div class="col-md-6">
                    <!-- Login Form Start -->
                    <div class="m-account--form-w">
                        <div class="m-account--form">
                            <!-- Logo Start -->
                            <div class="logo">
                                <img src="assets/img/logo.png" alt="">
                            </div>
                            <!-- Logo End -->

                            <form action="#" method="post">
                                <label class="m-account--title">Login to your account</label>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <i class="fas fa-user"></i>
                                        </div>

                                        <input type="text" name="email" placeholder="Email" class="form-control" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <i class="fas fa-key"></i>
                                        </div>

                                        <input type="password" name="password" placeholder="Password" class="form-control" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="m-account--actions">
                                    <a href="#" class="btn-link">Forgot Password?</a>

                                    <button type="submit" name="login" class="btn btn-rounded btn-info">Login</button>
                                </div>
                                <div class="m-account--footer">
                                    <p>&copy; 2018 ThemeLooks</p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Login Form End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Login Page End -->
</div>
<!-- Wrapper End -->

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/perfect-scrollbar.min.js"></script>
<script src="assets/js/jquery.sparkline.min.js"></script>
<script src="assets/js/raphael.min.js"></script>
<script src="assets/js/morris.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/jquery-jvectormap.min.js"></script>
<script src="assets/js/jquery-jvectormap-world-mill.min.js"></script>
<script src="assets/js/horizontal-timeline.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/jquery.steps.min.js"></script>
<script src="assets/js/dropzone.min.js"></script>
<script src="assets/js/ion.rangeSlider.min.js"></script>
<script src="assets/js/datatables.min.js"></script>
<script src="assets/js/main.js"></script>

<!-- Page Level Scripts -->

</body>
</html>
