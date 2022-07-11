<?php
include("../../../Database/db.php");

function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

session_start();
if (isset($_POST["action_about"])) {
    $id = $_SESSION['userid'];
    
    if ($_POST["action_about"] == "fetch") {
        $query = "SELECT * FROM users_info WHERE userid=".$id."";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $output = '
        <div class="col-lg-4" data-aos="fade-right">
            <img id="read_image2" src="';
            if($row["img_about"]){
                $output .= 'data:image/jpeg;base64,'.base64_encode($row["img_about"]).'';
            }else {
                $output .= '../assets/images/default-profile.jpg';
            }
    
        $output .= '" class="img-fluid" width="242" height="363">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3 id="read_profession">';
            if($row["description1"]){
                $output .= $row["profession"];
            }else {
                $output .= 'Your Profession';
            }        
                    
            
            $output .= '</h3>
            <p id="read_description2" class="text-break">';
            if($row["description1"]){
                $output .= $row["description2"];
            }else {
                $output .= '
                Tell the readers in this About me section more about you. You want to make sure visitors and readers 
                of your online portfolio to understand your work, but you don’t want to go into too much detail and create 
                a long essay about yourself in case they lose interest. </br>
                <span class="edit_Help font-monospace">To edit this section, click the edit icon <i class="fa fa-edit"></i> found the top left.</span>';
            }        
                    
            
            $output .= '</p>
            <div class="row">
            <div class="col-lg-6">
                <ul>
                <li><i class="fa-solid fa-diamond"></i> <strong>Age:</strong> <span id="read_age">' .$row["age"]. '</span></li>
                <li><i class="fa-solid fa-diamond"></i> <strong>Phone:</strong> <span id="read_phone">' .$row["phone"]. '</span></li>
                <li><i class="fa-solid fa-diamond"></i> <strong>City:</strong> <span id="read_city">' .$row["city"]. '</span></li>
                <li><i class="fa-solid fa-diamond"></i> <strong>Degree:</strong> <span id="read_degree">' .$row["degree"]. '</span></li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul>
                <li><i class="fa-solid fa-diamond"></i> <strong>Years of Experience:</strong> <span id="read_experience">' .$row["experience"]. '</span></li>
                <li><i class="fa-solid fa-diamond"></i> <strong>Website:</strong> <span id="read_website"></span>' .$row["website"]. '</li>
                <li><i class="fa-solid fa-diamond"></i> <strong>Work Email:</strong> <span id="read_email">' .$row["email"]. '</span></li>
                <li><i class="fa-solid fa-diamond"></i> <strong>Freelance:</strong> <span id="read_freelance">' .$row["freelance"]. '</span></li>
                </ul>
            </div>
            </div>
        </div>
        ';
        echo $output;
    }

    if ($_POST["action_about"] == "update") {
        $profession = validate_input($_POST['update_profession']);
        $description2 = validate_input($_POST['update_description2']);
        $age = validate_input($_POST['update_age']);
        $phone = validate_input($_POST['update_phone']);
        $city = validate_input($_POST['update_city']);
        $degree = validate_input($_POST['update_degree']);
        $experience = validate_input($_POST['update_experience']);
        $website = validate_input($_POST['update_website']);
        $email = validate_input($_POST['update_email']);
        $freelance = validate_input($_POST['update_freelance']);

        if($_FILES["update_img_about"]["tmp_name"] == ""){
            $sql = "UPDATE users_info SET 
                                            profession=?, 
                                            description2=?,
                                            age=?,
                                            phone=?,
                                            city=?,
                                            degree=?,
                                            experience=?,
                                            website=?,
                                            email=?,
                                            freelance=?
                        WHERE userid = ?;";

            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql) ){
                echo json_encode(['code' => '400']);
            }
            mysqli_stmt_bind_param($stmt, "ssisssisssi",   $profession, 
                                                            $description2,
                                                            $age, 
                                                            $phone, 
                                                            $city, 
                                                            $degree, 
                                                            $experience, 
                                                            $website, 
                                                            $email, 
                                                            $freelance, 
                                                            $id);
        }else{
            $file = file_get_contents($_FILES["update_img_about"]["tmp_name"]);
            $sql = "UPDATE users_info SET   img_about=?, 
                                            profession=?, 
                                            description2=?,
                                            age=?,
                                            phone=?,
                                            city=?,
                                            degree=?,
                                            experience=?,
                                            website=?,
                                            email=?,
                                            freelance=?
                        WHERE userid = ?;";

            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql) ){
                echo json_encode(['code' => '400']);
            }
            mysqli_stmt_bind_param($stmt, "sssisssisssi",   $file,
                                                            $profession, 
                                                            $description2,
                                                            $age, 
                                                            $phone, 
                                                            $city, 
                                                            $degree, 
                                                            $experience, 
                                                            $website, 
                                                            $email, 
                                                            $freelance, 
                                                            $id);
        }

        mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_close($stmt);
            if($result){
                echo json_encode([
                    'code' => '201'
                ]);
            }else{
                echo json_encode([
                    'code' => '400'
                ]);
            }
        
    }
}

?>