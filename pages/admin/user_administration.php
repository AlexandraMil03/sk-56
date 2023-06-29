<?
/*##################################################################################################
# Описание действия скрипта: меню админки.                                                         #
##################################################################################################*/
$page_title="Статистика";
$page_keywords="нет, ключевых, слов";
$page_description="Статистика работы сайта";
$page_robots="noindex,nofollow";
include '../../system_files/settings.php';
include '../../system_files/core.php';
// include '../../page_elements/headadmin.php';
include '../../page_elements/head.php';
level_user(); #Доступ авторизированым.
level_moderation(); #Доступ админам.
// 2021-02-12 08:03:59
// Обновление даты. Удалить по результату:
// $get_data=$sqli->query("SELECT * FROM `movement_history`") or die('error!');
// while ($this_data=mysqli_fetch_assoc($get_data))
// {
//  $time_online=getdate($this_data['time']);
//  $this_time = $time_online['year'].'-'.$time_online['mon'].'-'.$time_online['mday'] . ' '.$time_online['hours'].':'.$time_online['minutes'].':'.$time_online['seconds'];
//  $sqli->query("UPDATE `movement_history` SET `date` = '".$this_time."' WHERE `id` = '".$this_data['id']."' ");
// }


$display = $_GET['display'];
$per_page = 7; // Столько товара будем отображать на странице
//получаем номер страницы и значение для лимита 
$cur_page = 1;
if (isset($_GET['page']) && $_GET['page'] > 0) 
{
    $cur_page = $_GET['page'];
}
$start_sample = (($cur_page - 1) * $per_page);
$end_sample = $start_sample + $per_page;


$get_data_users=$sqli->query("SELECT * FROM `user`");

