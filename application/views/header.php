<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    html {
      position: relative;
      min-height: 100%;
    }
    body {
      margin-bottom: 120px; /* Margin bottom by footer height */
    }
    .footer {
      position: absolute;
      bottom: 0;
      width: 100%;

    }

    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }

    .carousel {
      width: 80%;
      height: 90%;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }

    .affix {
    top: 0;
    width: 100%;
    z-index: 9999 !important;
    }

    .affix + .container-fluid {
      padding-top: 70px;
    }

    .checked {
      color: orange;
    }

    .breadcrumb-item + .breadcrumb-item::before {
      font-family: 'FontAwesome';
      content: "\f105" !important; 
    }

    #myCarousel {
      margin: 0 auto;
      overflow: hidden;
      padding: 10px 0;
      align-items: center;
      justify-content: space-around;
      display: flex;
      float: none;
    }

    #ca {
      padding-top: 60px;
      padding-bottom: 20px;
    }

    #topheader .navbar-nav li > a {
  text-transform: capitalize;
  color: #333;
  transition: background-color .2s, color .2s;
  
  &:hover,
  &:focus {
    color: #fff;
  }
  }

  #topheader .navbar-nav li.active > a {
    border-bottom: 3px solid red;
  }

  .centered {
     float: none;
     margin-left: auto;
     margin-right: auto;
  }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
      overflow: hidden;
      /*position: fixed;
      height: 100px;
      bottom: 0;
      width: 100%;*/
    }
  </style>
</head>
<body>

<?php if($login_status == 1) :?>
<nav style="font-family: 'Open Sans';" nav class="navbar navbar-default navbar-fixed-top" id="mNavbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <div class="row">
        <div class="col-xs-3 col-md-3">
          <a class="" href="http://localhost"><img style="width: 150px; height: 50px;" src="http://localhost/img/logobuku.png"></a>
        </div>
        <div style="padding-left: 40px;" class="col-xs-9 col-md-9">
          <form class="navbar-form" role="search" action="http://localhost/buku/search" method="GET">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="cari" id="cari">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
        </div>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#">Promo</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/cart"><span class="glyphicon glyphicon-shopping-cart"> </span> Cart</a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Toko <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="/toko">Dashboard</a></li>
            <li><a href="#">Pesanan</a></li>
          </ul>
        </li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->name; ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="/profile">Profile</a></li>
            <li><a href="#">Wishlist</a></li>
            <li class="divider"></li>
            <li><a href="http://localhost/private_area/logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php endif;?>
<?php if($login_status == 0) :?>
<nav class="navbar navbar-default navbar-fixed-top" id="mNavbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <div class="row">
        <div class="col-xs-3 col-md-3">
          <a class="" href="http://localhost"><img style="width: 150px; height: 50px;" src="http://localhost/img/logobuku.png"></a>
        </div>
        <div style="padding-left: 40px;" class="col-xs-9 col-md-9">
          <form class="navbar-form" role="search" action="http://localhost/buku/search" method="GET">
        <div class="input-group">
            <input name="cari" id="cari" type="text" class="form-control" placeholder="Search">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
        </div>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#">Promo</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://localhost/login">Login</a></li>
        <li><a href="http://localhost/register">Register</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php endif; ?>