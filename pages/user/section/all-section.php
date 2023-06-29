<?
/*##################################################################################################
# Описание действия скрипта: 
##################################################################################################*/
$page_title="Все разделы";
$page_keywords="нет, ключевых, слов";
$page_description="Все разделы нашего сайта";
$page_robots="index,follow";
include "../../../system_files/settings.php";
include "../../../system_files/core.php";
include '../../../page_elements/head.php';
####################################################################################################
echo '<div class="container mt-5">';
echo '<h4 class="font-weight-bold title-1">
<strong>Разделы сайта</strong>
</h4>
<hr class="blue mb-5 magazhr">';
$resultat = mysqli_query($sqli, "SELECT * FROM `section`");
while ($info_section = $resultat->fetch_assoc()) {
	echo'
	<div class="divider-new">
	    <h3 class="h3-responsive font-weight-bold blue-text mx-3"><a href="/'.$info_section['system_name_section'].'">'.$info_section['name_section'].'</a></h3>
	</div>';
}
echo '<hr class="blue mb-5 magazhr">';
echo '</div>';
####################################################################################################
include "../../../page_elements/foot.php";
?>