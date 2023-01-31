$("#kode_trxtype").change(function(){
   
    // variabel dari nilai combo box jenis barang
    var kode_trxtype = $("#kode_trxtype").val();

    // alert(kode_trxtype);

    // alert(kode_trxtype); untuk mengetahui kalo misalnya kode_trxtypenya udah terkirim atau belum dengan menampilkan notifikasi diatasnya tu nah...
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/view_deskripsi_aktiva.php", //yang url tu mengarahkan ke folder ajax dan ke file cari_nama_barang.php, oleh karena itu imbah kita olah di js, kita bikin file lagi di folder ajax dengan nama yang sama supaya lebih mudah...
        data: "kode_trxtype="+kode_trxtype,
        success: function(msg){
           
            // jika tidak ada data
            if(msg == ''){
                var div = document.getElementById('table-responsive');
                   div.remove();
            }
           
            // jika dapat mengambil data,, tampilkan di combo box kota
            else{
                $("#view_deskripsi_aktiva").html (msg);      //ini nanti akan mengirimkan ke nama barang, makanya nama barang itu tadi diberi id kaya gini -> id="cari_nama_barang"                                             
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
});

// nah kalo udah bikin js nya tinggal tambahkan di bagian index, andak dibawah index tu nah mle..