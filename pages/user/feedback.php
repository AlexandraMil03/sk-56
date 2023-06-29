<?
/*##################################################################################################
# Описание действия скрипта: 
##################################################################################################*/
$page_title = "Обратная связь";
$page_keywords = "плазменная резка, стружкодробилки, токарные работы, металлическая стружка, грузоперевозки орск, дробильное оборудование, грузоперевозки оренбург";
$page_description = "Контакты компании ООО «Стальная компания»: адрес, телефон, карта проезда. Здесь Вы можете сделать заказ или задать вопрос.";
$page_robots = "index,follow";
include '../../system_files/settings.php';
include '../../system_files/core.php';
include '../../page_elements/head.php';
?>
<section class="breadcrumbs-custom">
  <div class="breadcrumbs-custom__aside pt-2 pb-2 bg-image context-dark" style="background-image:url(/images/system/feedback_img.jpg)">
    <div class="container">
      <h2 class="breadcrumbs-custom__title">Контактная информация</h2>
      <h4 class="mt-1">ООО «Стальная Компания»</h4>
    </div>
  </div>
</section>
<section class="section section-sm bg-white box_shadow">
  <div class="container container_bigger">
    <div class="row justify-content-md-center justify-content-xl-between row-2-columns-bordered row-50">
      <div class="col-md-10 col-lg-5">
        <h3 style="font-size:31px"><strong>Основные контакты</strong></h3>
        <ul class="list-creative">
          <li class="p-3">
            <dl class="list-terms-medium list-terms-medium_secondary">
              <dt>КОММЕРЧЕСКИЙ ДЕПАРТАМЕНТ</dt>
              <dd id="coll_map" style="color:#000!important"><span>Александр Щербина:</span> <a href="tel:89033600301">8-903-360-03-01</a><br><span>Жалгас Кужбанов:</span> <a href="tel:+79619296261">8-961-929-62-61</a></dd>
            </dl>
          </li>
          <li class="p-3">
            <dl class="list-terms-medium">
              <dt>Снабжение</dt>
              <dd style="color:#000!important">
                <ul class="list-comma">
                  <li>Сергей Александрович: <a href="tel:+79619249074">8-961-924-90-74</a></li>
                </ul>
              </dd>
            </dl>
          </li>
          <li class="p-3">
            <dl class="list-terms-medium list-terms-medium_tertiary">
              <dt>Главный инженер</dt>
              <dd style="color:#000!important">
                <ul class="list-comma">
                  <li>Андрей Миронов: <a href="tel:+79033950448">8-903-395-04-48</a></li>
                </ul>
              </dd>
            </dl>
          </li>
          <li class="p-3">
            <dl class="list-terms-medium list-terms-medium_secondary">
              <dt>Отдел по закупкам, заготовке и реализации лома цветных и чёрных металлов</dt>
              <dd id="coll_map" style="color:#000!important"><span>Андрей Рязанов:</span> <a href="tel:+79033678787">8-903-367-87-87</a><br><span>Жалгас Кужбанов:</span> <a href="tel:+79619296261">8-961-929-62-61</a></dd>
            </dl>
          </li>
        </ul>
      </div>
      <div class="col-md-10 col-lg-7 col-xl-6">
        <h3 class="text-center" style="font-size:31px"><strong>Напишите нам</strong></h3>
        <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" action="/feedback" method="post" novalidate><input type="hidden" name="from" value="contacts">
          <div class="row align-items-md-end row-20">
            <div class="col-md-6">
              <div class="form-wrap"><input class="form-input form-control-has-validation" id="contact-name" name="name" data-constraints="@Required"><span class="form-validation"></span> <label class="form-label rd-input-label" for="contact-name">Ваше имя</label></div>
            </div>
            <div class="col-md-6">
              <div class="form-wrap"><input class="form-input form-control-has-validation" id="contact-phone" name="phone" data-constraints="@PhoneNumber"><span class="form-validation"></span> <label class="form-label rd-input-label" for="contact-phone">Телефон</label></div>
            </div>
            <div class="col-sm-12">
              <div class="form-wrap"><label class="form-label rd-input-label" for="contact-message">Сообщение</label> <textarea class="form-input form-control-has-validation form-control-last-child" id="contact-message" name="message" data-constraints="@Required"></textarea><span class="form-validation"></span></div>
            </div>
            <div class="col-md-6">
              <div class="form-wrap"><input class="form-input form-control-has-validation" id="contact-email" type="email" name="email" data-constraints="@Email @Required"><span class="form-validation"></span> <label class="form-label rd-input-label" for="contact-email">E-mail</label></div>
            </div>
            <div class="col-md-6">
              <div class="dropdown" id="ADD_input_for_php"><button type="button" class="button button-block" data-toggle="dropdown"><span id="button_get_text"><span class="delete_this_text" style="font-size:12px">Тема обращения <span class="fa-angle-double-down text-center"></span></span></span></button>
                <div class="dropdown-menu"><a class="dropdown-item" href="#!" onclick='text_in_button("Оборудование и техника")'>Оборудование и техника</a> <a class="dropdown-item" href="#!" onclick='text_in_button("Металлообработка")'>Металлообработка</a> <a class="dropdown-item" href="#!" onclick='text_in_button("Покупка/продажа стружки")'>Покупка/продажа стружки</a> <a class="dropdown-item" href="#!" onclick='text_in_button("Брикетрирование стружки")'>Брикетрирование стружки</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="#!" onclick='text_in_button("Другое")'>Другое</a>
                </div>
              </div>
            </div>
            <div class="col-2 col-md-1" onclick="checked_state()"><input type="checkbox" class="option-input checkbox position-static" name="checked_state" style="height:34px;width:34px" checked></div>
            <div class="col-10 col-md-11"><label class="label">Я принимаю условия <a href="/policy" target="_blank" style="color:#000">Политики конфиденциальности</a> и даю <a href="security" target="_blank" style="color:#000">согласие на обработку моих персональных данных</a>.</label></div><button id="Button" class="button button-block button-secondary button-ujarak btn btn-lg btn-primary" type="submit" onclick="ADD_input_for_php()" style="margin-top:0;margin-left:15px;margin-right:15px">Отправить</button>
          </div>
        </form>
      </div> <?

              $post = (!empty($_POST)) ? true : false;

              if ($post) {
                $to  = 'west160321@gmail.com' . ', ';
                $to .= 'feedback@s-k56.ru' . ', ';
                $to .= 'stal-kom@inbox.ru' . ', ';
                $to .= 'denisdstu@gmail.com' . ', ';
                $to .= 'R.Bikbaev@s-k56.ru' . ', ';
                $to .= 'ru249074@gmail.com' . ', ';
                $to .= 'A.Mironov@s-k56.ru' . ', ';
                $to .= 'J.Kujbanov@s-k56.ru' . ', ';
                $to .= 'O.Scherbina@s-k56.ru';

                $email = trim($_POST['email']);
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['message']);
                $tel = htmlspecialchars($_POST["phone"]);
                $category = htmlspecialchars($_POST['category']);
                $error = '';
                $ip_adress_user = $_SERVER["REMOTE_ADDR"];
                $ip_adress_server = $_SERVER['HTTP_X_FORWARDED_FOR'];

                if (!$name) {
                  $error .= 'Пожалуйста введите ваше имя<br />';
                }

                function ValidateTel($valueTel)
                {
                  $regexTel = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
                  if ($valueTel == "") {
                    return false;
                  } else {
                    $string = preg_replace($regexTel, "", $valueTel);
                  }
                  return empty($string) ? true : false;
                }
                if (!$email) {
                  $error .= "Пожалуйста введите email<br />";
                }
                if ($email && !ValidateTel($email)) {
                  $error .= "Введите корректный email<br />";
                }
                if (!$error)

                  if (!$message || strlen($message) < 1) {
                    $error .= "Введите ваше сообщение<br />";
                  }
                if (!$error) {
                  // Проверка на заблокированный email
                  $result = mysqli_query($sqli, "SELECT * FROM `subscribers_mail` WHERE `mail` = '" . $email . "'");
                  if (mysqli_num_rows($result) > 0) {
                    $result = mysqli_query($sqli, "SELECT * FROM `subscribers_mail` WHERE `mail` = '" . $email . "' AND `status` = 'ban'");
                    if (mysqli_num_rows($result) > 0) {
                      return '<script>console.log("Письмо не отправлено"); $(\'#alert-notification\').append(\'<div class="alert alert-error" id="alert_id_' . $system_rand_1 . '" onclick="close_notification(' . $system_rand_1 . ')">Ошибка: Почтовый ящик заблокирован, письмо не отправлено.</div>\'); </script>';
                    }
                  } else {
                    $report_generation = "INSERT INTO `subscribers_mail`(`mail`, `time`, `status`)VALUES('" . $email . "', '" . $system_time . "', '')";
                    mysqli_query($sqli, $report_generation); #Вносим в БД
                  }

                  if ($category != "") {

                    $name_tema = "=?utf-8?b?" . base64_encode($name) . "?=";

                    $subject = "Сообщение с главной формы сайта s-k56.ru";
                    $subject1 = "=?utf-8?b?" . base64_encode($subject) . "?=";

                    $message1 = "\n\nЗаявка от: " . $name . "\n\nКатегория заявки: " . $category . "\n\nВходящее сообщение: " . $message . "\n\nНомер телефона: " . $tel . "\n\nE-mail отправителя: " . $email . "\n\nIP адрес отправителя: " . $ip_adress_user . "\nIP адрес от провайдера: " . $ip_adress_server;


                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= "Content-type: text/html; charset=utf-8 \r\n";

                    $headers .= "From: s-k56.ru <system@bot.com>\n\n";
                    $mail = mail($to, $subject1, iconv('utf-8', 'utf-8', $message1), iconv('utf-8', 'utf-8', $headers));

                    // Добавим почту в БД 
                    $check_for_subscription = mysqli_query($sqli, "SELECT * FROM `subscribers_mail` WHERE `mail` = '" . $email . "'");
                    if (mysqli_num_rows($check_for_subscription) < 1) {
                      $report_generation = "INSERT INTO `subscribers_mail`(`mail`, `time`, `status`)VALUES('" . $_POST['email'] . "', '" . $system_time . "', 'wrote')";
                      mysqli_query($sqli, $report_generation); #Вносим в БД
                    }

                    // Отправка сообщения сотрудникам
                    if ($curl = curl_init()) {
                      $data = array(
                        'msg' => "Категория: " . $category . "\nСообщение: " . $message1,
                        'title' => "ЗАПРОС ОТ КЛИЕНТА",
                        'contacts' => "Номер клиента: " . $tel . "\nE-mail: " . $email
                      );

                      curl_setopt($curl, CURLOPT_URL, 'https://api.s-k56.ru/Send-message-to-employees');
                      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                      curl_setopt($curl, CURLOPT_POST, true);
                      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                      $out = curl_exec($curl);
                    }
                    $msg = addslashes($message1);
                    // addcslashes
                    // Отправка лида в битрикс
                    file_get_contents("https://oplot.bitrix24.ru/rest/28/ohgkus1ubs36i49q/crm.lead.add.json?FIELDS[TITLE]=Заявка: " . $category . "&FIELDS[NAME]=" . $name . "&FIELDS[PHONE][0][VALUE]=" . $tel . "&FIELDS[PHONE][0][VALUE_TYPE]=WORK&FIELDS[EMAIL][0][VALUE]=" . $email . "&FIELDS[EMAIL][0][VALUE_TYPE]=WORK&FIELDS[COMMENTS]=Сообщение: " . $msg . "&FIELDS[SOURCE_ID]=WEB&FIELDS[SOURCE_DESCRIPTION]=s-k56.ru/feedback&FIELDS[ASSIGNED_BY_ID]=28");

                    if ($mail) {
                      echo 'OK';
                    }
                  } else {
                    echo '<div class="notification_error">Вы не выбрали категорию. Письмо не отправлено.</div>';
                  }
                  if ($send == 'true') {
                    echo "Спасибо за отправку вашего сообщения!<br><a href=https://s-k56.ru/feedback>Вернуться на главную!</a>";
                  }
                } else {
                  echo '<div class="notification_error">' . $error . '</div>';
                }
              }
              ?>
    </div>
  </div>
  <div class="container container_bigger">
    <div class="row">
      <div class="col-12">
        <h4><strong style="font-size:24px">Представительство в Оренбурге</strong></h4>
        <h5 class="mt-3">Адрес:<br><span><a href="#go_to_maps">Промышленная, 5/1. Индекс: 460026<br>Россия, Оренбург</a></span></h5>
        <h5 class="mt-3"><span>Секретарь: <a href="tel:+73532437702">+7 (3532) 43-77-02</a></span> <span><br>Почта: <a href="mailto:stal-kom@inbox.ru">stal-kom@inbox.ru</a></span></h5>
      </div>
      <div class="col-12 mt-5">
        <h4><strong style="font-size:24px">Представительство в Орске</strong></h4>
        <h5 class="mt-3">Адрес:<br><span><a href="#go_to_maps">ул. Дорожная, 13. Индекс: 462431<br>Россия, Орск</a></span></h5>
        <h5 class="mt-3"><span>Секретарь: <a href="tel:+73532427161">+7 (3532) 42-71-61</a></span> <span><br>Почта: <a href="mailto:stal-kom@inbox.ru">stal-kom@inbox.ru</a></span></h5>
      </div>
  </div>
  </div>
  </div>
