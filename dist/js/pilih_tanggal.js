
 $("#pilih_tanggal_home").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var pilih_tanggal_home = $("#pilih_tanggal_home").val();

   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/pilih_tanggal.php",
        data: "pilih_tanggal_home="+pilih_tanggal_home,
        success: function(msg){
           
           
            if(msg == ''){
                alert('Tidak ada data');
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

 