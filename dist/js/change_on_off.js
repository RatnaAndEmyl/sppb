$("#fadilcheckbox").change(function(){
    alert('masuk');
    // variabel dari nilai combo box Subdepartement
    var pilih_on_off = $("#fadilcheckbox").val();
    
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/pilih_on_off.php",
        data: "pilih_on_off=" + pilih_on_offs,
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
 