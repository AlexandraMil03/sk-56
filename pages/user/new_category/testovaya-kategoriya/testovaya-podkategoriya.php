<?
include "../../../../system_files/settings.php";
include "../../../../system_files/core.php";

$id_category = 1;

$resultat = mysqli_query($sqli, "SELECT * FROM `zakupki-all` WHERE `subcategory` = '".$id_category."'");
$info_category = $resultat->fetch_assoc();

$page_title = $info_category['title'];
$page_description = $info_category['description'];
$page_robots="index,follow";

$long_file_paths = true;

include "../../../../page_elements/head.php";

if ($info_category['status'] != "disabled")
{
	include "../aa_system-layout_categories.php";
}
else 
{
	include "../../page_disabled.php";
}
include "../../../../page_elements/foot.php";
?>