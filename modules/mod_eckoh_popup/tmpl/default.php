<?php defined('_JEXEC') or die;

$cookie_name = "popup";
//$cookie_value = "no";
//setcookie($cookie_name, $cookie_value, time() + (86400 * 3), "/"); //86400 = 1 day
?>

<!-- BF CHECK IF THE COOKIE IS SET -->
  <?php
    // echo 'name of the cookie ' . $cookie_name;
    // echo '<br> value of the cookie ' .  $_COOKIE[$cookie_name];

    if ((isset($_COOKIE[$cookie_name])) && ($_COOKIE[$cookie_name] === 'yes'))  {
      $cookie_value = "yes";
      } else {
        $cookie_value = "no";
      }

  ?>

<?php
//var_dump($cookie_value);
$location = ip_info("Visitor");
//----------BF GET USER LOCATION  ------------------------
//---------------------------------------------------------------------------
              // Function to get location based on IP
              //---------------------------------------------------------------------------
              //echo $this->ip_info("Visitor", "Country") . "<br />"; // India
              //echo $this->ip_info("Visitor", "Country Code") . "<br />"; // IN
              //echo $this->ip_info("Visitor", "State") . "<br />"; // Andhra Pradesh
              //echo $this->ip_info("Visitor", "City") . "<br />"; // Proddatur
              //echo $this->ip_info("Visitor", "Address") . "<br />"; // Proddatur, Andhra Pradesh, India
              //print_r($this->ip_info("Visitor", "Location")) . "<br />"; // Array ( [city] => Proddatur [state] => Andhra Pradesh [country] => India [country_code] => IN [continent] => Asia [continent_code] => AS )
              function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
                             $output = NULL;
			/*
                             if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
                                           $ip = $_SERVER["REMOTE_ADDR"];
                                           if ($deep_detect) {
                                                          if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                                                                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                                                          if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                                                                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                                           }
                             }
			*/
				$ipSplit = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
				$ip = $ipSplit[0];
				if($ip == "") { $ip =  $ip = $_SERVER["REMOTE_ADDR"]; }
                             $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
                             $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
                             $continents = array(
                                           "AF" => "Africa",
                                           "AN" => "Antarctica",
                                           "AS" => "Asia",
                                           "EU" => "Europe",
                                           "OC" => "Australia (Oceania)",
                                           "NA" => "North America",
                                           "SA" => "South America"
                             );
                             if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
                                           $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
                                           if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                                                          switch ($purpose) {
                                                                        case "location":
                                                                                      $output = array(
                                                                                                     "city"           => @$ipdat->geoplugin_city,
                                                                                                     "state"          => @$ipdat->geoplugin_regionName,
                                                                                                     "country"        => @$ipdat->geoplugin_countryName,
                                                                                                     "country_code"   => @$ipdat->geoplugin_countryCode,
                                                                                                     "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                                                                                                     "continent_code" => @$ipdat->geoplugin_continentCode
                                                                                      );
                                                                                      break;
                                                                        case "address":
                                                                                      $address = array($ipdat->geoplugin_countryName);
                                                                                      if (@strlen($ipdat->geoplugin_regionName) >= 1)
                                                                                                     $address[] = $ipdat->geoplugin_regionName;
                                                                                      if (@strlen($ipdat->geoplugin_city) >= 1)
                                                                                                     $address[] = $ipdat->geoplugin_city;
                                                                                      $output = implode(", ", array_reverse($address));
                                                                                      break;
                                                                        case "city":
                                                                                      $output = @$ipdat->geoplugin_city;
                                                                                      break;
                                                                        case "state":
                                                                                      $output = @$ipdat->geoplugin_regionName;
                                                                                      break;
                                                                        case "region":
                                                                                      $output = @$ipdat->geoplugin_regionName;
                                                                                      break;
                                                                        case "country":
                                                                                      $output = @$ipdat->geoplugin_countryName;
                                                                                      break;
                                                                        case "countrycode":
                                                                                      $output = @$ipdat->geoplugin_countryCode;
                                                                                      break;
                                                          }
                                           }
                             }
                             return $output;
              }
             //------------------------------------END OF BF GET USER LOCATION -------------------------------------
              //$cookie_value = "no";
              //$location = "OC";
 // GET THE PAGE location
 // GET THE USER LOCATION 

 $continent_code = $location['continent_code'];
 $currentPage = $_SERVER['REQUEST_URI'];

//preg_match('/us/', $currentPage, $matches);
//-----------
//REVERT BACK TO THIS PREGMATCH 
//preg_match('/\/us\//', $currentPage, $matches);
//------------
//echo 'match 1 ';
$pattern = '/^(\/us\/?|\/us\/.*)$/';
preg_match($pattern, $currentPage, $matches);
//var_dump($matches);
//$continent_code = "US";

$ip = $_SERVER["REMOTE_ADDR"];

//echo '<!--';
//var_dump($matches, $continent_code, $location['continent_code'], $ip);
//var_dump($currentPage);
// echo '-->';

//FORCE USER LOCATION --
//$continent_code = "US";


if (($continent_code === "US") || ($continent_code === "NA") || ($continent_code === "SA") || ($continent_code === "OC") AND (isset($matches[0]) === false ) ) { 
?>

<!-- if a us page 
  add the us popup -->
  <!-- popup box -->

     <div id="myModal" <?php echo ' class="bfModal ' . $cookie_value . '"' ; ?> >

    <!-- pop up content -->

      <div <?php echo ' class="bfmodal-content ' . $cookie_value . '"';?> >

<!--        <span class="bfclose">&times;</span>-->
    <!-- put if statement php to set href link -->
    <!-- if the user is from uk(visiting us site) display uk link  -->

    <?php echo '<p>We notice that you’re on our UK site, the version that serves your region is the US Eckoh site.</p>'; ?>
    	<div>
        	<span class="con">
          	<?php echo '<a id="go-to-us" class="back" href="https://www.eckoh.com/us"/>Go to US site.</a>';?>
        	</span>
        	<span class="con"><a id="stay-on-uk" class="exit">Stay on UK site</a></span>
    	</div>
    <!-- end popup content -->
  	</div>
  </div>

    <?php  
      $cookie_value = "yes";
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
  } 

  elseif (($continent_code === "GB") || ($continent_code === "EU") || ($continent_code === "AS") || ($continent_code ==="AF") AND (isset($matches[0]) === true )) { ?>

        <!-- popup box -->
       <div id="myModal" <?php echo ' class="bfModal ' . $cookie_value . '"' ; ?> > 
        <!-- pop up content -->
        	<div <?php echo ' class="bfmodal-content ' . $cookie_value . '"';?> >

<!--          <span class="bfclose">&times;</span>-->

          <!-- put if statement php to set href link -->

          <!-- if the user is from uk(visiting us site) display uk link  -->

          <?php echo '<p>We notice that you’re on our US site, the version that serves your region is the UK Eckoh site.</p>'; ?>

			<div>
         		<span class="con">
            	<?php echo '<a id="go-to-uk" class="back" href="https://www.eckoh.com">Go to UK site</a>';?>
            	</span>
            	<span class="con"><a id="stay-on-us" class="exit">Stay on US site</a></span>
			</div>
        </div>
      </div>

      <!-- end popup content -->
        <?php $cookie_value = "yes";
          setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    } else {



    }
    //}
    ?>

<!-- end pop box -->
