$("#kode_departemen").change(function(){
    // onchange pada input box akan melakukan aksi tertentu bila value/nilai dari inputbox ini berubah.
   
    // variabel dari nilai combo box jenis pemohon
    var kode_departemen = $("#kode_departemen").val();

    // alert(kode_departemen); untuk mengetahui kalo misalnya kode_departemennya udah terkirim atau belum dengan menampilkan notifikasi diatasnya tu nah...
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/cari_subdepartemen.php", //yang url tu mengarahkan ke folder ajax dan ke file cari_subdepartemen.php, oleh karena itu imbah kita olah di js, kita bikin file lagi di folder ajax dengan nama yang sama supaya lebih mudah...
        data: "kode_departemen="+kode_departemen,
        success: function(msg){
           
            // jika tidak ada data
            if(msg == ''){
                alert('Tidak ada data nama');
            }
           
            // jika dapat mengambil data,, tampilkan di combo box kota
            else{
                $("#cari_subdepartemen").html (msg);      //ini nanti akan mengirimkan ke nama pemohon, makanya nama pemohon itu tadi diberi id kaya gini -> id="cari_subdepartemen"                                             
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
});


$("#kode_departemen").ready(function(){
    // ready adalah event dari JQuery yang dijalankan pertama kali setelah dokumen dimuat. Event ini dipanggil sebelum semua gambar, css, dll dimuat
   
    // variabel dari nilai combo box kode_departemen
    var kode_departemen = $("#kode_departemen").val();

    // alert(kode_departemen); untuk mengetahui kalo misalnya kode_departemennya udah terkirim atau belum dengan menampilkan notifikasi diatasnya tu nah...
   
    // mengirim dan mengambil data
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/cari_subdepartemen.php", //yang url tu mengarahkan ke folder ajax dan ke file cari_subdepartemen.php, oleh karena itu imbah kita olah di js, kita bikin file lagi di folder ajax dengan nama yang sama supaya lebih mudah...
        data: "kode_departemen="+kode_departemen,
        success: function(msg){
           
            // jika tidak ada data
            if(msg == ''){
                alert('Tidak ada data pemohon');
            }
           
            // jika dapat mengambil data,, tampilkan di combo box kota
            else{
                $("#cari_subdepartemen").html (msg);      //ini nanti akan mengirimkan ke nama pemohon, makanya nama pemohon itu tadi diberi id kaya gini -> id="cari_subdepartemen"                                             
            }
           
            // hilangkan image load
            $("#imgLoad").hide();
        }
    });    
});

// nah kalo udah bikin js nya tinggal tambahkan di bagian index, andak dibawah index tu nah mle..