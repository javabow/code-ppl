<nav aria-label="breadcrumb ">
 
  <ol class="breadcrumb arr-right white-text">
 
    <li class="breadcrumb-item "><a href="/" class="text-light">Home</a></li>

    <li class="breadcrumb-item text-light active" aria-current="page">Toram</li>
 
  </ol>
 
</nav>

<center><h4>Toram Online</h4></center>
<p>
Toram Online adalah sequel dari pendahulunya yaitu Iruna, dikembangkan oleh Asobimo dimana game ini memiliki free class system, jadi kamu bisa secara bebas memilih skill apa saja yang kamu inginkan tanpa lock weapon system.
</p>

<p>Website ini punya cukup banyak guide yang bisa membantu para player yang lama maupun player baru untuk lebih paham mengenai sistem dan pastinya beberapa tips dalam game toram ini.</p>

<p>Karena author merupakan pengguna bow jadi guide untuk build akan lebih fokus kearah weapon bow, All hail Cross Fire !!!</p>

<p>Kalian bisa bisa menggunakan menu yang tersedia untuk menuju ke halaman masing-masing artikel yang ada di blog ini.</p>

<center><h4>Artikel Terbaru</h4></center>
<hr class="my-3 white">
<div class="row">
<?php
	$count=0;
	foreach ($latestArtikel as $content) :
	?>
	<div class="col d-flex justify-content-center pt-4">
		<div class="card text-dark" style="width: 18rem; height: 300px;">
			<a href="<?php echo base_url(); ?>toram/<?php echo $content->type; ?>/<?php echo $content->url; ?>">
	 		<img class="card-img-top img-thumbnail" style="width: 100%; height: 200px;" src="https://www.javabow.com/img/<?php echo $content->image;?>" alt="Card image cap">
	  		<div class="card-body">
	    		<h5 class="card-title"><?php echo $content->judul;?></h5>
	    		</a>
	  		</div>
		</div>
	<br>
</div>
<?php endforeach; ?>