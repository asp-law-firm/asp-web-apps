<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addModalLabel">Tambah / Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">				
                <form id="form_status" enctype="multipart/form-data" method="POST">
                        <!-- <input type="hidden" name="is_company" value="1"> -->

					<div class="form-group">
						<input type="text" class="form-control" id="id" aria-describedby="id_help" name="id" autocomplete="off" readonly>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" id="name" placeholder="PIC" name="name" autocomplete="off">
					</div>

					<div class="form-group">
						<input type="text" class="form-control" id="instansi" aria-describedby="id_help" name="instansi" autocomplete="off" placeholder="Nama / Perusahaan">
                    </div>

                    <div class="form-group">
						<input type="text" class="form-control" id="job_title" aria-describedby="id_help" name="job_title" autocomplete="off" placeholder="Jabatan">
                    </div>

					<div class="form-group">
						<textarea class="form-control" id="address" name="address" placeholder="Alamat"></textarea>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" id="phone_number" placeholder="No. Handphone" name="phone_number" autocomplete="off">
					</div>

					<div class="form-group">
						<input type="text" class="form-control" id="email" placeholder="Email" name="email" autocomplete="off">
					</div>

					<!-- Total Tagihan -->
					<div class="form-group row">
						<div class="col-sm-3">
							Total Tagihan
						</div>
						<div class="col-sm-9">
							<input class="form-control" type="text" id="amount" name="amount" placeholder="x.xxx.xxx">
						</div>
					</div>

					<!-- Bilyet K -->
					<div class="form-group row">
						<div class="col-sm-3">Permohonan Tagihan</div>
						<div class="col-sm-9">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="permohonan_tagihan2" name="permohonan_tagihan" class="custom-control-input" value="1">
								<label class="custom-control-label" for="permohonan_tagihan2">Available</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="permohonan_tagihan3" name="permohonan_tagihan" class="custom-control-input" value="0">
								<label class="custom-control-label" for="permohonan_tagihan3">Not Available</label>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<label for="permohonan_tagihan" class="col-sm-3 col-form-label"></label>
						<div class="col-sm-9">
							<textarea name="permohonan_tagihan_detail" id="permohonan_tagihan_detail" cols="30" rows="3" class="form-control" placeholder="Permohonan Tagihan Detail"></textarea>
						</div>
					</div>

					<!-- BILYET 5 -->
					<div class="form-group row">
                        <div class="col-sm-3">
                            KTP
                            <small><br><i>* Jika Bukan Badan Hukum</i></small>
                        </div>
						<div class="col-sm-9">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="ktp2" name="ktp" class="custom-control-input" value="1">
								<label class="custom-control-label" for="ktp2">Available</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="ktp3" name="ktp" class="custom-control-input" value="0">
								<label class="custom-control-label" for="ktp3">Not Available</label>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<label for="Bilyet_K" class="col-sm-3 col-form-label"></label>
						<div class="col-sm-9">
							<textarea name="ktp_detail" id="ktp_detail" cols="30" rows="3" class="form-control" placeholder="KTP Detail"></textarea>
						</div>
					</div>

					<!-- KTP -->

					<div class="form-group row">
						<div class="col-sm-3">
                            Surat Kuasa
                            <small><br><i>* Jika Dikuasakan</i></small>
                        </div>
						<div class="col-sm-9">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="power_of_attorney2" name="power_of_attorney" class="custom-control-input" value="1">
								<label class="custom-control-label" for="power_of_attorney2">Available</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="power_of_attorney3" name="power_of_attorney" class="custom-control-input" value="0">
								<label class="custom-control-label" for="power_of_attorney3">Not Available</label>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<label for="Bilyet_K" class="col-sm-3 col-form-label"></label>
						<div class="col-sm-9">
							<textarea name="power_of_attorney_detail" id="power_of_attorney_detail" cols="30" rows="3" class="form-control" placeholder="Surat Kuasa Detail"></textarea>
						</div>
					</div>

					<!-- Bank Evidence -->

					<div class="form-group row">
						<div class="col-sm-3"><small>Fotocopy KTP Pemberi Kuasa</small></div>
						<div class="col-sm-9">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="fc_ktp_owner2" name="fc_ktp_owner" class="custom-control-input" value="1">
								<label class="custom-control-label" for="fc_ktp_owner2">Available</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="fc_ktp_owner3" name="fc_ktp_owner" class="custom-control-input" value="0">
								<label class="custom-control-label" for="fc_ktp_owner3">Not Available</label>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<label for="Bilyet_K" class="col-sm-3 col-form-label"></label>
						<div class="col-sm-9">
							<textarea name="fc_ktp_owner_detail" id="fc_ktp_owner_detail" cols="30" rows="3" class="form-control"
							 placeholder="Fotocopy KTP Pemberi Kuasa Detail"></textarea>
						</div>
					</div>

					<!-- family card -->

					<div class="form-group row">
						<div class="col-sm-3"><small>Fotocopy KTP Penerima Kuasa</small></div>
						<div class="col-sm-9">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="fc_ktp_attorney2" name="fc_ktp_attorney" class="custom-control-input" value="1">
								<label class="custom-control-label" for="fc_ktp_attorney2">Available</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="fc_ktp_attorney3" name="fc_ktp_attorney" class="custom-control-input" value="0">
								<label class="custom-control-label" for="fc_ktp_attorney3">Not Available</label>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<label for="Bilyet_K" class="col-sm-3 col-form-label"></label>
						<div class="col-sm-9">
							<textarea name="fc_ktp_attorney_detail" id="fc_ktp_attorney_detail" cols="30" rows="3" class="form-control" placeholder="Fotocopy KTP Penerima Kuasa Detail"></textarea>
						</div>
					</div>

					<!-- akte_pendirian -->

					<div class="form-group row">
						<div class="col-sm-3">Akte Pendirian</div>
						<div class="col-sm-9">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="akte_pendirian2" name="akte_pendirian" class="custom-control-input" value="1">
								<label class="custom-control-label" for="akte_pendirian2">Available</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="akte_pendirian3" name="akte_pendirian" class="custom-control-input" value="0">
								<label class="custom-control-label" for="akte_pendirian3">Not Available</label>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<label for="Bilyet_K" class="col-sm-3 col-form-label"></label>
						<div class="col-sm-9">
							<textarea name="akte_pendirian_detail" id="akte_pendirian_detail" cols="30" rows="3" class="form-control" placeholder="Akte Pendirian Detail"></textarea>
						</div>
					</div>

					<!-- Passport -->

					<div class="form-group row">
						<div class="col-sm-3"><small>Pengesahan Badan Hukum</small></div>
						<div class="col-sm-9">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="pengesahan_badan_hukum2" name="pengesahan_badan_hukum" class="custom-control-input" value="1">
								<label class="custom-control-label" for="pengesahan_badan_hukum2">Available</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="pengesahan_badan_hukum3" name="pengesahan_badan_hukum" class="custom-control-input" value="0">
								<label class="custom-control-label" for="pengesahan_badan_hukum3">Not Available</label>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<label for="Bilyet_K" class="col-sm-3 col-form-label"></label>
						<div class="col-sm-9">
							<textarea name="pengesahan_badan_hukum_detail" id="pengesahan_badan_hukum_detail" cols="30" rows="3" class="form-control" placeholder="Pengesahan Badan Hukum Detail"></textarea>
						</div>
                    </div>

					<!-- letter bill -->

					<div class="form-group row">
						<div class="col-sm-3"><font size="2">Anggaran Dasar Perseroan</font></div>
						<div class="col-sm-9">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="anggaran_dasar_perseroan2" name="anggaran_dasar_perseroan" class="custom-control-input" value="1">
								<label class="custom-control-label" for="anggaran_dasar_perseroan2">Available</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="anggaran_dasar_perseroan3" name="anggaran_dasar_perseroan" class="custom-control-input" value="0">
								<label class="custom-control-label" for="anggaran_dasar_perseroan3">Not Available</label>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<label for="Bilyet_K" class="col-sm-3 col-form-label"></label>
						<div class="col-sm-9">
							<textarea name="anggaran_dasar_perseroan_detail" id="anggaran_dasar_perseroan_detail" cols="30" rows="3" class="form-control" placeholder="Anggaran Dasar Perseroan Detail"></textarea>
						</div>
                    </div>
                    
                    <div class="form-group row">
						<div class="col-sm-3"><font size="2">Perubahan Pertama</font></div>
						<div class="col-sm-9">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="amandement_12" name="amandement_1" class="custom-control-input" value="1">
								<label class="custom-control-label" for="amandement_12">Available</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="amandement_13" name="amandement_1" class="custom-control-input" value="0">
								<label class="custom-control-label" for="amandement_13">Not Available</label>
							</div>
						</div>
                    </div>
                    
                    <div class="form-group row">
						<div class="col-sm-3"><font size="2">Perubahan Kedua</font></div>
						<div class="col-sm-9">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="amandement_22" name="amandement_2" class="custom-control-input" value="1">
								<label class="custom-control-label" for="amandement_22">Available</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="amandement_23" name="amandement_2" class="custom-control-input" value="0">
								<label class="custom-control-label" for="amandement_23">Not Available</label>
							</div>
						</div>
                    </div>
                    
                    <div class="form-group row">
						<div class="col-sm-3"><font size="2">Perubahan Ketiga</font></div>
						<div class="col-sm-9">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="amandement_32" name="amandement_3" class="custom-control-input" value="1">
								<label class="custom-control-label" for="amandement_32">Available</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="amandement_33" name="amandement_3" class="custom-control-input" value="0">
								<label class="custom-control-label" for="amandement_33">Not Available</label>
							</div>
						</div>
                    </div>
                    
                    <div class="form-group row">
						<div class="col-sm-3">
							<font size="2"></font>
						</div>
						<div class="col-sm-9">
							<textarea name="amandement_detail" id="amandement_detail" cols="30" rows="3" class="form-control" placeholder="Detail Perubahan"></textarea>
						</div>
					</div>

					<!-- Dokumen Tambahan / other_document -->
					<div class="form-group row">
						<div class="col-sm-3">
							<font size="2">Perjanjian Kredit</font>
						</div>
						<div class="col-sm-9">
							<textarea name="perjanjian_kredit_detail" id="perjanjian_kredit_detail" cols="30" rows="3" class="form-control" placeholder="Perjanjian Kredit"></textarea>
						</div>
					</div>

					<!-- Dokumen Tambahan / other_document -->
					<div class="form-group row">
						<div class="col-sm-3">
							<font size="2">Dokumen Tambahan</font>
						</div>
						<div class="col-sm-9">
							<textarea name="other_document" id="other_document" cols="30" rows="3" class="form-control" placeholder="Dokumen Tambahan"></textarea>
						</div>
					</div>					

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary" id="save">Simpan</button>
						<button type="button" class="btn btn-warning" id="update" style="display: none;">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
