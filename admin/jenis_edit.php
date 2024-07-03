<?php include 'header.php'; ?>
<div class="container">
    <br/>
    <br/>
    <br/>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Jenis Laundry</h4>
            </div>
            <div class="panel-body">
                <?php
                include '../koneksi.php';
                $id = $_GET['id'];
                $data = mysqli_query($koneksi,"select * from jenis where id_jenis='$id'");
                while($d=mysqli_fetch_array($data)){
                    ?>
                    <form method="post" action="jenis_update.php">
                        <div class="form-group">
                            <label>Jenis Laundry</label>
                            <input type="hidden" name="id" value="<?php echo $d['id_jenis']; ?>">
                            <input type="text" class="form-control" name="jenis_laundry" placeholder="Masukkan jenis laundry .." value="<?php echo $d['jenis_laundry']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Lama Proses</label>
                            <input type="number" class="form-control" name="lama_proses" placeholder="Masukkan lama proses .." value="<?php echo $d['lama_proses']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tarif</label>
                            <input type="number" class="form-control" name="tarif" placeholder="Masukkan tarif .." value="<?php echo $d['tarif']; ?>">
                        </div>
                        <br/>
                        <input type="submit" class="btn btn-primary" value="Update">
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
