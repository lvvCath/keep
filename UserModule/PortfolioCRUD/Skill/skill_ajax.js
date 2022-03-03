// ! THIS FILE IS NOT USED
Load();
update();
function Load(){
    $('#SkillSection').empty();
    // $('#skillsTable').dataTable({
    //     // "processing": true,
    //     "paging":   false,
    //     "ordering": false,
    //     "info":     false,
    //     "ajax": "PortfolioCRUD/Skill/skill_list.php",
    //     "columns": [
    //         {data: null,
    //             render: function ( data, type, row ) {
    //                 return '<div class="col-md-6">' +
    //                         '<div class="progress">' +
    //                             '<span class="skill">' +
    //                             '<a class="main-edit-ico skillBtn" data-bs-toggle="modal" data-bs-target="#modalSkillEdit" ' +
    //                             'data-id="'+data.id+'"' +
    //                             'data-skill="'+data.skill+'"' +
    //                             'data-percentage="'+data.percentage+'"' +
    //                             '><i class="fa fa-edit"></i></a>'
    //                             +data.skill+' <i class="val">'+data.percentage+'%</i></span>' +
    //                             '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="'+data.percentage+'" aria-valuemin="0" aria-valuemax="100" style="width: '+data.percentage+'%"></div>' +
    //                         '</div>' +
    //                         '</div>'
    //                 ;
    //             }// /Render
    //         }  // /ACTION Column
    //     ]

    // }); // /DISPLAY TABLE


    $.ajax({
        url: "PortfolioCRUD/Skill/skill_list.php",
        type: "GET",
        success: function(response){
            response.forEach(function (data, index) {
                $('#SkillSection').append(
                    '<div class="col-md-6">' +
                        '<div class="progress">' +
                            '<span class="skill">' +
                            '<a class="main-edit-ico skillBtn" data-bs-toggle="modal" data-bs-target="#modalSkillEdit" ' +
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

// Update
function update(){
    $curr_id = 0;
    $(document).on('click','.skillBtn',function(e) {
        var id=$(this).attr("data-id");
        var skill=$(this).attr("data-skill");
        var percentage=$(this).attr("data-percentage");

        $('#update_skill').val(skill);
        $('#update_percentage').val(percentage);

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
                "skill": $('#update_skill').val(), 
                "percentage": $('#update_percentage').val()
            },
            success: function(response){
                if(response.code=='201'){
                    $('#modalSkillEdit').modal('hide');
                    console.log('Updated Successfully');
                    // $('#skillsTable').DataTable().ajax.reload();
                    Load();
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
                    $('#modalSkillEdit').modal('hide');
                    console.log('Deleted Successfully');
                    // $('#skillsTable').DataTable().ajax.reload();
                    Load();
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
$( "#skillCreateBtn" ).click(function(e) {
    e.preventDefault();
    console.log($('#create_skill').val());
    console.log($('#create_percentage').val());
    $.ajax({
        url: "PortfolioCRUD/Skill/skill_create.php",
        type: "POST",
        data: {
            "skill": $('#create_skill').val(), 
            "percentage": $('#create_percentage').val()
        },
        success: function(response){
            if(response.code=='201'){
                console.log('Created Successfully');
                $('#modalSkillCreate').modal('hide');
                $('#formSkillCreate').trigger("reset");
                // $('#skillsTable').DataTable().ajax.reload();
                Load();
            }else{
                console.log('Error');
                alert("Please Fill out all the Fields");
            }
        }
    });
});

