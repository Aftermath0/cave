<?php 

require_once('PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['name'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$address = $_POST['address'];
$customer = $_POST['customer'];
$partner = $_POST['partner'];
$other = $_POST['other'];
$email = $_POST['email'];
$customer_true = "";
$partner_true = "";
$other_true = "";
if(isset($customer) ) {$customer_true='Хочет приобрести товар';};
if(isset($partner) ) {$partner_true='Хочет строить бизнес';};
if(isset($other) ) {$other_true='другое';};

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'rybakova-natalia@bk.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = '546213Aft'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('rybakova-natalia@bk.ru'); // от кого будет уходить письмо?
$mail->addAddress('fishqwa@gmail.com');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка на регистрацию';
$mail->Body    = '<br/> ФИО: ' .$name. '<br/> ДАТА РОЖДЕНИЯ: '.$date. ' <br/> ТЕЛЕФОН: ' .$phone. '<br/> АДРЕС ПРОЖИВАНИЯ: '.$address. '<br/> ПОЧТА: ' .$email. '<br/>ЦЕЛЬ РЕГИСТРАЦИИ: '.$customer_true .', ' .$partner_true .', ' .$other_true;
$mail->AltBody = '';

if(isset($_COOKIE['noaccess'])) {
    echo ("<p>Message already sent!</p>");
} else {
    if ($mail->send()) {
        setcookie("noaccess", "24hrs", time()+86400);
        echo("<p>Message sent!</p>");
    } else {
        echo("<p>Message delivery failed...</p>");
    } 
}


?>