<?php $this->load->view('layouts/header'); ?>

<body>
  <div id="header" style="margin: 32px;">
    <h1 class="text-center">Data Jamaah Travel</h1>
    <h4 class="text-center">PT. Solusi Balad Lumampah ( dalam PKPU )</h4>
  </div>
  <div class="container" style="margin-top: 8px;">
    <div class="row">
      <div class="col-lg-6 col-sm-12 offset-lg-3">
        <input type="text" class="form-control" id="condition">
        <button class="btn btn-block btn-secondary" style="margin-top: 8px;">Cari</button>
      </div>
    </div>

    <div class="row">

    </div>
  </div>
</div>

<?php $this->load->view('layouts/footer'); ?>

<script type="text/javascript">
  $(document).ready(function() {
    let list_jamaah = [];

    $.ajax({
      url: '<?php echo $load; ?>',
      dataType
    })
  })
</script>

</body>

</html>
