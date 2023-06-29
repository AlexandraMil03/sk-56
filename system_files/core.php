<?
/*##################################################################################################
# Описание действия скрипта: хранит функции сайта.                                                 #
##################################################################################################*/
$system_time=time(); #Дата и время.
$system_user_brouser=$_SERVER['HTTP_USER_AGENT']; #Браузер клиента.
$system_user_ip=$_SERVER['REMOTE_ADDR']; #IP клиента.
$system_user_url_open=$_SERVER['REQUEST_URI']; #Какую страницу открыл клиент.
$full_url_transform_to_array=explode('?', $system_user_url_open);
$system_user_url_open_without_get = $full_url_transform_to_array[0]; // url без get параметров
$system_user_url_ref=$_SERVER['HTTP_REFERER']; #Источник от куда пришёл клиент.
$system_url=$_SERVER['SERVER_NAME']; #URL системы.
$system_rand_1=rand(1111,9999); #Мини коды и пароли (Числа от 1111 и до 9999)

$long_file_paths = false;
####################################################################################################
@$sqli=new mysqli("127.0.0.1", "$sql_connect_login", "$sql_connect_password", "$sql_connect_name");
if (mysqli_connect_errno())
{
	echo '<center style="margin-top: 100px;">ERROR DATABASE</center><script>console.log("ERROR DATABASE");</script>';
} else {
	mysqli_set_charset($sqli,"utf8");
}

@$settings=$sqli->query("SELECT * FROM settings")->fetch_assoc();
####################################################################################################
#Уведомления для интерфейса:
function ok($about,$url,$link)
{
	echo '<div class="container my-5 py-4 z-depth-1">
		  <!--Section: Content-->
		  <section class="px-md-5 mx-md-2 text-center text-lg-left dark-grey-text">
			<!--Grid row-->
			<div class="row">
			  <!--Grid column-->
			  <div class="col-md-10 mb-4 mb-md-0">
				<h3 class="font-weight-bold">Успешно!</h3>
				<p class="text-muted h6">'.$about.'</p><a class="btn btn-info btn-md ml-0" href="'.$url.'" role="button">'.$link.'<i class="fa fa-magic ml-2"></i></a> </div>
			  <!--Grid column-->

			  <!--Grid column-->
			  <div class="col-md-2 mb-4 mb-md-0">
				<!--Image-->
				<div class="view overlay">
				  <img src="/images/system/error.png" class="img-fluid" alt="">
				  <a href="#">
					<div class="mask rgba-white-light"></div>
				  </a>
				</div>
			  </div>
			  <!--Grid column-->
			</div>
			<!--Grid row-->
		  </section>
		  <!--Section: Content-->
		</div>';
}

