<div class="columns">
<div class="side-col" id="page:left">
	<h3>Region Information</h3>
	<ul id="region_info_tabs" class="tabs">
		<li><a class="tab-item-link" href="#region_main_info"><span>Region Information</span></a></li>
	</ul>
</div>
<div class="main-col" id="content">
	<div class="main-col-inner">
		<div id="messages">
		</div>
		<div class="content-header">
			<h3><?php echo $region_data['Region']['RegionCode']; ?> Region</h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>	
				<button id="save-region" title="save region" type="button" class="scalable save" onclick="submitForm('RegionEditForm');"> 
					<span><span><span>Save Region</span></span></span>
				</button>		
			</p>
		</div>
		<form enctype="multipart/form-data" method="post" id="RegionEditForm" action="/cmsv3/regions/edit">
		<input type="hidden" name="data[Region][RegionCode]" id="hiddenID" value="<?php  echo $region_data['Region']['RegionCode']; ?>" />		
		<div class="entry-edit">
			<div id="region_main_info">
				<div class="entry-edit">
					<div class="entry-edit-head"><h4>Region Data</h4></div>
					<div class="fieldset">
						<div class="hor-scroll">
							<table cellspacing="0" class="form-list">
								<tbody>
									<tr>
										<td class="label"><label for="ExchangeRate">Currency Code</label></td>
										<td class="value"><strong><?php echo $region_data['Region']['CurrencyCode']; ?></strong></td>
									</tr>
									<tr>
										<td class="label"><label for="ExchangeRate">Exchange Rate<span class="required">*</span></label></td>
										<td class="value"><input id="ExchangeRate" name="data[Region][ExchangeRate]" class="input-text" type="text" value="<?php echo $region_data['Region']['ExchangeRate']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="Phone">Phone<span class="required">*</span></label></td>
										<td class="value"><input id="Phone" name="data[Region][Phone]" class="input-text" type="text" value="<?php echo $region_data['Region']['Phone']; ?>"/></td>
									</tr>
									<tr>
										<td class="label"><label for="IBMsg">IB Message<span class="required">*</span></label></td>
										<td class="value"><textarea id="IBMsg" name="data[Region][IBMsg]" class="input-text"><?php echo $region_data['Region']['IBMsg']; ?></textarea></td>
									</tr>																										
								</tbody>
							</table>
						</div>
				</div>	
		
			</div>			
		</div>
		</form>
	</div>
</div>
</div>

<div class="content-header-floating" style="display:none;">
		<div class="content-header">
			<h3><?php echo $region_data['Region']['RegionCode']; ?> Region</h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>	
				<button id="save-region" title="save region" type="button" class="scalable save" onclick="submitForm('RegionEditForm');"> 
					<span><span><span>Save Region</span></span></span>
				</button>		
			</p>
		</div>
</div>
</div>
