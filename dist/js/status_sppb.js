
$("#status_sppb").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var status_sppb = $("#status_sppb").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/status_sppb.php",
        data: "status_sppb=" + status_sppb,
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
 