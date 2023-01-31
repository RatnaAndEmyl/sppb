<?php
$angka = date('Ymdhis');
$kode_bbm = $_GET['kode_bbm'];
$kode_barang = $_GET['kode_barang'];
//echo $kode_barang;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_bbm . $pc) <> $oc) {
?>

    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>

<?php
}

?>

<?php

if (isset($_GET['tidak_disetujui'])) { ?>

    <script type="text/javascript">
        window.location.href = "?page=bbm&aksi=alasan_tolak&kode_bbm=<?php echo $kode_bbm; ?>&kode_barang=<?php echo $kode_barang; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>";
    </script>
<?php
} else {

    $sqltext = "UPDATE pb_transaksi.tb_bbm_detail SET status_bbm= 'Y' WHERE kode_bbm='$kode_bbm' and kode_barang='$kode_barang'";
    $sql = $koneksi_master->query($sqltext);
    // echo $sqltext . '<br>' . '<br>';
}


if ($sql) {
?>

    <script type="text/javascript">
        // alert("Status Berhasil Disimpan");
        window.location.href = "?page=bbm&aksi=detail&kode_bbm=<?php echo $kode_bbm; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>";
    </script>

<?php
} else { ?>
    <script type="text/javascript">
        // alert("Status Gagal Disimpan");
        window.location.href = "?page=bbm&aksi=detail&kode_bbm=<?php echo $kode_bbm; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>";
    </script>
<?php
}

// Insert ke tabel history Stok
$sql_tampil_kode_po = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbm_detail a WHERE kode_bbm='$kode_bbm' AND kode_barang='$kode_barang' AND a.status='A'");
$tampil_kode_po = $sql_tampil_kode_po->fetch_assoc();
$kode_po             = $tampil_kode_po['kode_po'];
$nama_barang         = $tampil_kode_po['nama_barang'];
$jumlah_pemenuhan    = $tampil_kode_po['jumlah_pemenuhan'];

// echo $kode_po. '<br>';
// echo $nama_barang. '<br>';
// echo 'Jumlah Pemenuhan = ' . $jumlah_pemenuhan. '<br>';

$sql_tampil_stok_new = $koneksi_master->query("SELECT DISTINCT a.username, b.nama, a.kode_gudang, a.tanggal_bbm FROM pb_transaksi.tb_bbm a INNER JOIN pb_role.tb_user b ON a.create_by=b.kode_user WHERE kode_bbm='$kode_bbm' AND a.status='A' AND b.status='A'");
$tampil_stok_new = $sql_tampil_stok_new->fetch_assoc();
$username_new         = $tampil_stok_new['username'];
$nama_new             = $tampil_stok_new['nama'];
$kode_gudang_new      = $tampil_stok_new['kode_gudang'];

// echo  'username_new='. $username_new . '<br>';
// echo  'nama_new='. $nama_new . '<br>';
// echo  'kode gudang='. $kode_gudang_new . '<br>';
// echo  'Tanggal BBM='. $tanggal_bbm_new . '<br>';

$sql_tampil_tglcreate_terakhir = $koneksi_master->query("SELECT tgl_create, stok_awal, stok_akhir  FROM pb_transaksi.tb_history_stok WHERE kode_barang='$kode_barang' AND kode_gudang='$kode_gudang_new' AND status='A' ORDER BY tgl_create DESC");
$tampil_tglcreate_terakhir = $sql_tampil_tglcreate_terakhir->fetch_assoc();

$tgl_terakhir_new = $tampil_tglcreate_terakhir['tgl_create'];
$stok_awal_new = $tampil_tglcreate_terakhir['stok_awal'];
$stok_akhir_new = $tampil_tglcreate_terakhir['stok_akhir'];

if (($stok_awal_new == '') or ($stok_akhir_new == '')) {
    $stok_awal_new = 0;
    $stok_akhir_new = 0;
}

$stok_akhir_stok = $stok_akhir_new + $jumlah_pemenuhan;

