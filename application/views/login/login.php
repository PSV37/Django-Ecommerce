
<style>
body
{
  background-color: saddlebrown;
}
.login-logo a, .register-logo a {
    color: wheat;
    font-size: 42px;
}
.alert-danger{
    font-size: 13px;
    padding: 2px;   
}

.form-control {
    border-radius: 0;
    box-shadow: none;
    border-color: #d2d6de;
    width: 33%;
}
.alert-danger {
    font-size: 13px;
    padding: 2px;
    width: 32%;
}

</style>

 <!--Body -->
  <div class="login-box">
   <div class="login-logo">
     <a href="../../index2.html"><b>Admin</b>LTE</a>
         </div>
   <!-- /.login-logo -->
   <div class="login-box-body">
     <p class="login-box-msg">Sign in to start your session</p>
<div class="container">
    <div class="row">
       <form action="<?php echo site_url('Admin/ckeckLogin') ?>" method="post" enctype="multipart/form-data" data-parsley-validate>
                <div class="form-group">
                    <?php ckeckFlash(); ?>
                    <input type="text" name="email" placeholder="Enter Your Email" class="form-control" data-parsley-type="email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Enter Your password" class="form-control"  required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Sing in</button>
                </div>
            </form>
    </div> 
</div>
     <div class="social-auth-links text-center">
       <p>- OR -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
         Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
         Google+</a>
     </div>
     <!-- /.social-auth-links -->

     <a href="<?php echo site_url('Login/forgetpassword') ?>">I forgot my password</a>
     <a href="" style="float:right" class="reset">Reset Password</a><br>
     <a href="<?php echo site_url('Admin/Register') ?>" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


