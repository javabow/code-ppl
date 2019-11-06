
<div class="container" style="font-family: 'open sans';">    
  <div class="row">
    <h3></h3><br><br>
    	<div class="col-xs-6 col-md-6">
    	<div class="panel panel-default">
	    <div class="panel-heading"><i class="fas fa-cog"></i> Add Data Buku</div>
	    <div class="panel-body">
	    <?php 
	    if ($this->session->flashdata('test') != '') { ?>
	    <div class="alert alert-success" role="alert">
	    	<?php echo $this->session->flashdata('test'); ?>
	    </div>
		<?php } ?>
		<?php echo form_open_multipart('/toko/validationitem');?>
	    <div class="form-group">
	      <label>Judul Buku</label>
	      <input type="text" name="judul_buku" class="form-control" value="<?php echo set_value('judul_buku'); ?>" required/>	      
	    </div>
	    <div class="form-group">
	      <label>Harga Buku</label>
	      <input type="text" name="harga_buku" class="form-control" value="<?php echo set_value('harga_buku'); ?>" required/>	      
	    </div>
	    <div class="form-group">
	      <label>Informasi Buku</label>
	      <textarea name="informasi_buku" class="form-control" value="<?php echo set_value('informasi_buku'); ?>" required/></textarea>
	    </div>
	    <div class="form-group">
	      <label>Gambar Buku</label>
	      <input type="file" name="gambar_buku" required>
    	</div>
	    <div class="form-group">
	      <label>Stok</label>
	      <input type="text" name="stok" class="form-control" value="<?php echo set_value('stok'); ?>" required/>	      
	    </div>
	    <div class="form-group">
	      <label>Kategori</label>
	      <select class="form-control" name="kategori_buku" required>
			<option selected value="0" disabled>Pilih Kategori</option>
			<?php
			foreach($kategori as $infokategori)
			{
			    ?>
			    <option value="<?php echo $infokategori[0]; ?>"><?php echo $infokategori[1]; ?></option>
			    <?php
			}
			?>
			</select>      
	    </div>
	    <div class="form-group">
		    <center>
		      <input type="submit" name="register" value="Add" class="btn btn-info" />
		    </center>
	    </div>
	    </form>
	   </div>
	  </div>
    </div>
  </div>
</div>