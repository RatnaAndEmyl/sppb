
$("#status_permintaan").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var status_permintaan = $("#status_permintaan").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/status_permintaan.php",
        data: "status_permintaan=" + status_permintaan,
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
            // window.location.href = "?page=permintaan&aksi=home_permintaan";
                
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
 });
 