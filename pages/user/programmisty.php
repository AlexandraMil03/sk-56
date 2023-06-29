<?
/*##################################################################################################
# Описание действия скрипта: 
##################################################################################################*/
$page_title = "Программирование";
$page_description = "Создание сайтов различной сложности";
$page_robots = "index,follow";
include '../../system_files/settings.php';
include '../../system_files/core.php';
include '../../page_elements/head.php';
?>
<section class="section-sm text-center">
  <h1 class="title-main pl-2 pr-2">Мы предоставляем услуги по созданию программных продуктов</h1>
</section>
<section class="mb-5 pb-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <p class="text-justify p_text">Мы делаем проекты любой сложности, в том числе коммерческие программные продукты для разных целей и задач. Наша деятельность: это автоматизация процессов производства путем создания различного рода программных продуктов. Мы работаем с различными передовыми технологиями, ведем разработку на быстрых и современных языках программированиния. У нас сильная команда. Вот что мы делаем: сайты, сервера, базы данных, боты, чат-боты, скрипты, мобильные приложения, настольные приложения для компьютеров и многое другое
        </p>
        <p class="text-justify p_text"></p>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="../images/system/vkbot.png" alt="Первый слайд">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="../images/system/mobile.png" alt="Второй слайд">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="../images/system/planshet.png" alt="Третий слайд">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <button onclick='' type="button" class="btn btn-lg btn-blue-stile m-2 mt-5">Перейти на сайт</button>
</section>


<?
include '../../page_elements/foot.php';
?>