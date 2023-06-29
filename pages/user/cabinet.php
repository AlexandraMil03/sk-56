<?
/*##################################################################################################
# Описание действия скрипта: меню админки.                                                         #
##################################################################################################*/
$page_title="Управление сайтом";
$page_keywords="нет, ключевых, слов";
$page_description="Нет описания страницы";
$page_robots="noindex,nofollow";
include '../../system_files/settings.php';
include '../../system_files/core.php';
level_user(); #Доступ авторизированым.
include '../../page_elements/head.php';

$post = (!empty($_POST)) ? true : false;
if($post){
	if($_POST['user_name']){
		$sqli->query("UPDATE `user` SET `user_name` = '".$_POST['user_name']."' WHERE `id` = '".$my_data['id']."' ");
	}
	if($_POST['surname']){
		$sqli->query("UPDATE `user` SET `user_surname` = '".$_POST['surname']."' WHERE `id` = '".$my_data['id']."' ");
	}
	if($_POST['patronymic']){
		$sqli->query("UPDATE `user` SET `user_patronymic` = '".$_POST['patronymic']."' WHERE `id` = '".$my_data['id']."' ");
	}
	if($_POST['phone']){
		$sqli->query("UPDATE `user` SET `phone` = '".$_POST['phone']."' WHERE `id` = '".$my_data['id']."' ");
	}
	if($_POST['email']){
		$sqli->query("UPDATE `user` SET `mail` = '".$_POST['email']."' WHERE `id` = '".$my_data['id']."' ");
	}
	
	if($my_data['user_level'] > 2){
		if($_POST['ban_email']){
			$result = mysqli_query($sqli,"SELECT * FROM `subscribers_mail` WHERE `mail` = '".$_POST['ban_email']."'");
          	if(mysqli_num_rows($result) > 0){
				$sqli->query("UPDATE `subscribers_mail` SET `status` = 'ban' WHERE `mail` = '".$_POST['ban_email']."'");
          	} else {
          		$report_generation="INSERT INTO `subscribers_mail`(`mail`, `time`, `status`)VALUES('".$_POST['ban_email']."', '".$system_time."', 'ban')";
    			mysqli_query($sqli,$report_generation); #Вносим в БД
          	}
		}
	}
}

echo '<div class="container">
<div class="bg-white shadow-lg mt-0 mb-0 p-3 pt-5 pb-5 rounded">';
####################################################################################################
?>

<div class="row row-50 d-flex align-items-center justify-content-between">
	<div class="col-2 mb-3">
	<div class="avatar mx-auto white rounded-circle" style="width: 100px;
          height: 100px;
          border: 2px solid #515151; overflow: hidden;
          display: flex;
          justify-content: center;
          align-items: center;"><img src="
          <?
          if($my_data['photo']){
        	echo $my_data['photo'];
          } else {
          	echo '../images/system/user.png';
          }
          ?>
          " style="height: 100%;
              width: auto;" alt="avatar">
          </div>
         </div>
         <div class="col-10 mb-3">
         	<?
         	echo '
<h4 class="pl-5">Здравствуйте '; if($my_data['user_name']){ echo ', '.$my_data['user_name']; } echo '! Скрытая информация на сайте разблокирована.';
if(!$my_data['user_name'] || !$my_data['user_surname'] || !$my_data['user_patronymic'] || !$my_data['phone'] || !$my_data['mail']){
echo '
Дополните информацию о себе:';
}
echo '</h4><hr>';
?>
</div>

<?

if($my_data['user_level'] > 2){
  echo '
  <div class="col-12">
  <section class="dark-grey-text text-center">
    <!-- Section heading -->
    <h3 class="font-weight-bold black-text mb-4 pb-2">Управление сайтом</h3>
    <hr class="w-header">

    <!--First row-->
    <div class="row pt-3 d-flex justify-content-center">
      
      <div class="col-12 col-sm-3 col-lg-3 mt-2">
        <a href="/admin/user_administration" class="card hoverable">
          <div class="card-body my-4">
          	<p><i class="fas fa-users fa-2x text-muted"></i></p>
            <h5 class="black-text mb-0">Пользователи</h5>
          </div>
        </a>
      </div>
      <div class="col-12 col-sm-3 col-lg-3 mt-2">
        <a href="/admin/services_and_prices" class="card hoverable">
          <div class="card-body my-4">
          	<p><i class="fas fa-tasks fa-2x text-muted"></i></p>
            <h5 class="black-text mb-0">Услуги и цены</h5>
          </div>
        </a>
      </div>
      <div class="col-12 col-sm-3 col-lg-3 mt-2">
        <a href="/admin/vakansii-edit" class="card hoverable">
          <div class="card-body my-4">
          	<p><i class="fas fa-star-half-alt fa-2x text-muted"></i></p>
            <h5 class="black-text mb-0">Вакансии</h5>
          </div>
        </a>
      </div>
      <div class="col-12 col-sm-3 col-lg-3 mt-2">
        <a href="/admin/procurement-editing" class="card hoverable">
          <div class="card-body my-4">
          	<p><i class="fas fa-star-half-alt fa-2x text-muted"></i></p>
            <h5 class="black-text mb-0">Закупки</h5>
          </div>
        </a>
      </div>
      </div>

	</section>
  </div>
  <div class="col-0 col-lg-3"></div>
  <div class="col-12 col-lg-6 text-center">
    <h4><a href="https://wp.s-k56.ru">Администрирование: wp.s-k56.ru</a></h4>
  </div>
  <div class="col-0 col-lg-3"></div>
  ';
}

