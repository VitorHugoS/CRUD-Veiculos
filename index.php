<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="/admin/assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="admin/assets/img/favicon-32x32.png" sizes="32x32">

    <title>Venture Fiat</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

    <!-- uikit -->
    <link rel="stylesheet" href="admin/bower_components/uikit/css/uikit.almost-flat.min.css"/>

    <!-- altair admin login page -->
    <link rel="stylesheet" href="admin/assets/css/login_page.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>
<body class="login_page">

    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <div class="user_avatar"></div>
                </div>
                <form id="login" method="post" action="">
                    <div class="uk-form-row">
                        <label for="login_username">Usuário</label>
                        <input class="md-input" type="text" id="login_username" name="login_username" />
                    </div>
                    <div class="uk-form-row">
                        <label for="login_password">Senha</label>
                        <input class="md-input" type="password" id="login_password" name="login_password" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <input type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large" value="Entrar">
                    </div>
                </form>
            </div>
            <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none;">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_b uk-text-success">Erro</h2>
                <p>Usuário ou senha incorretos!</p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
$( "#login" ).submit(function( event ) {
event.preventDefault();
  var user = $("input[name=login_username]").val();
  var pass = $("input[name=login_password]").val();
  $.ajax({
            type: "POST",
            url: "admin/actions/login.php",
            data:{user: user, pass: pass},
            success: function(data){
             if(data==0){
                $("#login_help").fadeIn();
             } else{
                $("#login_help").fadeOut();
                
                 teste = UIkit.modal.blockUI('<div class=\'uk-text-center\'> Entrando...<br/><img class=\'uk-margin-top\' src=\'admin/assets/img/spinners/spinner.gif\' alt=\'\'>');
                setTimeout(function(){teste.hide();}, 2000);
                window.location.href = "admin/";
             }
            }       
    });
});
});
    </script>
</body>
</html>

  <script src="admin/assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="admin/assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="admin/assets/js/altair_admin_common.min.js"></script>


    <script>
        $(function() {
            // enable hires images
            altair_helpers.retina_images();
            // fastClick (touch devices)
            if(Modernizr.touch) {
                FastClick.attach(document.body);
            }
        });
    </script>