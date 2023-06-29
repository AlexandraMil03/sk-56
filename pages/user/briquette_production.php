<?
/*##################################################################################################
# Описание действия скрипта: 
##################################################################################################*/
$page_title = "Производство брикетов";
$page_keywords = "Брикетирование металлической стружки, брикетирование стружки, пресс брикетирование, стружкодробилки, токарные работы, металлическая стружка, дробильное оборудование, ";
$page_description = "Одним из видов деятельности нашей организации является производство и реализация брикетов из металлической стружки категории 6А.";
$page_robots = "index,follow";
include '../../system_files/settings.php';
include '../../system_files/core.php';
include '../../page_elements/head.php';
?>
<section class="breadcrumbs-custom"><div class="breadcrumbs-custom__aside bg-image context-dark" style="background-image:url(/images/system/template_img/bricket_title.jpg)"><div class="contaimail($to,ner"><h2 class="h3 breadcrumbs-custom__title font-weight-bold text_slider_index">Производство и реализация брикетов категории 6А</h2></div></div><div class="d-none d-lg-block d-sm-block breadcrumbs-custom__main bg-gray-light"><div class="container"><ul class="breadcrumbs-custom__path"><li><a href="/">Главная</a></li><li><a href="/briquetting-press">Брикетировочные пресса</a></li><li><a href="/ferroalloy_briquetting">Услуги брикетирования стружки</a></li><li class="active">Производство и реализация брикетов</li></ul></div></div></section><section class="container pt-4"><div class="row"><div class="col-md-10 col-lg-4 text-center"><div class="image-custom-1"><img src="images/system/template_img/briket_1.png" alt="briket 6A"></div></div><div class="col-md-10 col-lg-8 pt-3"><div class="box-inset-1"><div class="container p-0"><div class="row"><div class="col-lg-12"><p class="text-justify p_text">Основной сферой деятельности нашей организации является производство и реализация брикетов из металлической стружки категории 6А. Производственная мощность наших площадок составляет до 2 500 т/мес металлической стружки. Это достигается за счет:</p><ul class="list-marked list_inset" style="color:#151515;font-size:initial"><li>оптимизации производственных процессов;</li><li>глубокой модернизации технологической части оборудования;</li><li>широкого применения средств автоматизации;</li><li>наличия своей ремонтной базы и квалифицированного персонала.</li></ul></div></div></div></div></div> <?
      // Блок "оставить заявку"
      $id_modal_windows = 'myModal';
      include 'element/block-leave-a-request.php';
    ?> </div><div class="b-order b-order--short"><div class="d-none d-lg-block d-sm-block b-order__phone pt-4 pb-5"><h3 class="h4">или позвоните: +7 (3532) 43-77-02</h3></div><div class="d-sm-none d-lg-none b-order__phone"><h3>или позвоните<br><strong>+7 (3532) 43-77-02</strong></h3></div></div></section><div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog pt-5" role="document"><div class="modal-content"><div class="modal-header"><div class="d-flex card-header card-header-primary text-center wow_modal_heder" style="width:100%"><h4 class="card-title text-white font-weight-bold">Заказ о продаже</h4><button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-times" aria-hidden="true"></span></button></div></div><div class="modal-body"><h4 class="modal-title" id="myModalLabel">Предложение по закупке брикетов</h4><form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" action="/briquette_production" method="post" novalidate><input type="hidden" name="from" value="contacts"><div class="modal-body modal_header_text"><div class="form-wrap"><input class="form-input form-control-has-validation" id="contact-org" name="org" data-constraints="@Required"><span class="form-validation"></span> <label class="form-label rd-input-label" for="contact-org">Название организации</label></div><div class="form-wrap"><input class="form-input form-control-has-validation" id="contact-name" name="name" data-constraints="@Required"><span class="form-validation"></span> <label class="form-label rd-input-label" for="contact-name">Ваше имя</label></div><div class="form-wrap"><input class="form-input form-control-has-validation" id="contact-phone" name="phone" data-constraints="@PhoneNumber"><span class="form-validation"></span> <label class="form-label rd-input-label" for="contact-phone">Телефон</label></div><div class="form-wrap"><input class="form-input form-control-has-validation" id="contact-email" type="email" name="email" data-constraints="@Email @Required"><span class="form-validation"></span> <label class="form-label rd-input-label" for="contact-email">E-mail</label></div><div class="form-wrap"><label class="form-label rd-input-label" for="contact-message">Ваше предложение:</label> <textarea class="form-input form-control-has-validation form-control-last-child" id="contact-message" name="message" data-constraints="@Required"></textarea><span class="form-validation"></span></div></div><div class="modal-footer"><button type="button" class="btn btn-secondary btn_modal btn_left" data-dismiss="modal">Отмена</button> <button type="submit" class="btn btn-prim btn_modal btn_right">Отправить сообщение</button></div></form></div></div></div></div>
