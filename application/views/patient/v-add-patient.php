<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSUP Dr. M. Djamil Padang</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets'?>/css/bootstrap.css">
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
                                <h3>Tambah Pasien</h3>
                            </div>
                        </div>
                    </div>
                    <form action="<?php echo site_url('patient/insert-patient');?>" method="POST">
                        <section class="section">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="disabledInput">No. MR</label>
                                                <input type="text" name="mr" value="MR<?php echo sprintf("%04s", $code)?>" class="form-control" id="disabledInput" readonly required>
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Nama Pasien</label>
                                                <input type="text" name="name" class="form-control" autocomplete="off" id="basicInput" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Tempat Lahir</label>
                                                <input type="text" name="place" class="form-control" autocomplete="off" id="basicInput" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Tanggal Lahir</label>
                                                <input type="date" name="birth" class="form-control" autocomplete="off" id="basicInput" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Jenis Kelamin</label>
                                            </div> 
                                            <div class="form-check">
                                                <input name="gender" value="Pria" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" required>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Pria
                                                </label>
                                            </div>   
                                            <div class="form-check">
                                                <input name="gender" value="Wanita" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" required>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Wanita
                                                </label>
                                            </div>                                    
                                        </div>
                                        <div class="col-md-6">                                        
                                            <div class="form-group">
                                                <label for="basicInput">Asal Ruangan</label>
                                                <div class="form-group">
                                                    <select class="form-select" id="basicSelect" name="room" required>
                                                        <option disabled selected value>Pilih ruangan *</option>
                                                        <?php foreach ($dataRoom->result() as $i) : ?>
                                                            <option value="<?php echo $i->id;?>"><?php echo $i->name;?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Dokter Pengantar</label>
                                                <div class="form-group">
                                                    <select class="form-select" id="basicSelect" name="doctor" required>
                                                        <option disabled selected value>Pilih Dokter Pengantar *</option>
                                                        <?php foreach ($dataDoctor->result() as $i) : ?>
                                                            <option value="<?php echo $i->id;?>"><?php echo $i->name;?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Dokter Radiologi</label>
                                                <div class="form-group">
                                                    <select class="form-select" id="basicSelect" name="doctorRad" required>
                                                        <option disabled selected value>Pilih Dokter Radiologi *</option>
                                                        <?php foreach ($dataDoctorRad->result() as $i) : ?>
                                                            <option value="<?php echo $i->id;?>"><?php echo $i->name;?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" style="float: right; margin-left: 10px;">Simpan Data</button>
                                                <a href="<?php echo base_url().'patient'?>" class="btn btn-outline-danger" style="float: right; margin-left: 10px;">Batal</a> 
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
    <script src="<?php echo base_url().'assets'?>/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url().'assets'?>/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url().'assets'?>/js/main.js"></script>
</body>

</html>