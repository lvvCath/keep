shareLoad();

// READ About =================
function shareLoad(){
    $.ajax({
        url: "PortfolioCRUD/Share/share_list.php",
        type: "GET",
        success: function(response){
            // $('#share_link').val("https://keepcs.000webhostapp.com/UserModule/portfolio.php?v=" + response["token"]);
            $('#share_link').val("http://localhost/TIP/Project/CS005Project/UserModule/portfolio.php?v=" + response["token"]);
            // 1 true = public, 0 false = private
            if(response["permission"] == 0){
                $("#fa-public-i").attr("hidden",true);
                $("#fa-private-i").attr("hidden",false);
                $('#btn-desc').html('<strong>PRIVATE:</strong> <i>No one on the internet with this link can view your Online Portfolio</i>');
            }else{
                $("#fa-public-i").attr("hidden",false);
                $("#fa-private-i").attr("hidden",true);
                $('#btn-desc').html('<strong>PUBLIC:</strong> <i>Anyone on the internet with this link can view your Online Portfolio</i>');
            }
            
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
        } 
    });
    
}


$(document).ready(function(){
    $("#public").click(function(){
        console.log("PUBLIC");
        
        $.ajax({
            url: "PortfolioCRUD/Share/share_permission_update.php",
            type: "POST",
            data: {
                "permission":  1
            },
            success: function(response){
                console.log(response);
                if(response.code=='201'){
                    $('.dropdown-menu').mouseleave(function () {
                        $("#dropdown-permission").dropdown('toggle');
                      });
                    console.log('Updated Successfully');
                    shareLoad();
                }
                if(response.code=='400'){
                    console.log('Error');
                    alert("Error: Update not Successful. Please try again.");
                }
            }
        });
        return false; 

    });

    $("#private").click(function(){
        console.log("PRIVATE");
        $.ajax({
            url: "PortfolioCRUD/Share/share_permission_update.php",
            type: "POST",
            data: {
                "permission":  0
            },
            success: function(response){
                console.log(response);
                if(response.code=='201'){
                    $('.dropdown-menu').mouseleave(function () {
                        $("#dropdown-permission").dropdown('toggle');
                      });
                    console.log('Updated Successfully');
                    shareLoad();
                }
                if(response.code=='400'){
                    console.log('Error');
                    alert("Error: Update not Successful. Please try again.");
                }
            }
        });
        return false; 
    });

    $('#genLinkBtn').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'PortfolioCRUD/Share/share_link.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            console.log(response);
            if(response.code=='201'){
                console.log('Link Generated Successfully');
                shareLoad();
            }
            if(response.code=='400'){
                console.log('Error');
                alert("Error: Update not Successful. Please try again.");
            }
        });
        return false; 
    });

});