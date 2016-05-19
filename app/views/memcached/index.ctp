<div class="columns">
<div class="side-col" id="page:left">
	<h3>Cache Options</h3>
	<ul id="customer_info_tabs" class="tabs">
		<li><a class="tab-item-link" href="#cache_main_info"><span>Cache Overview</span></a></li>
	</ul>
</div>
<div class="main-col" id="content">
	<div class="main-col-inner">
		<div id="messages">
		</div>
		<div class="content-header">
			<h3>Folio Society Cache Overview</h3>
			<p class="form-buttons">
				<button id="back-to-screen" title="Back" type="button" class="scalable back" onclick="history.go(-1); return false;" style="">
					<span><span><span>Back</span></span></span>
				</button>
				<button id="flush-cache" title="flush cache" type="button" class="scalable save" onclick="flushCache();"> 
					<span><span><span>Flush Cache</span></span></span>
				</button>
			</p>
		</div>
		<div class="entry-edit">
			<div id="cache_main_info">		
				<div class="entry-edit">
					<div class="entry-edit-head"><h4>Cache Information</h4></div>
					<fieldset>
						<table cellspacing="2" class="box-left">
							<tr>
								<td><strong>Server Process ID</strong></td><td><?php echo $memcacheStats['pid']; ?></td>
							</tr>
							<tr>
								<td><strong>Uptime</strong></td><td><?php echo number_format($memcacheStats['uptime']  / (60 * 60 * 24),0); ?> Days</td>
							</tr>
							<tr>
								<td><strong>Current Connections</strong></td><td><?php echo $memcacheStats['curr_connections']; ?></td>
							</tr>
							<tr>
								<td><strong>Total Connections</strong></td><td><?php echo $memcacheStats['total_connections']; ?></td>
							</tr>
							<tr>
								<td><strong>Size</strong></td><td><?php echo number_format(($memcacheStats['bytes'] / 1024)/1024,0); ?> MB</td>
							</tr>
						</table>
					</fieldset>
        </div>		
			</div>
		</div>
	</div>
</div>
</div>