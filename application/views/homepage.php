<div id="ca" class="container">    
  <div class="row">
        <h3></h3><br><br>
    <div class="col-sm-12">
      <div id="myCarousel" class="carousel slide col-xs-12" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="http://localhost/img/banner1.png" alt="Los Angeles">
          </div>

          <div class="item">
            <img src="http://localhost/img/banner2.png" alt="Chicago">
          </div>

          <div class="item">
            <img src="http://localhost/img/banner1.png" alt="New York">
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>

<?php if ($info_buku) {?>
  
<div class="container" style="font-family: 'open sans';">    
  <div class="row">
    <h3>Buku Paling Populer</h3>
    <?php foreach ($info_buku as $info) :?>
    <div class="col-xs-6 col-md-3">
      <a style="text-decoration: none;" href="http://localhost/buku/view/<?php echo $info[2]; ?>">
      <div style="height: 100%; box-shadow: 0 0 5px gray;" class="thumbnail">
        <img style="width: 100%; height: 200px;" src="http://localhost/img/<?php echo $info[1]; ?>" alt="">
          <div class="caption">
            <div class="row">
            <div style="height: 100px;" class="col-xs-12 col-md-12">
            <h3 style="font-family: 'open sans'; font-size: 16px; line-height: 19px; font-weight: 600;"><?php echo substr($info['0'], 0, 50); ?>
            <?php if (strlen($info['0']) > 50) {
              echo "...";
            } ?></h3>
            </div>
            <div style="height: 25px;" class="col-xs-12 col-md-12">
            <div style="padding-top: 10px;">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span>(56)</span>
            </div>
            </div>
            <div style="height: 50px;" class="col-xs-7 col-md-7">
            <h4 style="font-weight: 600;">Rp <?php echo $info[3]; ?></h4>
            </div>
            <div style="height: 50px; padding-top: 10px;" class="col-xs-5 col-md-5">
              <span class="glyphicon glyphicon-eye-open"></span>
              <span>123</span>
            </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <?php endforeach; ?>
  </div>
</div><br>

<?php } ?>

<center>
<button id="reveal">Why's that?</button>
<button id="reveal2">hmmm?</button>
    <div id='loadingDiv'>
      <center><img src='http://localhost/img/loading.gif' /></center>
    </div> 
    <div id="ajax-content">
    </div>
</center>

<script>
  $('#reveal').on('click', function() {
    $('ajax-content').hide()
    $('#loadingDiv').show()
    setTimeout(function() {
    $('#loadingDiv').hide()
    }, 1000);
    setTimeout(function() {
    $('#ajax-content').load('http://localhost/login')
    }, 1000);
  
  
  })

  $('#reveal2').on('click', function() {
    $('ajax-content').hide()
    $('#loadingDiv').show()
    setTimeout(function() {
    $('#loadingDiv').hide()
    }, 1000);
    setTimeout(function() {
    $('#ajax-content').load('http://localhost/register')
    }, 1000);
  })

  $('#loadingDiv').hide().ajaxStart( function() {
  $(this).show();  // show Loading Div
  } ).ajaxStop ( function(){
  $(this).hide(); // hide loading div
  });
</script>
