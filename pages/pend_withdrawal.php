<section class="content-header">
  <h1>รายการถอน<small></small></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">รายการถอน</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  
  <form id="search_form" name="search_form">
  <input type="hidden" name="types" id="types" value="withdrawal">
  <input type="hidden" name="status" id="types" value="pending">
  <input type="hidden" name="startdate" id="startdate" value="all">
  </form>
          
        
        
        
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">รายการถอน</h3>
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
              <th>ยอดถอน</th>
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
                <h4 class="modal-title">withdrawal Ticket - D1029903</h4>
              </div>
              <div class="modal-body bg-gray" id="show_data_detail">
                <div class="row">
                  <div class="col-md-3" style="font-size:12px;">
                      <div class="box">
                        <div class="box-body no-padding">
                          <table class="table table-bordered bg-white">
                            <tbody id="member_detail">
                          </tbody></table>
                          
                        </div>
                        <!-- /.box-body -->
                        
                      </div>
                  </div>
                  <div class="col-md-3" style="font-size:12px;">
                      <div class="box">
                        <div class="box-body no-padding">
                          <table class="table table-bordered bg-white">
                            <tbody id="ticket_detail">
                            
                          </tbody></table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                  </div>
                  <div class="col-md-3" style="font-size:12px;">
                      <div class="box">
                        <div class="box-body no-padding">
                          <table class="table table-bordered bg-white">
                            <tbody>
                            <tr>
                              <th colspan="2">Bonus Applied</th>
                            </tr>
                            <tr>
                              <th>ชื่อโบนัส</th>
                              <td>โบนัสทุกยอดถอน 5%</td>
                            </tr>
                            <tr>
                              <th>percentage</th>
                              <td>5%</td>
                            </tr>
                            <tr>
                              <th>เงินขั้นต่ำของเกมโบนัส</th>
                              <td>3X</td>
                            </tr>
                            <tr>
                              <th>member target</th>
                              <td>1,000.00</td>
                            </tr>
                            <tr>
                              <th>bonus cap</th>
                              <td>3,500.00</td>
                            </tr>
                            <tr>
                              <th>Turnover</th>
                              <td>63,000.00</td>
                            </tr>
                          </tbody></table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                  </div>
                  <div class="col-md-3" style="font-size:12px;">
                      <div class="box">
                        <div class="box-body no-padding">
                          <table class="table table-bordered bg-white">
                            <tbody>
                            <tr>
                              <th colspan="2">current turnover</th>
                            </tr>
                            <tr>
                              <th>accumulated turnover</th>
                              <td>63,000.00</td>
                            </tr>
                            <tr>
                              <th>since</th>
                              <td>2019-09-22 01:57:21</td>
                            </tr>
                          </tbody></table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                <p>
                      <div class="box">
                        <div class="box-body no-padding ">
                          <table class="table table-bordered bg-white">
                            <tbody id="log_detail">
                          </tbody></table>
                          <input type="hidden" id="transID" name="transID" value="">
                          
                          <table style="margin:5px 5px 5px 5px;width:95%">
                            <tbody>
                              <tr>
                                <td style="text-align:center;">
                                  <span id="ticketInfo">
                                      <br>
                                      <!--<input type="radio" value="" name="rad_remarks" onclick="doRemarks(&quot;please contact us&quot;);">please contact us&nbsp;&nbsp;&nbsp;&nbsp;
                                      <input type="radio" value="" name="rad_remarks" onclick="doRemarks(&quot;&quot;);">no remarks<br>&nbsp;&nbsp;&nbsp;&nbsp;-->
                                      <textarea class="inputbox" rows="3" cols="80" name="note" id="note"></textarea>
                                      <br><br>
                                      <table width="100%">
                                        <tbody>
                                          <tr valign="top"><td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                          <td align="left"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                          <td align="center">
                                            <!--<input type="checkbox" name="chk_approve" id="chk_approve" onclick="Setwithdrawal(this.checked)"> verified<br><br> -->
                                            <input type="submit" class="btn btn-success" value="approve" name="action" id="btn_approve" onclick="Setwithdrawal('approve');"> 
                                            <input type="submit" class="btn btn-warning" value="reject" name="action" id="btn_reject" onclick="Setwithdrawal('reject');"> 
                                            <input type="button" class="btn btn-danger" value="cancel/pending" name="cancel" id="btn_cancel" onclick="$('#modal-transaction').modal('hide');">
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </span>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                    
                        </div>
                        <!-- /.box-body -->
                      </div>
                    </p>
                </div>
                </div>
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

function GetwithdrawalList()
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
      htmlopt += '<tr id="tr_'+v['id']+'">'+
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

GetwithdrawalList();

