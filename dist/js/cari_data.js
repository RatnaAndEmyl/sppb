$("#data_duplikat").change(function () {
    // variabel dari nilai combo box Subdepartement
    // var referensi_data = $("#referensi_data").val();
    var jenis_duplikat = $("#jenis_duplikat").val();
    var data_duplikat = $("#data_duplikat").val();
    var referensi = $("#referensi").val();
    var kode_trxtype_awal = $("#kode_trxtype_awal").val();

    // alert(data_duplikat);
    // tampilkan image load
    // mengirim dan mengambil data
    $.ajax({
      type: "POST",
      dataType: "html",
      url: "dist/ajax/caridata.php",
      data: "referensi=" + referensi + "&jenis_duplikat=" + jenis_duplikat + "&data_duplikat=" + data_duplikat + "&kode_trxtype_awal=" + kode_trxtype_awal,
      success: function (msg) {


        // jika tidak ada data
        if (msg == '') {
          alert('Tidak ada data data');
        }
  
        // jika dapat mengambil data,, tampilkan di combo box kota
        else {
          $("#referensi_data").html(msg);
          //variabel yang di panggil dibagian php

        }
  
        // hilangkan image load
        $("#imgLoad").hide();
      }
    });
  });


  $("#jenis_duplikat").change(function () {
    // variabel dari nilai combo box Subdepartement
    // var referensi_data = $("#referensi_data").val();
    var jenis_duplikat = $("#jenis_duplikat").val();
    var data_duplikat = $("#data_duplikat").val();
    var referensi = $("#referensi").val();
    var kode_trxtype_awal = $("#kode_trxtype_awal").val();

    // alert(jenis_duplikat);
    // tampilkan image load
    // mengirim dan mengambil data
    $.ajax({
      type: "POST",
      dataType: "html",
      url: "dist/ajax/caridata.php",
      data: "referensi=" + referensi + "&jenis_duplikat=" + jenis_duplikat + "&data_duplikat=" + data_duplikat + "&kode_trxtype_awal=" + kode_trxtype_awal,
      success: function (msg) {


        // jika tidak ada data
        if (msg == '') {
          alert('Tidak ada data data');
        }
  
        // jika dapat mengambil data,, tampilkan di combo box kota
        else {
          $("#referensi_data").html(msg);
          //variabel yang di panggil dibagian php

        }
  
        // hilangkan image load
        $("#imgLoad").hide();
      }
    });
  });


  $("#referensi").change(function () {
    // variabel dari nilai combo box Subdepartement
    // var referensi_data = $("#referensi_data").val();
    var jenis_duplikat = $("#jenis_duplikat").val();
    var data_duplikat = $("#data_duplikat").val();
    var referensi = $("#referensi").val();
    var kode_trxtype_awal = $("#kode_trxtype_awal").val();

    // alert(referensi);
    // tampilkan image load
    // mengirim dan mengambil data
    $.ajax({
      type: "POST",
      dataType: "html",
      url: "dist/ajax/caridata.php",
      data: "referensi=" + referensi + "&jenis_duplikat=" + jenis_duplikat + "&data_duplikat=" + data_duplikat + "&kode_trxtype_awal=" + kode_trxtype_awal,
      success: function (msg) {


        // jika tidak ada data
        if (msg == '') {
          alert('Tidak ada data data');
        }
  
        // jika dapat mengambil data,, tampilkan di combo box kota
        else {
          $("#referensi_data").html(msg);
          //variabel yang di panggil dibagian php
        }
  
        // hilangkan image load
        $("#imgLoad").hide();
      }
    });
  });