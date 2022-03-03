// ! THIS FILE IS NOT USED
Load();
var userid;
// READ About =================
function Load(){
    $.ajax({
        url: "PortfolioCRUD/About/about_list.php",
        type: "GET",
        success: function(response){
                userid = response["userid"];
                if($.trim(response["description1"]).replace(/\s+/g, ' ') != 0){
                    // Home
                    $('#read_lead').text(response["description1"]);
                    $('#read_image1').attr('src', response["image1"]);
                    // Modal
                    $('#update_description1').val(response["description1"]);
                    $('#update_image1').val(response["image1"]);
                }
                if($.trim(response["profession"]).replace(/\s+/g, ' ') != 0){
                    // About
                    $('#read_profession').text(response["profession"]);
                    // Modal
                    $('#update_profession').val(response["profession"]);
                }
                if($.trim(response["description2"]).replace(/\s+/g, ' ') != 0){    
                    // About
                    $('#read_description2').text(response["description2"]);
                    $('#read_image2').attr('src', response["image2"]);
                    $('#read_age').text(response["age"]);
                    $('#read_phone').text(response["phone"]);
                    $('#read_city').text(response["city"]);
                    $('#read_degree').text(response["degree"]);
                    $('#read_experience').text(response["experience"]);
                    $('#read_website').text(response["website"]);
                    $('#read_email').text(response["email"]);
                    $('#read_freelance').text(response["freelance"]);
                    // Modal
                    $('#update_description2').val(response["description2"]);
                    $('#update_image2').val(response["image2"]);
                    $('#update_age').val(response["age"]);
                    $('#update_phone').val(response["phone"]);
                    $('#update_city').val(response["city"]);
                    $('#update_degree').val(response["degree"]);
                    $('#update_experience').val(response["experience"]);
                    $('#update_website').val(response["website"]);
                    $('#update_email').val(response["email"]);
                    $('#update_freelance').val(response["freelance"]);
                }

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
        } 
    });
    
}
// UPDATE Home Modal =================
$(document).ready(function(){
    $("#introUpdateBtn").click(function(){
        $.ajax({
            url: "PortfolioCRUD/About/about_update_home.php",
            type: "POST",
            data: {
                "userid": userid,
                "description1":  $('#update_description1').val(), 
                "image1": $('#update_image1').val()
            },
            success: function(response){
                console.log(response);
                if(response.code=='201'){
                    $('#modalHeroEdit').modal('hide');
                    console.log('Updated Successfully');
                    Load();
                }
                if(response.code=='400'){
                    console.log('Error');
                    alert("Error: Update not Successful. Please try again.");
                }
            }
        });
        Load();
        return false; 
    });
});

// UPDATE Home Modal =================
$(document).ready(function(){
    $("#aboutUpdateBtn").click(function(){
        $.ajax({
            url: "PortfolioCRUD/About/about_update.php",
            type: "POST",
            data: {
                "userid": userid,
                "profession":  $('#update_profession').val(), 
                "description2":  $('#update_description2').val(), 
                "image2": $('#update_image2').val(),
                "age": $('#update_age').val(),
                "phone": $('#update_phone').val(),
                "city": $('#update_city').val(),
                "degree": $('#update_degree').val(),
                "experience": $('#update_experience').val(),
                "website": $('#update_website').val(),
                "email": $('#update_email').val(),
                "freelance": $('#update_freelance').val()
            },
            success: function(response){
                console.log(response);
                if(response.code=='201'){
                    $('#modalAboutEdit').modal('hide');
                    console.log('Updated Successfully');
                    Load();
                }
                if(response.code=='400'){
                    console.log('Error');
                    alert("Error: Update not Successful. Please try again.");
                }
            }
        });
        return false;
    });
});
