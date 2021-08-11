<?php

/**
 * getInformationFromIP - quick way to get all possible information from an IP
 * Written by Emre Yavuz & github.com/emreyvz
 */
class getInformationFromIP
{

    /**
     * Initial variables
     *
     *@param $currentCountry;
     *@param $currentCountryCode;
     *@param $currentPlateNumber;
     *@param $currentRegionName;
     *@param $currentCity;
     *@param $currentCip;
     *@param $currentLat;
     *@param $currentLon;
     *@param $timezone;
     *@param $isp;
     *@param $org;
     *@param $as;
     *@param $ip;
     */
    



    public $currentCountry;
    public $currentCountryCode;
    public $currentPlateNumber;
    public $currentRegionName;
    public $currentCity;
    public $currentCip;
    public $currentLat;
    public $currentLon;
    public $timezone;
    public $isp;
    public $org;
    public $as;
    public $ip;



    /**
     * Getter and Setter Functions
     */
    function setCurrentCountry($country)
    {
        $this->currentCountry = $country;
    }

    function setCurrentCountryCode($countryCode)
    {
        $this->currentCountryCode = $countryCode;
    }

    function setCurrentPlateNumber($plateNumber)
    {
        $this->currentPlateNumber = $plateNumber;
    }

    function setCurrentRegionName($regionName)
    {
        $this->currentRegionName = $regionName;
    }

    function setCurrentCity($city)
    {
        $this->currentCity = $city;
    }

    function setCurrentZip($zip)
    {
        $this->currentZip = $zip;
    }

    function setCurrentLat($lat)
    {
        $this->currentLat = $lat;
    }

    function setCurrentLon($lon)
    {
        $this->currentLon = $lon;
    }

    function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }

    function setIsp($isp)
    {
        $this->isp = $isp;
    }

    function setOrg($org)
    {
        $this->org = $org;
    }

    function setAs($as)
    {
        $this->as = $as;
    }

    function setIp($ip)
    {
        $this->ip = $ip;
    }


    function getCurrentCountry()
    {
        return $this->currentCountry;
    }

    function getCurrentCountryCode()
    {
        return $this->currentCountryCode;
    }

    function getCurrentPlateNumber()
    {
        return $this->currentPlateNumber;
    }

    function getCurrentRegionName()
    {
        return $this->currentRegionName;
    }

    function getCurrentCity()
    {
        return $this->currentCity;
    }

    function getCurrentZip()
    {
        return $this->currentZip;
    }

    function getCurrentLat()
    {
        return $this->currentTat;
    }

    function getCurrentLon()
    {
        return $this->currentLon;
    }

    function getTimezone()
    {
        return $this->timezone;
    }

    function getIsp()
    {
        return $this->isp;
    }

    function getOrg()
    {
        return $this->org;
    }

    function getAs()
    {
        return $this->as;
    }

    function getIp()
    {
        return $this->ip;
    }



    /**
     * Method for clearing Turkish characters from city name
     *
     * @param $cityName
     * 
     * @return string
     */

    function clearTrCharacter($cityName)
    {
        $cityName = strtolower($cityName);
        $cityName = str_replace("ı", "i", $cityName);
        $cityName = str_replace("ü", "u", $cityName);
        $cityName = str_replace("ğ", "g", $cityName);
        $cityName = str_replace("ş", "s", $cityName);
        $cityName = str_replace("ö", "o", $cityName);
        $cityName = str_replace("ç", "c", $cityName);
        return $cityName;
    }



    /**
     * Method for getting ISP logo by using AS code
     * @return string
     */

    function getISPLogo()
    {

        $ispLogos = array(
            "AS9121" => "https://www.turktelekom.com.tr/assets/img/turk-telekom.png?v=1",
            "AS47331" => "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/TTNET_logo_%282006-2016%29.svg/500px-TTNET_logo_%282006-2016%29.svg.png",
            "AS16135" => "https://telefonbilgisi.net/wp-content/uploads/2017/04/turkcell_7_6.png",
            "AS34984" => "https://seeklogo.com/images/T/Tellcom-logo-984DB66211-seeklogo.com.gif",
            "AS20978" => "https://upload.wikimedia.org/wikipedia/tr/8/8b/Ttnet.jpg",
            "AS15897" => "https://iayosb.com/wp-content/uploads/2020/02/vodafone.png",
            "AS8386" => "https://iayosb.com/wp-content/uploads/2020/02/vodafone.png",
            "AS47524" => "http://www.turksat.com.tr/sites/default/files/2020-04/turksat_logotip_cmyk-01.png",
            "AS15924" => "https://iayosb.com/wp-content/uploads/2020/02/vodafone.png",
            "AS9021" => "https://www.isnet.net.tr/img/isnet_logo_72dpi.png",
            "AS12735" => "https://kurumsal.turk.net/images/logo@2x.png"
        );

        return $ispLogos[$this->getAs()];
    }


    /**
     * Simple method for making request using cURL without header.
     *
     * @param $url
     * 
     * @return string
     */

    function requestWithNoHeader($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        return curl_exec($curl);
    }

    
    /**
     * Method that fetch all essential data from ip-api.com
     */
    function fetchData()
    {
        $jsonData = $this->requestWithNoHeader("http://ip-api.com/json/" . $this->ip);
        $ipDetails = json_decode($jsonData, true);
        $this->setCurrentCountry($ipDetails["country"]);
        $this->setCurrentCountryCode($ipDetails["countryCode"]);
        $this->setCurrentPlateNumber($ipDetails["region"]);
        $this->setCurrentRegionName($ipDetails["regionName"]);
        $this->setCurrentCity($ipDetails["city"]);
        $this->setCurrentZip($ipDetails["zip"]);
        $this->setCurrentLat($ipDetails["lat"]);
        $this->setCurrentLat($ipDetails["lon"]);
        $this->setTimezone($ipDetails["timezone"]);
        $this->setIsp($ipDetails["isp"]);
        $this->setOrg($ipDetails["org"]);
        $this->setAs(explode(" ", $ipDetails["as"])[0]);
        $this->setIp($ipDetails["query"]);
    }
}
