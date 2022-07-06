aboutLoad();
var userid;
// READ About =================
function aboutLoad(){
    $.ajax({
        url: "PortfolioCRUD/About/about_list.php",
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
                    aboutLoad();
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
                    aboutLoad();
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


//#################################################################################################
//#################################################################################################
//#################################################################################################

skillsLoad();
skillUpdate();
function skillsLoad(){
    $('#SkillSection').empty();
    $.ajax({
        url: "PortfolioCRUD/Skill/skill_list.php",
        type: "GET",
        success: function(response){
            response.forEach(function (data, index) {
                $('#SkillSection').append(
                    '<div class="col-md-6">' +
                        '<div class="progress">' +
                            '<span class="skill">' +
                            '<a class="skillEdit_openModal main-edit-ico" data-bs-toggle="modal" data-bs-target="#modalSkill" ' +
                            'data-id="'+data.id+'"' +
                            'data-skill="'+data.skill+'"' +
                            'data-percentage="'+data.percentage+'"' +
                            '><i class="fa fa-edit"></i></a>'
                            +data.skill+' <i class="val">'+data.percentage+'%</i></span>' +
                            '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="'+data.percentage+'" aria-valuemin="0" aria-valuemax="100" style="width: '+data.percentage+'%"></div>' +
                        '</div>' +
                        '</div>'
                );

            });
        }
    });  
    
}

$(document).on('click','.skillsAdd_openModal',function(e) {
    $('#formSkill').trigger("reset");
    $(".skillUpdateBtn").hide();
    $(".skillDeleteBtn").hide();
    $(".skillCreateBtn").show();
});

// Update
function skillUpdate(){
    $curr_id = 0;
    $(document).on('click','.skillEdit_openModal',function(e) {
        $(".skillCreateBtn").hide();
        $(".skillDeleteBtn").show();
        $(".skillUpdateBtn").show();
        var id=$(this).attr("data-id");
        var skill=$(this).attr("data-skill");
        var percentage=$(this).attr("data-percentage");

        $('#input_skill').val(skill);
        $('#input_percentage').val(percentage);

        $curr_id = id;
    });

    $(document).on('click', '.skillUpdateBtn', function(e){
        e.preventDefault();
        let id = $curr_id;
        console.log(id);
        $.ajax({
            url: "PortfolioCRUD/Skill/skill_update.php",
            type: "POST",
            data: {
                "id": id,
                "skill": $('#input_skill').val(), 
                "percentage": $('#input_percentage').val()
            },
            success: function(response){
                if(response.code=='201'){
                    $('#modalSkill').modal('hide');
                    console.log('Updated Successfully');
                    skillsLoad();
                }
                if(response.code=='400'){
                    console.log('Error');
                    alert("Please Fill out all the Fields");
                }
            }
        });
        return false;
    });

    // Delete
    $(document).on('click', '.skillDeleteBtn', function(){
        let id = $curr_id;
        console.log(id)
        $.ajax({
            url: "PortfolioCRUD/Skill/skill_delete.php",
            type: "POST",
            data: {
                "id": id
            },
            success: function(response){
                if(response.code=='201'){
                    $('#modalSkill').modal('hide');
                    console.log('Deleted Successfully');
                    skillsLoad();
                }
                if(response.code=='400'){
                    console.log('Error');
                }
            }
        });
        return false;
    });
}

// Create
$(document).on('click','.skillCreateBtn',function(e) {
    e.preventDefault();
    console.log($('#input_skill').val());
    console.log($('#input_percentage').val());
    $.ajax({
        url: "PortfolioCRUD/Skill/skill_create.php",
        type: "POST",
        data: {
            "skill": $('#input_skill').val(), 
            "percentage": $('#input_percentage').val()
        },
        success: function(response){
            if(response.code=='201'){
                console.log('Created Successfully');
                $('#modalSkill').modal('hide');
                $('#formSkill').trigger("reset");
                skillsLoad();
            }else{
                console.log('Error');
                alert("Please Fill out all the Fields");
            }
        }
    });
});

//#################################################################################################
//#################################################################################################
//#################################################################################################

educationLoad();
educationUpdate();
function educationLoad(){
    $('#EducationSection').empty();
    $.ajax({
        url: "PortfolioCRUD/Resume/education_list.php",
        type: "GET",
        success: function(response){
            response.forEach(function (data, index) {
                if(data.year == 0){
                    var year = 'Year'
                }else{year = 'Year ' + data.year}
                $('#EducationSection').append(
                    '<div class="resume-item col-md-6">'+
                    '<h4> <a class="educationEdit_openModal main-edit-ico" data-bs-toggle="modal" data-bs-target="#modalEducation" ' +
                    'data-id="'+data.id+'"' +
                    'data-degree="'+data.degree+'"' +
                    'data-year="'+year+'"' +
                    'data-location="'+data.location+'"' +
                    'data-description="'+data.description+'"' +
                    '><i class="fa fa-edit"></i></a>'
                    +data.degree+'</h4>'+
                    '<h5>'+year+'</h5>'+
                    '<p><em>'+data.location+'</em></p>'+
                    '<p>'+data.description+'</p>'+
                    '</div>'
                );

            });
        }
    });  
    
}

$(document).on('click','.educationAdd_openModal',function(e) {
    $('#formEducation').trigger("reset");
    $(".educationUpdateBtn").hide();
    $(".educationDeleteBtn").hide();
    $(".educationCreateBtn").show();
});

// Update
function educationUpdate(){
    $curr_id = 0;
    $(document).on('click','.educationEdit_openModal',function(e) {
        $(".educationCreateBtn").hide();
        $(".educationDeleteBtn").show();
        $(".educationUpdateBtn").show();
        var id=$(this).attr("data-id");
        var degree=$(this).attr("data-degree");
        var year=$(this).attr("data-year");
        var location=$(this).attr("data-location");
        var description=$(this).attr("data-description");

        $('#degree_edu').val(degree);
        $('#year_edu').val(year);
        $('#location_edu').val(location);
        $('#description_edu').val(description);

        $curr_id = id;
    });

    $(document).on('click', '.educationUpdateBtn', function(e){
        e.preventDefault();
        let id = $curr_id;
        console.log(id);
        $.ajax({
            url: "PortfolioCRUD/Resume/education_update.php",
            type: "POST",
            data: {
                "id": id,
                "degree": $('#degree_edu').val(), 
                "year": $('#year_edu').val(),
                "location": $('#location_edu').val(),
                "description": $('#description_edu').val()
            },
            success: function(response){
                if(response.code=='201'){
                    $('#modalEducation').modal('hide');
                    console.log('Updated Successfully');
                    educationLoad();
                }
                if(response.code=='400'){
                    console.log('Error');
                    alert("Please Fill out all the Fields");
                }
            }
        });
        return false;
    });

    // Delete
    $(document).on('click', '.educationDeleteBtn', function(){
        let id = $curr_id;
        $.ajax({
            url: "PortfolioCRUD/Resume/education_delete.php",
            type: "POST",
            data: {
                "id": id
            },
            success: function(response){
                if(response.code=='201'){
                    $('#modalEducation').modal('hide');
                    console.log('Deleted Successfully');
                    educationLoad();
                }
                if(response.code=='400'){
                    console.log('Error');
                }
            }
        });
        return false;
    });
}

// Create
$(document).on('click','.educationCreateBtn',function(e) {
    e.preventDefault();
    $.ajax({
        url: "PortfolioCRUD/Resume/education_create.php",
        type: "POST",
        data: {
            "degree": $('#degree_edu').val(), 
            "year": $('#year_edu').val(),
            "location": $('#location_edu').val(),
            "description": $('#description_edu').val()
        },
        success: function(response){
            if(response.code=='201'){
                console.log('Created Successfully');
                $('#modalEducation').modal('hide');
                $('#formEducation').trigger("reset");
                educationLoad();
            }else{
                console.log('Error');
                alert("Please Fill out all the Fields");
            }
        }
    });
});

//#################################################################################################
//#################################################################################################
//#################################################################################################

experienceLoad();
experienceUpdate();
function experienceLoad(){
    $('#ExperienceSection').empty();
    $.ajax({
        url: "PortfolioCRUD/Resume/experience_list.php",
        type: "GET",
        success: function(response){
            response.forEach(function (data, index) {
                $('#ExperienceSection').append(
                    '<div class="resume-item  col-md-6">'+
                    '<h4> <a class="experienceEdit_openModal main-edit-ico" data-bs-toggle="modal" data-bs-target="#modalExperience" ' +
                    'data-id="'+data.id+'"' +
                    'data-job="'+data.job+'"' +
                    'data-startDate="'+data.startDate+'"' +
                    'data-endDate="'+data.endDate+'"' +
                    'data-location="'+data.location+'"' +
                    'data-description="'+data.description+'"' +
                    '><i class="fa fa-edit"></i></a>'
                    +data.job+'</h4>'+
                    '<h5>'+data.startDate+' <i>to</i> '+data.endDate+'</h5>'+
                    '<p><em>'+data.location+'</em></p>'+
                    '<p>'+data.description+'</p>'+
                    '</div>'
                );

            });
        }
    });  
    
}

$(document).on('click','.experienceAdd_openModal',function(e) {
    $('#formExperience').trigger("reset");
    $(".experienceUpdateBtn").hide();
    $(".experienceDeleteBtn").hide();
    $(".experienceCreateBtn").show();
});

// Update
function experienceUpdate(){
    $curr_id = 0;
    $(document).on('click','.experienceEdit_openModal',function(e) {
        $(".experienceCreateBtn").hide();
        $(".experienceDeleteBtn").show();
        $(".experienceUpdateBtn").show();
        var id=$(this).attr("data-id");
        var job=$(this).attr("data-job");
        var startDate=$(this).attr("data-startDate");
        var endDate=$(this).attr("data-endDate");
        var location=$(this).attr("data-location");
        var description=$(this).attr("data-description");

        $('#job_exp').val(job);
        $('#startDate_exp').val(startDate);
        $('#endDate_exp').val(endDate);
        $('#location_exp').val(location);
        $('#description_exp').val(description);

        $curr_id = id;
    });

    $(document).on('click', '.experienceUpdateBtn', function(e){
        e.preventDefault();
        let id = $curr_id;
        console.log(id);
        $.ajax({
            url: "PortfolioCRUD/Resume/experience_update.php",
            type: "POST",
            data: {
                "id": id,
                "job": $('#job_exp').val(), 
                "startDate": $('#startDate_exp').val(),
                "endDate": $('#endDate_exp').val(),
                "location": $('#location_exp').val(),
                "description": $('#description_exp').val()
            },
            success: function(response){
                if(response.code=='201'){
                    $('#modalExperience').modal('hide');
                    console.log('Updated Successfully');
                    experienceLoad();
                }
                if(response.code=='400'){
                    console.log('Error');
                    alert("Please Fill out all the Fields");
                }
            }
        });
        return false;
    });

    // Delete
    $(document).on('click', '.experienceDeleteBtn', function(){
        let id = $curr_id;
        $.ajax({
            url: "PortfolioCRUD/Resume/experience_delete.php",
            type: "POST",
            data: {
                "id": id
            },
            success: function(response){
                if(response.code=='201'){
                    $('#modalExperience').modal('hide');
                    console.log('Deleted Successfully');
                    experienceLoad();
                }
                if(response.code=='400'){
                    console.log('Error');
                }
            }
        });
        return false;
    });
}

// Create
$(document).on('click','.experienceCreateBtn',function(e) {
    e.preventDefault();
    $.ajax({
        url: "PortfolioCRUD/Resume/experience_create.php",
        type: "POST",
        data: {
            "job": $('#job_exp').val(), 
            "startDate": $('#startDate_exp').val(),
            "endDate": $('#endDate_exp').val(),
            "location": $('#location_exp').val(),
            "description": $('#description_exp').val()
        },
        success: function(response){
            if(response.code=='201'){
                console.log('Created Successfully');
                $('#modalExperience').modal('hide');
                $('#formExperience').trigger("reset");
                experienceLoad();
            }else{
                console.log('Error');
                alert("Please Fill out all the Fields");
            }
        }
    });
});

//#################################################################################################
//#################################################################################################
//#################################################################################################

serviceLoad();
serviceUpdate();
function serviceLoad(){
    $('#ServiceSection').empty();
    $.ajax({
        url: "PortfolioCRUD/Service/service_list.php",
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
                        '<a class="serviceEdit_openModal main-edit-ico" data-bs-toggle="modal" data-bs-target="#modalService" ' +
                            'data-id="'+data.id+'"' +
                            'data-service="'+data.service+'"' +
                            'data-description="'+data.description+'"' +
                            'data-link="'+data.service_link+'"' +
                            '><i class="fa fa-edit"></i></a>'+
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

$(document).on('click','.serviceAdd_openModal',function(e) {
    $('#formService').trigger("reset");
    $(".serviceUpdateBtn").hide();
    $(".serviceDeleteBtn").hide();
    $(".serviceCreateBtn").show();
});

// Update
function serviceUpdate(){
    $curr_id = 0;
    $(document).on('click','.serviceEdit_openModal',function(e) {
        $(".serviceCreateBtn").hide();
        $(".serviceDeleteBtn").show();
        $(".serviceUpdateBtn").show();
        var id=$(this).attr("data-id");
        var service=$(this).attr("data-service");
        var description=$(this).attr("data-description");
        var link=$(this).attr("data-link");

        $('#service_service').val(service);
        $('#service_description').val(description);
        $('#service_link').val(link);

        $curr_id = id;
    });

    $(document).on('click', '.serviceUpdateBtn', function(e){
        e.preventDefault();
        let id = $curr_id;
        $.ajax({
            url: "PortfolioCRUD/Service/service_update.php",
            type: "POST",
            data: {
                "id": id,
                "service": $('#service_service').val(), 
                "description": $('#service_description').val(),
                "link": $('#service_link').val()
            },
            success: function(response){
                if(response.code=='201'){
                    $('#modalService').modal('hide');
                    console.log('Updated Successfully');
                    serviceLoad();
                }
                if(response.code=='400'){
                    console.log('Error');
                    alert("Please Fill out all the Fields");
                }
            }
        });
        return false;
    });

    // Delete
    $(document).on('click', '.serviceDeleteBtn', function(){
        let id = $curr_id;
        $.ajax({
            url: "PortfolioCRUD/Service/service_delete.php",
            type: "POST",
            data: {
                "id": id
            },
            success: function(response){
                if(response.code=='201'){
                    $('#modalService').modal('hide');
                    console.log('Deleted Successfully');
                    serviceLoad();
                }
                if(response.code=='400'){
                    console.log('Error');
                }
            }
        });
        return false;
    });
}

// Create
$(document).on('click','.serviceCreateBtn',function(e) {
    e.preventDefault();
    console.log($('#service_service').val());
        console.log($('#service_description').val());
        console.log($('#service_link').val());
    $.ajax({
        url: "PortfolioCRUD/Service/service_create.php",
        type: "POST",
        data: {
            "service": $('#service_service').val(), 
            "description": $('#service_description').val(),
            "link": $('#service_link').val()
        },
        success: function(response){
            if(response.code=='201'){
                console.log('Created Successfully');
                $('#modalService').modal('hide');
                $('#formService').trigger("reset");
                serviceLoad();
            }else{
                console.log('Error');
                alert("Please Fill out all the Fields");
            }
        }
    });
});

//#################################################################################################
//#################################################################################################
//#################################################################################################

workLoad();
workUpdate();
function workLoad(){
    $('#WorkSection').empty();
    $.ajax({
        url: "PortfolioCRUD/Work/work_list.php",
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
                        '<a class="workEdit_openModal btn main-edit-ico" title="Edit" data-bs-toggle="modal" data-bs-target="#modalWork" ' +
                            'data-id="'+data.id+'"' +
                            'data-project="'+data.project+'"' +
                            'data-image="'+data.image+'"' +
                            'data-category="'+data.category+'"' +
                            'data-client="'+data.client+'"' +
                            'data-project_date="'+data.project_date+'"' +
                            'data-project_url="'+data.project_url+'"' +
                            'data-description="'+data.description+'"' +
                            '><i class="fa fa-edit"></i></a>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '</div>'
                );
            });
        }
    });  
    
}

$(document).on('click','.workAdd_openModal',function(e) {
    $('#formWork').trigger("reset");
    $(".workUpdateBtn").hide();
    $(".workDeleteBtn").hide();
    $(".workCreateBtn").show();
});

// Update
function workUpdate(){
    $curr_id = 0;

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

        $curr_id = id;
    });

    $(document).on('click','.workEdit_openModal',function(e) {
        $(".workCreateBtn").hide();
        $(".workDeleteBtn").show();
        $(".workUpdateBtn").show();
        var id=$(this).attr("data-id");
        var project=$(this).attr("data-project");
        var image=$(this).attr("data-image");
        var category=$(this).attr("data-category");
        var client=$(this).attr("data-client");
        var project_date=$(this).attr("data-project_date");
        var project_url=$(this).attr("data-project_url");
        var description=$(this).attr("data-description");

        $('#work_project').val(project);
        $('#work_category').val(category);
        $('#work_description').val(description);
        $('#work_image').val(image);
        $('#work_client').val(client);
        $('#work_date').val(project_date);
        $('#work_url').val(project_url);

        $curr_id = id;
    });

    $(document).on('click', '.workUpdateBtn', function(e){
        e.preventDefault();
        let id = $curr_id;
        $.ajax({
            url: "PortfolioCRUD/Work/work_update.php",
            type: "POST",
            data: {
                "id": id,
                "project": $('#work_project').val(), 
                "category": $('#work_category').val(),
                "description": $('#work_description').val(),
                "image": $('#work_image').val(),
                "client": $('#work_client').val(),
                "project_date": $('#work_date').val(),
                "project_url": $('#work_url').val()
            },
            success: function(response){
                if(response.code=='201'){
                    $('#modalWork').modal('hide');
                    console.log('Updated Successfully');
                    workLoad();
                }
                if(response.code=='400'){
                    console.log('Error');
                    alert("Please Fill out all the Fields");
                }
            }
        });
        return false;
    });

    // Delete
    $(document).on('click', '.workDeleteBtn', function(){
        let id = $curr_id;
        $.ajax({
            url: "PortfolioCRUD/Work/work_delete.php",
            type: "POST",
            data: {
                "id": id
            },
            success: function(response){
                if(response.code=='201'){
                    $('#modalWork').modal('hide');
                    console.log('Deleted Successfully');
                    workLoad();
                }
                if(response.code=='400'){
                    console.log('Error');
                }
            }
        });
        return false;
    });
}

// Create
$(document).on('click', '.workCreateBtn',function(e) {
    e.preventDefault();
    console.log($('#work_project').val());
    console.log($('#work_category').val());
    console.log($('#work_description').val());
    console.log($('#work_image').val());
    console.log($('#work_client').val());
    console.log($('#work_date').val());
    console.log($('#work_url').val());
    $.ajax({
        url: "PortfolioCRUD/Work/work_create.php",
        type: "POST",
        data: {
            "project": $('#work_project').val(), 
            "category": $('#work_category').val(),
            "description": $('#work_description').val(),
            "image": $('#work_image').val(),
            "client": $('#work_client').val(),
            "project_date": $('#work_date').val(),
            "project_url": $('#work_url').val()
        },
        success: function(response){
            if(response.code=='201'){
                console.log('Created Successfully');
                $('#modalWork').modal('hide');
                $('#formWork').trigger("reset");
                workLoad();
            }else{
                console.log('Error');
                alert("Please Fill out all the Fields");
            }
        }
    });
});