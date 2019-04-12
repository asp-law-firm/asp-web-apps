<?php $this->load->view('layouts/header'); ?>
<div id="header" style="margin: 32px;">
    <h1 class="text-center f-size">Berita Terkini Kasus</h1>
    <h4 class="text-center f-size-sub">PT. Solusi Balad Lumampah<br>( dalam PKPU )</h4>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-sm-12 offset-lg-3">
            <a href="<?php echo base_url(); ?>" class="btn btn-block btn-primary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali ke Data Jamaah</a>
        </div>
    </div>
    <?php foreach ( $result as $key => $value ): ?>
        <div class="row" style="margin-top: 16px; margin-bottom: 16px;">
            <div class="col-lg-6 col-sm-12 offset-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8"><h5 class="card-title"><span><?php echo $value->news_title; ?></span></h5></div>
                            <div class="col-4"><span class="float-right"><small><?php echo date('d F Y', strtotime($value->created_on)); ?></span></small></div>
                        </div>
                        <hr>
                        <p class="card-text"><?php echo substr($value->news_desc, 0, 150); ?>.... <a data-toggle="modal" data-target="#exampleModalLong" style="text-decoration: underline; color: blue; cursor: pointer;">Baca Selengkapnya</a></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php echo $this->pagination->create_links(); ?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Judul Berita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Isi Berita
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

</script>
<?php $this->load->view('layouts/footer'); ?>