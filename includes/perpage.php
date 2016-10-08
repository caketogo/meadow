<?php
class PS_Pagination {
	var $php_self;
	var $rows_per_page = 10; //Number of records to display per page
	var $total_rows = 0; //Total number of rows returned by the query
	var $links_per_page = 5; //Number of links to display per page
	var $append = ""; //Paremeters to append to pagination links
	var $sql = "";
	var $debug = false;
	var $conn = false;
	var $page = 0;
	var $max_pages = 0;
	var $offset = 0;
	
	/**
	 * Constructor
	 *
	 * @param resource $connection Mysql connection link
	 * @param string $sql SQL query to paginate. Example : SELECT * FROM users
	 * @param integer $rows_per_page Number of records to display per page. Defaults to 10
	 * @param integer $links_per_page Number of links to display per page. Defaults to 5
	 * @param string $append Parameters to be appended to pagination links 
	 */
	
	function PS_Pagination($rows_per_page = 10, $links_per_page = 5) {
		$this->rows_per_page = (int)$rows_per_page;
		if (intval($links_per_page ) > 0) {
			$this->links_per_page = (int)$links_per_page;
		} else {
			$this->links_per_page = 5;
		}
		$this->append = $append;
		$this->php_self = htmlspecialchars($_SERVER['PHP_SELF'] );
		if (isset($_REQUEST['Page'] )) {
			$this->page = intval($_REQUEST['Page'] );
		}
	}
	
	/**
	 * Executes the SQL query and initializes internal variables
	 *
	 * @access public
	 * @return resource
	 */
	function paginate($total_records) {
		//Find total number of rows
		$this->total_rows = $total_records;
		
		//Return FALSE if no rows found
		if ($this->total_rows == 0) {
			return FALSE;
		}
		
		//Max number of pages
		$this->max_pages = ceil($this->total_rows / $this->rows_per_page );
		if ($this->links_per_page > $this->max_pages) {
			$this->links_per_page = $this->max_pages;
		}
		
		//Check the page value just in case someone is trying to input an aribitrary value
		if ($this->page > $this->max_pages || $this->page < 0) {
			$this->page = 0;
		}
	}
	
	/**
	 * Display the link to the first page
	 *
	 * @access public
	 * @param string $tag Text string to be displayed as the link. Defaults to 'First'
	 * @return string
	 */
	function renderFirst($tag = 'First') {
		global $global_config;
		
		if ($this->total_rows == 0)
			return FALSE;
		
		if($this->page > 0) {
			$batch = ceil(($this->page+1) / $this->links_per_page );
		} else {
			$batch = 1;
		}
		$end = $batch * ($this->links_per_page);
		if ($end == $this->page) {
			//$end = $end + $this->links_per_page - 1;
		//$end = $end + ceil($this->links_per_page/2);
		}
		if ($end > $this->max_pages) {
			$end = $this->max_pages;
		}
		$start = $end - $this->links_per_page;
		
		if ($this->page == 0 || $this->page == '') {
			return '<i class="fa fa-angle-left" style="color:#ccc"></i><i class="fa fa-angle-left" style="color:#ccc"></i>';
		} else {
			
			if($start == $this->page) {
				return '<a href="javascript:ShiftPage('.($start-10).');" title="Page by 10"><i class="fa fa-angle-left" ></i><i class="fa fa-angle-left" ></i></a>';
			} else {
				return '<a href="javascript:ShiftPage('.($start).');" title="Page by 10"><i class="fa fa-angle-left" ></i><i class="fa fa-angle-left" ></i></a>';
			}
		}
	}
	
	/**
	 * Display the link to the last page
	 *
	 * @access public
	 * @param string $tag Text string to be displayed as the link. Defaults to 'Last'
	 * @return string
	 */
	function renderLast($tag = 'Last') {
		global $global_config;
		
		if ($this->total_rows == 0)
			return FALSE;
	
		if($this->page > 0) {
			$batch = ceil(($this->page+1) / $this->links_per_page );
		} else {
			$batch = 1;
		}
		$end = $batch * ($this->links_per_page);
		
		if($this->max_pages > 0) {
			if($end-1 == $this->page) {
				if (($this->page+1) == $this->max_pages) {
					return '<i class="fa fa-angle-right" style="color:#ccc"></i><i class="fa fa-angle-right" style="color:#ccc"></i>';
				} else {
					if($end+9 < $this->max_pages) {
						return '<a href="javascript:ShiftPage('.($end+9).');" title="Page by 10"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a>';
					} else {
						return '<a href="javascript:ShiftPage('.($this->max_pages-1).');" title="Page by 10"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a>';
					}
				}
			} else {
				if (($this->page+1) == $this->max_pages) {
					return '<i class="fa fa-angle-right" style="color:#ccc"></i><i class="fa fa-angle-right" style="color:#ccc"></i>';
				} else {
					if($end-1 < $this->max_pages) {
						return '<a href="javascript:ShiftPage('.($end-1).');" title="Page by 10"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a>';
					} else {
						return '<a href="javascript:ShiftPage('.($this->max_pages-1).');" title="Page by 10"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a>';
					}
				}
			}
		} else {
			return "";
		}
	}
	
