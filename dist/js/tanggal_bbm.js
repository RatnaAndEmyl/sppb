
 $("#tanggal_bbm").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var tanggal_bbm = $("#tanggal_bbm").val();
   
    // mengirim dan mengambil data
    $.ajax({
        type: "bbmST",
        dataType: "html",
        url: "dist/ajax/tanggal_bbm.php",
        data: "tanggal_bbm="+tanggal_bbm,
        success: function(msg){
           
           
            if(msg == ''){
                alert('Tidak ada data');
            }
           
            // jika dapat mengambil data, tampilkan di combo box kota
            else {
            // window.location.href = "?page=home&halaman=1";
            window.location.href = "?page=bbm&aksi=home_bbm";
                
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
});

 