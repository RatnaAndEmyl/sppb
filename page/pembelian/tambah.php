<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Pembelian</h4>
                    </div>
                    <div class="card-body">
                        <br>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=pembelian&aksi=tambah_proses" name="autoSumForm" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Nama</label>
                                        <input type="text" class="form-control" value="<?php echo $nama ?>" name="user" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Tanggal Pembelian</label>
                                        <input type="date" class="form-control" id="txtdateofreservation" name="tanggal" placeholder="Masukan Tanggal Pembelian" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">jenis Barang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="id_jenis_barang" id="id_jenis_barang">
                                                <?php

                                                echo "<option value='' selected disabled>-- Pilih Jenis Barang --</option>";
                                                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_jenis_barang WHERE STATUS='A' ORDER BY id_jenis_barang");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                    echo "<option value ='$datacek[id_jenis_barang]'>$datacek[nama_jenis_barang]</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Nama Barang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>

                                            <select class="form-control" name="id_barang" id="cari_nama_barang">
                                                <?php
                                                echo "<option value='' selected disabled>-- Pilih Barang --</option>";
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Nama Suplier</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="kode_suplier" id="kode_suplier">
                                                <?php

                                                echo "<option value='' selected disabled>-- Pilih Nama Suplier --</option>";
                                                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_suplier WHERE STATUS='A' ORDER BY kode_suplier");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                    echo "<option value ='$datacek[kode_suplier]'>$datacek[nama_suplier]</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Jumlah Pembelian</label>
                                        <input type="currency" class="form-control" name="jumlah_pembelian" onFocus="startCalc();" onBlur="stopCalc();" placeholder="Masukan Jumlah Pembelian" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Harga Satuan (Rp)</label>
                                        <input type="currency" class="form-control" name="harga_satuan" onFocus="startCalc();" onBlur="stopCalc();" placeholder="Masukan Harga Satuan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Total Harga (Rp)</label>
                                        <input type="currency" class="form-control" name="total_harga" placeholder="Total Harga Pembelian" readonly>
                                    </div>

                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=pembelian" class="btn btn-dark">Kembali</a>
                            </div>
                            
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>