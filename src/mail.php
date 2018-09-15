<?php

/*foreach( $_POST as $stuff ) {
    if( is_array( $stuff ) ) {
        foreach( $stuff as $thing ) {
            echo $thing;
        }
    } else {
        echo $stuff;
    }
}*/


$message = '
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    
    <style>
        table.table{border-collapse:collapse;width:520px;margin-left:auto;margin-right:auto;margin-bottom:20px;background-color:transparent}th{border:1px solid #343a40;background-color:#d6d8db}.table td,.table th{padding:.75rem;vertical-align:top;border-top:1px solid #dee2e6}.table thead th{vertical-align:bottom;border-bottom:2px solid #dee2e6}.table tbody+tbody{border-top:2px solid #dee2e6}.table .table{background-color:#fff}.table-bordered,.table-bordered td,.table-bordered th{border:1px solid #dee2e6}.table-bordered thead td,.table-bordered thead th{border-bottom-width:2px}table.table.table-bordered{border:3px solid #343a40}.table tr>td:first-child{width:120px}th.heading{border-bottom:2px solid #343a40!important}
    </style>
</head>
<body>
<table class="table table-bordered">
    <thead>
    <tr>
        <th colspan="2">Patient Information</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Refer By:</td>
        <td>' . $_POST['refer'] . '</td>
    </tr>
    <tr>
        <td>Call time:</td>
        <td>' . $_POST['call_time'] . '</td>
    </tr>
    <tr>
        <td>Name:</td>
        <td>' . $_POST['name'] . '</td>
    </tr>
    <tr>
        <td>Date:</td>
        <td>' . $_POST['date'] . '</td>
    </tr>
    <tr>
        <td>City:</td>
        <td>' . $_POST['city'] . '</td>
    </tr>
    <tr>
        <td>Zip code:</td>
        <td>' . $_POST['zip_code'] . '</td>
    </tr>
    <tr>
        <td>Case status:</td>
        <td>' . $_POST['case_status'] . '</td>
    </tr>
    <tr>
        <td>Mobile:</td>
        <td>' . $_POST['mobile'] . '</td>
    </tr>
    </tbody>
</table>


<table class="table table-bordered">
    <thead>
    <tr>
        <th colspan="2">Accident Information</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Accident Type:</td>
        <td>' . $_POST['acc_type'] . '</td>
    </tr>
    <tr>
        <td>Accident Date:</td>
        <td>' . $_POST['acc_date'] . '</td>
    </tr>
    <tr>
        <td>Insurance 1:</td>
        <td>' . $_POST['ins_1'] . '</td>
    </tr>
    <tr>
        <td>Insurance 2:</td>
        <td>' . $_POST['ins_2'] . '</td>
    </tr>
    <tr>
        <td>Description of accident:</td>
        <td><pre>' . $_POST['acc_description'] . '</pre></td>
    </tr>
    <tr>
        <td>EMT:</td>
        <td>' . $_POST['emt'] . '</td>
    </tr>
    <tr>
        <td>Hospital:</td>
        <td>' . $_POST['hospital'] . '</td>
    </tr>
    <tr>
        <td>Injuries:</td>
        <td>' . $_POST['injuries'] . '</td>
    </tr>
    <tr>
        <td>Property Damage:</td>
        <td>' . $_POST['damage'] . '</td>
    </tr>
    <tr>
        <td>Police on Scene:</td>
        <td>' . $_POST['police_on_scene'] . '</td>
    </tr>
    <tr>
        <td>Police Report:</td>
        <td>' . $_POST['police_report'] . '</td>
    </tr>
    <tr>
        <td>Passengers (If any):</td>
        <td>' . $_POST['passengers'] . '</td>
    </tr>
    <tr>
        <td>Who received Ticket?:</td>
        <td>' . $_POST['who_ticket'] . '</td>
    </tr>
    </tbody>
</table>
<table class="table table-bordered">
    <thead>
    <tr>
        <th colspan="2">Appointment Information</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Appointment Location:</td>
        <td>' . $_POST['apmt_loc_name'] . '</td>
    </tr>
    <tr>
        <td>Location-Address:</td>
        <td><pre>' . $_POST['apmt_loc_address'] . '</pre></td>
    </tr>
    <tr>
        <td>Available Time:</td>
        <td><pre>' . $_POST['apmt_loc_available_time'] . '</pre></td>
    </tr>
    <tr>
        <td>Date:</td>
        <td>' . $_POST['apmt_date'] . '</td>
    </tr>
    <tr>
        <td>Time:</td>
        <td>' . $_POST['apmt_time'] . '</td>
    </tr>
    </tbody>
</table>
<table class="table table-bordered">
    <thead>
    <tr>
        <th colspan="2">Attorney Information</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Attorney:</td>
        <td>' . $_POST['attorney'] . '</td>
    </tr>
    <tr>
        <td>Spoke to:</td>
        <td>' . $_POST['spoke_to'] . '</td>
    </tr>
    <tr>
        <td>Notes:</td>
        <td><pre>' . $_POST['notes'] . '</pre></td>
    </tr>
    </tbody>
</table>
</body>
</html>'

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="d-none">
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ini config file
$mail_auth_arr = parse_ini_file("../config/mymail-auth.ini");
echo '<pre>';
var_dump($mail_auth_arr);

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = $mail_auth_arr['host'];  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $mail_auth_arr['username'];                 // SMTP username
    $mail->Password = $mail_auth_arr['password'];                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = (int)$mail_auth_arr['port'];                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($mail_auth_arr['to_addr'], $mail_auth_arr['to_name']);
    $mail->addAddress($mail_auth_arr['to_addr'], $mail_auth_arr['to_name']);     // Add a recipient
//    $mail->addAddress('ellen@example.com');               // Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $mail_auth_arr['subject'];
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    ?>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <a class="btn btn-primary" href="index.php">Go Back</a>
            </div>
        </div>
    </div>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    </body>
    </html>
    <script>
        (function ($) {
            $(document).ready(function () {
                
            })
        })(jQuery)
    </script>
<?php
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
