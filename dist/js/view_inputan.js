$("#ulang").change(function(){
   
    var ulang = $("#ulang").val();
    // alert(ulang);

    $.ajax({
        type: "POST",
        dataType: "html",
        url: "dist/ajax/view_inputan.php", 
        data: "ulang="+ulang,
        success: function(msg){
           
            if(msg == ''){
                var div = document.getElementById('table-responsive');
                   div.remove();
            }
           
            else{
                $("#view_inputan").html (msg);                                              
            }
           
            $("#imgLoad").hide();
        }
    });    
});



