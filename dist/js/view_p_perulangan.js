$("#periode").change(function(){
   
    var periode = $("#periode").val();
    var tanggal_jatuh_tempo = $("#tanggal_jatuh_tempo").val();
    // alert(periode);

    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/view_p_perulangan.php", 
        data: "periode="+periode+ "&tanggal_jatuh_tempo=" + tanggal_jatuh_tempo,
        success: function(msg){
           
            if(msg == ''){
                var div = document.getElementById('table-responsive');
                   div.remove();
            }
           
            else{
                // $("#view_p_perulangan").html (msg);                                              
            }
           
            $("#imgLoad").hide();
        }
    });    
});

