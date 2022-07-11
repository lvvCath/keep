<?php

include("../../../Database/db.php");

session_start();

if (isset($_POST["action_work"])) {
    $id = $_SESSION['userid'];
    if ($_POST["action_work"] == "fetch") {
        $query = "SELECT * FROM users_work WHERE userid=".$id."";
        $result = mysqli_query($conn, $query);
        $output = ' ';
        while ($row = mysqli_fetch_array($result)) {
            $output .=
                '
                <div class="col-md-4">
                <div class="portfolio-wrap">
                    <img src="';
                    if($row["img_work"]){
                        $output .= 'data:image/jpeg;base64,'.base64_encode($row["img_work"]).'';
                    }else {
                        $output .= '../assets/images/image-holder.svg';
                    }
            
                $output .= '" class="img-fluid portfolio-img" alt="project-image">
                    <div class="portfolio-info">
                        <h4>'. $row["project"] .'</h4>
                        <p>'. $row["category"] .'</p>
                        <div class="portfolio-links">
                        <a class="btn workView_openModal" title="Portfolio Details" data-bs-toggle="modal" data-bs-target="#portfolio-modal"
                            data-id="'.$row["id"].'"
                            data-project="'.$row["project"].'"
                            data-image="';
                            if($row["img_work"]){
                                $output .= 'data:image/jpeg;base64,'.base64_encode($row["img_work"]).'';
                            }else {
                                $output .= '../assets/images/image-holder.svg';
                            }
                    
                        $output .= '"
                            data-category="'.$row["category"].'"
                            data-client="'.$row["client"].'"
                            data-project_date="'.$row["project_date"].'"
                            data-project_url="'.$row["project_url"].'"
                            data-description="'.$row["description"].'"
                        ><i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>';

                        if($_POST["public"]=="false"){
                            $output .= '
                            <a class="workEdit_openModal btn main-edit-ico" title="Edit" data-bs-toggle="modal" data-bs-target="#modalWork"
                                data-id="'.$row["id"].'"
                                data-project="'.$row["project"].'"
                                data-category="'.$row["category"].'"
                                data-client="'.$row["client"].'"
                                data-project_date="'.$row["project_date"].'"
                                data-project_url="'.$row["project_url"].'"
                                data-description="'.$row["description"].'"
                                ><i class="fa fa-edit"></i></a>';
                        }

                        $output .= '
                        </div>
                    </div>
                </div>
                </div>
                ';
        }
        echo $output;
    }

}
?>
