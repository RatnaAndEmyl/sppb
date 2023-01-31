$("#limit").change(function () {
    // variabel dari nilai combo box Subdepartement
    var limit = $("#limit").val();
  
    // tampilkan image load
  
    // mengirim dan mengambil data
    $.ajax({
      type: "POST",
      dataType: "html",
      url: "dist/ajax/limit.php",
      data: "limit=" + limit,
      success: function (msg) {
        // jika tidak ada data
        if (msg == "") {
          alert("Tidak ada data Kota");
        }
  
        // jika dapat mengambil data,, tampilkan di combo box kota
        else {
          // $("#divkode_perijinan").html(msg);
          //    location.reload();
          window.location.href = "?page=home&halaman=1";
        }
  
        // hilangkan image load
        $("#imgLoad").hide();
      },
    });
  });