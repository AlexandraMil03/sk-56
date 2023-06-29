<?
/*##################################################################################################
# Описание действия скрипта: вход                                                                  #
##################################################################################################*/
$page_title="Авторизация в системе";
$page_keywords="вход, авторизация, на, сайте, в, системе";
$page_description="Вход - Авторизация в системе на нашем сайте.";
$page_robots="index,follow";
include '../../system_files/settings.php';
include '../../system_files/core.php';
####################################################################################################
if($_POST)
{
$form_login=probel($_POST['form_login']); #Получим логин присланый нам от пользователя
$form_password=md5(probel($_POST['password'])); #Получим пароль присланый нам от пользователя
####################################################################################################
$result = mysqli_query($sqli,"SELECT * FROM `user` WHERE `mail` = '".$form_login."' OR `phone` = '".$form_login."'");
if(mysqli_num_rows($result) > 0){
  $DB = $result->fetch_assoc();
  if($form_password==$DB['password'])
  {
    // Перепишем историю его анонимных перемещений на него авторизованного
	$sqli->query("UPDATE `movement_history` SET `id_user` = '".$DB['id']."', `identificator` = '' WHERE `identificator` = '".$_COOKIE['identificator']."' AND `id_user` = 0 ");
    setcookie("identificator","",time()-3600,"/",''.$system_url.'');
  	$token = gen_token();
  	$sqli->query("DELETE FROM `token` WHERE `id_user` = '".$DB['id']."' AND `ip` = '".$system_user_ip."' ");
	$query_token = "INSERT INTO `token`(`id_user`, `token`, `ip`, `time`) VALUES (".$DB['id'].", '".$token."', '".$system_user_ip."', '".$system_time."')";
	$sqli->query($query_token);
    SetCookie('password',$token,time()+3600*24*365, '/',$system_url);
    die('<script>window.location.href = "/cabinet";</script>');
  }
  else
  {
    header('location: /authorization?error=password');
  }
} else {
  // проверим, не проходит ли юзер регистрацию...
  $result = mysqli_query($sqli,"SELECT * FROM `temp_registration` WHERE `mail` = '".$form_login."'");
		/* определение числа рядов в выборке */
	if(mysqli_num_rows($result) > 0){
      $data_user = $result->fetch_assoc();
      if($form_password == $data_user['code_key']){
        // регистрируем пользователя и авторизуем его
        $query="INSERT INTO `user`(`vk_id`, `user_name`, `user_surname`, `user_patronymic`, `user_sex`, `time_reg`, `time_online`, `phone`, `mail`, `photo`, `photo_rec`, `password`, `user_level`) VALUES (0, '', '', '', '', '".$system_time."', '".$system_time."', '', '".$form_login."', '', '', '".$form_password."', 1)";
        $sqli->query($query);
    	$id_user = $sqli->insert_id;
        mysqli_query($sqli,"DELETE FROM `temp_registration` WHERE `mail` = '".$form_login."'");
	  	// Перепишем историю его анонимных перемещений на него авторизованного
		$sqli->query("UPDATE `movement_history` SET `id_user` = '".$id_user."', `identificator` = '' WHERE `identificator` = '".$_COOKIE['identificator']."' AND `id_user` = 0 ");
	    setcookie("identificator","",time()-3600,"/",''.$system_url.'');
	  	$token = gen_token();
	  	$query_token = "INSERT INTO `token`(`id_user`, `token`, `ip`, `time`) VALUES (".$id_user.", '".$token."', '".$system_user_ip."', '".$system_time."')";
		$sqli->query($query_token);
	    SetCookie('password',$token,time()+3600*24*365, '/',$system_url);
	    	// Уведомляем ответственных сотрудников о том, что кто-то зарегистрировался:
	            if( $curl = curl_init() ) {
	              $data = array(
	                'msg' => "На s-k56.ru зарегистрироались.",
	                'title' => "Уведомление: ",
	                'whom' => array("admin")
	              );
	      
	              curl_setopt($curl, CURLOPT_URL, 'https://api.s-k56.ru/Send-message-to-employees');
	              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	              curl_setopt($curl, CURLOPT_POST, true);
	              curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	              $out = curl_exec($curl);
	            }
	    die('<script>window.location.href = "/cabinet";</script>');
      } else {
      	header('location: /authorization?error=password');
      }
    } else {
    	echo '<script> console.log("провал"); </script>';
    }
}
  
}

