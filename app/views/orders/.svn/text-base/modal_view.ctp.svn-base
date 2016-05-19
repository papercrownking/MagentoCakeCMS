<div class="content-header">
	<h3>Order: <?php echo $data['BookOrder']['OrderID']; ?></h3>
</div>
<div class="page-popup">
	<div class="entry-edit">
	  <fieldset>
			<table cellspacing="2" class="box-left">
				<tr>
					<td><strong>Member Status</strong></td><td><?php echo $data['BookOrder']['MemberStatusCode']; ?></td>
				</tr>
				<tr>
					<td><strong>Virtual Status</strong></td><td><?php echo $data['BookOrder']['VirtualStatusCode']; ?></td>
				</tr>
				<tr>
					<td><strong>Order Status</strong></td><td><?php echo $data['BookOrder']['OrderStatusCode']; ?></td>
				</tr>
      </table>	  
	  </fieldset>
		<fieldset>
			<table cellspacing="2" class="box-left">
				<tr>
					<td><strong>Name</strong></td><td><?php echo $data['BookOrder']['Name']; ?></td>
				</tr>
				<tr>							
					<td><strong>Address</strong></td><td><?php echo $data['BookOrder']['Address1']; ?><br /><?php echo $data['BookOrder']['Address2']; ?><br /><?php echo $data['BookOrder']['Address3']; ?><br /><?php echo $data['BookOrder']['Address4']; ?><br /><?php echo $data['BookOrder']['PostCode']; ?><br /><?php echo $data['BookOrder']['CountryCode']; ?></td>
				</tr>
				<tr>
					<td><strong>Phone</strong></td><td><?php echo $data['BookOrder']['Phone']; ?></td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<table cellspacing="2" class="box-left">
				<tr>
					<td><strong>URL</strong></td><td><?php echo isset($data['BookOrder']['MediaCode']) ? $data['BookOrder']['MediaCode'] : '[NONE]';  ?></td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<table cellspacing="2" class="box-left">
				<tr>
					<td><strong>Instalments</strong></td><td><?php echo isset($data['BookOrder']['Instalments']) ? $data['BookOrder']['Instalments'] : '[NONE]';  ?></td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<h4>Items Ordered</h4>
			<div class="grid">
			<div class="hor-scroll">
			<table cellspacing="0" class="data">
				<tbody>			
					<thead>
						<tr class="headings">
							<th>Code</th><th>Title</th><th>Quantity</th><th>Value</th>				
						</tr>						
						</thead>
						<?php 
							$EXP_SET = FALSE;
							foreach($OrderItems as $items){
							if($items['OrderItem']['OfferTypeCode'] == 'EXP') { $EXP_SET = TRUE; continue; }
							 echo "<tr class='even'><td>".$items['OrderItem']['OfferCode']."</td><td>".$items['Book']['Title']."</td><td>".$items['OrderItem']['Quantity']."</td><td>".$currency_html[$data['BookOrder']['MemberRegionCode']]." ".number_format($items['OrderItem']['Price'],2)."</td></tr>";

							}

						?>

				</tbody>			
			</table>
			</div>
			</div>
		</fieldset>
		<fieldset>
			<table cellspacing="2" class="box-left">
				<tr>
					<td><strong>Discount Codes Used</strong></td><td><?php echo isset($data['BookOrder']['GiftMessage']) ? $data['BookOrder']['GiftMessage'] : '[NONE]';  ?></td>
				</tr>
				<tr>
					<td><strong>Discount</strong></td><td><?php echo $currency_html[$data['BookOrder']['MemberRegionCode']]." ".number_format($data['BookOrder']['Discount'],2); ?></td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<table cellspacing="2" class="box-left">
				<tr>
					<td><strong>Postage</strong></td><td><?php echo $currency_html[$data['BookOrder']['MemberRegionCode']]." ".number_format($data['PostageTotal'],2); ?></td>
				</tr>
				<tr>
					<td><strong>Postage Tax</strong></td><td><?php echo $currency_html[$data['BookOrder']['MemberRegionCode']]." ".number_format($data['PostageTax'],2); ?></td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<table cellspacing="2" class="box-left">
				<tr>
					<td><strong>Total</strong></td><td><?php echo $currency_html[$data['BookOrder']['MemberRegionCode']]." ".number_format($data['OrderTotal'],2); ?></td>
				</tr>
			</table>
		</fieldset>
	</div>
</div>
