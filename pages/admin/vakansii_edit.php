<?
/*##################################################################################################
# Описание действия скрипта: 
##################################################################################################*/
$page_title = "Создание раздела";
$page_keywords = "нет, ключевых, слов";
$page_description = "Добавление нового раздела на сайт";
$page_robots="noindex,nofollow";
include '../../system_files/settings.php';
include '../../system_files/core.php';
include '../../page_elements/head.php';
level_user(); #Доступ авторизированым.
level_admin(); #Доступ только администратору и доверенным модераторам
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-5 mb-5">
            <a href="/admin/vakansii-add" class="button button-block button-secondary button-ujarak button-zoom align-center" style="color: white; height: 70px; max-width: 400px;">
                <div style="color: white; padding-top: 10px;">Добавить вакансию</div>
            </a>
        </div>
    </div>
</div>


<section class="container mt-1">
    <div class="row justify-content-md-center">

        <div class="col-12 col-lg-8 mb-5">
            <h1 class="h3 text-center" style="padding-bottom: 30px;">Список вакансий</h1>
            <?

            $query_get_category = mysqli_query($sqli, "SELECT * FROM `vacancies` WHERE `status` = ''");
            if (mysqli_num_rows($query_get_category) > 0) {
                $counter = 0;
                while ($query = $query_get_category->fetch_assoc()) {
                    $counter++;
                    echo '
			<div class="card card-custom card-corporate" id="accordion1Heading' . $counter . '">
				<div class="card-heading">
					<div class="card-title">
                        <a class="collapsed font-weight-bold" role="button" data-toggle="collapse" data-parent="#accordion' . $counter . '" href="#accordion1Collapse' . $counter . '" aria-controls="accordion1Collapse' . $counter . '" aria-expanded="false">
                            ' . $query['title'] . ' ';
                    if ($query['salary']) {
                        echo '(Зарплата: ' . $query['salary'] . ').';
                    }
                    echo '<div class="card-arrow"></div>
                        </a>
					</div>
				</div>
				<div class="card-collapse collapse" id="accordion1Collapse' . $counter . '" role="tabpanel" aria-labelledby="accordion1Heading' . $counter . '" style="">
					<div class="card-body">

                        <p class="p_text" style="white-space: pre-wrap; text-indent: 0px;">' . $query['description'] . '</p>
                            <button class="button button-sm mt-3" onclick="delete_this_vakans(\'accordion1Heading' . $counter . '\', ' . $query['id'] . ')">Удалить</button>
					</div>
				</div>
			</div>

			<br>';
                }
            } else {
                echo '<h5 class="text-center">вакансий нет</h5>';
            }

            ?>

            <script>
                function delete_this_vakans(text, id) {
                    $('#' + text).remove();
                    $.ajax({
                        type: "POST",
                        url: "../../system_files/action/action_vakansii.php",
                        dataType: 'text',
                        data: {
                            id: id,
                            action: 'delete_vakans'
                        },
                        success: function(data) {
                            data = JSON.parse(data);
                            if (data['msg'] == 'success') {
                                console.log('Вакансия успешно удалена');
                            } else {
                                if (data['msg'] == 'error') {
                                    alert('Произошла ошибка');
                                }
                            }
                        }
                    }).done(function(result) {

                    });
                }
            </script>

        </div>
    </div>
</section>

<?
include '../../page_elements/foot.php';
?>