if($_GET)
{
	// Автоматическую авторизация после восстановления пароля
	if($_GET['action'] == 'sign_in_update_pass')
	{
	  $form_login=urldecode($_GET['login']); #Получим логин от пользователя
	  $form_password=md5($_GET['password']); #Получим пароль от пользователя
	  ####################################################################################################
	  $DB=$sqli->query("SELECT * FROM `user` WHERE `mail` = '".$form_login."'")->fetch_assoc();
	  
	  if($form_password==$DB['password'])
	    {
	      $token = gen_token();
	      $query_token = "INSERT INTO `token`(`id_user`, `token`, `ip`, `time`) VALUES (".$DB['id'].", '".$token."', '".$system_user_ip."', '".$system_time."')";
	      $sqli->query($query_token);
	    	// Перепишем историю его анонимных перемещений на него авторизованного
			$sqli->query("UPDATE `movement_history` SET `id_user` = '".$data_user['id']."', `identificator` = '' WHERE `identificator` = '".$_COOKIE['identificator']."' AND `id_user` = 0 ");
	      SetCookie('password',$token,time()+3600*24*365, '/',$system_url);
	      echo '<script>window.location.href = "/cabinet?action=update_password";</script>';
	    }
	    else
	    {
	      header('location: /authorization?error=authorization');
	    }
	}

#	uid (integer) — идентификатор пользователя;
#	first_name (string) — имя;
#	last_name (string) — фамилия;
#	photo (string) — URL фотографии профиля пользователя шириной 200px;
#	photo_rec (string) — URL фотографии профиля пользователя шириной 50px;
#	hash (string) — служебный параметр, необходимый для проверки авторизации на удаленной стороне.
	if($_GET['uid']){
    	$token = gen_token();
		$DB=$sqli->query("SELECT * FROM `user` WHERE `vk_id` = '".$_GET['uid']."'");
		if(mysqli_num_rows($DB) > 0){
			// Пользователь существует, обновим данные
			$sqli->query("UPDATE `user` SET `user_name` = '".$_GET['first_name']."', `user_surname` = '".$_GET['last_name']."', `photo` = '".$_GET['photo']."', `photo_rec` = '".$_GET['photo_rec']."', `password` = '".$_GET['hash']."' WHERE `id` = '".$_GET['id']."' ");
		    $data_user = $DB->fetch_assoc();
		    $sqli->query("DELETE FROM `token` WHERE `id_user` = '".$data_user['id']."' AND `ip` = '".$system_user_ip."' ");
		    $query_token = "INSERT INTO `token`(`id_user`, `token`, `ip`, `time`) VALUES (".$data_user['id'].", '".$token."', '".$system_user_ip."', '".$system_time."')";
	    	$sqli->query($query_token);
	    	// Перепишем историю его анонимных перемещений на него авторизованного
			$sqli->query("UPDATE `movement_history` SET `id_user` = '".$data_user['id']."', `identificator` = '' WHERE `identificator` = '".$_COOKIE['identificator']."' AND `id_user` = 0 ");
		    setcookie("identificator","",time()-3600,"/",''.$system_url.'');
		} else {
			// Новый пользователь
	        $query = "INSERT INTO `user`(`vk_id`, `user_name`, `user_surname`, `user_patronymic`, `user_sex`, `time_reg`, `time_online`, `phone`, `mail`, `photo`, `photo_rec`, `password`, `user_level`) VALUES (".$_GET['uid'].", '".$_GET['first_name']."', '".$_GET['last_name']."', '', '', '".$system_time."', '".$system_time."', '', '', '".$_GET['photo']."', '".$_GET['photo_rec']."', '".$_GET['hash']."', 1)";
    		$sqli->query($query);
    		$id_user = $sqli->insert_id;
    		$query_token = "INSERT INTO `token`(`id_user`, `token`, `ip`, `time`) VALUES (".$id_user.", '".$token."', '".$system_user_ip."', '".$system_time."')";
    		$sqli->query($query_token);
    		// Перепишем историю его анонимных перемещений на него авторизованного
			$sqli->query("UPDATE `movement_history` SET `id_user` = '".$id_user."', `identificator` = '' WHERE `identificator` = '".$_COOKIE['identificator']."' AND `id_user` = 0 ");
		    setcookie("identificator","",time()-3600,"/",''.$system_url.'');
		}
	    setcookie('password',$token,time()+3600*24*365, '/',$system_url);
	    //  document.cookie = "password='.$token.'";
      die('<script> window.location.href = "/cabinet";</script>');
		
	} else {
    if($_GET['email']){
    	if($_GET['pass']){
    		if($my_data['user_level'] < 1){
				$DB=$sqli->query("SELECT * FROM `user` WHERE `mail` = '".$_GET['email']."'");
	    		$token = gen_token();
				if(mysqli_num_rows($DB) > 0){
					// Вставим регистрационные данные в окошко ввода данных
					echo '<script> setTimeout( () => { $("#signinform-email").val("'.$_GET['email'].'"); $(\'#signinform-password\').val("'.$_GET['pass'].'"); $(\'#sumbit_button_auth\').click(); }, 1000); </script>';
				} else {
					$DB=$sqli->query("SELECT * FROM `temp_registration` WHERE `mail` = '".$_GET['email']."'");
					if(mysqli_num_rows($DB) > 0){
						$data_user = $DB->fetch_assoc();
						if($data_user['code_key'] == md5($_GET['pass'])){
							$query="INSERT INTO `user`(`vk_id`, `user_name`, `user_surname`, `user_patronymic`, `user_sex`, `time_reg`, `time_online`, `phone`, `mail`, `photo`, `photo_rec`, `password`, `user_level`) VALUES (0, '', '', '', '', '".$system_time."', '".$system_time."', '', '".$_GET['email']."', '', '', '".$data_user['code_key']."', 1)";
	        				$sqli->query($query);
	    					$id_user = $sqli->insert_id;
							// автоматически завершаем регистрацию
							$query_token = "INSERT INTO `token`(`id_user`, `token`, `ip`, `time`) VALUES (".$id_user.", '".$token."', '".$system_user_ip."', '".$system_time."')";
					    	$sqli->query($query_token);
					    	// Перепишем историю его анонимных перемещений на него авторизованного
							$sqli->query("UPDATE `movement_history` SET `id_user` = '".$data_user['id']."', `identificator` = '' WHERE `identificator` = '".$_COOKIE['identificator']."' AND `id_user` = 0 ");
						    setcookie("identificator","",time()-3600,"/",''.$system_url.'');
						    setcookie('password',$token,time()+3600*24*365, '/',$system_url);
						    die('<script> window.location.href = "/cabinet";</script>');
						}
					}
				}
    		}
    	} else {
	      echo "<script> 
	      
	      setTimeout( () => { 
	        $('#signinform-email_reg').val('".$_GET['email']."');
	        $('#signinform-email').val('".$_GET['email']."');
	        send_mail_from_server();
	      }, 1000); 
	
	      </script>";
    	}
    }
  }
}
####################################################################################################
if($my_data['user_level'] > 0)
{
  include '../../page_elements/head.php';
  echo '
    <div class="container">
    <div class="row">
    <div class="col-12 text-center mt-5 mb-5 pt-5 pb-5">
      <h3>Вы авторизованы</h3>
      <a href="/cabinet" class="btn button-primary mt-2" type="submit">Перейти в личный кабинет</a>
      <a href="/exit" class="btn button-primary mt-2" type="submit">ВЫЙТИ</a>
    </div>
    </div>
    </div>
  ';
  stop();
}

