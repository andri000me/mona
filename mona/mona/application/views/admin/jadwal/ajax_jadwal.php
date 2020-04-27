<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>Jadwal Kategori</th>
        <th>Waktu Mulai</th>
        <th>Waktu Berakhir</th>
        <th>#</th>  
    </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            foreach ($jadwal as $val) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $val->nama_level; ?></td>
                        <td><?php echo $val->tgl_mulai; ?></td>
                        <td><?php echo $val->tgl_selesai; ?></td>
                        <td>
                            <button class="btn btn-primary" title="Edit Jadwal" onclick="edit_jadwal(<?php echo $val->id_jadwal; ?>)">
                                <li class="fa fa-pencil"></li>
                            </button>
                            <button class="btn btn-danger" title="Hapus Jadwal" onclick="hapus_jadwal(<?php echo $val->id_jadwal; ?>)">
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