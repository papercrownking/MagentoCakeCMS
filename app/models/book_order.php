<?php
class BookOrder extends AppModel {
	var $name = 'BookOrder';
	var $useTable = 'BookOrder';
	var $hasMany = array(
		'OrderItems' => array(
			'className' => 'OrderItems',
			'foreignKey' => 'OrderID',
		)
	);

	var $primaryKey = 'OrderID';

	function __construct() {
		parent::__construct();
	}

	function getPostage($order) {
		$region = $order['BookOrder']['MemberRegionCode'];
		$status = $order['BookOrder']['MemberStatusCode'];;

		// check for over-riding promotional postage from RegionStatus.Postage
		$postage_data = $this->query("SELECT Postage FROM RegionStatus WHERE Region = '{$region}' AND MemberStatus = '{$status}'");
    if(!empty($postage_data)){
		if ($postage_data[0]['RegionStatus']['Postage'] != NULL) {
			 return array('total'=>$postage_data[0]['RegionStatus']['Postage']);
		}
		} else {
			 return array('total'=>'0');    
    }


		// get postage charges from Postage table (check cache first)


			$postage = array();
			$postage_tmp = $this->query("SELECT * FROM Postage ORDER BY PostageCount ASC");
			foreach ($postage_tmp as $p) {

				$postage = Set::merge($postage, array($p['Postage']['PostageCount'] => $p['Postage']['PostageCharge']));
			}

			unset($postage_tmp);

    	

		// order basket by PublicationDate
		$ordered = $this->query("SELECT IF(Offer.PublicationDate > CURDATE(),Offer.PublicationDate,'0000-00-00') AS IsInFuture,
                                 SUM(Offer.PostageCount * OrderItem.Quantity) AS PostageCount,
                                 ROUND(SUM(Offer.Postage * OrderItem.Quantity),2) AS Postage,
                                 ROUND(SUM(Offer.PostageTax * OrderItem.Quantity),2) AS PostageTax,
                                 Count(*) AS Count
                                 FROM  OrderItem
                                 LEFT JOIN Offer as Offer on Offer.OfferCode = OrderItem.OfferCode
                                 WHERE OrderItem.OrderID = '{$order['BookOrder']['OrderID']}'
				 AND Offer.RegionCode = '{$region}'
                                 GROUP BY IsInFuture
                                 ORDER BY IsInFuture ASC");


		$total_postage = 0;
		$total_postage_tax = 0;
		foreach ($ordered as $o) {
          
			if($order['BookOrder']['MemberStatusCode'] == 'C9' && $o[0]['PostageCount'] == '2'){
          $tmp_postageline_charge = '3.95';
      } else {
        $tmp_postageline_charge = $postage[$o[0]['PostageCount']];
      }	
	
					
					
			$total_postage += $tmp_postageline_charge  + $o[0]['Postage'];
			$total_postage_tax += $o[0]['PostageTax'];
		}


		// return a nice array
		return array(
				'total'            => $total_postage,
				'total_tax'        => $total_postage_tax);
	}

}
