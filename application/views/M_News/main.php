<?php $this->load->view('layouts/header'); ?>
<div id="header" style="margin: 32px;">
    <h1 class="text-center f-size">Berita Terkini Kasus</h1>
    <h4 class="text-center f-size-sub">PT. Solusi Balad Lumampah<br>( dalam PKPU )</h4>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-sm-12 offset-lg-3">
            <a href="<?php echo base_url(); ?>" class="btn btn-block btn-primary fn-mob"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali ke Data Jamaah</a>
        </div>
    </div>
    <?php foreach ( $result as $key => $value ): ?>
        <div class="row" style="margin-top: 16px; margin-bottom: 16px;">
            <div class="col-lg-6 col-sm-12 offset-lg-3">
                <div class="card">
                    <img class="card-img-top" src="http://cdn2.tstatic.net/jabar/foto/bank/images/jajaran-pt-solusi-balad-lumampah-sbl_20171116_160445.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title fn-mob"><strong><span><?php echo $value->news_title; ?></span></strong></h5>
                        <hr>
                        <p class="card-text fn-mob"><?php echo substr($value->news_desc, 0, 150); ?>.... <a data-toggle="modal" data-news-id="<?php echo $value->id?>" data-target="#exampleModalLong" style="text-decoration: underline; color: blue; cursor: pointer;">Baca Selengkapnya</a></p>
                    </div>
                    <div class="card-footer">
                        <span class="float-right fn-mob">
                            <small><i><?php echo $value->city; ?>, <?php echo date('d F Y', strtotime($value->created_on)); ?></i></small>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php echo $this->pagination->create_links(); ?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fn-mob" id="exampleModalLongTitle"><strong><span class="fn-mob" id="news_title"></span></strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body fn-mob">
          <div class="row" style="margin: 4px">
              <div class="col">
                <img src="http://cdn2.tstatic.net/jabar/foto/bank/images/jajaran-pt-solusi-balad-lumampah-sbl_20171116_160445.jpg" alt="pt_sbl" width="300px" style="position: relative;">
              </div>
          </div>
          <div class="row" style="margin: 4px">
                <div class="col">
                    <p class="fn-mob text-justify" id="news_content"></p>
                </div>
          </div>                  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary fn-mob" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $('#exampleModalLong').on('show.bs.modal', function(e) {
        let news_id = $(e.relatedTarget).data('news-id');
        $.ajax({
            url: '<?php echo $load; ?>', 
            dataType: 'json', 
            data: {id: news_id}
        }).done(function(result) {
            $(e.currentTarget).find('#news_title').text(result.data[0].news_title);
            $(e.currentTarget).find('#news_content').text(result.data[0].news_desc);
        });
    })
</script>
<?php $this->load->view('layouts/footer'); ?>