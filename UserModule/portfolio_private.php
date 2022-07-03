<!DOCTYPE html>
<html lang="en">
<head>
    <title>KEEP</title>
    <link rel="icon" href="../assets/images/icon.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- external css -->
    <link rel="stylesheet" href="css/portfolio_private.css">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap-5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link href="../assets/fontawesome-free-6.0.0-web/css/fontawesome.css" rel="stylesheet">
    <link href="../assets/fontawesome-free-6.0.0-web/css/brands.css" rel="stylesheet">
    <link href="../assets/fontawesome-free-6.0.0-web/css/solid.css" rel="stylesheet">
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>

<div class="container-fluid">
    <div id="hero-content" class="m-5 row d-flex align-items-center justify-content-center">
        <div class="col-lg-4 align-self-start">
            <img src="../assets/images/icon.png" class="d-block mx-lg-auto img-fluid" width="400" height="400" >
        </div>
        <div class="col-lg-8 py-5 mx-auto">
            <h1 class="display-5 fw-bold lh-1 mb-2"><a class="webname" href="https://keepcs.000webhostapp.com/">K E E P</a></h1>
            <div class="hr"></div>
            <?php
            session_start();
            if($_SESSION['page-found'] == 1){
            ?>
                <h2>You need access.</h2>
                <h5>
                    The Online Portfolio you requested is currently restricted.</br>
                    Ask the owner for an access.
                </h5>
            <?php
            }else{
            ?>
                <h1>4 0 4</h1>
                <h5>
                    The Page you are looking for does not exist.</br>
                </h5><br>
                <h6>Here are the possible reasons why:</h6>
                <ul class="list-group">
                    <li class="">The Online Portfolio you requested is currently restricted.</br>Ask the owner for an access.</li>
                    <li class="">The owner of the Online Portfolio that you are trying to view changed the link. Try asking the owner for a new Link to their Online portfolio.</li>
                    <li class="">There might be a typographical error on the link. Ask the owner again for their Online portfolio link.</li>
                </ul>
            <?php
            }
            ?>
            

            <button type="button" id="home" class="btn btn-primary" onClick="location.href='https://keepcs.000webhostapp.com/'">Go to our website</button>
        </div>
    </div>
</div>

</body>
</html>