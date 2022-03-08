aboutLoad();
var userid;
// READ About =================
function aboutLoad(){
    $.ajax({
        url: "PortfolioCRUD/Public/about_list.php",
        type: "GET",
        success: function(response){
            userid = response["userid"];
            // Home
            if($.trim(response["description1"]).replace(/\s+/g, ' ') != 0)
            {$('#read_lead').text(response["description1"]);}
            if($.trim(response["image1"]).replace(/\s+/g, ' ') != 0)
            {$('#read_image1').attr('src', response["image1"]);}
            $('#update_description1').val(response["description1"]);
            $('#update_image1').val(response["image1"]);

            // About
            if($.trim(response["profession"]).replace(/\s+/g, ' ') != 0)
            {$('#read_profession').text(response["profession"]);}
            if($.trim(response["description2"]).replace(/\s+/g, ' ') != 0)
            {$('#read_description2').text(response["description2"]);}
            if($.trim(response["image2"]).replace(/\s+/g, ' ') != 0)
            {$('#read_image2').attr('src', response["image2"]);}
            $('#read_age').text(response["age"]);
            $('#read_phone').text(response["phone"]);
            $('#read_city').text(response["city"]);
            $('#read_degree').text(response["degree"]);
            $('#read_experience').text(response["experience"]);
            $('#read_website').text(response["website"]);
            $('#read_email').text(response["email"]);
            $('#read_freelance').text(response["freelance"]);
            $('#update_profession').val(response["profession"]);
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

            // Contact
            $('#contact_city').text(response["city"]);
            $('#contact_email').text(response["email"]);
            $('#contact_phone').text(response["phone"]);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
        } 
    });
}


//#################################################################################################
//#################################################################################################
//#################################################################################################

skillsLoad();
function skillsLoad(){
    $('#SkillSection').empty();
    $.ajax({
        url: "PortfolioCRUD/Public/skill_list.php",
        type: "GET",
        success: function(response){
            response.forEach(function (data, index) {
                $('#SkillSection').append(
                    '<div class="col-md-6">' +
                        '<div class="progress">' +
                            '<span class="skill">' +
                            data.skill+' <i class="val">'+data.percentage+'%</i></span>' +
                            '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="'+data.percentage+'" aria-valuemin="0" aria-valuemax="100" style="width: '+data.percentage+'%"></div>' +
                        '</div>' +
                        '</div>'
                );
            });
        }
    });
}

//#################################################################################################
//#################################################################################################
//#################################################################################################

educationLoad();
function educationLoad(){
    $('#EducationSection').empty();
    $.ajax({
        url: "PortfolioCRUD/Public/education_list.php",
        type: "GET",
        success: function(response){
            response.forEach(function (data, index) {
                $('#EducationSection').append(
                    '<div class="resume-item col-md-6">'+
                    '<h4>'+data.degree+'</h4>'+
                    '<h5>'+data.year+'</h5>'+
                    '<p><em>'+data.location+'</em></p>'+
                    '<p>'+data.description+'</p>'+
                    '</div>'
                );

            });
        }
    });  
    
}

//#################################################################################################
//#################################################################################################
//#################################################################################################

experienceLoad();
function experienceLoad(){
    $('#ExperienceSection').empty();
    $.ajax({
        url: "PortfolioCRUD/Public/experience_list.php",
        type: "GET",
        success: function(response){
            response.forEach(function (data, index) {
                $('#ExperienceSection').append(
                    '<div class="resume-item  col-md-6">'+
                    '<h4>'+data.job+'</h4>'+
                    '<h5>'+data.year+'</h5>'+
                    '<p><em>'+data.location+'</em></p>'+
                    '<p>'+data.description+'</p>'+
                    '</div>'
                );

            });
        }
    });  
    
}

//#################################################################################################
//#################################################################################################
//#################################################################################################

serviceLoad();
function serviceLoad(){
    $('#ServiceSection').empty();
    $.ajax({
        url: "PortfolioCRUD/Public/service_list.php",
        type: "GET",
        success: function(response){
            response.forEach(function (data, index) {
                let link = data.service_link;
                if($.trim(data.service_link).replace(/\s+/g, ' ') == 0){
                    link = "#services";
                }
                $('#ServiceSection').append(
                    '<div class="col-md-4">'+
                    '<div class="icon-box">'+
                        '<div class="icon"><i class="fa-solid fa-briefcase"></i></div>'+
                        '<h4 class="title"><a href="'+link+'">'+data.service+'</a></h4>'+
                        '<p class="description">'+data.description+'</p>'+
                    '</div>'+
                    '</div>'
                );

            });
        }
    });  
}

//#################################################################################################
//#################################################################################################
//#################################################################################################

workLoad();
function workLoad(){
    $('#WorkSection').empty();
    $.ajax({
        url: "PortfolioCRUD/Public/work_list.php",
        type: "GET",
        success: function(response){
            response.forEach(function (data, index) {
                let img = data.image;
                if($.trim(data.image).replace(/\s+/g, ' ') == 0){
                    img = "../assets/images/image-holder.svg";
                }
                $('#WorkSection').append(
                '<div class="col-md-4">'+
                '<div class="portfolio-wrap">'+
                    '<img src="'+ img +'" class="img-fluid portfolio-img" alt="project-image">'+
                    '<div class="portfolio-info">'+
                        '<h4>'+ data.project +'</h4>'+
                        '<p>'+ data.category +'</p>'+
                        '<div class="portfolio-links">'+
                        '<a class="btn workView_openModal" title="Portfolio Details" data-bs-toggle="modal" data-bs-target="#portfolio-modal"' +
                            'data-id="'+data.id+'"' +
                            'data-project="'+data.project+'"' +
                            'data-image="'+data.image+'"' +
                            'data-category="'+data.category+'"' +
                            'data-client="'+data.client+'"' +
                            'data-project_date="'+data.project_date+'"' +
                            'data-project_url="'+data.project_url+'"' +
                            'data-description="'+data.description+'"' +
                        '><i class="fa-solid fa-arrow-up-right-from-square"></i>'+
                        '</a>'+
                    '</div>'+
                '</div>'+
                '</div>'
                );
            });
        }
    });  
    
}

$(document).on('click','.workView_openModal',function(e) {
    var id=$(this).attr("data-id");
    var project=$(this).attr("data-project");
    var image=$(this).attr("data-image");
    var category=$(this).attr("data-category");
    var client=$(this).attr("data-client");
    var project_date=$(this).attr("data-project_date");
    var project_url=$(this).attr("data-project_url");
    var description=$(this).attr("data-description");

    if($.trim(image).replace(/\s+/g, ' ') == 0){
        image = "../assets/images/image-holder.svg";
    }
    $('#view_image').attr('src', image);
    $('#portfolioModalLabel').html(project);
    $('#view_category').html(category);
    $('#view_description').html(description);
    $('#view_client').html(client);
    $('#view_date').html(project_date);
    $('#view_url').html(project_url);
});