
	
	<h4 style="text-align: center">TANDA TERIMA TAGIHAN</h4>
	<h4 style="text-align: center">PT. Solusi Balad Lumampah ( Dalam PKPU )</h4>
	<h4 style="text-align: center">Dan Aom Juang Wibowo Sastra Ningrat ( Dalam PKPU )</h4>


	<?php foreach($cetak->result() as $row) { ?>
        <h4 style="text-align: center">ID_<?php echo $row->id;?></h4>
	<?php } ?>
<div style="padding-top: 64px;"></div>
<table style="border:1px solid black;margin-left:auto;margin-right:auto;border-collapse: collapse;" width="100%">
	<thead>
		<tr align="center" style="padding-top: 32px;">
			<td style="border:1px solid black; text-align: center" width="5%" height="20px;">No</td>
			<td style="border:1px solid black; text-align: center" width="30%">Nama Dokumen</td>
			<td style="border:1px solid black; text-align: center" width="13%">Checklist</td>
			<td style="border:1px solid black; text-align: center" width="52%">Keterangan</td>
		</tr>
	</thead>

	<tbody>

		<?php
			foreach($cetak->result() as $row) {
	            $arr[] = array('BILYET K',$row->bilyet_k,$row->bilyet_k_detail);
	            $arr[] = array('BILYET S',$row->bilyet_s,$row->bilyet_s_detail);
				$arr[] = array('KTP',$row->ktp,$row->ktp_detail);
				$arr[] = array('BUKTI SETOR BANK',$row->bank_evidence,$row->bank_evidence_detail);
	            $arr[] = array('KARTU KELUARGA',$row->family_card,$row->family_card_detail);
	            $arr[] = array('KWITANSI PEMBAYARAN',$row->receipt,$row->receipt_detail);
	            $arr[] = array('PASSPORT',$row->passport,$row->passport_detail);
	            $arr[] = array('SURAT KUASA',($row->power_of_attorney == 3) ? 1 : 0,$row->power_of_attorney_detail);
				$arr[] = array('SURAT PENGAJUAN TAGIHAN',$row->letter_bill,number_format($row->letter_bill_detail, 2));
				$arr[] = array('DOKUMEN TAMBAHAN','',$row->other_document);
	        }
		?>
		 
	
		<?php $no=0; $num=0; foreach($arr as $key => $value) { $num++; ?>
			
				<tr>
					<td style="border:1px solid black; text-align: center;"><?php echo $num;?></td>
					<td style="border:1px solid black; padding: 4px;"><?php echo $arr[$no][0]?></td>
					<td style="border:1px solid black;"><?php echo $arr[$no][1] == 1 ? '<center><img width="20" src="'.base_url().'assets/img/check.png"></center>' : ''; ?></td>
					<td style="border:1px solid black; padding: 4px;"><?php echo nl2br($arr[$no][2]); ?></td>
					
				</tr>
		<?php $no++; } ?>
	</tbody>

</table>
<div style="padding-bottom: 32px;"></div>
<h4 style="text-align: center"><font size="7">No. Urut <?php echo $row->numbering;?></font></h4>

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