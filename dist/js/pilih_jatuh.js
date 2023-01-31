$("#pilih_jatuh").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var pilih_jatuh = $("#pilih_jatuh").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/pilih_jatuh.php",
        data: "pilih_jatuh=" + pilih_jatuh,
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
                
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
 });
 