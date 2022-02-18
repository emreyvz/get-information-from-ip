![](https://i.ibb.co/VmnYW5z/background.png)

# A PHP Library for getting all possible information from an IP Address

This PHP library provides to get all possible information from an IP address. For example it can retrieve user's country, lat-long values, country code, zip code, ISP etc.
> This library written by Emre Yavuz | github.com/emreyvz

**Accessible Properties**

- currentCountry
- currentCountryCode
- currentPlateNumber
- currentRegionName
- currentCity
- currentZip
- currentLat
- currentLon
- timezone
- isp
- org
- as
- ip

**Accessible Methods**

- getISPLogo(@param)
- clearTrCharacter(@param)
- requestWithNoHeader(@param)


# Examples
---
## Get user's city by IP address

```php
$getInformationFromIP = new getInformationFromIP();
$getInformationFromIP->ip="198.51.100.0";
$getInformationFromIP->fetchData();
echo "City: " .$getInformationFromIP->getCurrentCity();
```



## Print ISP name And Logo
> Some ISPs and logos may not avaible. Add 'AS Code' and ISP Logo URL to getISPLogo() method for proper return
```php
$getInformationFromIP = new getInformationFromIP();
$getInformationFromIP->ip="198.51.100.0";
$getInformationFromIP->fetchData();
echo "ISP: " .$getInformationFromIP->getIsp();
echo "<img src='". $getInformationFromIP->getISPLogo() ."'>";
```

## Block users to access a specific page by country code

```php
$bannedCountries = ["AU","AZ","ES"];
$getInformationFromIP = new getInformationFromIP();
$getInformationFromIP->ip="198.51.100.0";
$getInformationFromIP->fetchData();
if (in_array($getInformationFromIP->getCurrentCountryCode(), $bannedCountries))
{
  header("Location: yourCountryBannedFromThisPage.html");
}
```

## ... or vice versa: Accept users to a specific page by country code

```php
$acceptedCountries = ["AU","AZ","ES"];
$getInformationFromIP = new getInformationFromIP();
$getInformationFromIP->ip="198.51.100.0";
$getInformationFromIP->fetchData();
if (!in_array($getInformationFromIP->getCurrentCountryCode(), $acceptedCountries))
{
  header("Location: yourCountryBlockedFromThisPage.html");
}
```

## License

<img src="https://opensource.org/files/osi_keyhole_300X300_90ppi_0.png" height="24" width="24">

- **[Apache 2.0 License](https://www.apache.org/licenses/LICENSE-2.0)**
- 2022 © Emre Yavuz
