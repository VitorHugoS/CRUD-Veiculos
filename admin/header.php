<?php
require ("class/carregatodo.php");
if($_SESSION["autenticado"]!=1){
    header("location:../");
}
?>
<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">
    <title><?=$titulo['titulo']?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="bower_components/weather-icons/css/weather-icons.min.css" media="all">
    <link rel="stylesheet" href="bower_components/metrics-graphics/dist/metricsgraphics.css">
    <link rel="stylesheet" href="bower_components/chartist/dist/chartist.min.css">
    <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <link rel="stylesheet" href="assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="assets/css/main.min.css" media="all">
    <!--[if lte IE 9]>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.js"></script>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.addListener.js"></script>
    <![endif]-->
</head>

<body class=" sidebar_main_open sidebar_main_swipe">
    <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
                <a href="#" onclick="history.go(-1);" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>
            </nav>
        </div>
    </header>