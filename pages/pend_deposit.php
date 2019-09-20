<section class="content-header">
  <h1>รายการฝาก<small></small></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">รายการฝาก</li>
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
      <form id="search_form" name="search_form">
      <input type="hidden" name="types" id="types" value="deposit">
        <div class="col-sm-6">
          <!-- Date -->
          <div class="form-group">
            <label>อีเมล์ / ชื่อผู้ใช้ / เบอร์โทรศัพท์ / Referer URL :</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" name="txt" id="txt" value="deposittxt">
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
        <h3 class="box-title">รายการฝาก</h3>
      </div>
      <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>รหัสรายการ</th>
              <th>วันที่ทำรายการ</th>
              <th>ชื่อผู้ใช้</th>
              <th>อีเมล์</th>
              <th>กลุ่ม</th>
              <th>ธนาคาร</th>
              <th>สถานะ</th>
              <th>ยอดฝาก</th>
              <th>การกระทำ</th>
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


<div class="modal fade" id="modal-transaction" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body" id="show_data_detail">
                <p>One fine body…</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<script>

function GetDepositList()
{
  var htmlopt = '';

  var url="resource/transaction.app.php";
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
              '<td>'+v['created_at']+'</td>'+
              '<td>'+v['username']+'</td>'+
              '<td>'+v['email']+'</td>'+
              '<td>'+v['group']+'</td>'+
              '<td>'+v['trans_froms']+'</td>'+
              '<td>'+v['trans_status']+'</td>'+
              '<td>'+v['amount']+'</td>'+
              '<td>'+
              '    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-transaction" onclick="GetDetail('+v['id']+')"><i class="fa fa-fw fa-edit"></i></button>'+
              '</td>'+
              '</tr>';
    });  
             
    $('#show_data').html(htmlopt);       
    $('.overlay').hide();               
  }, "json");	

  

  

}

GetDepositList();

function GetDetail(id)
{
  $('#show_data_detail').html('dsssdsd');    
}
</script>