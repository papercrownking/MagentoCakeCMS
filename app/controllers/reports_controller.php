<?php
class ReportsController extends AppController {

	var $name = 'Reports';
	var $uses = array('Report');
	var $helpers = array('Time','Html','Javascript','Ajax');	
  	
  public function index(){

  }
  
  public function memberstatus(){
  
  }
  
  public function memberstatusAjaxTable(){ 

		// reports
		if(isset($this->data)){
		$conditions=array();
		$conditions['DATE(created) >=']=$this->data['from'];
		$conditions['DATE(created) <=']=$this->data['to'];
		$data = $this->Report->find('all',array('conditions'=>$conditions,'order'=>'Report.created'));

                    function array_narrow(&$arr) {
                        $r = array();
                        foreach($arr as $k=>$v){if(reset($v)!="")$r[reset($v)]=next($v);}
                        return $r;
                    }

                    $report_frequency = "d"; //PHP date format for "day"  / "m", "Y"
                    $current_day = 0;
                    $daychanged = false;
//                    $snapshots = array(); //contains columdata per status "N1"
                    $snapshots_frequent = array();
                    $index_frequent = 0;
                    $count_status = 0;
                    $count_snapshots = 0;

                    //get all distinct statuses and sort them - instatiate snapshot_frequency array;
                    foreach($data as $report) {
                        $tmpdata = array_narrow(json_decode($report["Report"]["meta"],true));
                        foreach ($tmpdata as $st=>$v) {
                            $st = strtoupper($st);
                            if (!array_key_exists($st,$snapshots_frequent)) {
                                $snapshots_frequent[$st] = array();
                            }
                        }
                    }
                    ksort($snapshots_frequent);
                    $count_status = count($snapshots_frequent);
                    $count_snapshots = count($data);
                     

                    //foreach($data as $report) {
                    for ($td=0;$td<$count_snapshots;$td++) {
 
                        $tmpdata = array_narrow(json_decode($data[$td]["Report"]["meta"],true));
 
                        if (date($report_frequency,strtotime($data[$td]["Report"]["created"])) != $current_day) {
                            $current_day = date($report_frequency,strtotime($data[$td]["Report"]["created"]));
                            $daychanged = true;
                        }
                        $daycount = 0;  
                        //print_r($tmpdata); print("\n\n");
                        foreach ($tmpdata as $st=>$v) {

                            $st = strtoupper($st);
                            $daycount = $daycount + $v;

                            if ($daychanged) {
                                //only add the snapshot if the day changes.
                                $snapshots_frequent[$st][$index_frequent]["totalmember"] = $data[$td]["Report"]["totalmember"];
                                $snapshots_frequent[$st][$index_frequent]["date"] = $data[$td]["Report"]["created"];

                                if ($index_frequent>0) {
                                    $snapshots_frequent[$st][$index_frequent]["total"] = $v;
                                    $snapshots_frequent[$st][$index_frequent]["difference"] = $snapshots_frequent[$st][$index_frequent]["total"] - $snapshots_frequent[$st][$index_frequent-1]["total"]; //$v;
                                    $snapshots_frequent[$st][$index_frequent]["totaldifference"] = $snapshots_frequent[$st][$index_frequent]["totalmember"] - $snapshots_frequent[$st][$index_frequent-1]["totalmember"];
                                } else {
                                    $snapshots_frequent[$st][$index_frequent]["total"] = $v;
                                    $snapshots_frequent[$st][$index_frequent]["difference"] = 0;
                                    $snapshots_frequent[$st][$index_frequent]["totaldifference"] = 0;
                                }
                                
                                if ($snapshots_frequent[$st][$index_frequent]["difference"]>0) {
                                    $snapshots_frequent[$st][$index_frequent]["legend"] = "00CC00";
                                } elseif ($snapshots_frequent[$st][$index_frequent]["difference"]<0) {
                                    $snapshots_frequent[$st][$index_frequent]["legend"] = "CC0000";
                                } else {
                                    $snapshots_frequent[$st][$index_frequent]["legend"] = "000000";
                                }

                                if ($snapshots_frequent[$st][$index_frequent]["totaldifference"]>0) {
                                    $snapshots_frequent[$st][$index_frequent]["totallegend"] = "00CC00";
                                } elseif ($snapshots_frequent[$st][$index_frequent]["totaldifference"]<0) {
                                    $snapshots_frequent[$st][$index_frequent]["totallegend"] = "CC0000";
                                } else {
                                    $snapshots_frequent[$st][$index_frequent]["totallegend"] = "000000";
                                }

                            } else {
                                //do nothing unless its the last value,
                            }

                        }

                        //this will find empty ST values and apply 0 to totals
                        foreach ($snapshots_frequent as $st=>$v) {
                            if (empty($snapshots_frequent[$st][$index_frequent]) && $daychanged){
                                //print($st."-".$index_frequent."\n");
                                //print_r($snapshots_frequent[$st]);
                                $snapshots_frequent[$st][$index_frequent]["totalmember"] = $data[$td]["Report"]["totalmember"];
                                $snapshots_frequent[$st][$index_frequent]["date"] = $data[$td]["Report"]["created"];
                                $snapshots_frequent[$st][$index_frequent]["total"] = 0;
                                if ($index_frequent>0) {
                                    $snapshots_frequent[$st][$index_frequent]["difference"] = $snapshots_frequent[$st][$index_frequent]["total"] - $snapshots_frequent[$st][$index_frequent-1]["total"]; //$v;
                                    $snapshots_frequent[$st][$index_frequent]["totaldifference"] = $snapshots_frequent[$st][$index_frequent]["totalmember"] - $snapshots_frequent[$st][$index_frequent-1]["totalmember"];
                                } else {
                                    $snapshots_frequent[$st][$index_frequent]["difference"] = 0;
                                    $snapshots_frequent[$st][$index_frequent]["totaldifference"] = 0;
                                }
 
                                if ($snapshots_frequent[$st][$index_frequent]["difference"]>0) {
                                    $snapshots_frequent[$st][$index_frequent]["legend"] = "00CC00";
                                } elseif ($snapshots_frequent[$st][$index_frequent]["difference"]<0) {
                                    $snapshots_frequent[$st][$index_frequent]["legend"] = "CC0000";
                                } else {
                                    $snapshots_frequent[$st][$index_frequent]["legend"] = "000000";
                                }

                                if ($snapshots_frequent[$st][$index_frequent]["totaldifference"]>0) {
                                    $snapshots_frequent[$st][$index_frequent]["totallegend"] = "00CC00";
                                } elseif ($snapshots_frequent[$st][$index_frequent]["totaldifference"]<0) {
                                    $snapshots_frequent[$st][$index_frequent]["totallegend"] = "CC0000";
                                } else {
                                    $snapshots_frequent[$st][$index_frequent]["totallegend"] = "000000";
                                }
                                 
                            }
                        }
                         
 
                        if ($daychanged) {
                            $index_frequent++;
                        }
                        $daychanged = false;

                    }
    $this->set('snapshots_frequent',$snapshots_frequent);                
    } 
    $this->render('memberstatusAjaxTable','ajax');
  }
  
}

