
$("#pilih_dashboard").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var pilih_dashboard = $("#pilih_dashboard").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/pilih_dashboard.php",
        data: "pilih_dashboard=" + pilih_dashboard,
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
            // window.location.href = "?page=homr&aksi=home_bbm";
                
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
 });
 