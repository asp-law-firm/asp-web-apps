<table align="cener" width="100%">
    <tr>
        <td align="center"><b><h3>DAFTAR Non - JAMAAH</h3></b></td>
    </tr>
    <tr>
        <td align="center"><h2>PT. Solusi Balad Lumampah ( Dalam PKPU )</h2></td>
    </tr>
    <tr>
        <td align="center"><h2>dan Aom Juang Wibowo ( Dalam PKPU ) </h2></td>
    </tr>
</table>

<div style="margin: 8px"></div>

<table align="center" border="1" style="border-collapse: collapse;" width="100%">
    <tr>
        <th width="5%">No. </th>
        <th width="10%">Instansi</th>
        <th width="20%">Alamat</th>
        <th width="15%">PIC</th>
        <th width="13%">Telepon</th>
        <th width="15%">Kuasa</th>
        <th width="22%" colspan="2">Total Tagihan</th>
    </tr>
    <?php $no = 1; $sumAmount = 0;?>
    <?php foreach ( $data->result() as $key => $value ): ?>
    <tr>
        <td align="center"><?php echo $value->numbering; ?></td>
        <td align="left" style="padding: 4px;"><?php echo $value->instansi; ?></td>
        <td align="left" style="padding: 4px;"><?php echo $value->address; ?></td>
        <td align="left" style="padding: 4px;"><?php echo $value->name; ?></td>
        <td align="left" style="padding: 4px;"><?php echo $value->phone_number; ?></td>
        <td align="<?php echo (empty($value->power_of_attorney_detail)) ? 'center' : 'left'; ?>" style="padding: 4px;"><?php echo (empty($value->power_of_attorney_detail)) ? '-' : $value->power_of_attorney_detail; ?></td>
        <td style="padding: 4px; border-right: 0px; " width="4%";>
            Rp.
        </td>
        <td style="padding: 4px; border-left: 1px;" align="right">
            <?php echo number_format($value->amount); ?>
        </td>
    </tr>
    <?php $sumAmount += $value->amount; $no++; ?>
    <?php endforeach; ?>
    <tr>
        <td colspan="6">Total</td>
        <td style="padding: 4px; border-right: 0px; " width="4%";>
            Rp.
        </td>
        <td style="padding: 4px; border-left: 1px;" align="right">
            <?php echo number_format($sumAmount); ?>
        </td>
    </tr>
</table>