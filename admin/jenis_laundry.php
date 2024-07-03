<?php include 'header.php'; ?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Jenis Laundry</h4>
        </div>
        <div class="panel-body">
            <a href="jenis_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
            <br/>
            <br/>
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Jenis Laundry</th>
                    <th>Lama Proses</th>
                    <th>Tarif</th>
                    <th width="15%">OPSI</th>
                </tr>
                <?php
                include '../koneksi.php';
                $data = mysqli_query($koneksi,"select * from jenis");
                $no = 1;
                while($d=mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['jenis_laundry']; ?></td>
                        <td><?php echo $d['lama_proses'] . " Hari"; ?></td>
                        <td><?php echo $d['tarif']; ?></td>
                        <td>
                            <a href="jenis_edit.php?id=<?php echo $d['id_jenis']; ?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="jenis_hapus.php?id=<?php echo $d['id_jenis']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
