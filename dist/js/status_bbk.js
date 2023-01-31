
$("#status_bbk").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var status_bbk = $("#status_bbk").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/status_bbk.php",
        data: "status_bbk=" + status_bbk,
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
 