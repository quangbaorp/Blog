 <!-- <?= old('email') ?>
 <?= old('password') ?> -->
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <title>Upvex - Responsive Admin Dashboard Template</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
     <meta content="Coderthemes" name="author">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="{csrf_header}" content="{csrf_hash}">
     <!-- App favicon -->
     <link rel="shortcut icon" href="assets\images\favicon.ico">

     <!-- App css -->
     <link href="<?= base_url() ?>\assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
     <link href="<?= base_url() ?>\assets\css\icons.min.css" rel="stylesheet" type="text/css">
     <link href="<?= base_url() ?>\assets\css\app.min.css" rel="stylesheet" type="text/css">

 </head>

 <body class="authentication-bg authentication-bg-pattern">

     <div class="account-pages mt-5 mb-5">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-md-8 col-lg-6 col-xl-5">
                     <div class="card">
                         <div class="card-body p-4">
                             <div class="text-center w-75 m-auto">
                                 <a href="index.html">
                                     <span><img src="<?= base_url() ?>\assets\images\logo-dark.png" alt=""
                                             height="26"></span>
                                 </a>
                                 <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin
                                     panel.</p>
                             </div>

                             <h5 class="auth-title">Sign In</h5>
                             <?php if (session()->get('error')): ?>
                             <div class="alert alert-danger" role="alert">
                                 <?= session()->get('error') ?>
                             </div>
                             <?php endif; ?>
                             <form action="" method="post">
                                 <input type="hidden" name="{csrf_token}" value="{csrf_hash}">
                                 <div class="form-group mb-3">
                                     <label for="emailaddress">Email address</label>
                                     <input class="form-control" type="email" name="email"  value="<?= set_value('email') ?>"
                                         id="emailaddress"  required="" placeholder="Enter your email">
                                 </div>

                                 <div class="form-group mb-3">
                                     <label for="password">Password</label>
                                     <input class="form-control" type="password" name="password"  value="<?= set_value('password') ?>"
                                         required="" id="password" placeholder="Enter your password">
                                 </div>

                                 <div class="form-group mb-3">
                                     <div class="custom-control custom-checkbox checkbox-info">
                                         <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                         <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                     </div>
                                 </div>
                                 <?php if (isset($validation)): ?>
                                 <div class="col-12">
                                     <div class="alert alert-danger" role="alert">
                                         <?= $validation->listErrors() ?>
                                     </div>
                                 </div>
                                 <?php endif; ?>

                                 <div class="form-group mb-0 text-center">
                                     <button class="btn btn-danger btn-block" type="submit"> Log In </button>
                                 </div>

                             </form>

                            

                         </div> <!-- end card-body -->
                     </div>
                     <!-- end card -->

                     
                     <!-- end row -->

                 </div> <!-- end col -->
             </div>
             <!-- end row -->
         </div>
         <!-- end container -->
     </div>
     <!-- end page -->


     <footer class="footer footer-alt">
         2019 &copy; Upvex theme by <a href="" class="text-muted">Coderthemes</a>
     </footer>

     <!-- Vendor js -->
     <script src="<?= base_url() ?>\assets\js\vendor.min.js"></script>

     <!-- App js -->
     <script src="<?= base_url() ?>\assets\js\app.min.js"></script>

 </body>

 </html>