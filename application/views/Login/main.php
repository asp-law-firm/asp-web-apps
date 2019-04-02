<?php $this->load->view('layouts/header'); ?>

<style>
  @-webkit-keyframes rotating {
      from{
          -webkit-transform: rotate(0deg);
      }
      to{
          -webkit-transform: rotate(360deg);
      }
  }

  .rotating {
      -webkit-animation: rotating 2s linear infinite;
  }

  /* Clearable text inputs */
  .clearable input[type=text]{
    padding-right: 24px;
    width: 100%;
    box-sizing: border-box;
  }
  .clearable__clear{
    display: none;
    position: absolute;
    right:0; top:7px;
    padding: 0 20px;
    font-style: normal;
    font-size: 1.2em;
    user-select: none;
    cursor: pointer;
  }
  .clearable input::-ms-clear {  /* Remove IE default X */
    display: none;
  }

  @media only screen and (max-device-width : 640px) {
    /* Styles */
    .f-size {
      font-size: 22px;
    }

    .f-size-sub {
      font-size: 18px;
    }

    ::placeholder {
      font-size: 12px;
    }
  }

</style>

<body>
  <div id="header" style="margin: 32px;">
    <h1 class="text-center f-size">Data Jamaah Travel</h1>
    <h4 class="text-center f-size-sub">PT. Solusi Balad Lumampah<br>( dalam PKPU )</h4>
  </div>
  <div class="container" style="margin-top: 8px;">
    <div class="row">
      <div class="col-lg-6 col-sm-12 offset-lg-3">
      <span class="clearable">
        <input type="text" id="condition" class="form-control" placeholder="Masukan No. Urut / KTP / Nama / Alamat / Kuasa">
        <i class="clearable__clear"><i class="fas fa-times-circle"></i></i>
      </span>
        <button class="btn btn-block btn-secondary" style="margin-top: 8px;" onclick="checkData()">Cari</button>
      </div>
    </div>

    <div class="container" style="margin-top: 32px; display: none;" id="container-animation">
      <div class="row">
        <div class="col-lg-6 col-sm-12 offset-lg-3 text-center">
          <div id="spinner" class="mx-auto">
            <img src="<?php echo base_url('assets/img/spinner_fidget.png'); ?>" alt="" width="75" height="75" class="rotating">
          </div>
          <h4>Memeriksa Data ...</h4>
        </div>
      </div>
    </div>    

    <div id="container-jamaah">
    </div>    
  </div>
</div>

<?php $this->load->view('layouts/footer'); ?>

<script type="text/javascript">

  $(document).ready(function() {
    let list_jamaah = [];
    $('#condition').val('');

    $(".clearable").each(function() {
  
      var $inp = $(this).find("input:text"),
          $cle = $(this).find(".clearable__clear");

      $inp.on("input", function(){
        $cle.toggle(!!this.value);
      });
  
      $cle.on("touchstart click", function(e) {
        e.preventDefault();
        $inp.val("").trigger("input");

        $('#container-jamaah').empty();
      });
  
});
  })

  function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
  }

  function cardJamaah(nama, tagihan, address, no_urut, kuasa) {
    let card = `<div class="row" id="card-jamaah" style="margin-top: 8px;">
      <div class="col-lg-6 col-sm-12 offset-lg-3">
        <div class="card">
          <div class="card-header">
            <b>${nama}</b>
            <span class="float-right">No. Urut - ${no_urut}</span>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-3">Kuasa</div>
              <div class="col-9"><p class="card-text">${kuasa}.</p></div>
            </div>            
            <div class="row">
              <div class="col-3">Alamat</div>
              <div class="col-9"><p class="card-text">${address}.</p></div>
            </div>
            <div class="row">
              <div class="col-3">Tagihan</div>
              <div class="col-9"><h5 class="card-title"><b>Rp. ${formatNumber(tagihan)} </b></h5></div>
            </div>
          </div>
        </div>
      </div>
    </div>`

    return card;
  }

  function cardNull(msg) {
    let card = `<div class="row" id="card-jamaah" style="margin-top: 8px;">
      <div class="col-lg-6 col-sm-12 offset-lg-3">
        <div class="card">
          <div class="card-body text-center">
            <i class="fas fa-exclamation-triangle fa-3x"></i>
            <h3 style="margin-top: 4px;">${msg}</h3>
          </div>
        </div>
      </div>
    </div>`

    return card;
  }

  function checkData() {
    $('#container-jamaah').empty();
    $('#container-animation').fadeIn();
    let condition = $('#condition').val();

    if(condition.length == 0) {
      $('#container-animation').fadeOut();
      $('#container-jamaah').prepend(cardNull('Kata Kunci Tidak Boleh Kosong'));
    } else {
      $.ajax({
        url: '<?php echo $load; ?>',
        dataType: 'json',
        type: 'GET',
        data: { param: condition }
      })
      .done(function(res) {
        $('#container-animation').fadeOut();
        if (res.length > 0) {
          $.map(res, function(item) {
            $('#container-jamaah').prepend(cardJamaah(item.customer, item.amount, item.c_address, item.numbering, item.power_of_attorney_detail));
          })
        } else {
          $('#container-jamaah').prepend(cardNull('Data Tidak Ditemukan'));
        }
      }); 
    }
  }    
</script>

</body>

</html>
