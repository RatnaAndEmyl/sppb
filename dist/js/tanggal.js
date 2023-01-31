
 $("#tanggal_home").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var tanggal_home = $("#tanggal_home").val();

   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/tanggal.php",
        data: "tanggal_home="+tanggal_home,
        success: function(msg){
           
           
            if(msg == ''){
                alert('Tidak ada data');
            }
           
            // jika dapat mengambil data,, tampilkan di combo box kota
            else{

            // window.location.href = "?page=home&halaman=1";
            window.location.href = "?page=bbk&aksi=home_bbk";
                
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
});

 