<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';

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
        <td>Name:</td>
        <td>' . $_POST['form_name'] . '</td>
    </tr>
    <tr>
        <td>Phone Number:</td>
        <td>' . $_POST['form_phn'] . '</td>
    </tr>
    <tr>
        <td>Language:</td>
        <td>' . $_POST['form_lang'] . '</td>
    </tr>
    </tbody>
</table>
';
if($_POST['form_accident'] == 'ca'){
    $message .= '
<table class="table table-bordered">
    <thead>
    <tr>
        <th colspan="2">Accident Information</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Accident:</td>
        <td>Road Accident</td>
    </tr>
    <tr>
        <td>Type of Accident:</td>
        <td>' . $_POST['form_type'] . '</td>
    </tr>
    <tr>
        <td>Strong impact:</td>
        <td>' . $_POST['form_impact'] . '</td>
    </tr>
    <tr>
        <td>Struck from:</td>
        <td>' . $_POST['form_struck'] . '</td>
    </tr>
    <tr>
        <td>Property Damage:</td>
        <td>' . $_POST['form_damage'] . '</td>
    </tr>
    <tr>
        <td>Rescue or Ambulance called:</td>
        <td>' . $_POST['form_rescue'] . '</td>
    </tr>
    <tr>
        <td>Police on the scene:</td>
        <td>' . $_POST['form_police'] . '</td>
    </tr>
    <tr>
        <td>Did you go to the hospital:</td>
        <td>' . $_POST['form_hospital'] . '</td>
    </tr>
    <tr>
        <td>Get Police report:</td>
        <td>' . $_POST['form_plice_report'] . '</td>
    </tr>
    <tr>
        <td>Any Passenger with you:</td>
        <td>' . $_POST['form_passengers'] . '</td>
    </tr>
    <tr>
        <td>Injuries:</td>
        <td>' . $_POST['form_injury'] . '</td>
    </tr>
    <tr>
        <td>Who received the ticket?</td>
        <td>' . $_POST['form_ticket'] . '</td>
    </tr>
    <tr>
        <td>What insurance they had?</td>
        <td>' . $_POST['form_their_insurance'] . '</td>
    </tr>
    <tr>
        <td>Vehicle insurance company name:</td>
        <td>' . $_POST['form_vehicle_insurance_company'] . '</td>
    </tr>
    <tr>
        <td>What type of car hit you?</td>
        <td>' . $_POST['form_car_type'] . '</td>
    </tr>
    <tr>
        <td>Was it an Uber or a Lyft?</td>
        <td>' . $_POST['form_car_company'] . '</td>
    </tr>
    </tbody>
</table>
';
} elseif ($_POST['form_accident'] == 'sf'){
    $message .= '
<table class="table table-bordered">
    <thead>
    <tr>
        <th colspan="2">Accident Information</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Accident:</td>
        <td>Slip and Fall Accident</td>
    </tr>
    <tr>
        <td>Where did it happen?</td>
        <td>' . $_POST['form_where'] . '</td>
    </tr>
    <tr>
        <td>Did the manager make a report of the incident?</td>
        <td>' . $_POST['form_manager_report'] . '</td>
    </tr>
    <tr>
        <td>Rescue or Ambulance called:</td>
        <td>' . $_POST['form_rescue'] . '</td>
    </tr>
    <tr>
        <td>Did you go to the hospital?</td>
        <td>' . $_POST['form_hospital'] . '</td>
    </tr>
    <tr>
        <td>When did it occur?</td>
        <td>' . $_POST['form_time'] . '</td>
    </tr>
    <tr>
        <td>How you heard about us?</td>
        <td>' . $_POST['form_affiliate'] . '</td>
    </tr>
    <tr>
        <td>Would you like to speak to an attorney?</td>
        <td>' . $_POST['form_attorney'] . '</td>
    </tr>
    </tbody>
</table>
';
}

//footer
$message .= '</body></html>';

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
$mail_auth_arr = parse_ini_file("../config/mail-auth.ini");
echo '<pre>';
var_dump($mail_auth_arr);
echo '</pre>';
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
                <h1 class="mb-4">Your mail has been sent to: <?php echo $mail_auth_arr['to_addr']; ?></h1>
                <a class="btn btn-primary" href="index.php">Go Back</a>
            </div>
        </div>
    </div>
    
<?php
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    echo '
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mb-4">Your mail can not be sent. Fix errors below or check the config files: "/config/"</h1>
                <a class="btn btn-primary mb-5" href="index.php">Go Back</a>
                <div class="text-left">
                    <p class="font-weight-bold">Errors:</p>
                    <pre>' . $mail->ErrorInfo . '</pre>
                </div>
            </div>
        </div>
    </div>
    ';
}
?>
</body>
</html>
