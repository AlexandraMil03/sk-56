<?
include "../../../system_files/settings.php";
include "../../../system_files/core.php";

$id_section = 1;

$resultat = mysqli_query($sqli, "SELECT * FROM `zakupki-category` WHERE id_section = '".$id_section."'");
$info_section = $resultat->fetch_assoc();

$page_title = $info_section['name_section'];
$page_keywords = $info_section['keywords_section'];
$page_description = $info_section['description_section'];
$page_robots="index,follow";

include "../../../page_elements/head.php";

	include "aa_system-layout_section.php";

include "../../../page_elements/foot.php";
?>