	/**
	 * Display the next link
	 *
	 * @access public
	 * @param string $tag Text string to be displayed as the link. Defaults to '>>'
	 * @return string
	 */
	function renderNext($tag = '&gt;&gt;') {
		global $global_config;
		
		if ($this->total_rows == 0)
			return FALSE;
		
		if($this->max_pages > 0) {
			if (($this->page+1) < $this->max_pages) {
				return '<a href="javascript:ShiftPage('.($this->page+1).');"><i class="fa fa-angle-right"></i></a>';
			} else {
				return '<i class="fa fa-angle-right" style="color:#ccc"></i>';
			}
		} else {
			return "";
		}
	}
	
	/**
	 * Display the previous link
	 *
	 * @access public
	 * @param string $tag Text string to be displayed as the link. Defaults to '<<'
	 * @return string
	 */
	function renderPrev($tag = '&lt;&lt;') {
		global $global_config;
		
		if ($this->total_rows == 0)
			return FALSE;
		
		if ($this->page > 0) {
			return '<a href="javascript:ShiftPage('.($this->page - 1).');"><i class="fa fa-angle-left"></i></a>';
		} else {
			return '<i class="fa fa-angle-left" style="color:#ccc"></i>';
		}
	}
	
	/**
	 * Display the page links
	 *
	 * @access public
	 * @return string
	 */
	function renderNav($prefix = '<span class="toplinks" >', $suffix = '</span>') {
		global $global_config;
		
		if ($this->total_rows == 0)
			return FALSE;
		
		if($this->page > 0) {
			$batch = ceil(($this->page+1) / $this->links_per_page );
		} else {
			$batch = 1;
		}
		$end = $batch * ($this->links_per_page);
		if ($end == $this->page) {
			//$end = $end + $this->links_per_page - 1;
		//$end = $end + ceil($this->links_per_page/2);
		}
		if ($end > $this->max_pages) {
			$end = $this->max_pages;
		}
		
		$start = $end - $this->links_per_page;
		for($i = $start; $i < $end; $i ++) {
			if ($i >= 0) {
				if ($i == $this->page) {
					$links .= "<li style='float:left; border-top: 1px solid #3c8dbc; border-right: 1px solid #3c8dbc; color:#fff; border-left: 1px solid #3c8dbc; border-bottom: 1px solid #3c8dbc; background-color: #3c8dbc; padding: 4px 8px 4px 8px;'><span class='navigation-no'>".($i+1)."</span></li>";
				} else {
					if($i < 9) {
						$links .= '<li style="float:left; border-top: 1px solid #ddd; border-left: 1px solid #ddd; border-bottom: 1px solid #ddd;  padding: 4px 8px 4px 8px;">'.$prefix . '<a style="text-decoration:none;" href="javascript:ShiftPage('.($i).');">' . ($i+1) . '</a>' . $suffix.'</li>' ;
					} else {
						$links .= '<li style="float:left; border-top: 1px solid #ddd; border-left: 1px solid #ddd; border-bottom: 1px solid #ddd;  padding: 4px 5px 4px 5px;">'.$prefix . '<a style="text-decoration:none;" href="javascript:ShiftPage('.($i).');">' . ($i+1) . '</a>' . $suffix.'</li>' ;
					}
				}
			}
			
		}
		
		return $links;
		
	}
	
