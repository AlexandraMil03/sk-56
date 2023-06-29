<?
/*##################################################################################################
# Описание действия скрипта: 
##################################################################################################*/
$page_title = "Стружкодробилки";
$page_keywords = "стружкодробилки, стружкодробилка, стружко дробильный комплекс, металлическая стружка, дробильное оборудование, разрывные машины, дробилки в оренбурге, разрывные машины, стружкодробилки орск, стружкодробилки оренбург, измельчитель стружки металлической, дробильные комплексы, стружкодробильные комплексы, ";
$page_description = "Современное оборудование для дробления металлической стружки. Многоуровневая система предупреждения поломок. Индивидуальный подход, с учетом производственных особенностей.";
$page_robots = "index,follow";
include '../../system_files/settings.php';
include '../../system_files/core.php';
include '../../page_elements/head.php';
?>
<section class="breadcrumbs-custom d-block d-sm-none">
    <div class="breadcrumbs-custom__aside pt-2 pb-2 bg-image context-dark" style="background-image:url(/images/system/shavingsfon.jpg)">
    </div>
</section>
<section class="et-hero-tabs" id="tab">
    <div class="breadcrumbs-custom__aside pt-2 pb-2 bg-image context-dark" style="background-image:url(/images/system/shavingsfon.jpg)">
        <div class="container">
            <h1 class="breadcrumbs-custom__title pt-4 pb-4 font-weight-bold">Стружкодробильные<br>комплексы</h1>
        </div>
    </div>
    <nav class="one">
        <style>
            body {
                font-family: montserrat, sans-serif;
            }

            a {
                text-decoration: none;
            }

            .et-hero-tabs-container {
                display: flex;
                flex-direction: row;
                position: absolute;
                width: 100%;
                height: 70px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                background: #242424;
                z-index: 10;
            }

            .et-hero-tabs-container--top {
                position: fixed;
                top: 0;
            }

            .et-hero-tabs i {
                display: none;
            }

            .et-hero-tab {
                display: flex;
                justify-content: center;
                align-items: center;
                flex: 1;
                color: #000;
                letter-spacing: 0.1rem;
                transition: all 0.5s ease;
                font-size: 0.8rem;
                text-decoration: none;
            }

            .et-hero-tab:hover {
                color: white;
                background: #787878;
                transition: all 0.5s ease;
            }

            @media (min-width: 800px) {

                .et-hero-tabs h1,
                .et-slide h1 {
                    font-size: 3rem;
                }

                .et-hero-tabs h3,
                .et-slide h3 {
                    font-size: 1rem;
                }

                .et-hero-tab {
                    font-size: 1.2rem;
                }
            }

            @media (max-width: 700px) {
                .et-hero-tabs {
                    width: 100%;
                }

                #tab2 .row {
                    margin: 30px 0;
                }

                .et-hero-tabs i {
                    display: block;
                }

                .et-hero-tabs .et-hero-tab span {
                    display: none;
                }
        </style>

        <div class="et-hero-tabs-container">
            <a class="et-hero-tab" href="#top" style="color:#b4c7e7;"><i class="fa-solid fa-exclamation"></i><span>Модельный ряд</span></a>
            <a class="et-hero-tab" href="#description-this-hammer" style="color:#b4c7e7"><i class="fa-solid fa-info"></i><span>Основная информация</span></a>
            <a class="et-hero-tab" href="#photo_drobilki" style="color:#b4c7e7"><i class="fa-sharp fa-light fa-camera"></i><span>Фотографии и видео</span></a>
            <a class="et-hero-tab" href="#advantages" style="color:#b4c7e7"><i class="fa-brands fa-product-hunt"></i><span>Преимущества</span></a>
            <span class="et-hero-tab-slider"></span>
        </div>
