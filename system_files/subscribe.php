<?
/*##################################################################################################
# Подписаться на рассылку
##################################################################################################*/
include 'settings.php';
include 'core.php';

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        die("error");
    }
    $report_generation="INSERT INTO `subscribers_mail`(`mail`, `time`, `status`)VALUES('".$_POST['email']."', '".$system_time."', '')";
    mysqli_query($sqli,$report_generation); #Вносим в БД
    die('success');

?>