</section>
<section class="section section-sm" id="map_add_padding">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 pb-5 mt-4">
        <h2 class="text-center" id="go_to_maps">Мы на карте:</h2>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card card-cascade narrower">
          <div class="view view-cascade gradient-card-header" style="background:#2879fe!important">
            <h5 class="mb-0 text-white">г. Оренбург, ул. Промышленная, 5/1</h5>
          </div>
          <div class="card-body card-body-cascade text-center">
            <div id="map-container-google-8" class="z-depth-1-half map-container-5" style="height:300px"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d733.4667860488835!2d55.14781311858097!3d51.804728725525386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x417bf6e381d7254f%3A0x3efaeb309d6fb981!2z0J_RgNC-0LzRi9GI0LvQtdC90L3QsNGPINGD0LsuLCA1LzEsINCe0YDQtdC90LHRg9GA0LMsINCe0YDQtdC90LHRg9GA0LPRgdC60LDRjyDQvtCx0LsuLCA0NjAwNDg!5e0!3m2!1sru!2sru!4v1683809162301!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card card-cascade narrower">
          <div class="view view-cascade gradient-card-header" style="background:#2879fe!important">
            <h5 class="mb-0 text-white">г. Орск, ул. Дорожная, 13</h5>
          </div>
          <div class="card-body card-body-cascade text-center">
            <div id="map-container-google-9" class="z-depth-1-half map-container-5" style="height:300px"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2497.046866788714!2d58.48119701596509!3d51.25504643694343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x417ffba9efee157f%3A0x3d8d8b583320e577!2z0JTQvtGA0L7QttC90LDRjyDRg9C7LiwgMTMsINCe0YDRgdC6LCDQntGA0LXQvdCx0YPRgNCz0YHQutCw0Y8g0L7QsdC7LiwgNDYyNDMx!5e0!3m2!1sru!2sru!4v1567363693277!5m2!1sru!2sru" style="border:0" allowfullscreen></iframe></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="container mb-5 pb-3">
  <div class="row text-center">
    <div class="col-lg-4 pt-2"><a href="/">
        <div class="card b-order__form button-zoom_out">
          <h4 class="form__header" style="color:#0b9dde">Главная</h4>
        </div>
      </a></div>
    <div class="col-lg-4 pt-2"><a href="/documents">
        <div class="card b-order__form button-zoom_out">
          <h4 class="form__header" style="color:#0b9dde">Документы компании</h4>
        </div>
      </a></div>
    <div class="col-lg-4 pt-2"><a href="/about">
        <div class="card b-order__form button-zoom_out">
          <h4 class="form__header" style="color:#0b9dde">О компании</h4>
        </div>
      </a></div>
  </div>
