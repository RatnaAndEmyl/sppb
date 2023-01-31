<?php

$kode_trxtype        = $_GET['kode_trxtype'];
// $kode_aktiva       = $_GET['kode_aktiva'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_trxtype . $pc) <> $oc) {
?>
<script type="text/javascript">
  alert("Tidak dapat mengubah data")
  window.location.href = "logout.php";

</script>
<?php
}

$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_trxtype where kode_trxtype='$kode_trxtype'");
$tampil = $sql->fetch_assoc();
?>

<?php
$angka = date('Ymdhis');

setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal
?>

<section on class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title"><?php echo 'DOKUMEN ' ?><?php echo $tampil['deskripsi'] ?></h4>
          </div>
          <div class="card-body">
            <a href="?page=jatuh_tempo" class="btn btn-success" style="margin-bottom: 5px; "><i
                class="fa fa-arrow-circle-down"></i> Simpan</a>
            <a href="?page=jatuh_tempo&aksi=tambah&kode_trxtype=<?php echo $kode_trxtype; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka); ?>"
              class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>
              
            <div class="table-responsive">
              <table id="zero_config">
                <table class="table table-striped table-bordered datatable-select-inputs">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">Kode Aktiva</th>
                        <!-- <th scope="col" style="text-align:center; vertical-align:middle;">Kode Trxtype</th> -->

                        <?php if ($kode_trxtype == 'TRX000014') { ?>

                        <th scope="col" style="text-align:center; vertical-align:middle;">Periode Awal</th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">Periode Akhir</th>

                        <?php } else { ?>
                        <th scope="col" style="text-align:center; vertical-align:middle;">Tanggal Jatuh Tempo</th>
                        <?php } ?>
                        <th scope="col" style="text-align:center; vertical-align:middle;">Deskripsi </th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">File</th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       $no = 1;
                       $sql = $koneksi_master->query("SELECT a.tgl_jatuh_tempo, b.deskripsi_aktiva, a.deskripsi_aktiva 'desk_aktiva', a.file, a.kode_aktiva, a.kode_trxtype, a.tgl_create, a.periode_awal, a.periode_akhir FROM pb_transaksi.tb_aktiva_detail a inner join pb_transaksi.tb_aktiva b on a.kode_aktiva=b.kode_aktiva where b.status='A' and a.status='A' and a.kode_trxtype='$kode_trxtype' ORDER BY a.tgl_jatuh_tempo ASC");
                       while ($data = $sql->fetch_assoc()) {
                            $file = $data['file'];
                            // $kode_aktiva = $data['kode_aktiva']; --bisa menggunakan ini jika tidak mau mendeklarasikan dengan '""' dibawah \\
                            $sql_cari_plat = $koneksi_master->query("select * from pb_transaksi.tb_aktiva_detail where kode_aktiva='" . $data['kode_aktiva'] . "' and kode_trxtype='TRX000004' and status='A'");
                            $tampil_cari_plat = $sql_cari_plat->fetch_assoc();

                        ?>
                      <tr>
                        <td style="text-align:center; vertical-align:middle;">
                          <?php echo $no++; ?></td>
                        <td style="text-align:center; vertical-align:middle;">
                          <?php echo $data['deskripsi_aktiva']; ?>
                          (<?php echo $tampil_cari_plat['deskripsi_aktiva']; ?>)</td>
                        <!-- <td style="text-align:center; vertical-align:middle;">
                          <?php echo $data['deskripsi']; ?></td> -->

                        <?php if ($kode_trxtype == 'TRX000014') { ?>
                        <td style="text-align:center; vertical-align:middle;">
                          <?php echo strftime("%B %Y", strtotime($data['periode_awal'])); ?></td>
                        <td style="text-align:center; vertical-align:middle;">
                          <?php echo strftime("%B %Y", strtotime($data['periode_akhir'])); ?></td>
                        <?php } else { ?>
                        <td style="text-align:center; vertical-align:middle;">
                          <?php echo strftime("%A, %d %B %Y", strtotime($data['tgl_jatuh_tempo'])); ?></td>
                        <!-- digunakan untuk setting tanggal sesuai dengan tempat -->
                        <?php } ?>

                        <td style="text-align:center; vertical-align:middle;">
                          <?php echo $data['desk_aktiva']; ?>
                        </td>

                        <td style="text-align:center; vertical-align:middle;">

                          <?php if ($data['file'] == (strtoupper(substr($data['file'], -3)) <> 'JPG' and strtoupper(substr($data['file'], -4)) <> 'JPEG' and strtoupper(substr($data['file'], -3)) <> 'PNG')) { ?>

                          <a href="download.php?filename=<?= $data['file'] ?>">Download</a>

                          <?php } elseif ($data['file'] == '') { ?>
                          <?php echo "-";?>

                          <?php } else { ?>
                          <a data-toggle="modal"
                            data-target=<?php echo "#exampleModalPersetujuan" . $data['tgl_create']; ?>>View Foto</a>

                          <a href="download.php?filename=<?= $data['file'] ?>">Download</a>

                          <div class="modal fade" id=<?php echo "exampleModalPersetujuan" . $data['tgl_create']; ?>
                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel1">FOTO<?php echo $file; ?></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                      aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                  <form>
                                    <div>
                                      <img src="dist/img_web/<?php echo $data['file']; ?>" width="100%"
                                        height="100%"></a>

                                      <a href="download.php?filename=<?= $data['file'] ?>">Download</a>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php } ?>
                        </td>

                        <td style="text-align:center; vertical-align:middle;">
                          <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')"
                            href="?page=jatuh_tempo&aksi=hapus&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&kode_aktiva=<?php echo $data['kode_aktiva']; ?>&tgl_create=<?php echo $data['tgl_create']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_trxtype'] . $angka); ?>"
                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php }  ?>
                    </tbody>

                  </table>
            </div>
          </div>
</section>
