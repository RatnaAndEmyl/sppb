
$("#status_bbm").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var status_bbm = $("#status_bbm").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/status_bbm.php",
        data: "status_bbm=" + status_bbm,
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
 