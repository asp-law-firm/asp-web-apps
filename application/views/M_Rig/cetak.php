<table align="left">
    <tr>
        <td><b><font size="5">No. Urut <?php echo $numbering; ?></font></b></td>
    </tr>
</table>

<table align="right">
    <tr>
        <td><font size="3">Jakarta, <?php echo $date; ?></font></td>
    </tr>
</table>

<table align="left" style="padding-top: 8px; padding-bottom: 8p;">
    <tr>
        <td><font size="3">Kepada Yth,</font></td>
    </tr>
    <tr>
        <td><font size="3">Pengurus PT. Solusi Balad Lumampah ( Dalam PKPU ) & Aom Juang Wibowo ( Dalam PKPU )</font></td>
    </tr>
    <tr>
        <td><font size="3">d/a Kantor Hukum "Arifudin & Susanto Partnership" </font></td>
    </tr>
    <tr>
        <td><font size="3">The H Tower, 15 Th Floor, Unit 15 - F Jl. H.R Rasuna Said Kav. 20, Karet Kuningan</font></td>
    </tr>
    <tr>
        <td><font size="3">Jakarta Selatan</font></td>
    </tr>
</table>

<table align="left" style="padding-top: 8px;">
    <tr>
        <td>Perihal: </td>
        <td><h3>Surat Pengajuan Tagihan</h3></td>
    </tr>
</table>

<table align="left" style="padding-top: 8px; padding-bottom: 8p;">
    <tr>
        <td style="padding: 4px;"><font size="3">Dengan Hormat, </font></td>
    </tr>
    <tr>
        <td style="padding: 4px;"><font size="3">Saya yang bertanda tangan dibawah ini :</font></td>
    </tr>
    <tr>
        <td style="padding: 4px;"><font size="3">Nama</font></td>
        <td width="2">:</td>
        <td style="padding: 4px;"><font size="3"><?php echo $name; ?></font></td>
    </tr>
    <tr>
        <td style="padding: 4px;"><font size="3">ID Jamaah</font></td>
        <td width="2">:</td>
        <td style="padding: 4px;"><font size="3"><?php echo $id_jamaah; ?></font></td>
    </tr>
    <tr>
        <td style="padding: 4px;"><font size="3">Tempat / Tanggal Lahir</font></td>
        <td width="2">:</td>
        <td style="padding: 4px;"><font size="3"> <?php echo $birth_city; ?>, <?php echo $birth_date; ?></font></td>
    </tr>
    <tr>
        <td style="padding: 4px;"><font size="3">Alamat</font></td>
        <td width="2">:</td>
        <td style="padding: 4px;"><font size="3"><?php echo nl2br($c_address); ?></font></td>
    </tr>
    <tr>
        <td style="padding: 4px;"><font size="3">No. Handphone</font></td>
        <td width="2">:</td>
        <td style="padding: 4px;"><font size="3"><?php echo nl2br($phone_number); ?></font></td>
    </tr>
    <tr>
        <td style="padding: 4px;"><font size="3">Email</font></td>
        <td width="2">:</td>
        <td style="padding: 4px;"><font size="3"><?php echo $email; ?></font></td>
    </tr>
</table>

<table align="left" style="padding-top: 8px; align: justify">
    <tr>
        <td><font style="line-height: 1.5;">Dengan ini mengajukan tagihan kepada Pengurus PT. Solusi Balad Lumampah ( Dalam PKPU ) & Aom Juang Wibowo ( Dalam PKPU ) sebesar <b>Rp. <?php echo (!empty($nominal)) ? number_format($nominal, 2) : 0; ?></b> yang berdasarkan Bukti Transfer Bank / Kwitansi / Lainnya</font></td>
    </tr>
</table>

<table align="left" style="padding-top: 16px;">
    <tr>
        <td>Bersama ini kami lampirkan bukti pendukung berupa : </td>
    </tr>
</table>

<div style="margin-bottom: 10px;"></div>

