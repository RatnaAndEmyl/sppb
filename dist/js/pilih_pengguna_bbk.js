 
$("#pilih_pengguna_bbk").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var pilih_pengguna_bbk = $("#pilih_pengguna_bbk").val();
    // var cari_nama_pengguna = $("#cari_nama_pengguna").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/pilih_pengguna_bbk.php",
        data: "pilih_pengguna_bbk=" + pilih_pengguna_bbk,
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
            window.location.href = "?page=bbk&aksi=home_bbk";
                
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
 });
 