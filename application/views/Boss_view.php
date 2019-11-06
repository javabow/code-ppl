<?php
if($results){
?>
	<nav aria-label="breadcrumb ">
 
  	<ol class="breadcrumb arr-right white-text">
 
    <li class="breadcrumb-item "><a href="/" class="text-light">Home</a></li>
 
    <li class="breadcrumb-item "><a href="/toram" class="text-light">Toram</a></li>
 
    <li class="breadcrumb-item text-light active" aria-current="page">Boss</li>
 
  	</ol>
 
	</nav>

	<center><h1>Toram Online Boss</h1></center>
	<hr class="my-3 white">
	<div class="row">


	<?php
	$count=0;
	foreach ($results as $content) :
	?>
	<div class="col d-flex justify-content-center pt-4">
		<div class="card text-dark" style="width: 18rem; height: 300px;">
	 		<a href="<?php echo base_url(); ?>toram/boss/<?php echo $content->name_id; ?>">
      <img class="card-img-top img-thumbnail" style="width: 100%; height: 200px;" src="https://www.javabow.com/img/<?php echo $content->boss_picture;?>" alt="Card image cap">
	  		<div class="card-body">
	    		<h5 class="card-title"><?php echo $content->name;?></h5>
	    		</a>
	  		</div>
		</div>
		<br>
	</div>

	 
	<?php endforeach; ?>
	</div>
  <center>
  <?php 
  echo $this->pagination->create_links();
  ?>
  </center>
<?php }elseif($artikel){ ?>

<?php
	foreach ($artikel as $content) :
?>
<nav aria-label="breadcrumb ">
 
  <ol class="breadcrumb arr-right white-text">
 
    <li class="breadcrumb-item "><a href="/" class="text-light">Home</a></li>
 
    <li class="breadcrumb-item "><a href="/toram" class="text-light">Toram</a></li>
 
    <li class="breadcrumb-item "><a href="/toram/boss" class="text-light">Boss</a></li>

    <li class="breadcrumb-item text-light active" aria-current="page"><?php echo $content[2]; ?></li>
 
  </ol>
 
</nav>
<center><div><?php date_default_timezone_set('Asia/Jakarta'); echo date("d-m-Y",strtotime($content[1])); ?></div></center>
<center><h3><?php echo $content[2]; ?></h3></center>
<hr class="my-3 white">
<div class="text-justify">
	<center><img class="" style="width: 300px;" src="https://www.javabow.com/img/<?php echo $content[10];?>" alt="<?php echo $content[2]; ?>"></center>
	<br/>
<br/>
<h2>Boss Info</h2>
   <table class="table table-bordered table-striped table-responsive-md"  id="tableOne">
      <thead class="thead-light">
         <tr>
      <th scope="col">Location</th>
      <th scope="col">Element</th>
      <th scope="col">Health Point</th>
      <th scope="col">Break</th>
      <th scope="col">Weakness</th>
      <th scope="col">Base EXP</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $content[3]; ?></td>
      <td><?php echo $content[5]; ?></td>
      <td><?php echo $content[6]; ?></td>
      <td><?php echo $content[7]; ?></td>
      <td><?php echo $content[8]; ?></td>
      <td><?php echo $content[9]; ?></td>
    </tr>
      </tbody>
   </table>
<br/>
<h2>Drops</h2>
   <table class="table table-bordered table-striped table-responsive-stack"  id="tableTwo">
      <thead class="thead-light">
         <tr>
            <th scope="col">Material</th>
      		<th scope="col">Equip</th>
      		<th scope="col">Crystal</th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td><?php echo $content[11]; ?></td>
      		<td><?php echo $content[12]; ?></td>
      		<td><?php echo $content[13]; ?></td>
         </tr>
      </tbody>
   </table>
   <br/>
	<?php echo $content[14]; ?>
</div>
<script type="text/javascript">$(document).ready(function() {
   // inspired by http://jsfiddle.net/arunpjohny/564Lxosz/1/
   $('.table-responsive-stack').find("th").each(function (i) {
      $('.table-responsive-stack td:nth-child(' + (i + 1) + ')').prepend('<span style="color: red;" class="table-responsive-stack-thead">'+ $(this).text() + ':</span><br/> ');
      $('.table-responsive-stack-thead').hide();
   });
$( '.table-responsive-stack' ).each(function() {
  var thCount = $(this).find("th").length; 
   var rowGrow = 100 / thCount + '%';
   //console.log(rowGrow);
   $(this).find("th, td").css('flex-basis', rowGrow);   
});
function flexTable(){
   if ($(window).width() < 768) {
   $(".table-responsive-stack").each(function (i) {
      $(this).find(".table-responsive-stack-thead").show();
      $(this).find('thead').hide();
   });
   // window is less than 768px   
   } else {
   $(".table-responsive-stack").each(function (i) {
      $(this).find(".table-responsive-stack-thead").hide();
      $(this).find('thead').show();
   });
   }
// flextable   
}      
flexTable();
window.onresize = function(event) {
    flexTable();
};
// document ready  
});</script>
<hr class="my-5 white">
<?php $url = $content[4]; ?>
<?php endforeach; ?>

<div class="row">
	<div class="col-sm-12"><h4>Komentar (<?php if ($jumlahKomentar) {echo $jumlahKomentar;}else{echo '0';} ?>)</h4></div>
</div>

<?php if ($komentar): ?>
	

<?php foreach ($komentar as $content): ?>
	
<div class="row">
	<div class="col-md-7">
		<div class="card text-dark">
			<h5 class="card-header"><?php echo $content[0]; ?> &nbsp;&nbsp; <?php echo $content[2]; ?></h5>
			<div class="card-body">
		    	<p class="card-text"><?php echo $content[1]; ?></p>
		  	</div>
		</div>
		<br>
	</div>
</div>

<?php endforeach ?>


<?php endif ?>

<hr class="my-5 white">
<div class="row">
<div class="col-md-7">
<form action="<?php echo base_url(); ?>toram/boss/<?php echo $url; ?>#submitted" method="post">
  <div class="form-group">
    <label for="nama">Name <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="var[0]" name="var[0]" placeholder="Nickname" required>
  </div>
  <div class="form-group">
    <label for="komentar">Komentar <span class="text-danger">*</span></label>
    <textarea class="form-control" id="var[1]" name="var[1]" rows="3" required></textarea>
  </div>
  <input type="hidden" id="var[2]" name="var[2]" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y'); ?>" /> 
  <input type="hidden" id="var[3]" name="var[3]" value="<?php echo $url; ?>" />
  <input type="hidden" id="var[4]" name="var[4]" value="" />
  <div class="form-group">
    <label for="komentar">Bahasa inggris pedang ? <span class="text-danger">* satu kata</span></label>
    <input type="text" class="form-control" id="var[5]" name="var[5]" placeholder="Jawaban" required>
  </div>
  <?php if($error2) :?>
    <div class="alert alert-danger" role="alert">
      <?php echo $error2; ?>
  </div>
  <?php endif; ?>
  <?php if($error1) :?>
    <div class="alert alert-danger" role="alert">
      <?php echo $error1; ?>
  </div>
  <?php endif; ?>
  <input class="btn btn-primary" type="submit" value="Post">
</form>
</div>
</div>
<a name="submitted"></a>

<?php }else{ ?>

<center><p>Maaf, Halaman yang anda cari tidak ada :(</p></center>

<?php } ?>	