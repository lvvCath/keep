<?php
function validate_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function sendMail($email, $name, $subject, $message){
  $message = message_template($email, $name, $subject, $message);
  
  $header = "From: $email \r\n";
  $header .= "MIME-Version: 1.0\r\n";
  $header .= "Content-type: text/html\r\n";
  
  $retval = mail('keep.webpage@gmail.com', 'Contact Us', $message, $header);
  
  if( $retval == true ) {
     return true;
  }else {
     return false;
  }
}

if(isset($_POST['submit'])){
  $email = validate_input($_POST['email']);
  $name = validate_input($_POST['name']);
  $subject = validate_input($_POST['subject']);
  $message = validate_input($_POST['message']);
  
  $mail_sent = sendMail($email, $name, $subject, $message);

  if($mail_sent){
      header("location: index.php?msg=success-01");
      exit();
  }else{
      header("location: index.php?error=failed-02");
      exit();
  }

}

function message_template($email, $name, $subject, $message){
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
                                                                  <h3 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;font-size:20px;font-style:normal;font-weight:bold;color:#1790f1">To: KEEP Support Team,</h3>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td class="es-m-txt-l" align="left" style="padding:0;Margin:0;padding-top:5px;padding-bottom:10px">
                                                                  <h3 style="Margin:0;line-height:20px;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;font-size:17px;font-style:normal;font-weight:bold;color:#000000">Subject:&nbsp;'. $subject .'</h3>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td align="left" style="padding:0;Margin:0;padding-top:5px;padding-bottom:10px">
                                                                  <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px"><br>'. $message .'<br><br><br><strong>From,</strong><br>'. $name .'<br><u><em>'. $email .'</em></u><br><br></p>
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
                                                                  <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;line-height:18px;color:#000000;font-size:12px"><em><span style="line-height:120%">This message is sent from the contact us section of the landing page of KEEP.</span></em></p>
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
                                                              <td align="center" style="padding:0;Margin:0">
                                                                  <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;line-height:21px;color:#f1f0f0;font-size:14px">KEEP © 2022&nbsp;CodeZ. All Rights Reserved.</p>
                                                                  <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;line-height:21px;color:#f1f0f0;font-size:14px">938 Aurora Blvd, Cubao, Quezon City, 1109 Metro Manila</p>
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