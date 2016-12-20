$query = "SELECT * FROM content";
    $navigationArray = array();
    $result = mysql_query($query); 
    if ($result) {
		while ($r = mysql_fetch_array($result)) {
        	$contentPageN = $r["page"];
        	$contentLinkN = $r['extra1'];
        	$contentID = $r['contentID'];
        	if($contentPageN=="/") {
        		$contentTitleN = "Home";
        		$contentPageN = "/";
        	}elseif($contentLinkN) {
        		$contentTitleN = $r["title"];
       			$contentPageN = "$contentLinkN";
        	}else{
       			$contentTitleN = $r["title"];
       			$contentPageN = "/$subDirectory$contentPageN";
        	}
        	$contentTitleN=str_replace("&","&amp;",$contentTitleN);
           	$contentIDN = $r['contentID'];
			$navigationArray[$contentIDN]["contentPage"] = $contentPageN;
			$navigationArray[$contentIDN]["contentTitle"] = $contentTitleN;
			$navigationArray[$contentIDN]["contentID"] = $contentIDN;
			$navigationArray[$contentIDN]["contentSub"] = array();
		} // end while
    } // end if
