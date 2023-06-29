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

if ($post) {
	$to  = 'test@gmail.com';
	$name_new_category = trim($_POST['name_new_section_add_in_bd']);
	$product_name = $_POST['product_name'];
	$product_description = $_POST['description_new_section'];
	$product_quantity = $_POST['product_quantity'];
	$price = $_POST['product_price'];
	$product_img = $_POST['product_img'];
	$new_page_name = $_POST['new_page_name'];

	if ($_POST['name_image'] == ""){
		$name_image = "";
	} else {
		$name_image = "../images/system/section/".$_POST['name_image'];
	}

	$keywords_new_section = $_POST['keywords_new_section'];

	$add_php = ".php";
	$folder = "../user/section/";

	$proverka = $sqli->query("SELECT * FROM `zakupki-category` WHERE `name_section` = '".$name_new_category."'");
	$proverka_2 = $sqli->query("SELECT * FROM `zakupki-category` WHERE `system_name_section` = '".$new_page_name."'");
	if($proverka->num_rows == 0 && $proverka_2->num_rows == 0 && $name_new_category != "" && $new_page_name != "") {

	if (!file_exists($folder . $new_page_name . $add_php)) {
		// Создаём новый раздел
		$result = $sqli->query("INSERT INTO `zakupki-category` SET `name_section` = '" . $name_new_category . "', `system_name_section` = '" . $new_page_name . "', `image-section` = '".$name_image."', `description_section` = '".$product_description."', `keywords_section` = '".$keywords_new_section."' ");
		// Получаем ID созданной категории
		$id_new_category = $sqli->insert_id;


$file_contents = '<?
include "../../../system_files/settings.php";
include "../../../system_files/core.php";

$id_section = '.$id_new_category.';

$resultat = mysqli_query($sqli, "SELECT * FROM `zakupki-category` WHERE id_section = \'".$id_section."\'");
$info_section = $resultat->fetch_assoc();

$page_title = $info_section[\'name_section\'];
$page_keywords = $info_section[\'keywords_section\'];
$page_description = $info_section[\'description_section\'];
$page_robots="index,follow";

include "../../../page_elements/head.php";

	include "aa_system-layout_section.php";

include "../../../page_elements/foot.php";
?>';


		//если файла нет... тогда
		// if (!file_exists($file)) {
		$fp = fopen($folder . $new_page_name . $add_php, "w"); // ("r" - считывать "w" - создавать "a" - добовлять к тексту),мы создаем файл
		fwrite($fp, $file_contents);
		fclose($fp);
		// }

		//Создание папки для загрузки картинок
		$structure = '../../images/system/'.$new_page_name.'/';
		if (mkdir($structure, 0700) == false) {
			echo 'Папка для картинок товара не создана';
		}

		//Начало строчки объявления файла в .htaccess
		$htaccess_beginning = "RewriteRule  ^";
		//Середина строчки объявления файла в .htaccess
		$htaccess_mean = "$ pages/user/section/";
		//Конец строчки объявления файла в .htaccess
		$htaccess_end = ".php [L]";
		//Добавление записи о новом файле
		$htaccess = file_get_contents('../../.htaccess');
		$htaccess = str_replace('###ADD-SECTION###', 'zakupki/'.$htaccess_beginning . $new_page_name . $htaccess_mean . $new_page_name . $htaccess_end . "\n###ADD-SECTION###", $htaccess);
		file_put_contents('../../.htaccess', $htaccess);


	} //конец IF

ok("Раздел успешно создан. Теперь Вы можете добавить категории к разделу!", "/admin/add_new_category?this=".$id_new_category."", "Добавить категории");
echo '
<div class=" text-center mb-5">
<a class="btn btn-info btn-xl ml-0 waves-effect waves-light" href="/admin/add_new_section" role="button">Создать ещё раздел</a>
		</div>
';
} else {
	error("Ошибка при создании раздела, попробуйте снова", "/admin/add_new_section", "вернуться");
}
} else { // Конец POST


echo '<div class="container mb-5">
<form class="rd-mailform" action="add_new_section" method="post" enctype="multipart/form-data">
          <input type="hidden" name="from" value="contacts">
<div class="row">

<div class="col-lg-12">
	<h2 class="pb-5 text-right">Создать категорию закупок</h2>
</div>



<div class="col-lg-7">

	<div class="card card-body">
		<h4 class="text-center">1) Введите название раздела</h4>
		<div class="md-form md-outline" style="margin-bottom: 0px;">
			<i class="fas fa-share-square prefix"></i>
			<input type="text" id="inputIconEx1" name="name_new_section_add_in_bd" length="64" class="form-control mytranslit">
			<label for="inputIconEx1">Наимменование</label>
		</div>
		<div class="md-form ml-4 pl-2" style="margin-top: 0px;">
		<div class="form-wrap">
			<input class="form-input form-control-has-validation mytranslitto text-muted pl-3" id="translate_name_new_category"  type="text" name="new_page_name" style="width: -webkit-fill-available; font-size: 14px;" placeholder="" readonly></input>
			</div>	
			
			<small class="form-text text-muted" style=" font-size: 12px;">Так раздел будет назван в системе</small>
		</div>

		<h5 class="text-center mt-3">2) Описание раздела </h5>
		<div class="md-form md-outline" style="margin-bottom: 0px;">
			<i class="fas fa-share-square prefix"></i>
			<textarea type="text" id="inputIconEx2" name="description_new_section" length="255" class="form-control"></textarea>
			<label for="inputIconEx2" class="">Описание раздела</label>
			<span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span>
		</div>
		<p class="ml-4 pl-2">*необходимо для продвижения страниц (meta-teg: description)</p>
		
		<h5 class="text-center mt-3">3) Ключевые слова </h5>
		<div class="md-form md-outline" style="margin-bottom: 0px;">
			<i class="fas fa-share-square prefix"></i>
			<textarea type="text" id="inputIconEx3" name="keywords_new_section" length="255" class="form-control"></textarea>
			<label for="inputIconEx3" class="">Ключевые слова, через запятую</label>
			<span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span>
		</div>
		<p class="ml-4 pl-2">*необходимы для продвижения (meta-teg: keywords), а так же для поисковой системы сайта - формируются ассоциации товаров</p>
	</div>

</div>

<div class="col-lg-5">
	<div class="md-accordion accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
		<div class="card">
			<div class="card-header" role="tab" id="headingOne">

				<!-- Heading -->
				<a id="folder-1" data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					<h5 class="mt-1 mb-0">
						<span>Уже созданные разделы</span>
						<i class="fas fa-angle-down rotate-icon"></i>
					</h5>
				</a>

			</div>

			<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
				<div class="card-body">

					<ul class="list-group" id="menu-selected-category">';
					
						$array_from_new_category = '[';
						$i = 0;
						$counter = 1;
						$query_action = $sqli->query("SELECT * FROM `zakupki-category` ORDER BY `id_section`");
						while ($query = $query_action->fetch_assoc()) {
								echo '<li class="list-group-item">' . $counter . ') <span id="id_category-' . $query['id_section'] . '">' . $query['name_section'] . '</span></li>';
								$array_from_new_category .= '"'.$query['name_section'].'",';
								$i++;
								$counter++;
						}
						if($counter > 1){
						$array_from_new_category = mb_substr($array_from_new_category, 0, -1);
						}
						$array_from_new_category .= ']';
			
					echo '</ul>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">

<div class="col-lg-12 text-center mt-5 pt-2">
	<button class="btn btn-info btn-lg" type="submit" id="add_new_category" disabled>Заполните таблицу</button>
</div>


			</div>
		</div>
	</div>
</div>




<script>
	$(function() {
		$(\'.material-tooltip-smaller\').tooltip({
			template: \'<div class="tooltip md-tooltip"><div class="tooltip-arrow md-arrow"></div><div class="tooltip-inner md-inner"></div></div>\'
		});
	})
