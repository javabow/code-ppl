
<div class="container" style="font-family: 'open sans';">    
  <div class="row">
    <h3></h3><br><br>
    <?php if ($data_user) { ?>
    	<div class="col-xs-6 col-md-6">
    	<div class="panel panel-default">
	    <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Edit Data Diri</div>
	    <div class="panel-body">
	    <?php 
	    if ($this->session->flashdata('test') != '') { ?>
	    <div class="alert alert-success" role="alert">
	    	<?php echo $this->session->flashdata('test'); ?>
	    </div>
		<?php } ?>
	    <?php foreach ($data_user as $info) :?>
	    <form method="post" action="/toko/validation">
	    <div class="form-group">
	      <label>Nama Toko</label>
	      <input type="text" name="nama_toko" class="form-control" value="<?php echo set_value('nama_toko'); ?><?php echo $info[1]; ?>" required/>	      
	    </div>
	    <div class="form-group">
	      <label>Alamat Toko</label>
	      <input type="text" name="alamat_toko" class="form-control" value="<?php echo set_value('alamat_toko'); ?><?php echo $info[2]; ?>" required/>	      
	    </div>

	    <div class="form-group">
	      <input type="submit" name="register" value="Update" class="btn btn-info" />
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
	    <?php 
	    if ($this->session->flashdata('test') != '') { ?>
	    <div class="alert alert-danger" role="alert">
	    	<?php echo $this->session->flashdata('test'); ?>
	    </div> 
		<?php } ?>
		<form method="post" action="/toko/validation">
	    <div class="form-group">
	      <label>Nama Toko</label>
	      <input type="text" name="nama_toko" class="form-control" value="<?php echo set_value('nama_toko'); ?>" required/>
	    </div>
	    <div class="form-group">
	      <label>Alamat Toko</label>
	      <input type="text" name="alamat_toko" class="form-control" value="<?php echo set_value('alamat_toko'); ?>" required/>
	    </div>
	    <div class="form-group">
	      <input type="submit" name="register" value="Update" class="btn btn-info" />
	    </div>
	    </form>
	    </div>
	  </div>
    </div>
	<?php } ?>
  </div>
</div>