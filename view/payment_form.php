<?php

    session_start();
    require('../controllers/customer_controller.php');
    $user_id = $_SESSION['customer_id'];
    $sub=$_GET['amount'];
    // echo $user_id;

    // $amount= $_GET($sub);
    // $result = select_one_customer_ctr($email);
    $email= select_one_email_ctr($user_id);
    // echo $user_id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>

    <script type="text/javascript" src="../js/registervalidation.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script> 
    <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>

<body>

<!--link to continue shopping-->


<!-- BOOTSTRAP TEMPLATE -->
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Payment</p>

                <form method="POST" class="mx-1 mx-md-4">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="eml" name="email" value="<?php echo $email['customer_email'];?>"class="form-control" required/>
                      <label class="form-label" for="form3Example3c">Email</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="tel" id="amount" name="amount" value="<?php echo $_GET['amount'];?>" class="form-control" required/>
                      <label class="form-label" for="form3Example4c">Amount</label>
                    </div>
                  </div>
                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" onclick="aplerkuPaystack()" name="pay" class="btn btn-success btn-lg">Pay</button>
                  </div>
                </form>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
              <img src="https://images.unsplash.com/photo-1628527304948-06157ee3c8a6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cGF5bWVudHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60"
                  class="img-fluid" alt="Sample image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="backtoShop">
    <a href="../view/shop.php">Back to Shop</a>
  </div>
</section>

</body>
<html>

<script>
//const paymentForm = document.getElementById('paymentForm');
//paymentForm.addEventListener("submit", payWithPaystack, false);
function aplerkuPaystack() {
  event.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_test_15150b850ed3c710900b9a320746aeeb5cf7a860', 
    email: document.getElementById("eml").value,
    amount: document.getElementById("amount").value * 100,
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    currency: 'GHS',
    // label: "Optional string that replaces customer email"
    onClose: function(){
    //   alert('Payment stopped.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);

        $.ajax({
                url: '../actions/process_payment.php'+ response.reference,
                method: 'get',
                success: function (response) {
                 // the transaction status is in response.data.status
                  alert(response);
                 }
               });


    }
  });

  handler.openIframe();
}
</script>