<?php

$kode_bbk        = $_GET['kode_bbk'];
$user                   = $_GET['user'];
$tanggal                = $_GET['tanggal'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_bbk . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}

$sql_count_gudang = $koneksi_master->query("SELECT COUNT(kode_gudang) 'jumlah' FROM pb_master.tb_mapping_usergudang a INNER JOIN pb_master.tb_mapping_usergudang_detail b ON a.kode_mapping_usergudang=b.kode_mapping_usergudang WHERE a.status='A'  AND kode_user='$kode_user' and b.status='A'");
$tampil_count_gudang = $sql_count_gudang->fetch_assoc();


$jumlah_gudang =  $tampil_count_gudang['jumlah'];


if ($jumlah_gudang == 1) {
    $status_input = 'disabled';

    $sql_disabled_query = $koneksi_master->query("SELECT * FROM pb_master.tb_gudang WHERE STATUS='A' and kode_gudang in (select a.kode_gudang from pb_master.tb_mapping_usergudang a inner join pb_master.tb_mapping_usergudang_detail b on a.kode_mapping_usergudang=b.kode_mapping_usergudang where a.status='A' and b.status='A' and b.kode_user='$kode_user') ORDER BY kode_gudang");
    $tampil_sql_disabled_query = $sql_disabled_query->fetch_assoc();
    $kode_gudang_disabled =  $tampil_sql_disabled_query['kode_gudang'];
} elseif ($jumlah_gudang > 1) {
    $status_input = 'required';
} elseif ($jumlah_gudang == 0) { ?>
    <script type="text/javascript">
        alert("Tidak Punya Akses")
        window.location.href = "?page=home";
    </script>
<?php }


$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk where kode_bbk='$kode_bbk'");
$tampil = $sql->fetch_assoc();
?>

<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Daftar BBK
                        <?php echo $nama ?>
                        (<?php echo $jabatan; ?>)
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title">Ubah BBK</h4>
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
                            <form method="POST" action="?page=bbk&aksi=ubah_proses" name="autoSumForm">

                                <div class="form-group">
                                    <label for="exampleInputEmail111">Kode bbk</label>
                                    <input type="text" class="form-control" name="kode_bbk" value="<?php echo $tampil['kode_bbk']; ?>" readonly>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail111">Username</label>
                                    <input type="text" class="form-control" value="<?php echo $nama ?>" name="user" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Jabatan</label>
                                    <input type="text" class="form-control" value="<?php echo $jabatan ?>" name="jabatan" readonly>
                                </div> -->
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Tanggal bbk</label>
                                    <input type="date" class="form-control" id="txtdateofreservation" name="tanggal_bbk" value="<?php echo $tampil['tanggal_bbk']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Gudang</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <select class="form-control" name="kode_gudang" id="kode_gudang" <?php echo $status_input ?>>
                                            <?php

                                            if ($jumlah_gudang > 1) {
                                                echo "<option value='' selected disabled>-- Pilih Gudang --</option>";
                                            }
                                            $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_gudang WHERE STATUS='A' and kode_gudang in (select a.kode_gudang from pb_master.tb_mapping_usergudang a inner join pb_master.tb_mapping_usergudang_detail b on a.kode_mapping_usergudang=b.kode_mapping_usergudang where a.status='A' and b.status='A' and b.kode_user='$kode_user') ORDER BY kode_gudang");
                                            while ($data = $sql1->fetch_assoc()) {
                                                if ($data['kode_gudang'] == $tampil['kode_gudang']) {
                                                    echo "<option value ='$data[kode_gudang]' selected >$data[nama_gudang]</option>";
                                                } else {
                                                    echo "<option value ='$data[kode_gudang]'>$data[nama_gudang]</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <?php if ($jumlah_gudang == 1) { ?>
                                    <input type="text" name="kode_gudang" value="<?php echo $kode_gudang_disabled; ?>" hidden>
                                <?php } ?>

                                <div class="form-group">
                                    <label for="exampleInputEmail111">Pemohon </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <select class="form-control" name="kode_user" id="cari_nama_pemohon"  value="<?php echo $tampil['kode_user']; ?>" required>
                                            <?php

                                            echo "<option value='' selected disabled>-- Pilih Nama --</option>";
                                            // $sql1 = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_gudang WHERE STATUS='A' AND status_gudang='Y' OR status_gudang='X' ORDER BY kode_gudang");
                                            // while ($datacek = $sql1->fetch_assoc()) {
                                            //   echo "<option value ='$datacek[kode_user]'>$datacek[kode_gudang] - $datacek[username]</option>";
                                            // }

                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=bbk" class="btn btn-dark">Kembali</a>
                                </div>
                            </form>
                            <script>
                                function startCalc() {
                                    interval = setInterval("calc()", 1);
                                }

                                function calc() {
                                    one = document.autoSumForm.jumlah_bbk.value;
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