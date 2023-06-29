<?
// Проверяем, кто смотрит страницу. Пользователь, или бот. Если пользователь, будем запоминать, какие страницы он смотрит
if ($system_user_url_open_without_get != '/' && $system_user_url_open_without_get != '/about' && $system_user_url_open_without_get != '/feedback' && $system_user_url_open_without_get != '/documents' && $system_user_url_open_without_get != '/vakansii' && $system_user_url_open_without_get != '/our-partners' && $system_user_url_open_without_get != '/zakupki' && $system_user_url_open_without_get != '/practice-for-students' && $system_user_url_open_without_get != '/robotics') {
  #Если авторизирован, пишем время последнее
  if ($my_data['user_level'] > 0) {
    $sqli->query("UPDATE `user` SET `time_online`='" . $system_time . "' WHERE `id` = '" . $my_data['id'] . "' "); #Пишем время последнее на сайте
    if (strpos($system_user_url_open_without_get, '.jpg') !== false || strpos($system_user_url_open_without_get, '.jepg') !== false || strpos($system_user_url_open_without_get, '.gif') !== false || strpos($system_user_url_open_without_get, '.png') !== false || strpos($system_user_url_open_without_get, '.pdf') !== false || strpos($system_user_url_open_without_get, '/send-email-success') !== false) {
      // в url картинка, не записываем url в бд
    } else {
      if (stristr($system_user_url_open_without_get, 'system_files') === FALSE && stristr($system_user_url_open_without_get, '.php') === FALSE) {
        $sqli->query("INSERT INTO `movement_history`(`id_user`, `identificator`, `url`, `time`)VALUES('" . $my_data['id'] . "', '', '" . $system_user_url_open_without_get . "', '" . $system_time . "')");
      }
    }
  } else {
    if (!isBot()) {
      if ($_COOKIE['accepted-the-cookie-policy'] == null) {
        $cookie_policy_notification = true;
      }
      if (!isset($_COOKIE['identificator'])) {
        if (strpos($system_user_url_open_without_get, '.jpg') !== false || strpos($system_user_url_open_without_get, '.jepg') !== false || strpos($system_user_url_open_without_get, '.gif') !== false || strpos($system_user_url_open_without_get, '.png') !== false || strpos($system_user_url_open_without_get, '.pdf') !== false || strpos($system_user_url_open_without_get, '/send-email-success') !== false) {
          // в url картинка, не записываем url в бд
        } else {
          if (stristr($system_user_url_open_without_get, 'system_files') === FALSE && stristr($system_user_url_open_without_get, '.php') === FALSE) {
            $new_identificator =  gen_token();
            SetCookie('identificator', $new_identificator, time() + 3600 * 24 * 365, '/', $system_url);
            $sqli->query("INSERT INTO `movement_history`(`id_user`, `identificator`, `url`, `time`)VALUES(0, '" . $new_identificator . "', '" . $system_user_url_open_without_get . "', '" . $system_time . "')");
          }
        }
      } else {
        if (strpos($system_user_url_open_without_get, '.jpg') !== false || strpos($system_user_url_open_without_get, '.jepg') !== false || strpos($system_user_url_open_without_get, '.gif') !== false || strpos($system_user_url_open_without_get, '.png') !== false || strpos($system_user_url_open_without_get, '.pdf') !== false || strpos($system_user_url_open_without_get, '/send-email-success') !== false) {
          // в url картинка, не записываем url в бд
        } else {
          if (stristr($system_user_url_open_without_get, 'system_files') === FALSE && stristr($system_user_url_open_without_get, '.php') === FALSE) {
            $sqli->query("INSERT INTO `movement_history`(`id_user`, `identificator`, `url`, `time`)VALUES(0, '" . $_COOKIE['identificator'] . "', '" . $system_user_url_open_without_get . "', '" . $system_time . "')");
          }
        }
      }
    }
  }
}
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="keywords" content="<? echo $page_keywords;
                                  echo ', ';
                                  echo $settings['keywords_plus'] ?>">
  <meta name="description" content="<? echo $page_description; ?>">
  <title><? echo $page_title . ' | ООО «Стальная компания»'; ?></title>
  <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="robots" content="<? echo $page_robots; ?>">
  <meta name="yandex-verification" content="c3828151df58aaab">
  <link rel="manifest" href="/system_files/manifest.json">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/style/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/style/style.css">
  <link rel="stylesheet" href="/style/main.css">
  <link rel="stylesheet" type="text/css" href="/style/fonts.css">
  <script src="/system_files/core.min.js"></script> <?
                                                    if ($system_user_url_open_without_get == '/authorization') {
                                                      echo '
    <!--АВТОРИЗАЦИЯ ВК-->
    <script src="https://vk.com/js/api/openapi.js?168"></script>';
                                                    }
                                                    ?>