function GetDetail(id)
{
  $('#transID').val(id);
  $('.overlay_mod').show();
  var overlay_tr = '<tr><td colspan="2"><div class="overlay overlay_mod"><i class="fa fa-refresh fa-spin"></i></div></td></tr>';
  $('#member_detail').html(overlay_tr);
  $('#ticket_detail').html(overlay_tr);
  $('#log_detail').html(overlay_tr);

  var htmlopt_ticket = '';
  var htmlopt_member = '';
  var htmlopt_log = '';

  var url="resource/transaction_detail.app.php";
  var dataSet = { id:id };
  $.post(url,dataSet,function(data){
    console.log('transaction_detail',data);

    htmlopt_member += '<tr>'+
               '<th colspan="2">Member Details</th>'+
               '</tr>'+
                            '<tr>'+
                             '<th>รหัสสมาชิก</th>'+
                             '<td>'+data.member.id+'</td>'+
                             '</tr>'+
                             '<tr>'+
                             '  <th>ชื่อผู้ใช้</th>'+
                             ' <td>'+data.member.username+'</td>'+
                             '</tr>'+
                             '<tr>'+
                             ' <th>อีเมล์</th>'+
                             ' <td>'+data.member.email+'</td>'+
                             '</tr>'+
                             '<tr>'+
                             ' <th>ชื่อเต็ม</th>'+
                             ' <td>'+data.member.first_name+' '+data.member.last_name+'</td>'+
                             '</tr>'+
                             '<tr>'+
                             ' <th>เบอร์โทรศัพท์</th>'+
                             ' <td>'+data.member.contact_no_country+' '+data.member.contact_no+'</td>'+
                             '</tr>'+
                             '<tr>'+
                             '  <th>referer</th>'+
                             ' <td>'+data.member.affiliate_id+'</td>'+
                             ' </tr>';

    /*var i=0;
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
            
    $('#show_data').html(htmlopt);  */         
    
    $('#member_detail').html(htmlopt_member);    

    htmlopt_ticket += '<tr>'+
                              '<th colspan="2">Ticket Details</th>'+
                              '</tr>'+
                              '<tr>'+
                              '<th>ticket ID</th>'+
                              '<td>'+data.ticket.id+'</td>'+
                              '</tr>'+
                              '<tr>'+
                                '  <th>Fund Method</th>'+
                                '  <td>Online</td>'+
                                '</tr>'+
                                '<tr>'+
                                '  <th>DateTime</th>'+
                                '  <td>'+data.ticket.withdrawal_time+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                '  <th>อ้างอิง	</th>'+
                                '  <td></td>'+
                                '</tr>'+
                                '<tr>'+
                                '  <th>attachment</th>'+
                                '  <td></td>'+
                                '</tr>'+
                                '<tr>'+
                                '  <th>ธนาคาร</th>'+
                                '  <td>'+data.ticket.withdrawal_tos+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                '  <th>submitted on</th>'+
                                '  <td>'+data.ticket.created_at+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                '  <th>จำนวน</th>'+
                                '  <td>'+data.ticket.amount+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                '  <th>สถานะ</th>'+
                                '  <td>'+data.ticket.trans_status+'</td>'+
                                '</tr>'+
                                '<tr>'+
                                '  <th>ip</th>'+
                                '  <td>171.5.100.20</td>'+
                                '</tr>'+
                                '<tr>'+
                                '  <th>special request	</th>'+
                                '  <td></td>'+
                                '</tr>';

    $('#ticket_detail').html(htmlopt_ticket);   
    
    htmlopt_log += '<tr>'+
      '<th>สถานะ</th>'+
      '<th>หมายเหตุ</th>'+
      '<th>DateTime</th>'+
      '<th>ชื่อลูกค้า</th>'+
      '</tr>';

    $.each(data.log, function(k, v) {
      htmlopt_log += '<tr>'+
      '<td>'+v.status+'</td>'+
      '<td>'+(v.notes!=null?v.notes:'')+'</td>'+
      '<td>'+v.created_at+'</td>'+
      '<td>'+v.username+'</td>'+
      '</tr>';
    });
    $('#log_detail').html(htmlopt_log);   

  }, "json");	

  
}

function Setwithdrawal(status)
{
  var id = $('#transID').val();
  var url="resource/trans_act.app.php";
  var dataSet = { id:id, note:$( "#note" ).val(), status:status }
  $.post(url,dataSet,function(data){
    console.log(data);
    if(data.success == true){
      $('#tr_'+id).hide();
      alert('ทำรายการสำเร็จ');
      $('#transID').val('');
      $('#modal-transaction').modal('hide');
    }

    if(data.success == false){
      alert(data.msg);
    }

  }, "json");	

  

  

}
</script>