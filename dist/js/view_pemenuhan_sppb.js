$("#cari_permintaan_barang_sppb").change(function(){
   
    var cari_permintaan_barang_sppb = $("#cari_permintaan_barang_sppb").val();
    // var jumlah_barang_disetujui = $("#jumlah_barang_disetujui").val();
    var kode_po = $("#kode_po").val();
    //  alert(kode_po);
    //  alert(cari_permintaan_barang_sppb);

    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/view_pemenuhan_sppb.php", 
        data: "cari_permintaan_barang_sppb="+cari_permintaan_barang_sppb+"&kode_po="+kode_po,
        success: function(msg){
           
            if(msg == ''){
                var div = document.getElementById('table-responsive');
                   div.remove();
            }
           
            else{
                $("#view_pemenuhan_sppb").html (msg);                                              
            }
           
            $("#imgLoad").hide();
        }
    });    
});


// $("#jumlah_barang_disetujui").keyup(function(){
   
//     var cari_permintaan_barang_sppb = $("#cari_permintaan_barang_sppb").val();
//     var jumlah_barang_disetujui = $("#jumlah_barang_disetujui").val();
//     var kode_po = $("#kode_po").val();
//     //alert(jumlah_barang_disetujui);

//     $.ajax({
//         type: "POST",
//         dataType: "html",
//         url: "dist/ajax/view_pemenuhan_sppb.php", 
//         data: "cari_permintaan_barang_sppb="+cari_permintaan_barang_sppb+"&jumlah_barang_disetujui="+jumlah_barang_disetujui+"&kode_po="+kode_po,
//         success: function(msg){
           
//             if(msg == ''){
//                 var div = document.getElementById('table-responsive');
//                    div.remove();
//             }
           
//             else{
//                 $("#view_pemenuhan_sppb").html (msg);                                              
//             }
           
//             $("#imgLoad").hide();
//         }
//     });    
// });

$("#kode_po").ready(function(){
   
    var cari_permintaan_barang_sppb = $("#cari_permintaan_barang_sppb").val();
    // var jumlah_barang_disetujui = $("#jumlah_barang_disetujui").val();
    var kode_po = $("#kode_po").val();
    //alert(kode_po);

    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/view_pemenuhan_sppb.php", 
        data: "cari_permintaan_barang_sppb="+cari_permintaan_barang_sppb+"&kode_po="+kode_po,
        success: function(msg){
           
            if(msg == ''){
                var div = document.getElementById('table-responsive');
                   div.remove();
            }
           
            else{
                $("#view_pemenuhan_sppb").html (msg);                                              
            }
           
            $("#imgLoad").hide();
        }
    });    
});





