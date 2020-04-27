<div class="navbar nav_title" style="border: 0;">
    <a href="<?php echo base_url();?>" class="site_title"><span>BEAUTYSKY</span></a>
</div>

<div class="clearfix"></div>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">

            <li class="<?php if($title=='Dashboard') echo 'active';?>">
                <a href="<?php echo site_url('admin')?>"><i class="fa fa-home"></i>Dashboard</a>
            </li>

            <li class="">
                <a><i class="fa fa-leaf"></i>Karyawan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li class="<?php if($title=='Management') echo 'active';?>"><a href="<?php echo site_url('karyawan/jab/10')?>">
                        <i class="fa fa-gear"></i>Management</a>
                    </li>

                    <li class="<?php if($title=='Karyawan') echo 'active';?>"><a href="<?php echo site_url('karyawan/jab/1')?>">
                        <i class="fa fa-group"></i>Karyawan</a>
                    </li>

                    <li class="<?php if($title=='Calon') echo 'active';?>"><a href="<?php echo site_url('karyawan/jab/0')?>">
                        <i class="fa fa-user"></i>Calon Karyawan</a>
                    </li>

                    <li class="<?php if($title=='Terhapus') echo 'active';?>"><a href="<?php echo site_url('karyawan/deleted')?>">
                        <i class="fa fa-terminal"></i>User Terhapus</a>
                    </li>
                </ul>
            </li>

            <li class="<?php if($title=='Jadwal') echo 'active';?>">
                <a href="<?php echo site_url('jadwal')?>"><i class="fa fa-calendar"></i>Jadwal Test</a>
            </li>

            <li class="<?php if($title=='Kategori') echo 'active';?>">
                <a href="<?php echo site_url('kategori')?>"><i class="fa fa-file-code-o"></i>Kategori Test</a>
            </li>

            <li class="<?php if($title=='Soal') echo 'active';?>">
                <a href="<?php echo site_url('soal')?>"><i class="fa fa-book"></i>Soal Test</a>
            </li>

            <li class="<?php if($title=='Hasil') echo 'active';?>">
                <a href="<?php echo site_url('hasil')?>"><i class="fa fa-flag-checkered"></i>Hasil Test</a>
            </li>

        </ul>
    </div>
</div>