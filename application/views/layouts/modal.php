<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h1 align="center"><span class="badge" id="status"></span></h1>
                <hr class="divider">
                <div>
                    <!-- ID Jamaah -->
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">ID Jamaah</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="id_jamaah">
                        </div>
                    </div>
                    <!-- Nama -->
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="customer">
                        </div>
                    </div>

                    <!-- Total Tagihan -->
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Total Tagihan</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="total_tagihan">
                        </div>
                    </div>

                    <!-- Status Dikuasakan -->
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Status Dikuasakan</label>
                        <div class="col-sm-8">
                        <span class="badge badge-info"><b><h6 id="badge-kuasa"></h6></b></span>
                        </div>
                    </div>
                </div>
                <hr class="divider">
                <table border="1" style="border-collapse: collapse;" width="100%">
                <thead>
                    <tr>
                        <td width="5%" align="center" rowspan="2">No.</td>
                        <td width="35%" align="center" rowspan="2">Dokumen</td>
                        <td width="20%" align="center" colspan="2">Checklist</td>
                        <td width="40" align="center" rowspan="2">Keterangan</td>
                    </tr>
                    <tr>
                        <td width="10%" align="center">Ada</td>
                        <td width="10%" align="center">Tidak Ada</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Bilyet K</td>
                        <td><div id="bilyet_k_t"></div></td>
                        <td><div id="bilyet_k_f"></div></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Bilyet S</td>
                        <td><div id="bilyet_s_t"></div></td>
                        <td><div id="bilyet_s_f"></div></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>KTP</td>
                        <td><div id="ktp_t"></div></td>
                        <td><div id="ktp_f"></div></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Bukti Setor Bank</td>
                        <td><div id="bank_evidence_t"></div></td>
                        <td><div id="bank_evidence_f"></div></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Kartu Keluarga</td>
                        <td><div id="family_card_t"></div></td>
                        <td><div id="family_card_f"></div></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Kwitansi Pembayaran</td>
                        <td><div id="receipt_t"></div></td>
                        <td><div id="receipt_f"></div></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Passport</td>
                        <td><div id="passport_t"></div></td>
                        <td><div id="passport_f"></div></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Surat Kuasa</td>
                        <td><div id="power_of_attorney_t"></div></td>
                        <td><div id="power_of_attorney_f"></div></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Surat Pengajuan Tagihan</td>
                        <td><div id="letter_bill_t"></div></td>
                        <td><div id="letter_bill_f"></div></td>
                        <td></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>