<style>
.login-logo, .register-logo {
    font-size: 35px;
    text-align: center;
    margin-bottom: 25px;
    font-weight: 300;
    margin-top: -36px;
}  

.login-logo a, .register-logo a {
    color: palegoldenrod;
}
.alert-danger{
    font-size: 15px;
    padding: 2px;
}
.checkbox, .radio {
    position: relative;
    display: block;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 18px;
}

.btn-primary a{
    color:white;
}
</style>


<body class="hold-transition register-page" style="background-color: saddlebrown;">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  <?php  
    $msg = $this->session->flashdata('success');
    if(isset($msg) && !empty($msg))
    {
  ?>
    <div class="alert alert-danger">
        <strong>Contgrats!</strong>
        <p><?php echo $msg ?></p> 
    </div>
    <?php }?>
    
   <?php
        $msg = $this->session->flashdata('Error');
        if(isset($msg) && !empty($msg))
       {
   ?>
       <div class="alert alert-danger">
           <strong>OOPs!</strong>
            <p><?php echo $msg ?></p>
    </div>
    <?php }?>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
    <form  method="POST" enctype="multipart/form-data">
      <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Firstname" name="fname" value="<?php echo set_value('fname')?>" />
       <?php echo form_error('fname'); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Lastname" name="lastname" value="<?php echo set_value('lastname')?>" />
      <?php echo form_error('lastname'); ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="input" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email')?>" />
        <?php echo form_error('email'); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="pass" value="<?php echo set_value('pass')?>">
        <?php echo form_error('pass'); ?>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
     <div class="form-group has-feedback">
        <input type="file" class="form-control" name="img" value="<?php echo set_value('img')?>">
        
      </div>
       <div class="form-group has-feedback">
        <select name="user_role" class="col-xs-12 form-control">
        	<option vlaue="">select Role</option>
                <option value="1">Super Admin</option>
        	<option value="2">Admin</option>
        	<option value="4">Client</option>
        	<option value="3">Employee</option>
        </select>
          <?php echo form_error('user_role'); ?>
      </div>
      <div class="form-group has-feedback">
        <div class="col-sm-12 col-md-12">
          <div class="radio iradio">
            <label>Gender</label>
            <input type="radio" name="gender" checked value="<?php echo set_value('gender')?>">Male
            <input type="radio" name="gender" value="<?php echo set_value('gender')?>">Female 
          </div>
        </div>
      </div>



      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="check"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="<?php echo site_url('Login') ?>" class="text-center">I already have a membership</a>
    <p class="text-center"><a href="<?php echo site_url('Dashboard') ?>"><i>Back</i></a></p>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