</div>
<script>
  var art = 0;
  var text_post = "";
  document.getElementById("Button").disabled = true;

  function text_in_button(get_text) {
    $("div.delete_this_text").remove();
    document.getElementById('button_get_text').innerHTML = '<span id="button_get_text" class="delete_this_text" style="font-size: 12px;">' + get_text + '</span>';
    $("#get_PHP_categori").val(get_text);
    text_post = get_text;
    art = 1;
    if ($('input[name="checked_state"]').is(':checked')) {
      document.getElementById("Button").disabled = false;
    }
  }

  function checked_state() {
    if ($('input[name="checked_state"]').is(':checked')) {
      if (art != 0) {
        document.getElementById("Button").disabled = false;
      }
    } else {
      document.getElementById("Button").disabled = true;
    }
  }

  function remove_categori_for_php() {
    $("#get_PHP_categori").remove();
  }

  function ADD_input_for_php() {
    document.getElementById('ADD_input_for_php').innerHTML = '<input type="hidden" name="category" id="get_PHP_categori" value="">';
    $("#get_PHP_categori").val(text_post);
    setTimeout(remove_categori_for_php, 2500);
  }
  $(document).ready(function() {
    $("#coll_map").on("click", "a", function(event) {
      event.preventDefault();
      var id = $(this).attr('href'),
        top = $(id).offset().top;
      $('body,html').animate({
        scrollTop: top
      }, 1500);
    });
  });
  $(document).ready(function() {
    var $window = $(window);

    function parallax_conteiner() {
      var windowsize = $window.width();
      if (windowsize < 1160) {
        $("#map_add_padding").removeClass("map_add_padding");
      }
      if (windowsize >= 1160) {
        $("#map_add_padding").addClass("map_add_padding");
      }
    }
    parallax_conteiner();
    $(window).resize(parallax_conteiner);
  });
</script>

<?
include '../../page_elements/foot.php';
?>