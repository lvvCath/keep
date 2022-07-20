<?php
require_once '../../Database/db.php';

function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function sendMail($fr_email, $to_email, $name, $subject, $message){
    $message = message_template($fr_email, $name, $message);
    
    $header = "From: $fr_email \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
    
    $retval = mail($to_email, $subject, $message, $header);
    
    if( $retval == true ) {
       return true;
    }else {
       return false;
    }
}

session_start();
$id = $_SESSION['share-userid'];
$query = "SELECT `users`.`usersEmail`, `users_share`.`token` 
            FROM `users` 
            LEFT JOIN `users_share` 
            ON `users_share`.`userid` = `users`.`usersId` 
            WHERE usersId='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

$to_email = $row['usersEmail'];
$fr_email = validate_input($_POST['email']);
$name = validate_input($_POST['name']);
$subject = validate_input($_POST['subject']);
$message = validate_input($_POST['message']);

$token = $row['token'];

// uncomment in webhost
// $mail_sent = sendMail($fr_email, $to_email, $name, $subject, $message);
// if($result && $mail_sent){

if($result){
    header("location: ../portfolio.php?v=$token&msg=success-01");
    exit();
}else{
    header("location: ../portfolio.php?v=$token&error=failed-01");
    exit();
}

function message_template($email, $name, $message){
    $message = '
    <body style="width:100%;font-family:arial, helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
    <div class="es-wrapper-color" style="background-color:#FAFAFA">
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#FAFAFA">
            <tr>
                <td valign="top" style="padding:0;Margin:0">
                    <table class="es-header" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                        <tr>
                            <td align="center" style="padding:0;Margin:0">
                                <table class="es-header-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
                                    <tr>
                                        <td align="left" bgcolor="#ffffff" style="padding:20px;Margin:0;background-color:#ffffff">
                                            <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                <tr>
                                                    <td class="es-m-p0r" valign="top" align="center" style="padding:0;Margin:0;width:560px">
                                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td align="center" style="padding:0;Margin:0;padding-bottom:10px;font-size:0px"><img src="https://vthpwe.stripocdn.email/content/guids/CABINET_4a4b6ed99abc1eb311ef6f134133e4be/images/keep_logo1.png" alt="Logo" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;font-size:12px" width="200" title="Logo"></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                        <tr>
                            <td align="center" style="padding:0;Margin:0">
                                <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;border-top:10px solid #1293fb;width:600px;border-bottom:10px solid #333333" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                    <tr>
                                        <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
                                            <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                <tr>
                                                    <td valign="top" align="center" style="padding:0;Margin:0;width:560px">
                                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td class="es-m-txt-l" align="left" style="padding:0;Margin:0;padding-top:5px;padding-bottom:10px">
                                                                    <h3 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;font-size:20px;font-style:normal;font-weight:bold;color:#1790f1">Dear KEEP Portfolio owner,</h3>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" style="padding:0;Margin:0;padding-top:5px;padding-bottom:10px">
                                                                    <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px"><br> '. $message .' <br><br><br><strong>From,</strong><br> '. $name .' <br><u><em> '. $email .' </em></u><br><br></p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                        <tr>
                            <td align="center" style="padding:0;Margin:0">
                                <table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#efefef" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#efefef;width:600px">
                                    <tr>
                                        <td align="left" style="padding:20px;Margin:0">
                                            <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                <tr>
                                                    <td valign="top" align="center" style="padding:0;Margin:0;width:560px">
                                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td esdev-links-color="#ffffff" align="center" style="padding:0;Margin:0">
                                                                    <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;line-height:18px;color:#000000;font-size:12px"><em><span style="line-height:120%">This message is from one of the viewers who visited your portfolio. If you wish to respond to their message, you can directly send them an email using the email address that they have provided along the message. If not, you can disregard this message.</span></em></p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                        <tr>
                            <td align="center" style="padding:0;Margin:0">
                                <table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                                    <tr>
                                        <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#2a2929" bgcolor="#2a2929">
                                            <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                <tr>
                                                    <td align="left" style="padding:0;Margin:0;width:560px">
                                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td align="center" style="padding:0;Margin:0;padding-bottom:35px">
                                                                    <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;line-height:21px;color:#f1f0f0;font-size:14px">KEEP © 2022&nbsp;CodeZ. All Rights Reserved.</p>
                                                                    <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;line-height:21px;color:#f1f0f0;font-size:14px">938 Aurora Blvd, Cubao, Quezon City, 1109 Metro Manila</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:0;Margin:0">
                                                                    <table cellpadding="0" cellspacing="0" width="100%" class="es-menu" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                        <tr class="links">
                                                                            <td align="center" valign="top" width="33.33%" style="Margin:0;padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:5px;border:0"><a target="_blank" href="https://keepcs.000webhostapp.com/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;display:block;font-family:arial, helvetica, sans-serif;color:#ffffff;font-size:14px">Visit Us </a></td>
                                                                            <td align="center" valign="top" width="33.33%" style="Margin:0;padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:5px;border:0;border-left:1px solid #efefef"><a target="_blank" href="https://keepcs.000webhostapp.com/LoginModule/terms.php" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;display:block;font-family:arial, helvetica, sans-serif;color:#ffffff;font-size:14px">Privacy Policy</a></td>
                                                                            <td align="center" valign="top" width="33.33%" style="Margin:0;padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:5px;border:0;border-left:1px solid #efefef"><a target="_blank" href="https://keepcs.000webhostapp.com/LoginModule/terms.php" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;display:block;font-family:arial, helvetica, sans-serif;color:#ffffff;font-size:14px">Terms of Use</a></td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
    ';

    return $message;
}

?>