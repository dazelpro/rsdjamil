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
    
    <h3>Laporan Kinerja Pelayanan Radiographer</h3>
    <br>
    <?php
        $query = $this->db->query("SELECT table_admin.`id`, table_admin.`name` FROM table_admin JOIN table_radiological_image ON table_radiological_image.`admin` = table_admin.`id` WHERE mr_number IS NOT NULL GROUP BY table_admin.`name` ORDER BY table_admin.`name`");
        foreach ($query->result() as $admin) :
    ?>
    <div style="padding-bottom: 30px">
        <h3 style="text-align: left;"><?php echo $admin->name;?>:</h3>
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
                $id = $admin->id;
                $query = $this->db->query("SELECT
                                table_handling.name, 
                                COUNT(table_patient.mr_number) AS qty
                    FROM table_radiological_image 
                                JOIN table_handling ON table_radiological_image.`handling` = table_handling.`id`
                                JOIN table_patient ON table_patient.`mr_number` = table_radiological_image.`mr_number`
                                JOIN table_admin ON table_admin.`id` = table_radiological_image.`admin`
                    WHERE table_admin.id = '$id'
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

    /* #tables {
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
    } */
</style>

</html>