<?php
// Mobday PHP API  Ad Request
// Version: v2.0

///////////////////////////// function mobday_ads BEGIN ////
function mobday_ads()
{
error_reporting(0);
///// Publisher ID

$PubID="67115";

/////Set ad format display
///$ad_format="1"; ///=> only Text Ad
///$ad_format="2"; ///=> only Ad Banner
///$ad_format="0"; ///=> Both Types (recommend)

$ad_format="1";

///// Adult ADS ? (otipnal for Non-Adult Publishers)
///$ad_adult="1"; ///=>show Also Adult Ads
///$ad_adult="0"; ///=>no Adult Ads

$ad_adult="0";


// API Version . Do not change it

$md_api_version="v2.2";

//////Test mode
/// $md_test="1"; ///=> Test mode activ (demo ads)
/// $md_test="0"; ///=> Running payable Ads
$md_test_mode="0";

//////////////////////////Do NOT make any change next /////
$mobday_data=&$_SERVER;

//Request URL Ads // do not change it or do not remove parameters
$mobday_req_url="http://api.mobday.com/ReqAds.php?PubID=$PubID&AdFormat=$ad_format&AdultAds=$ad_adult&test_m=$md_test_mode&md_api=$md_api_version";


$mobday_timeout = 5;

$mobday_cop= array (
CURLOPT_URL             => $mobday_req_url,
CURLOPT_RETURNTRANSFER  => true,
CURLOPT_HEADER          => false,
CURLOPT_HTTPPROXYTUNNEL => true,
CURLOPT_POST            => true,
CURLOPT_POSTFIELDS      => $mobday_data,
CURLOPT_CONNECTTIMEOUT  => $mobday_timeout,
CURLOPT_TIMEOUT         => $mobday_timeout,
);
$mobday_ch = curl_init();
curl_setopt_array( $mobday_ch, $mobday_cop );

$mobday_response = curl_exec($mobday_ch);
$mobday_info= curl_getinfo($mobday_ch);
curl_close($mobday_ch);

if($mobday_info["http_code"]==200){


return  $mobday_response; //response from mobday.com

}

}
///////////////////// function mobday_ads  END ////////////

////////////////////Call function mobday_ads to show Ad ///

echo mobday_ads();     //// you can copy|paste on your page  where you desire to show ads
?>
