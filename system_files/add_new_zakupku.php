<?
/*##################################################################################################
# Описание действия скрипта: ДОБАВЛЯЕМ НОВОЕ ПРЕДЛОЖЕНИЕ О ЗАКУПКЕ
##################################################################################################*/
include 'settings.php';
include 'core.php';
level_moderation(); #Доступ администратору и всем модераторам

$action = trim($_GET['action']);
$id_category = trim($_GET['id']);
$id_session = 0;


if ($action == "get_category") {
    $query_get_category = mysqli_query($sqli, "SELECT * FROM `zakupki-subcategory` WHERE `section` = '".$_GET['id_section']."' ORDER BY `id_category` DESC");
      if (mysqli_num_rows($query_get_category) > 0) {
    echo '
    <div class="dropdown">
    <a class="nav-link action show active dropdown-toggle h3" id="dropdownMenu6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Выбрать категорию:</a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu6">
      <h6 class="dropdown-header">Выберите категорию:</h6>';
    
              $count = 0;
              while ($query = $query_get_category->fetch_assoc()) {
                  echo '<a class="dropdown-item" href="#" onclick="get_id_category(' . $query['id_category'] . ', \'' . $query['name_category'] . '\')">' . $query['name_category'] . '</a>';
                  $count++;
              }
    
              echo '
      </div>    
    </div>  
    <input type="hidden" id="id_category" name="id_category"> 
    <!-- ID текущей сессии -->
    <input type="hidden" id="id_session" name="id_session"> 
    ';
    } else {
      echo '<a class="btn btn-info btn-md ml-0 mb-5 waves-effect waves-light" href="/admin/add_new_category" role="button">Создайте категорию товара для раздела<i class="fa fa-magic ml-2"></i></a>';
    }
}
    

?>