 
$("#pilih_pengguna_bbm").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var pilih_pengguna_bbm = $("#pilih_pengguna_bbm").val();
    // var cari_nama_pengguna = $("#cari_nama_pengguna").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/pilih_pengguna_bbm.php",
        data: "pilih_pengguna_bbm=" + pilih_pengguna_bbm,
        success: function(msg){
           
            // jika tidak ada data
            if(msg == ''){
                alert('Data Tidak Ada');
            }
           
            // jika dapat mengambil data,, tampilkan di combo box kota
            else{
               // $("#divdashboard").html(msg);                                                     
            //    location.reload();
            // window.location.href = "?page=home&halaman=1";
            window.location.href = "?page=bbm&aksi=home_bbm";
                
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
 });
 