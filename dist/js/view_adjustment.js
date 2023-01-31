$("#adjustment").change(function(){
   
    var adjustment = $("#adjustment").val();
    // var tgl_jatuh_tempo = $("#tgl_jatuh_tempo").val();
    // alert(adjustment);

    $.ajax({
        type: "POST",
        dataType: "html",
        dataType: "html",
        url: "dist/ajax/view_adjustment.php", 
        data: "adjustment="+adjustment,
        success: function(msg){
           
            if(msg == ''){
                var div = document.getElementById('table-responsive');
                   div.remove();
            }
           
            else{
                $("#view_adjustment").html (msg);                                              
            }
           
            $("#imgLoad").hide();
        }
    });    
});



