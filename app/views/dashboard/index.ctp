<div class="content-header"><table><tr><td><h3>Dashboard</h3></td></tr></table></div>
<div class="dashboard-container">
	<p class="switcher">Foliosociety.com Store View</p>
	<table cellspacing="25" width="100%">
		<tbody>
			<tr>
				<td>
					<div class="entry-edit">
						<div class="entry-edit-head"><h4>Last 5 Orders</h4></div>
						<fieldset class="np">
							<div class="grid np">
							<table celsspacing="0" style="border:0;">
								<thead>
									<tr class="headings">
										<th class="no-link"><span class="nobr">OrderID</span></th><th class="no-link"><span class="nobr">Status</span></th><th class="no-link"><span class="nobr">Name</span></th><th class="no-link"><span class="nobr">Time</span></th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach($BookOrder_data as $data): ?>
										<?php if($i&1) { $tableRowClass = 'pointer'; } else { $tableRowClass = 'even';} ?>
										<tr class="<?php echo $tableRowClass; ?>">
											<?php echo "<td>{$data['BookOrder']['OrderID']}</td><td>{$data['BookOrder']['MemberStatusCode']}</td><td>{$data['BookOrder']['Name']}</td><td>{$time->niceShort($data['BookOrder']['CDate'])}</td>"; ?>
										</tr>									
									<?php $i++; endforeach; ?>
								</tbody>
							</table>
							</div>
						</fieldset>
					</div>
					<div class="entry-edit">
						<div class="entry-edit-head"><h4>Last 5 Search Terms</h4></div>
						<fieldset class="np">
							<div class="grid np">
							<table celsspacing="0" style="border:0;">
								<thead>
									<tr class="headings">
										<th class="no-link"><span class="nobr">Term</span></th><th class="no-link"><span class="nobr">Books Found</span></th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach($LatestSearch_data as $data): ?>
										<?php if($i&1) { $tableRowClass = 'pointer'; } else { $tableRowClass = 'even';} ?>
										<tr class="<?php echo $tableRowClass; ?>">
											<?php echo "<td>{$data['SearchWords']['Term']}</td><td>{$data['SearchWords']['Found']}</td>"; ?>
										</tr>									
									<?php $i++; endforeach; ?>
								</tbody>
							</table>
							</div>
						</fieldset>
					</div>
					<div class="entry-edit">
						<div class="entry-edit-head"><h4>Top 5 Search Terms YTD</h4></div>
						<fieldset class="np">
							<div class="grid np">
							<table celsspacing="0" style="border:0;">
								<thead>
									<tr class="headings">
										<th class="no-link"><span class="nobr">Term</span></th><th class="no-link"><span class="nobr">Queries</span></th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach($TopSearch_data as $data): ?>
										<?php if($i&1) { $tableRowClass = 'pointer'; } else { $tableRowClass = 'even';} ?>
										<tr class="<?php echo $tableRowClass; ?>">
											<?php echo "<td>{$data['SearchWords']['Term']}</td><td>{$data['0']['Count(Term)']}</td>"; ?>
										</tr>									
									<?php $i++; endforeach; ?>
								</tbody>
							</table>
							</div>
						</fieldset>
					</div>
				</td>
				<td>
					<div class="entry-edit" style="float:right;border:1px solid #ccc;width:700px;text">
					
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawVisualization);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.

        
        function drawVisualization() {
        
        var orderData = <?php echo $lastOrders_data; ?>;


  // Create and populate the data table.
  var data = google.visualization.arrayToDataTable([
    ['x', 'Orders'],
    [orderData[0][0]['Date'],   parseInt(orderData[0][0]['orders'])],
    [orderData[1][0]['Date'],   parseInt(orderData[1][0]['orders'])],
    [orderData[2][0]['Date'],   parseInt(orderData[2][0]['orders'])],
    [orderData[3][0]['Date'],   parseInt(orderData[3][0]['orders'])],
    [orderData[4][0]['Date'],   parseInt(orderData[4][0]['orders'])],
    [orderData[5][0]['Date'],   parseInt(orderData[5][0]['orders'])],
    [orderData[6][0]['Date'],   parseInt(orderData[6][0]['orders'])],
    [orderData[7][0]['Date'],   parseInt(orderData[7][0]['orders'])],
    [orderData[8][0]['Date'],   parseInt(orderData[8][0]['orders'])],
    [orderData[9][0]['Date'],   parseInt(orderData[9][0]['orders'])],
    [orderData[10][0]['Date'],   parseInt(orderData[10][0]['orders'])],
    [orderData[11][0]['Date'],   parseInt(orderData[11][0]['orders'])],
    [orderData[12][0]['Date'],   parseInt(orderData[12][0]['orders'])],
    [orderData[13][0]['Date'],   parseInt(orderData[13][0]['orders'])]
  ]);

  // Create and draw the visualization.
  new google.visualization.LineChart(document.getElementById('chart_div')).
      draw(data, {curveType: "function",
                  width: 700, height: 550,
                  vAxis: {maxValue: 10}}
          );
}
      
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>     
          
          </div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
