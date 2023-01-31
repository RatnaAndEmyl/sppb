$("#kode_modul").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var kode_modul = $("#kode_modul").val();
    var kode_pengguna = $("#kode_user").val();
    var server = $("#server").val();
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/view_submodul.php",
        data: "modul="+kode_modul+"&pengguna="+kode_pengguna+"&server="+server,
        //data: "pengguna="+kode_modul,
        success: function(msg){
           
            // jika tidak ada data
            if(msg == ''){
                alert('Tidak ada data Kota');
            }
           
            // jika dapat mengambil data,, tampilkan di combo box kota
            else{
                $("#kode_submodul").html(msg);                                                     
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
});