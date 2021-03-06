<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSUP Dr. M. Djamil Padang</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets'?>/css/bootstrap.css">
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
                                <h3>Daftar Bacaan Citra</h3>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped" id="mytable">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Admin Radiologi</th>
                                            <th>Dokter Radiologi</th>
                                            <th>Status</th>
                                            <th>Action  </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach ($dataRad->result() as $row):
                                        ?>
                                        <tr>
                                            <td><?php echo $row->id;?></td>
                                            <td><?php echo $row->name;?></td>
                                            <td><?php echo $row->doctor_name;?></td>
                                            <td><?php echo $row->doctor_rad;?></td>
                                            <td>
                                                <?php if($row->status == 0):?>  <span class="badge bg-danger">Belum Dibaca</span> <?php endif;?>
                                                <?php if($row->status == 1):?>  <span class="badge bg-success">Sudah Dibaca</span> <?php endif;?>
                                            </td>
                                            <td>
                                            <?php if($this->session->userdata('access') == 2):?>
                                                <?php if($row->status == 0):?>
                                                    <a href="<?php echo base_url().'handling/radiology-reading/input/'.$row->id?>" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal">Input Bacaan</a>
                                                <?php endif;?>
                                                <?php if($row->status == 1):?>
                                                    <a href="<?php echo base_url().'handling/radiology-reading/edit/'.$row->id?>" class="btn btn-sm btn-outline-success" data-bs-toggle="modal">Edit Bacaan</a>
                                                <?php endif;?>
                                            <?php endif;?>
                                            <?php if($this->session->userdata('access') == 0 || $this->session->userdata('access') == 1):?> 
                                                <a href="<?php echo base_url().'handling/radiology-reading/preview/'.$row->id?>" class="btn btn-sm btn-outline-success <?php if($row->status == 0):?>disabled<?php endif;?>" data-bs-toggle="modal">Lihat Hasil Bacaan</a>
                                            <?php endif;?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <?php foreach ($dataRad->result() as $row): ?>
    <form action="<?php echo site_url('handling/radiology/delete-radiology');?>" method="post">
        <div class="modal fade" id="modalDelete<?php echo $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title white" id="exampleModalCenterTitle">Peringatan </h5>
                        <button type="button" class="close white" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="code" value="<?php echo $row->id;?>">
                        <p>Anda ingin menghapus Citra Radiologi Pasien dengan nama <b><?php echo $row->name;?></b> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Batal</span>
                        </button>
                        <button type="submit" class="btn btn-danger ml-1">
                            <i class="bi bi-trash d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Hapus</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php endforeach;?>
    <!-- End -->
    <script src="<?php echo base_url().'assets'?>/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url().'assets'?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url().'assets'?>/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        let mytable = document.querySelector('#mytable');
        let dataTable = new simpleDatatables.DataTable(mytable);
    </script>
    <script src="<?php echo base_url().'assets'?>/js/main.js"></script>
</body>

</html>