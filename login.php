<?php
include('common/config.php');
if($_SESSION['access_token']!='')
{
  header('Location: index.php');
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script>
                function login_submit(){
                  $( ".overlay" ).show();
                  $( "#btn_submit").attr("disabled", true);

                        console.log($( "#loginform" ).serializeArray());
                        var url="resource/login.app.php";
                        var dataSet = $( "#loginform" ).serializeArray();
                        $.post(url,dataSet,function(data){
                            console.log(data);
                            
                            if(data!=null){
                            if(data.status == '1'){
                                sessionStorage.setItem('token_type', data.session.token_type); 
                                sessionStorage.setItem('access_token', data.session.access_token);
                                sessionStorage.setItem('expires_in', data.session.expires_in);
                                sessionStorage.setItem('refresh_token', data.session.refresh_token); 
                                location.href='index.php';
                            }

                            if(data.status == '0'){
                                //toggleLoginProgressBar();
                                alert(data.msg);
                            }}else{
                                //toggleLoginProgressBar();
                                alert('เกิดข้อผิดพลาด ลองใหม่อีกครั้งในภายหลัง');
                            }
                            $( ".overlay" ).hide();
                            $( "#btn_submit").attr("disabled", flase);
                        }, "json");	
                }

                $( "#loginform" ).submit(function( event ) {
                    login_submit();
                  });
            </script>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.php"><b>Agent</b>LOGIN</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form id="loginform" name="loginform" action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
            
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button id="btn_submit" type="submit" class="btn btn-primary btn-block btn-flat" onclick="login_submit();"><div class="overlay" style="display:none;">
          <i class="fa fa-refresh fa-spin"></i>
        </div>Sign In</button>
        </div>
        <!-- /.col -->
      </div>
      
    </form>

    

  </div>
  <!-- /.login-box-body -->

  
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
