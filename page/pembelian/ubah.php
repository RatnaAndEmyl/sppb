<?php

$kode_pembelian           = $_GET['kode_pembelian'];
$user                     = $_GET['user'];
$tanggal                  = $_GET['tanggal'];
$id_barang                = $_GET['id_barang'];
$id_jenis_barang          = $_GET['id_jenis_barang'];
$jumlah_pembelian         = $_GET['jumlah_pembelian'];
$harga_satuan             = $_GET['harga_satuan'];
$total_harga              = $_GET['total_harga'];
$kode_suplier             = $_GET['kode_suplier'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_pembelian . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}


$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_pembelian WHERE kode_pembelian='$kode_pembelian'");

$tampil = $sql->fetch_assoc();
?>
<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Daftar Pembelian</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title">Ubah Pembelian</h4>
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                    </div>
                    <br>
                    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <script type="text/javascript">
                        $(function() {
                            var today = new Date();
                            var month = ('0' + (today.getMonth() + 1)).slice(-2);
                            var day = ('0' + today.getDate()).slice(-2);
                            var year = today.getFullYear();
                            var date = year + '-' + month + '-' + day;
                            $('[id*=txtdateofreservation]').attr('min', date);
                        });
                    </script>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form method="POST" action="?page=pembelian&aksi=ubah_proses" name="autoSumForm">
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail111">Nama</label>
                                    <input type="text" class="form-control" value="<?php echo $nama ?>" name="user" readonly>
                                </div> -->
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Kode pembelian</label>
                                    <input type="text" class="form-control" name="kode_pembelian" value="<?php echo $tampil['kode_pembelian']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Tanggal pembelian</label>
                                    <input type="date" class="form-control" id="txtdateofreservation" name="tanggal" value="<?php echo $tampil['tanggal']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Jenis Barang</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <select class="custom-select col-12" id="id_jenis_barang" name="id_jenis_barang">
                                            <?php
                                            $sql = $koneksi_master->query("SELECT* FROM pb_master.tb_jenis_barang WHERE STATUS='A' ORDER BY id_jenis_barang");
                                            while ($data = $sql->fetch_assoc()) {
                                                if ($data['id_jenis_barang'] == $tampil['id_jenis_barang']) {
                                                    echo "<option value ='$data[id_jenis_barang]' selected >$data[nama_jenis_barang]</option>";
                                                } else {
                                                    echo "<option value ='$data[id_jenis_barang]'>$data[nama_jenis_barang]</option>";
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Barang</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <select class="custom-select col-12" id="id_barang" name="id_barang">
                                            <?php
                                            $sql = $koneksi_master->query("SELECT* FROM pb_master.tb_barang WHERE STATUS='A' ORDER BY id_barang");
                                            while ($data = $sql->fetch_assoc()) {
                                                if ($data['id_barang'] == $tampil['id_barang']) {
                                                    echo "<option value ='$data[id_barang]' selected >$data[nama_barang]</option>";
                                                } else {
                                                    echo "<option value ='$data[id_barang]'>$data[nama_barang]</option>";
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail111">Jumlah Pembelian</label>
                                    <input type="text" class="form-control" name="jumlah_pembelian" value="<?php echo $tampil['jumlah_pembelian']; ?>" onFocus="startCalc();" onBlur="stopCalc();" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Harga Satuan</label>
                                    <input type="text" class="form-control" name="harga_satuan" value="<?php echo $tampil['harga_satuan']; ?>" onFocus="startCalc();" onBlur="stopCalc();" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Total Harga</label>
                                    <input type="text" class="form-control" name="total_harga" value="<?php echo $tampil['total_harga']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Suplier</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <select class="custom-select col-12" id="kode_suplier" name="kode_suplier">
                                            <?php
                                            $sql = $koneksi_master->query("SELECT* FROM pb_master.tb_suplier WHERE STATUS='A' ORDER BY kode_suplier");
                                            while ($data = $sql->fetch_assoc()) {
                                                if ($data['kode_suplier'] == $tampil['kode_suplier']) {
                                                    echo "<option value ='$data[kode_suplier]' selected >$data[nama_suplier]</option>";
                                                } else {
                                                    echo "<option value ='$data[kode_suplier]'>$data[nama_suplier]</option>";
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=pembelian" class="btn btn-dark">Kembali</a>
                                </div>
                            </form>
                            <script>
                                function startCalc() {
                                    interval = setInterval("calc()", 1);
                                }

                                function calc() {
                                    one = document.autoSumForm.jumlah_pembelian.value;
                                    two = document.autoSumForm.harga_satuan.value;

                                    rumus = one * two;

                                    document.autoSumForm.total_harga.value = rumus;
                                }

                                function stopCalc() {

                                    clearInterval(interval);
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>