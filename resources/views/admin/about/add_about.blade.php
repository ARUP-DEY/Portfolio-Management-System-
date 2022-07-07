<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <link href="../css/demo.css" rel="stylesheet" />
    <style>
        

.card-padding{
   padding:10px 30px!important;
}
.inputstyle{
    padding: 5px 20px;
}
        </style>
</head>

<body >
    <div class="wrapper" style="background-color: black;">
    <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            
            <div class="sidebar-wrapper" style="background-color: black;">
                <div class="logo">
                    <a href="javascript:;" class="simple-text">
                        DASHBOARD
                </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <i class="fa fa-user"></i>
                            <p>ADMIN</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo url('admin/about') ?>">
                            <i class="nc-icon nc-icon nc-paper-2"></i>
                            <p>About</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?php echo url('admin/skills') ?>">
                            <i class="fa fa-certificate"></i>
                            <p>Skills</p>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link active" href="<?php echo url('admin/project') ?>">
                            <i class="fa fa-image"></i>
                            <p>Projects</p>
                        </a>
                    </li>

                    <li >
                        <a class="nav-link active" href="<?php echo url('admin/experience') ?>">
                            <i class="fa fa-list"></i>
                            <p>Experience</p>
                        </a>
                    </li>

                    <li >
                        <a class="nav-link active" href="<?php echo url('admin/services') ?>">
                            <i class="fa fa-plus-square-o"></i>
                            <p>Services</p>
                        </a>
                    </li>
                    <li >
                        <a class="nav-link active" href="<?php echo url('admin/blog') ?>">
                            <i class="fa fa-folder"></i>
                            <p>Blog</p>
                        </a>
                    </li>
                    <li >
                                                <a class="nav-link active" href="<?php echo url('admin/contact') ?>">
                            <i class="fa fa-phone"></i>
                            <p>Contact</p>

                        </a>
                    </li>
                    <li class="nav-item  active-pro">
                                <a class="nav-link" href="<?php echo url('logout') ?>">
                            <p>HARSH CHALUDIA</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"></a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>

                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
    Logout
</a>    
<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-padding">
                            <div class="header">
                                <h4 class="title">ABOUT PANEL</h4>
                                <a href="{{ route('admin.about')}}"><button type="button" class="btn btn-warning" >About You List</button></a>
                                <br>
                                <br>
                                <br>
                            </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
        
                                    <form class="aboutbody" action="{{ route('admin.addabout')  }}" method="post" role="form" enctype="multipart/form-data">
                                        
                                        
                                        <div class="form-group">
                                    <label   for="formGroupExampleInput">First Name :</label>
                                    <input  type="text" class="form-control"  name="fname" id="formGroupExampleInput" placeholder="First Name">
                                  </div>
                                  <div class="form-group">
                                    <label   for="formGroupExampleInput2">Middle Name:</label>
                                    <input type="text" class="form-control" name="mname" id="formGroupExampleInput2" placeholder="Middle Name">
                                </div>
                                    <div class="form-group">
                                    <label  for="formGroupExampleInput2">Last Name:</label>
                                    <input type="text" class="form-control" name="lname" id="formGroupExampleInput2" placeholder="Last Name">
                                    </div>
                                    <div class="input-group date">
                  
                                    <label   for="formGroupExampleInput2">Date of Birth:</label>
                                    <i class="fa fa-calendar"></i>
                                  
                                  <input type="date" name="birthday"  class="form-control pull-right" id="datepicker">
                                </div>
                                    <div class="form-group">
                                    <label  for="formGroupExampleInput2">Image:</label>
                                    <input type="file" class="form-control" name="pimage" id="formGroupExampleInput2" placeholder="Image" >
                                    </div>
                                    <div class="form-group">
                                    <label  for="formGroupExampleInput2">CV:</label>
                                    <input type="file" accept="application/pdf" class="form-control" name="cv" id="formGroupExampleInput2" placeholder="CV" >
                                    </div>
                                    <img class="col-sm-6" id="preview"  src="">
                                    <div class="form-group">
                                    <label   for="formGroupExampleInput2">Description:</label>
                                    <input type="text" class="form-control" name="descr" id="formGroupExampleInput2" placeholder="Description">
                                    </div>
                                    <div class="form-group">
                                    <label for="formGroupExampleInput2">Age:</label>
                                    <input type="text" class="form-control" name="age" id="formGroupExampleInput2" placeholder="Age">
                                    </div>

                                    <div class="form-group">
                                    <label for="formGroupExampleInput2">Email:</label>
                                    <input type="text" class="form-control" name="email" id="formGroupExampleInput2" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                    <label for="formGroupExampleInput2">City:</label>
                                    <input type="text" class="form-control" name="city" id="formGroupExampleInput2" placeholder="City">
                                  </div>
                                  <div class="form-group">
                                    <label for="formGroupExampleInput2">Degree:</label>
                                    <input type="text" class="form-control" name="degree" id="formGroupExampleInput2" placeholder="Highest Degree">
                                  </div>
                                  <div class="form-group">
                                    <label for="formGroupExampleInput2">Study:</label>
                                    <input type="text" class="form-control" name="study" id="formGroupExampleInput2" placeholder="Study">
                                  </div>
                                    <div class="form-group">
                                    <label for="formGroupExampleInput2">Interests:</label>
                                    <input type="text" class="form-control" name="interests" id="formGroupExampleInput2" placeholder="Interests">
                                  </div>
                                    <div class="form-group">
                                    <label  for="formGroupExampleInput2">Website:</label>
                                    <input type="text" class="form-control" name="website" id="formGroupExampleInput2" placeholder="Website">
                                  </div>
                                  
                                  <div class="form-group">
                                    <label for="formGroupExampleInput2">Twitter:</label>
                                    <input type="text" class="form-control" name="twitter" id="formGroupExampleInput2" placeholder="Twitter">
                                  </div>

                                        {{csrf_field()}}

                <button class="btn btn-danger btn-lg btn-block" type="submit" name="up" value="">Save</button>
                                   

                                  
                                </form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="">Portfolio Management Syste </a>. All Rights Reserved.
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>



   
</body>
<!--   Core JS Files   -->
<script src="../js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../js/core/popper.min.js" type="text/javascript"></script>
<script src="../js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../js/plugins/bootstrap-switch.js"></script>
<!--  Chartist Plugin  -->
<script src="../js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../js/demo.js"></script>

</html>
