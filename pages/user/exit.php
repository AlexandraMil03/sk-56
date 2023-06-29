<?
/*##################################################################################################
# Описание действия скрипта: сброс авторизации                                                     #
##################################################################################################*/
$page_title = "Выход";
$page_keywords = "нет, ключевых, слов";
$page_description = "Выход из системы на нашем сайте.";
$page_robots = "noindex,nofollow";
include '../../system_files/settings.php';
include '../../system_files/core.php';
setcookie("password", "", time()-3600, "/", $system_url);
$sqli->query("DELETE FROM `token` WHERE `id_user` = '".$my_data['id']."' AND `ip` = '".$system_user_ip."' ");
echo '<script>localStorage.clear();</script>';
echo '<script>window.location.href = "/";</script>';
?>
