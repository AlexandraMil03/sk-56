<?
/*##################################################################################################
# Описание действия скрипта: 
##################################################################################################*/
$page_title="Заголовок";
$page_keywords="нет, ключевых, слов";
$page_description="Нет описания страницы";
$page_robots="index,follow";
include '../settings.php';
include '../core.php';
level_user(); #Доступ авторизированым.
####################################################################################################

	// @steelcomebot
	define('TOKEN', '1286711584:AAG4y8oUkMz6PaQ5bcI5B_1747SWOHdmNRY');

$events = $_POST['act'];

// Создать заявку
if ($events == "create_task")
{
    $days = $_POST['days'];
    $title = $_POST['title'];
    $quantity = $_POST['quantity'];
    // if(is_numeric($quantity)!=true || $quantity < 1){
    //     die('{"msg":"fail", "text":"Количество должно быть больше 0"}');
    // }
    if(is_numeric($days)!=true || $days < 5){
        die('{"msg":"fail", "text":"Срок исполнения должен быть не менее 5 дней"}');
    }
    if(strlen($title) < 3){
        die('{"msg":"fail", "text":"Название слишком короткое"}');
    }
    // Запишем в базу количество
    $sqli->query("INSERT INTO `request`(`id_initiator`, `id_executor`, `title`, `quantity`, `days`, `time`, `status`) VALUES ('".$my_data['id']."', 0, '".$title."', '".$quantity."', '".$days."', '".$system_time."', '')");
    

	$users_data=$sqli->query("SELECT * FROM user WHERE `id_telegram` != '0' && `user_level` > '2'");
	while($user_info = mysqli_fetch_assoc($users_data)) {
		$method = 'sendMessage';
		$send_data = ['text' => "Поступила новая заявка: '".$title."';\nДней на выполнение: ".$days."\nБыстрый доступ: https://s-k56.ru/admin/new_requests"];
		$send_data['chat_id'] = $user_info['id_telegram'];
		sendTelegram($method, $send_data);
	}
    die('{"msg":"success"}');
}

	
	function sendTelegram($method, $data, $headers = []) {
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_POST => 1,
			CURLOPT_HEADER => 0,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL=> 'https://api.telegram.org/bot'.TOKEN.'/'.$method,
			CURLOPT_POSTFIELDS => json_encode($data),
			CURLOPT_HTTPHEADER => array_merge(array("content-Type: application/json"), $headers)
		]);
		
		$result = curl_exec($curl); curl_close($curl);
		return (json_decode($result, 1) ? json_decode($result, 1) : $result);
	}
	

####################################################################################################
?>