</script>






<script>
	var text_new_category = "";

	function reset_written() {
		$(\'#product_name_out\').text(\'\');
		$(\'#product_description_out\').text(\'\');
		$(\'#product_quantity_out\').text(\'\');
		$(\'#product_price_out\').text(\'\');
		$(\'#delete_img_from_add\').val(\'\');
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
			document.getElementById(\'image_add\').style.display = \'none\';
			button_lock(1);
		} else {
			if (array_from_category == "" ) {
				$(\'.mytranslit\').removeClass("background-red");
				document.getElementById(\'image_add\').style.display = \'block\';
				button_lock(0);
			} else {
				for (let i = 0; i < count; i++) {
					if (text_sver.toLowerCase() == array_from_category[i].toLowerCase()) {
						if (text.length > 2) {
							$(\'.mytranslit\').addClass("background-red");
						}
						document.getElementById(\'image_add\').style.display = \'none\';
						button_lock(1);
						return 1;
					} else {
						$(\'.mytranslit\').removeClass("background-red");
						document.getElementById(\'image_add\').style.display = \'block\';
						button_lock(0);
					}
				}
			}
		}
		return 0;
	}

	function button_lock(lock) {
		var add_new_category = $(\'#add_new_category\');
		if (lock == 1) {
			$(\'#add_new_category\').text(\'Заполните таблицу\').button("refresh");
			add_new_category.prop({
				\'type\': \'file\',
				\'disabled\': true
			});
		} else {
			$(\'#add_new_category\').text(\'Создать раздел\').button("refresh");
			add_new_category.prop({
				\'type\': \'file\',
				\'disabled\': false
			})
		}
	}

	function separate_numbers_from_a_string(text_product_quantity) {
		var text_product_quantity = parseInt(text_product_quantity.replace(/\D+/g, ""));
		return text_product_quantity;
	}

	function highlight_input_remuve() {
		$(\'#inputIconEx1\').removeClass("z-depth-5");
	}
';

echo "

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

	$(document).ready(function() {
		$('.mytranslit').bind('change keyup input click', function() {
			$('.mytranslitto').val(urlLit($('.mytranslit').val(), 0))
		});

		$('#product_name_out').bind('change keyup input click', function() {
			$('#product_name_add').val($('#product_name_out').text(), 0)
		});
		$('#product_description_out').bind('change keyup input click', function() {
			$('#product_description_add').val($('#product_description_out').text(), 0)
		});
		$('#product_quantity_out').bind('change keyup input click', function() {
			$('#product_quantity_add').val(separate_numbers_from_a_string($('#product_quantity_out').text())).text(), 0
		});
		$('#product_price_out').bind('change keyup input click', function() {
			$('#product_price_add').val(separate_numbers_from_a_string($('#product_price_out').text())).text(), 0
		});

	});
</script>
";

echo '</div></form></div>';

}

include '../../page_elements/foot.php';
?>