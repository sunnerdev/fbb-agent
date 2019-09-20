<section class="content-header">
  <h1>กลุ่มสมาชิก<small></small></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">กลุ่มสมาชิก</li>
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
          
          
        </div>
      </div>
    </div>
    </form>
  </div>
          
        
        
        
  <div class="col-sm-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">กลุ่มสมาชิก</h3>
      </div>
      <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>ชื่อกลุ่ม</th>
              <th>สร้างโดย</th>
              <th>เมื่อ</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="show_data">
            
          </body>
        </table>
      </div>
    </div>
  </div>
</section>

<script>

function GetMemberList()
{
  var htmlopt = '';

  var url="resource/members_group.app.php";
  var dataSet = $( "#search_form" ).serializeArray();
  $.post(url,dataSet,function(data){
    console.log(data);
    var i=0;
    $.each(data.data, function(k, v) {
      i++;
      console.log(k,v['id']);
      htmlopt += '<tr>'+
              '<td>'+i+'</td>'+
              '<td>'+v['group_name']+'</td>'+
              '<td>'+v['created_by']+'</td>'+
              '<td>'+v['created_at']+'</td>'+
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
  }, "json");	

  

  

}

GetMemberList();
</script>