<div class="container">
  <div class="row">
    <?php $total_price = 0; ?>
    <h3></h3><br><br><br><br>
    <div class="col-xs-12 col-md-8">
            <div class="thumbnail">
              <div class="caption">
                <div style="font-family: 'Open Sans';" class="row">
                  <div class="col-xs-12 col-md-12">
                    <span style="font-size: 20px; font-weight: bold;">Checkout</span>
                  </div>
                  <div class="col-xs-12 col-md-12"><br>
                    <span style="font-weight: bold;">Alamat Pengiriman</span>
                    <hr style="border-top: 1px solid #dbd3d3;" />
                  </div>
                  
                  <?php foreach ($data_user as $info) :?>
                  <div class="col-xs-12 col-md-12">
                    <span style="font-weight: bold;"><?php echo $this->session->userdata('name') ?></span><br>
                    <span><?php echo $info[1]; ?></span><br>
                    <span><?php echo $info[0]; ?></span><br>
                    <span><?php echo $info[2]; ?></span><br>
                    <hr style="border-top: 1px solid #dbd3d3;" />
                  </div>
                  <?php endforeach; ?>
                  <div class="col-xs-12 col-md-12">
          <?php if ($datacart && $array2) { 
          $min = min(count($datacart), count($array2));
          ?>
          <?php $it = new MultipleIterator();
          $it->attachIterator(new ArrayIterator($datacart));
          $it->attachIterator(new ArrayIterator($array2));
          //$it->attachIterator(new ArrayIterator($dataseller));
          ?>
          <?php foreach ($it as $a) :?>
            <?php $total_price = $total_price + $a[0][4]; ?>
                <div class="row">
                  <div class="col-xs-12 col-md-12"> 
                    <span style="text-decoration: none; color: black; font-weight: 700; font-size: 20px;"><?php //echo $a[2]->nama_toko; ?></span>
                  </div>
                  <div class="col-xs-2 col-md-1">
                    <img style="width: 60px; height: 60px;" src="http://localhost/img/<?php echo $a[1][4]; ?>" />
                  </div>
                  <div style="padding-left: 25px;" class="col-xs-10 col-md-11">
                    <span style="text-decoration: none; color: black; font-weight: 700; font-family: 'Open Sans';"><?php echo $a[1][1]; ?></span><br>
                    <span style="color: orange; font-weight: 700; font-family: 'Open Sans';">Rp <?php echo $a[1][2]; ?></span><br>
                    <span><?php echo $a[0][3]; ?> Barang</span>
                  </div>
                </div>
                <br>
          <?php endforeach; ?>
       <?php } ?>
       <?php print_r($it) ?>
                  </div>
                </div>
              </div>
            </div>
    </div>
    <div class="col-xs-12 col-md-4">
      <div class="thumbnail">
        <div class="caption">
          <div style="font-family: 'Open Sans';" class="row">
            <div class="col-xs-12 col-md-12">
              <span style="font-weight: bold;">Detail Belanja</span><hr style="border-top: 1px solid #dbd3d3;" />
            </div>
            <div class="col-xs-6 col-md-6">
              <div style="float: left;"><span>Total Harga (? Produk)</span></div>
            </div>
            <div class="col-xs-6 col-md-6 float-right">
              <div style="float: right;"><span style="font-weight: bold;">Rp <?php echo $total_price; ?></span></div>
            </div>
            <div class="col-xs-6 col-md-6">
              <div style="float: left;"><span>Total Ongkos Kirim</span></div>
            </div>
            <div class="col-xs-6 col-md-6 float-right">
              <div style="float: right;"><span style="font-weight: bold;">Rp <?php echo $total_price; ?></span></div>
            </div>
            <div class="col-xs-12 col-md-12">
              <hr style="border-top: 1px solid #dbd3d3;" />
            </div>
            <div class="col-xs-6 col-md-6">
              <div style="float: left;"><span>Total Tagihan</span></div>
            </div>
            <div class="col-xs-6 col-md-6 float-right">
              <div style="float: right;"><span style="font-weight: bold;">Rp <?php echo $total_price; ?></span></div>
            </div>
            <div class="col-xs-12 col-md-12">
              <hr style="border-top: 1px solid #dbd3d3;" />
            </div>
            <div style="padding-top: 25px;" class="col-xs-12 col-md-12">
              <div><input style="width: 100%;font-weight: bold;" type="submit" name="cart" value="Pilih Pembayaran" class="btn btn-info" /></div>
            </div>
            <div style="padding-top: 25px;" class="col-xs-12 col-md-12">
              <!-- Button trigger modal -->
              <button style="background: orange; color: white; width: 100%;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-ticket"></i> <span style="color: white;">Gunakan Promo Warungbuku</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <center><h2>Gunakan Promo/Kupon</h2></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Sedang dalam pembangunan
      </div>
      <div class="modal-footer">
        <center>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div>
  </div>
</div>
<script>
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