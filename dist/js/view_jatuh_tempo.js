$("#jatuh_tempo").change(function(){
   
    var jatuh_tempo = $("#jatuh_tempo").val();
    var kode_trxtype_awal = $("#kode_trxtype_awal").val();
     //alert(kode_trxtype_awal);

    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/view_jatuh_tempo.php", 
        data: "jatuh_tempo="+jatuh_tempo+"&kode_trxtype_awal="+kode_trxtype_awal,
        success: function(msg){
           
            if(msg == ''){
                var div = document.getElementById('table-responsive');
                   div.remove();
            }
           
            else{
                $("#view_jatuh_tempo").html (msg);                                              
            }
           
            $("#imgLoad").hide();
        }
    });    
});




