<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <script type="text/javascript" src="../js/registervalidation.js"></script>
    <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>

<body>
<!-- 
<form action="../actions/registerprocess.php" method="POST">
    <input type="text" name="fullname" placeholder="enter your full name" id="fname">
    <input type="text" name="contact" placeholder="enter your contact" id="cnt">
    <input type="email" name="email" placeholder="enter your email" id="eml">
    <input type="password" name="password" placeholder="enter a password" id="pwd">
    <input type="text" name="country" placeholder="enter your country" id="ctry">
    <input type="text" name="city" placeholder="enter your city" id="cty">
    <button type="submit" name="submit" >Submit</button>
</form> -->

<!-- BOOTSTRAP TEMPLATE -->
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form action="../actions/registerprocess.php" method="POST" class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="fname" class="form-control" placeholder="Enter your full name"  name="fullname" />
                      <label class="form-label" for="form3Example1c">Full Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="eml" name="email" placeholder="Enter your email" class="form-control" />
                      <label class="form-label" for="form3Example3c">Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="pwd" name="password" placeholder="Enter a password" class="form-control" />
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="ctry" name="country" placeholder="Enter your country" class="form-control" />
                      <label class="form-label" for="form3Example4cd">Country</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="cty" name="city" placeholder="Enter your city" class="form-control" />
                      <label class="form-label" for="form3Example4cd">City</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="cnt" name="contact" placeholder="Enter your contact" class="form-control" />
                      <label class="form-label" for="form3Example4cd">Contact</label>
                    </div>
                  </div>


                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

              <img src="https://media.istockphoto.com/photos/internet-security-concept-user-access-login-and-password-on-computer-picture-id1337837834?b=1&k=20&m=1337837834&s=170667a&w=0&h=vZYLbcsPKJXJcVhKDcctIZbx3YNgs7rh4OkyFui2o3M="
                  class="img-fluid" alt="Sample image">

                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
<html>