if($my_data['user_level'] > 2){   
	echo '
	<div class="col-lg-6 mb-5">
          <h6 class="text-center foot_signature">Заблокируйте почтовый ящик:</h6>
		</div>
	<div class="col-lg-6 mb-5">
	<form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="/cabinet" novalidate="novalidate">
          <div class="rd-mailform form_inline form_lg" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="system_files/subscribe.php" novalidate="novalidate">

            <div class="form-wrap">
              <input class="form-input form-control-has-validation" id="subscribe-form-footer-form-email" type="email" name="ban_email" data-constraints="@Email @Required"><span class="form-validation"></span>
              <label class="form-label rd-input-label" for="subscribe-form-footer-form-email">Введи блокируемый email</label>
            </div>
            <div class="form-button">
              <button class="button button-primary" style="width: 150px; padding: 0px;" type="submit">Заблокировать</button>
            </div>
          </div>
          </form>
        </div>
        ';
}
echo '
<div class="col-0 col-lg-2 text-center"></div>';

if(!$my_data['user_name'] || !$my_data['user_surname'] || !$my_data['user_patronymic'] || !$my_data['phone']  || !$my_data['mail']) {
echo '
<div class="col-12 col-lg-4 text-center">
	<form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="/cabinet" novalidate="novalidate">
';
if(!$my_data['user_name']){
                            echo'<div class="form-wrap">
                                  <label class="form-label rd-input-label" for="contact-name">Ваше имя</label>
                                  <input class="form-input form-control-has-validation" id="contact-name" type="text" name="user_name">
                                 </div>';
}
if(!$my_data['user_surname']){
                            echo'<div class="form-wrap">
                                  <label class="form-label rd-input-label" for="contact-surname">Ваша фамилия</label>
                                	<input class="form-input form-control-has-validation" id="contact-surname" type="text" name="surname">
                                 </div>';
}
if(!$my_data['user_patronymic']){
                            echo'<div class="form-wrap">
                                  <label class="form-label rd-input-label" for="contact-patronymic">Отчество</label>
                                  <input class="form-input form-control-has-validation" id="contact-patronymic" type="text" name="patronymic">
                                 </div>';
}
if(!$my_data['phone']){
                            echo'<div class="form-wrap">
                            	  <label class="form-label rd-input-label" for="contact-phone">Телефон</label>
                                  <input class="form-input form-control-has-validation" id="contact-phone" type="text" name="phone">
                                </div>';
}
if(!$my_data['mail']){
                            echo'<div class="form-wrap">
                                  <label class="form-label rd-input-label" for="contact-email-mail">E-mail</label>
                                  <input class="form-input form-control-has-validation" id="contact-email-mail" type="email" name="email">
                                 </div>';
}
echo '
                                <button class="button button-block button-secondary button-ujarak" type="submit">Сохранить</button>
                          </form>	
</div>';
}
?>

	<div class="col-12">
		  <div class="container my-5 py-5 z-depth-1">


    <!--Section: Content-->
    <section class="text-center px-md-5 mx-md-5 dark-grey-text">

      <h3 class="font-weight-bold">Выйти из аккаунта <a class="button button-primary" href="/exit" role="button">Выйти <i class="fa fa-sign-out" aria-hidden="true"></i></a></h3>

    </section>
    <!--Section: Content-->


  </div>
	</div>
	</div>

<?
echo '
<hr>
<h3 class="mt-5">Статус системы</h3>
<p>Режим разработчика: '; if($settings['developer']=='0'){echo '<span style="color: green;">выключен</span>';}else{echo '<span style="color: red;">включен</span>';} echo '</p>
<p>Доступ к сайту: ';if($settings['site_online']=='0'){echo '<span style="color: red;">выключен</span>';}else{echo '<span style="color: green;">включен</span>';} echo '</p>
<p>Регистрация: ';if($settings['registration']=='0'){echo '<span style="color: red;">выключена</span>';}else{echo '<span style="color: green;">включена</span>';} echo '</p>
</div>';
####################################################################################################
echo '</div>';
include '../../page_elements/foot.php';
?>