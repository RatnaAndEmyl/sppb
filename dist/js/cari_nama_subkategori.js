$("#kode_kategori").change(function(){
   
    // variabel dari nilai combo box jenis barang
    var kode_kategori = $("#kode_kategori").val();
    // var kode_aktiva = $("#kode_aktiva").val();

    // alert(kode_kategori); untuk mengetahui kalo misalnya kode_kategorinya udah terkirim atau belum dengan menampilkan notifikasi diatasnya tu nah...
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/cari_nama_subkategori.php", //yang url tu mengarahkan ke folder ajax dan ke file cari_nama_barang.php, oleh karena itu imbah kita olah di js, kita bikin file lagi di folder ajax dengan nama yang sama supaya lebih mudah...
        data: "kode_kategori="+kode_kategori,
        success: function(msg){
           
            // jika tkodeak ada data
            if(msg == ''){
                alert('Tidak ada data');
            }
           
            // jika dapat mengambil data,, tampilkan di combo box kota
            else{
                $("#cari_nama_subkategori").html (msg);      //ini nanti akan mengirimkan ke nama barang, makanya nama barang itu tadi diberi kode kaya gini -> kode="cari_nama_barang"                                             
            }
           
            // hilangkan image load
            $("#imgLoad").hkodee();
        }
    });    
});

// nah kalo udah bikin js nya tinggal tambahkan di bagian index, andak dibawah index tu nah mle..