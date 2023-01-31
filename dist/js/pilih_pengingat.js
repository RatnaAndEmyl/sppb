$("#pilih_pengingat").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var pilih_pengingat = $("#pilih_pengingat").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/pilih_pengingat.php",
        data: "pilih_pengingat=" + pilih_pengingat,
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
 