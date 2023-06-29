<?
/*##################################################################################################
# Описание действия скрипта: выводит нижнюю часть сайта.                                           #
##################################################################################################*/
?>
<script>
  function GoToPage(e) {
    window.location.href = e
  }
  document.addEventListener("DOMContentLoaded", function() {
    function e() {
      n && clearTimeout(n), n = setTimeout(function() {
        var n = window.pageYOffset;
        t.forEach(function(e) {
          e.offsetTop < window.innerHeight + n && (e.src = e.dataset.src, e.classList.remove("lazy"))
        }), 0 == t.length && (document.removeEventListener("scroll", e), window.removeEventListener("resize", e), window.removeEventListener("orientationChange", e))
      }, 20)
    }
    var n, t = document.querySelectorAll("img.lazy");
    document.addEventListener("scroll", e), window.addEventListener("resize", e), window.addEventListener("orientationChange", e)
  });
</script>

<?
if ($my_data['user_level'] < 1) {
  echo '
<!-- Приглашение к авторизации -->
    <div class="modal fade" id="registration_invitation" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-lg" role="document" style="padding-top:40px;max-width:555px"><div class="modal-content" style="background:0 0"><div class="popup-subscribes-land" id="popup-subscribes"><span class="popup-subscribes-circle"></span><div class="popup__align-in"><span class="d-none d-lg-block d-sm-block popup-subscribes-land__heading text-center" style="font-size:20px"><span class="popup-subscribes-text-stroke">Регистрация!</span><br>Быстрый и удобный доступ к материалам<span class="popup__color-blue">:</span> </span><span class="d-sm-none d-lg-none popup-subscribes-land__heading text-center" style="font-size:25px"><span class="popup-subscribes-text-stroke" style="font-size:35px">Регистрация!</span><br>Быстрый и удобный доступ к материалам<span class="popup__color-blue">:</span></span><form class="kt-form" action="#" onsubmit="return send_mail_on_avtorization_qwert()"><div class="input-group has-error"><input type="email" id="signinform-email_reg2" class="form-control form-control-has-validation" style="height:42px" name="email_2" placeholder="Email" data-constraints="@Required"><span class="form-validation">Это поле обязательно к заполнению.</span> <span class="form-validation">Это поле обязательно к заполнению.</span></div><button type="submit" class="popup-subscribes-land__link mt-3 mb-3" style="max-width:70%!important">Зарегистрироваться сейчас</button></form><script>function send_mail_on_avtorization_qwert(){
                  if ($(\'#signinform-email_reg2\').val() == \'\') {
                    return false;
                  } else {
                    let emailReg = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
                    if (!emailReg.test($(\'#signinform-email_reg2\').val())) {
                      alert("Укажите почтовый адрес правильно");
                      return false;
                    }
                  }
                  window.location.href = "/authorization?email="+$(\'#signinform-email_reg2\').val();
                  return false;
                }</script><p class="popup-subscribes-land__text"><b class="text-white">На сайте откроется весь скрытый материал:</b> актуальные цены, подробные характеристики. Появится возможность смотреть отчёты о работе запущенных комплексах в реальном времени. Вы сможете пообщаться со специалистом нашей компании в online переписке.</p></div><button data-fancybox-close="" class="fancybox-button fancybox-button--close" title="Закрыть" data-dismiss="modal" aria-hidden="true"><svg class="icon-close" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.06066 9.18198L2.12132 14.1213L0 12L4.93934 7.06066L2.38419e-07 2.12132L2.12132 0L7.06066 4.93934L12 0L14.1213 2.12132L9.18198 7.06066L14.1213 12L12 14.1213L7.06066 9.18198Z" fill="#F58080"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M7.06066 9.18198L2.12132 14.1213L0 12L4.93934 7.06066L2.38419e-07 2.12132L2.12132 0L7.06066 4.93934L12 0L14.1213 2.12132L9.18198 7.06066L14.1213 12L12 14.1213L7.06066 9.18198Z" fill="#B5B5B5"></path></svg></button></div></div></div></div>
  ';
}

if ($cookie_policy_notification && $system_user_url_open_without_get != '/') {
  echo '
<div class="header__cookies" id="notification_cookies" style="transform: matrix(1, 0, 0, 1, 0, 0);">
  <p class="header__cookies-text">
    Используя s-k56.ru вы соглашаетесь с политикой cookie </p>
  <button class="header__cookies-btn" style="background: none;" id="agreementCookieButton()" onclick="close_notification_cookies()">
    Ок </button>
</div>
<script>
 function close_notification_cookies(){
    $(\'#notification_cookies\').remove();
    // document.cookie = "accepted-the-cookie-policy=true";
    $.cookie("accepted-the-cookie-policy", "true", { expires: 7, path: "s-k56.ru", });
 }
</script>
';
}
?>
<footer class="section footer-classic">
  <div class="footer-classic__main bg-black-1">
    <div class="container">
      <div class="row row-50 align-items-sm-end justify-content-sm-center justify-content-lg-start">
        <div class="col-lg-4 padding_in_foot_contact">
          <div class="footer-classic__custom-column d-xl-inline-flex">
            <div class="d-xl-inline-flex justify-content-center justify-content-lg-start">
              <div class="unit__body text-center"><a class="link link-lg" href="tel:+73532437702">
                  <h5 class="animated infinite foot_namber pulse">+7 (3532) 43-77-02</h5>
                </a>
                <p>Контактный телефон</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3"></div>
        <div class="col-md-10 col-lg-5">
          <div class="rd-mailform form_inline form_lg">
            <div class="form-wrap"><input class="form-input" id="subscribe-form-footer-form-email" type="email" name="email" data-constraints="@Email @Required"> <label class="form-label" for="subscribe-form-footer-form-email">Your E-mail</label></div>
            <div class="d-none d-lg-block d-sm-block form-button"><button class="button button-primary" style="width:130px;padding:0" onclick="subscribe_mail()">Подписаться</button></div>
            <div class="d-sm-none d-lg-none form-button" style="width:100%"><button class="button button-primary" style="width:100%" type="submit">Акции, скидки, события</button></div>
          </div>
          <h5 class="d-none d-lg-block d-sm-block text-center foot_signature">Акции, скидки, события</h5>
        </div>
        <script>
          function validateEmail(o) {
            return /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/.test((o + "").toLowerCase())
          }

          function subscribe_mail() {
            validateEmail($("#subscribe-form-footer-form-email").val()) ? $.ajax({
              type: "POST",
              url: "system_files/subscribe.php",
              dataType: "text",
              data: {
                email: $("#subscribe-form-footer-form-email").val()
              },
              success: function(o) {
                "success" == o ? ($("#subscribe-form-footer-form-email").css("background-color", "green"), setTimeout(() => {
                  $("#subscribe-form-footer-form-email").css("background-color", "white"), $("#subscribe-form-footer-form-email").val("")
                }, 1500)) : ($("#subscribe-form-footer-form-email").css("background-color", "red"), setTimeout(() => {
                  $("#subscribe-form-footer-form-email").css("background-color", "white")
                }, 1500))
              }
            }) : ($("#subscribe-form-footer-form-email").css("background-color", "red"), setTimeout(() => {
              $("#subscribe-form-footer-form-email").css("background-color", "white")
            }, 1500))
          }
        </script>
      </div>
      <div class="row row-50 justify-content-md-center justify-content-lg-start justify-content-xl-between">
        <div class="col-md-5 col-lg-3">
          <p class="custom-heading-1 custom-heading-bordered">О компании</p>
          <div class="divider"></div>
          <p class="ls-05">Наша компания с 2015 года успешно занимается разработкой промышленных продуктов и автоматизацией производства.</p>
          <section class="mt-3">
            <h3 class="font-weight-bold h6 text-white mb-4">Мы в соц-сетях: <a href="https://www.facebook.com/people/Aleksandr-WestRebate/100005910670482" class="mx-1 pl-2 icon_footer" role="button"><i class="fab fa-facebook-f"></i></a> <a href="https://www.instagram.com/steelcom.ru/" class="mx-1 icon_footer" role="button"><i class="fab fa-instagram"></i></a> <a href="https://www.youtube.com/channel/UCykW-U-9km5hjECYW7qOO-w" class="mx-1 icon_footer" role="button"><i class="fab fa-youtube"></i></a></h3>
            <a href="https://webmaster.yandex.ru/siteinfo/?site=https://s-k56.ru"><img width="88" height="31" alt="ИКС сайта" src="https://yandex.ru/cycounter?https://s-k56.ru&theme=dark&lang=ru"></a>
            <a href="https://www.fasie.ru/" target="_blank">
              <img class="pr-4 pl-3" src="/images/system/icon/FASIEru.png" alt="FASIEru" style="height: 40px;">
            </a>
          </section>
        </div>
        <div class="col-md-5 col-lg-4 col-xl-2" style="min-width:220px">
          <p class="custom-heading-1 custom-heading-bordered">Контакты</p>
          <div class="divider"></div>
          <p class="ls-05">460026. г. Оренбург,<br>Промышленная, 5/1<br><br>462431. г. Орск,<br>ул. Дорожная, 13</p>
        </div>
        <div class="col-md-10 col-lg-5 col-xl-5">
          <p class="custom-heading-1 custom-heading-bordered">Ссылки</p>
          <div class="divider"></div>
          <div class="row row-5">
            <div class="col-sm-6 pr-0">
              <ul class="list-marked list-marked_primary">
                <li><a href="/vakansii">Работа у нас</a></li>
                <li><a href="/zakupki">Наши закупки</a></li>
                <li><a href="/practice-for-students">Практика для студентов</a></li>
                <li><a href="/robotics">Направления деятельности</a></li>
                <li><a href="https://wp.s-k56.ru" target="_blank">Сервис для сотрудников</a></li>
                <li><a href="/documents">Документы</a></li>
              </ul>
            </div>
            <div class="col-sm-6">
              <ul class="list-marked list-marked_primary">
                <li><a href="/turning_works">Металлообработка</a></li>
                <li><a href="/plazmennaya-rezka">Плазменная резка</a></li>
                <li><a href="/briquette_production">Производство и реализация брикетов 6А</a></li>
                <li><a href="/hammer_shredders">Молотковые дробилки</a></li>
                <li><a href="/explosive_machines">Разрывные машины</a></li>
                <li><a href="/sk-sdk-plants">Комплексы для дробления</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-default__aside bg-gray-5">
    <div class="container">
      <div class="footer-default__aside-inner">
        <ul class="list-separated list-inline">
          <li><span>©&nbsp;</span><span class="copyright-year">2021</span><span>&nbsp;</span><span>LLC «SteelCom». Все права защищены</span></li>
        </ul>
        <ul class="list-separated list-inline">
          <li class="pr-4"><a href="/policy">Политика конфиденциальности</a></li>
          <li class="pl-3 pr-4"><a href="https://vk.com/denis.maker">Страница разработчика</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

</div>
<div class="snackbars" id="form-output-global"></div>

<script src="/system_files/script.js"></script>
<script>
  new WOW().init();
</script>

<!-- Yandex.Metrika counter -->
<script>
  ! function(e, t, a, n, c, m, r) {
    e.ym = e.ym || function() {
      (e.ym.a = e.ym.a || []).push(arguments)
    }, e.ym.l = 1 * new Date, m = t.createElement(a), r = t.getElementsByTagName(a)[0], m.async = 1, m.src = "https://mc.yandex.ru/metrika/tag.js", r.parentNode.insertBefore(m, r)
  }(window, document, "script"), ym(55471909, "init", {
    clickmap: !0,
    trackLinks: !0,
    accurateTrackBounce: !0,
    webvisor: !0
  });
</script>
<noscript>
  <div><img src="https://mc.yandex.ru/watch/55471909" style="position:absolute; left:-9999px;" alt="Метрика" /></div>
</noscript>
<!-- /Yandex.Metrika counter -->
<!--Увеличение картинки-->
<script>
  $(function() {
    $(".minimized").click(function(i) {
      var o = $(this).attr("src");
      $("body").append('<div id="overlay"></div><div id="magnify"><img src="' + o + '"><div id="close-popup"><i></i></div></div>'), $("#magnify").css({
        left: ($(document).width() - $("#magnify").outerWidth()) / 2,
        top: ($(window).height() - $("#magnify").outerHeight()) / 2
      }), $("#overlay, #magnify").fadeIn("fast")
    }), $("body").on("click", "#close-popup, #overlay", function(i) {
      i.preventDefault(), $("#overlay, #magnify").fadeOut("fast", function() {
        $("#close-popup, #magnify, #overlay").remove()
      })
    })
  });
</script>
</body>

</html>