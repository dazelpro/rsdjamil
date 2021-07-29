<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSUP Dr. M. Djamil Padang</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets'?>/css/bootstrap.css">

    <link rel="stylesheet" href="<?php echo base_url().'assets'?>/vendors/summernote/summernote-lite.min.css">

    <link rel="stylesheet" href="<?php echo base_url().'assets'?>/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets'?>/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets'?>/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url().'assets'?>/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <?php foreach ($dataRad->result() as $row): ?>
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
                                <h3>Input Bacaan Citra Radiologi</h3>
                            </div>
                        </div>
                    </div>
                    <form action="<?php echo site_url('handling/radiology-reading/insert-reading');?>" method="POST">
                        <section class="section">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="disabledInput">Kode</label>
                                                <input type="text" name="code" value="<?php echo $row->id;?>" class="form-control" id="disabledInput" readonly required>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledInput">Nama Pasien</label>
                                                <input type="text" name="fields" value="<?php echo $row->name;?>" class="form-control" id="disabledInput" readonly required>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledInput">Tindakan</label>
                                                <input type="text" name="fields" value="<?php echo $row->handling;?>" class="form-control" id="disabledInput" readonly required>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledInput">Tarif</label>
                                                <input type="text" name="fields" value="<?php echo number_format($row->amount);?>" class="form-control" id="disabledInput" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="disabledInput">Asal Ruangan</label>
                                                <input type="text" name="fields" value="<?php echo $row->room;?>" class="form-control" id="disabledInput" readonly required>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledInput">Dokter Pengantar</label>
                                                <input type="text" name="fields" value="<?php echo $row->doctor_name;?>" class="form-control" id="disabledInput" readonly required>
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledInput">Dokter Radiologi</label>
                                                <input type="text" name="fields" value="<?php echo $row->doctor_rad;?>" class="form-control" id="disabledInput" readonly required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group mb-3">
                                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalImage">Lihat Citra Radiologi</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="divider">
                                            <div class="divider-text">Input Pembacaan</div>
                                        </div>
                                        <div class="col-12">
                                            <textarea id="hint" name="desc"></textarea>
                                            <br>
                                            <div class="input-group mb-3">
                                                <button type="submit" class="btn btn-primary">Simpan Hasil Bacaan</button>
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
    <div class="modal fade" id="modalImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="exampleModalCenterTitle">Citra Radiologi </h5>
                </div>
                <div class="modal-body">
                    <img style="width: 100%;" src="<?php echo base_url().'assets'?>/images/upload/<?php echo $row->file;?>" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    <script src="<?php echo base_url().'assets'?>/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url().'assets'?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url().'assets'?>/vendors/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url().'assets'?>/vendors/summernote/summernote-lite.min.js"></script>
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 120,
        })
        $("#hint").summernote({
            height: 250,
            toolbar: false,
            placeholder: 'Ketik hasil pembacaan disini...',
            hint: {
                // words: ['apple', 'orange', 'watermelon', 'lemon'],
                match: /\b(\w{1,})$/,
                search: function (keyword, callback) {
                    callback($.grep(this.words, function (item) {
                        return item.indexOf(keyword) === 0;
                    }));
                }
            }
        });

    </script>
    <script src="<?php echo base_url().'assets'?>/js/main.js"></script>
</body>

</html>