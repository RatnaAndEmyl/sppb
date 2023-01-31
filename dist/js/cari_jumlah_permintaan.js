$("#cari_jumlah_permintaan").change(function(){
   
    var cari_jumlah_permintaan = $("#cari_jumlah_permintaan").val();

    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/view_periode.php", 
        data: "cari_jumlah_permintaan="+cari_jumlah_permintaan,
        success: function(msg){
           
            if(msg == ''){
                var div = document.getElementById('table-responsive');
                   div.remove();
            }
           
            else{
                $("#view_periode").html (msg); 
                // window.location.href = "?page=bbk&aksi=home_bbk";                                             
            }
           
            $("#imgLoad").hide();
        }
    });    
});