<?

$post = (!empty($_POST)) ? true : false;

if ($post) {
  $to  = 'west160321@gmail.com' . ', ';
  $to .= 'feedback@s-k56.ru' . ', ';
  $to .= 'stal-kom@inbox.ru' . ', ';
  $to .= 'denisdstu@gmail.com' . ', ';
  $to .= 'O.Scherbina@s-k56.ru' . ', ';
  $to .= 'J.Kujbanov@s-k56.ru' . ', ';
  $to .= 'ru249074@gmail.com';
  $email = trim($_POST['email']);
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);
  $tel = htmlspecialchars($_POST["phone"]);
  $org = htmlspecialchars($_POST["org"]);
  $error = '';

  if (!$name) {
    $error .= 'Пожалуйста введите ваше имя<br />';
  }

  // Проверка телефона
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

    // (length)
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

    $name_tema = "=?utf-8?b?" . base64_encode($name) . "?=";

    $subject = "Брикетирование стружки || s-k56.ru";
    $subject1 = "=?utf-8?b?" . base64_encode($subject) . "?=";

    $message1 = "\n\nПредложение || Брикетирование стружки || от " . $name . " - организация: " . $org . "\n\nВходящее сообщение: " . $message . "\n\nНомер телефона: " . $tel . "\n\nE-mail отправителя: " . $email . "\n\nIP адрес отправителя: " . $ip_adress_user . "\nIP адрес от провайдера: " . $ip_adress_server;

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "Content-type: text/html; charset=utf-8 \r\n";

    $header .= "From: s-k56.ru Брикеты <system@bot.com>\n\n";
    $mail = mail($to, $subject1, iconv('utf-8', 'utf-8', $message1), iconv('utf-8', 'utf-8', $header));

    // Добавим почту в БД 
    $check_for_subscription = mysqli_query($sqli, "SELECT * FROM `subscribers_mail` WHERE `mail` = '" . $email . "'");
    if (mysqli_num_rows($check_for_subscription) < 1) {
      $report_generation = "INSERT INTO `subscribers_mail`(`mail`, `time`, `status`)VALUES('" . $_POST['email'] . "', '" . $system_time . "', 'wrote')";
      mysqli_query($sqli, $report_generation); #Вносим в БД
    }
    // Отправка сообщения в наш телеграмм бот
    if ($curl = curl_init()) {
      $data = array(
        'msg' => "Категория: Брикетирование стружки;\nСообщение: " . $message,
        'title' => "ЗАПРОС ОТ КЛИЕНТА",
        'contacts' => "Номер клиента: " . $tel . "\nE-mail: " . $email
      );
      curl_setopt($curl, CURLOPT_URL, 'https://api.s-k56.ru/Send-message-to-employees');
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      $out = curl_exec($curl);
    }
    // Отправка лида в битрикс
    file_get_contents("https://oplot.bitrix24.ru/rest/28/ohgkus1ubs36i49q/crm.lead.add.json?FIELDS[TITLE]=Заявка: Брикетирование стружки&FIELDS[NAME]=" . $name . "&FIELDS[PHONE][0][VALUE]=" . $tel . "&FIELDS[PHONE][0][VALUE_TYPE]=WORK&FIELDS[EMAIL][0][VALUE]=" . $email . "&FIELDS[EMAIL][0][VALUE_TYPE]=WORK&FIELDS[COMMENTS]=(Организация: " . $org . "). Сообщение: " . $message . "&FIELDS[SOURCE_ID]=WEB&FIELDS[SOURCE_DESCRIPTION]=s-k56.ru/feedback&FIELDS[ASSIGNED_BY_ID]=28");


    if ($mail) {
      echo 'OK';
    }
  } else {
    echo '<div class="notification_error">' . $error . '</div>';
  }
}
?>

<?
include '../../page_elements/foot.php';
?>