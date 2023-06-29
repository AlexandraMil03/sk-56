<?
/*##################################################################################################
# Описание действия скрипта: 
##################################################################################################*/
$page_title = "Молотковые дробилки";
$page_keywords = "плазменная резка, стружкодробилки, токарные работы, металлическая стружка, грузоперевозки орск, дробильное оборудование, грузоперевозки оренбург";
$page_description = "Мы производим и продаём молотковые дробилки, надёжные и долговечные. Подробную информацию смотрите на этой странице";
$page_robots = "index,follow";
include '../../system_files/settings.php';
include '../../system_files/core.php';
include '../../page_elements/head.php';
?>


<div class="container-fluid pt-5 pb-5 section-list">
	<div class="row justify-content-center all-text-blue">
		<div class="d-none-do-1366" style="position: absolute; top: 160px; left: 50px; width: 45%;">
			<a href="javascript:history.back();">
				<h4 style="cursor: pointer; color: #7b7b7b;">вернуться</h4>
			</a>
		</div>
		<div class="img-right-main d-none-do-1024px">
			<img src="images/system/hammer_shredders/hammer_shredders.png" style="width: 100%; margin-top: 120px;">
		</div>
		<div class="col-12 col-md-10 mb-3 text-left">
			<h1 class="font-weight-bold mb-2 main-title">молотковые дробилки</h1>
			<?
			if ($my_data['user_level'] == 0) {
			  echo '<div class="notice info d-flex d-none-do-668 mb-1" style="border-radius: 8px; width: 540px;">
				<p class="mt-2" style="color: #7b7b7b;">Зарегистрируйтесь, чтобы разблокировать цены</p><button data-toggle="modal" data-target="#registration_invitation" type="button" class="btn btn-sm btn-primary m-0 ml-3">Регистрация</button>
			</div>';
			}
			?>
			
			<h4 class="font-weight-bold d-none-do-668 pl-5 mt-4"><a href="#description-this-hammer">Описание оборудования</a></h4>
			<h4 class="font-weight-bold d-none-do-668 pl-5 mt-4">Модельный ряд</h4>
			<h4 class="font-weight-bold d-none-do-668 pl-5 mt-4"><a href="#photo-this-hammer">Фотографии</a></h4>
		</div>
		<img class="side-pieces" src="images/system/hammer_shredders/triugol.png" style="left: 0px;">
		<img class="side-pieces" src="images/system/hammer_shredders/triugol.png" style="right: 0px; transform: scale(-1, 1);">
		<div class="col-12">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- <div style="width: 100%; position:relative;"> -->

						<!-- </div> -->
						<h2 class="font-weight-bold mb-5 pl-5 secondary-main-indent" id="description-this-hammer">Описание оборудования</h2>
						<p class="text-justify p_text">Молотковая стружкодробилка предназначена для дробления металлической стружки. Дробилка состоит следующих основных частей: нижняя часть, верхняя часть, дробящий барабан, гусак. В нижней части дробилки расположены колосники, обеспечивающие равномерный просев стружки. Колосники размещены в направляющих рейках, обеспечивающих их беспрепятственную замену в случае поломки или износа. Дробящий барабан крепится на нижней части дробилки. Все элементы барабана включая молотки имеют износостойкий наплавочный слой предотвращающими преждевременный износ дробящего узла. Процесс дробления стружки обеспечивается путем ее трения между барабаном и колосниковой решёткой. Верхняя часть дробилки закрывает дробящий барабан. Для предотвращения ее износа, все стенки закрыты бронёй, также имеющий износостойкий наплавочный слой. По направлению вращения барабана расположен открывающийся отбойник. Крепление отбойника выполнено шарнирно в верхней части, и с помощью пружины в нижней части.
						</p>
						<p class="text-justify p_text">У отбойника две основные функции:
							<br><br>
							1) смягчение ударных нагрузок за счет пружины, в случае, когда со стружкой в дробилку попадает цельный металл, или при попадании пучков стружки большого размера.
							<br>
							2) При необходимости отбойник может быть открыт для визуального осмотра дробящего механизма и его чистки.
							<br><br> Гусак крепится на верхней части дробилки. В него подается исходная фракция стружки через транспортер. Основная задача гусака - удалять куски металла в процессе переработки стружки. Процесс удаления осуществляется путем подбрасывания металла вверх за счет вращения барабана. Тяжелые элементы как металл, куски камня, шлак выбрасываются через хобот гусака наружу. Стружка не имея высокой силы инерции не достигает хобота и опускается обратно в дробящий механизм.
						</p>
					</div>

					<div class="col-12 mt-5 mb-5">
						<h4 class="pl-5 font-weight-bold" style="color: #b4c7e7;">Ответим на Ваши вопросы:</h4>
					</div>

					<div class="col-12 col-md-4 mb-3">
						<div class="card" style="background-color: #262626; border-radius: 30px;">
							<div class="card-body">
								<h4>Отдел продаж</h4>
								<div class="row mt-3">
									<div class="col-4 col-lg-3 text-center"><span class="b-personal__elem__info__img align-center robotics_param"><img class="" src="images/system/teams/bikbaev.jpg" alt="Руководитель разработки программного обеспечения"></span></div>
									<div class="col-8 col-lg-9">
										<h5 class="text-left mb-1">Рустам<br>Радикович:</h5>
										<h4 class="d-none d-lg-block mt-0"><a href="tel:+79619249074">+7 961-924-90-74</a></h4>
										<h4 class="d-none d-sm-block d-lg-none mt-0"><a href="tel:+79619249074">+7 961-924-90-74</a></h4>
										<h4 class="d-sm-none d-lg-none mt-0"><a href="tel:+79619249074">+7 961-924-90-74</a></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4 mb-3">
						<div class="card" style="background-color: #262626; border-radius: 30px;">
							<div class="card-body">
								<h4>Главный инженер</h4>
								<div class="row mt-3">
									<div class="col-4 col-lg-3 text-center"><span class="b-personal__elem__info__img align-center robotics_param"><img class="" src="images/system/teams/Mironov.jpg" alt="Руководитель разработки программного обеспечения"></span></div>
									<div class="col-8 col-lg-9">
										<h5 class="text-left mb-1">Андрей Александрович:</h5>
										<h4 class="d-none d-lg-block mt-0"><a href="tel:+79033950448">+7 903-395-04-48</a></h4>
										<h4 class="d-none d-sm-block d-lg-none mt-0"><a href="tel:+79033950448">+7 903-395-04-48</a></h4>
										<h4 class="d-sm-none d-lg-none mt-0"><a href="tel:+79033950448">+7 903-395-04-48</a></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4 mb-3">
						<div class="card" style="background-color: #262626; border-radius: 30px;">
							<div class="card-body">
								<h4>Напишите нам</h4>
								<div class="row justify-content-center mt-4 mb-3">
									<button onclick="GoToPage('/feedback')" type="button" class="btn btn-blue-stile m-2 mt-2">Оставить заявку</button>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>


			<h3 class="text-center mt-4 mb-5 tertiary-notation">
				<b>Для плавного запуска и останова, электродвигатель оснащен устройством плавного пуска.</b>
			</h3>

			<div class="container">
				<div class="row">
					<div class="col-12">

						<p class="text-justify p_text mb-5">
							Молотковая дробилка устанавливается на бетонный фундамент изготовленный Заказчиком по ТЗ и чертежам Изготовителя.</p>

					</div>

					<div class="col-lg-4" id="photo-this-hammer"><img class="minimized px-1 px-md-2 mb-2 mb-md-4" src="../images/system/hammer_shredders/1.jpg" alt="нажмите для увеличения" /></div>
					<div class="col-lg-4"><img class="minimized px-1 px-md-2 mb-2 mb-md-4" src="../images/system/hammer_shredders/2.jpg" alt="нажмите для увеличения" /></div>
					<div class="col-lg-4"><img class="minimized px-1 px-md-2 mb-2 mb-md-4" src="../images/system/hammer_shredders/3.jpg" alt="нажмите для увеличения" /></div>
					<div class="col-lg-2"></div>
					<div class="col-lg-4" style="margin-top: 50px;">
						<div class="box-chloe-button box-chloe_primary button_box metall_button" style="text-align: center; padding: 0px;">
							<div class="box-chloe__main" style="max-width: none; padding-top: 20px;">
								<a href="/explosive_machines">
									<h3 class="box-chloe__text" style="font-size: 25px;">разрывные машины</h3>
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4" style="margin-top: 50px;">
						<div class="box-chloe-button box-chloe_primary button_box metall_button" style="text-align: center; padding: 0px;">
							<div class="box-chloe__main" style="max-width: none; padding-top: 0px;">
								<a href="/sk-sdk-plants">
									<h3 class="box-chloe__text" style="font-size: 25px;">характеристики стружкодробилок</h3>
								</a>
							</div>
						</div>
					</div>

					<div class="col-lg-2"></div>
				</div>
			</div>
		</div>

	</div>
</div>

<script>
	var $page = $('html, body');
	$('a[href*="#"]').click(function() {
		$page.animate({
			scrollTop: $($.attr(this, 'href')).offset().top
		}, 400);
		return false;
	});
</script>

<?
include '../../page_elements/foot.php';
?>