aboutLoad();
var userid;
// READ About =================
function aboutLoad(){
    $.ajax({
        url: "PortfolioCRUD/About/about_list.php",
        type: "GET",
        success: function(response){
            userid = response["userid"];
            // Home Modal
            if($.trim(response["description1"]).replace(/\s+/g, ' ') != 0)
            {$('#update_description1').text(response["description1"]);}
            // About Modal
            $('#update_profession').val(response["profession"]);
            $('#update_description2').val(response["description2"]);
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

// Portfolio Home - View and Update =================
$(document).ready(function () {
    fetch_data();
    function fetch_data() {
        var action = "fetch";
        var public = "false";
        $.ajax({
            url: "PortfolioCRUD/About/about_update_home.php",
            method: "POST",
            data: { 
                action: action,
                public: public
            },
            success: function (data) {
                $("#hero-content").html(data);
            },
        });
    }
    $("#formHeroEdit").submit(function (event) {
        event.preventDefault();
        var image_name = $("#update_img_home").val();
        var extension = $("#update_img_home").val().split(".").pop().toLowerCase();
        if(jQuery.inArray(extension, ["gif", "png", "jpg", "jpeg"]) == -1 && !image_name==""){
            alert("Invalid Image File");
            $("#update_img_home").val("");
            return false;
        } else {
            $.ajax({
                url: "PortfolioCRUD/About/about_update_home.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    data = JSON.parse(data);
                    console.log(data);
                    if(data.code=='201'){
                        $('#modalHeroEdit').modal('hide');
                        console.log('Updated Successfully');
                        fetch_data();
                        aboutLoad();
                    }
                    if(data.code=='400'){
                        console.log('Error');
                        alert("Error: Update not Successful. Please try again.");
                    }
                },
            });
        }
    });
    $(document).on("click", ".main-edit-ico", function () {
        $("#action").val("update");
    });

});

// Portfolio About - View and Update =================
$(document).ready(function () {
    fetch_data();
    function fetch_data() {
        var action_about = "fetch";
        $.ajax({
            url: "PortfolioCRUD/About/about_update.php",
            method: "POST",
            data: { 
                action_about: action_about
            },
            success: function (data) {
                $("#about_content").html(data);
            },
        });
    }
    $("#formAboutEdit").submit(function (event) {
        event.preventDefault();
        var image_name = $("#update_img_about").val();
        var extension = $("#update_img_about").val().split(".").pop().toLowerCase();
        if(jQuery.inArray(extension, ["gif", "png", "jpg", "jpeg"]) == -1 && !image_name==""){
            alert("Invalid Image File");
            $("#update_img_about").val("");
            return false;
        } else {
            $.ajax({
                url: "PortfolioCRUD/About/about_update.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    data = JSON.parse(data);
                    console.log(data);
                    if(data.code=='201'){
                        $('#modalAboutEdit').modal('hide');
                        console.log('Updated Successfully');
                        fetch_data();
                        aboutLoad();
                    }
                    if(data.code=='400'){
                        console.log('Error');
                        alert("Error: Update not Successful. Please try again.");
                    }
                },
            });
        }
    });
    $(document).on("click", ".main-edit-ico", function () {
        $("#action_about").val("update");
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
        var year = $('#year_edu').val().replace('Year ','');

        e.preventDefault();
        let id = $curr_id;
        console.log(id);
        $.ajax({
            url: "PortfolioCRUD/Resume/education_update.php",
            type: "POST",
            data: {
                "id": id,
                "degree": $('#degree_edu').val(), 
                "year": year,
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
$(document).on('click','.workAdd_openModal',function(e) {
    $('#formWork').trigger("reset");
    $(".workUpdateBtn").hide();
    $(".workDeleteBtn").hide();
    $(".workCreateBtn").show();
});

function workModal_fetch_data(){
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
    });
}

$(document).ready(function () {
    fetch_data();
    function fetch_data() {
        var action_work = "fetch";
        var public = "false";
        $.ajax({
            url: "PortfolioCRUD/Work/work_read.php",
            method: "POST",
            data: { 
                action_work: action_work,
                public: public
            },
            success: function (data) {
                $("#WorkSection").html(data);
                workModal_fetch_data();
            },
        });
    }
    
    $("#formWork").submit(function (event) {
        event.preventDefault();
        var image_name = $("#work_image").val();
        var extension = $("#work_image").val().split(".").pop().toLowerCase();
        if(jQuery.inArray(extension, ["gif", "png", "jpg", "jpeg"]) == -1 && !image_name==""){
            alert("Invalid Image File");
            $("#work_image").val("");
            return false;
        } else {
            var url = "";
            if($("#action_work").val() == "create"){
                url = "PortfolioCRUD/Work/work_create.php";
            }
            if($("#action_work").val() == "update"){
                url = "PortfolioCRUD/Work/work_update.php";
            }

            $.ajax({
                url: url,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    data = JSON.parse(data);
                    console.log(data);
                    if(data.code=='201'){
                        $('#modalWork').modal('hide');
                        console.log('Updated Successfully');
                        fetch_data();
                        workModal_fetch_data();
                    }
                    if(data.code=='400'){
                        console.log('Error');
                        alert("Error: Update not Successful. Please try again.");
                    }
                },
            });
        }
    });
    // Create
    $(document).on("click", ".main-add-ico", function() {
        $('#formWork').trigger("reset");
        $("#action_work").val("create");
    });
    // Update
    $(document).on("click", ".main-edit-ico", function() {
        $("#image_work_id").val($(this).attr("data-id"));
        $("#action_work").val("update");
    });
    // Delete
    $(document).on('click', '.workDeleteBtn', function(){
        var id = $("#image_work_id").val();
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
                    fetch_data();
                }
                if(response.code=='400'){
                    console.log('Error');
                }
            }
        });
        return false;
    });
});