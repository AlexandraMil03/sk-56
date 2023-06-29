<?
/*##################################################################################################
# Описание действия скрипта: 404 ошибка                                                            #
##################################################################################################*/
$page_title="ERROR 404";
$page_keywords="ошибка, 404, error";
$page_description="ERROR 404";
$page_robots="noindex,nofollow";
header("HTTP/1.0 404 Not Found");
include '../../system_files/settings.php';
include '../../system_files/core.php';
include '../../page_elements/head.php';
?>
<div class="container-fluid d-none d-lg-block d-sm-block" style="background:#343434"><div style="padding-top:160px"></div><main><div><div><h3 style="color:#fff">404&nbsp;error</h3><h5 style="color:#fff">Такой&nbsp;страницы&nbsp;нет...</h5></div><svg viewBox="0 0 200 600"><polygon points="118.302698 8 59.5369448 66.7657528 186.487016 193.715824 14 366.202839 153.491505 505.694344 68.1413353 591.044514 200 591.044514 200 8"></polygon></svg></div><svg class="crack" viewBox="0 0 200 600"><polyline points="118.302698 8 59.5369448 66.7657528 186.487016 193.715824 14 366.202839 153.491505 505.694344 68.1413353 591.044514"></polyline></svg><div><svg viewBox="0 0 200 600"><polygon points="118.302698 8 59.5369448 66.7657528 186.487016 193.715824 14 366.202839 153.491505 505.694344 68.1413353 591.044514 0 591.044514 0 8"></polygon></svg><div><h5 style="color:#fff"><a href="/">вернуться&nbsp;на&nbsp;главную?</a></h5></div></div></main><div style="padding-top:160px"></div></div><section class="section"><div class="container-fluid d-sm-none d-lg-none bg-white text-center"><div style="padding-top:30px"></div><div class="row"><div class="col-lg-12"><h4 style="color:#000">404&nbsp;error&nbsp;-&nbsp;такой&nbsp;страницы&nbsp;нет.</h4><h4>вернуться&nbsp;на&nbsp;главную?</h4><a href="/index" class="nav-link text-light"><h2>ДА!</h2></a><img src="https://miro.medium.com/max/954/0*AnVCpSvrAeldg3Rn." style="width:100%" alt=""></div></div></div></section>
<?
include '../../page_elements/foot.php';
?>