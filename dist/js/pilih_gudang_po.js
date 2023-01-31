
$("#pilih_gudang_po").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var pilih_gudang_po = $("#pilih_gudang_po").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/pilih_gudang_po.php",
        data: "pilih_gudang_po=" + pilih_gudang_po,
        success: function(msg){
           
            // jika tidak ada data
            if(msg == ''){
                alert('Data Tidak Ada');
            }
           
            // jika dapat mengambil data,, tampilkan di combo box kota
            else{

            // window.location.href = "?page=home&halaman=1";
            window.location.href = "?page=po&aksi=home_po";
                
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
 });
 