</head>
<body>

    <div class="db">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <nav class="navbar navbar-inverse bk">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>                        
                                </button>
                                <a class="navbar-brand brand" href="#">Logo Here</a>
                            </div>
                            <div class="collapse navbar-collapse" id="myNavbar">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?php echo site_url('Home') ?>">Home</a></li>

                                    <li><a href="#">Page 2</a></li>
                                    <li><a href="#">Page 3</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <a href="<?php echo site_url('Admin/login') ?>">
                                            <span class="glyphicon glyphicon-user"></span> Login
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('Admin/Register') ?>">
                                            <span class="glyphicon glyphicon-user"></span> Register
                                        </a>
                                    </li>
                                    <li>

                                        <div class="dropdown">
                                            <button class=" mbtn btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                              <a href="#">
                                                <span class="fa fa-shopping-bag bag"></span>
                                                <span class="cnt">22</span>
                                              </a>
                                            </button>
                                            <ul class="dropdown-menu nvcrt" aria-labelledby="dropdownMenu1">
                                                <li>
                                                    <div class="media mbor">
                                                        <div class="media-left">
                                                           <a href="#">
                                                               <img class="media-object  pro_img" src="<?php echo base_url('assets/images/products/img.jpg') ?>" >
                                                             </a>
                                                          </div>
                                                         <div class="media-body">
                                                             <p class="pull-right">1 X 12</p>
                                                            <h4 class="media-heading">WVN.com</h4> 
                                                            <a href="">Remove</a>
                                                          </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="media mbor">
                                                        <div class="media-left">
                                                           <a href="#">
                                                               <img class="media-object pro_img" src="<?php echo base_url('assets/images/products/img.jpg') ?>">
                                                             </a>
                                                          </div>
                                                         <div class="media-body">
                                                             <p class="pull-right">1 X 12</p>
                                                            <h4 class="media-heading">WVN.com</h4> 
                                                            <a href="">Remove</a>
                                                          </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="media">
                                                        <div class="media-left">
                                                           <a href="#">
                                                               <img class="media-object pro_img" src="<?php echo base_url('assets/images/products/img.jpg') ?>" class="img">
                                                             </a>
                                                          </div>
                                                         <div class="media-body">
                                                             <p class="pull-right">1 X 12</p>
                                                            <h4 class="media-heading">WVN.com</h4> 
                                                            <a href="">Remove</a>
                                                          </div>
                                                    </div>
                                                </li>
                                                <li class="mar">
                                                    <p>Total : Price</p>
                                                    <button class="btn btn-primary">CheckOut</button>
                                                    <button class="btn btn-primary pull-right">Cart Empty</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>