function error($about,$url,$link)
{
	echo '
	  <div class="container my-5 py-4 z-depth-1">
		  <!--Section: Content-->
		  <section class="card px-md-5 mx-md-2 text-center text-lg-left">
			<!--Grid row-->
			<div class="row">
			  <!--Grid column-->
			  <div class="col-md-10 mb-4 mb-md-0">
				<h3 class="font-weight-bold pt-4">ОШИБКА...</h3>
				<h5><b>'.$about.'</b></h5>';
				if ($link != NULL) {
					echo '<a class="btn metall_button" style="max-height: 40px;" href="'.$url.'" role="button">'.$link.'</a>';
				}
				echo ' </div>
			  <!--Grid column-->

			  <!--Grid column-->
			  <div class="col-md-2 mb-4 mb-md-0">
				<!--Image-->
				<div class="view overlay">
				  <img src="/images/system/error.png" class="img-fluid" style="pointer-events: none;"
					alt="">
				  <a href="#">
					<div class="mask rgba-white-light"></div>
				  </a>
				</div>
			  </div>
			  <!--Grid column-->
			</div>
			<!--Grid row-->
		  </section>
		  <!--Section: Content-->
		</div> 
		  ';
} 
####################################################################################################
#Останавливаем какие либо действия, подгружая footer:
function stop()
{
 include '../../page_elements/foot.php'; exit;
}
####################################################################################################
#Вырежим пробелы
function probel($login)
{
$login=str_replace(" ","",$login); #Вырежит пробелы
return $login;
}
####################################################################################################
#Если есть куки, вытащим данные пользователя:
if(isset($_COOKIE['password']))
{
$system_login=$_COOKIE['password'];
$token_data=$sqli->query("SELECT * FROM `token` WHERE `token`= '".$system_login."' AND `ip` = '".$system_user_ip."'");
if(mysqli_num_rows($token_data) > 0){
	$data_user_from_toke_id = $token_data->fetch_assoc();
	$my_data=$sqli->query("SELECT * FROM `user` INNER JOIN `token` ON `user`.id = `token`.`id_user` WHERE `id`= ".$data_user_from_toke_id['id_user']." AND `token`.`ip` = '".$system_user_ip."'")->fetch_assoc();
}
}
####################################################################################################
#Проверка на номер в БД (такой номер есть в БД! - для регистрации)
function login_db_yes($login)
{
global $sqli;
global $system_user_url_ref;
$login=str_replace(" ","",$login);
$number=$sqli->query("SELECT * FROM `user` WHERE `phone` LIKE '".$login."' ");
	if($number->num_rows>=1)
	{
	error("Такой логин уже существует в системе. Придумайте другой.",$system_user_url_ref,"Назад");
	stop();
	}
}
####################################################################################################
#Если изменили данные в БД, выкидываем и стираем у него кукисы:
if($_COOKIE['password']!=$my_data['token']) #Если не совпал пароль
{
	setcookie("password","",time()-3600,"/",''.$system_url.'');
  	header('location: /authorization');
}
####################################################################################################
#SMSAero API: отправка сообщения.
function api_smsaero($number,$text)
{
global $settings;
		if($settings['developer']=="1") #Если режим разработчика включен
		{
		echo '<div class="alert alert-warning">DEVELOPER: [SMS <b>'.$number.'</b>] <b>'.$text.'</b></div>';
		}
		else #Если режим разработчика выключен
		{
		file_get_contents('https://gate.smsaero.ru/send/?user='.$settings['api_smsaero_login'].'&password='.$settings['api_smsaero_password'].'&to=7'.$number.'&text='.urlencode($text).'&from='.$settings['api_smsaero_from']);
		}
}
####################################################################################################
#Фильтруем номер
function login_filter($login, $state){
	global $system_user_url_ref;
	// Сюда приходит примерно такой номер: +7 (988) 555-2233
	$login = preg_replace('~\D+~','', $login);
	$login = substr_replace($login, '8', 0, 1);
	$count=strlen($login); #Считаем количество
	
	// Должно быть 11 символов, по такой аналогии: 89885552233
	
		#Если меньше 9
		if($count<=10)
		{
			if ($state==TRUE){
				error("Введите корректный номер телефона. Пример: +7 (988) 555-2233",$system_user_url_ref,"Вернуться");
			}
		return false;
		}
	
		#Если больше 10 до сих пор символов, предупредим чела!
		if($count>=12)
		{
			if ($state==TRUE){
				error("Введите корректный номер телефона. Пример: +7 (988) 555-2233",$system_user_url_ref,"Вернуться");
			}
		// stop();
		return false;
		}
		return $login;
	}
#################################################################################################### #Уровни доступа
#Доступ тем кто зарегистрирован
function level_user()
{ 
	global $my_data;
	if($my_data['user_level'] < 1)
	{
	#Переадресация на авторизацию
	die('<script>window.location.href = "/authorization";</script>');
	}
}

function level_moderation()
{ 
	global $my_data;
	if($my_data['user_level'] < 2)
	{
	error("Недостаточно прав.","/","На главную");
	include '../../page_elements/footadmin.php'; exit;
	}
}

#Доступ только администратору
function level_admin()
{
	global $my_data;
	if($my_data['user_level']=='0')
	{
	error("Вы не админ!","/","На главную");
	stop();
	}
}
####################################################################################################
#Фильтр, входные данные
function filter_data_entry($values)
{
$values=htmlspecialchars($values,ENT_QUOTES);
return $values;
}

