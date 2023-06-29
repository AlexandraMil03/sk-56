<?
$page_title = "Закупки";
$page_keywords = "Закупки";
$page_description = "Закупки";
$page_robots = "index,follow";
include '../../system_files/settings.php';
include '../../system_files/core.php';
include '../../page_elements/head.php';

$local_url_to_the_image = '/../images/system/template_img/about_company.jpg';
$headline_for_this_title_block = 'Закупки';
include 'element/page-title-block.php';
?>

<div class="container mt-5">
  <div class="row">
    <div class="col-12">
      <h2 class="h3">Закупки - что это?</h2>
      <p class="p_text">
        Для стабильной работы нашего предприятия мы регулярно приобретаем ресурсы различного назначения, далее будем называть этот процесс просто: закупки.
        Закупки - необходимая составляющая производственной деятельности, целью которой является приобретение товара или услуги по минимальной цене.
        Если вы обладаете указанным в перечне материалом, производите изделия/продукцию/сырьё, либо предоставляете услуги, мы приглашаем Вас принять участие в "торгах".
        <br>Торги - это формальное название. Всё, что Вам нужно для участия - указать к заявке Ваше предложение.
        Наиболее выгодные предложения будут рассмотрены нашим руководством с целью последующего сотрудничества с этими компаниями.
      </p>
    </div>

    <div class="col-12 mt-5 mb-5">
      

    <div class="modal-content">
      <div class="modal-header">
        <div class="card-header card-header-primary text-center wow_modal_heder" style="width: 100%;">
          <h1 class="h4 card-title text-white font-weight-bold m-0">Предложения по закупкам</h1>
        </div>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-4 border-zakup">
              <p class="h5 text-center">Категория</p>
              <?
              $first_category = null;
              $query_get_category = $sqli->query("SELECT * FROM `zakupki-category` ORDER BY `id_section` DESC");
              if (mysqli_num_rows($query_get_category) > 0) {
                while ($query = $query_get_category->fetch_assoc()) {
                  echo '<a class="h5" href="#" onclick="return false;">' . $query['name_section'] . '</a>';
                  if ($first_category == null) {
                    $first_category = $query;
                  }
                }
              } else {
                echo '<p class="text-center mt-4">Предложений пока нет</p>';
              }
              ?>
            </div>
            <div class="col-12 col-lg-4 border-zakup">
              <p class="h5 text-center">Подкатегория</p>
              <?
              $first_subcategory = null;
              if ($first_category != null) {
                $query_get_subcategory = $sqli->query("SELECT * FROM `zakupki-subcategory` WHERE `section` = '" . $first_category['id_section'] . "' ORDER BY `id_category` DESC");
                if (mysqli_num_rows($query_get_subcategory) > 0) {
                  while ($query = $query_get_subcategory->fetch_assoc()) {
                    echo '<a class="h5" href="#" onclick="return false;">' . $query['name_category'] . '</a>';
                    if ($first_subcategory == null) {
                      $first_subcategory = $query;
                    }
                  }
                } else {
                  echo '<p class="text-center mt-4">Предложений по закупкам пока нет</p>';
                }
              } else {
                echo '<p class="text-center mt-4">Предложений по закупкам пока нет</p>';
              }
              ?>
            </div>
            <div class="col-12 col-lg-4">
              <p class="h5 text-center">Закупки</p>
              <!-- Здесь непосредтвенно предложения -->
              <?
              if ($first_subcategory != null) {
                $query_get_subcategory = $sqli->query("SELECT * FROM `zakupki-all` WHERE `subcategory` = '" . $first_subcategory['id_category'] . "' ORDER BY `id` DESC");
                if (mysqli_num_rows($query_get_subcategory) > 0) {
                  while ($query = $query_get_subcategory->fetch_assoc()) {
                    echo '<a class="h5" href="/zakupki/' . $first_category['system_name_section'] . '/' . $first_subcategory['system_name'] . '">' . $query['title'] . '</a>';
                    if ($first_subcategory == null) {
                      $first_subcategory = $query;
                    }
                  }
                } else {
                  echo '<p class="text-center mt-4">Предложений пока нет</p>';
                }
              } else {
                echo '<p class="text-center mt-4">Предложений пока нет</p>';
              }
              ?>
            </div>
          </div>
        </div>

      </div>
    </div>


    </div>
  </div>
</div>




<div class="container mb-5">

  <div class="row row-30 justify-content-md-center">
    <?

    $counter_zayvki = 0;
    $query_get_subcategory = $sqli->query("SELECT * FROM `zakupki-all`");
    if (mysqli_num_rows($query_get_subcategory) > 0) {
      while ($query = $query_get_subcategory->fetch_assoc()) {
        if ($counter_zayvki == 0) {
          echo '<div class="col-12">
              <h2 class="h3 text-center mt-3 mb-3">Все закупки нашей компании</h2>
            </div>';
        }
        $counter_zayvki++;
        $get_system_url_zakupki = $sqli->query("SELECT * FROM `zakupki-subcategory` INNER JOIN `zakupki-category` ON `zakupki-category`.id_section = `zakupki-subcategory`.section WHERE `id_category` = '".$query['subcategory']."' AND  ");

        echo '
    <div class="col-md-6 col-lg-4">
      <!-- Box Chloe-->
      <div class="card b-order__form button-zoom_out div_zakupka_block">
        <h6 class="zakupka_title">'.$query['title'].'</h6>
        <p>'.$query['description'].'.</p>

        <a class="button button-sm button-default button-ujarak"  href="/'.$get_system_url_zakupki['system_name_section'].'/'.$get_system_url_zakupki['system_name'].'/'.$query['system_name'].'">Открыть</a>

      </div>
    </div>';
      }
    } else {
      //  Закупки пока не производятся
    }

    ?>
  </div>
</div>

<?
include '../../page_elements/foot.php';
?>