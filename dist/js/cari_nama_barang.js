$("#id_jenis_barang").change(function(){
   
    // variabel dari nilai combo box jenis barang
    var id_jenis_barang = $("#id_jenis_barang").val();
    var kode_permintaan = $("#kode_permintaan").val();

    // alert(id_jenis_barang); untuk mengetahui kalo misalnya id_jenis_barangnya udah terkirim atau belum dengan menampilkan notifikasi diatasnya tu nah...
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/cari_nama_barang.php", //yang url tu mengarahkan ke folder ajax dan ke file cari_nama_barang.php, oleh karena itu imbah kita olah di js, kita bikin file lagi di folder ajax dengan nama yang sama supaya lebih mudah...
        data: "id_jenis_barang="+id_jenis_barang+"&kode_permintaan="+kode_permintaan,
        success: function(msg){
           
            // jika tidak ada data
            if(msg == ''){
                alert('Tidak ada data barang');
            }
           
            // jika dapat mengambil data,, tampilkan di combo box kota
            else{
                $("#cari_nama_barang").html (msg);      //ini nanti akan mengirimkan ke nama barang, makanya nama barang itu tadi diberi id kaya gini -> id="cari_nama_barang"                                             
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
});

// nah kalo udah bikin js nya tinggal tambahkan di bagian index, andak dibawah index tu nah mle..