<?
echo '<div class="container my-5">';
echo '<h4 class="font-weight-bold mt-5 title-1 text-uppercase">
      <strong>РАЗДЕЛ '.$info_section['name_section'].', КАТЕГОРИИ ТОВАРОВ</strong>
    </h4>
    <hr class="red mb-5 magazhr">
<div class="row">';

// Получаем список категорий
      $estimation=0;
      $query_action = $sqli->query("SELECT * FROM `category` INNER JOIN `section` ON `category`.section = `section`.`id_section` WHERE `section` = '".$id_section."' ORDER BY `id_category`");
      while ($query = $query_action->fetch_assoc()) {
        if ($query > 0) {
          echo '
      <div class="col-lg-4 col-md-12 col-12 mb-3">
      
        <div class="row hoverable align-items-center">
          <div class="col-6 text-center">
          <a href="/'.$query['system_name_section'].'/'.$query['system_name'].'">';
          if($query['image-category'] != ""){
            $url_img = $query['image-category'];
          } else {
            $url_img = $product_image_not_found;
          }
          echo '  <img src="' . $url_img . '" class="img-fluid" style="max-height: 120px;">';
          
          echo ' </a>
          </div>
          <div class="col-6">
            <a href="/'.$query['system_name_section'].'/'.$query['system_name'].'" class="pt-5"><strong>' . $query['name_category'] . '</strong></a>
            <ul class="rating inline-ul">
              <li>
                <i class="fas fa-star blue-text"></i>
              </li>
              <li>
                <i class="fas fa-star blue-text"></i>
              </li>
              <li>
                <i class="fas fa-star blue-text"></i>
              </li>
              <li>
                <i class="fas fa-star blue-text"></i>
              </li>
              <li>
                <i class="fas fa-star grey-text"></i>
              </li>
            </ul>
            <h6 class="h6-responsive font-weight-bold dark-grey-text">
              <strong>просмотры</strong>
            </h6>
          </div>
        </div>
        
      </div>';
      $estimation++;
        }
      }
      if ($estimation==0){
        echo '<div class="col-lg-12 text-center"><strong>КАТЕГОРИИ РАЗДЕЛА ЕЩЁ НЕ СОЗДАНЫ</strong><br><br>';
        if  ($my_data['user_level_moderation'] > 0) {
          echo '<a class="btn btn-info btn-md ml-0 mb-5 waves-effect waves-light text-center" href="admin/add_new_category" role="button">Создайте категории товара<i class="fa fa-magic ml-2"></i></a>';
        }
        echo '</div>';
      }


echo "</div></div>";
?>