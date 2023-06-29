<?
/*##################################################################################################
# Описание действия скрипта: 
##################################################################################################*/
$page_title = "Брикетировочные пресса";
$page_keywords = "Брикетировочные пресса, брикеты, пресс";
$page_description = "Сотрудники нашей компании разработали модельный ряд брикетировочных прессов, превосходящие по ряду параметров современные аналоги. Готовим серийный выпуск нового оборудования.";
$page_robots = "index,follow";
include '../../system_files/settings.php';
include '../../system_files/core.php';
include '../../page_elements/head.php';
?>
<section class="breadcrumbs-custom">
    <div class="breadcrumbs-custom__aside bg-image context-dark" style="background-image:url(images/system/fon-all-page.jpg)">
        <div class="container">
            <h2 class="breadcrumbs-custom__title">Брикетировочные пресса</h2>
        </div>
    </div>
    <div class="d-none d-lg-block d-sm-block breadcrumbs-custom__main bg-gray-light">
        <div class="container">
            <ul class="breadcrumbs-custom__path">
                <li><a href="/">Главная</a></li>
                <li class="active">Брикетировочные пресса</li>
                <li><a href="/ferroalloy_briquetting">Услуги брикетирования стружки</a></li>
                <li><a href="/briquette_production">Производство и реализация брикетов</a></li>
            </ul>
        </div>
    </div>
</section>





