<?php
class OrderItems extends AppModel {
	var $name = 'OrderItems';
	var $useTable = 'OrderItem';


	function __construct() {
		parent::__construct();
	}

    function findByOrderId($id){
    	return $this->query(
    		'SELECT 
			MID(OrderItem.OfferCode,2) as OrderItemBookCode,
    			OrderItem.OfferCode,
    			OrderItem.OfferTypeCode,
          OrderItem.Price,
    			OrderItem.Postage,
    			OrderItem.PostageTax,
    			OrderItem.Tax,
    			OrderItem.RegionCode,
    			OrderItem.Quantity,
    			Book.Title,
    			Book.BookCode
    		FROM
    			OrderItem
    		LEFT JOIN 
    			Offer on (OrderItem.OfferCode=Offer.OfferCode and OrderItem.RegionCode=Offer.RegionCode and OrderItem.OfferTypeCode=Offer.OfferTypeCode)
    		LEFT JOIN
    			Book on (Offer.BookCode=Book.BookCode)
    		WHERE 
    			OrderItem.OrderID='.$id
    	);
    }

}
