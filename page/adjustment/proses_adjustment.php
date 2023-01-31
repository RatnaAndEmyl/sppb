<?php
$angka = date('Ymdhis');
$kode_adjustment = $_GET['kode_adjustment'];
$kode_barang = $_GET['kode_barang'];
$tgl_create = $_GET['tgl_create'];
//echo $kode_barang;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_adjustment . $pc) <> $oc) {
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
        window.location.href = "?page=adjustment&aksi=alasan_tolak&kode_adjustment=<?php echo $kode_adjustment; ?>&kode_barang=<?php echo $kode_barang; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>";
    </script>
<?php } else {

    $sqltext = "UPDATE pb_transaksi.tb_adjustment_detail SET status_adjustment= 'Y' WHERE kode_adjustment='$kode_adjustment' and kode_barang='$kode_barang' and tgl_create='$tgl_create'";
    $sql = $koneksi_master->query($sqltext);
    // echo $sqltext. '<br>';
}

if ($sql) {
?>

    <script type="text/javascript">
        // alert("Status Berhasil Disimpan");
        window.location.href = "?page=adjustment&aksi=detail&kode_adjustment=<?php echo $kode_adjustment; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>";
    </script>

<?php
} else { ?>
    <script type="text/javascript">
        // alert("Status Gagal Disimpan");
        window.location.href = "?page=adjustment&aksi=detail&kode_adjustment=<?php echo $kode_adjustment; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>";
    </script>
<?php
}



// punya histori stok
$sql_tampil_kode_adjustment = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_adjustment_detail a WHERE kode_adjustment='$kode_adjustment' AND kode_barang='$kode_barang' AND a.status='A'");
$tampil_kode_adjustment = $sql_tampil_kode_adjustment->fetch_assoc();
$kode_adjustment     = $tampil_kode_adjustment['kode_adjustment'];
$nama_barang         = $tampil_kode_adjustment['nama_barang'];
$stok_in             = $tampil_kode_adjustment['stok_in'];
$stok_out            = $tampil_kode_adjustment['stok_out'];
$value               = $tampil_kode_adjustment['value'];

// echo $kode_adjustment. '<br>';
// echo $nama_barang. '<br>';
// echo $stok_in. '<br>';
// echo $stok_out. '<br>';
// echo 'Value = ' . $value. '<br>';

$sql_tampil_stok_new = $koneksi_master->query("SELECT DISTINCT a.username, a.kode_gudang FROM pb_transaksi.tb_adjustment a INNER JOIN pb_role.tb_user b ON a.create_by=b.kode_user WHERE kode_adjustment='$kode_adjustment' AND a.status='A' AND b.status='A'");
$tampil_stok_new = $sql_tampil_stok_new->fetch_assoc();
$username_new         = $tampil_stok_new['username'];
$kode_gudang_new      = $tampil_stok_new['kode_gudang'];

// echo $username_new . '<br>';
// echo $kode_gudang_new . '<br>';
// echo 'Stok Masuk = '. $stok_in . '<br>';
// echo 'Stok Keluar = '. $stok_out . '<br>';

$sql_tampil_tglcreate_terakhir = $koneksi_master->query("SELECT tgl_create, stok_awal, stok_akhir  FROM pb_transaksi.tb_history_stok WHERE kode_barang='$kode_barang' AND kode_gudang='$kode_gudang_new' AND status='A' ORDER BY tgl_create DESC");
$tampil_tglcreate_terakhir = $sql_tampil_tglcreate_terakhir->fetch_assoc();

$tgl_terakhir_new = $tampil_tglcreate_terakhir['tgl_create'];
$stok_awal_new = $tampil_tglcreate_terakhir['stok_awal'];
$stok_akhir_new = $tampil_tglcreate_terakhir['stok_akhir'];

if ($value == 'in') {
  $stok_akhir_stok = $stok_akhir_new + $stok_in;
} else if ($value == 'out') {
  $stok_akhir_stok = $stok_akhir_new - $stok_out;
}