<table border="1" style="border-collapse: collapse;" align="center" width="100%">
    <tr align="center" style="padding-top: 32px;">
        <td style="border:1px solid black; text-align: center" width="5%" height="20px;">No</td>
        <td style="border:1px solid black; text-align: center" width="30%">Nama Dokumen</td>
        <td style="border:1px solid black; text-align: center" width="13%">Checklist</td>
        <td style="border:1px solid black; text-align: center" width="52%">Keterangan</td>
    </tr>
    <tr>
        <td>1</td>
        <td>BILYET K </td>
        <td style="border:1px solid black"><?php echo $bilyet_k == 1 ? '<center><img width="20" src="'.base_url().'assets/img/check.png"></center>' : ''; ?></td>
        <td style="border:1px solid black; padding: 4px;"><?php echo nl2br($bilyet_k_detail); ?></td>
    </tr>

    <tr>
        <td>2</td>
        <td>BILYET S </td>
        <td style="border:1px solid black"><?php echo $bilyet_s == 1 ? '<center><img width="20" src="'.base_url().'assets/img/check.png"></center>' : ''; ?></td>
        <td style="border:1px solid black; padding: 4px;"><?php echo nl2br($bilyet_s_detail); ?></td>
    </tr>

    <tr>
        <td>3</td>
        <td>KTP </td>
        <td style="border:1px solid black"><?php echo $ktp == 1 ? '<center><img width="20" src="'.base_url().'assets/img/check.png"></center>' : ''; ?></td>
        <td style="border:1px solid black; padding: 4px;"><?php echo nl2br($ktp_detail); ?></td>
    </tr>

    <tr>
        <td>4</td>
        <td>Bukti Setor Bank</td>
        <td style="border:1px solid black"><?php echo $bank_evidence == 1 ? '<center><img width="20" src="'.base_url().'assets/img/check.png"></center>' : ''; ?></td>
        <td style="border:1px solid black; padding: 4px;"><?php echo nl2br($bank_evidence_detail); ?></td>
    </tr>

    <tr>
        <td>5</td>
        <td>Kartu Keluarga </td>
        <td style="border:1px solid black"><?php echo $family_card == 1 ? '<center><img width="20" src="'.base_url().'assets/img/check.png"></center>' : ''; ?></td>
        <td style="border:1px solid black; padding: 4px;"><?php echo nl2br($family_card_detail); ?></td>
    </tr>

    <tr>
        <td>6</td>
        <td>Kwitansi Pembayaran </td>
        <td style="border:1px solid black"><?php echo $receipt == 1 ? '<center><img width="20" src="'.base_url().'assets/img/check.png"></center>' : ''; ?></td>
        <td style="border:1px solid black; padding: 4px;"><?php echo nl2br($receipt_detail); ?></td>
    </tr>

    <tr>
        <td>7</td>
        <td>Passport </td>
        <td style="border:1px solid black"><?php echo $passport == 1 ? '<center><img width="20" src="'.base_url().'assets/img/check.png"></center>' : ''; ?></td>
        <td style="border:1px solid black; padding: 4px;"><?php echo nl2br($passport_detail); ?></td>
    </tr>

    <tr>
        <td>8</td>
        <td>Surat Kuasa </td>
        <td style="border:1px solid black"><?php echo $power_of_attorney == 3 ? '<center><img width="20" src="'.base_url().'assets/img/check.png"></center>' : ''; ?></td>
        <td style="border:1px solid black; padding: 4px;"><?php echo nl2br($power_of_attorney_detail); ?></td>
    </tr>

    <tr>
        <td>9</td>
        <td>Surat Pengajuan Tagihan </td>
        <td style="border:1px solid black"><?php echo $letter_bill == 1 ? '<center><img width="20" src="'.base_url().'assets/img/check.png"></center>' : ''; ?></td>
        <td style="border:1px solid black; padding: 4px;"><?php echo (!empty($letter_bill_detail)) ? number_format($letter_bill_detail, 2) : '-'; ?></td>
    </tr>

    <tr>
        <td>10</td>
        <td>Dokumen Tambahan </td>
        <td style="border:1px solid black"></td>
        <td style="border:1px solid black; padding: 4px;"><?php echo nl2br($other_document); ?></td>
    </tr>
</table>

<div style="margin-top: 32px;"></div>
<table align="right">
	<tr>
		<td width="75%">Hormat Kami, </td>
	</tr>
</table>
<table align="right" width="25%" style="border-collapse: collapse" border="1" height="5%">
    <tr>
        <td style="padding-top: 75px"></td>
    </tr>
</table>