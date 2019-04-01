<style>
    table.table-bordered.dataTable th:last-child, table.table-bordered.dataTable th:last-child, 
    table.table-bordered.dataTable td:last-child, table.table-bordered.dataTable td:last-child {
        text-align: center;
        vertical-align: middle;
    }

    table.table-bordered.dataTable th, table.table-bordered.dataTable th, table.table-bordered.dataTable td, table.table-bordered.dataTable td {
        
        vertical-align: middle;
    }
</style>

<div id="tab-alert"></div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <?php echo $title; ?>
    </h1>
</div>

<button class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addModal">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Data</span>
</button>
<hr class="divider">

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="mytable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="2%">No</th>
                        <th width="15%">Nama</th>
                        <th width="15%">PIC</th>                        
                        <th width="10%">Jabatan</th>
                        <th width="15%">Alamat</th>
                        <th width="10%">No. Handphone</th>
                        <th width="10%">Email</th>
                        <th width="10%">Tagihan</th>
                        <th width="8%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view($form, array('action' => $action)); ?>

<script type="text/javascript">

    $(document).ready(function () {

        $('#amount').number(true);
        $('#amount').ForceNumericOnly();
        $('#phone_number').ForceNumericOnly();

        $('#form_status').on('submit', function(e) {
            e.preventDefault();         
            $.ajax({
                type: 'POST',
                url: '<?php echo $action; ?>',
                data: $(this).serialize(),
            })
            .done(function(result) {
                $('#addModal').modal('toggle');
                
                if(!result.error) {
                    $('#tab-alert').append(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>${result.data} </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`);
                } else {
                    $('#tab-alert').append(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>${result.data} </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`);
                }
                setTimeout(() => {
                    $('.alert').alert('close');
                }, 1500);
            })
        });

        loadDatatablesProperty();        
        var table = $("#mytable").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                    .off('.DT')
                    .on('input.DT', function() {
                        api.search(this.value).draw();
                });
            },
            oLanguage: {
                sProcessing: "Loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {
                "url": "<?php echo $getData; ?>", 
                "type": "POST"
            },            
            columns: [
                {"data": "numbering"},
                {"data": "instansi"},
                {"data": "name"},
                {"data": "job_title"},
                {"data": "address"},
                {"data": "phone_number"},
                {"data": "email"},
                {"data": "amount", render: $.fn.dataTable.render.number(',', '.', '')},
                {
                    "data": "id",
                    render: function (data, type, row) {
                        let button =`
                            <?php if($this->session->userdata('role') == '99'): ?>
                                <button onclick="deleteData('${data}')" class="btn btn-danger btn-circle btn-sm" title="Hapus Data"><i class="fas fa-trash"></i></button>
                            <?php endif; ?>
                            <button onclick="editData('${data}')" class="btn btn-warning btn-circle btn-sm" title="Ubah Data"><i class="fas fa-pen"></i></button>
                            <a target="_blank" href="<?php echo $cetak_pe; ?>/${data}" class="btn btn-info btn-circle btn-sm" title="Cetak Tanda Terima"><i class="fas fa-print"></i></a>
                            `;
                        return button;
                    }
                }
            ],
            order: [[0, 'asc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                $('td:eq(0)', row).html();
            }
        });
    }); 

    $('#update').on('click', function(e) {
        let data = $('#form_status').serialize();
        $.ajax({
            type: 'POST',
            url: '<?php echo $update; ?>',
            data: { id: $('#id').val(), data: data }
        })
        .done(function(result) {
            $('#addModal').modal('toggle');
            if(!result.error) {
                $('#tab-alert').append(`
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>${result.data} </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`);
            } else {
                $('#tab-alert').append(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>${result.data} </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`);
            }
            setTimeout(() => {
                $('.alert').alert('close');
            }, 1500);
        });
    })

    $('#addModal').on('hidden.bs.modal', function(e) {
        $('#mytable').DataTable().ajax.reload();
        $('#form_status').trigger('reset');
        $('#save').css('display', 'block');
        $('#update').css('display', 'none');

        $('#address').text('');
        $('#permohonan_tagihan_detail').text('');
        $('#ktp_detail').text('');
        $('#power_of_attorney_detail').text('');
        $('#fc_ktp_owner_detail').text('');
        $('#fc_ktp_attorney_detail').text('');
        $('#akte_pendirian_detail').text('');
        $('#pengesahan_badan_hukum_detail').text('');
        $('#anggaran_dasar_perseroan_detail').text('');
        $('#amandement_detail').text('');
        $('#other_document').text('');
        $('#perjanjian_kredit_detail').text('');
    })

    $('#addModal').on('show.bs.modal', function(e) {
        let currentDate = new Date();
        let dateTime    = 
            currentDate.getDate() + '.' +
            (currentDate.getMonth() + 1) + '.' +
            currentDate.getFullYear() + '.' +
            currentDate.getHours() + '.' +
            currentDate.getMinutes() + '.' + 
            currentDate.getSeconds();

        $('#id').val(dateTime);
    });

    function deleteData(data) {
        $.confirm({
            title: 'Confirm!',
            content: 'Yakin Akan Menghapus Data ini ?!',
            buttons: {
                confirm: function () {
                    $.alert('Confirmed!');
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $delete?>',
                        data: { id: data },
                    })
                    .done(function(result) {
                        $('#mytable').DataTable().ajax.reload();

                        if(!result.error) {
                            $('#tab-alert').append(`
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>${result.data} </strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>`);
                        } else {
                            $('#tab-alert').append(`
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>${result.data} </strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>`);
                        }
                        setTimeout(() => {
                            $('.alert').alert('close');
                        }, 1500);
                    })
                },
                cancel: function () {
                    $.alert('Canceled!');
                },
            }
        });
    }

    function editData(data) {
        $.ajax({
            type: 'POST',
            url: '<?php echo $edit; ?>',
            data: { id: data },
        })
        .done(function(result) {            
            $('#addModal').modal('toggle');
            $('#save').css('display', 'none');
            $('#update').css('display', 'block');
            $('#id').val(result.data[0].id);

            // Field Text
            $('#name').val(result.data[0].name);
            $('#instansi').val(result.data[0].instansi);
            $('#job_title').val(result.data[0].job_title);
            $('#phone_number').val(result.data[0].phone_number);
            $('#email').val(result.data[0].email);
            
            // Textarea
            $('#address').text(decodeURI(result.data[0].address));
            $('#permohonan_tagihan_detail').text(decodeURI(result.data[0].permohonan_tagihan_detail));
            $('#ktp_detail').text(decodeURI(result.data[0].ktp_detail));
            $('#power_of_attorney_detail').text(decodeURI(result.data[0].power_of_attorney_detail));
            $('#fc_ktp_owner_detail').text(decodeURI(result.data[0].fc_ktp_owner_detail));
            $('#fc_ktp_attorney_detail').text(decodeURI(result.data[0].fc_ktp_attorney_detail));
            $('#akte_pendirian_detail').text(decodeURI(result.data[0].akte_pendirian_detail));
            $('#pengesahan_badan_hukum_detail').text(decodeURI(result.data[0].pengesahan_badan_hukum_detail));
            $('#anggaran_dasar_perseroan_detail').text(decodeURI(result.data[0].anggaran_dasar_perseroan_detail));
            $('#amandement_detail').text(decodeURI(result.data[0].amandement_detail));
            $('#other_document').text(decodeURI(result.data[0].other_document));
            $('#perjanjian_kredit_detail').text(decodeURI(result.data[0].perjanjian_kredit_detail));

            // Radio Button
            $("input[name='address'][value='"+result.data[0].address+"']").prop('checked', 1);
            $("input[name='permohonan_tagihan'][value='"+result.data[0].permohonan_tagihan+"']").prop('checked', 1);
            $("input[name='ktp'][value='"+result.data[0].ktp+"']").prop('checked', 1);
            $("input[name='power_of_attorney'][value='"+result.data[0].power_of_attorney+"']").prop('checked', 1);
            $("input[name='fc_ktp_owner'][value='"+result.data[0].fc_ktp_owner+"']").prop('checked', 1);
            $("input[name='fc_ktp_attorney'][value='"+result.data[0].fc_ktp_attorney+"']").prop('checked', 1);
            $("input[name='akte_pendirian'][value='"+result.data[0].akte_pendirian+"']").prop('checked', 1);
            $("input[name='pengesahan_badan_hukum'][value='"+result.data[0].pengesahan_badan_hukum+"']").prop('checked', 1);
            $("input[name='anggaran_dasar_perseroan'][value='"+result.data[0].anggaran_dasar_perseroan+"']").prop('checked', 1);
            $("input[name='amandement_1'][value='"+result.data[0].amandement_1+"']").prop('checked', 1);
            $("input[name='amandement_2'][value='"+result.data[0].amandement_2+"']").prop('checked', 1);
            $("input[name='amandement_3'][value='"+result.data[0].amandement_3+"']").prop('checked', 1);
            $("input[name='other_document'][value='"+result.data[0].other_document+"']").prop('checked', 1);
            $("input[name='perjanjian_kredit'][value='"+result.data[0].perjanjian_kredit+"']").prop('checked', 1);
        })
    }
</script>