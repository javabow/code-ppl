<!DOCTYPE html>
<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111306181-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111306181-1');
</script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="robots" content="index, follow">
        <meta name="keywords"  content="MMORPG Items, Toram Guide, Toram Boss, Toram mini boss, Toram Bow Guide, Toram Katana Guide" />
        <meta name="author" content="Hilmi Farhandika" />
        <link rel="icon" href="https://www.javabow.com/favicon.ico" type="image/gif">
        <link rel="alternate" type="application/rss+xml" href="https://www.javabow.com/rss.xml" title="JavaBow">
	<title><?php if ($artikel && $title): ?>
  <?php foreach ($artikel as $judul) {
    $head = $judul[2];
    $head2 = $title;
  } ?>
  <?php echo $head; ?> <?php echo $head2; ?>
  <?php elseif ($info): ?>
  <?php echo $title; ?>
  <?php elseif ($nf): ?>
  <?php echo $title; ?>
  <?php elseif ($home2): ?>
  <?php echo $title; ?>  
  <?php endif ?>JavaBow</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.breadcrumb {
    background-color: #ffffff00;
    color: #fff;
	}

	hr { background-color: white; height: 1px; border: 0; }
  
  	.arr-right .breadcrumb-item+.breadcrumb-item::before {
 
  content: "›";
 
  vertical-align:top;
 
  color: #408080;
 
  font-size:35px;
 
  line-height:18px;
 
	}

	img{
		width: 300px;
	}

	.table-responsive-stack tr {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
      -ms-flex-direction: row;
          flex-direction: row;
}


.table-responsive-stack td,
.table-responsive-stack th {
   display:block;
/*      
   flex-grow | flex-shrink | flex-basis   */
   -ms-flex: 1 1 auto;
    flex: 1 1 auto;
}

.table-responsive-stack .table-responsive-stack-thead {
   font-weight: bold;
}

@media screen and (max-width: 768px) {
   .table-responsive-stack tr {
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
          -ms-flex-direction: column;
              flex-direction: column;
      border-bottom: 3px solid #ccc;
      display:block;
      
   }
   /*  IE9 FIX   */
   .table-responsive-stack td {
      float: left\9;
      width:100%;
   }
}
  </style>
</head>
<body style="background: #252830;color: white;">
	<div class="container" style="padding-top: 20px;">
		<div class="row">
  			<div class="col-12 col-md-3" style="border-right: 1px solid;">
  				<a href="/"><h1 style="padding-right: 35px; text-align: center; color: white;">JavaBow</h1></a>
				  	<nav class="navbar navbar-expand-md navbar-light">
					  	<p></p>
	  					<button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	    					<span class="navbar-toggler-icon"></span>
	 					</button>
					  	<div class="collapse navbar-collapse" id="collapsibleNavbar">
						  	<br>
						    <ul class="nav nav-pills flex-column">
						    	<li class="nav-item" style="padding-bottom: 10px;">
						    		<form class="form-inlined my-2 my-lg-0" action="<?php echo base_url(); ?>toram/search?>" method="GET">
						      		<input name="cari" id="cari" class="form-control mr-sm-2 form-control-sm" type="search" placeholder="Search" aria-label="Search" required>
						      		<center><button class="btn btn-outline-success my-2 my-sm-0 btn-sm" type="submit">Search</button></center>
						    		</form>
								</li>
                <?php if ($home): ?>
                  <p style="color: grey;">Guide</p>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" style="color: white;" href="<?php echo base_url(); ?>toram">Toram</a>
                  </li>
                <?php else: ?>
								<li class="nav-item">
									<p style="color: grey;">Menu</p>
						    	</li>
						    	<li class="nav-item">
						      		<a class="nav-link" style="color: white;" href="<?php echo base_url(); ?>toram/boss">Boss</a>
						    	</li>
						    	<li class="nav-item">
						      		<a class="nav-link" style="color: white;" href="<?php echo base_url(); ?>toram/mini-boss">Mini Boss</a>
						    	</li>
						    	<li class="nav-item">
						      		<a class="nav-link" style="color: white;" href="<?php echo base_url(); ?>toram/guide">Guide</a>
						    	</li>
                <?php endif; ?>
						    	<li class="nav-item">
						  			<hr style="background-color: grey;">
						  		</li>
						  	</ul>
	  					</div>  
					</nav>
  			</div>
  			<div class="col-12 col-md-9" style="border-right: 1px solid;">
  				<section>