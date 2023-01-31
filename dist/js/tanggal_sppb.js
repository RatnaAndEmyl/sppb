
 $("#tanggal_sppb").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var tanggal_sppb = $("#tanggal_sppb").val();

   
    // mengirim dan mengambil data
    $.ajax({
        type: "sppbST",
        dataType: "html",
        url: "dist/ajax/tanggal_sppb.php",
        data: "tanggal_sppb="+tanggal_sppb,
        success: function(msg){
           
           
            if(msg == ''){
                alert('Tidak ada data');
            }
           
            // jika dapat mengambil data, tampilkan di combo box kota
            else{

            // window.location.href = "?page=home&halaman=1";
            window.location.href = "?page=sppb&aksi=home_sppb";
                
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
});

 