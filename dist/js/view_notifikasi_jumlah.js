$("#cari_permintaan_barang_pbk").change(function(){
   
    var cari_permintaan_barang_pbk = $("#cari_permintaan_barang_pbk").val();
    var jumlah_barang_disetujui = $("#jumlah_barang_disetujui").val();
    var kode_bbk = $("#kode_bbk").val();
    //  alert(cari_permintaan_barang_pbk);

    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/view_notifikasi_jumlah.php", 
        data: "cari_permintaan_barang_pbk="+cari_permintaan_barang_pbk+"&jumlah_barang_disetujui="+jumlah_barang_disetujui+"&kode_bbk="+kode_bbk,
        success: function(msg){
           
            if(msg == ''){
                var div = document.getElementById('table-responsive');
                   div.remove();
            }
           
            else{
                $("#view_notifikasi_jumlah").html (msg);                                              
            }
           
            $("#imgLoad").hide();
        }
    });    
});


$("#jumlah_barang_disetujui").keyup(function(){
   
    var cari_permintaan_barang_pbk = $("#cari_permintaan_barang_pbk").val();
    var jumlah_barang_disetujui = $("#jumlah_barang_disetujui").val();
    var kode_bbk = $("#kode_bbk").val();
    //alert(jumlah_barang_disetujui);

    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/view_notifikasi_jumlah.php", 
        data: "cari_permintaan_barang_pbk="+cari_permintaan_barang_pbk+"&jumlah_barang_disetujui="+jumlah_barang_disetujui+"&kode_bbk="+kode_bbk,
        success: function(msg){
           
            if(msg == ''){
                var div = document.getElementById('table-responsive');
                   div.remove();
            }
           
            else{
                $("#view_notifikasi_jumlah").html (msg);                                              
            }
           
            $("#imgLoad").hide();
        }
    });    
});

$("#kode_bbk").ready(function(){
   
    var cari_permintaan_barang_pbk = $("#cari_permintaan_barang_pbk").val();
    var jumlah_barang_disetujui = $("#jumlah_barang_disetujui").val();
    var kode_bbk = $("#kode_bbk").val();
    //alert(kode_bbk);

    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/view_notifikasi_jumlah.php", 
        data: "cari_permintaan_barang_pbk="+cari_permintaan_barang_pbk+"&jumlah_barang_disetujui="+jumlah_barang_disetujui+"&kode_bbk="+kode_bbk,
        success: function(msg){
           
            if(msg == ''){
                var div = document.getElementById('table-responsive');
                   div.remove();
            }
           
            else{
                $("#view_notifikasi_jumlah").html (msg);                                              
            }
           
            $("#imgLoad").hide();
        }
    });    
});





