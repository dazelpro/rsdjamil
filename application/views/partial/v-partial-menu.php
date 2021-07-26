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
        <!-- 2, 3 -->
        <li class="sidebar-item <?php if($activeMenu == 2 || $activeMenu == 3):?> active <?php endif;?> has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Master</span>
            </a>
            <ul class="submenu <?php if($activeMenu == 2 || $activeMenu == 3):?> active <?php endif;?>">
                <li class="submenu-item <?php if($activeMenu == 2):?> active <?php endif;?>">
                    <a href="<?php echo base_url().'master/room'?>">Ruangan</a>
                </li>
                <li class="submenu-item <?php if($activeMenu == 3):?> active <?php endif;?>">
                    <a href="<?php echo base_url().'master/film-size'?>">Ukuran Film</a>
                </li>
            </ul>
        </li>
        <!-- 4, 5, 6, 7 -->
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-file-earmark-medical-fill"></i>
                <span>Tindakan</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="extra-component-avatar.html">Pasien</a>
                </li>
                <li class="submenu-item ">
                    <a href="extra-component-avatar.html">Tindakan</a>
                </li>
                <li class="submenu-item ">
                    <a href="extra-component-avatar.html">Citra Radiologi</a>
                </li>
                <li class="submenu-item ">
                    <a href="extra-component-avatar.html">Bacaan Citra</a>
                </li>
            </ul>
        </li>
        <!-- 8, 9, 10 -->
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

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-collection-fill"></i>
                <span>Laporan</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="extra-component-avatar.html">Avatar</a>
                </li>
            </ul>
        </li>

    </ul>
</div>