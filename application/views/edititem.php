
<div class="container" style="font-family: 'open sans';">    
  <div class="row">
    <h3></h3><br><br>
    <?php if ($data_user) { ?>
    	<div class="col-xs-6 col-md-6">
    	<div class="panel panel-default">
	    <div class="panel-heading"><i class="fas fa-cog"></i> Edit Data Buku</div>
	    <div class="panel-body">
	    <?php 
	    if ($this->session->flashdata('test') != '') { ?>
	    <div class="alert alert-success" role="alert">
	    	<?php echo $this->session->flashdata('test'); ?>
	    </div>
		<?php } ?>
	    <?php foreach ($data_user as $info) :?>
	    <form action="http://localhost/toko/validationitem/<?php echo $this->uri->rsegment(3) ?>/<?php echo $this->uri->rsegment(4) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
	    <div class="form-group">
	      <label>Judul Buku</label>
	      <input type="text" name="judul_buku" class="form-control" value="<?php echo set_value('judul_buku'); ?><?php echo $info[1]; ?>" required/>	      
	    </div>
	    <div class="form-group">
	      <label>Harga Buku</label>
	      <input type="text" name="harga_buku" class="form-control" value="<?php echo set_value('harga_buku'); ?><?php echo $info[2]; ?>" required/>	      
	    </div>
	    <div class="form-group">
	      <label>Informasi Buku</label>
	      <textarea name="informasi_buku" class="form-control" value="<?php echo set_value('informasi_buku'); ?><?php echo $info[3]; ?>" required/><?php echo $info[3]; ?></textarea>
	    </div>
    	<div class="form-group">
    	  <div><img style="width: 200px; height: 200px;" src="http://localhost/img/<?php echo $info[5]; ?>" /></div>
	      <label>Ubah Gambar Buku</label>
	      <input type="file" name="gambar_buku" value="<?php echo set_value('gambar_buku'); ?>">
    	</div>
	    <div class="form-group">
	      <label>Stok</label>
	      <input type="text" name="stok" class="form-control" value="<?php echo set_value('stok'); ?><?php echo $info[7]; ?>" required/>	      
	    </div>
	    <div class="form-group">
	      <label>Kategori</label>
	      <select class="form-control" name="kategori_buku" required>
			<option <?php if ($info[8] == 0) {echo "selected";} ?> value="0" disabled>Pilih Kategori</option>
			<?php
			foreach($kategori as $infokategori)
			{
			    ?>
			    <option <?php if ($info[8] == $infokategori[0]) {echo "selected";} ?> value="<?php echo $infokategori[0]; ?>"><?php echo $infokategori[1]; ?></option>
			    <?php
			}
			?>
			</select>      
	    </div>
	    <div class="form-group">
		    <center>
		      <input type="submit" name="register" value="Update" class="btn btn-info" />
		    </center>
		</div>
	    </form>
	    <?php endforeach; ?>
	   </div>
	  </div>
    </div>
	<?php }else{ ?>
		<div class="col-xs-6 col-md-6">
    	<div class="panel panel-default">
	    <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Edit Data Diri</div>
	    <div class="panel-body">
	    <p>Error</p>
	    </div>
	  </div>
    </div>
	<?php } ?>
  </div>
</div>