#Фильтр, выход если нужен чистый оригинал
function filter_data_exit($values)
{
$values=htmlspecialchars_decode($values);
return $values;
}
####################################################################################################
#Проверка - защита от повторных отправок СМС!
function sms_stop($login,$table) #номер #названиеТаблицы #названиеСтолба
{
	#Проверим, если номера в резерве нет, отправим СМС. Если есть, говорим подожди.
	global $sqli;
	global $system_time;
	$select=$sqli->query("SELECT * FROM `$table` WHERE `user_login`='".$login."' ");

	#Если такой номер есть, храним но не удаляем его пока
	if ($select->fetch_assoc()>=0)
	{	
		$select=$sqli->query("SELECT * FROM `$table` WHERE `user_login`='".$login."' ")->fetch_assoc();

		$virtual=$select['time']+300;
		if($virtual>=$system_time)
		{
		error("Попробуйте повторно через 5 минут!","","");
		stop();
		}
	}


	#Если такой номер есть, и время прошло уже, удалим его и дадим скрипту записать снова эти данные. Отправим SMS!
	$select=$sqli->query("SELECT * FROM `$table` WHERE `user_login`='".$login."' ");
	if ($select->fetch_assoc()>=0)
	{	
		$select=$sqli->query("SELECT * FROM `$table` WHERE `user_login`='".$login."' ")->fetch_assoc();
		if($select['time']<=$system_time)
		{
		$sqli->query("DELETE FROM `$table` WHERE `user_login`='".$login."' ");
		}
	}
}
####################################################################################################
function system_time($time)
{
	$time=getdate($time);
	$res='['.$time['hours'].':'.$time['minutes'].':'.$time['seconds'].' '.$time['mday'] . '/' . $time['mon'] . '/' . $time['year'].']';
	return $res;
}

function gen_token() {
	return md5(microtime() . rand(0, 9999));
}

function email_notification_for_user($to, $text) {
	global $settings;
	$subject ='Сообщение от '.$settings['url'].'';
	$subject1 = "=?utf-8?b?". base64_encode($subject) ."?=";

	$message1 ="".$text."";    

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= "Content-type: text/html; charset=utf-8 \r\n";

	$header = "From: ".$settings['url']." <system@bot.com>\n\n";  
	$mail = mail($to, $subject1, iconv ('utf-8', 'utf-8', $message1), iconv ('utf-8', 'utf-8', $header));	
}

function isBot(){
/* Эта функция будет проверять, является ли посетитель роботом поисковой системы */
	if (empty($_SERVER['HTTP_USER_AGENT'])) {
        return false;
    }
	$bots = [
        // Yandex
        'YandexBot', 'YandexAccessibilityBot', 'YandexMobileBot', 'YandexDirectDyn', 'YandexScreenshotBot',
        'YandexImages', 'YandexVideo', 'YandexVideoParser', 'YandexMedia', 'YandexBlogs', 'YandexFavicons',
        'YandexWebmaster', 'YandexPagechecker', 'YandexImageResizer', 'YandexAdNet', 'YandexDirect',
        'YaDirectFetcher', 'YandexCalendar', 'YandexSitelinks', 'YandexMetrika', 'YandexNews',
        'YandexNewslinks', 'YandexCatalog', 'YandexAntivirus', 'YandexMarket', 'YandexVertis',
        'YandexForDomain', 'YandexSpravBot', 'YandexSearchShop', 'YandexMedianaBot', 'YandexOntoDB',
        'YandexOntoDBAPI', 'YandexTurbo', 'YandexVerticals',

        // Google
        'Googlebot', 'Googlebot-Image', 'Mediapartners-Google', 'AdsBot-Google', 'APIs-Google',
        'AdsBot-Google-Mobile', 'AdsBot-Google-Mobile', 'Googlebot-News', 'Googlebot-Video',
        'AdsBot-Google-Mobile-Apps',

        // Other
        'Mail.RU_Bot', 'bingbot', 'Accoona', 'ia_archiver', 'Ask Jeeves', 'OmniExplorer_Bot', 'W3C_Validator',
        'WebAlta', 'YahooFeedSeeker', 'Yahoo!', 'Ezooms', 'Tourlentabot', 'MJ12bot', 'AhrefsBot',
        'SearchBot', 'SiteStatus', 'Nigma.ru', 'Baiduspider', 'Statsbot', 'SISTRIX', 'AcoonBot', 'findlinks',
        'proximic', 'OpenindexSpider', 'statdom.ru', 'Exabot', 'Spider', 'SeznamBot', 'oBot', 'C-T bot',
        'Updownerbot', 'Snoopy', 'heritrix', 'Yeti', 'DomainVader', 'DCPbot', 'PaperLiBot', 'StackRambler',
        'msnbot', 'msnbot-media', 'msnbot-news',
    ];
	foreach ($bots as $bot) {
        if (stripos($user_agent, $bot) !== false) {
            return $bot;
        }
    }
  return false;
}

?>