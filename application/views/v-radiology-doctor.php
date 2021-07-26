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
                                <h3>Data Akun Dokter Radiologi</h3>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalNew">Tambah Dokter Radiologi</button>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="mytable">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Telepon</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach ($dataRadiologyDoctor->result() as $row):
                                        ?>
                                        <tr>
                                            <td><?php echo $row->name;?></td>
                                            <td><?php echo $row->email;?></td>
                                            <td><?php echo $row->phone;?></td>
                                            <td>
                                                <?php if($row->status == 0):?>  <span class="badge bg-danger">Block</span> <?php endif;?>
                                                <?php if($row->status == 1):?>  <span class="badge bg-success">Active</span> <?php endif;?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo $row->id;?>">Edit</button>
                                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalDelete<?php echo $row->id;?>">Hapus</button>
                                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalResetPass<?php echo $row->id;?>">Reset</button>
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
    <!-- New Data Modal -->
    <form action="<?php echo site_url('account/insert-radiology-doctor');?>" method="post">
        <div class="modal fade" id="modalNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label style="font-weight:bold">Nama</label>
                            <input type="text" name="name" pattern="[^';*\x22]+" class="form-control" autocomplete="off" required> <br>
                            <label style="font-weight:bold">Email</label>
                            <input type="text" name="email" pattern="[^';*\x22]+" class="form-control" autocomplete="off" required> <br>
                            <label style="font-weight:bold">Telepon</label>
                            <input type="text" name="phone" pattern="[^';*\x22]+" class="form-control" autocomplete="off" required> <br>
                            <label style="font-weight:bold">Alamat</label>
                            <input type="text" name="address" pattern="[^';*\x22]+" class="form-control" autocomplete="off" required> <br>
                            <label style="font-weight:bold">Password</label>
                            <input type="password" name="password" class="form-control" autocomplete="off" required> <br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Batal</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">
                            <i class="bi bi-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End -->
    <!-- Edit Modal -->
    <?php foreach ($dataRadiologyDoctor->result() as $row): ?>
    <form action="<?php echo site_url('account/update-radiology-doctor');?>" method="post">
        <div class="modal fade" id="modalEdit<?php echo $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="code" value="<?php echo $row->id;?>">
                            <label style="font-weight:bold">Nama</label>
                            <input type="text" name="name" pattern="[^';*\x22]+" class="form-control" value="<?php echo $row->name;?>" autocomplete="off" required> <br>
                            <label style="font-weight:bold">Email</label>
                            <input type="text" name="email" pattern="[^';*\x22]+" class="form-control" value="<?php echo $row->email;?>" autocomplete="off" required> <br>
                            <label style="font-weight:bold">Telepon</label>
                            <input type="text" name="phone" pattern="[^';*\x22]+" class="form-control" value="<?php echo $row->phone;?>" autocomplete="off" required> <br>
                            <label style="font-weight:bold">Alamat</label>
                            <input type="text" name="address" pattern="[^';*\x22]+" class="form-control" value="<?php echo $row->address;?>" autocomplete="off" required> <br>
                            <div class="form-check form-switch">
                                <?php if($row->status == 1):?>
                                    <input class="form-check-input" type="checkbox" name="status" value="0" id="flexSwitchCheckDefault" checked>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Active</label>
                                <?php endif;?>
                                <?php if($row->status == 0):?>
                                    <input class="form-check-input" type="checkbox" name="status" value="1" id="flexSwitchCheckDefault1">
                                    <label class="form-check-label" for="flexSwitchCheckDefault1">Active</label>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Batal</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">
                            <i class="bi bi-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Perbarui</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php endforeach;?>
    <!-- End -->
    <!-- Reset Password Modal -->
    <?php foreach ($dataRadiologyDoctor->result() as $row): ?>
    <form action="<?php echo site_url('account/reset-pass-radiology-doctor');?>" method="post">
        <div class="modal fade" id="modalResetPass<?php echo $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Reset Password </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="code" value="<?php echo $row->id;?>">
                            <label style="font-weight:bold">Buat Password Baru</label>
                            <input type="password" name="password" class="form-control" autocomplete="off" required> <br>                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Batal</span>
                        </button>
                        <button type="submit" class="btn btn-danger ml-1">
                            <i class="bi bi-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php endforeach;?>
    <!-- End -->
    <!-- Delete Modal -->
    <?php foreach ($dataRadiologyDoctor->result() as $row): ?>
    <form action="<?php echo site_url('account/delete-radiology-doctor');?>" method="post">
        <div class="modal fade" id="modalDelete<?php echo $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title white" id="exampleModalCenterTitle">Peringatan </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="code" value="<?php echo $row->id;?>">
                        <p>Anda ingin menghapus Dokter <b><?php echo $row->name;?></b> ?</p>
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