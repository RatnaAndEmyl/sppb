
$("#pilih_gudang_bbm").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var pilih_gudang_bbm = $("#pilih_gudang_bbm").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/pilih_gudang_bbm.php",
        data: "pilih_gudang_bbm=" + pilih_gudang_bbm,
        success: function(msg){
           
            // jika tidak ada data
            if(msg == ''){
                alert('Data Tidak Ada');
            }
           
            // jika dapat mengambil data,, tampilkan di combo box kota
            else{

            // window.location.href = "?page=home&halaman=1";
            window.location.href = "?page=bbm&aksi=home_bbm";
                
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
 });
 