// echo 'Tanggal Terakhir = ' . $tgl_terakhir_new . '<br>';
// echo 'Stok Awal = ' . $stok_awal_new . '<br>';
// echo 'Stok Terakhir = ' . $stok_akhir_new . '<br>';
// echo 'Stok Akhir Banget = ' . $stok_akhir_stok . '<br>';

$sql_history = "INSERT INTO pb_transaksi.tb_history_stok values('$kode_po','$kode_gudang_new','$kode_barang','$nama_barang','$nama_new','$username_new','BBM','$stok_akhir_new','$jumlah_pemenuhan','$stok_keluar','$stok_akhir_stok','A',null,'$kode_user',null,null,null,null)";

$sql_history_stok = $koneksi_master->query($sql_history);  //*perulangannya
//   echo $sql_history . '<br>' . '<br>';


//    punya tabel stok
$sql_tampil_jumlah_stok = $koneksi_master->query("SELECT SUM(onhandstok) 'jumlah_stok', onhandstok, kode_gudang, kode_barang FROM pb_transaksi.tb_stok WHERE kode_barang='$kode_barang' AND kode_gudang='$kode_gudang_new' AND status='A'");
$tampil_jumlah_stok = $sql_tampil_jumlah_stok->fetch_assoc();

$kode_barangstok_new     = $tampil_jumlah_stok['kode_barang'];
$kode_gudangstok_new     = $tampil_jumlah_stok['kode_gudang'];
$stok_new                = $tampil_jumlah_stok['jumlah_stok'] + $jumlah_pemenuhan;

// echo  'Stok='. $stok_new. '<br>';
// echo  'Kode Gudang Baru='. $kode_barangstok_new. '<br>';
// echo  'Kode Barang Baru='. $kode_gudangstok_new. '<br>';
// echo  'Kode Gudang='. $kode_gudang_new. '<br>';
// echo  'Kode Barang Baru1='. $kode_barang_new. '<br>';
// echo  'Jumlah Pemenuhan='. $jumlah_pemenuhan. '<br>' . '<br>';

if (($kode_barangstok_new == $kode_barang) and ($kode_gudangstok_new == $kode_gudang_new)) {
    $sql_stok = "UPDATE pb_transaksi.tb_stok SET onhandstok='$stok_new', update_by='$kode_user' WHERE kode_barang='$kode_barang' AND kode_gudang='$kode_gudang_new'";
    // untuk mengupdate onhandstok jika kode barang dan kode gudang sudah ada
} else {
    $sql_stok = "INSERT INTO pb_transaksi.tb_stok values('$kode_barang','$kode_gudang_new','$jumlah_pemenuhan','A',null,'$kode_user',null,null,null,null)";
}

$tampil_sql_stok = $koneksi_master->query($sql_stok);  //*perulangannya
// echo $sql_stok . '<br>' . '<br>';



// mengarah ke tabel barang dimaster
$sql_jumlah_stok_keseluruhan = $koneksi_master->query("SELECT SUM(onhandstok) 'stok_keseluruhan' FROM pb_transaksi.tb_stok WHERE kode_barang='$kode_barang' AND status='A'");
$jumlah_stok_keseluruhan = $sql_jumlah_stok_keseluruhan->fetch_assoc();

$onhandstok = $jumlah_stok_keseluruhan['stok_keseluruhan'];

// echo  'Stok = '. $stok_new. '<br>';
// echo  'Sum Jumlah Stok = '. $jumlah_stok_keseluruhan['jumlah_stok_keseluruhan']. '<br>';

$sql_stok_keseluruhan = "UPDATE pb_master.tb_barang SET onhandstok='$onhandstok', update_by='$kode_user' WHERE id_barang='$kode_barang'";
// untuk mengupdate onhandstok ditabel master jika kode barang sudah ada

$tampil_sql_stok_keseluruhan = $koneksi_master->query($sql_stok_keseluruhan);  //*perulangannya
// echo $sql_stok_keseluruhan . '<br>';

?>