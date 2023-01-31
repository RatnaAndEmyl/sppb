<?php
// usersubmodul.php
    include "..\\..\\koneksi.php";

    echo "<option value=''>-- Pilih Sub-modul --</option>";
   
    $sql=$koneksi_master->query("SELECT * FROM pb_role.tb_submodul where status='A' and kode_modul='".$_POST["modul"]."' and kode_submodul not in (select kode_submodul from pb_role.tb_user_submodul where kode_user='".$_POST["pengguna"]."')");
    while ($datadepartemen = $sql->fetch_assoc()) { 
   
    ?>
        <option value="<?php echo $datadepartemen["kode_submodul"] ?>"><?php echo $datadepartemen["nama_submodul"] ?></option><br>
   
    <?php } ?>

