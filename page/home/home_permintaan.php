<?php setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal
$menu = '';
$limit = $_SESSION['s_limit'];

$halaman = (isset($_GET['halaman'])) ? (int) $_GET['halaman'] : 1;

$limitStart = ($halaman - 1) * $limit;

?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b> DAFTAR KARYAWAN <?php echo strtoupper($menu); ?> </b></h3>

                    </div>
                    <div class="card-body">

                        <div class="row">


                            <?php


                            $sqltext = "select * from pb_transaksi.tb_permintaan order by tgl_create desc ";
                            $sqlpaging = $sqltext;
                            $sqltext = $sqltext . " LIMIT " . $limitStart . "," . $limit;

                            
                            $sql = $koneksi_master->query($sqltext);

                            $no = $limitStart + 1;
                            $color_bg = '#FFFFFF';

                            $SqlQuery = mysqli_query($koneksi_master, $sqlpaging);

                            //Hitung semua jumlah data yang berada pada tabel Sisawa
                            $JumlahData = mysqli_num_rows($SqlQuery);

                            ?>
                            <?php if ($JumlahData == 0) {
                                $posisi = 'center';
                            } else {
                                $posisi = 'right';
                            }

                            ?>

                            <div class="col-sm-12" style="text-align:<?php echo $posisi ?>; padding-bottom:10px;">
                                <?php
                                if ($JumlahData > 0) { ?>


                                    <select class="custom-select" id="limit" style="width: 60px;" name="limit" required>

                                        <option value="5" <?php if ($_SESSION['s_limit'] == '5') {
                                                                echo 'selected';
                                                            } ?>>5</option>

                                        <option value="10" <?php if ($_SESSION['s_limit'] == '10') {
                                                                echo 'selected';
                                                            } ?>>10</option>

                                        <option value="25" <?php if ($_SESSION['s_limit'] == '25') {
                                                                echo 'selected';
                                                            } ?>>25</option>

                                        <option value="50" <?php if ($_SESSION['s_limit'] == '50') {
                                                                echo 'selected';
                                                            } ?>>50</option>
                                    </select>
                                    <?php
                                    // Jika page = 1, maka LinkPrev disable
                                    if ($halaman == 1) {
                                    ?>
                                        <!-- link Previous halaman disable -->
                                        <a class="btn btn-outline-primary" style="margin:2px;" href="#" disabled>Prev</a>
                                    <?php
                                    } else {
                                        $LinkPrev = ($halaman > 1) ? $halaman - 1 : 1;
                                    ?>
                                        <!-- link Previous Page -->
                                        <a class="btn btn-outline-primary" style="margin:2px;" href="?page=home&halaman=<?php echo $LinkPrev; ?>">Prev</a>
                                    <?php
                                    }
                                    ?>



                                    <?php


                                    // Hitung jumlah halaman yang tersedia
                                    $jumlahPage = ceil($JumlahData / $limit);

                                    if ($halaman > $jumlahPage + 1) { ?><script>
                                            window.location.href = "?page=home&halaman=1";
                                        </script> <?php }

                                                // Jumlah link number 
                                                $jumlahNumber = 1;

                                                // Untuk awal link number
                                                $startNumber = ($halaman > $jumlahNumber) ? $halaman - $jumlahNumber : 1;

                                                // Untuk akhir link number
                                                $endNumber = ($halaman < ($jumlahPage - $jumlahNumber)) ? $halaman + $jumlahNumber : $jumlahPage;

                                                for ($i = $startNumber; $i <= $endNumber; $i++) {
                                                    $linkActive = ($halaman == $i) ? '"btn btn-primary "' : '"btn btn-outline-primary" ';
                                                    ?>
                                        <a class=<?php echo $linkActive; ?> style="margin:2px;" href="?page=home&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    <?php
                                                }
                                    ?>

                                    <!-- link Next Page -->
                                    <?php
                                    if ($halaman == $jumlahPage) {
                                    ?>
                                        <a class="btn btn-outline-primary" style="margin:2px;" disabled href="#">Next</a>
                                    <?php
                                    } else {
                                        $linkNext = ($halaman < $jumlahPage) ? $halaman + 1 : $jumlahPage;
                                    ?>
                                        <a class="btn btn-outline-primary" style="margin:2px;" href="?page=home&halaman=<?php echo $linkNext; ?>">Next</a>
                                <?php
                                    }
                                    $awal = (($halaman - 1) * $limit) + 1;

                                    $akhir = (($halaman - 1) * $limit) + $limit;
                                    if ($akhir > $JumlahData) {
                                        $akhir = $JumlahData;
                                    }
                                } else {
                                    echo 'Tidak ada data.';
                                }
                                ?>
                            </div>

                            <?php
                            while ($data = $sql->fetch_assoc()) {

                            ?>

                                    <div class="col-sm-12" style="padding: 4px; background-color:bg-white;">
                                        <div class="position-relative p-3 " style="border-style: solid; border-width: thin; border-radius:50px;border-top-right-radius: 30px; background-color: <?php echo $color_bg; ?>;">
                                            <div class="ribbon-wrapper ribbon-xl">
                                                <div class="ribbon bg-<?php echo $color ?>">
                                                    <?php echo '<b>' . $status . '</b>'; ?>
                                                </div>
                                            </div>



                                            <form class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="card-body">
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-left col-md-2">Dokumen</label>
                                                                    <div class="col-md-6">
                                                                        <b><?php echo $data['kode_permintaan']; ?></b> <br>
                                                                        <b><?php echo $data['tanggal']; ?></b> <br>
                                                                        <?php echo $data['username']; ?> <br>
                                                                        <?php echo $data['nik']; ?> <?php echo '( ' . $data['jabatan'] . ' )'; ?> <br>
                                                                        <?php echo $data['nik']; ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-left col-md-2">Waktu </label>
                                                                    <div class="col-md-6">
                                                                        <?php 
                                                                            echo strtoupper(strftime("%A, %d %B %Y", strtotime($data['tanggal'])) . ' - ' . strftime("%A, %d %B %Y", strtotime($data['tanggal'])));
                                                                         ?>

                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-left col-md-2">Perihal</label>
                                                                    <div class="col-md-6">
                                                                        <b><?php echo $data['kode_permintaan']; ?><br></b>

                                                                       
                                                                        <?php 

                                                                            echo strtoupper($data['kode_gudang']);
                                                                         ?>



                                                                    </div>
                                                                </div>
                                                            </div>


                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="control-label text-left col-md-2">Aksi </label>
                                                                        <div class="col-md-6">

                                                                         <!-- SELECT `kode_permintaan`, `tanggal`, `username`, `nik`, `kode_user`, `kode_jabatan`, `jabatan`, `kode_gudang`, `status_permintaan`, `status`, `tgl_create`, `create_by`, `tgl_update`, `update_by`, `tgl_delete`, `delete_by` FROM `tb_permintaan` WHERE 1 -->



                                                                            
                                                                                <a href="?page=<?php echo $pagetambah; ?>&aksi=ubah&kode_permintaan=<?php echo $data['kode_permintaan']; ?>&nik=<?php echo $data['nik']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_permintaan'] . $angka); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>

                                                                                

                                                                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menyetujui Dokumen Ini ?')" href="?page=ijinkaryawan&aksi=proses&kode_permintaan=<?php echo $data['kode_permintaan']; ?>&nik=<?php echo $data['nik']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_permintaan'] . $angka); ?>" class="btn btn-success"><i class="fas fa-check"></i></a>

                                                                                

                                                                                <a onclick="return confirm('Apakah Anda Yakin Ingin Menolak Dokumen Ini ?')" href="?page=ijinkaryawan&aksi=tolak&kode_permintaan=<?php echo $data['kode_permintaan']; ?>&nik=<?php echo $data['nik']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_permintaan'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-times"></i></a>

                                                                        

                                                                                <a onclick="return confirm('Apakah Anda Yakin Ingin Membatalkan Dokumen Ini ?')" href="?page=ijinkaryawan&aksi=tolakhrd&kode_permintaan=<?php echo $data['kode_permintaan']; ?>&nik=<?php echo $data['nik']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_permintaan'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <?php }
                            if ($JumlahData > 0) {
                                echo '<br>Menampilkan ' . $awal . ' sampai ' . $akhir . ' dari total ' . $JumlahData . ' data.';
                            }
                                ?>

                        </div>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>

            <?php
            if ($JumlahData > 0) { ?>
                <div class="col-sm-12" style="text-align:center">



                    <?php

                    // Jika page = 1, maka LinkPrev disable
                    if ($halaman == 1) {
                    ?>
                        <!-- link Previous halaman disable -->
                        <a class="btn btn-outline-primary" style="margin:2px;" href="#" disabled>Prev</a>
                    <?php
                    } else {
                        $LinkPrev = ($halaman > 1) ? $halaman - 1 : 1;
                    ?>
                        <!-- link Prev Page -->
                        <a class="btn btn-outline-primary" style="margin:2px;" href="?page=home&halaman=<?php echo $LinkPrev; ?>">Prev</a>
                    <?php
                    }
                    ?>

                    <?php
                    $SqlQuery = mysqli_query($koneksi_master, $sqlpaging);

                    //Hitung semua jumlah data yang berada pada tabel Sisawa
                    $JumlahData = mysqli_num_rows($SqlQuery);


                    // Hitung jumlah halaman yang tersedia
                    $jumlahPage = ceil($JumlahData / $limit);

                    // Jumlah link number 
                    $jumlahNumber = 1;

                    // Untuk awal link number
                    $startNumber = ($halaman > $jumlahNumber) ? $halaman - $jumlahNumber : 1;

                    // Untuk akhir link number
                    $endNumber = ($halaman < ($jumlahPage - $jumlahNumber)) ? $halaman + $jumlahNumber : $jumlahPage;

                    for ($i = $startNumber; $i <= $endNumber; $i++) {
                        $linkActive = ($halaman == $i) ? '"btn btn-primary "' : '"btn btn-outline-primary" ';
                    ?>
                        <a class=<?php echo $linkActive; ?> style="margin:2px;" href="?page=home&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php
                    }
                    ?>

                    <!-- link Next Page -->
                    <?php
                    if ($halaman == $jumlahPage) {
                    ?>
                        <a class="btn btn-outline-primary" style="margin:2px;" disabled href="#">Next</a>
                    <?php
                    } else {
                        $linkNext = ($halaman < $jumlahPage) ? $halaman + 1 : $jumlahPage;
                    ?>
                        <a class="btn btn-outline-primary" style="margin:2px;" href="?page=home&halaman=<?php echo $linkNext; ?>">Next</a>
                    <?php
                    }

                    ?>
                </div>
            <?php } ?>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->