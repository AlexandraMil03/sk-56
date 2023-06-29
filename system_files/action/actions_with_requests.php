<?
/*##################################################################################################
# Описание: ДЕЙСТВИЯ С ЗАЯВКАМИ
##################################################################################################*/
# actions_with_requests.php
# Принять к исполнению, завершить
include '../settings.php';
include '../core.php';
level_user(); #Доступ авторизированым.
level_moderation(); #Доступ администратору и всем модераторам

$events = $_GET['act'];
$id_request = $_GET['id_request'];

// Принять к исполнению новую заявку
if ($events == "accept_for_execution")
{
    $result = mysqli_query($sqli,"SELECT * FROM `request` WHERE `id_request` = '".$id_request."'");
    if(mysqli_num_rows($result) > 0){
        $data_request = $result->fetch_assoc();
        if($data_request['id_executor'] != 0 && $data_request['status'] != ''){
            $user = mysqli_query($sqli,"SELECT * FROM `user` WHERE `id` = '".$data_request['id_executor']."'")->fetch_assoc();;
            die('{"msg":"fail", "text":"Заявка уже принята. Исполняет: '.$user['user_surname'].' '.$user['user_name'].'"}');
        }
        $sqli->query("UPDATE `request` SET `id_executor` = '".$my_data['id']."', `status`='received' WHERE `id_request` = '".$id_request."' ");
        die('{"msg":"success"}');
    } else {
        die('{"msg":"fail", "text":"Запись не найдена"}');
    }
}


// Отметить выполненым
if ($events == "mark_completed")
{
    if($my_data['user_level'] > 2){
        $resultat = $sqli->query("SELECT * FROM `request` WHERE `id_request` = '".$id_request."'");
        if($resultat->num_rows > 0){
            if($my_data['user_level'] > 3){
                $sqli->query("UPDATE `request` SET `status`='completed' WHERE `id_request` = '".$id_request."' ");
            } else {
                $data_request = $resultat->fetch_assoc();
                if($data_request['status'] == 'done'){
                    die('{"msg":"fail", "text":"Заявка уже закрыта."}');
                }
                $sqli->query("UPDATE `request` SET `status`='completed' WHERE `id_request` = '".$id_request."' ");
            }
                // Надо уведомить автора заявки о том, что заявка исполнена
            die('{"msg":"success"}');
        } else {
            die('{"msg":"fail", "text":"Запись не найдена"}');
        }
    } else {
        die('{"msg":"error", "text":"Отказано в доступе"}');
    }
}

// Успешно закрыть заявку
if ($events == "close_task")
{
    $resultat = $sqli->query("SELECT * FROM `request` WHERE `id_request` = '".$id_request."'");
    if($resultat->num_rows > 0){
        $data_request = $resultat->fetch_assoc();
        if($data_request['status'] == 'completed'){
            $sqli->query("UPDATE `request` SET `status`='done' WHERE `id_request` = '".$id_request."' ");
        } else {
            $sqli->query("UPDATE `request` SET `status`='early_closing' WHERE `id_request` = '".$id_request."' ");
        }
        // Надо уведомить исполнителя, что заявка закрыта
        die('{"msg":"success"}');
    } else {
        die('{"msg":"fail", "text":"Запись не найдена"}');
    }
}

// Отклонить заявку
if ($events == "reject_request")
{
    $resultat = $sqli->query("SELECT * FROM `request` WHERE `id_request` = '".$id_request."'");
    if($resultat->num_rows > 0){
        $data_request = $resultat->fetch_assoc();
        if($data_request['status'] != ''){
            $user = mysqli_query($sqli,"SELECT * FROM `user` WHERE `id` = '".$data_request['id_executor']."'")->fetch_assoc();;
            die('{"msg":"fail", "text":"Заявка уже принята и не может быть откланена. Исполняет: '.$user['user_surname'].' '.$user['user_name'].' Обновите страницу."}');
        }
        $sqli->query("UPDATE `request` SET `id_executor` = '".$my_data['id']."', `status`='rejected' WHERE `id_request` = '".$id_request."' ");
        // Надо уведомить автора заявки о том, что заявка отклонена
        die('{"msg":"success"}');
    } else {
        die('{"msg":"fail", "text":"Запись не найдена"}');
    }
}

// Удалить заявку
if ($events == "delete_task")
{
    $resultat = $sqli->query("SELECT * FROM `request` WHERE `id_request` = '".$id_request."'");
    if($resultat->num_rows > 0){
        $data_result = $resultat->fetch_assoc();
        if($data_result['status'] == '' || $data_result['status'] == 'rejected'){
            $sqli->query("DELETE FROM `request` WHERE `id_request` = '".$id_request."' ");
            die('{"msg":"success"}');
        }
    } else {
        die('{"msg":"fail", "text":"Запись не найдена"}');
    }
}

die('{"msg":"fail", "text":"Запрос недействительный"}');

?>