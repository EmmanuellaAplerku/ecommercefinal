<?php

if (isset($_GET['message'])) {
	$message = $_GET['message'];
} else {
	$message = '';
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>


  <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/revampdlogo.jpg">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="../assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="../assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="../assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="../assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="../assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="../assets/css/responsive.css">
	<!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->

	<!-- sweet alert -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!-- <script src="../../sweetalert2.min.js"></script> -->
</head>

<body>

  <!-- BOOTSTRAP TEMPLATE -->
  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>

                  <form action="../actions/loginprocess.php" method="POST" class="mx-1 mx-md-4">


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" id="email" name="email" placeholder="Enter your email" class="form-control" />
                        <label class="form-label" for="form3Example3c">Email</label>
                        <small class="error"></small>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="pwd" name="password" placeholder="Enter a password" class="form-control" />
                        <label class="form-label" for="form3Example4c">Password</label>
                        <small class="error"></small>
                      </div>
                    </div>


                    <div class="form-check d-flex justify-content-center mb-5">
                      <label class="form-check-label" for="form2Example3">
                        Don't have an account? <a href="./register.php">Register here</a>
                      </label>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" name="login" id="loginBtn" class="btn btn-primary btn-lg">Login</button>
                    </div>

                  </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="https://media.istockphoto.com/photos/internet-security-concept-user-access-login-and-password-on-computer-picture-id1337837834?b=1&k=20&m=1337837834&s=170667a&w=0&h=vZYLbcsPKJXJcVhKDcctIZbx3YNgs7rh4OkyFui2o3M=" class="img-fluid" alt="Sample image">


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="" id="alert" value="<?php echo $message; ?>">
  </section>


  <!-- jquery -->
  <script src="../assets/js/jquery-1.11.3.min.js"></script>
  <!-- bootstrap -->
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- count down -->
  <script src="../assets/js/jquery.countdown.js"></script>
  <!-- isotope -->
  <script src="../assets/js/jquery.isotope-3.0.6.min.js"></script>
  <!-- waypoints -->
  <script src="../assets/js/waypoints.js"></script>
  <!-- owl carousel -->
  <script src="../assets/js/owl.carousel.min.js"></script>
  <!-- magnific popup -->
  <script src="../assets/js/jquery.magnific-popup.min.js"></script>
  <!-- mean menu -->
  <script src="../assets/js/jquery.meanmenu.min.js"></script>
  <!-- sticker js -->
  <script src="../assets/js/sticker.js"></script>
  <!-- main js -->
  <script src="../assets/js/main.js"></script>



  <!-- sweet alert code -->
  <script>
    let sw = document.getElementById('alert').value
    if (sw == 'failed') {
      Swal.fire({
        title: 'Failed to login',
        text: sw,
        icon: 'warning',
        confirmButtonText: 'Okay'
      }).then(() => {
        window.history.back()
      })
    } else if (sw == 'success') {
      Swal.fire({
        title: 'Login successful',
        text: sw,
        icon: 'success',
        confirmButtonText: 'Okay'
      }).then(() => {
        window.location.href = '../index.php';
        // console.log('success')
      })
    } else {

    }
  </script>

  <script src="../assets/js/loginVal.js"></script>
</body>
<html>