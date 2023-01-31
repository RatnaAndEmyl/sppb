 
$("#pilih_suplier_bbm").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var pilih_suplier_bbm = $("#pilih_suplier_bbm").val();
    // var cari_nama_suplier = $("#cari_nama_suplier").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/pilih_suplier_bbm.php",
        data: "pilih_suplier_bbm=" + pilih_suplier_bbm,
        success: function(msg){
           
            // jika tidak ada data
            if(msg == ''){
                alert('Data Tidak Ada');
            }
           
            // jika dapat mengambil data,, tampilkan di combo box kota
            else{
               // $("#divdashboard").html(msg);                                                     
            //    location.reload();
            window.location.href = "?page=home&halaman=1";
            // window.location.href = "?page=bbm&aksi=home_bbm";
                
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
 });
 