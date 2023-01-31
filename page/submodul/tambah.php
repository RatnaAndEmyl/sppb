<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Tambah Sub-Modul</h4>
            <div class="d-flex align-items-center">

            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <form method="POST" action="?page=submodul&aksi=tambah_proses" enctype="multipart/form-data">
                <!-- <div class="form-group">
                    <input type="text" class="form-control" name="kode_modul" hidden>
                </div> -->

                <div class="form-group">
                    <label for="exampleInputEmail111">Modul</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                        </div>
                        <select class="form-control" name="kode_modul" id="kode_modul">
                            <?php

                            echo "<option value=''>-- Pilih Modul --</option>";
                            $sql1 = $koneksi_master->query("SELECT * FROM pb_role.tb_modul where status='A' order by kode_modul");
                            while ($datacek = $sql1->fetch_assoc()) {
                                echo "<option value ='$datacek[kode_modul]'>$datacek[nama_modul]</option>";
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail111">Nama Sub-Modul</label>
                    <input type="text" class="form-control" name="nama_submodul" placeholder="Masukan Nama Sub-Modul"
                        required>
                </div>


                <label for="exampleInputEmail111">Pilih Jenis</label>
                <div class="card">
                    <div class="card-body">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis" value="H" required>
                            <label class="form-check-label" for="inlineRadio1">Href</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis" value="DT" required>
                            <label class="form-check-label" for="inlineRadio2">Data-Target</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis" value="OC" required>
                            <label class="form-check-label" for="inlineRadio2">Onclick</label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail111">Link</label>
                    <input type="text" class="form-control" name="link" placeholder="Masukan Link" required>
                </div>
                <!-- <div class="form-group">
                    <input type="date" class="form-control" name="tgl_create" hidden>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="create_by" value="<?php echo $kodeuser; ?>" hidden>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" name="tgl_update" hidden>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="update_by" hidden>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="status" value="A" hidden>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="tgl_delete" value="A" hidden>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="delete_by" value="A" hidden>
                </div> -->

                <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                <a href="?page=submodul" class="btn btn-dark">Kembali</a>

        </div>
        </form>
    </div>
</div>