<section class="section">

    <div class="container-fluid m-0 p-0">
        <div class="row bg-white  m-0 p-0 pt-5 pb-5">
            <div class="col-12 col-lg-4 d-flex align-items-center justify-content-between">
                <script>
                    function change_INTARFACE(activ) {
                        console.log('Яздесь:', activ)
                        switch (activ) {
                            case 1: {
                                $('#two_text').html(`Вертикальный гидравлический брикетировочный пресс vY83-630 используется в цехах переработки стружки чёрных и цветных металлов машиностроительных предприятий, металлургических заводах цветного и черного литья, а так же ферросплавных производств. `)
                                $('#button_block').html('<button type="button" class="btn btn-dark btn_pereh hide_or_show_one_two" onclick="change_INTARFACE(2)">Узнать больше</button>')
                            };
                            break;
                            case 2: {
                                $('#two_text').html(`
              <ul>
                <li> • Надежная конструкция </li>
                <li> • Ремонтопригодность узлов </li>
                <li> • Простота в эксплуатации </li>
                <li> • Высокая производительность </li>
              </ul>`)
                                $('#button_block').html(`<button type="button" class="btn btn-dark btn_pereh hide_or_show_two_one" onclick="change_INTARFACE(1)">&lt</button>
            <button type="button" class="btn btn-dark btn_pereh" onclick="change_INTARFACE(3)"> &gt</button>`)
                            };
                            break;
                            case 3: {
                                console.log('3')
                                $('#two_text').html(`
              <ul>
                <li>• Гидравлический привод, стабильная работа, отсутствие вибрации, безопасность и надежность </li>
                <li>• Требуется простой фундамент оборудования</li>
                <li>• Используя управление PLC, можно выбрать ручной или автоматический режим </li>
              </ul>`)
                                $('#button_block').html(`<button type="button" class="btn btn-dark btn_pereh hide_or_show_two_one" onclick="change_INTARFACE(2)">Назад</button>`)
                            };
                            break
                            default: {
                                console.log('default')
                            };
                            break;
                        }
                    }
                </script>

                <div style="width: 100%">
                    <h2>Пресс в наличии!</h2>
                    <div class="pl-2 pr-2" style="height: 220px; width: 100%; overflow: auto;">
                        <div class="mt-3 p_text" style="text-indent: 0px;" id="two_text">Вертикальный гидравлический
                            брикетировочный пресс vY83-630 используется в цехах переработки стружки чёрных и цветных металлов
                            машиностроительных предприятий, металлургических заводах цветного и черного литья, а так же ферросплавных
                            производств. </div>
                    </div>

                    <div class="ml-5 pl-4" id="button_block" style="width: 100%;">
                        <button type="button" class="btn btn-dark btn_pereh hide_or_show_one_two" onclick="change_INTARFACE(2)">Узнать
                            больше</button>
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-4">
                <img src="../images/system/template_img/v630.png">
            </div>
            <div class="col-12 col-lg-4 mt-5 pt-4 text-center">
                <table class="table table-hover pr-2">
                    <thead>
                        <tr>
                            <th>
                                <h4>Характеристики</h1>
                            </th>
                            <th>
                                <h5>Значения</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody style="font-size:initial">
                        <tr>
                            <td>Номинальное усилие</td>
                            <td>6300 (кН)</td>
                        </tr>
                        <tr>
                            <td>Размер брикета</td>
                            <td>Ø150x100-120 (мм)
                        </tr>
                        <tr>
                            <td>Производительность</td>
                            <td>20~30 (T)</td>
                        </tr>
                        <tr>
                            <td>Мощность</td>
                            <td>45 (кВт)</td>
                        </tr>
                    </tbody>

                </table>
                <div class="row justify-content-md-center justify-content-lg-start">
                    <div class="col-md-12 col-lg-12 text-center">
                        <a href="https://steelcom-jdh.ru/catalog/vY83/vY83-630" style="font-family: Gill Sans, Gill Sans MT, Calibri, sans-serif;position: absolute;font-size: 1.2em;text-transform: uppercase;padding: 7px 20px;left: 50%;width: 200px;margin-left: -100px;border-radius: 10px;color: white;text-shadow: -1px -1px 1px rgba(0,0,0,0.8);border: 5px solid transparent;border-bottom-color: rgba(0,0,0,0.35);background: #2879fe;cursor: pointer;outline: 0 !important;animation: pulse 2s infinite alternate;transition: background 0.4s, border 0.2s, margin 0.2s;">Описание</a>
                        <canvas id="myCanvas" width="20" height="30"></canvas>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <div class="container-fluid">
        <div class="row bg-white pt-5 pb-4">
            <div class="d-none d-lg-block d-sm-block col-lg-1"></div>
            <div class="col-12 col-lg-10 text-center">
                <h4 class="d-none d-lg-block d-sm-block font-weight-bold" style="text-indent:1.9em">Брикетирование металлической стружки. Основная информация.</h4>
                <h4 class="d-sm-none d-lg-none font-weight-bold text-center">Брикетирование металлической стружки. Основная информация.</h4>
                <p class="text-justify p_text">Гидравлический пресс предназначен для прессования стружки черных и цветных металлов в цилиндрические брикеты. Это помогает вам использовать металлоломы повторно. Хранение стружки в брикетах позволит сэкономить не только место складирования отходов, но и расходы на их транспортировку. Ещё одним положительным фактором использования брикетировочных прессов, является снижение потерь при плавке стружки.</p>
                <p class="text-justify p_text font-weight-bold">Применение данного оборудования на предприятии позволит:</p>
                <ul class="list-marked list_inset p_text briq-press-text">
                    <li><i><a class="a_color" href="/explosive_machines">снизить влажность брикетированной стружки;</a></i></li>
                    <li><i><a class="a_color" href="/hammer_shredders">извлечь из стружки смазочно-охлаждающую жидкость;</a></i></li>
                    <li><i>повысить стоимость брикетированной стружки;</i></li>
                    <li><i>уменьшить затраты по хранению и транспортировке, в следствие сокращения её объёма;</i></li>
                    <li><i>снизить угар стружки в брикетах при переплавке.</i></li>
                </ul>
                <p class="text-justify p_text font-weight-bold">Основные преимущества пресса:</p>
                <ul class="list-marked list_inset p_text briq-press-text">
                    <li><i><a class="a_color">надежная конструкция;</a></i></li>
                    <li><i><a class="a_color">ремонтопригодность узлов;</a></i></li>
                    <li><i>простота в эксплуатации.</i></li>
                </ul>
                <p class="text-justify p_text font-weight-bold">В комплект поставки входит:</p>
                <ul class="list-marked list_inset p_text briq-press-text">
                    <li><i><a class="a_color">брикетировочный пресс;</a></i></li>
                    <li><i><a class="a_color">подающий конвейер;</a></i></li>
                    <li><i>Пульт оператора.</i></li>
                </ul>
            </div>
            <div class="d-none d-lg-block d-sm-block col-lg-1"></div>
        </div>
    </div>
</section>
<section class="section section-sm bg-white">
    <div class="container">
        <div class="row justify-content-md-center justify-content-lg-start">
            <div class="col-md-12 col-lg-12 text-center">
                <a href="/feedback" style="font-family: Gill Sans, Gill Sans MT, Calibri, sans-serif;position: absolute;font-size: 1.2em;text-transform: uppercase;padding: 7px 20px;left: 50%;width: 200px;margin-left: -100px;border-radius: 10px;color: white;text-shadow: -1px -1px 1px rgba(0,0,0,0.8);border: 5px solid transparent;border-bottom-color: rgba(0,0,0,0.35);background: #2879fe;cursor: pointer;outline: 0 !important;animation: pulse 2s infinite alternate;transition: background 0.4s, border 0.2s, margin 0.2s;">Напишите нам</a>
                <canvas id="myCanvas" width="20" height="30"></canvas>
            </div>

        </div>
    </div>
</section>
<?
include '../../page_elements/foot.php';
?>