<?php
// usersubmodul.php
include "..\\..\\koneksi.php";
$angka = date('Ymdhis');
$cari_permintaan_barang_sppb = $_POST["cari_permintaan_barang_sppb"];
$jumlah_barang_po = $_POST["jumlah_barang_po"];
$kode_po = $_POST["kode_po"];

//  echo $cari_permintaan_barang_sppb;
//echo $jumlah_barang_po; 

$sql = $koneksi_master->query("SELECT jumlah_permintaan FROM  pb_transaksi.tb_sppb_detail where tgl_create='$cari_permintaan_barang_sppb'");
$tampil = $sql->fetch_assoc();

$jumlah_permintaan =  $tampil['jumlah_permintaan'];
// echo $jumlah_permintaan;
?>

<div class="form-group">
    <label for="exampleInputEmail111">Harga Satuan (Rp)</label>
    <input type="currency" class="form-control" name="harga_satuan" id="rupiah" onFocus="startCalc();" onBlur="stopCalc();" placeholder="Masukan Harga Satuan" required>
</div>
<div class="form-group">
    <label for="exampleInputEmail111">Total Harga (Rp)</label>
    <input type="currency" class="form-control" name="total_harga" placeholder="Total Harga PO Barang" readonly>
</div>

<?php
if (($jumlah_permintaan < $jumlah_barang_po) or ($jumlah_barang_po == '0')) {
    // echo '<b>' . 'Permintaan Tidak Sesuai' . '<br><br>';
    echo "<b style='color: red;'>Permintaan Tidak Sesuai</b><br><br>";
} else {
    echo ' '; ?>
    <?php
    if ($jumlah_barang_po <> '') { ?>
        <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
<?php }
} ?>

<a href="?page=po&aksi=detail&kode_po=<?php echo $kode_po; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_po . $angka); ?>" class="btn btn-dark">Kembali</a>

<script type="text/javascript">
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat ketik nominal di form kolom input
        // gunakan fungsi formatRupiah() untuk mengubah nominal angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka satuan ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>