$number_of_records_in_bd = mysqli_num_rows($get_data_users);
// Максимум страниц
$colichestvo_page = ceil($number_of_records_in_bd/$per_page);
if ($number_of_records_in_bd != 0)
{
    // Если номер страницы больше, чем есть на самом деле, откатимся до последней странички
    if ($colichestvo_page < $cur_page) { 
        if ($colichestvo_page < 1){
            echo '<script>
            var url_location = document.location.pathname;
            window.location.href = url_location+"?display='.$display.'&page=1";
            </script>'; 
        } else {
            echo '<script>
            var url_location = document.location.pathname;
            window.location.href = url_location+"?display='.$display.'&page='.$colichestvo_page.'";
            </script>'; 
        }
    }
}
$my_location = "/admin/user_administration?&page=";
echo '<script> var colichestvo_page = '.$colichestvo_page.'; </script>';
?>
<div class="row pt-3 pb-0 bg-white">
	<div class="col-md-12 text-center">
		<h5>Посещений за сегодня: 
		<?
		$date_get_identificator = $sqli->query("SELECT DISTINCT(identificator) FROM `movement_history` WHERE `date` >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY) AND `identificator` != ''");
		$date_get_id_user = $sqli->query("SELECT DISTINCT(id_user) FROM `movement_history` WHERE `date` >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY) AND `id_user` != 0");
		
		$date_get_oneday_identificator = $sqli->query("SELECT DISTINCT(identificator) from `movement_history` where date >= CURDATE() AND `identificator` != ''");
		$date_get_oneday_id_user = $sqli->query("SELECT DISTINCT(id_user) from `movement_history` where date >= CURDATE() AND `id_user` != ''");
			// $date_get = $sqli->query("select id from `movement_history` where date > DATE_SUB(CURDATE(), INTERVAL (DAYOFWEEK(CURDATE()) -1) DAY) and date < DATE_ADD(CURDATE(), INTERVAL (9 - DAYOFWEEK(CURDATE())) DAY)");
			echo mysqli_num_rows($date_get_oneday_identificator) + mysqli_num_rows($date_get_oneday_id_user);
		?> пользователей. Из них авторизованных: <? echo mysqli_num_rows($date_get_oneday_id_user) ?></h5>
		<h5>Всего посещений за неделю: <? echo mysqli_num_rows($date_get_identificator)+mysqli_num_rows($date_get_id_user); ?> (из них <? echo mysqli_num_rows($date_get_id_user); ?> авторизованных)</h5>
	</div>
              <!-- First column -->
              <div class="col-md-12">

                <!-- Panel content -->
                <div class="card-body pt-0">

                  <!-- Table -->
                  <div class="table-responsive">

                    <table class="table table-hover">
                      <!-- Table head -->
                      <thead class="rgba-stylish-strong white-text">
                        <tr class="text-center">
                          <th>id</th>
                          <th class="text-left">Пользователь <? echo '(Всего: '.mysqli_num_rows($get_data_users).')'; ?></th>
                          <th>Был в сети</th>
                          <th>Уровень</th>
                          <th>Стружка</th>
                          <th>Сельхоз</th>
                          <th>Услуги</th>
                          <th>Номер</th>
                          <th>Почта</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?
                      $get_data=$sqli->query("SELECT * FROM `user` ORDER BY `id` desc LIMIT $start_sample, $per_page") or die('error!');
                      while ($user=mysqli_fetch_assoc($get_data))
                      {
                      echo '
                        <tr class="none-top-border text-center">
                          <td>'.$user['id'].'</td>
                          <td class="text-left">';
                            if($user['user_surname']){
                              echo $user['user_surname'];
                            }
                            if($user['user_name']){
                              echo ' '.$user['user_name'];
                            }
                            if($user['user_patronymic']){
                              echo ' '.$user['user_patronymic'];
                            }
                          echo '
                          </td>
                          <td>';
                          $time_online=$user['time_online'];
                          $time_online=getdate($time_online);
                          if(strlen($time_online['mday']) == 1){
                            $mday = '0'.$time_online['mday'];
                          } else { $mday = $time_online['mday']; }
                          
                          if(strlen($time_online['mon']) == 1){
                            $mon = '0'.$time_online['mon'];
                          } else { $mon = $time_online['mon']; }

                          if(strlen($time_online['minutes']) == 1){
                            $minutes = '0'.$time_online['minutes'];
                          } else { $minutes = $time_online['minutes']; }

                          echo $mday . '.' . $mon . '.' . $time_online['year'].' в '.$time_online['hours'].':'.$minutes;
                          echo '
                          </td>
                          <td class="text-center">';
                          echo '<span class="badge ';
                          if($user['user_level'] > 2) { echo'warning-color">admin'; }
                          if($user['user_level'] < 3) { echo'info-color">user'; }                   
                          echo '</span></td>';

                          $struzka = 0;
                          $crushers = 0;
                          $services = 0;
                          $sum = 0;

                          $get_data_history=$sqli->query("SELECT * FROM `movement_history` WHERE `id_user` = '".$user['id']."'");
                          while ($data_history=mysqli_fetch_assoc($get_data_history)){
                            switch ($data_history['url']){
                              case '/turning_works': $services++; break;
                              case '/plazmennaya-rezka': $services++; break;
                              case '/foundry': $services++; break;
                              case '/ferroalloy_briquetting': $struzka++; break;
                              case '/briquette_production': $struzka++; break;
                              case '/struzhka': $struzka++; break;
                              case '/struzhkodrobilki': $crushers++; break;
                              case '/sk-sdk-plants': $crushers++; break;
                              case '/explosive_machines': $crushers++; break;
                              case '/hammer_shredders': $crushers++; break;
                              case '/briquetting-press': $crushers++; break;
                              case '/briquetting-lines': $crushers++; break;
                              case '/pumps': $crushers++; break;
                              case '': break;
                              case '/bearing-housing': $crushers++; break;
                              default: break;
                            }
                          }

                          $sum = $struzka + $crushers + $services;
                          
                        if ($sum != 0){
                          $statistic_struzka = ($struzka / $sum)*100;
                          $statistic_crushersl = ($crushers / $sum)*100;
                          $statistic_services = ($services / $sum)*100;

                          if($statistic_struzka < $statistic_crushersl){
                            if($statistic_struzka < $statistic_services){
                              $percent_struzka = 'min';
                            } else { $percent_struzka = 'aver'; }
                          } else {
                            if($statistic_struzka < $statistic_services){
                              $percent_struzka = 'aver';
                            } else { $percent_struzka = 'max'; }
                          }

                          if($statistic_crushersl < $statistic_struzka){
                            if($statistic_crushersl < $statistic_services){
                              $percent_crushersl = 'min';
                            } else { $percent_crushersl = 'aver'; }
                          } else {
                            if($statistic_crushersl < $statistic_services){
                              $percent_crushersl = 'aver';
                            } else { $percent_crushersl = 'max'; }
                          }

                          if($statistic_services < $statistic_struzka){
                            if($statistic_services < $statistic_crushersl){
                              $percent_services = 'min';
                            } else { $percent_services = 'aver'; }
                          } else {
                            if($statistic_services < $statistic_crushersl){
                              $percent_services = 'aver';
                            } else { $percent_services = 'max'; }
                          }
                          
                          if($statistic_crushersl > 0){
                          echo '<td><span class="badge ';
                          if($percent_crushersl == 'max') { echo'success-color" style="font-size: 14px;">'; }
                          if($percent_crushersl == 'aver') { echo'primary-color" style="font-size: 12px;">'; }
                          if($percent_crushersl == 'min') { echo'info-color" style="font-size: 11px;">'; }
                          echo round($statistic_crushersl).'%</span></td>';
                          } else {
                          	echo '<td></td>';
                          }

						  if($statistic_struzka > 0){
                          echo '<td><span class="badge ';
                          if($percent_struzka == 'max') { echo'success-color" style="font-size: 14px;">'; }
                          if($percent_struzka == 'aver') { echo'primary-color" style="font-size: 12px;">'; }
                          if($percent_struzka == 'min') { echo'info-color" style="font-size: 11px;">'; }
                          echo round($statistic_struzka).'%</span></td>';
                          } else {
                          	echo '<td></td>';
                          }

                          if($statistic_services > 0){
                          	echo '<td><span class="badge ';
	                        if($percent_services == 'max') { echo'success-color" style="font-size: 14px;">'; }
	                        if($percent_services == 'aver') { echo'primary-color" style="font-size: 12px;">'; }
	                        if($percent_services == 'min') { echo'info-color" style="font-size: 11px;">'; }
                        	echo round($statistic_services).'%</span></td>';
                          } else {
                          	echo '<td></td>';
                          }
                          
                          
                        } else {
                          echo '<td class="text-center" colspan="3">Нет данных</td>';
                        }

						// Связь с пользователем:
						if($user['vk_id'] != ''){
							if($user['phone'] == ''){
								if($user['mail'] == ''){
									if($user['vk_id'] == 0){
										echo '<td class="text-center" colspan="2">-</td>';
									} else {
										echo '<td class="text-center" colspan="2"><a target="_blank" href="https://vk.com/id'.$user['vk_id'].'">открыть ВК</a></td>';
									}
								} else {
									if($user['vk_id'] == 0){
										echo '<td>-</td>';
										echo '<td>'.$user['mail'].'</td>';
									} else {
										echo '<td><a target="_blank" href="https://vk.com/id'.$user['vk_id'].'">открыть ВК</a></td>';
										echo '<td>'.$user['mail'].'</td>';
									}
								}
							} else {
								if($user['mail'] == ''){
									echo '<td>'.$user['phone'].'</td>
									<td><a target="_blank" href="https://vk.com/id'.$user['vk_id'].'">открыть ВК</a></td>';
								} else {
									echo '<td>'.$user['phone'].'</td>
                        			<td>'.$user['mail'].'</td>';
								}
							}
						} else {
                          echo '
                          <td>'.$user['phone'].'</td>
                          <td>'.$user['mail'].'</td>
                        </tr>
                      ';
						}
                      }
                      ?>
                      </tbody>
                      <!-- Table body -->
                    </table>

                  </div>
                  <!-- Table -->
