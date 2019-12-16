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

            <li class="<?php if($title=='grafik') echo 'active';?>">
                <a href="<?php echo site_url('grafik')?>"><i class="fa fa-signal"></i>Grafik</a>
            </li>

        </ul>
    </div>
</div>