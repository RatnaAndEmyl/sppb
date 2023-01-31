<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah mapping</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=mapping_reminder&aksi=tambah_proses" 
                                enctype="multipart/form-data">
                                    
                                    
                                <div class="select2-primary">
                                        <div class="form-group">
                                        <label for="exampleInputEmail111">Trx Type</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            </div>
                                            <select class="select2" multiple="multiple" data-placeholder="Pilih TrxType"
                                            data-dropdown-css-class="select2-primary" style="width: 100%;" name="kode_trxtype[]"
                                            id="kode_trxtype">
                                            <?php
                                                echo "<option value=''>-- Pilih TrxType --</option>";
                                                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_trxtype a 
                                                WHERE a.STATUS='A' and not exists (select x.kode_trxtype from pb_master.tb_mapping_reminder x where x.kode_trxtype=a.kode_trxtype and x.status='A'
                                                ) ORDER BY a.kode_trxtype");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                echo "<option value ='$datacek[kode_trxtype]'>$datacek[deskripsi]</option>";
                                            }
                            ?>
                                                ?>
                                            </select>
                                        </div>
                                        </div>
                                        </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Perpanjangan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="jenis_masa_aktif" id="jenis_masa_aktif">
                                                <?php

                                                echo "<option value=''>-- Pilih perpanjangan --</option>";
                                                echo "<option value='days'>Days</option>";
                                                echo "<option value='month'>Month</option>";
                                                echo "<option value='year'>Year</option>";

                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Jumlah</label>
                                        <input type="number" class="form-control" name="masa_aktif" placeholder="Masukan jumlah" required>
                                    </div>

                                   

                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=mapping_reminder" class="btn btn-dark">Kembali</a>

                            
                            </form>
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </div>
    </div>
</section>