// echo 'Tanggal Terakhir = ' . $tgl_terakhir_new . '<br>';
// echo 'Stok Awal = ' . $stok_awal_new . '<br>';
// echo 'Stok Terakhir = ' . $stok_akhir_new . '<br>' . '<br>';
// echo 'Stok Akhir Banget = ' . $stok_akhir_stok . '<br>';


if ($value == 'in') {
    $sql_history = "INSERT INTO pb_transaksi.tb_history_stok values('$kode_adjustment','$kode_gudang_new','$kode_barang','$nama_barang','$username_new','$username_new','ADJ IN','$stok_akhir_new','$stok_in','$stok_keluar','$stok_akhir_stok','A',null,'$kode_user',null,null,null,null)";
} else {
    $sql_history = "INSERT INTO pb_transaksi.tb_history_stok values('$kode_adjustment','$kode_gudang_new','$kode_barang','$nama_barang','$username_new','$username_new','ADJ OUT','$stok_akhir_new','$stok_masuk','$stok_out','$stok_akhir_stok','A',null,'$kode_user',null,null,null,null)";
}

// $sql_history = "INSERT INTO pb_transaksi.tb_history_stok values('$kode_adjustment','$kode_gudang_new','$kode_barang','$nama_barang','$username_new',null,'ADJ',null,'$stok_masuk','$jumlah_pemenuhan',null,'A',null,'$kode_user',null,null,null,null)";

$sql_history_stok = $koneksi_master->query($sql_history);  //*perulangannya
// echo $sql_history. '<br>';


// punya stok
$sql_tampil_jumlah_stok = $koneksi_master->query("SELECT SUM(onhandstok) 'jumlah_stok', onhandstok, kode_gudang, kode_barang FROM pb_transaksi.tb_stok WHERE kode_barang='$kode_barang' AND kode_gudang='$kode_gudang_new'");
$tampil_jumlah_stok = $sql_tampil_jumlah_stok->fetch_assoc();

$kode_barangstok_new     = $tampil_jumlah_stok['kode_barang'];
$kode_gudangstok_new     = $tampil_jumlah_stok['kode_gudang'];
$stok                    = $tampil_jumlah_stok['jumlah_stok'];
if ($value == 'in') {
  $stok_new                = $tampil_jumlah_stok['jumlah_stok'] + $stok_in;
} else if ($value == 'out') {
  $stok_new                = $tampil_jumlah_stok['jumlah_stok'] - $stok_out;
}

// echo 'Jumlah Stok= '. $stok. '<br>';
// echo 'Jumlah Stok Setelah Dikurang= '. $stok_new. '<br>';
// echo 'Jumlah Pemenuhan= '. $jumlah_pemenuhan. '<br>';

// echo  'Stok='. $stok_new. '<br>';
// echo  'Kode Gudang Baru='. $kode_barangstok_new. '<br>';
// echo  'Kode Barang Baru='. $kode_gudangstok_new. '<br>';
// echo  'Kode Gudang='. $kode_gudang_new. '<br>';
// echo  'Kode Gudang='. $kode_gudang_new. '<br>';


if (($kode_barangstok_new == $kode_barang) and ($kode_gudangstok_new == $kode_gudang_new)) {
  $sql_stok = "UPDATE pb_transaksi.tb_stok SET onhandstok='$stok_new', update_by='$kode_user' WHERE kode_barang='$kode_barang' AND kode_gudang='$kode_gudang_new'";
  // untuk mengupdate jumlah pemenuhan jika kode po dan kode barang udah ada 
} else {
  if ($value == 'in') {
    $sql_stok = "INSERT INTO pb_transaksi.tb_stok values('$kode_barang','$kode_gudang_new','$stok_in','A',null,'$kode_user',null,null,null,null)";
    
  } elseif ($value == 'out')  {
    $sql_stok = "INSERT INTO pb_transaksi.tb_stok values('$kode_barang','$kode_gudang_new','$stok_out','A',null,'$kode_user',null,null,null,null)";
  }
}

$tampil_sql_stok = $koneksi_master->query($sql_stok);  //*perulangannya
// echo $sql_stok . '<br>' ;


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