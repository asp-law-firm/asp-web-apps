<h4 style="text-align: center">TANDA TERIMA TAGIHAN</h4>
<h4 style="text-align: center">PT. Solusi Balad Lumampah ( Dalam PKPU )</h4>
<h4 style="text-align: center">Dan Aom Juang Wibowo Sastra Ningrat ( Dalam PKPU )</h4>

<h4 style="text-align: center">ID <?php echo $id;?></h4>

<table align="left" width="100%" >
	<tr>
		<td colspan="3" style="padding: 4px;">Telah diterima dari : </td>
	</tr>
	<tr>
		<td width="25%" style="padding: 4px;">PIC</td>
		<td width="5%">:</td>
		<td><?php echo $result->name; ?></td>
	</tr>
	<tr>
		<td width="25%" style="padding: 4px;">Nama / Perusahaan</td>
		<td width="5%">:</td>
		<td><?php echo $result->instansi; ?></td>
	</tr>
	<tr>
		<td width="25%" style="padding: 4px;">Jabatan</td>
		<td width="5%">:</td>
		<td><?php echo $result->job_title; ?></td>
	</tr>
	<tr>
		<td width="25%" style="padding: 4px;">Alamat</td>
		<td width="5%">:</td>
		<td><?php echo $result->address; ?></td>
	</tr>
	<tr>
		<td width="25%" style="padding: 4px;">Telp. / HP</td>
		<td width="5%">:</td>
		<td><?php echo $result->phone_number; ?></td>
	</tr>
	<tr>
		<td width="25%" style="padding: 4px;">Total Tagihan</td>
		<td width="5%">:</td>
		<td>Rp. <?php echo number_format($result->amount); ?></td>
	</tr>
</table>

<div style="margin: 8px;"></div>

<table>
	<tr>
		<td style="padding: 4px;" align="justify">
			<font size="4.5">Dokumen - dokumen tagihan Kreditor dalam perkara PKPU PT. Solusi Balad Lumampah ( dalam PKPU ) & Aom Juang Wibowo Sastra Ningrat ( dalam PKPU ) dengan kelengkapan sebagai berikut : </font>
		</td>
	</tr>
</table>

<div style="margin: 16px;"></div>
<table width="100%" border="1" style="border-collapse: collapse">
	<tr>
		<td style="padding: 4px; text-align: center">No.</td>
		<td style="padding: 4px; text-align: center">Nama Dokumen</td>
		<td style="padding: 4px; text-align: center">Checklist</td>
		<td style="padding: 4px; text-align: center">Keterangan</td>
	</tr>

	<?php $no=0; $num=1; ?>
	<?php foreach ( $cetak as $key => $value ): ?>
		<tr>
			<td style="border:1px solid black; text-align: center;"><?php echo ($num <= 8) ? $num : '';?></td>
			<td style="border:1px solid black; padding: 4px"><?php echo $cetak[$no][0]?></td>
			<td style="border:1px solid black"><?php echo $cetak[$no][1] == 1 ? '<center><img width="20" src="'.base_url().'assets/img/check.png"></center>' : ''; ?></td>
			<td style="border:1px solid black"><?php echo $cetak[$no][2]?></td>
		</tr>
	<?php $no++; $num++;?>
	<?php endforeach; ?>
</table>

<div style="margin: 4px;"></div>

<table>
	<tr>
		<td><b>Perjanjian Kredit : </b></td>
	</tr>
	<tr>
		<td style="padding: 6px"><?php echo nl2br($result->perjanjian_kredit_detail); ?></td>
	</tr>
</table>

<div style="margin: 4px;"></div>

<table>
	<tr>
		<td><b>Bukti Tagihan dan Bukti Pendukung : </b></td>
	</tr>
	<tr>
		<td style="padding: 6px"><?php echo nl2br($result->other_document); ?></td>
	</tr>
</table>

<div style="padding-bottom: 32px;"></div>
<h4 style="text-align: center"><font size="7">No. Urut <?php echo $numbering;?></font></h4>

<table width="80%" align="center">
	<tr>
		<td width="50%" align="center">Yang Menerima</td>
		<td width="50%" align="center">Yang Menyerahkan</td>
	</tr>
</table>
<table width="80%" align="center" border="1" style="border-collapse: collapse">
	<tr>
		<td width="50%" style="padding-top: 85px;"></td>
		<td width="50%"></td>
	</tr>
</table>