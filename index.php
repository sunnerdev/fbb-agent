<?php
include('common/config.php');
if($_SESSION['access_token']=='')
{
  header('Location: login.php');
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agent - <?php echo strtoupper($_SESSION['DATA']->username); ?></title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


<script>

function GetAlert()
{
  var htmlopt = '';

  var dep = [];
  var wd = [];

  var url="resource/transaction.app.php";
  var dataSet = { status:'pending' }
  $.post(url,dataSet,function(data){
    //console.log(data.data.length);
    
    $.each(data.data, function(k,v) {
      if(v.transaction_type=='deposit'){
        dep.push(v.id);
      }

      if(v.transaction_type=='withdrawal'){
        wd.push(v.id);
      }
    });

    //console.log(dep.length,wd.length);
    //if(dep.length>0){
      var alert_deposit_c = dep.length;
      if(alert_deposit_c==0){
        $('#alert_deposit_c').hide();
        $('#alert_deposit_c').text(0);      
      }else{
        $('#alert_deposit_c').show();
        $('#alert_deposit_c').text(alert_deposit_c);      
      }
   // }

    //if(wd.length>0){
      var alert_withdrawal_c = wd.length;
      if(alert_withdrawal_c==0){
        $('#alert_withdrawal_c').hide();
        $('#alert_withdrawal_c').text(0);      
      }else{
        $('#alert_withdrawal_c').show();
        $('#alert_withdrawal_c').text(alert_withdrawal_c);      
      }
    //}
    
    var item = parseFloat(dep.length)+parseFloat(wd.length);
    if(item==0){
      $('#notify-item').hide();
      $('#notify-item').text(0);
    }else{
      $('#notify-item').text(item);
      $('#notify-item').show();
    }
  }, "json");	
}
GetAlert();
setInterval(GetAlert, 10000);


function AlertAni(){
  $.each(['alert_deposit_c','alert_withdrawal_c'], function(k,v) {
    var CheckClass = $('#'+v).hasClass('label-danger');
    //console.log(v,CheckClass);
    if(CheckClass==true){
      $('#'+v).removeClass('label-danger');
      $('#'+v).addClass('label-warning');
    }else{
      $('#'+v).removeClass('label-warning');
      $('#'+v).addClass('label-danger');
    }
  });
}
setInterval(AlertAni, 500);
</script>
</head>
<body class="hold-transition skin-red fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="./" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>F</b>BB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>S</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" id="notify-item" style="display:none;">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have notifications</li>
            </ul>
          </li>
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['DATA']->username; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                <?php echo  strtoupper($_SESSION['DATA']->username); ?> - <?php  echo strtoupper($_SESSION['DATA']->level); ?>
                  <small><?php echo $_SESSION['DATA']->created_at; ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="index.php?m=profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo strtoupper($_SESSION['DATA']->username); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li <?php echo ($_GET['r']=='deposit'?'class="active"':''); ?>>
          <a href="index.php?m=pend&r=deposit"><i class="fa fa-circle-o"></i> <span>รายการฝาก</span>
            <span class="pull-right-container">
              <span class="label label-danger pull-right" id="alert_deposit_c" style="display:none;">0</span>
            </span>
          </a>
        </li>
        <li <?php echo ($_GET['r']=='withdrawal'?'class="active"':''); ?>>
          <a href="index.php?m=pend&r=withdrawal"><i class="fa fa-circle-o"></i> <span>รายการถอน</span>
            <span class="pull-right-container">
              <span class="label label-danger pull-right" id="alert_withdrawal_c" style="display:none;">0</span>
            </span>
          </a>
        </li>

        <li <?php echo ($_GET['m']=='transaction'?'class="active"':''); ?>>
          <a href="index.php?m=transaction&r=list"><i class="fa fa-circle-o"></i> <span>รายการทั้งหมด</span></a>
        </li>

        <li class="<?php echo ($_GET['m']=='members'?'active':''); ?> treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>ระบบจัดการสมาชิก</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li <?php echo ($_GET['r']=='data'?'class="active"':''); ?>><a href="index.php?m=members&r=data"><i class="fa fa-circle-o"></i> ข้อมูลสมาชิก</a></li>
             <li <?php echo ($_GET['r']=='group'?'class="active"':''); ?>><a href="index.php?m=members&r=group"><i class="fa fa-circle-o"></i> กลุ่มสมาชิก</a></li>
          </ul>
        </li>

        <li class="<?php echo ($_GET['m']=='check'?'active':''); ?> treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>เครื่องมือตรวจสอบ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li <?php echo ($_GET['r']=='ip'?'class="active"':''); ?>><a href="index.php?m=check&r=ip"><i class="fa fa-circle-o"></i> วิเคราะห์ไอพี</a></li>
             <li <?php echo ($_GET['r']=='fraud'?'class="active"':''); ?>><a href="index.php?m=check&r=fraud"><i class="fa fa-circle-o"></i> fraud</a></li>
          </ul>
        </li>

        <li class="<?php echo ($_GET['m']=='report'?'active':''); ?> treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>รายงาน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li <?php echo ($_GET['r']=='banktransfer'?'class="active"':''); ?>><a href="index.php?m=report&r=banktransfer"><i class="fa fa-circle-o"></i> Bank Transfer</a></li>
             <li <?php echo ($_GET['r']=='bonus'?'class="active"':''); ?>><a href="index.php?m=report&r=bonus"><i class="fa fa-circle-o"></i> โบนัส</a></li>
             <li <?php echo ($_GET['r']=='bank'?'class="active"':''); ?>><a href="index.php?m=report&r=bank"><i class="fa fa-circle-o"></i> ธนาคาร</a></li>
             <li <?php echo ($_GET['r']=='statsuser'?'class="active"':''); ?>><a href="index.php?m=report&r=statsuser"><i class="fa fa-circle-o"></i> สถิติผู้เล่น</a></li>
             <li <?php echo ($_GET['r']=='fine'?'class="active"':''); ?>><a href="index.php?m=report&r=fine"><i class="fa fa-circle-o"></i> การปรับ</a></li>
             <li <?php echo ($_GET['r']=='refund'?'class="active"':''); ?>><a href="index.php?m=report&r=refund"><i class="fa fa-circle-o"></i> การคืนเงิน</a></li>
             <li <?php echo ($_GET['r']=='winloss'?'class="active"':''); ?>><a href="index.php?m=report&r=winloss"><i class="fa fa-circle-o"></i> แพ้/ชนะ</a></li>
          </ul>
        </li>

        <li class="<?php echo ($_GET['m']=='cust_relations'?'active':''); ?> treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>ลูกค้าสัมพันธ์</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li <?php echo ($_GET['r']=='statsuser'?'class="active"':''); ?>><a href="index.php?m=cust_relations&r=statsuser"><i class="fa fa-circle-o"></i> สถิติสมาชิก</a></li>
             <li <?php echo ($_GET['r']=='note'?'class="active"':''); ?>><a href="index.php?m=cust_relations&r=note"><i class="fa fa-circle-o"></i> บันทึกข้อความ</a></li>
          </ul>
        </li>

        <li class="<?php echo ($_GET['m']=='bank'?'active':''); ?> treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>ธนาคาร</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li <?php echo ($_GET['r']=='list'?'class="active"':''); ?>><a href="index.php?m=bank&r=list"><i class="fa fa-circle-o"></i> รายการธนาคาร</a></li>
             <li <?php echo ($_GET['r']=='reset'?'class="active"':''); ?>><a href="index.php?m=bank&r=reset"><i class="fa fa-circle-o"></i> การตั้งค่าสะสมใหม่</a></li>
          </ul>
        </li>

        <li class="<?php echo ($_GET['m']=='promotion'?'active':''); ?> treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>โปรโมชั่น</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li <?php echo ($_GET['r']=='type'?'class="active"':''); ?>><a href="index.php?m=promotion&r=type"><i class="fa fa-circle-o"></i> ประเภทโบนัส</a></li>
             <li <?php echo ($_GET['r']=='banner_type'?'class="active"':''); ?>><a href="index.php?m=promotion&r=banner_type"><i class="fa fa-circle-o"></i> รูปแบบเนอร์โบนัส</a></li>
             <li <?php echo ($_GET['r']=='bonus'?'class="active"':''); ?>><a href="index.php?m=promotion&r=bonus"><i class="fa fa-circle-o"></i> โบนัส</a></li>
          </ul>
        </li>

        <li class="<?php echo ($_GET['m']=='refund'?'active':''); ?> treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>ระบบการคืนเงิน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li <?php echo ($_GET['r']=='setting'?'class="active"':''); ?>><a href="index.php?m=refund&r=setting"><i class="fa fa-circle-o"></i> ตั้งค่าการคืนเงิน</a></li>
             <li <?php echo ($_GET['r']==''?'class="active"':''); ?>><a href="index.php?m=refund&r="><i class="fa fa-circle-o"></i> การคืนเงิน</a></li>
          </ul>
        </li>


        <li class="<?php echo ($_GET['m']=='useracc'?'active':''); ?> treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>บัญชีผู้ใช้</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li <?php echo ($_GET['r']=='active'?'class="active"':''); ?>><a href="index.php?m=useracc&r=active"><i class="fa fa-circle-o"></i> บัญชีที่ใช้งานอยู่</a></li>
             <li <?php echo ($_GET['r']=='delete'?'class="active"':''); ?>><a href="index.php?m=useracc&r=delete"><i class="fa fa-circle-o"></i> บัญชีที่ถูกลบ</a></li>
             <li <?php echo ($_GET['r']=='role'?'class="active"':''); ?>><a href="index.php?m=useracc&r=role"><i class="fa fa-circle-o"></i> บทบาทผู้ใช้</a></li>
          </ul>
        </li>

        <li class="<?php echo ($_GET['m']=='system'?'active':''); ?> treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>จัดการระบบ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li <?php echo ($_GET['r']=='announce'?'class="active"':''); ?>><a href="index.php?m=system&r=announce"><i class="fa fa-circle-o"></i> การประกาศโฆษณา</a></li>
             <li <?php echo ($_GET['r']=='popup_ads'?'class="active"':''); ?>><a href="index.php?m=system&r=popup_ads"><i class="fa fa-circle-o"></i> ป๊อปอัพประกาศ</a></li>
             <li <?php echo ($_GET['r']=='web_analytics'?'class="active"':''); ?>><a href="index.php?m=system&r=web_analytics"><i class="fa fa-circle-o"></i> วิเคราะห์เว็บ</a></li>
             <li <?php echo ($_GET['r']=='providers'?'class="active"':''); ?>><a href="index.php?m=system&r=providers"><i class="fa fa-circle-o"></i> ผู้ให้บริการ</a></li>
          </ul>
        </li>

        
        <li <?php echo ($_GET['m']=='change_password'?'class="active"':''); ?>><a href="index.php?m=change_password"><i class="fa fa-book"></i> <span>เปลี่ยนรหัสผ่าน</span></a></li>
        <li><a href="logout.php"><i class="fa fa-book"></i> <span>ออกจากระบบ</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <?php
    if($_GET['m']==''){ include('pages/dashboard.php'); }
    if($_GET['m']!=''){ include('pages/'.$_GET['m'].'_'.$_GET['r'].'.php'); }

  ?>
    </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


</body>
</html>