<?
 if ($colichestvo_page > 0) {
                  echo '<!-- Bottom Table UI -->
                  <div class="d-flex justify-content-between">

                    <!-- Name -->
                    <div class="select-wrapper mdb-select colorful-select dropdown-primary mt-2">
                    </div>

                    <!-- Pagination -->
                    <nav class="my-4">
                      <ul class="pagination pagination-circle pg-blue fontsize-small-color-black mb-0">';

                        
            if ($cur_page > 1) {
                $previous = $cur_page - 1;
                echo '<li class="page-item clearfix d-none d-md-block"><button class="page-link waves-effect waves-effect" onclick="go_to_page('.$previous.', \''.$display.'\')">Предыдущая</button></li>';
            } else {
                echo '<li class="page-item disabled clearfix d-none d-md-block"><button class="page-link waves-effect waves-effect">Предыдущая</button></li>';
            }
            
        
             #две назад
            if(($cur_page-2)>0) {
                $ptwoleft='<li class="page-item"><a class="page-link waves-effect waves-effect"  href="'.$my_location.($cur_page-2).'">'.($cur_page-2).'</a></li>';
                
            } else {	
                $ptwoleft=null;
            }
        
            #одна назад
            if(($cur_page-1)>0):
                $poneleft='<li class="page-item"><a class="page-link waves-effect waves-effect"  href="'.$my_location.($cur_page-1).'">'.($cur_page-1).'</a></li>';
                $ptemp=($cur_page-1);
              else:
                $poneleft=null;
                $ptemp=null;
              endif;
        
              #две вперед
            if(($cur_page+2)<=$colichestvo_page):
                $ptworight='<li class="page-item"><a class="page-link waves-effect waves-effect"  href="'.$my_location.($cur_page+2).'">'.($cur_page+2).'</a></li>';
              else:
                $ptworight=null;
              endif;
                      
              #одна вперед
              if(($cur_page+1)<=$colichestvo_page):
                $poneright='<li class="page-item"><a class="page-link waves-effect waves-effect"  href="'.$my_location.($cur_page+1).'">'.($cur_page+1).'</a></li>';
                $ptemp2=($cur_page+1);
              else:
                $poneright=null;
                $ptemp2=null;
              endif;	
        
              # в начало
            if($cur_page!=1 && $ptemp!=1 && $ptemp!=2):
                $prevp='<li class="page-item active"><a class="page-link waves-effect waves-effect" href="'.$my_location.'1"><i class="fas fa-angle-double-left"></i></a></li><li class="page-item"><span class="page-link">. . .</span></li>';
              else:
                $prevp=null;
              endif;   
                      
              #в конец (последняя)
              if($cur_page!=$colichestvo_page && $ptemp2!=($colichestvo_page-1) && $ptemp2!=$colichestvo_page):
                $nextp='<li class="page-item"><span class="page-link">. . .</span></li><li class="page-item"><a class="page-link waves-effect waves-effect" href="'.$my_location.$colichestvo_page.$colichestvo_page.'">'.$colichestvo_page.'</a>';
              else:
                $nextp=null;
              endif;
        
              print "".$prevp.$ptwoleft.$poneleft.'<li class="page-item active"><a class="page-link waves-effect waves-effect">'.$cur_page.'</a></li>'.$poneright.$ptworight.$nextp; 
        
            if ($cur_page == $colichestvo_page) {
                echo ' <li class="page-item disabled clearfix d-none d-md-block"><button class="page-link waves-effect waves-effect">Следующая</button></li>';
            } else {
                $next = $cur_page + 1;
                echo '<li class="page-item clearfix d-none d-md-block"><button class="page-link waves-effect waves-effect" onclick="go_to_page('.$next.', \''.$display.'\')">Следующая</button></li>';
            }
                      echo '</ul>
                    </nav>
                    <!-- Pagination -->

                  </div>
                  <!-- Bottom Table UI -->';
 }
 ?>

                </div>
                <!-- Panel content -->

              </div>
              <!-- First column -->
            </div>

<?
include '../../page_elements/foot.php';
?>