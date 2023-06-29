<?
/*##################################################################################################
# Описание действия скрипта: 
##################################################################################################*/
$page_title = "Вакансии";
$page_keywords = "нет, ключевых, слов";
$page_description = "Ищем сотрудников в штат. Официальное трудоустройство, стабильная зарплата, достойное рабочее место.";
$page_robots = "index,follow";
include '../../system_files/settings.php';
include '../../system_files/core.php';
include '../../page_elements/head.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../system_files/phpmailer/Exception.php';
require '../../system_files/phpmailer/PHPMailer.php';
require '../../system_files/phpmailer/SMTP.php';

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
    $message = htmlspecialchars($_POST['message']);
    $tel = htmlspecialchars($_POST["phone"]);
    $org = htmlspecialchars($_POST["org"]);
    $error = '';

    $name_tema = "=?utf-8?b?" . base64_encode($name) . "?=";

    $message1 = "<html><body><h1>Заявка на трудоустройство</h1><h3>Имя человека: " . $name . "</h3><h4>\n\nНомер телефона: " . $tel . "</h4>";

    if ($_POST['title_vakans']) {
        $message1 .= "<h4>Отзыв на вакансию: " . $_POST['title_vakans'] . "</h4>";
    }

    $message1 .= "<p>Сообщение:\n" . $message . "</p><h4>IP адрес отправителя: " . $system_user_ip . "</h4></body></html>";

    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('system@bot.com', 'From Steelcom s-k56.ru:');
    $mail->addAddress('denisdstu@gmail.com', 'Denis Shcherbina');
    $mail->addAddress('west160321@gmail.com', 'Alexander Shcherbina');
    $mail->addAddress('feedback@s-k56.ru', ' ');
    $mail->addAddress('stal-kom@inbox.ru', ' ');
    $mail->addAddress('O.Scherbina@s-k56.ru', 'Oksana Shcherbina');
    $mail->addAddress('J.Kujbanov@s-k56.ru', 'Jalgaz');
    $mail->addAddress('ru249074@gmail.com', 'Rustam');
    $mail->addAddress('kadrovik@yr56.ru', 'Personnel Department');

    $mail->Subject = "Отклик на вакансию";
    $mail->msgHTML($message1);
    $file_to_attach = $_FILES['myfile']['tmp_name'];
    $filename = $_FILES['myfile']['name'];
    $mail->AddAttachment($file_to_attach, $filename);

    if ($mail->send()) {
        $report_generation = "INSERT INTO `operation`(`id_user`, `step`, `title`, `quantity`, `days`, `time`, `status`)VALUES(0, 1, 'Отправка почты', 'отправил', '', '" . $system_time . "', '')";
        mysqli_query($sqli, $report_generation); #Вносим в БД
    } else {
        // $mail->ErrorInfo;
        $report_generation = "INSERT INTO `operation`(`id_user`, `step`, `title`, `quantity`, `days`, `time`, `status`)VALUES(0, 1, 'Отправка почты', 'ошибка отправки', '', '" . $system_time . "', '')";
        mysqli_query($sqli, $report_generation); #Вносим в БД
    }


    if ($r) {
        echo 'OK';
    }
}


$local_url_to_the_image = '/../images/system/fon-all-page.jpg';
$headline_for_this_title_block = 'Карьера в Стальной компании';
include 'element/page-title-block.php';

?>