</section>
<script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {

        // When the user scrolls down 500px from the top of the document, show the button
        if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }

    }
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        window.scrollTo({
            top: 0
        });
    }

    class StickyNavigation {

        constructor() {
            this.currentId = null;
            this.currentTab = null;
            this.tabContainerHeight = 70;
            let self = this;
            $('.et-hero-tab').click(function() {
                self.onTabClick(event, $(this));
            });
            $(window).scroll(() => {
                this.onScroll();
            });
            $(window).resize(() => {
                this.onResize();
            });
        }

        onTabClick(event, element) {
            event.preventDefault();
            let scrollTop = $(element.attr('href')).offset().top - this.tabContainerHeight + 1;
            $('html, body').animate({
                scrollTop: scrollTop
            }, 600);
        }

        onScroll() {
            this.checkTabContainerPosition();
            this.findCurrentTabSelector();
        }

        onResize() {
            if (this.currentId) {
                this.setSliderCss();
            }
        }

        checkTabContainerPosition() {
            let offset = $('.et-hero-tabs').offset().top + $('.et-hero-tabs').height() - this.tabContainerHeight;
            if ($(window).scrollTop() > offset) {
                $('.et-hero-tabs-container').addClass('et-hero-tabs-container--top');
            } else {
                $('.et-hero-tabs-container').removeClass('et-hero-tabs-container--top');
            }
        }

        findCurrentTabSelector(element) {
            let newCurrentId;
            let newCurrentTab;
            let self = this;
            $('.et-hero-tab').each(function() {
                let id = $(this).attr('href');
                let offsetTop = $(id).offset().top - self.tabContainerHeight;
                let offsetBottom = $(id).offset().top + $(id).height() - self.tabContainerHeight;
                if ($(window).scrollTop() > offsetTop && $(window).scrollTop() < offsetBottom) {
                    newCurrentId = id;
                    newCurrentTab = $(this);
                }
            });
            if (this.currentId != newCurrentId || this.currentId === null) {
                this.currentId = newCurrentId;
                this.currentTab = newCurrentTab;
                this.setSliderCss();
            }
        }

        setSliderCss() {
            let width = 0;
            let left = 0;
            if (this.currentTab) {
                width = this.currentTab.css('width');
                left = this.currentTab.offset().left;
            }
            $('.et-hero-tab-slider').css('width', width);
            $('.et-hero-tab-slider').css('left', left);
        }

    }

    new StickyNavigation();
</script>

