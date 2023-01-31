
$("#pilih_departemen_sppb").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var pilih_departemen_sppb = $("#pilih_departemen_sppb").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/pilih_departemen_sppb.php",
        data: "pilih_departemen_sppb=" + pilih_departemen_sppb,
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
            window.location.href = "?page=sppb&aksi=home_sppb";
                
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
 });
 