<?
// $local_url_to_the_image - сюда положить картинку
// $headline_for_this_title_block - сюда кладём заголовок страницы
echo '
<section class="breadcrumbs-custom">
<div class="breadcrumbs-custom__aside bg-image context-dark" style="background-image: url('.$local_url_to_the_image.');">
  <div class="container">
    <h1 class="title-main">'.$headline_for_this_title_block.'</h1>
  </div>
</div>
</section>';
?>