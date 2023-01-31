<?php
// usersubmodul.php
include "..\\..\\koneksi.php";
$angka = date('Ymdhis');
$cari_permintaan_barang_sppb = $_POST["cari_permintaan_barang_sppb"];
$jumlah_barang_po = $_POST["jumlah_barang_po"];
$kode_po = $_POST["kode_po"];

//  echo $cari_permintaan_barang_sppb;
//echo $jumlah_barang_po; 

$sql = $koneksi_master->query("SELECT * FROM  pb_transaksi.tb_sppb_detail WHERE tgl_create='$cari_permintaan_barang_sppb' AND status='A'");
$tampil = $sql->fetch_assoc();

$jumlah_permintaan =  $tampil['jumlah_permintaan'];
$kode_sppb =  $tampil['kode_sppb'];
$kode_barang =  $tampil['kode_barang'];

// echo $jumlah_permintaan . '<br>';
// echo $kode_sppb . '<br>';
// echo $kode_barang  . '<br>';

$sql_jumlah_pemenuhan = $koneksi_master->query("SELECT SUM(jumlah_pemenuhan) 'jumlah', harga_satuan FROM  pb_transaksi.tb_po_detail WHERE kode_sppb='$kode_sppb' AND kode_po='$kode_po' AND kode_barang='$kode_barang' AND status='A' group by kode_sppb");
$tampil_jumlah_pemenuhan = $sql_jumlah_pemenuhan->fetch_assoc();

$jumlah_pemenuhan =  $tampil_jumlah_pemenuhan['jumlah'];
$harga_satuan     =  $tampil_jumlah_pemenuhan['harga_satuan'];

// echo $jumlah_pemenuhan. '<b>';
// echo $harga_satuan. '<b>';

$jumlah_total = $jumlah_permintaan - $jumlah_pemenuhan;



$sql_cari_harga = $koneksi_master->query("SELECT harga_satuan, total_harga FROM pb_transaksi.tb_po_detail WHERE kode_po='$kode_po' AND kode_sppb='$kode_sppb' AND kode_barang='$kode_barang' AND status='A'");
$tampil_cari_harga = $sql_cari_harga->fetch_assoc();

if ($tampil_cari_harga['harga_satuan']<>'') { 
    $status_input = 'readonly';
} else {
    $status_input = 'required';
}



?>

<div class="form-group">
    <label for="exampleInputEmail111">Harga Satuan (Rp) </label>
    <input type="currency" class="form-control" name="harga_satuan" onkeyup="hitung();" id="harga_satuan" placeholder="Masukan Harga Satuan" value='<?php echo $tampil_cari_harga['harga_satuan'];?>' <?php echo $status_input;?>>
</div>
<div class="form-group">
    <label for="exampleInputEmail111">Total Harga (Rp)</label>
    <input type="currency" class="form-control" onkeyup="hitung();" id="total" placeholder="Total Harga PO Barang" readonly>
</div>

<?php
if (($jumlah_total < $jumlah_barang_po) or ($jumlah_barang_po == '0')) { ?>
    <!-- echo "<b style='color: red;'>Permintaan Tidak Sesuai</b><br><br>";  -->
     <div class="table-responsive" id="table-responsive">
        <label for="exampleInputEmail111"><b style='color: red;'>Jumlah Tidak Sesuai</b></label> <br>
<?php } else {
    echo ' '; ?>
    <?php
    if ($jumlah_barang_po <> '') { ?>
        <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
<?php }
} ?>

<a href="?page=po&aksi=detail&kode_po=<?php echo $kode_po; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_po . $angka); ?>" class="btn btn-dark">Kembali</a>


<!-- script -->
<script type="text/javascript">
    var rupiah = document.getElementById("harga_satuan");
    rupiah.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, "Rp ");
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp " + rupiah : "";
    }
    /* Fungsi formatRupiah */

    function hitung() {

        var jumlah = Number(document.getElementById('jumlah_barang_po').value);
        var getharga = document.getElementById('harga_satuan').value;
        var hargab = getharga.split(".").join("").split("Rp").join("");

        var total = jumlah * hargab;
        document.getElementById('total').value = total;

    }

    var rupiah1 = document.getElementById("total");
    rupiah1.addEventListener("keyup", function(e) {
        rupiah1.value = total(this.value, "Rp. ");
    });

    function total(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split  = number_string.split(","),
            sisa   = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : "");
    }
</script>


