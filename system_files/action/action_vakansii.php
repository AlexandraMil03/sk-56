<?
include '../settings.php';
include '../core.php';
level_user(); #Доступ авторизированым.

$post = (!empty($_POST)) ? true : false;

if($post)
{

    if($_POST['action'] == 'delete_vakans'){
        $sqli->query("DELETE FROM `vacancies` WHERE `id` = '".$_POST['id']."' ");
        die('{"mag":"success"}');
    } else {
        die('{"mag":"error"}');
    }

}

?>