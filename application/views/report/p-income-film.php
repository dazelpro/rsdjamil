<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pelayanan Radiographer - RSUP Dr. M. Djamil Padang</title>
</head>
<script>window.print()</script>
<body>
<img style="max-width: 600px; margin-top: 50px; border-bottom: 1px solid black;" src="<?php echo base_url().'assets'?>/images/kop-laporan.png" alt="">
    <h3>Laporan Pendapatan Berdasarkan Penggunaan Film</h3>
    <table style="width: 100%;" border="1" id="tables">
        <thead>
            <tr>
                <th>Ukuran Film</th>
                <th>Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($dataRoom->result() as $row):
            ?>
            <tr>
                <td>
                    <?php echo $row->name;?>
                </td>
                <td>
                    Rp. <?php echo number_format($row->qty);?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
<style>
    body {
        max-width: 600px;
        text-align: center;
        margin: auto;
        font-family: lato;
    }

    #tables {
        border-collapse: collapse;
        width: 100%;
    }

    #tables td,
    #tables th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #tables tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #tables tr:hover {
        background-color: #ddd;
    }

    #tables th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #04AA6D;
        color: white;
    }
</style>

</html>