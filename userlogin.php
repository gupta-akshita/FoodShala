<!DOCTYPE html>
<head>
   <title>
    Foodshala,s Login Form
   </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" text="text/css" href="css/style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 d-none d-md-block image-container" style="position: relative;">
            </div>
            <div class="col-lg-6 col-md-6 form-container">
                <div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
                    <div class="logo mb-3">
                        <img src="image/logo.png" width="150px">
                    </div>
                    <div class="heading mb-4">
                        <h4 style="color:#252215;">Customer Login</h4>
                    </div>
                    <form action="uservalidation.php" method="POST">
                        <div class="form-input">
                            <span><i class="fa fa-envelope"></i></span>
                            <input type="email" placeholder="Enter Email" name="user_email" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-lock"></i></span>
                            <input type="password" placeholder="Enter password" name="user_pass" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 d-flex">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cb1">
                                    <label class="custom-control-label text-white" for="cb1">
                                        Remember
                                    </label>
                                </div>
                            </div>
                                
                        </div>
                        <div class="text-left mb-3">
                            <button type="submit" class="btn">Login</button>
                        </div>
                        <div style="color: #777;">Don't have an account?
                            <a href="userregister.php" class="register-link">Create one</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>