<div class="container-fluid pt-5 pb-5 section-list sm-pading-small">
    <div class="row justify-content-center all-text-blue">
        <div class="col-12 p-0" style="margin: 50px">
            <h2 class="font-weight-bold mb-5 pl-5 mt-5 pl-pr-sm-none" id="top" style="color:#b4c7e7!important; margin-left:30px">Модельный ряд</h2>
            <div class="col-12 p-0 m-0">
                <div class="swiper-container pt-5">
                    <div class="swiper-wrapper" id="swiper-the-lineup" style="margin-top:-240px;">
                        <div class="swiper-slide">
                            <div class="card p-2 ml-3 mr-3" style="background-color:#262626;border-radius:30px;width:100%;">
                                <div class="card-body pr-0">
                                    <div class="mb-3 ml-4 drob-card-titl">
                                        <h3 class="m-0 p-0 small-h-do-1366">СК-СДК-2-2</h3>
                                    </div>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Производительность 1-2 тонн в ч.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Мощность – 83 кВт.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Фракция на выходе – 5-100мм.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Ограничения - 0,35 м3</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Окупаемость: ~ 1 год</h5>
                                </div>
                                <div class="card-footer card-footer-drob p-0">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="m-0 pt-3 small-h-do-1366" style="color:#b4c7e7">Стоимость:</h5>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark-stile m-2 mt-2 mr-4" data-toggle="modal" data-target="#registration_invitation">Узнать стоимость</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card p-2 ml-3 mr-3" style="background-color:#262626;border-radius:30px;width:100%">
                                <div class="card-body pr-0">
                                    <div class="mb-3 ml-4 drob-card-titl">
                                        <h3 class="m-0 p-0 small-h-do-1366">СК-СДК-3-5</h3>
                                    </div>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Производительность 5 тонн в ч.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Мощность – 98 кВт.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Фракция на выходе – 5-100мм.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Ограничения - 0,35 м3</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Окупаемость: 142 дня </h5>
                                </div>
                                <div class="card-footer card-footer-drob p-0">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="m-0 pt-3 small-h-do-1366" style="color:#b4c7e7">Стоимость:</h5>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark-stile m-2 mt-2 mr-4" data-toggle="modal" data-target="#registration_invitation">Узнать стоимость</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card p-2 ml-3 mr-3" style="background-color:#262626;border-radius:30px;width:100%">
                                <div class="card-body pr-0">
                                    <div class="mb-3 ml-4 drob-card-titl">
                                        <h3 class="m-0 p-0 small-h-do-1366">СК-СДК-3-7</h3>
                                    </div>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Производительность 7 тонн в ч.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Мощность – 128 кВт.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Фракция на выходе – 5-100мм.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Ограничения - 0,35 м3</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Окупаемость: 101 день</h5>
                                </div>
                                <div class="card-footer card-footer-drob p-0">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="m-0 pt-3 small-h-do-1366" style="color:#b4c7e7">Стоимость:</h5>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark-stile m-2 mt-2 mr-4" data-toggle="modal" data-target="#registration_invitation">Узнать стоимость</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card p-2 ml-3 mr-3" style="background-color:#262626;border-radius:30px;width:100%">
                                <div class="card-body pr-0">
                                    <div class="mb-3 ml-4 drob-card-titl">
                                        <h3 class="m-0 p-0 small-h-do-1366">СК-СДК-4-10</h3>
                                    </div>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Производительность 10 тонн в ч.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Мощность – 143 кВт.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Фракция на выходе – 5-100мм.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Ограничения - 0,7 м3</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Окупаемость: 78 дней</h5>
                                </div>
                                <div class="card-footer card-footer-drob p-0">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="m-0 pt-3 small-h-do-1366" style="color:#b4c7e7">Стоимость:</h5>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark-stile m-2 mt-2 mr-4" data-toggle="modal" data-target="#registration_invitation">Узнать стоимость</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card p-2 ml-3 mr-3" style="background-color:#262626;border-radius:30px;width:100%">
                                <div class="card-body pr-0">
                                    <div class="mb-3 ml-4 drob-card-titl">
                                        <h3 class="m-0 p-0 small-h-do-1366">СК-СДК-4-12</h3>
                                    </div>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Производительность 12 тонн в ч.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Мощность – 158 кВт.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Фракция на выходе – 5-100мм.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Ограничения - 0,7 м3</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Окупаемость: 69 дней</h5>
                                </div>
                                <div class="card-footer card-footer-drob p-0">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="m-0 pt-3 small-h-do-1366" style="color:#b4c7e7">Стоимость:</h5>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark-stile m-2 mt-2 mr-4" data-toggle="modal" data-target="#registration_invitation">Узнать стоимость</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card p-2 ml-3 mr-3" style="background-color:#262626;border-radius:30px;width:100%">
                                <div class="card-body pr-0">
                                    <div class="mb-3 ml-4 drob-card-titl">
                                        <h3 class="m-0 p-0 small-h-do-1366">СК-СДК-6-15</h3>
                                    </div>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Производительность 15 тонн в ч.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Мощность – 173 кВт.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Фракция на выходе – 5-100мм.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Ограничения - 1,05 м3</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Окупаемость: 72 дня</h5>
                                </div>
                                <div class="card-footer card-footer-drob p-0">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="m-0 pt-3 small-h-do-1366" style="color:#b4c7e7">Стоимость:</h5>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark-stile m-2 mt-2 mr-4" data-toggle="modal" data-target="#registration_invitation">Узнать стоимость</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card p-2 ml-3 mr-3" style="background-color:#262626;border-radius:30px;width:100%">
                                <div class="card-body pr-0">
                                    <div class="mb-3 ml-4 drob-card-titl">
                                        <h3 class="m-0 p-0 small-h-do-1366">СК-СДК-6-17</h3>
                                    </div>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Производительность 17 тонн в ч.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Мощность – 200 кВт.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Фракция на выходе – 5-100мм.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Ограничения - 1,05 м3</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Окупаемость: 65 дней</h5>
                                </div>
                                <div class="card-footer card-footer-drob p-0">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="m-0 pt-3 small-h-do-1366" style="color:#b4c7e7">Стоимость:</h5>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark-stile m-2 mt-2 mr-4" data-toggle="modal" data-target="#registration_invitation">Узнать стоимость</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card p-2 ml-3 mr-3" style="background-color:#262626;border-radius:30px;width:100%">
                                <div class="card-body pr-0">
                                    <div class="mb-3 ml-4 drob-card-titl">
                                        <h3 class="m-0 p-0 small-h-do-1366">СК-СДК-8-20</h3>
                                    </div>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Производительность 20 тонн в ч.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Мощность – 238 кВт.</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Фракция на выходе – 5-100мм.</h5>
                                    <h5 class="m-0 pb-3  small-h-do-1366" style="color:#b4c7e7">Ограничения - 1,4 м3</h5>
                                    <h5 class="m-0 pb-3 small-h-do-1366" style="color:#b4c7e7">Окупаемость: 63 дня</h5>
                                </div>
                                <div class="card-footer card-footer-drob p-0">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="m-0 pt-3 small-h-do-1366" style="color:#b4c7e7">Стоимость:</h5>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-dark-stile m-2 mt-2 mr-4" data-toggle="modal" data-target="#registration_invitation">Узнать стоимость</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next swiper-arrow-content"></div>
                    <div class="swiper-button-prev swiper-arrow-content"></div>
                    <p class="text-justify p_text">Стружкодробильные комплексы работают в автоматическом режиме, по запрограммированной логике, при необходимости оборудование можно перевести на ручной режим работы, автоматика в данном случае отслеживает работу оператора, предохраняет его от ошибок. Оборудование поставляется комплектным для выполнения основных технологических операций по дроблению стружки и обслуживанию без установки дополнительного оборудования.</p>
                    <script>
                        var swiper = new Swiper(".swiper-container", {
                            direction: "horizontal",
                            nextButton: ".swiper-button-next",
                            prevButton: ".swiper-button-prev",
                            mousewheelControl: !1,
                            slidesPerView: 3,
                            spaceBetween: 30,
                            freeMode: !0,
                            followFinger: !0,
                            loop: !0,
                            breakpoints: {
                                966: {
                                    slidesPerView: 1,
                                    spaceBetween: 40
                                },
                                1024: {
                                    slidesPerView: 2,
                                    spaceBetween: 40
                                },
                                1367: {
                                    slidesPerView: 3,
                                    spaceBetween: 40
                                }
                            }
                        })
                    </script>
                    <div class="col-12 col-md-8 text-lg-right-sm-center"><button onclick='GoToPage("/nalichie")' type="button" class="btn btn-lg btn-blue-stile m-2 mt-5">Оборудование в наличии</button> <button data-toggle="modal" data-target="#table_sravn_modal" type="button" class="btn btn-lg btn-blue-stile m-2 mt-5">Посмотреть сравнение</button></div>
                </div>
                <div class="col-12 col-md-10 mb-3 text-left">
                    <h1 class="d-none d-sm-block font-weight-bold mb-2 main-title two-tiers reduce-large-heading" style="color:#b4c7e7!important;margin-top:-200px;margin-left:250px">Стружкодробильные<br>комплексы</h1>
                    <div class="notice info d-flex d-none-do-668 mb-1" style="border-radius:8px;width:540px;margin-left:250px">
                        <p class="mt-2 h4 font-weight-bold" style="color: #b4c7e7!important;"><a target="_blank" style="color: #b4c7e7!important;" href="/nalichie">Стружкодробилки есть в наличии!</a></p>
                    </div>
                    <div class="notice info d-flex d-none-do-668 mb-1" style="border-radius:8px;width:540px;margin-left:250px">
                        <p class="mt-2 h4 font-weight-bold"><a target="_blank" style="color: #b4c7e7!important;" href="http://sy-k56ru/database/files_other/2022-06-21%20%D0%9F%D0%B0%D1%82%D0%B5%D0%BD%D1%82%20%E2%84%96%202774530.pdf">Патент на продукцию</a></p>
                    </div>
                    <div class="notice info d-flex d-none-do-668 mb-1" style="border-radius:8px;width:540px;margin-left:250px">
                        <p class="mt-2" style="color:#7b7b7b">Зарегистрируйтесь, чтобы разблокировать цены</p><button data-toggle="modal" data-target="#registration_invitation" type="button" class="btn btn-sm btn-primary m-0 ml-3">Регистрация</button>
                    </div>
                    <img src="images/system/template_img/20210701_090134.png" style="width:50%;margin-top:-400px; margin-left: 1100px;">
                </div><img class="side-pieces drob-ots d-none-do-1366" src="images/system/hammer_shredders/triugol.png" style="left:0"> <img class="side-pieces drob-ots d-none-do-1366" src="images/system/hammer_shredders/triugol.png" style="right:0;transform:scale(-1,1)">
                <div class="col-12 mb-5 d-block d-sm-none">
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-2" style="width:100%;position:relative">
                        <div class="card bg-dark radius" onclick='window.location.href="#swiper-the-lineup"' style="width:30%; margin-top:-370px">
                            <div class="card-body text-center">Модели</div>
                        </div>
                        <div class="card bg-dark radius" onclick='window.location.href="#photo_drobilki"' style="width:30%; margin-top:-370px">
                            <div class="card-body text-center">Фото</div>
                        </div>
                        <div class="card bg-dark radius" onclick='window.location.href="#video_drobilki"' style="width:30%; margin-top:-370px">
                            <div class="card-body text-center">Видео</div>
                        </div>
                    </div>
                    <div class="notice info d-flex mb-1" style="border-radius:8px;width:92%">
                        <p class="mt-2" style="color:#7b7b7b;">Разблокировать цены</p><button data-toggle="modal" data-target="#registration_invitation" type="button" class="btn btn-sm btn-primary m-0 ml-3">Регистрация</button>
                    </div>
                </div>

                <!-- 


        <div class="container-fluid d-flex justify-content-center">
            <div class="row  m-3">
                <div class="col-12">
                    <div class="card">
                        <div class="row p-4">
                            <div class="col-12 col-lg-4">
                                <img src="../images/system/drobilka_nalichie.png" class="card-img-top" alt="...">
                            </div>
                            <div class="col-12 col-lg-8">
                                <h3 class="pb-3">Стружкодробильный комплекс СК-СДК-2-7</h3>
                                <p class="p_text pb-3"> Стружкодробительная система представляет собой систему, состоящую из конвейера, валковых и молотковых стружкодробилок. Двойное дробление в валковой дробилке, затем в молотковой необходимо для получения однородной фракции стружки. После дробления стружки в валковой дробилке отдельные фрагменты достигают 100-150 мм в длину, после прохождения через вторую – молотковую дробилку, стружка измельчается до фракции размером 20-50 мм</p>
                                <button type="button" class="btn btn-lg" style="background-color: #000; color:aliceblue;" data-toggle="modal" data-target="#strushkodrobilka_new">Оставить заявку</button>
                                <a type="button" class="btn btn-lg" style="background-color: #000; color:aliceblue;" href="/feedback">Контакты</a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

                <div class="col-12">
                    <div class="container d-flex align-items-center justify-content-between">
                        <div class="row justify-content-center box-shadow m-5" style="background-color: #25282b; border-radius:15px">
                            <div class="col-12 col-lg-4"><a href="/nalichie">
                                    <img src="../images/system/struzhkodrobilka.png" class="card-img-top" alt="...">
                            </div>
                            <div class="col-12 col-lg-8 d-flex align-items-center justify-content-between">
                                <h3 class="pb-3 mt-3 justify-content-center" style="color: #b4c7e7;">Комплексы в наличии</h3>
                                <p class="p_text pb-2 mt-2" style="color: #b4c7e7; font-size:20px!important"> Приобрести уже готовый комплекс со склада</p>
                                <div class="conteiner mt-2">
                                    <div class="row">
                                        <h4 class="mt-0 col p-3 justify-content-center" style="color: #b4c7e7;">+7 (3532) 43-77-02</h4> <button type="button" class="btn btn-lg col" style="background-color:#2879fe; color:aliceblue; padding: 1rem 1.4rem;">Позвонить</button>
                                    </div>
                                </div>
                                <!-- <a type="button" class="btn btn-lg" style="background-color: #000; color:aliceblue;" href="/feedback">Контакты</a> -->
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="container">
                        <div class="row mt-5">
                            <div class="col-12 p-0">
                                <h2 class="font-weight-bold mb-5 pl-5 mt-5 pl-pr-sm-none" id="description-this-hammer" style="color:#b4c7e7!important;">Основная информация.</h2>
                                <p class="text-justify p_text" style="color:#b4c7e7!important;">Наша фирма занимается проектированием и изготовлением оборудования для переработки металлической стружки. Дробленая стружка может быть использована в производстве ферросплавов или направлена на брикетирование. Существующий технологический процесс переработки стружки конструктивно представляет собой систему, состоящую из конвейера, валковых и молотковых стружкодробилок. Двойное дробление в валковой дробилке, затем в молотковой необходимо для получения однородной фракции стружки. После дробления стружки в валковой дробилке отдельные фрагменты достигают 100-150 мм в длину, после прохождения через вторую, молотковую дробилку, стружка измельчается до фракции размером 20-50 мм.</p>
                                <p class="text-justify p_text" style="color:#b4c7e7!important;">Комплекс поставляется комплектным, на раме, готовым к монтажу и вводу в эксплуатацию. Состоит из следующих основных частей:</p>
                                <ul class="list-marked list_inset p_text" style="padding-left:20px">
                                    <li><i><a class="a_color" href="/explosive_machines.html" style="color:#b4c7e7">разрывная машина;</a></i></li>
                                    <li><i><a class="a_color" href="/hammer_shredders.html" style="color:#b4c7e7">молотковая дробилка;</a></i></li>
                                    <li><i style="color:#b4c7e7">конвейера ленточные;</i></li>
                                    <li><i style="color:#b4c7e7">силовой шкаф и шкаф управления комплексом.</i></li>
                                </ul>
                                <p class="text-justify p_text" style="color:#b4c7e7!important;">Стружкодробильные комплексы работают в автоматическом режиме, по запрограммированной логике, при необходимости оборудование можно перевести на ручной режим работы, автоматика в данном случае отслеживает работу оператора, предохраняет его от ошибок. Оборудование поставляется комплектным для выполнения основных технологических операций по дроблению стружки и обслуживанию без установки дополнительного оборудования.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8 text-lg-right-sm-center"><button onclick='GoToPage("/nalichie")' type="button" class="btn btn-lg btn-blue-stile m-2 mt-5">Оборудование в наличии</button> <button data-toggle="modal" data-target="#table_sravn_modal" type="button" class="btn btn-lg btn-blue-stile m-2 mt-5">Посмотреть сравнение</button></div>
        <div class="col-12">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="font-weight-bold mb-5 mt-5 pt-5 pl-5 secondary-main-indent pl-pr-sm-none" id="photo_drobilki">Фотографии и видео</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="swiper-container_two pt-5">
                <div class="swiper-wrapper swiper-wrapper-gallery"><img class="swiper-slide minimized swiper-slide-content" style="border-radius: 15px;" src="../images/system/crushing_plants/raehtjrts.jpg" width="1024" height="635" alt="нажмите для увеличения"> <img class="swiper-slide minimized swiper-slide-content" style="border-radius: 15px;" src="../images/system/crushing_plants/rehtneh.jpg" width="1024" height="768" alt="нажмите для увеличения"> <img class="swiper-slide minimized swiper-slide-content" style="border-radius: 15px;" src="../images/system/crushing_plants/h02UyYqZa_c.jpg" width="768" height="1024" alt="нажмите для увеличения"> <img class="swiper-slide minimized swiper-slide-content" style="border-radius: 15px;" src="../images/system/crushing_plants/3.jpg" width="1024" height="768" alt="нажмите для увеличения"> <img class="swiper-slide minimized swiper-slide-content" style="border-radius: 15px;" src="../images/system/crushing_plants/KNeWLCx7dS4.jpg" width="1024" height="768" alt="нажмите для увеличения"> <img class="swiper-slide minimized swiper-slide-content" style="border-radius: 15px;" src="../images/system/crushing_plants/eabtnte.jpg" width="1024" height="768" alt="нажмите для увеличения"> <img class="swiper-slide minimized swiper-slide-content" style="border-radius: 15px;" src="../images/system/crushing_plants/5.jpg" width="1024" height="768" alt="нажмите для увеличения"> <img class="swiper-slide minimized swiper-slide-content" style="border-radius: 15px;" src="../images/system/crushing_plants/1.jpg" width="768" height="1024" alt="нажмите для увеличения"> <img class="swiper-slide minimized swiper-slide-content" style="border-radius: 15px;" src="../images/system/crushing_plants/sagshnr.jpg" width="1024" height="768" alt="нажмите для увеличения"> <img class="swiper-slide minimized swiper-slide-content" style="border-radius: 15px;" src="../images/system/crushing_plants/kfyuty.jpg" width="1280" height="720" alt="нажмите для увеличения"> <img class="swiper-slide minimized swiper-slide-content" style="border-radius: 15px;" src="../images/system/crushing_plants/2.jpg" width="1024" height="768" alt="нажмите для увеличения"> <img class="swiper-slide minimized swiper-slide-content" style="border-radius: 15px;" src="../images/system/crushing_plants/aberbrW.jpg" width="768" height="1024" alt="нажмите для увеличения"> <img class="swiper-slide minimized swiper-slide-content" style="border-radius: 15px;" src="../images/system/crushing_plants/4.jpg" width="1024" height="768" alt="нажмите для увеличения"> <img class="swiper-slide minimized swiper-slide-content" style="border-radius: 15px;" src="../images/system/crushing_plants/tjryksr.jpg" width="1024" height="768" alt="нажмите для увеличения"> <img class="swiper-slide minimized swiper-slide-content" style="border-radius: 15px;" src="../images/system/crushing_plants/aerbauibr.jpg" width="1024" height="635" alt="нажмите для увеличения"></div>
                <div class="swiper-button-next swiper-arrow-content"></div>
                <div class="swiper-button-prev swiper-arrow-content"></div>
            </div>
            <script>
                var appendNumber = 4,
                    prependNumber = 1,
                    swiper_two = new Swiper(".swiper-container_two", {
                        direction: "horizontal",
                        nextButton: ".swiper-button-next",
                        prevButton: ".swiper-button-prev",
                        mousewheelControl: !1,
                        slidesPerView: "auto",
                        spaceBetween: 30,
                        freeMode: !0,
                        followFinger: !0,
                        loop: !0
                    })
            </script>
        </div>
        <div class="col-12">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="font-weight-bold mb-5 mt-5 pt-5 pl-5 secondary-main-indent pl-pr-sm-none" id="video_drobilki">Изучите видеоматериал</h2>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-4 text-center wow fadeInLeft"><iframe src="https://www.youtube.com/embed/aw9OzsoUmjw" class="yutobe_conteiner align-center" allowfullscreen></iframe></div>
        <div class="col-lg-4 text-center wow fadeInLeft"><iframe src="https://www.youtube.com/embed/KPwtPfUFtMA" class="yutobe_conteiner align-center" allowfullscreen></iframe></div>
        <div class="col-lg-3 d-flex align-items-center justify-content-between"><a href="https://www.youtube.com/channel/UCykW-U-9km5hjECYW7qOO-w" class="align-center" target="_blank"><img class="center align-center" src="images/system/template_img/yutube.png" height="100" width="280" alt="yutube.png"></a></div>
        <style>
            .str-edge-dr {
                color: #3f3636;
                font-size: 55px
            }
        </style>
        <div class="col-12">
            <div class="container">
                <div class="row mb-5">
                    <h2 class="font-weight-bold mb-5 mt-5 pt-5 pl-5 secondary-main-indent pl-pr-sm-none" id="advantages" style="color:#b4c7e7">Преимущества нашего оборудования:</h2>
                    <div class="d-none d-md-block col-md-2 col-lg-2 text-center"><span class="fa-retweet str-edge-dr" aria-hidden="true"></span></div>
                    <div class="col-12 col-md-10 col-lg-10 pl-pr-sm-none">
                        <h3 class="pb-2 mt-4" style="color:#b4c7e7">Постоянная модернизация</h3>
                    </div>
                    <div class="col-12 pl-pr-sm-none">
                        <p class="text-justify p_text" style="color:#b4c7e7">Благодаря проделанной работе, нам удалось использовать сильные стороны одних и обойти минусы других. <b>Нейронная сеть</b> для самообучения наиболее оптимальной логике работы, с учетом особенностей сырья. Возможность дополнительной комплектации комплекса системой удаленного мониторинга, облачным сервисом, весовым терминалом для отслеживания простоев и переработки. Конструкторский отдел готов разработать и внедрить инструменты для решения всех задач, связанных с вопросом переработки, автоматизации, а так же организации труда на заводах, цехах и участках по сбору и переработке стружки металлической.</p>
                    </div>
                    <div class="d-none d-md-block col-md-2 col-lg-2 text-center mt-4"><span class="box-chloe__icon fa-rocket str-edge-dr" aria-hidden="true"></span></div>
                    <div class="col-12 col-md-10 col-lg-10 pl-pr-sm-none">
                        <h3 class="pb-2 mt-5" style="color:#b4c7e7">Скорость работы</h3>
                    </div>
                    <div class="col-12 pl-pr-sm-none">
                        <p class="text-justify p_text" style="color:#b4c7e7">Простота в обслуживании и эксплуатации. Интуитивно понятный интерфейс. Высокая скорость выполнения операций дробления стружки. Все настроено для обеспечения непрерывного и качественного дробления стружки.</p>
                    </div>
                    <div class="d-none d-md-block col-md-2 col-lg-2 text-center mt-4"><span class="box-chloe__icon fa-cogs str-edge-dr" aria-hidden="true"></span></div>
                    <div class="col-12 col-md-10 col-lg-10 pl-pr-sm-none">
                        <h3 class="pb-2 mt-5" style="color:#b4c7e7">Надёжность</h3>
                    </div>
                    <div class="col-12 pl-pr-sm-none">
                        <p class="text-justify p_text" style="color:#b4c7e7">Благодаря многоуровневой системе защиты, контролируется каждый этап работы. Отслеживаются и предупреждаются все попытки вывода оборудования из строя, как случайные так и преднамеренные. Оборудование соответствует <b>ДР ТР ТС</b>.</p>
                    </div>
                    <div class="col-12"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="parallax-container bg-gray-darker" data-parallax-img="../images/system/template_img/angar.jpg">
    <div class="parallax-content">
        <div class="section-lg text-center">
            <div class="container">
                <h2>Некоторые факты</h2>
                <p class="text-style-1">Реализованное оборудование для переработки металлической стружки<br>ООО &laquo;Стальная компания&raquo;</p>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-none d-lg-block d-sm-block fact_drobil"></div>
                        <div class="d-sm-none d-lg-none" style="height:180px"></div>
                    </div>
                </div>
                <div class="row row-30 offset-top-1" style="margin-top:-150px">
                    <div class="col-sm-6 col-md-4">
                        <article class="box-counter">
                            <h4 class="font-weight-bold" style="color:#2879fe">Реализовано</h4>
                            <div class="box-counter__divider"></div>
                            <div class="box-counter__main mt-0">
                                <div class="counter">25</div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <article class="box-counter">
                            <h4 class="font-weight-bold" style="color:#2879fe">Клиенты РФ</h4>
                            <div class="box-counter__divider"></div>
                            <div class="box-counter__main mt-0">
                                <div class="counter">24</div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <article class="box-counter">
                            <h4 class="font-weight-bold" style="color:#2879fe">Клиенты СНГ</h4>
                            <div class="box-counter__divider"></div>
                            <div class="box-counter__main mt-0">
                                <div class="counter">1</div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="table_sravn_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" style="padding-top:40px">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex card-header card-header-primary text-center wow_modal_heder" style="width:100%">
                    <h4 class="card-title" style="color:#fff;font-weight:700">Сравнение</h4><button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-times" aria-hidden="true"></span></button>
                </div>
            </div>
            <div class="modal-body">
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<?
include '../../page_elements/foot.php';
?>