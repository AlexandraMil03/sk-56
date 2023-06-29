<?
/*##################################################################################################
# Описание действия скрипта: 
##################################################################################################*/
$page_title="Изменить пароля";
$page_keywords="Восстановить пароль";
$page_description="Восстановление пароля";
$page_robots="noindex,nofollow";
include '../../system_files/settings.php';
include '../../system_files/core.php';
include '../../page_elements/head.php';
####################################################################################################



// Если авторизован
if($my_data['user_level_user'] == 1){

	if($_POST)
	{

		$new_pass = $_POST['form_password'];
		    	// Проверяем пароль на корректность
		    	if(iconv_strlen($new_pass) < 4) {
		    		$url = "/restore_password?user=".$my_data['id'];
		    		error("Пароль слишком короткий. Придуймайте более надёжный пароль",$url,"Повторить");
		    	} else {
		    	// Проверка пройдена успешно, меняем пароль человеку.
		    	$sqli->query("UPDATE `user` SET `password` = '".md5($new_pass)."' WHERE `id` = '".$my_data['id']."' ");
		    	$sqli->query("DELETE FROM `user-events` WHERE `user_id` = '".$my_data['id']."' AND `event` = 'password_reset'");
		    	echo '<script>window.location.href = "/authorization?action=sign_in_update_pass&login='.$my_data['mail'].'&password='.$new_pass.'";</script>';
		    	}
	}
 	if ($_GET['action'] == "generate")
	{
		// Автматически генерирует пароль и отправляет его на почту
		$new_pass = $system_rand_1;
		$text_hello = 'Пароль обнавлён';
	    $osnova_text = "Здравствуйте, ".$my_data['user_name'].". Вам установлен новый пароль.\n\nЛогин - Ваша почта.\nПароль: ".$new_pass;
	    $this_href = "https://".$system_url;
	    $text_button_reg = 'Открыть s-k56.ru';
	    $message = '<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width" initial-scale="1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="x-apple-disable-message-reformatting">
	<title></title>
		<style>
			* { font-family: sans-serif !important; }
		</style>
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
	<style>
		*,
		*:after,
		*:before {
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}

		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}

		html,
		body,
		.document {
			width: 100% !important;
			height: 100% !important;
			margin: 0;
			padding: 0;
		}

		body {
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			text-rendering: optimizeLegibility;
		}

		div[style*="margin: 16px 0"] {
			margin: 0 !important;
		}

		table,
		td {
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
		}

		table {
			border-spacing: 0;
			border-collapse: collapse;
			table-layout: fixed;
			margin: 0 auto;
		}

		img {
			-ms-interpolation-mode: bicubic;
			max-width: 100%;
			border: 0;
		}

		*[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: none !important;
		}

		.x-gmail-data-detectors,
		.x-gmail-data-detectors *,
		.aBn {
			border-bottom: 0 !important;
			cursor: default !important;
		}

		.btn {
			-webkit-transition: all 200ms ease;
			transition: all 200ms ease;
		}
		.btn:hover {
			background-color: #222222;
			border-color: #222222;
		}

		@media screen and (max-width: 450px) {

			.container {
				width: 100%;
				margin: auto;
			}

			.stack {
				display: block;
				width: 100%;
				max-width: 100%;
			}

			.btn {
				display: block;
				width: 100%;
				text-align: center;
			}

		}
	</style>
</head>
<body bgcolor="#E8ECF1">

	<div style="display: none; max-height: 0px; overflow: hidden;">
		<!-- Preheader message here -->
	</div>

	<div style="display: none; max-height: 0px; overflow: hidden;">&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;</div>

	<table bgcolor="#E8ECF1" role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" class="document">
		<tr>
			<td valign="top">

				<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="500" class="container">
					<tr>
						<td bgcolor="#ffffff">
							<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
								<tr>
									<td style="padding: 20px;">
										<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
											<tr>
												<td style="padding-bottom: 15px; font-family: \'Source Sans Pro\', sans-serif; font-size: 26px; line-height: 34px; color: #1B2733;">
												'.$text_hello.'
												</td>
											</tr>
											<tr>
												<td style="padding-bottom: 15px; font-family: \'Source Sans Pro\', sans-serif; font-size: 16px; line-height: 24px; color: #1B2733;">
                                                '.$osnova_text.'
												</td>
											</tr>
											<tr>
												<td align="left">
													<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="left" class="container">
														<tr>
															<td style="border-radius: 3px;" bgcolor="#000000">
																<a class="btn" href="'.$this_href.'" target="_blank" style="font-size: 18px; font-family: \'Source Sans Pro\', sans-serif; color: #ffffff; text-decoration: none; text-decoration: none; padding: 10px 20px; border-radius: 2px; border: 1px solid #000000; display: inline-block;">'.$text_button_reg.'</a>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>

				<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="450" class="container">
					<tr>
						<td align="center" style="font-family: \'Source Sans Pro\', sans-serif; font-size: 11px; line-height: 16px; padding-top: 20px; color: #aaaaaa;">
							steelcom
						</td>
					</tr>
					<tr>
						<td align="center" style="font-family: \'Source Sans Pro\', sans-serif; font-size: 11px; line-height: 16px; padding-bottom: 20px; color: #aaaaaa;">
							<unsubscribe>2021</unsubscribe>
						</td>
					</tr>
				</table>

			</td>
		</tr>
	</table>
</body>
</html>';
		
			$to = $my_data['mail'];
        
			$subject ="Информационное письмо от s-k56.ru";
			$subject1 = "=?utf-8?b?". base64_encode($subject) ."?=";
			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type: text/html; charset=utf-8 \r\n";

			$headers .= "From: s-k56.ru <system@bot.com>\n\n";  
			
			$mail = mail($to, $subject, $message, $headers);
		
		$sqli->query("UPDATE `user` SET `password` = '".md5($new_pass)."' WHERE `id` = '".$my_data['id']."' ");
		$sqli->query("DELETE FROM `user-events` WHERE `user_id` = '".$my_data['id']."' AND `event` = 'password_reset'");
		echo '<script>window.location.href = "/authorization?action=sign_in_update_pass&login='.$my_data['mail'].'&password='.$new_pass.'";</script>';
	} else {
	echo '<section>
<div class="container pb-5"><div class="row">
<div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">
<form class="needs-validation" data-form-output="form-output-global" data-form-type="contact" action="/restore_password?action=update" method="post" enctype="multipart/form-data" novalidate>
	<div class="card wow fadeIn animated" data-wow-delay="0.3s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.3s;">
                                <div class="card-body"  style="background-color: #f2f2f2;">
<div class="form-header mb-4">

<h1 class="h3 font-weight-normal text-center">Обновление пароля</h1>
</div>


<small id="emailHelp" class="form-text text-muted m-0 text-center">Придумайте новый пароль, либо сгенерируйте новый</small>


<div class="form-inline md-form form-sm mt-3 mb-1">
<i class="fas fa-user-edit prefix"></i>
<label for="form_password" class="ml-5">Придумайте пароль</label>
<input type="password" id="form_password" name="form_password" class="form-control ml-3 w-75 ml-5" required>
<a tabindex="0" class="btn btn-primary btn-sm my-0 waves-effect waves-light pr-2 pl-2 ml-3" style="padding: 3px; background: -webkit-linear-gradient(50deg,#33B5E5,#0099CC);" role="button" data-toggle="popover" data-trigger="focus" title="Пароль"
data-content="Пароль может быть любым, но чем сложнее, тем лучше.">?</a>
<div class="valid-feedback">
  Отлично!
</div>
<div class="invalid-feedback">
  Введите пароль
</div>
</div>

<div class="form-inline md-form form-sm mt-3 mb-1">
<i class="fas fa-user-edit prefix"></i>
<label for="form_password_2" class="ml-5">Повторите ввод</label>
<input type="password" id="form_password_2" name="form_password_2" class="form-control ml-3 w-75 ml-5" required>
<a tabindex="0" class="btn btn-primary btn-sm my-0 waves-effect waves-light pr-2 pl-2 ml-3" style="padding: 3px; background: -webkit-linear-gradient(50deg,#33B5E5,#0099CC);" role="button" data-toggle="popover" data-trigger="focus" title="Повторите ввод"
data-content="Это нужно, чтобы избежать ошибки при создании нового пароля">?</a>
<div class="valid-feedback">
  Отлично!
</div>
<div class="invalid-feedback">
  Пароли должны совпадать пароль
</div>
</div>

<div class="text-center">
<a href="'.$system_user_url_open.'&action=generate" class="btn btn-sm btn-white btn-rounded z-depth-1a waves-effect waves-light">Сгенерировать</a>
или
<button type="submit" class="btn btn-rounded z-depth-1a waves-effect waves-light ml-1" style="background: -webkit-linear-gradient(50deg,#33B5E5,#0099CC); color: white!important; margin: 0px;" id="this_disabled_button" disabled="">Сохранить</button>
 </div>


</div>
</div>
</form>
</div>
</div>
</section>
';
// ПРОВЕРКА НА ПРАВИЛЬНОСТЬ ВВОДА ПРОЛЯ
echo '
<script>

function form_password(){
  var count = $(\'#form_password\').val();
  if (count.length > 3) {
    return true;
  } else {
    return false;
  }
}

function form_password_2() {
  var count = $(\'#form_password_2\').val();
  if (count.length > 3) {
     return true;
  } else { 
     return false;
  }
}

        function disabled_button() {
                if (form_password() == true && form_password_2() == true) {
                	if ($(\'#form_password\').val() == $(\'#form_password_2\').val()){
                		$(\'#this_disabled_button\').removeAttr("disabled");
                	} else {
                		$(\'#this_disabled_button\').attr("disabled", "true"); 
                	}
                } else { 
                    $(\'#this_disabled_button\').attr("disabled", "true"); 
                }
        }

$(document).on("input",function(ev){
            disabled_button();
          });
          
	function send_mail_from_server() {
    if ($(\'#signinform-email_reg\').val() == \'\') {
      return false;
    } else {
      let emailReg = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
      if (!emailReg.test($(\'#signinform-email_reg\').val())) {
        alert(\'Укажите почтовый адрес правильно\');
        return false;
      }
    }
    
    
</script>
';
} // конец если GET action
// конец если авторизован
} else {
	// ЕСЛИ НЕ АВТОРИЗОВАН
if($_POST)
{
	if ($_GET['action'] == "update") {
		// Сюда запишем Новый пароль пользоватля
		$user_id = $_POST['user'];
		$new_pass = $_POST['form_password'];
		$key = $_POST['activation_key'];
		$query=$sqli->query("SELECT * FROM `user-events` INNER JOIN `user` ON `user-events`.user_id = `user`.id WHERE `user_id` = '".$user_id."' AND `event` = 'password_reset'");
		while ($DB=$query->fetch_assoc()) {
			if($key==$DB['activation_key'])
		    {
		    	// Проверяем пароль на корректность
		    	if(iconv_strlen($new_pass) < 4) {
		    		$url = "/restore_password?user=".$user_id."&activation_key=".$key;
		    		error("Пароль слишком короткий. Придуймайте более надёжный пароль",$url,"Повторить");
		    	} else {
		    	// Проверка пройдена успешно, меняем пароль человеку.
		    	$sqli->query("UPDATE `user` SET `password` = '".md5($new_pass)."' WHERE `id` = '".$user_id."' ");
		    	$sqli->query("DELETE FROM `user-events` WHERE `user_id` = '".$user_id."' AND `event` = 'password_reset'");
		    	echo '<script>window.location.href = "/authorization?action=sign_in_update_pass&login='.$DB['mail'].'&password='.$new_pass.'";</script>';
		    	}
		    } 
	    }
	    error("Ключ не прошёл проверку. Попробуйте снова..","/restore_password","Повторить");
		// echo '<script>window.location.href = "/";</script>';
	} else {
		$form_login= $_POST['form_login']; #Получим логин присланый нам от пользователя
		if (preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $form_login)) {
// ЕСЛИ ПРИШЛА В POST ЗАПРОСЕ ПОЧТА НОРМАЛЬНАЯ, РАБОТАЕМ
		$DB=$sqli->query("SELECT * FROM `user` WHERE `mail` = '".$form_login."'")->fetch_assoc();
		if($form_login==$DB['mail'])
	    {
	    	#Генерируем уникальный ключ для активации процедуры смены пароля
	    	$activation_key = md5(microtime() . rand(0, 9999));
	
	    	#Резервируем ключ для пользователя и отправляем его на почту:
	        $temp_sms_code="
	        INSERT INTO `user-events`
	        (
	        `time`,
	        `user_id`,
	        `event`,
	        `activation_key`
	        )VALUES(
	        '$system_time',
	        '".$DB['id']."',
	        'password_reset',
	        '".$activation_key."'
	        )
	        ";
	        mysqli_query($sqli,$temp_sms_code);
	
	    $text_hello = 'Запрос на восстановление пароля.';
	    $osnova_text = "Для сброса пароля перейдите по ссылке. Если Вы не предпринимали никаких действий, проигнорируйте письмо.";
	    $this_href = "https://".$system_url."/restore_password?user=".$DB['id']."&activation_key=".$activation_key;
	    $text_button_reg = 'Сбросить пароль';
	$message = '<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width" initial-scale="1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="x-apple-disable-message-reformatting">
	<title></title>
		<style>
			* { font-family: sans-serif !important; }
		</style>
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
	<style>
		*,
		*:after,
		*:before {
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}

		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}

		html,
		body,
		.document {
			width: 100% !important;
			height: 100% !important;
			margin: 0;
			padding: 0;
		}

		body {
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			text-rendering: optimizeLegibility;
		}

		div[style*="margin: 16px 0"] {
			margin: 0 !important;
		}

		table,
		td {
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
		}

		table {
			border-spacing: 0;
			border-collapse: collapse;
			table-layout: fixed;
			margin: 0 auto;
		}

		img {
			-ms-interpolation-mode: bicubic;
			max-width: 100%;
			border: 0;
		}

		*[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: none !important;
		}

		.x-gmail-data-detectors,
		.x-gmail-data-detectors *,
		.aBn {
			border-bottom: 0 !important;
			cursor: default !important;
		}

		.btn {
			-webkit-transition: all 200ms ease;
			transition: all 200ms ease;
		}
		.btn:hover {
			background-color: #222222;
			border-color: #222222;
		}

		@media screen and (max-width: 450px) {

			.container {
				width: 100%;
				margin: auto;
			}

			.stack {
				display: block;
				width: 100%;
				max-width: 100%;
			}

			.btn {
				display: block;
				width: 100%;
				text-align: center;
			}

		}
	</style>
</head>
<body bgcolor="#E8ECF1">

	<div style="display: none; max-height: 0px; overflow: hidden;">
		<!-- Preheader message here -->
	</div>

	<div style="display: none; max-height: 0px; overflow: hidden;">&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;</div>

	<table bgcolor="#E8ECF1" role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" class="document">
		<tr>
			<td valign="top">

				<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="500" class="container">
					<tr>
						<td bgcolor="#ffffff">
							<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
								<tr>
									<td style="padding: 20px;">
										<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
											<tr>
												<td style="padding-bottom: 15px; font-family: \'Source Sans Pro\', sans-serif; font-size: 26px; line-height: 34px; color: #1B2733;">
												'.$text_hello.'
												</td>
											</tr>
											<tr>
												<td style="padding-bottom: 15px; font-family: \'Source Sans Pro\', sans-serif; font-size: 16px; line-height: 24px; color: #1B2733;">
                                                '.$osnova_text.'
												</td>
											</tr>
											<tr>
												<td align="left">
													<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="left" class="container">
														<tr>
															<td style="border-radius: 3px;" bgcolor="#000000">
																<a class="btn" href="'.$this_href.'" target="_blank" style="font-size: 18px; font-family: \'Source Sans Pro\', sans-serif; color: #ffffff; text-decoration: none; text-decoration: none; padding: 10px 20px; border-radius: 2px; border: 1px solid #000000; display: inline-block;">'.$text_button_reg.'</a>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>

				<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="450" class="container">
					<tr>
						<td align="center" style="font-family: \'Source Sans Pro\', sans-serif; font-size: 11px; line-height: 16px; padding-top: 20px; color: #aaaaaa;">
							steelcom
						</td>
					</tr>
					<tr>
						<td align="center" style="font-family: \'Source Sans Pro\', sans-serif; font-size: 11px; line-height: 16px; padding-bottom: 20px; color: #aaaaaa;">
							<unsubscribe>2021</unsubscribe>
						</td>
					</tr>
				</table>

			</td>
		</tr>
	</table>
</body>
</html>';
	
			$to = $DB['mail'];
        
			$subject ="Информационное письмо от s-k56.ru";
			$subject1 = "=?utf-8?b?". base64_encode($subject) ."?=";
			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type: text/html; charset=utf-8 \r\n";

			$headers .= "From: s-k56.ru <system@bot.com>\n\n";  
			
			$mail = mail($to, $subject, $message, $headers);
	
	        $about = "На Вашу почту была отправленна ссылка для сброса пароля";
	        $url = "/";
	        $link = "На главную";
			ok($about,$url,$link);
			if($settings['developer']=="1") #Если режим разработчика включен
			{
				echo '<div class="container my-5 py-4 z-depth-1"><p class="note note-primary mt-3"><strong>DEVELOPER:</strong> [<b>Для сброса пароля перейдите по <a href="https://'.$system_url.'/restore_password?user='.$DB['id'].'&activation_key='.$activation_key.	'">этой ссылке.</a></b>]<p></div>';
			}
		} else {
			echo '
			<div class="container my-5 py-4 z-depth-1">
				  <section class="px-md-5 mx-md-2 text-center text-lg-left dark-grey-text">
					<!--Grid row-->
					<div class="row">
					  <!--Grid column-->
					  <div class="col-md-10 mb-4 mb-md-0">
						<h3 class="font-weight-bold">Ошибка!</h3>
						<p class="text-muted">Почта не найдена. Попробуйте ещё раз</p><a class="btn btn-info btn-md ml-0" href="/restore_password" role="button">Назад<i class="fa fa-magic ml-2"></i></a> </div>
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
				</div>
			';
		}
	} else {
		// Пришёл POST запрос, но в нём косяк, почта некорректная, а может пустая, здесь мы делаем следующее в этом случае:
		$url = "/restore_password";
		error("Некорректная почта, попробуйте снова",$url,"Повторить");
	}
}
} else {

	//Проверим, не пришёл ли нам ключ на сброс пароля
		if($_GET)
		{


			$user_id = $_GET['user'];
			$activation_key = $_GET['activation_key'];

			$DB=$sqli->query("SELECT * FROM `user-events` INNER JOIN `user` ON `user-events`.user_id = `user`.id WHERE `user_id` = '".$user_id."' AND `activation_key` = '".$activation_key."'")->fetch_assoc();
			  	if($activation_key==$DB['activation_key'])
			    {
			    	if ($_GET['action']=="generate")
					{
						// Автматически генерирует пароль и отправляет его на почту
						$new_pass = $system_rand_1;
						
						$text_hello = 'Здравствуйте, '.$DB['user_name'];
	    $osnova_text = "Вам установлен новый пароль. Логин - Ваша почта. Пароль: ";
	    $this_href = "https://".$system_url;
	    $text_button_reg = 'Перейти на s-k56.ru';
	$message = '<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width" initial-scale="1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="x-apple-disable-message-reformatting">
	<title></title>
		<style>
			* { font-family: sans-serif !important; }
		</style>
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
	<style>
		*,
		*:after,
		*:before {
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}

		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}

		html,
		body,
		.document {
			width: 100% !important;
			height: 100% !important;
			margin: 0;
			padding: 0;
		}

		body {
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			text-rendering: optimizeLegibility;
		}

		div[style*="margin: 16px 0"] {
			margin: 0 !important;
		}

		table,
		td {
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
		}

		table {
			border-spacing: 0;
			border-collapse: collapse;
			table-layout: fixed;
			margin: 0 auto;
		}

		img {
			-ms-interpolation-mode: bicubic;
			max-width: 100%;
			border: 0;
		}

		*[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: none !important;
		}

		.x-gmail-data-detectors,
		.x-gmail-data-detectors *,
		.aBn {
			border-bottom: 0 !important;
			cursor: default !important;
		}

		.btn {
			-webkit-transition: all 200ms ease;
			transition: all 200ms ease;
		}
		.btn:hover {
			background-color: #222222;
			border-color: #222222;
		}

		@media screen and (max-width: 450px) {

			.container {
				width: 100%;
				margin: auto;
			}

			.stack {
				display: block;
				width: 100%;
				max-width: 100%;
			}

			.btn {
				display: block;
				width: 100%;
				text-align: center;
			}

		}
	</style>
</head>
<body bgcolor="#E8ECF1">

	<div style="display: none; max-height: 0px; overflow: hidden;">
		<!-- Preheader message here -->
	</div>

	<div style="display: none; max-height: 0px; overflow: hidden;">&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;</div>

	<table bgcolor="#E8ECF1" role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" class="document">
		<tr>
			<td valign="top">

				<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="500" class="container">
					<tr>
						<td bgcolor="#ffffff">
							<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
								<tr>
									<td style="padding: 20px;">
										<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="100%">
											<tr>
												<td style="padding-bottom: 15px; font-family: \'Source Sans Pro\', sans-serif; font-size: 26px; line-height: 34px; color: #1B2733;">
												'.$text_hello.'
												</td>
											</tr>
											<tr>
												<td style="padding-bottom: 15px; font-family: \'Source Sans Pro\', sans-serif; font-size: 16px; line-height: 24px; color: #1B2733;">
                                                '.$osnova_text.'
                                                <div style="padding-left: 35px; width: 100%;"><h1 style="margin-top: 10px;">'.$new_pass.'</h1></div>
												</td>
											</tr>
											<tr>
												<td align="left">
													<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="left" class="container">
														<tr>
															<td style="border-radius: 3px;" bgcolor="#000000">
																<a class="btn" href="'.$this_href.'" target="_blank" style="font-size: 18px; font-family: \'Source Sans Pro\', sans-serif; color: #ffffff; text-decoration: none; text-decoration: none; padding: 10px 20px; border-radius: 2px; border: 1px solid #000000; display: inline-block;">'.$text_button_reg.'</a>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>

				<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="450" class="container">
					<tr>
						<td align="center" style="font-family: \'Source Sans Pro\', sans-serif; font-size: 11px; line-height: 16px; padding-top: 20px; color: #aaaaaa;">
							steelcom
						</td>
					</tr>
					<tr>
						<td align="center" style="font-family: \'Source Sans Pro\', sans-serif; font-size: 11px; line-height: 16px; padding-bottom: 20px; color: #aaaaaa;">
							<unsubscribe>2021</unsubscribe>
						</td>
					</tr>
				</table>

			</td>
		</tr>
	</table>
</body>
</html>';
	
			$to = $DB['mail'];
        
			$subject ="Информационное письмо от s-k56.ru";
			$subject1 = "=?utf-8?b?". base64_encode($subject) ."?=";
			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Content-type: text/html; charset=utf-8 \r\n";

			$headers .= "From: s-k56.ru <system@bot.com>\n\n";  
			
			$mail = mail($to, $subject, $message, $headers);
						
						$sqli->query("UPDATE `user` SET `password` = '".md5($new_pass)."' WHERE `id` = '".$user_id."' ");
						$sqli->query("DELETE FROM `user-events` WHERE `user_id` = '".$user_id."' AND `event` = 'password_reset'");
						echo '<script>window.location.href = "/authorization?action=sign_in_update_pass&login='.$DB['mail'].'&password='.$new_pass.'";</script>';
					} else {
			    	// УСПЕШНО! НУЖНО ОБНОВИТЬ ПАРОЛЬ ЧЕЛОВЕКУ.
echo '<section>
<div class="container pb-5"><div class="row">
<div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">
<form class="needs-validation" data-form-output="form-output-global" data-form-type="contact" action="/restore_password?action=update" method="post" enctype="multipart/form-data" novalidate>
	<div class="card wow fadeIn animated" data-wow-delay="0.3s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.3s;">
                                <div class="card-body"  style="background-color: #f2f2f2;">
<div class="form-header mb-4">

<h1 class="h3 font-weight-normal text-center">Обновление пароля</h1>
</div>


<small id="emailHelp" class="form-text text-muted m-0">Здравствуйте, '.$DB['user_name'].', придумайте новый пароль, либо сгенерируйте новый</small>


<div class="form-inline md-form form-sm mt-3 mb-1">
<i class="fas fa-user-edit prefix"></i>
<label for="form_password" class="ml-5">Придумайте пароль</label>
<input type="password" id="form_password" name="form_password" class="form-control w-75 ml-5" required>
<a tabindex="0" class="btn btn-primary btn-sm my-0 waves-effect waves-light pr-2 pl-2 ml-3" style="padding: 3px; background: -webkit-linear-gradient(50deg,#33B5E5,#0099CC);" role="button" data-toggle="popover" data-trigger="focus" title="Пароль"
data-content="Пароль может быть любым, но чем сложнее, тем лучше.">?</a>
<div class="valid-feedback">
  Отлично!
</div>
<div class="invalid-feedback">
  Введите пароль
</div>
</div>

<div class="form-inline md-form form-sm mt-3 mb-1">
<i class="fas fa-user-edit prefix"></i>
<label for="form_password_2" class="ml-5">Повторите ввод</label>
<input type="password" id="form_password_2" name="form_password_2" class="form-control w-75 ml-5" required>
<a tabindex="0" class="btn btn-primary btn-sm my-0 waves-effect waves-light pr-2 pl-2 ml-3" style="padding: 3px; background: -webkit-linear-gradient(50deg,#33B5E5,#0099CC);" role="button" data-toggle="popover" data-trigger="focus" title="Повторите ввод"
data-content="Это нужно, чтобы избежать ошибки при создании нового пароля">?</a>
<div class="valid-feedback">
  Отлично!
</div>
<div class="invalid-feedback">
  Пароли должны совпадать пароль
</div>
</div>

<input type="hidden" name="activation_key" value="'.$activation_key.'">
<input type="hidden" name="user" value="'.$user_id.'">

<div class="text-center">
<a href="'.$system_user_url_open.'&action=generate" class="btn btn-sm btn-white btn-rounded z-depth-1a waves-effect waves-light">Сгенерировать</a>
или
<button type="submit" class="btn btn-rounded z-depth-1a waves-effect waves-light ml-1" style="background: -webkit-linear-gradient(50deg,#33B5E5,#0099CC); color: white!important; margin: 0px;" id="this_disabled_button" disabled="">Сохранить</button>
 </div>


</div>
</div>
</form>
</div>
</div>
</section>
';
// ПРОВЕРКА НА ПРАВИЛЬНОСТЬ ВВОДА ПРОЛЯ
echo '
<script>

function form_password(){
  var count = $(\'#form_password\').val();
  if (count.length > 3) {
    return true;
  } else {
    return false;
  }
}

function form_password_2() {
  var count = $(\'#form_password_2\').val();
  if (count.length > 3) {
     return true;
  } else { 
     return false;
  }
}

        function disabled_button() {
                if (form_password() == true && form_password_2() == true) {
                	if ($(\'#form_password\').val() == $(\'#form_password_2\').val()){
                		$(\'#this_disabled_button\').removeAttr("disabled");
                	} else {
                		$(\'#this_disabled_button\').attr("disabled", "true"); 
                	}
                } else { 
                    $(\'#this_disabled_button\').attr("disabled", "true"); 
                }
        }

$(document).on("input",function(ev){
            disabled_button();
          });
</script>
';
 }
} else {
	$about = "Данные не совпали. На Вашу почту была отправлена ссылка для сброса пароля. Перейдите по ней, или откройте её вручную.";
	 error($about,"","");
}
		} else {

echo '<section>
<div class="container pb-5"><div class="row">';
echo '<div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">
<form class="needs-validation" data-form-output="form-output-global" data-form-type="contact" action="/restore_password" method="post" novalidate="novalidate">
<div class="card wow fadeIn animated" data-wow-delay="0.3s" style="visibility: visible; animation-name: fadeIn; animation-delay: 0.3s;">
                                <div class="card-body"  style="background-color: #f2f2f2;">
<div class="form-header mb-4">

<h1 class="h3 font-weight-normal text-center">Обновление пароля</h1>
</div>
<div class="text-center"><small id="emailHelp" class="form-text text-muted m-0">Логин - Ваша почта</small></div>
<div class="form-wrap">
                <input class="form-input form-control-has-validation" id="form_login" type="email" name="form_login" data-constraints="@Email @Required"><span class="form-validation"></span>
                <label class="form-label rd-input-label" for="form_login">E-mail</label>
              </div>

<small id="emailHelp" class="form-text text-muted m-0">На Вашу почту, указанную при регистрации, будет отправлена ссылка для сброса пароля</small>

<div class="text-center p-3" style="padding-bottom: 20px!important;">
<button type="submit" class="btn btn-block btn-rounded z-depth-1a waves-effect waves-light" style="background: -webkit-linear-gradient(50deg,#33B5E5,#0099CC); color: white!important; margin: 0px;" id="this_disabled_button" disabled>Отправить <i class="fas fa-angle-double-right"></i></button>
 </div>
 

</form> ';
####################################################################################################
echo "</div></div></section>";

echo '<script>
$(function () {
	$(\'[data-toggle="popover"]\').popover()
	})

	function count_phone(){
	  var count = $(\'#form_login\').val();
	  if (count.length > 9) {
	    return true;
	  } else {
	    return false;
	  }
	}

	function disabled_button() {
                if (count_phone() == true) {
                    $(\'#this_disabled_button\').removeAttr("disabled");
                } else { 
                    $(\'#this_disabled_button\').attr("disabled", "true"); 
                }
        }
        $(document).on("input",function(ev){
            disabled_button();
          });

	</script>';
}
}

}
####################################################################################################
include '../../page_elements/foot.php';
?>