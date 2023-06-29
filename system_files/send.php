<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$file = $_FILES['myfile'];

// Формирование самого письма
$title = "Заголовок письма";
$body = "
<h2>Письмо с резюме!</h2>
<b>Имя:</b> $name<br>
<b>Почта:</b> $email<br><br>
<b>Контактный телефон:</b> $phone<br><br>
<b>Сообщение:</b><br>$message
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.mail.ru'; // SMTP сервера вашей почты
    $mail->Username   = 'denis_dstu@mail.ru'; // Логин на почте
    $mail->Password   = 's-k56.ru-pass'; // Пароль на почте // SRVAXu6I84Xw5L4pPfaM
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('denisdstu@gmail.com', 'Denis Shcherbina'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('youremail@yandex.ru');  
    $mail->addAddress('youremail@gmail.com'); // Ещё один, если нужен

    // Прикрипление файлов к письму
if (!empty($file['name'][0])) {
    for ($ct = 0; $ct < count($file['tmp_name']); $ct++) {
        $uploadfile = tempnam(sys_get_temp_dir(), sha1($file['name'][$ct]));
        $filename = $file['name'][$ct];
        if (move_uploaded_file($file['tmp_name'][$ct], $uploadfile)) {
            $mail->addAttachment($uploadfile, $filename);
            $rfile[] = "Файл $filename прикреплён";
        } else {
            $rfile[] = "Не удалось прикрепить файл $filename";
        }
    }   
}
// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Отправка сообщения в наш телеграмм бот
// if( $curl = curl_init() ) {
//     $data = array(
//         'msg' => "Категория: Брикетирование стружки;\nСообщение: ".$message,
//         'title' => "ЗАПРОС ОТ КЛИЕНТА",
//         'contacts' => "Номер клиента: ".$tel."\nE-mail: ".$email
//     );
//     curl_setopt($curl, CURLOPT_URL, 'https://api.s-k56.ru/Send-message-to-employees');
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($curl, CURLOPT_POST, true);
//     curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//     $out = curl_exec($curl);
//  }
 // Отправка лида в битрикс
//  file_get_contents("https://oplot.bitrix24.ru/rest/28/ohgkus1ubs36i49q/crm.lead.add.json?FIELDS[TITLE]=Предложение о закупке стружки&FIELDS[NAME]=".$name."&FIELDS[PHONE][0][VALUE]=".$tel."&FIELDS[PHONE][0][VALUE_TYPE]=WORK&FIELDS[EMAIL][0][VALUE]=".$email."&FIELDS[EMAIL][0][VALUE_TYPE]=WORK&FIELDS[COMMENTS]=(Организация: ".$org."). Сообщение: ".$message."&FIELDS[SOURCE_ID]=WEB&FIELDS[SOURCE_DESCRIPTION]=s-k56.ru/feedback&FIELDS[ASSIGNED_BY_ID]=28");
 

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);