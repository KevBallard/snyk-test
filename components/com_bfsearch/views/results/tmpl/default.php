<?php
$usItems = $this->usItems;
$investorItems = $this->investorItems;
$ukItems = $this->ukItems;
$docs = $this->docs;


usort($usItems, function($a, $b) {
    return $b['matchcount'] - $a['matchcount'];
});

usort($investorItems, function($a, $b) {
    return $b['matchcount'] - $a['matchcount'];
});

usort($ukItems, function($a, $b) {
    return $b['matchcount'] - $a['matchcount'];
});

usort($docs, function($a, $b) {
    return $b['matchcount'] - $a['matchcount'];
});


function cleanupDesc($description){
	
	$chartrim = 300;
	
	$description = str_replace("&nbsp;"," ",$description);
	$description = strip_tags($description);
	$description = preg_replace('/\[.*\]/', '', $description);
	$description = preg_replace('/\{.*\}/', '', $description);
	$description = strlen($description) > $chartrim ? substr($description,0,$chartrim)."..." : $description;
	
	if($description) { $description . "&nbsp;&nbsp;";}
	
	return $description;
}






$currentLang = "uk";
$currentPage = $_SERVER['REQUEST_URI'];
if (strpos($currentPage, '/us/') !== false) { $currentLang = "us"; }
if (strpos($currentPage, '/investors/') !== false) { $currentLang = "investors"; }


if($currentLang == "uk"){
	$tabids = explode(",","uk,us,investors,documents");
	$tablabels = explode(",","UK,US,Investors,Documents");
	$activeus = "";
	$activeuk = " active";
	$activeinvest = "";
}
if($currentLang == "us"){
	$tabids = explode(",","us,uk,investors,documents");
	$tablabels = explode(",","US,UK,Investors,Documents");
	$activeus = " active";
	$activeuk = "";
	$activeinvest = "";
}
if($currentLang == "investors"){
	$tabids = explode(",","investors,uk,us,documents");
	$tablabels = explode(",","Investors,UK,US,Documents");
	$activeus = "";
	$activeuk = "";
	$activeinvest = " active";
}
?>


<script src="<?php echo JURI::root(); ?>components/com_bfsearch/assets/js/jquery.easyPaginate.js"></script>
<script type="text/javascript">
jQuery(document).ready(function () {
	jQuery('#ukpage, #uspage, #investorspage, #documentpage').easyPaginate({
		paginateElement: 'span',
		elementsPerPage: 10,
		effect: 'fade',
		firstButton: false,
		lastButton: false,
		prevButtonText: 'PREV',
		nextButtonText: 'NEXT'
	});
});
</script>






<form action="bfsearch" method="GET">
	<input type="text" name="searchterm" id="searchterm" value="<?php echo $_GET["searchterm"];?>">
	<input type="submit" value="Search" />
</form>

<div id="tab" class="btn-group" data-toggle="buttons-radio">
  <a href="#<?php echo $tabids[0]; ?>" class="btn active" data-toggle="tab"><?php echo $tablabels[0]; ?></a>
  <a href="#<?php echo $tabids[1]; ?>" class="btn" data-toggle="tab"><?php echo $tablabels[1]; ?></a>
  <a href="#<?php echo $tabids[2]; ?>" class="btn" data-toggle="tab"><?php echo $tablabels[2]; ?></a>
  <a href="#<?php echo $tabids[3]; ?>" class="btn"  data-toggle="tab"><?php echo $tablabels[3]; ?></a>
</div>
 
 
 
 
 
 
<div class="tab-content">



	<div class="tab-pane<?php echo $activeuk; ?>" id="uk">
  
		<h2>UK</h2>
		
		<?php if($ukItems) {?>
		
			<div id="ukpage">
			
				<?php foreach($ukItems as $links) {?>
					
					<span class="resultwrap">
						<a class="resulttitle" href="<?php echo $links["link"];?>"><?php echo $links["title"];?></a>
						<div class="resultdesc"><?php echo cleanupDesc($links["description"]);?><a class="resultmore" href="<?php echo $links["link"];?>">readmore</a></div>
					</span>
					
				<?php } ?>
			
			</div>
		<?php } else {?>
			<p>No results found within UK content.</p>
		<?php } ?>
		
	</div>
  
  
  
  
  
    
	<div class="tab-pane<?php echo $activeus; ?>" id="us">
	
		<h2>US</h2>
		
		<?php if($usItems) {?>
		
			<div id="uspage">
			
				<?php foreach($usItems as $links) {?>
					
					<span class="resultwrap">
						<a class="resulttitle" href="<?php echo $links["link"];?>"><?php echo $links["title"];?></a>
						<div class="resultdesc"><?php echo cleanupDesc($links["description"]);?><a class="resultmore" href="<?php echo $links["link"];?>">readmore</a></div>
					</span>
					
				<?php } ?>
			
			</div>
		<?php } else {?>
			<p>No results found within UK content.</p>
		<?php } ?>
		
	</div>
	
	
	



	<div class="tab-pane<?php echo $activeinvest; ?>" id="investors">
	
		<h2>Investors</h2>
		
		<?php if($investorItems) {?>
		
			<div id="investorspage">
			
				<?php foreach($investorItems as $links) {?>
					
					<span class="resultwrap">
						<a class="resulttitle" href="<?php echo $links["link"];?>"><?php echo $links["title"];?></a>
						<div class="resultdesc"><?php echo cleanupDesc($links["description"]);?><a class="resultmore" href="<?php echo $links["link"];?>">readmore</a></div>
					</span>
					
				<?php } ?>
			
			</div>
		<?php } else {?>
			<p>No results found within UK content.</p>
		<?php } ?>
		
	</div>
	
	
	
	
	
	<div class="tab-pane" id="documents">
	
		<h2>Documents</h2>
		
		<?php if($docs) {?>
		
			<div id="documentpage">
			
				<?php foreach($docs as $links) {?>
					
					<span class="resultwrap">
						<a class="resulttitle" href="<?php echo $links["link"];?>"><?php echo $links["title"];?></a>
						<div class="resultdesc"><?php echo cleanupDesc($links["description"]);?><a class="resultmore" href="<?php echo $links["link"];?>">readmore</a></div>
					</span>
					
				<?php } ?>
			
			</div>
		<?php } else {?>
			<p>No results found within UK content.</p>
		<?php } ?>
		
	</div>
	
	
</div>









<style>
/* Basic Pagnation Styling only */
#easyPaginate {width:300px;}
#easyPaginate img {display:block;margin-bottom:10px;}
.easyPaginateNav a {padding:5px;}
.easyPaginateNav a.current {font-weight:bold;text-decoration:underline;}



/* Basic Page Styling */
.resulttitle{font-weight:bold;}
.resultwrap{
	border-bottom: 1px solid #AD1D40;
	display: block;
	margin: 30px;
	padding-bottom: 30px;
}
</style>