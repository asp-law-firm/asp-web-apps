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
                    <img class="card-img-top" src="<?php echo base_url('assets/img/banner_surat.jpg'); ?>" alt="Card image cap">
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
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">      
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <div class="row">	
        <div class="col">
            <div class="card">
			<style>
				.pdfobject-container { height: 30rem; border: 1px solid rgba(0,0,0,.1); }
			</style>
                <img class="card-img-top" src="<?php echo base_url('assets/img/banner_surat.jpg'); ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="modal-title fn-mob" id="exampleModalLongTitle"><strong><span class="fn-mob" id="news_title"></span></strong></h5>
                    <p class="float-right" ><small><i><?php echo $value->city; ?>, <?php echo date('d F Y', strtotime($value->created_on)); ?></i></small></p><br>
                    <hr>                    
					<p class="card-text fn-mob">
						<p class="fn-mob text-justify" id="news_content"></p>
						Jika Anda tidak dapat membuka surat dibawah, <a href="<?php echo base_url('/assets/docs/surat_undangan_kreditor.pdf') ?>" target="_blank">klik link tulisan ini.</a>
					</p>
					<img src="<?php echo base_url('assets/img/img-190514131540-0001.jpg'); ?>" alt="" class="img-thumbnail" style="margin: 8px">
					<img src="<?php echo base_url('assets/img/img-190514131540-0002.jpg'); ?>" alt="" class="img-thumbnail" style="margin: 8px">
                </div>
            </div>
        </div>
    </div>
	</div>
</div>
</div>

<script src="<?php echo base_url() ?>/assets/js/pdfobject.min.js"></script>
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


	$('#exampleModalLong').on('shown.bs.modal', function () {
		PDFObject.embed("<?php echo base_url('/assets/docs/surat_undangan_kreditor.pdf') ?>", "#pdf_embed");
	})	
</script>
<?php $this->load->view('layouts/footer'); ?>
