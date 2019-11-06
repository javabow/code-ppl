<div class="container">
	<div class="row">
		<h3></h3><br><br>
		<div class="col-xs-12 col-md-7">
		    <div class="panel panel-default">
			    <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->name; ?></div>
			    <div class="panel-body">
			    	<?php 
				    if ($this->session->flashdata('test') != '') { ?>
				    <div class="alert alert-success" role="alert">
				    	<?php echo $this->session->flashdata('test'); ?>
				    </div> 
					<?php } ?>
					<?php 
				    if ($this->session->flashdata('salah') != '') { ?>
				    <div class="alert alert-danger" role="alert">
				    	<?php echo $this->session->flashdata('salah'); ?>
				    </div>
					<?php } ?>
			    	<div class="row">
			    		<div class="col-xs-12 col-md-6">
			    			<img style="width: 100%; height: 250px;" src="http://localhost/img/default-avatar.jpg" />
			    		</div>
			    		<div class="col-xs-12 col-md-6">
			    			<div class="row">
			    			<?php if ($data_user) { ?>
			    				<?php foreach ($data_user as $info) :?>
			    				<div style="font-weight: bold;" class="col-xs-12 col-md-12">
			    					Biodata Diri
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					Nama
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					<?php echo $this->session->name; ?>
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					Tanggal Lahir
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					<?php echo $info['4']; ?>
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					Jenis Kelamin
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					<?php
			    						if ($info['3'] == 1) {
			    							echo "Pria";
			    						}else{
			    							echo "Wanita";
			    						}
			    					?>
			    				</div>
			    				<div style="font-weight: bold;" class="col-xs-12 col-md-12">
			    					<br>Kontak
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					Email
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					<?php echo $this->session->email; ?>
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					Nomor HP
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					<?php echo $info['2']; ?>
			    				</div>
			    				<div style="font-weight: bold;" class="col-xs-12 col-md-12">
			    					<br>Alamat
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					Alamat Lengkap
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					<?php echo $info['0']; ?>
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					Kode Pos
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					<?php echo $info['1']; ?>
			    				</div>
			    				<?php endforeach; ?>
			    			<?php } ?>
			    			</div>
			    		</div>
			    	</div>
			    	<br>
			    	<div class="row">
			    		<div class="col-xs-12 col-md-12">
			    			<center>
			    			<button class="btn btn-primary btn-lg" onclick="location.href='http://localhost/profile/edit/<?php echo $this->session->id; ?>'">Edit Profile</button>
			    			</center>
			    		</div>
			    	</div>
			    </div>
			</div>
		</div>
	</div>
</div>