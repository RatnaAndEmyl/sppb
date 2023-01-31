$("#cari_permintaan_barang_sppb").change(function(){
   
    var cari_permintaan_barang_sppb = $("#cari_permintaan_barang_sppb").val();
    var jumlah_barang_po = $("#jumlah_barang_po").val();
    var kode_po = $("#kode_po").val();
   //alert(kode_po);

    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/view_notifikasi_jumlah_sppb.php", 
        data: "cari_permintaan_barang_sppb="+cari_permintaan_barang_sppb+"&jumlah_barang_po="+jumlah_barang_po+"&kode_po="+kode_po,
        success: function(msg){
           
            if(msg == ''){
                var div = document.getElementById('table-responsive');
                   div.remove();
            }
           
            else{
                $("#view_notifikasi_jumlah_sppb").html (msg);                                              
            }
           
            $("#imgLoad").hide();
        }
    });    
});


$("#jumlah_barang_po").keyup(function(){
   
    var cari_permintaan_barang_sppb = $("#cari_permintaan_barang_sppb").val();
    var jumlah_barang_po = $("#jumlah_barang_po").val();
    var kode_po = $("#kode_po").val();
    //alert(jumlah_barang_po);

    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/view_notifikasi_jumlah_sppb.php", 
        data: "cari_permintaan_barang_sppb="+cari_permintaan_barang_sppb+"&jumlah_barang_po="+jumlah_barang_po+"&kode_po="+kode_po,
        success: function(msg){
           
            if(msg == ''){
                var div = document.getElementById('table-responsive');
                   div.remove();
            }
           
            else{
                $("#view_notifikasi_jumlah_sppb").html (msg);                                              
            }
           
            $("#imgLoad").hide();
        }
    });    
});

$("#kode_po").ready(function(){
   
    var cari_permintaan_barang_sppb = $("#cari_permintaan_barang_sppb").val();
    var jumlah_barang_po = $("#jumlah_barang_po").val();
    var kode_po = $("#kode_po").val();
    //alert(kode_po);

    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/view_notifikasi_jumlah_sppb.php", 
        data: "cari_permintaan_barang_sppb="+cari_permintaan_barang_sppb+"&jumlah_barang_po="+jumlah_barang_po+"&kode_po="+kode_po,
        success: function(msg){
           
            if(msg == ''){
                var div = document.getElementById('table-responsive');
                   div.remove();
            }
           
            else{
                $("#view_notifikasi_jumlah_sppb").html (msg);                                              
            }
           
            $("#imgLoad").hide();
        }
    });    
});





