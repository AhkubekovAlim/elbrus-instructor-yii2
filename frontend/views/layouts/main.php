<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\widgets\Menu;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <?php $this->head() ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113697068-1"></script>


    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-113697068-1');
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics END -->
</head>
<body>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function () {
            try {
                w.yaCounter47591812 = new Ya.Metrika({
                    id: 47591812,
                    clickmap: true,
                    trackLinks: true,
                    accurateTrackBounce: true,
                    webvisor: true
                });
            } catch (e) {
            }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () {
                n.parentNode.insertBefore(s, n);
            };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/47591812" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->

<?php $this->beginBody() ?>

<div class="navbar-fixed" role="navigation">
    <!--menu-->
    <nav class="white">
        <div class="container nav-wrapper">
            <a href="/" class="black-text"><b>Эльбрус - Инструктор</b></a>
            <a href="tel:+79280829701" class="blue-text top-phone"><b>
                    +7&nbsp;928&nbsp;082&nbsp;97&nbsp;01&nbsp;</b></a>
            <a href="tel:+79280829701" class="top-phone-icon btn btn-floating blue pulse"><i class="material-icons">phone</i></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <?
            echo Menu::widget([
                    'activeCssClass'=>'active',
                    'activateItems'=> true, // todo
                    'options'=>['class'=>'right hide-on-med-and-down'],
                    'items' => [
                        ['label' => 'Инструктор', 'url' => ['/']],
                        ['label' => 'Экскурсии',
                            'template' => '<a href="{url}" class="dropdown-button" data-activates="dropdown1">{label}<i class="material-icons right">arrow_drop_down</i></a>',
                            'submenuTemplate' => "\n<ul class='dropdown-content' id='dropdown1'>\n{items}\n</ul>\n",
                            'url' => ['#'],
                            'items' => [
                                ['label' => 'Голубые Озера', 'url' => ['/ehkskursiya/golubye-ozera']],
                                ['label' => 'Приэльбрусье', 'url' => ['/ehkskursiya']],
                                ['label' => 'Чегемские водопады', 'url' => ['/ehkskursiya/chegemskie_vodopady']],
                                ['label' => 'Хабазские водопады', 'url' => ['/ehkskursiya/habazskie-vodopady']],
                                ['label' => 'Джилы су', 'url' => ['/ehkskursiya/dzhyly-suu']],
                                ['label' => 'Эльбрус', 'url' => ['/ehkskursiya/priehlbruse']],
                            ]
                        ],
                        ['label' => 'Походы/Трекинг', 'url' => ['/tracking']],
                        ['label' => 'Такси', 'url' => ['/taxi']],
                        ['label' => 'Гостиница', 'url' => ['/hotel']],
                        ['label' => 'Цены', 'url' => ['/prices']],

                    ],
                ]
            );
            ?>
        </div>
    </nav>
</div>

<!--mobil-menu-->
<?
echo Menu::widget([
        'activeCssClass'=>'active',
        //'activateItems'=> true, // todo
        'options'=>['class'=>'side-nav', 'id' => 'mobile-demo'],
        'items' => [
            ['label' => 'Инструктор', 'url' => ['/']],
            ['label' => 'Экскурсии',
                'template' => '<a href="{url}" class="dropdown-button" data-activates="mobile-dropdown1">{label}<i class="material-icons right">arrow_drop_down</i></a>',
                'submenuTemplate' => "\n<ul class='dropdown-content' id='mobile-dropdown1'>\n{items}\n</ul>\n",
                'url' => ['#'],
                'items' => [
                    ['label' => 'Голубые Озера', 'url' => ['/ehkskursiya/golubye-ozera']],
                    ['label' => 'Приэльбрусье', 'url' => ['/ehkskursiya']],
                    ['label' => 'Чегемские водопады', 'url' => ['/ehkskursiya/chegemskie_vodopady']],
                    ['label' => 'Хабазские водопады', 'url' => ['/ehkskursiya/habazskie-vodopady']],
                    ['label' => 'Джилы су', 'url' => ['/ehkskursiya/dzhyly-suu']],
                    ['label' => 'Эльбрус', 'url' => ['/ehkskursiya/priehlbruse']],
                ]
            ],
            ['label' => 'Походы/Трекинг', 'url' => ['/tracking']],
            ['label' => 'Такси', 'url' => ['/taxi']],
            ['label' => 'Гостиница', 'url' => ['/hotel']],
            ['label' => 'Цены', 'url' => ['/prices']],

        ],
    ]
);
?>

<?= $content ?>

<footer class="page-footer grey darken-2">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text"><a href="/"><b>Эльбрус - Инструктор</b></a></h5>
                <p class="grey-text text-lighten-4">
                    Инструктор по горным лыжам и сноуборду <br>
                    Экскурсии по живописным уголкам Кабардино-Балкарии<br>
                    Походы по Приэльбрусью.
                    Услуги гида, помощь с размещением.<br>
                    Такси Минводы - Приэльбрусье<br>
                    Контакты:
                    <a href="tel:+79280829701" class="phone">+7&nbsp;928&nbsp;082&nbsp;97&nbsp;01&nbsp;(Эди)</a>,
                    <a href="tel:+79280848238"
                       class="phone">+7&nbsp;928&nbsp;084&nbsp;82&nbsp;38&nbsp;(Светлана)</a><br>
                    WhatsUpp: <a href="https://api.whatsapp.com/send?phone=79280848238" class="phone">+7&nbsp;928&nbsp;084&nbsp;82&nbsp;38&nbsp;(Светлана)</a>
                    <br>
                    <a class="white-text" href="mailto:akhmatova-85@mail.ru" target="_blank">
                        Email: <b>akhmatova-85@mail.ru</b></a>
                    <br>
                    <span class="white-text">Instagram: </span>
                    <a class="white-text" href="https://www.instagram.com/instruktorelbr/" target="_blank">
                        <b>instruktorelbr</b>
                    </a>
                    <span class="white-text">или </span>
                    <a class="white-text" href="https://www.instagram.com/svetlana_ahmatova_chabdarova/" target="_blank">
                        <b>svetlana_ahmatova_chabdarova</b>
                    </a>
                    <br>КБР, Село Эльбрус, ул. Лесная, д. 5
                </p>


            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Услуги</h5>
                <?
                echo Menu::widget([
                        'activeCssClass'=>'active',
                        'linkTemplate' => '<a href="{url}" class="white-text"><span>{label}</span></a>',
                        //'activateItems'=> true, // todo
                        'items' => [
                            ['label' => 'Инструктор', 'url' => ['/']],
                            ['label' => 'Походы/Трекинг', 'url' => ['/tracking']],
                            ['label' => 'Такси', 'url' => ['/taxi']],
                            ['label' => 'Гостиница', 'url' => ['/hotel']],
                            ['label' => 'Цены', 'url' => ['/prices']],
                        ],
                    ]
                );
                ?>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Экскурсии</h5>
                <?
                echo Menu::widget([
                        'activeCssClass'=>'active',
                        'linkTemplate' => '<a href="{url}" class="white-text"><span>{label}</span></a>',
                        //'activateItems'=> true, // todo
                        'items' => [
                            ['label' => 'Голубые Озера', 'url' => ['/ehkskursiya/golubye-ozera']],
                            ['label' => 'Приэльбрусье', 'url' => ['/ehkskursiya']],
                            ['label' => 'Чегемские водопады', 'url' => ['/ehkskursiya/chegemskie_vodopady']],
                            ['label' => 'Хабазские водопады', 'url' => ['/ehkskursiya/habazskie-vodopady']],
                            ['label' => 'Джилы су', 'url' => ['/ehkskursiya/dzhyly-suu']],
                            ['label' => 'Эльбрус', 'url' => ['/ehkskursiya/priehlbruse']],
                        ]
                    ]
                );
                ?>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
        </div>
    </div>
</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