include '../../page_elements/head.php';
if($_GET['error']=='password')
{
  error("Логин или пароль указан не правильно.","","");
} 
?>


<div class="container-fluid pt-4 pb-4" style="background-color: whitesmoke;">
  <div class="row">
    <div class="container">
      <div class="row mt-5 mb-5">
        <div class="col-0 col-lg-2"></div>
        <div class="col-0 col-lg-8 card bg-white">
          <div class="row" style="border-radius: 8px;">
            <div class="col-12 col-lg-7">
              <div class="card-body">
                <h4 class="font-weight-bold mb-3 text-center" style="font-size: 25px; color: #242424;">Войти в аккаунт</h4>
                <form id="signin-form" method="post" action="/authorization" novalidate="novalidate">
                  <div class="input-group mb-3">
                    <div class="input-group-text" id="correct_mail_span">
                      <span class="fa fa-envelope-o text-center" aria-hidden="true" style="width: 20px;"></span>
                    </div>
                    <input type="email" id="signinform-email" class="form-control" name="form_login" placeholder="Email или номер" data-constraints="@Required">
                    <span class="form-validation"></span>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-text form-control-lg">
                      <span class="fa fa-lock text-center" aria-hidden="true" style="width: 20px;"></span>
                    </div>
                    <input type="password" id="signinform-password" class="form-control" name="password" placeholder="Пароль" data-constraints="@Required">
                    <span class="form-validation"></span>
                  </div>

                  <div class="row mt-3">
                    <div class="col-6">
                      <button type="submit" id="sumbit_button_auth" class="popup-subscribes-land__link">Войти</button>
                    </div>
                    <div class="col-6 text-right">
                      <a href="#" class="btn btn-link px-0" id="kt_login_forgot"  data-toggle="modal" data-target="#restore-password">Забыли пароль?</a>
                    </div>
                    <div class="col-5 mt-2 text-right d-flex align-items-center justify-content-between">
                      <h4 style="font-size: 15px;">Или войти через:</h4>
                    </div>
                    <div class="col-7 mt-2">
                      <img src="https://pngimg.com/uploads/vkontakte/vkontakte_PNG3.png" width="80" data-toggle="modal" data-target="#auth_from_vk" alt="авторизация через вк">
                      <a class="button pl-1 pr-1 mt-0" style="border-radius: 6px; background: white; color: white;" href="https://connect.ok.ru/oauth/authorize?client_id=512000769079&amp;scope=GET_EMAIL&amp;response_type=token&amp;redirect_uri=https://s-k56.ru/authorization&amp;layout=a"><img src="https://www.kv.by/sites/default/files/pictures/mainimage/2016/07/ok_logo_sign_white.png" width="40" alt="авторизация через сайт одноклассники"></a>
                    </div>
                  </div>

                </form>
              </div>
              <div class="d-lg-none mb-4"></div>
            </div>
            <div class="col-12 col-lg-5 pl-0 pr-0 text-center" style="background-color: #2879fe; margin-bottom: -20px; margin-top: -20px; border-radius: 8px;">
              <div class="card-body" id="this_register">
                <h4 class="font-weight-bold text-center" style="font-size: 25px; color: white;">Регистрация</h4>
                <p class="text-white pb-2" style="font-size: 18px;">Нет учетной записи ?</p>
                <form class="kt-form" action="#" onsubmit="return send_mail_from_server();">
                  <div class="input-group">
                    <input type="email" id="signinform-email_reg" class="form-control" style="height: 42px;" name="email_2" placeholder="Email" data-constraints="@Required">
                    <span class="form-validation"></span>
                    <button type="submit" class="popup-subscribes-land__link p-3 mt-4" style="background: none!important; border: 2px solid white; max-width: none; height: 80px; line-height: 25px;">Зарегистрироваться сейчас</button>
                  </div>
                </form>
              </div>
              <div class="card-body d-none" id="announcement">
                <h4 class="font-weight-bold text-center mb-4" style="font-size: 25px; color: white;">Регистрация</h4>
                
                <h5 class="text-white">На Вашу почту был отправлен пароль для входа на сайт, введите его в поле авторизации левее. Позже на Вашу почту будет выслан буклет с подробной информацией по нашей продукции, с картинками и ценами.</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="col-0 col-lg-2"></div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="restore-password" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document" style="padding-top: 40px;">
    <div class="modal-content background_fon_metal border_fon_metal">
    	<div class="modal-header">
                <div class="card-header card-header-primary text-center wow_modal_heder border_fon_metal">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-times" aria-hidden="true"></span></button>
                    <h4 class="card-title mt-0" style="color: white; font-weight: 700;">Восстановление пароля</h4>
                    <h5 class="text-white">На Вашу почту будет отправлен код для сброса пароля</h5>
                </div>
            </div>
      <div class="modal-body">
		<form class="needs-validation" method="post" action="/restore_password">
            <div class="form-wrap">
              <input class="form-input form-control-has-validation" id="restore-password-form-email" type="email" name="form_login" data-constraints="@Email @Required"><span class="form-validation"></span>
              <label class="form-label rd-input-label" for="restore-password-form-email">Введите email</label>
            </div>
            <!--<div class="form-button">-->
            <!--  <button class="button button-primary" style="width: 150px; padding: 0px;" type="submit">Отправить</button>-->
              
              
            <!--</div>-->
            <div class="button_box metall_button align-center" style="text-align: center; padding: 0px; width: 300px; height: 52px;">
					<div class="" style="max-width: none; padding-top: 12px;">
						<button type="submit" class="h3" style="background: none; border: 0px; font-size: 22px;">
							Продолжить
						</button>
					</div>
					</div>
        </form>
      </div>
      <div class="modal-footer text-center" style="display: contents;">
        <button type="button" class="btn btn-outline-primary btn-md" data-dismiss="modal"><b>Закрыть</b></button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="auth_from_vk" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content d-flex align-items-center justify-content-between">
      <script src="https://vk.com/js/api/openapi.js?168"></script>
				<script>
				  VK.init({apiId: 7676533});
				</script>
				
				<!-- VK Widget -->
				<div id="vk_auth"></div>
				<script>
				  VK.Widgets.Auth("vk_auth", {"authUrl":"/authorization"});
				</script>
    </div>
  </div>
</div>

<script>
  function send_mail_from_server() {
    if ($('#signinform-email_reg').val() == '') {
      return false;
    } else {
      let emailReg = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
      if (!emailReg.test($('#signinform-email_reg').val())) {
        alert('Укажите почтовый адрес правильно');
        return false;
      }
    }
    $.ajax({
      type: "POST",
      url: "../../system_files/registration.php",
      dataType: 'text',
      data: {
        email: $('#signinform-email_reg').val()
      },
      success: function(data) {
        console.log('data: ', data)
        data = JSON.parse(data);
        if(data['msg'] == 'error'){
        	if(data['text'] != undefined){
        		alert(data['text']);
        	} else {
        		alert('произошла ошибка');
        	}
        } else {
    $('#this_register').addClass('d-none');
    $('#announcement').removeClass('d-none');
    $('#signinform-email').val($('#signinform-email_reg').val());
    $('#signinform-email').css('background', 'lightgreen');
    $('#correct_mail_span').css('background', 'lightgreen');
    $('#signinform-password').attr("placeholder", "Пароль из сообщения");
    $('input[name="password"]').focus();
        }
      }
    })
    return false;
  }
</script>


<?
include '../../page_elements/foot.php';
?>