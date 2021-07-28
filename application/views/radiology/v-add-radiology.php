<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSUP Dr. M. Djamil Padang</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets'?>/css/bootstrap.css">

    <!-- <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="<?php echo base_url().'assets'?>/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets'?>/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets'?>/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets'?>/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url().'assets'?>/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="<?php echo base_url().'assets'?>/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('partial/v-partial-menu'); ?>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0"></ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?php echo $this->session->userdata('name');?></h6>
                                            <p class="mb-0 text-sm text-gray-600"><?php echo $this->session->userdata('user');?></p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="<?php echo base_url().'assets'?>/images/faces/2.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a class="dropdown-item" href="<?php echo site_url('authorization/logout');?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i> 
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Tambah Citra Radiologi</h3>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->session->flashdata('msg');?>
                    <form action="<?php echo site_url('handling/radiology/insert-radiology');?>" method="POST" enctype="multipart/form-data">
                        <section class="section">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="disabledInput">Kode</label>
                                                <input type="text" name="code" value="RAD<?php echo sprintf("%04s", $code)?>" class="form-control" id="disabledInput" readonly required>
                                            </div>
                                            <label for="disabledInput">Tindakan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="handling" id="handling" class="form-control" required>                                                
                                                <button type="button" style="background-color: #170A6A; color: white;" class="input-group-text" data-bs-toggle="modal" data-bs-target="#modalSearchHandling" id="basic-addon1"><i class="bi bi-search"></i></button>
                                            </div>
                                            <label for="disabledInput">No. MR Pasien</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="mr" id="mr" class="form-control" required>                                                
                                                <button type="button" style="background-color: #170A6A; color: white;" class="input-group-text" data-bs-toggle="modal" data-bs-target="#modalSearchPatient" id="basic-addon1"><i class="bi bi-search"></i></button>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledInput">Nama Pasien</label>
                                                <input type="text" name="name" id="name" class="form-control" autocomplete="off" readonly style="background-color: white;">  
                                            </div>                
                                            <div class="form-group">
                                                <label for="basicInput">Asal Ruangan</label>
                                                <div class="form-group">
                                                    <input type="text" name="room" id="room" class="form-control" autocomplete="off" readonly style="background-color: white;">  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="basicInput">Dokter Pengantar</label>
                                                <div class="form-group">
                                                    <input type="text" name="doctor" id="doctor" class="form-control" autocomplete="off" readonly style="background-color: white;">  
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Dokter Radiologi</label>
                                                <div class="form-group">
                                                    <input type="text" name="doctorRad" id="doctorRad" class="form-control" autocomplete="off" readonly style="background-color: white;">  
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupFile01"><i
                                                            class="bi bi-upload"></i></label>
                                                    <input type="file" name="image" class="form-control" id="inputGroupFile01" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" style="float: right; margin-left: 10px;">Simpan Data</button>
                                                <a href="<?php echo base_url().'handling/radiology'?>" class="btn btn-outline-danger" style="float: right; margin-left: 10px;">Batal</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="modalSearchPatient" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="exampleModalCenterTitle">Cari Pasien </h5>
                </div>
                <div class="modal-body">
                    <table class="table table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th>No MR</th>
                                <th>Nama</th>
                                <th>Dokter Pengirim</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($dataPatient->result() as $row):
                            ?>
                            <tr>
                                <td><?php echo $row->mr_number;?></td>
                                <td><?php echo $row->name_patient;?></td>
                                <td><?php echo $row->name_doctor;?></td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="
                                        document.getElementById('mr').value='<?php echo $row->mr_number;?>';
                                        document.getElementById('name').value='<?php echo $row->name_patient;?>';
                                        document.getElementById('room').value='<?php echo $row->room;?>';
                                        document.getElementById('doctor').value='<?php echo $row->name_doctor;?>';
                                        document.getElementById('doctorRad').value='<?php echo $row->name_doctor_rad;?>';
                                    " data-bs-dismiss="modal">OK</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalSearchHandling" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="exampleModalCenterTitle">Cari Tindakan </h5>
                </div>
                <div class="modal-body">
                    <table class="table table-striped" id="mytable1">
                        <thead>
                            <tr>
                                <th>No MR</th>
                                <th>Nama</th>
                                <th>Tarif</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($dataHandling->result() as $row):
                            ?>
                            <tr>
                                <td><?php echo $row->id;?></td>
                                <td><?php echo $row->name;?></td>
                                <td>Rp. <?php echo number_format($row->amount);?></td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="
                                    document.getElementById('handling').value='<?php echo $row->id;?>';
                                    " data-bs-dismiss="modal">OK</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url().'assets'?>/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url().'assets'?>/js/bootstrap.bundle.min.js"></script>

    <!-- image editor -->
    <!-- <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script> -->

    <script src="<?php echo base_url().'assets'?>/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        let mytable = document.querySelector('#mytable');
        let dataTable = new simpleDatatables.DataTable(mytable);
        let mytable1 = document.querySelector('#mytable1');
        let dataTable1 = new simpleDatatables.DataTable(mytable1);
    </script>
    <!-- <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create(inputElement);
    </script> -->
    <script src="<?php echo base_url().'assets'?>/js/main.js"></script>
    <style>
        .filepond--credits {
            display: none !important;
        }
    </style>
</body>

</html>