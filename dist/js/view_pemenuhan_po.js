$("#cari_permintaan_barang_po").change(function(){
   
    var cari_permintaan_barang_po = $("#cari_permintaan_barang_po").val();
    // var jumlah_barang_disetujui = $("#jumlah_barang_disetujui").val();
    var kode_bbm = $("#kode_bbm").val();
    //  alert(kode_bbm);
    //  alert(cari_permintaan_barang_po);

    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/view_pemenuhan_po.php", 
        data: "cari_permintaan_barang_po="+cari_permintaan_barang_po+"&kode_bbm="+kode_bbm,
        success: function(msg){
           
            if(msg == ''){
                var div = document.getElementById('table-responsive');
                   div.remove();
            }
           
            else{
                $("#view_pemenuhan_po").html (msg);                                              
            }
           
            $("#imgLoad").hide();
        }
    });    
});


// $("#jumlah_barang_disetujui").keyup(function(){
   
//     var cari_permintaan_barang_po = $("#cari_permintaan_barang_po").val();
//     var jumlah_barang_disetujui = $("#jumlah_barang_disetujui").val();
//     var kode_bbm = $("#kode_bbm").val();
//     //alert(jumlah_barang_disetujui);

//     $.ajax({
//         type: "POST",
//         dataType: "html",
//         url: "dist/ajax/view_pemenuhan_po.php", 
//         data: "cari_permintaan_barang_po="+cari_permintaan_barang_po+"&jumlah_barang_disetujui="+jumlah_barang_disetujui+"&kode_bbm="+kode_bbm,
//         success: function(msg){
           
//             if(msg == ''){
//                 var div = document.getElementById('table-responsive');
//                    div.remove();
//             }
           
//             else{
//                 $("#view_pemenuhan_po").html (msg);                                              
//             }
           
//             $("#imgLoad").hide();
//         }
//     });    
// });

$("#kode_bbm").ready(function(){
   
    var cari_permintaan_barang_po = $("#cari_permintaan_barang_po").val();
    // var jumlah_barang_disetujui = $("#jumlah_barang_disetujui").val();
    var kode_bbm = $("#kode_bbm").val();
    //alert(kode_bbm);

    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/view_pemenuhan_po.php", 
        data: "cari_permintaan_barang_po="+cari_permintaan_barang_po+"&kode_bbm="+kode_bbm,
        success: function(msg){
           
            if(msg == ''){
                var div = document.getElementById('table-responsive');
                   div.remove();
            }
           
            else{
                $("#view_pemenuhan_po").html (msg);                                              
            }
           
            $("#imgLoad").hide();
        }
    });    
});





