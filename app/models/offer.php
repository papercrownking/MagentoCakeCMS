<?php

class Offer extends AppModel
{
	var $name = 'Offer';
	var $useTable = 'Offer';
	//var $recursive = -1;
	var $belongsTo = array(
        'Book' => array(
            'className'    => 'Book',
            'foreignKey'    => 'BookCode'
        ),
        'Region' => array(
            'className'    => 'Region',
            'foreignKey'    => 'RegionCode'
        ),
        'OfferType' => array(
            'className'    => 'OfferType',
            'foreignKey'    => 'OfferTypeCode'
        ),
    );


   function getOfferByBookCode($bookCode,$region,$offerTypeCode) {
        //$c = Cache::read("data".DS."offer_data_{$bookCode}_{$region}_{$offerTypeCode}", '+1 day');
        if ($c === false) {
 
            $data = $this->query("SELECT Offer.*,OfferType.*,OfferExtra.*,OfferTypeMemberStatus.*,OfferGift.*,Book.*,GiftBook.*
                                    FROM Offer
                                    LEFT JOIN OfferType ON Offer.OfferTypeCode = OfferType.OfferTypeCode
                                    LEFT JOIN OfferExtra ON Offer.OfferCode = OfferExtra.OfferCode
                                    LEFT JOIN OfferTypeMemberStatus ON OfferType.OfferTypeCode = OfferTypeMemberStatus.OfferTypeCode
                                    LEFT JOIN Offer AS OfferGift ON Offer.GiftOfferCode = OfferGift.OfferCode
                                    LEFT JOIN Book AS GiftBook ON OfferGift.BookCode = GiftBook.BookCode
                                    LEFT JOIN Book AS Book ON Offer.BookCode = Book.BookCode
                                    "/* these might not be entirely necessary*/."
                                    WHERE Offer.BookCode = '".addslashes($bookCode)."'
                                    AND Offer.OfferTypeCode = '".addslashes($offerTypeCode)."'
                                    AND Offer.RegionCode = '".$region."'");
			$c = $data[0];
         //   Cache::write("data".DS."offer_data_{$bookCode}_{$region}_{$offerTypeCode}", $c, '+1 day');
        }
        return $c;
    }

   function getOfferByOfferTypeCode($offerTypeCode) {
        //$c = Cache::read("data".DS."offer_type_data_{$offerTypeCode}", '+1 day');
        if ($c === false) {
 
            $data = $this->query("SELECT Offer.*,Book.* FROM Offer
                                  LEFT JOIN Book AS Book ON Offer.BookCode = Book.BookCode WHERE Offer.OfferTypeCode = '".$offerTypeCode."' GROUP BY Offer.OfferCode");
                            
			//$c = $data[0];
          //  Cache::write("data".DS."offer_type_data_{$offerTypeCode}", $data, '+1 day');
        }
        return $data;
    }
    
    function getBookByOfferCode($offerCode){
		$data = $this->query("SELECT Book.* 
				      FROM Book
				      LEFT JOIN Offer ON Book.BookCode = Offer.BookCode
				      WHERE Offer.OfferCode= '".$offerCode."'
				      LIMIT 1");
		$data = $data[0];
		return $data;
    }

}

?>
