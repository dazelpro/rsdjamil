<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radiologi - RSUP Dr. M. Djamil Padang</title>
</head>
<script>window.print()</script>
<body>
<?php foreach ($dataRad->result() as $row): ?>
    <img style="max-width: 700px; margin-top: 50px; border-bottom: 1px solid black;" src="<?php echo base_url().'assets'?>/images/kop-laporan.png" alt="">
    <h3>Radiologi Instalasi Gawat Darurat</h3>
    <table style="width: 100%; text-align: left; margin-top: 30px;" border="0" id="tables">
        <tr>
            <td>No MR</td>
            <td width="1%">:</td>
            <td style="font-weight: bold;"><?php echo $row->mr_number;?></td>
            <td>Dokter Pengirim</td>
            <td>:</td>
            <td style="font-weight: bold;"><?php echo $row->doctor_name;?></td>
        </tr>
        <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td style="font-weight: bold;"><?php echo $row->name;?></td>
            <td>Tanggal Periksa</td>
            <td>:</td>
            <td style="font-weight: bold;"><?php echo date("d M Y", strtotime($row->create_at));?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td style="font-weight: bold;"><?php echo $row->gender;?></td>
            <td>Jenis Pemeriksaan</td>
            <td>:</td>
            <td style="font-weight: bold;"><?php echo $row->handling;?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Asal Ruangan</td>
            <td>:</td>
            <td style="font-weight: bold;"><?php echo $row->room;?></td>
        </tr>
    </table>
    <h4 style="text-align: left;">Hasil Pemeriksaan:</h4>
    <div style="border: 1px solid black; min-height: 150px; text-align: left; padding: 3px 15px;">
        <?php echo $desc;?>
    </div>
    <br><br>
    <table width="100%" border="0">
        <tr>
            <td width="60%"></td>
            <td>Dokter Pemeriksa</td>
        </tr>
        <tr>
            <td></td>
            <td><div style="padding-top: 70px; font-weight: bold;"><?php echo $row->doctor_rad;?></div></td>
        </tr>
    </table>
    <?php endforeach;?>
</body>
<style>
    body {
        max-width: 700px;
        text-align: center;
        margin: auto;
        font-family: lato;
    }
</style>

</html>