<section class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col-12 mb-5">
            <h4 class="osnova_text text-center"><b>Запишитесь на собеседование по телефону или напишите нам</b></h4>
            <div class="row justify-content-md-center justify-content-lg-start">
                <div class="col-md-12 col-lg-12 text-center">
                    <a href="/database/files_other/Анкета_соискателя.doc" style="font-family: Gill Sans, Gill Sans MT, Calibri, sans-serif;position: absolute;font-size: 1.2em;text-transform: uppercase;padding: 7px 20px;left: 50%;width: 200px;margin-left: -100px;border-radius: 10px;color: white;text-shadow: -1px -1px 1px rgba(0,0,0,0.8);border: 5px solid transparent;border-bottom-color: rgba(0,0,0,0.35);background: #2879fe;cursor: pointer;outline: 0 !important;animation: pulse 2s infinite alternate;transition: background 0.4s, border 0.2s, margin 0.2s; display:inline-block">Скачать анкету</a>
                    <canvas id="myCanvas" width="20" height="30"></canvas>
                </div>
                <div class="box-chloe__main pt-4" style="max-width: none;">
                    <a href="#" data-toggle="modal" data-target="#myModal2">
                        <h3 class="box-chloe__text" style="font-family: Gill Sans, Gill Sans MT, Calibri, sans-serif;position: absolute;font-size: 1.2em;text-transform: uppercase;padding: 7px 20px;left: 50%;width: 200px;margin-left: -100px;border-radius: 10px;color: white;text-shadow: -1px -1px 1px rgba(0,0,0,0.8);border: 5px solid transparent;border-bottom-color: rgba(0,0,0,0.35);background: #2879fe;cursor: pointer;outline: 0 !important;animation: pulse 2s infinite alternate;transition: background 0.4s, border 0.2s, margin 0.2s; display:inline-block">Отправить резюме</h3>
                        <canvas id="myCanvas" width="20" height="30"></canvas>
                    </a>
                </div>
            </div>

            <div class="d-none d-lg-block d-sm-block b-order__phone pb-0">
                <h5>или позвоните <strong>+7 (3532) 43-77-02</strong></h5>
            </div>
            <div class="d-sm-none d-lg-none b-order__phone text-center">
                <h4>или позвоните <br><strong>+7 (3532) 43-77-02</strong></h4>
            </div>
        </div>

        <div class="col-md-12 col-lg-12 mb-5 text-center d-flex display_block_sm">
            <div class="align-center metal_btn_size" style="margin-left: 90px;">
                <div class="pt-2" style="max-width: none;">
                    <a href="/about">
                        <h3 style="font-family: Gill Sans, Gill Sans MT, Calibri, sans-serif;font-size: 1.2em;text-transform: uppercase;padding: 7px 20px;left: 50%;width: 200px; border-radius: 10px;color: white;text-shadow: -1px -1px 1px rgba(0,0,0,0.8);border: 5px solid transparent;border-bottom-color: rgba(0,0,0,0.35);background:#0043b1;cursor: pointer;outline: 0 !important">О компании</h3>
                    </a>
                </div>
            </div>
            <div class="align-center mt-sm-30 metal_btn_size" style="margin-left: 90px;">
                <div class="pt-2" style="max-width: none;">
                    <a href="/robotics">
                        <h3 style="margin-right:-150px; font-family: Gill Sans, Gill Sans MT, Calibri, sans-serif;font-size: 1.2em;text-transform: uppercase;padding: 7px 20px;left: 50%;width: 200px; border-radius: 10px;color: white;text-shadow: -1px -1px 1px rgba(0,0,0,0.8);border: 5px solid transparent;border-bottom-color: rgba(0,0,0,0.35);background:#0043b1;cursor: pointer;outline: 0 !important">О технологиях</h3>
                    </a>
                </div>
            </div>
            <div class="align-center mt-sm-30 metal_btn_size" style="margin-left: 90px;">
                <div class="pt-2" style="max-width: none;">
                    <a href="/our-partners">
                        <h3 style="font-family: Gill Sans, Gill Sans MT, Calibri, sans-serif;font-size: 1.2em;text-transform: uppercase;padding: 7px 20px;left: 50%;width: 200px; border-radius: 10px;color: white;text-shadow: -1px -1px 1px rgba(0,0,0,0.8);border: 5px solid transparent;border-bottom-color: rgba(0,0,0,0.35);background: #0043b1;cursor: pointer;outline: 0 !important;">Партнёры</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container mt-5">
    <div class="row justify-content-md-center">

        <?

        $query_get_category = mysqli_query($sqli, "SELECT * FROM `vacancies` WHERE `status` = ''");
        if (mysqli_num_rows($query_get_category) > 0) {
            echo '
            <div class="d-none d-lg-block d-sm-block col-lg-2"></div>
            <div class="d-none d-lg-block d-sm-block col-lg-8">
            <img src="../images/system/template_img/breakdown.png" alt="разбивка" />
            </div>
            <div class="d-none d-lg-block d-sm-block col-lg-2"></div>
            <div class="d-none d-lg-block col-lg-1"></div>
            <div class="col-12 col-lg-10 mb-5">
            <h2 class="h3 text-center mb-5 fontsize-sm-20 font-weight-bold">В команду профессионалов требуются:</h2>';
            $count_id = 0;
            while ($query = $query_get_category->fetch_assoc()) {
                echo '
			<div class="card card-custom card-corporate">
				<div class="card-heading" id="accordion' . $count_id . 'Heading' . $count_id . '">
					<div class="card-title">
                        <a class="collapsed font-weight-bold" role="button" data-toggle="collapse" data-parent="#accordion' . $count_id . '" href="#accordion' . $count_id . 'Collapse1" aria-controls="accordion' . $count_id . 'Collapse1" aria-expanded="false">
                            ' . $query['title'] . ' ';
                if ($query['salary']) {
                    echo '(Зарплата: ' . $query['salary'] . ').';
                }
                echo '<div class="card-arrow"></div>
                        </a>
					</div>
				</div>
				<div class="card-collapse collapse" id="accordion' . $count_id . 'Collapse1" role="tabpanel">
					<div class="card-body">

                        <p class="p_text" style="white-space: pre-wrap; text-indent: 0px;">' . $query['description'] . '</p>
                            <button class="button button-sm button-primary mt-4" data-toggle="modal" data-target="#myModal2" onclick="set_title_vakans(\'' . $query['title'] . '\')">Откликнуться</button>
					</div>
				</div>
			</div>

			<br>';
                $count_id++;
            }
            echo '</div>
            <div class="d-none d-lg-block col-lg-1"></div>';
        } else {
            echo '<div class="col-12 mb-5"><h3 class="mt-5 mb-1"><b>Вакансии пока не добавлены, но...</b></h3></div>';
        }
        echo '

        <section class="container mt-5">
        <div class="row justify-content-md-center">
    
            <div class="col-12 mb-4" style="margin-top:-90px">
                <p class="p_text">Металлургическая компания с именем и репутацией, проверенной временем, приглашает в свой коллектив опытных профессионалов. Мы с гордостью заявляем, что являемся лидерами на российском рынке по производству стружкодробильных комплексов. Помимо производственной деятельности, оказываем услуги по брикетированию стружки, металлообработке, плазменному раскрою. Создаём изделия по чертежам заказчика. Ещё одно важное направление – автоматизация. Автоматизируем различное промышленное оборудование в соответствии с необходимым технологическим процессом. Мы в поиске специалистов самых разных направлений. Посмотрите наши вакансии прямо сейчас (Расположены внизу страницы).</p>
    
            </div>
        </div>
    </section>
            
        <div class="col-md-6 col-lg-4">
            <article class="box-alice">
                <div class="box-alice__inner">
                    <div class="box-alice__aside">
                        <img src="../images/system/icon/icon-feature-1.png" style="height: 35px;" alt="Честные цены">
                    </div>
                    <div class="box-alice__main">
                        <h4>Стабильность и уверенность в завтрашнем дне</h4>
                    </div>
                </div>
            </article>
        </div>
        <div class="col-md-6 col-lg-4">
            <article class="box-alice">
                <div class="box-alice__inner">
                    <div class="box-alice__aside">
                        <img src="../images/system/icon/2.png" style="height: 35px;" alt="Работа в команде профессионалов">
                    </div>
                    <div class="box-alice__main">
                        <h4>Работа в команде профессионалов</h4>
                    </div>
                </div>
            </article>
        </div>
        <div class="col-md-6 col-lg-4">
            <article class="box-alice">
                <div class="box-alice__inner">
                    <div class="box-alice__aside">
                        <img src="../images/system/icon/pers.png" style="height: 35px;" alt="Индивидуальный подход">
                    </div>
                    <div class="box-alice__main">
                        <h4>Достойная система премирования</h4>
                    </div>
                </div>
            </article>
        </div>

