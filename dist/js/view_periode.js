$("#value").change(function(){
   
    var value = $("#value").val();
    var tgl_jatuh_tempo = $("#tgl_jatuh_tempo").val();
    // alert(value);

    $.ajax({
        type: "POST",
        dataType: "html",
        dataType: "html",
        url: "dist/ajax/view_periode.php", 
        data: "value="+value+"&tgl_jatuh_tempo="+tgl_jatuh_tempo,
        success: function(msg){
           
            if(msg == ''){
                var div = document.getElementById('table-responsive');
                   div.remove();
            }
           
            else{
                $("#view_periode").html (msg);                                              
            }
           
            $("#imgLoad").hide();
        }
    });    
});



