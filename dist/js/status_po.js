
$("#status_po").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var status_po = $("#status_po").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/status_po.php",
        data: "status_po=" + status_po,
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
            window.location.href = "?page=po&aksi=home_po";
                
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
 });
 