<div class="col-12 mt-5">
        <p class="p_text" style="margin-top:-50px; margin-bottom: 50px">
            Мы всегда в поиске соискателей, которые готовы предложить свои знания, навыки и умения за систематическое стабильное вознаграждение. Недавно мы открыли новую базу в городе Оренбург, в следствии чего расширяем штат сотрудников. Возможно вакансия по той или иной причине не была добавлена на сайт, но мы всегда готовы рассмотреть Вашу кандидатуру и предложить Вам работу. Звоните или пишите нам.
        </p>
        </div>
        
                    ';
        ?>
    </div>
</section>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog pt-5" role="document">
        <div class="modal-content background_fon_metal border_fon_metal">
            <div class="modal-header">
                <div class="card-header card-header-primary text-center wow_modal_heder border_fon_metal" style="width: 100%;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="fa fa-times" aria-hidden="true"></span>
                    </button>
                    <h4 class="card-title m-0 text-white font-weight-bold">Отправить резюме</h4>
                </div>
            </div>
            <div class="modal-body">
                <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" onsubmit="send(event, '/vakansii')" action="/vakansii" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    <!--  onsubmit="send(event, '../../system_files/send.php')" -->
                    <input type="hidden" name="from" value="contacts">
                    <div class="modal-body modal_header_text">
                        <div class="form-wrap">
                            <input class="form-input form-control-has-validation" id="contact-name" type="text" name="name" data-constraints="@Required"><span class="form-validation"></span>
                            <label class="form-label rd-input-label" for="contact-name">Ваше имя</label>
                        </div>
                        <div class="form-wrap">
                            <input class="form-input form-control-has-validation" id="contact-phone" type="text" name="phone" data-constraints="@PhoneNumber"><span class="form-validation"></span>
                            <label class="form-label rd-input-label" for="contact-phone">Контактный телефон</label>
                        </div>
                        <div class="form-wrap">
                            <label class="form-label rd-input-label" for="contact-message">Напишите о себе</label>
                            <textarea class="form-input form-control-has-validation form-control-last-child" id="contact-message" name="message" data-constraints="@Required"></textarea><span class="form-validation"></span>
                        </div>
                        <div class="form-wrap" style="display: block;">
                            <label class="impl-feedback__teaser-link pointer_curs" for="popup-vacancies-add-file-1" style="display: block; cursor: pointer;">
                                <div class="impl-feedback__portals-stars popup-vakansii-icon-container" style="top: -2px;">
                                    <img class="popup-vakansii-icon" style="    margin-top: -3px;" src="images/system/icon/plus.svg" alt="">
                                    <span class="circle-outline" style="color: #2879fe;" id="add-text-file">Прикрепить резюме</span>
                                </div>
                            </label>
                            <input class="input-add-resume-stile" type="file" name="myfile" id="popup-vacancies-add-file-1">
                            <small id="text-add-file-vakans"></small>
                        </div>
                        <script>
                            $('#popup-vacancies-add-file-1').change(function() {
                                var filename = $('#popup-vacancies-add-file-1').val();
                                $('#text-add-file-vakans').html(filename)
                            });
                        </script>
                        <input id="title_vakans" name="title_vakans" style="display: none;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn_modal btn_left" data-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-prim btn_modal btn_right" style="background:#2879fe">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    // Отправка данных на сервер
    function send(event, php) {
        $('#text-add-file-vakans').html('')
    }

    function set_title_vakans(title) {
        $('#title_vakans').val(title)
    }
</script>

<?
include '../../page_elements/foot.php';
?>