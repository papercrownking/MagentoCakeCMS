<?php if(!empty($snapshots_frequent)): ?>
  <div class="grid" style="width: 100%;overflow: hidden;overflow: scroll;">
    <div class="hor-scroll">
    <table cellspacing="0" class="data">
  	<?php
          $rowcount = 0;
          foreach ($snapshots_frequent as $st => $row) {
            $rowcount++;
            if ($rowcount==1) {
              echo "<thead><tr class='headings'>";
                echo "<th class='no-link'><span class='nobr'>Status</span></th>";
                foreach ($row as $col) {
                echo "<th class='no-link'><span class='nobr'>".(date("M d",strtotime($col["date"])))."</span></th>";                
                }
              echo "</tr></thead><tbody>";   
                                
                                        echo "<tr class='pointer even'>";
                                        echo "<td width='50' nowrap>TOTAL MEMBERS</td>";
                                        foreach ($row as $col) {
                                            echo "<td width='30' valign='top'><span style='color:#".$col["totallegend"]."'>".number_format($col["totalmember"])."</span>&nbsp;&nbsp;<br><small style='font-size:10px'>". (($col["totaldifference"]!=0)?(($col["totaldifference"]>0)?"+".number_format($col["totaldifference"]):number_format($col["totaldifference"])):"&nbsp;") ."</small></td>\n";
                                        }
                                        echo "</tr>\n";
            }
            
			    if($rowcount&1){ $rowClass = 'pointer'; } else { $rowClass = 'pointer even'; }             
                                    echo "<tr class='".$rowClass."'>";
                                        echo "<td width='50' valign='top'><strong>". $st."</strong></td>\n";
                                        foreach ($row as $col) {
                                            echo "<td width='30' valign='top'><span style='color:#".$col["legend"]."'>". number_format($col["total"]) ."</span><br><small style='font-size:10px'>". (($col["difference"]!=0)?(($col["difference"]>0)?"+".number_format($col["difference"]):number_format($col["difference"])):"&nbsp;") ."</small></td>\n";
                                        }
                                    echo "</tr>";            
          }            
        
      ?>
        </tbody>
      </table>
    </div>
  </div>
<?php else: ?>  
  <div class="grid" style="width: 100%;">
    <div class="hor-scroll">
      <table cellspacing="0" class="data">
        <tbody>
          <tr>
            <td style="text-align:center;">NO DATA FOUND</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
<?php endif; ?>