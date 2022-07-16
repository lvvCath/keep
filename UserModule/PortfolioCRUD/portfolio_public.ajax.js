aboutLoad();
// READ About =================
function aboutLoad(){
    $.ajax({
        url: "PortfolioCRUD/Public/contact_list.php",
        type: "GET",
        success: function(response){
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

$(document).ready(function () {
    fetch_data();
    function fetch_data() {
        var action = "fetch";
        var public = "true";
        $.ajax({
            url: "PortfolioCRUD/Public/home_list.php",
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
});

$(document).ready(function () {
    fetch_data();
    function fetch_data() {
        var action_about = "fetch";
        $.ajax({
            url: "PortfolioCRUD/Public/about_list.php",
            method: "POST",
            data: { 
                action_about: action_about,
            },
            success: function (data) {
                $("#about_content").html(data);
            },
        });
    }
});

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
                var year = data.year;
                if(data.year == 0){
                    year = "Not Indicated";
                }else{
                    year = data.year;
                }

                $('#EducationSection').append(
                    '<div class="resume-item col-md-6">'+
                    '<h4>'+data.degree+'</h4>'+
                    '<h5> Year '+year+'</h5>'+
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
                var startDate;
                var endDate;
                if(String(data.startDate) == '0000-00-00'){
                    startDate ="Start Date";
                }else{
                    startDate = Date.parse(data.startDate).toString("MMMM yyyy");
                }
                if(String(data.endDate) == '0000-00-00'){
                    endDate ="End Date";
                }else{
                    endDate = Date.parse(data.endDate).toString("MMMM yyyy");
                }

                $('#ExperienceSection').append(
                    '<div class="resume-item  col-md-6">'+
                    '<h4>'+data.job+'</h4>'+
                    '<h5>'+startDate + ' to ' + endDate+'</h5>'+
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
}

$(document).ready(function () {
    fetch_data();
    function fetch_data() {
        var action_work = "fetch";
        var public = "true";
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
    
});