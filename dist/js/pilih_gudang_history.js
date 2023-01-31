
$("#pilih_gudang_history").change(function(){
   
    // variabel dari nilai combo box Subdepartement
    var pilih_gudang_history = $("#pilih_gudang_history").val();
   
    // tampilkan image load
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/pilih_gudang_history.php",
        data: "pilih_gudang_history=" + pilih_gudang_history,
        success: function(msg){
           
            // jika tidak ada data
            if(msg == ''){
                alert('Data Tidak Ada');
            }
           
            // jika dapat mengambil data,, tampilkan di combo box kota
            else{
               // $("#divdashboard").html(msg);                                                     
            //    location.reload();
            // window.location.href = "?page=home&halaman=1";
            window.location.href = "?page=home&aksi=home_history_stok";
                
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
 });
 