<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>
        <!-- 1 -->
        <li class="sidebar-item <?php if($activeMenu == 1):?> active <?php endif;?>">
            <a href="<?php echo base_url().'dashboard'?>" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- 2, 3, 4 -->
        <?php if($this->session->userdata('access') == 0):?> 
            <li class="sidebar-item <?php if($activeMenu == 2 || $activeMenu == 3 || $activeMenu == 5):?> active <?php endif;?> has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Master</span>
                </a>
                <ul class="submenu <?php if($activeMenu == 2 || $activeMenu == 3 || $activeMenu == 5):?> active <?php endif;?>">
                    <li class="submenu-item <?php if($activeMenu == 2):?> active <?php endif;?>">
                        <a href="<?php echo base_url().'master/room'?>">Ruangan</a>
                    </li>
                    <li class="submenu-item <?php if($activeMenu == 3):?> active <?php endif;?>">
                        <a href="<?php echo base_url().'master/film-size'?>">Ukuran Film</a>
                    </li>
                    <li class="submenu-item <?php if($activeMenu == 5):?> active <?php endif;?>">
                        <a href="<?php echo base_url().'handling'?>">Tindakan</a>
                    </li>
                </ul>
            </li>
        <?php endif;?>
        <!-- 4 -->
        <li class="sidebar-item <?php if($activeMenu == 4):?> active <?php endif;?>">
            <a href="<?php echo base_url().'patient'?>" class='sidebar-link'>
                <i class="bi bi-person-badge-fill"></i>
                <span>Pasien</span>
            </a>
        </li>
        <!-- 5, 6, 7 -->
        <li class="sidebar-item <?php if($activeMenu == 6 || $activeMenu == 7):?> active <?php endif;?> has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-file-earmark-medical-fill"></i>
                <span>Radiologi</span>
            </a>
            <ul class="submenu <?php if($activeMenu == 6 || $activeMenu == 7):?> active <?php endif;?>">
                <?php if($this->session->userdata('access') == 0):?> 
                    <li class="submenu-item <?php if($activeMenu == 6):?> active <?php endif;?>">
                        <a href="<?php echo base_url().'handling/radiology'?>">Citra Radiologi</a>
                    </li>
                <?php endif;?>
                <?php if($this->session->userdata('access') == 1):?> 
                    <li class="submenu-item <?php if($activeMenu == 7):?> active <?php endif;?>">
                        <a href="<?php echo base_url().'handling/radiology-reading'?>">Hasil Bacaan Citra</a>
                    </li>
                <?php endif;?>
                <?php if($this->session->userdata('access') == 2):?> 
                    <li class="submenu-item <?php if($activeMenu == 7):?> active <?php endif;?>">
                        <a href="<?php echo base_url().'handling/radiology-reading'?>">Bacaan Citra</a>
                    </li>
                <?php endif;?>
            </ul>
        </li>
        <!-- 8, 9, 10 -->
        <?php if($this->session->userdata('access') == 0):?> 
            <li class="sidebar-item <?php if($activeMenu == 8 || $activeMenu == 9 || $activeMenu == 10):?> active <?php endif;?> has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-person-badge-fill"></i>
                    <span>Akun</span>
                </a>
                <ul class="submenu <?php if($activeMenu == 8 || $activeMenu == 9 || $activeMenu == 10):?> active <?php endif;?>">
                    <li class="submenu-item <?php if($activeMenu == 8):?> active <?php endif;?>">
                        <a href="<?php echo base_url().'account/admin'?>">Admin Radiologi</a>
                    </li>
                    <li class="submenu-item <?php if($activeMenu == 9):?> active <?php endif;?>">
                        <a href="<?php echo base_url().'account/doctor'?>">Dokter Pengirim</a>
                    </li>
                    <li class="submenu-item <?php if($activeMenu == 10):?> active <?php endif;?>">
                        <a href="<?php echo base_url().'account/radiology-doctor'?>">Dokter Radiologi</a>
                    </li>
                </ul>
            </li>
        <?php endif;?>
        <!-- 11, 12, 13, 14, 15, 16 -->
        <li class="sidebar-item <?php if($activeMenu == 11 || $activeMenu == 12 || $activeMenu == 13 || $activeMenu == 14 || $activeMenu == 15 || $activeMenu == 16):?> active <?php endif;?> has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-collection-fill"></i>
                <span>Laporan</span>
            </a>
            <ul class="submenu <?php if($activeMenu == 11 || $activeMenu == 12 || $activeMenu == 13 || $activeMenu == 14 || $activeMenu == 15 || $activeMenu == 16):?> active <?php endif;?>">
                <li class="submenu-item <?php if($activeMenu == 11):?> active <?php endif;?>">
                    <a href="<?php echo base_url().'report/service-radiographer'?>">Pelayanan Radiografer</a>
                </li>
                <li class="submenu-item <?php if($activeMenu == 12):?> active <?php endif;?>">
                    <a href="<?php echo base_url().'report/service-doctor'?>">Pelayanan Dokter</a>
                </li>
                <li class="submenu-item <?php if($activeMenu == 13):?> active <?php endif;?>">
                    <a href="<?php echo base_url().'report/handling'?>">Tindakan</a>
                </li>
                <li class="submenu-item <?php if($activeMenu == 14):?> active <?php endif;?>">
                    <a href="<?php echo base_url().'report/film-use'?>">Penggunaan Film</a>
                </li>
                <li class="submenu-item <?php if($activeMenu == 15):?> active <?php endif;?>">
                    <a href="<?php echo base_url().'report/room'?>">Per Ruangan</a>
                </li>
                <li class="submenu-item <?php if($activeMenu == 16):?> active <?php endif;?>">
                    <a href="#">laporan Pendapatan</a>
                </li>
            </ul>
        </li>

    </ul>
</div>