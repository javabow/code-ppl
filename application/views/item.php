<?php if ($data_buku) { ?>
  <?php foreach ($data_buku as $konten) :?>
<div class="container" style="font-family: 'open sans';">    
  <div class="row">
    <h3></h3><br><br>
    <div class="col-xs-12 col-md-12">
        <nav style="background: transparent;" aria-label="breadcrumb">
          <ol style="background: transparent;" class="breadcrumb">
            <li class="breadcrumb-item"><a class="black-text" href="#">Home</a></li>
            <li class="breadcrumb-item"><a class="black-text" href="#"><?php if ($nama_kategori): ?>
              
            <?php foreach ($nama_kategori as $key) {echo $key->nama_kategori;} ?><?php endif ?></a></li>
            <li class="breadcrumb-item active"><?php echo $konten[1]; ?></li>
          </ol>
        </nav>
    </div>
    <div class="col-xs-12 col-md-10">
      <div class="row">
        <div class="col-xs-12 col-md-4">
          <img style="width: 300px; height: 300px;" src="http://localhost/img/<?php echo $konten[5]; ?>" />
        </div>
        <div class="col-xs-12 col-md-8">
          <h1 style="font-family: 'Nunito Sans';"><?php echo $konten[1]; ?></h1>
          <div>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            100 ulasan
          </div>
          <div>
            <span style="font-size: 24px; font-weight: 600;">Rp <?php echo $konten[2]; ?></span>
          </div>
          <div class="row">
            <form method="post" action="/cart/add">
            <div class="col-xs-5 col-md-5">
              <div class="form-group">
              <span style="font-weight: bold;">Jumlah</span><br>
              <span>
                <div class="input-group">
                  <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="qty">
                          <span class="glyphicon glyphicon-minus"></span>
                      </button>
                  </span>
                  <input style="text-align: center;" type="text" name="qty" class="form-control input-number" value="1" min="1" max="100">
                  <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="qty">
                          <span class="glyphicon glyphicon-plus"></span>
                      </button>
                  </span>
                </div>
              </span>
              </div>
            </div>
            <div class="col-xs-7 col-md-7">
              <div class="form-group">
              <span style="font-weight: bold;">Catatan Untuk Penjual</span><br>
              <span>
                <input type="text" placeholder="Semisal warna buku atau type buku" name="user_note" class="form-control" value="" />
              </span>
            </div>
            </div>
            <div class="col-xs-12 col-md-12">
              <div class="form-group">
                <input type="hidden" name="user_id" class="form-control" value="<?php echo $this->session->name; ?>" />
              </div>
              <div class="form-group">
                <input type="hidden" name="buku_id" class="form-control" value="<?php echo $konten[0]; ?>" />
              </div>
              <div class="form-group">
                <input type="hidden" name="penjual_id" class="form-control" value="<?php echo $konten[6]; ?>" />
              </div>
              <div class="form-group">
                <input type="hidden" name="harga" class="form-control" value="<?php echo $konten[2]; ?>" />
              </div>
              <div class="form-group">
                <input type="submit" name="cart" value="Add to Cart" class="btn btn-info" />
              </div>
            </div>
            </form>
          </div>
          <div class="row">
            <br>
            <center>
            <div class="col-xs-3 col-md-3">
              <span class="glyphicon glyphicon-eye-open"></span>
              <div>
                <span>Dilihat</span><br>
                <span>123</span>
              </div>
            </div>
            <div class="col-xs-3 col-md-3">
              <span class="glyphicon glyphicon-send"></span>
              <div>
                <span>Terkirim</span><br>
                <span>1000</span>
              </div>
            </div>
            <div class="col-xs-3 col-md-3">
              <span class="glyphicon glyphicon-folder-close"></span>
              <div>
                <span>Kondisi</span><br>
                <span>Baru</span>
              </div>
            </div>
            <div class="col-xs-3 col-md-3">
              <span class="glyphicon glyphicon-lock"></span>
              <div>
                <span>Asuransi</span><br>
                <span>Opsional</span>
              </div>
            </div>
            </center>
          </div>
          <div>
            <br>
            <span style="font-weight: bold;">Ongkos Kirim (Wilayah Jabodetabek)</span><br>
            <span><img style="width: 60px; height: 36px;" src="http://localhost/img/kurir-gosend.png" /> Rp 18000</span><br>
            <span><img style="width: 60px; height: 36px;" src="http://localhost/img/kurir-jne.png" /> Rp 9000</span><br>
            <span><img style="width: 60px; height: 36px;" src="http://localhost/img/kurir-sicepat.png" /> Rp 10000</span><br>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div id="topheader">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                      <li class="active"></li>
                      <li><a href="#info" class="active">Informasi Produk</a></li>
                      <li><a href="#ulasan">Ulasan</a></li>
                      <li><a href="#diskusi">Diskusi Produk</a></li>
                    </ul>
                 </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
      <div class="row">
        <div id="informasi" class="col-xs-12 col-md-12">
          <span>
            <?php echo $konten[3]; ?>
          </span>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-md-2">
      <div class="thumbnail">
        <div class="caption">
          <h5>Penjual</h5>
          Gudang Buku Store
          <a href="#">Visit Store</a>
        </div>
      </div>
      <div class="thumbnail">
        <div class="caption">
          <h5>Dukungan Pengiriman</h5>
          <p><img style="width: 60px; height: 36px;" src="http://localhost/img/kurir-gosend.png" /></p>
          <p><img style="width: 60px; height: 36px;" src="http://localhost/img/kurir-jne.png" /></p>
          <p><img style="width: 60px; height: 36px;" src="http://localhost/img/kurir-sicepat.png" /></p>
<!-- Modal -->
        </div>
      </div>
    </div>
  </div>
</div><br>
  <?php endforeach; ?>
<?php } ?>

              <?php if ($this->session->flashdata('sukses') != '') { ?>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
              <div class="modal-content">
              <div class="alert alert-success" role="alert">
                <center>
                <?php echo $this->session->flashdata('sukses'); ?><br>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </center>
              </div>
              </div>
              </div>
              </div>
              <?php } ?>
              <?php if ($this->session->flashdata('gagal') != '') { ?>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
              <div class="modal-content">  
              <div class="alert alert-danger" role="alert">
                <center>
                <?php echo $this->session->flashdata('gagal'); ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </center>
              </div>
              </div>
              </div>
              </div>
              <?php } ?>

<script>
  
  $('.modal').modal('show');

  $('#reveal').on('click', function() {
    $('ajax-content').hide()
    $('#loadingDiv').show()
    setTimeout(function() {
    $('#loadingDiv').hide()
    }, 1000);
    setTimeout(function() {
    $('#ajax-content').load('http://localhost/cart/plus/11/')
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

  $( '#topheader .navbar-nav a' ).on( 'click', function () {
  $( '#topheader .navbar-nav' ).find( 'li.active' ).removeClass( 'active' );
  $( this ).parent( 'li' ).addClass( 'active' );
  });

  $('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>