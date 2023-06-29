<?
/*##################################################################################################
# Описание действия скрипта: 
##################################################################################################*/
$page_title = "Создание раздела";
$page_keywords = "нет, ключевых, слов";
$page_description = "Добавление нового раздела на сайт";
$page_robots="noindex,nofollow";
include '../../system_files/settings.php';
include '../../system_files/core.php';
include '../../page_elements/head.php';
level_user(); #Доступ авторизированым.
level_admin(); #Доступ только администратору и доверенным модераторам

$post = (!empty($_POST)) ? true : false;
 
if($post)
{
    if(strlen($_POST['title_vakansiy']) > 0){
        $temp_sms_code="
	        INSERT INTO `vacancies`
	        (
	        `title`,
	        `description`,
	        `salary`,
	        `status`
	        )VALUES(
            '".$_POST['title_vakansiy']."',
            '".$_POST['description_vakansiy']."',
            '".$_POST['zarplata_vakansiy']."',
            ''
	        )
	        ";
	        mysqli_query($sqli,$temp_sms_code);
    } else {
        error('Пустые данные, скрипт не отработал','','');
    }
}

?>

<div class="container">
    <div class="row justify-content-md-center mb-5 mt-3">
        <div class="col-12" style="max-width: 700px;">
        <h1 class="h3 text-center mt-3">Добавление вакансии</h1>
            <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="/admin//vakansii-add" novalidate="novalidate">
                <div class="row align-items-md-end row-20">
                    <div class="col-12">
                        <div class="form-wrap">
                            <input class="form-input form-control-has-validation mytranslit" id="vakansiy-title" type="text" name="title_vakansiy" data-constraints="@Required"><span class="form-validation"></span><span class="form-validation"></span>
                            <label class="form-label rd-input-label" for="vakansiy-title">Наименование вакансии</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-wrap">
                            <label class="form-label rd-input-label" for="contact-message">Описание и требования</label>
                            <textarea class="form-input form-control-has-validation form-control-last-child" id="contact-message" name="description_vakansiy" data-constraints="@Required"></textarea><span class="form-validation"></span><span class="form-validation"></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-wrap">
                            <input class="form-input form-control-has-validation mytranslit" id="vakansiy-zarplata" type="text" name="zarplata_vakansiy">
                            <label class="form-label rd-input-label" for="vakansiy-zarplata">Зарплата (не обязательно)</label>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button class="button button-secondary button-ujarak" style="padding-left: 75px; padding-right: 75px;" type="submit">Создать</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?
include '../../page_elements/foot.php';
?>