	/**
	 * Display full pagination navigation
	 *
	 * @access public
	 * @return string
	 */
	function renderFullNav($Start,$PerPage) {
		if ($this->page == 0)
			$PerPageFrom = 1;
		else
			$PerPageFrom = ($Start+1);
		
		if($this->page == 0) {
			$col = '#212121';
		} else {
			$col = '#428bca';
		}
		
		if (($this->page+1) == $this->max_pages) {
			$PerPageTo = $this->total_rows;
			$col1 = '#212121';
		} else {
			$PerPageTo = $PerPageFrom+$PerPage-1;
			$col1 = '#428bca';
		}

		if($_SESSION['supMenu'] == 5) {
			$typePage = "files";
		} else { 
			$typePage = "results";
		}	
		
		if ($this->max_pages == 1) {
			if($this->total_rows > 0) {
				$intPerPage ='<div class="col-lg-12">';
				$intPerPage.='<div class="col-lg-6">';
				$intPerPage.="<table width='100%' border='0' cellspacing='0' cellpadding='0' align='right'><tr><td class='admin_href_txt1' style='font-size: 13px;color:#212121;' nowrap width='10%' >"; // align=left
				$intPerPage.="&nbsp;"."Showing $PerPageFrom to $PerPageTo of ".$this->total_rows.' '.$typePage;
				$intPerPage.="</td>";
				$intPerPage.="</tr>";
				$intPerPage.="</table>";
				$intPerPage.='</div><div class="col-lg-6">';
				/*$intPerPage.="<table border='0' cellspacing='0' cellpadding='0' align='right' class='table-bordered' style='font-size:16px;'><tr><td>";
				$intPerPage.= '<ul style="float: left; list-style-type: none; margin:0px!important; padding:0px !important;">';
				$intPerPage.= $this->renderNav(); 
				$intPerPage.= '</ul>';
				$intPerPage.="</td></tr></table>";*/
				$intPerPage.='</div>';
			}
		} else {
			if($this->total_rows > 0) {
				$intPerPage ='<div class="col-lg-12">';
				$intPerPage.='<div class="col-lg-6">';
				$intPerPage.="<table width='100%' border='0' cellspacing='0' cellpadding='0' align='right'><tr><td style='font-size: 13px;color:#212121;' class='admin_href_txt1' nowrap width='10%' >"; // align=left
				$intPerPage.="&nbsp;"."Showing $PerPageFrom to $PerPageTo of ".$this->total_rows.' '.$typePage;
				$intPerPage.="</td>";
				$intPerPage.="</tr>";
				$intPerPage.="</table>";
				$intPerPage.='</div><div class="col-lg-6">';
				$intPerPage.="<table border='0' cellspacing='0' cellpadding='0' align='right' style='font-size:16px;'><tr><td>";
				$intPerPage.='<div>';
				$intPerPage.= '<ul style="float: left; list-style-type: none; margin:0px!important; padding:0px !important;" class="pagenav">';
				if($this->max_pages > 10) {
				$intPerPage.= '<li style="float:left; border-top: 1px solid #ddd; border-left: 1px solid #ddd; border-bottom: 1px solid #ddd; padding: 4px 8px 4px 8px;">'.$this->renderFirst().'</li>'; 
				}
				$intPerPage.= '<li style="float:left; border-top: 1px solid #ddd; border-left: 1px solid #ddd; border-bottom: 1px solid #ddd; padding: 4px 10px 4px 10px;">'.$this->renderPrev().'</li>'; 
				$intPerPage.= $this->renderNav(); 
				if($this->max_pages > 10) {
					$intPerPage.= '<li style="float:left; border-top: 1px solid #ddd; border-left: 1px solid #ddd; border-bottom: 1px solid #ddd; padding: 4px 10px 4px 10px;">'.$this->renderNext().'</li>'; 
					$intPerPage.= '<li style="float:left; border: 1px solid #ddd;  padding: 4px 8px 4px 8px;"">'.$this->renderLast().'</li>'; 
				} else {
					$intPerPage.= '<li style="float:left; border: 1px solid #ddd; padding: 4px 10px 4px 10px;">'.$this->renderNext().'</li>'; 
				}
				$intPerPage.= '</ul><br>';
				$intPerPage.="<table border='0' cellspacing='0' cellpadding='0' width='100%' align='right' style='font-size:13px; '><tr><td style='width:50%; color:".$col.";'>";
				if ($this->page == 0 || $this->page == '') {
					$intPerPage.="Start";
				} else {
					$intPerPage.="<a href='javascript:ShiftPage(0);'>Start</a>";
				}
				$intPerPage.="</td><td align='right' style='color: ".$col1.";'>";
				
				if($this->max_pages > 0) {
					if (($this->page+1) == $this->max_pages) {
						$intPerPage.='End';
					} else {
						$intPerPage.='<a href="javascript:ShiftPage('.($this->max_pages-1).');" style="color:#3c8dbc">End</a>&nbsp;';
					}
				} else {
					$intPerPage.= 'End';
				}
				//$intPerPage.="End";
				$intPerPage.="</td></tr></table>";
				$intPerPage.='</div>';
				$intPerPage.="</td></tr></table>";
				$intPerPage.='</div>';
			}
		}		
		return $intPerPage;
	}
	
	/**
	 * Set debug mode
	 *
	 * @access public
	 * @param bool $debug Set to TRUE to enable debug messages
	 * @return void
	 */
	function setDebug($debug) {
		$this->debug = $debug;
	}
}
$links_per_page = 10;
if($PerPage != '') {
	$pager = new PS_Pagination($PerPage, $links_per_page);
	error_reporting(0);
	$pager->setDebug(true);
	
	$pager->paginate($TotalNum);
	
	$intPerPage = $pager->renderFullNav($Start,$PerPage);
}
?>