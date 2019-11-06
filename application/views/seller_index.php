<div class="container">
	<div class="row">
		<h3></h3><br><br>
		<div class="col-xs-12 col-md-7">
		    <div class="panel panel-default">
			    <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Toko Profile</div>
			    <div class="panel-body">
			    	<?php 
				    if ($this->session->flashdata('test') != '') { ?>
				    <div class="alert alert-success" role="alert">
				    	<?php print_r($this->session->flashdata('test')); ?>
				    </div> 
					<?php } ?>
					<?php 
				    if ($this->session->flashdata('gagal') != '') { ?>
				    <div class="alert alert-danger" role="alert">
				    	<?php print_r($this->session->flashdata('gagal')); ?>
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
			    			<img style="width: 100%; height: 250px;" src="http://localhost/img/store-icon.jpg" />
			    		</div>
			    		<div class="col-xs-12 col-md-6">
			    			<div class="row">
			    			<?php if ($data_user) { ?>
			    				<?php foreach ($data_user as $info) :?>
			    				<div style="font-weight: bold;" class="col-xs-12 col-md-12">
			    					Tentang Toko
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					Nama Toko
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					<?php echo $info['1']; ?>
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					Alamat Toko
			    				</div>
			    				<div class="col-xs-6 col-md-6">
			    					<?php echo $info['2']; ?>
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
			    			<button class="btn btn-primary btn-lg" onclick="location.href='http://localhost/toko/edit/<?php echo $this->session->id; ?>'">Edit Profile Toko</button>
			    			</center>
			    		</div>
			    	</div>
			    </div>
			</div>
		</div>
		<div class="col-xs-12 col-md-12">
			<div class="panel panel-default">
			    <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Barang Toko</div>
			    	<div class="panel-body">
			    		<div class="row">
			    			<div style="padding-bottom: 20px;" class="col-xs-12 col-md-12">
			    				<center>
						            <button onclick="window.location.href='http://localhost/toko/additem'" style="background: #337ab7; color: white; width: 35%;" type="button" class="btn btn-primary"><span style="color: white;">Tambah Buku</span>
									</button>
								</center>
			    			</div>
			    				<?php if ($data_book){ ?>
			    					<?php foreach ($data_book as $info) :?>
			    						<div class="col-xs-6 col-md-3">
			    							<a style="text-decoration: none;" href="http://localhost/buku/view/<?php echo $info[4]; ?>">
										        <div style="height: 100%; box-shadow: 0 0 5px gray;" class="thumbnail">
										        	<img style="width: 100%; height: 200px;" src="http://localhost/img/<?php echo $info[5]; ?>" alt="">
										          	<div class="caption">
										            <div class="row">
										            <div style="height: 100px;" class="col-xs-12 col-md-12">
										            <h3 style="font-family: 'open sans'; font-size: 16px; line-height: 19px; font-weight: 600;"><?php echo substr($info['1'], 0, 50); ?>
										            <?php if (strlen($info['1']) > 50) {
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
										            <h4 style="font-weight: 600;">Rp <?php echo $info[2]; ?></h4>
										            </div>
										            <div style="height: 50px; padding-top: 10px;" class="col-xs-5 col-md-5">
										              <span class="glyphicon glyphicon-eye-open"></span>
										              <span>123</span>
										            </div>
										            </div>
										          </div>
										        </div>
									    	</a>
									    	<center>
						                        <button onclick="window.location.href='http://localhost/toko/edititem/<?php echo $info[0]; ?>/<?php echo $info[6]; ?>'" style="background: orange; color: white; width: 50%;" type="button" class="btn btn-primary"><span style="color: white;">Edit</span>
									            </button>
									            <!-- <button onclick="window.location.href='http://localhost/toko/delete/<?php echo $info[0]; ?>'" style="background: red; color: white; width: 50%;" type="button" class="btn btn-primary"><span style="color: white;">Delete</span>
									            </button> -->
									            <button onclick="window.location.href='http://localhost/toko/delete/<?php echo $info[0]; ?>'" style="background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none;"><span style="padding-left: 15px;" class="glyphicon glyphicon-trash"></span></button>
								            </center>
			    						</div>
			    					<?php endforeach; ?>
			    				<?php }else{ ?>
			    					<p>anda belum ada barang</p>
			    				<?php } ?>
			    		</div>
			    	</div>
			    </div>
			</div>
		</div>
	</div>
</div>