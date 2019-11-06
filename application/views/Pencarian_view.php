<?php $keyword = $_GET['cari']; ?>
<center><h3>Hasil pencarian: <span class="text-danger"><?php echo $keyword; ?></span></h3></center>
<hr class="my-3 white">
			    			<div style="padding-bottom: 20px" class="col-xs-12 col-md-12">
			    				<center>
						            <button onclick="window.location.href='http://localhost/toko/additem'" style="background: #337ab7; color: white; width: 35%;" type="button" class="btn btn-primary"><span style="color: white;">Tambah Buku</span>
									</button>
								</center>
			    			</div>
			    				<?php if ($cari){ ?>
			    					<?php foreach ($cari as $info) :?>
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
								            </center>
			    						</div>
			    					<?php endforeach; ?>
			    				<?php }else{ ?>
			    					<p>anda belum ada barang</p>
			    				<?php } ?>
			    		</div>