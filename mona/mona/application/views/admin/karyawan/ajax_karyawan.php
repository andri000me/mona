<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Foto</th>
        <th>Username</th>
        <th>Nama Lengkap</th>
        <th>Alamat</th>
        <th>Posisi</th>
        <th>#</th>  
    </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            foreach ($karyawan as $val) {
                if(empty($val->foto)){
                    $foto='tanda.png';
                }else{
                    $foto = $val->foto;
                }
                ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $val->username; ?></td>
                        <td><?php echo $val->nama_user; ?></td>
                        <td><?php echo $val->alamat; ?></td>
                        <td><?php echo $val->nama_level; ?></td>
                        <td>
                            <button class="btn btn-info" title="Info User" onclick="detail_karyawan(<?php echo $val->idUser; ?>)">
                                <li class="fa fa-info"></li>
                            </button>
                            <?php
                                if (!empty($val->id_biodata)) {
                                ?>
                                    <button class="btn btn-primary" title="Edit User" onclick="edit_karyawan(<?php echo $val->idUser; ?>)">
                                        <li class="fa fa-pencil"></li>
                                    </button>
                                <?php
                                }
                            ?>
                            <button class="btn btn-danger" title="Hapus User" onclick="hapus_karyawan(<?php echo $val->idUser; ?>)">
                                <li class="fa fa-trash"></li>
                            </button>
                            <?php 
                                /*
                                if ($val->is_karyawan == 0 && $val->id_level >2 && !empty($val->id_biodata)) {
                                    ?>
                                        <button class="btn btn-success" title="Terima karyawan">
                                            <li class="fa fa-check"></li>
                                        </button>
                                    <?php
                                }else
                                */ 
                                if ($val->is_karyawan == 1 && $val->id_level >2){
                                    ?>
                                        <button class="btn btn-warning" title="PHK" onclick="phk(<?php echo $val->idUser; ?>)">
                                            <li class="fa fa-close"></li>
                                        </button>
                                    <?php
                                }
                            ?>
                        </td>
                    </tr>
                <?php
                $no++;
            }
        ?>
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        $('#datatable-buttons').DataTable();
    });
</script>