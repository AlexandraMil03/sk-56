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
    if(strlen($_POST['title_zakupka']) > 0 && strlen($_POST['description_zakupka']) > 0 ){
        $temp_sms_code="
	        INSERT INTO `zakupki-all`
	        (
	        `subcategory`,
	        `title`,
	        `description`,
	        `system_name`,
	        `time`,
	        `status`
	        )VALUES(
            '".$_POST['subcategory']."',
            '".$_POST['title_zakupka']."',
            '".$_POST['description_zakupka']."',
            '".$_POST['system_name']."',
	        '".$system_time."',
	        ''
	        )
	        ";
	        mysqli_query($sqli,$temp_sms_code);
    } else {
        error('Пустые данные, скрипт не отработал','','');
    }
}

?>

<h1 class="h2 text-center mt-5 mb-1">Создать предложение</h1>

<section>
    <div class="container mb-5">
        <div class="row justify-content-md-center">

            <script>
                var id_session = 0;

                function get_category_iteam(id, name) {
                    $.ajax({
                        type: "GET",
                        url: "../../system_files/add_new_zakupku.php",
                        dataType: 'text',
                        data: {
                            id_section: id,
                            action: "get_category"
                        },
                        success: function(data) {
                            $('#get_category_iteam')(data);
                            $('#dropdownMenu_razdel').text('Раздел: ' + name);
                            $('#id_section').val(id);
                        }
                    }).done(function(result) {

                    });
                }

                function get_id_category(id, name) {
                    $('#category_zakupka').val(id);
                    $('#dropdownMenu6').text(name);
                }

                function urlLit(w, v) {
                    text_new_category = $('#translate_name_new_category').val();
                    match_categories(w, text_new_category);
                    var tr = 'a b v g d e [\"zh\",\"j\"] z i y k l m n o p r s t u f h c ch sh [\"shh\",\"shch\"] ~ y ~ e yu ya ~ [\"jo\",\"e\"]'.split(' ');
                    var ww = '';
                    w = w.toLowerCase();
                    for (i = 0; i < w.length; ++i) {
                        cc = w.charCodeAt(i);
                        ch = (cc >= 1072 ? tr[cc - 1072] : w[i]);
                        if (ch.length < 3) ww += ch;
                        else ww += eval(ch)[v];
                    }
                    return (ww.replace(/[^a-zA-Z0-9\-]/g, '-').replace(/[-]{2,}/gim, '-').replace(/^\-+/g, '').replace(/\-+$/g, ''));
                }

                function match_categories(text, text_new_category) {
                    var i = 0;
                    // Убираем верхний регистра, все буквы делаем маленькими
                    var text_sver = text.toLowerCase();
                    var text_new_category = text_new_category.toLowerCase();
                    // Получаем переменные из PHP
                    var array_from_category = '.$array_from_new_category.';

                    var count = Math.max(array_from_category.length);
                    if (text.length < 3 || text.length > 64) {
                        button_lock(1);
                    } else {
                        if (array_from_category == "" ) {
                            if ($('#id_section').val() != ""){
                                $('.mytranslit').removeClass("background-red");
                                button_lock(0);
                            }
                        } else {
                            for (let i = 0; i < count; i++) {
                                if (text_sver.toLowerCase() == array_from_category[i].toLowerCase()) {

                                    if (text.length > 2) {
                                        $('.mytranslit').addClass("background-red");
                                    }
                                    button_lock(1);
                                    return 1;
                                } else {
                                    if ($('#id_section').val() != ""){
                                        $('.mytranslit').removeClass("background-red");
                                        button_lock(0);
                                    }
                                }
                            }
                        }
                    }
                    return 0;
                }

                $(document).ready(function() {
                    $('.mytranslit').bind('change keyup input click', function() {
                        $('.mytranslitto').val(urlLit($('.mytranslit').val(), 0))
                    });
                })

                function button_lock(lock) {
                    var add_new_category = $('#add_new_category');
                    if (lock == 1) {
                        $('#add_new_category').text('Заполните таблицу').button("refresh");
                        add_new_category.prop({
                            'type': 'file',
                            'disabled': true
                        });
                    } else {
                        $('#add_new_category').text('Создать категорию').button("refresh");
                        add_new_category.prop({
                            'type': 'file',
                            'disabled': false
                        })
                    }
                }
            </script>

            <?
            echo '
<div class="col-12 mt-4" style="max-width: 700px;">
<div class="form-row">
<div class="dropdown">
<a href="#" onclick="return false;" class="nav-link action show active dropdown-toggle h4" id="dropdownMenu_razdel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Выбрать раздел:</a>
<div class="dropdown-menu" aria-labelledby="dropdownMenu_razdel">
  <h6 class="dropdown-header">В какой раздел добавим товар?</h6>';

            $count = 0;
            $query_get_category = $sqli->query("SELECT * FROM `zakupki-category` ORDER BY `id_section` DESC");
            while ($query = $query_get_category->fetch_assoc()) {
                echo '<a class="dropdown-item" href="#" onclick="get_category_iteam(' . $query['id_section'] . ', \'' . $query['name_section'] . '\')">' . $query['name_section'] . '</a>';
                $count++;
            }

            echo '
  </div>    
</div>  
<input type="hidden" id="id_section" name="id_section"> 
</div>



<div class="form-row" id="get_category_iteam">

</div>
</div>';
            ?>



            <div class="col-12" style="max-width: 700px;">
                <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="/admin/add-new-zakupka" novalidate="novalidate">
                    <input type="hidden" name="from" value="compas">
                    <input type="hidden" id="category_zakupka" type="text" name="subcategory">
                    <div class="row align-items-md-end row-20">
                        <div class="col-12">
                            <div class="form-wrap">
                                <input class="form-input form-control-has-validation mytranslit" id="contact-name" type="text" name="title_zakupka" data-constraints="@Required"><span class="form-validation"></span><span class="form-validation"></span>
                                <label class="form-label rd-input-label" for="contact-name">Заголовок</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-wrap">
                                <input class="form-input form-control-has-validation mytranslitto text-muted pl-3" id="translate_name_new_category"  type="text" name="subcategory" style="width: -webkit-fill-available; font-size: 14px;" placeholder="" readonly></input>
                                </div>	
                                
                                <small class="form-text text-muted" style=" font-size: 12px;">Так категория будет названа в системе</small>

                        </div>
                        <div class="col-sm-12">
                            <div class="form-wrap">
                                <label class="form-label rd-input-label" for="contact-message">Описание</label>
                                <textarea class="form-input form-control-has-validation form-control-last-child" id="contact-message" name="description_zakupka" data-constraints="@Required"></textarea><span class="form-validation"></span><span class="form-validation"></span>
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
</section>

<?
include '../../page_elements/foot.php';
?>