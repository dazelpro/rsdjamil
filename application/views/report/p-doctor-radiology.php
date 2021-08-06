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
    
    <h3>Laporan Kinerja Pelayanan Dokter Radiologi</h3>
    <br>
    <!-- <table style="width: 100%;" border="1" id="tables">
        <thead>
            <tr>
                <th>Pelayanan</th>
                <th>Jumlah Pelayanan</th>
                <th>Admin Radiologi</th>
                <th>Dokter Radiologi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($dataRoom->result() as $row):
            ?>
            <tr>
                <td>
                    Pasien
                    <?php echo $row->name;?>
                </td>
                <td>
                    <?php echo $row->qty;?>
                </td>
                <td>
                    <?php echo $row->name_doctor;?>
                </td>
                <td>
                    <?php echo $row->name_rad;?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table> -->
    <?php
        $query = $this->db->query("SELECT 
                table_doctor_radiology.`name`, table_doctor_radiology.`id` 
                FROM table_radiological_image 
                JOIN table_patient ON table_patient.`mr_number` = table_radiological_image.`mr_number`
                JOIN table_doctor_radiology ON table_doctor_radiology.`id` = table_patient.`radiology_doctor`
                JOIN table_radiology_reading ON table_radiology_reading.`radiology` = table_radiological_image.`id`
            GROUP BY table_doctor_radiology.name
            ORDER BY table_doctor_radiology.id
        ");
        foreach ($query->result() as $doctor) :
    ?>
    <div style="padding-bottom: 30px">
        <h3 style="text-align: left;"><?php echo $doctor->name;?>:</h3>
        <table width="100%">
            <tr style="font-weight: bold;">
                <th width="50%">
                    Tindakan
                </th>
                <th>
                    Jumlah Pelayanan
                </th>
            </tr>
            <?php
                $id = $doctor->id;
                $query = $this->db->query("SELECT
                    table_handling.name, 
                    COUNT(table_patient.mr_number) AS qty
                FROM table_radiological_image 
                    JOIN table_handling ON table_radiological_image.`handling` = table_handling.`id`
                    JOIN table_patient ON table_patient.`mr_number` = table_radiological_image.`mr_number`
                    JOIN table_doctor_radiology ON table_doctor_radiology.`id` = table_patient.`radiology_doctor`
                WHERE table_doctor_radiology.id = '$id' AND table_radiological_image.`status` = 1
                GROUP BY table_handling.name");
                foreach ($query->result() as $handling) :
            ?>
            <tr>
                <td style="font-weight: bold;"><?php echo $handling->name;?></td>
                <td><?php echo $handling->qty;?></td>
            </tr>
            <?php endforeach;?>
        </table>
        
    </div>
    <?php endforeach;?>
</body>
<style>
    body {
        max-width: 800px;
        text-align: center;
        margin: auto;
        font-family: lato;
    }
    table td,
    table th {
        border: 1px solid #ddd;
        padding: 8px;
    }
    table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #04AA6D;
        color: white;
    } 
</style>

</html>