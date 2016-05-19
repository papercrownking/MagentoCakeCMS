<div class="content-header"><table><tr><td><h3>Member Status Report</h3></td><td><p class="form-buttons" style="margin-right:20px;"><button id="save-user" title="show report" type="button" class="scalable" onclick="showTable('MemberStatusReportForm');"><span><span><span>Show Report</span></span></span></button><button id="save-user" title="print report" type="button" class="scalable" onclick="document.getElementById('MemberStatusReportForm').submit();"><span><span><span>Print Report</span></span></span></button></p></td></tr></table></div>
<div>
  <div class="entry-edit">
    <form enctype="multipart/form-data" method="post" id="MemberStatusReportForm" action="/cmsv3/reports/memberstatusAjaxTable">
      <div class="entry-edit-head">
        <h4 class="icon-head head-edit-form fieldset-legend">Filter</h4>
        <div class="form-buttons"></div>
      </div>
      <div class="fieldset" id="memberstatus_report_fieldset">
        <div class="hor-scroll">
          <table cellspacing="0" class="form-list">
            <tbody>
              <tr>
                <td class="label">
                  <label for="memberstatus_report_from">From<span class="required">*</span></label>
                </td>
                <td class="value">
                  <input name="data[from]" id="memberstatus_report_from" value="<?php echo $this->data['from']; ?>" title="From" type="text" class="required-entry input-text" style="width:110px !important;">
                  <img src="http://demo-admin.magentocommerce.com/skin/adminhtml/default/default/images/grid-cal.gif" alt="" class="v-middle" id="sales_report_from_trig" title="Select Date" style="">
                </td>
              </tr>
              <tr>
                <td class="label">
                  <label for="memberstatus_report_to">To<span class="required">*</span></label>
                </td>
                <td class="value">
                  <input name="data[to]" id="memberstatus_report_to" value="<?php echo $this->data['to']; ?>" title="To" type="text" class="required-entry input-text" style="width:110px !important;">
                  <img src="http://demo-admin.magentocommerce.com/skin/adminhtml/default/default/images/grid-cal.gif" alt="" class="v-middle" id="sales_report_from_trig" title="Select Date" style="">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="ajaxTable">
</div>


            
               
<script type="text/javascript">
$(document).ready(function(){
	$("#memberstatus_report_from").datepicker({dateFormat:"yy-mm-dd",duration:"",constrainInput:false});
	$("#memberstatus_report_to").datepicker({dateFormat:"yy-mm-dd",duration:"",constrainInput:false});
});
</script>