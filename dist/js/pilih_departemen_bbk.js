
$("#pilih_departemen_bbk").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var pilih_departemen_bbk = $("#pilih_departemen_bbk").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/pilih_departemen_bbk.php",
        data: "pilih_departemen_bbk=" + pilih_departemen_bbk,
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
 