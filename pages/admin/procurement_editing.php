<?
$page_title = "Все заявки";
$page_keywords = "заявки";
$page_description = "Все заявки";
$page_robots = "noindex,nofollow";
include '../../system_files/settings.php';
include '../../system_files/core.php';
include '../../page_elements/head.php';
level_user(); #Доступ авторизированым.
level_admin(); #Достоп только админу.
?>

<h1 class="h2 p-3 text-right">Закупки, администрирование.</h1>
<div class="container mt-5 mb-5 text-center">
    <div class="row">
        <div class="col-12 col-lg-4 text-left">
            <div class="dark-menu">
                <h3>Меню</h3>
                <ul>
                    <li class="mb-3">
                        <a class="h5 text-white" href="/admin/add-new-section">Создать категорию</a>
                    </li>
                    <li class="mb-3">
                        <a class="h5 text-white" href="/admin/add-new-category">Создать подкатегорию</a>
                    </li>
                    <li>
                        <a class="h5 text-white" href="/admin/add-new-zakupka">Создать предложение</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
    .dark-menu {
        background-color: #12101a;
        padding: 55px;
        display: flex;
        flex-direction: column;
        display: inline-flex;
        border-radius: 15px;
        margin-top: 10px;
    }

    .dark-menu h3 {
        margin-bottom: 35px;
        font-size: 22px;
        font-weight: bold;
        color: #ffffff;
    }

    .dark-menu ul {
        display: flex;
        flex-direction: column;
        list-style: none;

        li {
            &+li {
                margin-top: 30px;
            }

            a {
                text-decoration: none;
                color: white;
                font-size: 18px;
                font-weight: 500;

                &:hover {
                    opacity: 0.7;
                }
            }
        }
    }


    @media screen and (max-width: 600px) {
        .menu {
            grid-template-columns: 1fr;
            grid-row-gap: 50px;
        }
    }
</style>

<?
include '../../page_elements/foot.php';
?>