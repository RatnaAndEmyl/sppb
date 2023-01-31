
$("#pilih_departemen").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var pilih_departemen = $("#pilih_departemen").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/pilih_departemen.php",
        data: "pilih_departemen=" + pilih_departemen,
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
 