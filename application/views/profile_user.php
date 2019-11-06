
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
	    <form method="post" action="/profile/validation">
	    <div class="form-group">
	      <label>Tanggal Lahir</label>
	      <input type="text" name="user_ttl" class="form-control" value="<?php echo set_value('user_ttl'); ?><?php echo $info[4]; ?>" required/>
	      
	    </div>
	    <div class="form-group">
	      <label>Jenis Kelamin</label>
	      <input type="text" name="user_jk" class="form-control" value="<?php echo set_value('user_jk'); ?><?php echo $info[3]; ?>" required/>
	      
	    </div>
	    <div class="form-group">
	      <label>Nomor HP</label>
	      <input type="text" name="user_hp" class="form-control" value="<?php echo set_value('user_hp'); ?><?php echo $info[2]; ?>" required/>
	      
	    </div>
	    <div class="form-group">
	      <label>Alamat</label>
	      <input type="text" name="user_alamat" class="form-control" value="<?php echo set_value('user_alamat'); ?><?php echo $info[0]; ?>" required/>
	      
	    </div><div class="form-group">
	      <label>Kode Pos</label>
	      <input type="text" name="user_kp" class="form-control" value="<?php echo set_value('user_kp'); ?><?php echo $info[1]; ?>" required/>
	      
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
		<form method="post" action="/profile/validation">
	    <div class="form-group">
	      <label>Tanggal Lahir</label>
	      <input type="text" name="user_ttl" class="form-control" value="<?php echo set_value('user_ttl'); ?>" required/>
	      <span class="text-danger"><?php echo form_error('user_ttl'); ?></span>
	    </div>
	    <div class="form-group">
	      <label>Jenis Kelamin</label>
	      <input type="text" name="user_jk" class="form-control" value="<?php echo set_value('user_jk'); ?>" required/>
	      <span class="text-danger"><?php echo form_error('user_jk'); ?></span>
	    </div>
	    <div class="form-group">
	      <label>Nomor HP</label>
	      <input type="text" name="user_hp" class="form-control" value="<?php echo set_value('user_hp'); ?>" required/>
	      <span class="text-danger"><?php echo form_error('user_hp'); ?></span>
	    </div>
	    <div class="form-group">
	      <label>Alamat</label>
	      <input type="text" name="user_alamat" class="form-control" value="<?php echo set_value('user_alamat'); ?>" required/>
	      <span class="text-danger"><?php echo form_error('user_alamat'); ?></span>
	    </div><div class="form-group">
	      <label>Kode Pos</label>
	      <input type="text" name="user_kp" class="form-control" value="<?php echo set_value('user_kp'); ?>" required/>
	      <span class="text-danger"><?php echo form_error('user_kp'); ?></span>
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