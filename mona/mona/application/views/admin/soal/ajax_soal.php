<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>Soal</th>
        <th>Kategori</th>
        <th>Level</th>
        <th>Created</th>
        <th>#</th>  
    </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            foreach ($soal as $val) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo html_entity_decode($val->pertanyaan); ?></td>
                        <td><?php echo $val->nama_kategori; ?></td>
                        <td><?php echo empty($val->nama_level) ? 'All Level' : $val->nama_level ?></td>
                        <td><?php echo $val->tgl_isi; ?></td>
                        <td>
                            <a href="<?php echo site_url('soal/edit/')?><?php echo $val->id_soal ?> "
                                class="btn btn-primary" title="Edit Soal">
                                <li class="fa fa-pencil"></li>
                            </a>
                            <button class="btn btn-danger" title="Hapus Soal" onclick="hapus_soal(<?php echo $val->id_soal ?>)">
                                <li class="fa fa-trash"></li>
                            </button>
                            <button class="btn btn-info" title="Detail Soal" onclick="detail_soal(<?php echo $val->id_soal ?>)">
                                <li class="fa fa-file-word-o"></li>
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