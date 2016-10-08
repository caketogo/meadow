<?php 
	global $global_config;
	if($PerPage!="") {
		$NumPages 	 = ($TotalNum%$PerPage)==0 ? floor($TotalNum/$PerPage): floor($TotalNum/$PerPage)+1 ; //Number of Pages taking $PerPage per Page
		if(($NumPages%5)==0) {
			$NumDisplay =  floor($NumPages/5);
			$NumDisplay = ($NumDisplay-1)*5+1;
		} else {
			$NumDisplay = floor($NumPages/5);
			$NumDisplay = $NumDisplay*5+1; 
		}
		if($NumPages>=1) {
			$intPerPage ="<table width='100%' border='0' cellspacing='0' cellpadding='0' align='right'><tr><td class='pagefont' nowrap width='10%' >"; // align=left
			$PerPageFrom = ($Start+1);
			$PerPageTo = $Start+$PerPage;
			if($PerPageTo > $TotalNum)
				$PerPageTo = $TotalNum;
			$intPerPage.="&nbsp;&nbsp;"."Now showing $PerPageFrom to $PerPageTo of $TotalNum results";
			$intPerPage.="</td><td align='right' class='link_active' height='30' style='padding-right: 7px;'>";
			if($Page!=0 && $Display!=1)	{
				$strPage = $Page-5;
				$strDisplay = $Display-5;
				$intPerPage.= "<a href='javascript:ShiftPage(0,1)'  style='outline:0;'>";
				$intPerPage.="<img src='".$global_config['site_imagepath']."leftfirst.gif' border='0' title='First Page' align='absbottom'></a>&nbsp;";
				$intPerPage.="<a href='javascript:ShiftPage(".($Display-6).",".($Display-5).")' style='outline:0;'>";
				$intPerPage.="<img src='".$global_config['site_imagepath']."left1.gif' border='0' title='Previous Page' align='absbottom'></a>&nbsp;&nbsp;";
			}
			$Interval = $Display+4;
			if($Interval>=$NumPages) {
				$Interval = $NumPages;
				$DFLAG = 1;
			}
			for($i=$Display;$i<=$Interval;$i++)	{
				if($Page==$i-1)	{
					$intPerPage.="<span>$i</span>&nbsp;";
				} else {
					$I=$i-1;			
					$intPerPage.="<a href='javascript:ShiftPage(".$I.",".$Display.")' style='outline:0;'>"; 
					$intPerPage.="<span class='link'>$i</span>";
					$intPerPage.="</a>&nbsp;";
				}
			}
			if($DFLAG!=1) {
				$I=$i-1;
				$Display1=$Display+5;
				$NumDisplay1=$NumDisplay;
				$intPerPage.="&nbsp;<a href='javascript:ShiftPage(".$I.",".$Display1.")' style='outline:0;'>";
				$intPerPage.="<img src='".$global_config['site_imagepath']."right1.gif' border='0' title='Next Page' align='absbottom'></a>&nbsp;"; 
				$intPerPage.="<a href='javascript:ShiftPage(".($NumPages-1).",".$NumDisplay1.")' style='outline:0;'>";
				$intPerPage.="<img src='".$global_config['site_imagepath']."rightlast.gif' border='0' title='Last Page' align='absbottom'></a>&nbsp;";
			} 
			$intPerPage.="</td>";
			$intPerPage.="</tr>";
			$intPerPage.="</table>";
		} 
	}
?>