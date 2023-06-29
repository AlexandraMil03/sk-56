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
         	<? if($my_data['user_name'] != ''){
         		echo '<h4 class="pl-5">Здравствуйте, '.$my_data['user_name'].'!</h4><hr>';
			} else {
				echo '<h4 class="pl-5">Добро пожаловать!</h4><hr>';
			}
			?>
			<h5>Раздел находится в разработке</h5>
</div>
          
          <!--
	<h4 class="pl-2 mb-3">Предлагаем обмен! Вы нам Вашу почту, а мы Вам актуальную информацию по ценам на нашу продукцию. Почта даст нам возможность уведомить Вас о каких-либо нововведениях или предложения. Спама не будет, только конкретика.
	</h4>
	<div class="col-lg-6 mb-2">
          <div class="rd-mailform form_inline form_lg" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="system_files/subscribe.php" novalidate="novalidate">

            <div class="form-wrap">
              <input class="form-input form-control-has-validation" id="subscribe-form-footer-form-email" type="email" name="email" data-constraints="@Email @Required"><span class="form-validation"></span>
              <label class="form-label rd-input-label" for="subscribe-form-footer-form-email">Your E-mail</label>
            </div>
            <div class="d-none d-lg-block d-sm-block form-button">
              <button class="button button-primary" style="width: 130px; padding: 0px;" onclick="subscribe_mail()">Подписаться</button>
            </div>
          </div>
        </div>
	<div class="col-lg-6 mb-2">
          <h5 class="d-none d-lg-block d-sm-block text-center foot_signature">Акции, скидки, события</h5>
            <div class="d-sm-none d-lg-none form-button" style="width: 100%;">
              <button class="button button-primary" style="width: 100%;" type="submit">Акции, скидки, события</button>
            </div>
		</div>
		-->
        
	<hr>
	<div class="col-12">
	<h5>Вы наш сотрудник? Административный раздел теперь расположен по новому адресу.</h5>
	<br>
	<a href="http://wp.s-k56.ru/" target="_blank" class="button btn-sm button-primary mt-3">Открыть</a>
	</div>
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
<!--<div class="row row-50 justify-content-md-center justify-content-lg-start">-->
<!--    <div class="col-md-10 col-lg-4 text-center">-->
<!--        <div class="image-custom-1 pl-5"><img src="../images/system/icon/request.png" alt="" width="200" height="145"></div>-->
<!--    </div>-->
<!--    <div class="col-md-10 col-lg-8">-->
<!--        <div class="text-center">-->
<!--            <h4>Заявки ООО «Стальная компания»</h4>-->
<!--            <p>Вы можете поставить заявку на приобретение чего-либо и отслеживать её выполнение</p>-->
<!--        </div>-->
<!--        <div class="row mt-4">-->
         <?
# <!--        if($my_data['user_level'] > 2){-->
# <!--            echo '<div class="col-12 col-sm-6 justify-content-center">-->
#<!--                <a href="/admin/new_requests" class="button button-block button-secondary button-ujarak p-4 pl-5 pr-5 mt-0">Новые заявки-->
# <!--                ';-->
# <!--                    $result = mysqli_query($sqli,"SELECT * FROM `request` WHERE `status` = ''");-->
# <!--                    if(mysqli_num_rows($result) > 0){-->
# <!--                        echo '<span class="badge rounded red z-depth-1" alt="Notifications" style="top: -8px; left: 3px; position: inherit;">'.mysqli_num_rows($result).'</span>';-->
# <!--                    }-->
                    
# <!--                    echo '</a>-->
# <!--            </div>-->
# <!--            <div class="col-12 col-sm-6 justify-content-center">-->
# <!--                <a href="/admin/fulfill_requests" class="button button-block button-secondary button-ujarak p-4 pl-5 pr-5 mt-0 mb-4">Выполняю-->
# <!--                ';-->
# <!--                    $result = mysqli_query($sqli,"SELECT * FROM `request` WHERE `status` = 'received' AND `id_executor` = '".$my_data['id']."'");-->
# <!--                    if(mysqli_num_rows($result) > 0){-->
# <!--                        echo '<span class="badge rounded red z-depth-1" alt="Notifications" style="top: -8px; left: 3px; position: inherit;">'.mysqli_num_rows($result).'</span>';-->
# <!--                    }-->
# <!--                    echo '</a>-->
# <!--            </div>';-->
# <!--        }-->
         ?>
<!--        <div class="col-12 col-sm-12 col-md-12 col-lg-4 justify-content-center text-center">-->
<!--            <a href="/admin/my_requests" class="btn button-default btn-lg mt-3">Мои заявки</a>-->
<!--        </div>-->
<!--        <div class="col-12 col-sm-12 col-md-12 col-lg-4 justify-content-center text-center">-->
<!--            <a href="/admin/add_requests" class="btn button-default btn-lg p-4 pl-5 pr-5 mt-3">Поставить заявку</a>-->
<!--        </div>-->
<!--        <div class="col-12 col-sm-12 col-md-12 col-lg-4 justify-content-center text-center">-->
<!--            <a href="/admin/all_requests" class="btn button-default btn-lg mt-3">Все заявки</a>-->
<!--        </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
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