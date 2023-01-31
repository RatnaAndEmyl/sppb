
$("#pilih_gudang_bbk").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var pilih_gudang_bbk = $("#pilih_gudang_bbk").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/pilih_gudang_bbk.php",
        data: "pilih_gudang_bbk=" + pilih_gudang_bbk,
        success: function(msg){
           
            // jika tidak ada data
            if(msg == ''){
                alert('Data Tidak Ada');
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
 