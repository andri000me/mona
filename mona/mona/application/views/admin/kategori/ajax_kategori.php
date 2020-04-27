<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Tgl Pembuatan</th>
        <th>#</th>  
    </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            foreach ($kategori as $val) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $val->nama_kategori; ?></td>
                        <td><?php echo $val->tgl_isi; ?></td>
                        <td>
                            <button class="btn btn-primary" title="Edit Kategori" onclick="edit_kategori(<?php echo $val->id_kategori; ?>)">
                                <li class="fa fa-pencil"></li>
                            </button>
                            <?php
                            if ($val->id_soal!=null) {
                                $dis = 'disabled';
                            }else{
                                $dis = '';
                            }
                            ?>
                            <button class="btn btn-danger" title="Hapus Kategori" <?php echo $dis ?> 
                            onclick="delete_kategori(<?php echo $val->id_kategori; ?>)">
                                <li class="fa fa-trash"></li>
                            </button>
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