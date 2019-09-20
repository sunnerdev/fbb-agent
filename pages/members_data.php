<section class="content-header">
  <h1>ข้อมูลสมาชิก<small></small></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">ข้อมูลสมาชิก</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  
  <div class="col-sm-12">
  <form id="search_form">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">ค้นหา</h3>
      </div>
      <div class="box-body">
        <div class="col-sm-6">
          <!-- Date -->
          <div class="form-group">
            <label>อีเมล์ / ชื่อผู้ใช้ / เบอร์โทรศัพท์ / Referer URL :</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="">
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->
        </div>
      </div>
    </div>
    </form>
  </div>
          
        
        
        
  <div class="col-sm-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">ข้อมูลสมาชิก</h3>
      </div>
      <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>รหัสสมาชิก</th>
              <th>อีเมล์</th>
              <th>ชื่อเต็ม</th>
              <th>ชื่อผู้ใช้</th>
              <th>เบอร์โทรศัพท์</th>
              <th>กลุ่ม</th>
              <th>Aff</th>
              <th>วันที่สมัคร</th>
              <th>วันที่เข้าสู่ระบบ</th>
              <th>ไอพี การเข้าใช้ล่าสุด</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="show_data">
            
          </body>
        </table>
        
      </div>
      <div class="overlay">
          <i class="fa fa-refresh fa-spin"></i>
        </div>
    </div>
  </div>
</section>

<script>

function GetMemberList()
{
  var htmlopt = '';

  var url="resource/members.app.php";
  var dataSet = $( "#search_form" ).serializeArray();
  $.post(url,dataSet,function(data){
    console.log(data);
    var i=0;
    $.each(data.data, function(k, v) {
      i++;
      console.log(k,v['id']);
      htmlopt += '<tr>'+
              '<td>'+i+'</td>'+
              '<td>'+v['id']+'</td>'+
              '<td>'+v['email']+'</td>'+
              '<td>'+v['first_name']+' '+v['last_name']+'</td>'+
              '<td>'+v['username']+'</td>'+
              '<td>+'+v['contact_no_country']+''+v['contact_no']+'</td>'+
              '<td>'+v['group_name']+'</td>'+
              '<td>'+v['affiliate_id']+'</td>'+
              '<td>'+v['created_at']+'</td>'+
              '<td>'+v['first_login_at']+'</td>'+
              '<td>'+v['last_ip']+'</td>'+
              '<td><div class="btn-group">'+
              '    <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-edit"></i></button>'+
              '    <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown">'+
              '      <span class="caret"></span>'+
              '      <span class="sr-only">Action</span>'+
              '    </button>'+
              '    <ul class="dropdown-menu" role="menu">'+
              '      <li><a href="#">แก้ไข</a></li>'+
              '        <li class="divider"></li>'+
              '        <li><a href="#">ระงับ</a></li>'+
              '      </ul>'+
              '    </div></td>'+
              '</tr>';
    });  

    $('#show_data').html(htmlopt);
    $('.overlay').hide();
  }, "json");	

  

  

}

GetMemberList();
</script>