</head>

<body>
  <div id="page-loader">
    <div class="page-loader-body"><img src="/images/system/ck_logo.png" alt="логотип компании" width="200" height="92">
      <div class="cssload-wrapper">
        <div class="cssload-border">
          <div class="cssload-whitespace">
            <div class="cssload-line"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page">
    <header class="section page-header heder_color">
      <div class="rd-navbar-wrap" style="height:104px">
        <nav class="rd-navbar rd-navbar-classic rd-navbar-original rd-navbar-static heder_color" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-stick-up-clone="false" data-md-stick-up-offset="74px" data-lg-stick-up-offset="66px" data-md-stick-up="true" data-lg-stick-up="true" style="border:0">
          <div class="rd-navbar-outer heder_color">
            <div class="rd-navbar-inner heder_color" style="box-sizing:content-box">
              <div class="rd-navbar-panel heder_color" style="border:0"><button class="rd-navbar-toggle toggle-original heder_color" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <div class="rd-navbar-brand heder_color"><a class="brand" href="../">
                    <div class="brand__name heder_color" id="stage"><img class="brand__logo-dark spinner" src="<? if ($long_file_paths == false) {
                                                                                                                  echo '../images/system/ck_logo.png';
                                                                                                                } else {
                                                                                                                  echo '../../images/system/ck_logo.png';
                                                                                                                } ?>" alt="логотип компании"></div>
                  </a></div>
                <div style="width:300px"></div>
                <div class="d-none d-lg-block">
                  <div class="rd-navbar-aside" style="position:absolute;top:0;width:310px">
                    <div class="d-flex align-items-center justify-content-between text-center m-0" style="height:185px;width:310px"><img class="banner-with-logo" src="<? if ($long_file_paths == false) {
                                                                                                                                                                          echo '../images/system/preview-logo.png';
                                                                                                                                                                        } else {
                                                                                                                                                                          echo '../../images/system/preview-logo.png';
                                                                                                                                                                        } ?>" alt="Логотип компании"> <img class="brand__logo-dark spinner" style="z-index:99;height:68px;margin-top:-30px" src="<? if ($long_file_paths == false) {
                                                                                                                                                                                                                                                                                                    echo '../images/system/ck_logo.png';
                                                                                                                                                                                                                                                                                                  } else {
                                                                                                                                                                                                                                                                                                    echo '../../images/system/ck_logo.png';
                                                                                                                                                                                                                                                                                                  } ?>" alt="Логотип компании"></div>
                  </div>
                </div>
              </div>
              <div class="rd-navbar-body heder_color">
                <div class="rd-navbar-aside heder_color">
                  <div class="rd-navbar-content-outer heder_color">
                    <div class="rd-navbar-content__toggle rd-navbar-static--hidden toggle-original" data-rd-navbar-toggle=".rd-navbar-content"><span></span></div>
                    <div class="rd-navbar-content toggle-original-elements heder_color" style="border:0">
                      <ul class="list-bordered list-inline heder_color">
                        <li style="width:190px">
                          <div class="d-none d-lg-block" style="position:absolute">
                            <dl class="list-terms-inline" style="margin-top:-28px">
                              <dt>&#x260F;</dt>
                              <dd><a href="tel:+73532437702">+7 (3532) 43-77-02</a></dd>
                            </dl>
                            <dl class="list-terms-inline">
                              <dt>&#x2709;</dt>
                              <dd><a href="mailto:stal-kom@inbox.ru"><span class="__cf_email__" data-cfemail="">stal-kom@inbox.ru</span></a></dd>
                            </dl>
                          </div>
                        </li>
                        <li class="d-lg-none">
                          <dl class="list-terms-inline">
                            <dt>&#x260F;</dt>
                            <dd><a href="tel:+73532437702">+7 (3532) 43-77-02</a></dd>
                          </dl>
                        </li>
                        <li class="d-lg-none">
                          <dl class="list-terms-inline">
                            <dt>&#x2709;</dt>
                            <dd><a href="mailto:stal-kom@inbox.ru"><span class="__cf_email__" data-cfemail="">stal-kom@inbox.ru</span></a></dd>
                          </dl>
                        </li>
                        <li style="padding:6px;width:153px">
                          <div class="d-none d-lg-block text-center" style="position:absolute;top:-16px;cursor:pointer" onclick='GoToPage("/documents")'><a href="#" onclick="return!1" class="header-href-color font-weight-bold" id="certificates_and_licenses_1">Сертификаты<br>и лицензии</a></div>
                        </li>
                        <li class="d-lg-none text-center"><a href="/documents" class="header-href-color font-weight-bold" id="certificates_and_licenses_2">Сертификаты и лицензии</a></li>
                        <li class="text-center" style="padding:6px">
                          <div class="list-terms-inline" style="cursor:pointer"><a href="https://www.fasie.ru/" target="_blank"><img class="pr-4 pl-3" src="/images/system/icon/FASIEru.png" alt="FASIEru" style="height:40px"></a></div>
                        </li>
                        <li class="text-center" style="padding:6px">
                          <div class="list-terms-inline">
                            <div class="container">
                              <div class="row"> <?
                                                if ($my_data['user_level'] < 1) {
                                                  echo '
                                    <div class="col-12 text-center" style="padding: 0px;" onclick="site_setup()">
                                      <a class="header-href-color" href="/authorization" style="width: 98px; padding: .5rem 1rem;">
                                      	Войти <i class="fa fa-sign-in" aria-hidden="true"></i>
                                        </a>
                                    </div>';
                                                } else {
                                                  echo '<div class="col-12 text-center" style="padding: 0px;">';
                                                  if ($system_user_url_open_without_get != '/cabinet') {
                                                    echo '<a class="header-href-color" href="/cabinet" style="width: 98px; padding: .5rem 1rem;">';
                                                    if ($my_data['user_level'] > 2) {
                                                      echo 'Админка';
                                                    } else {
                                                      echo 'Профиль';
                                                    }
                                                    echo '</a>';
                                                  } else {
                                                    echo '<a class="header-href-color" href="/exit" style="width: 98px; padding: .5rem 1rem;">Выход</a>';
                                                  }
                                                  echo '</div>';
                                                }
                                                ?> </div>
                            </div>
                          </div>
                        </li>
                        <li class="text-center p-0 pr-1">
                          <div class="list-terms-inline">
                            <div class="container">
                              <div class="row">
                                <div class="col-4" style="padding:0">
                                  <p class="text_color_heder"><a href="#" onclick="return!1" class="nav-link text-light" data-google-lang="ru" class="text_color_heder">RU</a></p>
                                </div>
                                <div class="col-4" style="padding:0">
                                  <p class="text_color_heder"><a href="#" onclick="return!1" class="nav-link text-light" data-google-lang="en">EN</a></p>
                                </div>
                                <div class="col-4" style="padding:0">
                                  <p class="text_color_heder"><a href="#" onclick="return!1" class="nav-link text-light" data-google-lang="zh-CN">CH</a></p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <script>
                            function TranslateInit() {
                              let o = TranslateGetCode();
                              $('[data-google-lang="' + o + '"]').addClass("language__img_active"), o == googleTranslateConfig.lang && TranslateClearCookie(), new google.translate.TranslateElement({
                                pageLanguage: googleTranslateConfig.lang
                              }), $("[data-google-lang]").click(function() {
                                TranslateSetCookie($(this).attr("data-google-lang")), window.location.reload()
                              })
                            }

                            function TranslateGetCode() {
                              return (void 0 != $.cookie("googtrans") && "null" != $.cookie("googtrans") ? $.cookie("googtrans") : googleTranslateConfig.lang).substr(-2)
                            }

                            function TranslateClearCookie() {
                              $.cookie("googtrans", null), $.cookie("googtrans", null, {
                                domain: "." + document.domain
                              })
                            }

                            function TranslateSetCookie(o) {
                              $.cookie("googtrans", "/auto/" + o), $.cookie("googtrans", "/auto/" + o, {
                                domain: "." + document.domain
                              })
                            }
                            const googleTranslateConfig = {
                              lang: "ru"
                            };
                          </script>
                          <script src="//translate.google.com/translate_a/element.js?cb=TranslateInit"></script>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="rd-navbar-nav-wrap toggle-original-elements heder_color" style="border-color:#e8453d">
                  <div class="rd-navbar-element">
                    <div class="rd-navbar-search rd-navbar-search-toggled"></div>
                  </div>
                  <ul class="rd-navbar-nav">
                    <li><a href="../" id="menu_item_home">Главная</a></li>
                    <li class="rd-navbar--has-dropdown rd-navbar-submenu" onclick='open_list_heder("uslugi")'><a href="#" onclick="return!1" id="menu_item_SERVICES">Услуги</a>
                      <ul class="rd-navbar-dropdown heder_color">
                        <li><a href="/turning_works" id="menu_item_turning-works">Металлообработка</a></li>
                        <li><a href="/plazmennaya-rezka" id="menu_item_plazmennaya-rezka">Плазменная резка</a></li>
                        <li><a href="/lasernaya-rezka" id="menu_item_lasernaya-rezka">Лазерная резка</a></li>
                      </ul>
                    </li>
                    <li class="rd-navbar--has-dropdown rd-navbar-submenu" onclick='open_list_heder("proizvodstvo")'><a href="#" onclick="return!1" id="menu_item_PRODUCTION">Продукция</a>
                      <ul class="rd-navbar-dropdown heder_color">
                        <li><a href="/drobilnoe-oborudovanie" id="menu_item_struzhkodrobilki">Дробильное оборудование</a></li>
                        <li><a href="/briquetting-press" id="menu_item_briquetting-press">Брикетировочные пресса</a></li>
                        <li><a href="/tokarniye_stanki" id="menu_item_tokarniye_stanki">Токарные станки</a><li>
                        <li><a href="/drugoe_oborudovanie" id="menu_item_drugoe_oborudovanie">Оборудование в наличии</a><li>
                        <li><a href="/briquetting-lines" id="menu_item_briquetting-lines">Брикетировочные линии</a></li>
                        <li><a href="https://steelcom-jdh.ru/" target="_blank">Наш интернет-магазин</a></li>
                        <li><a href="/pumps" id="menu_item_pumps">Гидравлические насосы</a></li>
                        <li><a href="/bearing-housing" id="menu_item_bearing-housing">промышленные корпуса подшипников</a></li>
                        <li><a href="/briquette_production" id="menu_item_briquette-production_production">Производство и реализация брикетов «6А»</a></li>
                        <li class="text-center" style="background-color:#077b54;border-radius:10px;width:300px;height:400px;position:absolute;top:3px;left:272px;border:solid #fff 5px;padding:10px">
                          <h4 class="text-center" style="margin-bottom:5px!important"><b>В наличии</b></h4><img src="images/system/komplexCeh.jpg" alt="Комплекс" style="width:100%;border-radius:10px;margin-top:12px">
                          <p style="color:#000;font-size:18px"><b>Дробильный комплекс<br>СК-СДК-2-7</b></p><a type="button" class="btn btn-lg" style="background-color: #204a43; color:aliceblue;" href="/nalichie">Купить</a>
                        </li>
                      </ul>
                    </li>
                    <li class="rd-navbar--has-dropdown rd-navbar-submenu" onclick='open_list_heder("about")'><a href="#" onclick="return!1" id="menu_item_ABOUT_COMPANY">О компании</a>
                      <ul class="rd-navbar-dropdown heder_color">
                        <li><a href="/feedback" id="menu_item_feedback">Контакты</a></li>
                        <li><a href="/about" id="menu_item_about">ООО «Стальная компания»</a></li>
                        <li><a href="/documents" id="menu_item_documents">Документы</a></li>
                        <li><a href="/our-partners" id="menu_item_our-partners">Партнеры</a></li>
                        <li><a href="/vakansii" id="menu_item_vakansii">Вакансии</a></li>
                      </ul>
                    </li>
                    <li class="rd-navbar--has-dropdown"><a href="/struzhka" id="menu_item_struzhka">Закупаем стружку</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <script>
      function open_list_heder(e) {
        return "uslugi" == e ? $("body > div.page.animated > header > div > nav > div > div > div.rd-navbar-body.heder_color > div.rd-navbar-nav-wrap.toggle-original-elements.heder_color.active > ul > li:nth-child(2)").hasClass("opened") ? $("body > div.page.animated > header > div > nav > div > div > div.rd-navbar-body.heder_color > div.rd-navbar-nav-wrap.toggle-original-elements.heder_color.active > ul > li:nth-child(2)").removeClass("opened") : $("body > div.page.animated > header > div > nav > div > div > div.rd-navbar-body.heder_color > div.rd-navbar-nav-wrap.toggle-original-elements.heder_color.active > ul > li:nth-child(2)").addClass("opened") : "proizvodstvo" == e ? $("body > div.page.animated > header > div > nav > div > div > div.rd-navbar-body.heder_color > div.rd-navbar-nav-wrap.toggle-original-elements.heder_color.active > ul > li:nth-child(3)").hasClass("opened") ? $("body > div.page.animated > header > div > nav > div > div > div.rd-navbar-body.heder_color > div.rd-navbar-nav-wrap.toggle-original-elements.heder_color.active > ul > li:nth-child(3)").removeClass("opened") : $("body > div.page.animated > header > div > nav > div > div > div.rd-navbar-body.heder_color > div.rd-navbar-nav-wrap.toggle-original-elements.heder_color.active > ul > li:nth-child(3)").addClass("opened") : "about" == e ? $("body > div.page.animated > header > div > nav > div > div > div.rd-navbar-body.heder_color > div.rd-navbar-nav-wrap.toggle-original-elements.heder_color.active > ul > li:nth-child(4)").hasClass("opened") ? $("body > div.page.animated > header > div > nav > div > div > div.rd-navbar-body.heder_color > div.rd-navbar-nav-wrap.toggle-original-elements.heder_color.active > ul > li:nth-child(4)").removeClass("opened") : $("body > div.page.animated > header > div > nav > div > div > div.rd-navbar-body.heder_color > div.rd-navbar-nav-wrap.toggle-original-elements.heder_color.active > ul > li:nth-child(4)").addClass("opened") : void 0
      }
      var url_location = document.location.pathname;
      switch (url_location) {
        case "/":
          document.getElementById("menu_item_home").href = "#", $("#menu_item_home").attr("onClick", "return false;");
          break;
        case "/robotics":
          $("#menu_item_ABOUT_COMPANY").addClass("active_menu"), $("#menu_item_robotics").addClass("active_menu"), document.getElementById("menu_item_robotics").href = "#", $("#menu_item_robotics").attr("onClick", "return false;");
          break;
        case "/struzhka":
          $("#menu_item_struzhka").addClass("active_menu"), document.getElementById("menu_item_struzhka").href = "#", $("#menu_item_struzhka").attr("onClick", "return false;");
          break;
        case "/turning_works":
          $("#menu_item_SERVICES").addClass("active_menu"), $("#menu_item_turning-works").addClass("active_menu"), document.getElementById("menu_item_turning-works").href = "#", $("#menu_item_turning-works").attr("onClick", "return false;");
          break;
        case "/plazmennaya-rezka":
          $("#menu_item_SERVICES").addClass("active_menu"), $("#menu_item_plazmennaya-rezka").addClass("active_menu"), document.getElementById("menu_item_plazmennaya-rezka").href = "#", $("#menu_item_plazmennaya-rezka").attr("onClick", "return false;");
          break;
        case "/foundry":
          $("#menu_item_SERVICES").addClass("active_menu"), $("#menu_item_foundry").addClass("active_menu"), document.getElementById("menu_item_foundry").href = "#", $("#menu_item_foundry").attr("onClick", "return false;");
          break;
        case "/briquette_production":
          $("#menu_item_PRODUCTION").addClass("active_menu"), $("#menu_item_briquette-production_production").addClass("active_menu"), document.getElementById("menu_item_briquette-production_production").href = "#", $("#menu_item_briquette-production_production").attr("onClick", "return false;");
          break;
        case "/drobilnoe-oborudovanie":
          $("#menu_item_PRODUCTION").addClass("active_menu"), $("#menu_item_struzhkodrobilki").addClass("active_menu"), document.getElementById("menu_item_struzhkodrobilki").href = "#", $("#menu_item_struzhkodrobilki").attr("onClick", "return false;");
          break;
        case "/struzhkodrobilki":
        case "/hammer_shredders":
        case "/explosive_machines":
          $("#menu_item_PRODUCTION").addClass("active_menu"), $("#menu_item_struzhkodrobilki").addClass("active_menu");
          break;
        case "/briquetting-press":
          $("#menu_item_PRODUCTION").addClass("active_menu"), $("#menu_item_briquetting-press").addClass("active_menu"), document.getElementById("menu_item_briquetting-press").href = "#", $("#menu_item_briquetting-press").attr("onClick", "return false;");
          break;
        case "/briquetting-lines":
          $("#menu_item_PRODUCTION").addClass("active_menu"), $("#menu_item_briquetting-lines").addClass("active_menu"), document.getElementById("menu_item_briquetting-lines").href = "#", $("#menu_item_briquetting-lines").attr("onClick", "return false;");
          break;
        case "/pumps":
          $("#menu_item_PRODUCTION").addClass("active_menu"), $("#menu_item_pumps").addClass("active_menu"), document.getElementById("menu_item_pumps").href = "#", $("#menu_item_pumps").attr("onClick", "return false;");
          break;
        case "/bearing-housing":
          $("#menu_item_PRODUCTION").addClass("active_menu"), $("#menu_item_bearing-housing").addClass("active_menu"), document.getElementById("menu_item_bearing-housing").href = "#", $("#menu_item_bearing-housing").attr("onClick", "return false;");
          break;
        case "/about":
          $("#menu_item_ABOUT_COMPANY").addClass("active_menu"), $("#menu_item_about").addClass("active_menu"), document.getElementById("menu_item_about").href = "#", $("#menu_item_about").attr("onClick", "return false;");
          break;
        case "/our-partners":
          $("#menu_item_ABOUT_COMPANY").addClass("active_menu"), $("#menu_item_our-partners").addClass("active_menu"), document.getElementById("menu_item_our-partners").href = "#", $("#menu_item_our-partners").attr("onClick", "return false;");
          break;
        case "/feedback":
          $("#menu_item_ABOUT_COMPANY").addClass("active_menu"), $("#menu_item_feedback").addClass("active_menu"), document.getElementById("menu_item_feedback").href = "#", $("#menu_item_feedback").attr("onClick", "return false;");
          break;
        case "/vakansii":
          $("#menu_item_ABOUT_COMPANY").addClass("active_menu"), $("#menu_item_vakansii").addClass("active_menu"), document.getElementById("menu_item_vakansii").href = "#", $("#menu_item_vakansii").attr("onClick", "return false;");
          break;
        case "/zakupki":
          $("#menu_item_ABOUT_COMPANY").addClass("active_menu"), $("#menu_item_zakupki").addClass("active_menu"), document.getElementById("menu_item_zakupki").href = "#", $("#menu_item_zakupki").attr("onClick", "return false;");
          break;
        case "/practice-for-students":
          $("#menu_item_ABOUT_COMPANY").addClass("active_menu"), $("#menu_item_practice-for-students").addClass("active_menu"), document.getElementById("menu_item_practice-for-students").href = "#", $("#menu_item_practice-for-students").attr("onClick", "return false;");
          break;
        case "/documents":
          $("#menu_item_ABOUT_COMPANY").addClass("active_menu"), $("#menu_item_documents").addClass("active_menu"), $("#certificates_and_licenses_1").addClass("active_menu"), $("#certificates_and_licenses_2").addClass("active_menu"), document.getElementById("certificates_and_licenses_1").href = "#", $("#certificates_and_licenses_1").attr("onClick", "return false;"), document.getElementById("certificates_and_licenses_1").href = "#", $("#certificates_and_licenses_2").attr("onClick", "return false;"), document.getElementById("menu_item_documents").href = "#", $("#menu_item_documents").attr("onClick", "return false;")
      }
    </script>