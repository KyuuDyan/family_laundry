<?php include 'header.php'; ?>
<div class="container">
    <br/>
    <br/>
    <br/>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Tambah Jenis Baru</h4>
            </div>
            <div class="panel-body">
                <form method="post" action="jenis_aksi.php">
                    <div class="form-group">
                        <label>Jenis Laundry</label>
                        <input type="text" class="form-control" name="jenis_laundry" placeholder="Masukkan jenis laundry ..">
                    </div>
                    <div class="form-group">
                        <label>Lama Proses</label>
                        <input type="number" class="form-control" name="lama_proses" placeholder="Masukkan lama proses ..">
                    </div>

                    <div class="form-group">
                        <label>Tarif</label>
                        <input type="number" class="form-control" name="tarif" placeholder="Masukkan tarif ..">
                    </div>
                    <br/>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
