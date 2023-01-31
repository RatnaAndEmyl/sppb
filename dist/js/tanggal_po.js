
 $("#tanggal_po").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var tanggal_po = $("#tanggal_po").val();

   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/tanggal_po.php",
        data: "tanggal_po="+tanggal_po,
        success: function(msg){
           
           
            if(msg == ''){
                alert('Tidak ada data');
            }
           
            // jika dapat mengambil data, tampilkan di combo box kota
            else{

            // window.location.href = "?page=home&halaman=1";
            window.location.href = "?page=po&aksi=home_po";
                
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
});

 