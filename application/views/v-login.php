<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSUP Dr. M. Djamil Padang</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets'?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets'?>/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets'?>/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets'?>/css/pages/auth.css">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href=""><img src="<?php echo base_url().'assets'?>/images/logo/logo.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <form action="<?php echo site_url('authorization/auth');?>" method="POST">
                        <div class="form-group position-relative mb-4">
                            <input type="text" class="form-control" name="email" placeholder="Username or Email">
                            <!-- <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div> -->
                        </div>
                        <div class="form-group position-relative  mb-4">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <!-- <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div> -->
                        </div>
                        <div class="form-group position-relative  mb-4">
                            <fieldset class="form-group">
                                <select class="form-select form-select-xl" name="select" id="basicSelect">
                                    <option value="0" selected>Admin</option>
                                    <option value="1">Dokter Pengirim</option>
                                    <option value="2">Dokter Radiologi</option>
                                </select>
                            </fieldset>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                        <div style="margin-top: 30px">
                            <?php echo $this->session->flashdata('msg');?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo base_url().'assets'?>/js/bootstrap.bundle.min.js"></script>
</html>