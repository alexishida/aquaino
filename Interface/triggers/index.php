<?php
require_once('../classes/config.php');
require_once('../classes/autoload.php');


// create an instance of the class with L.A.'s WOEID
$weather = new YahooWeather(455901, 'c');
$temperature = $weather->getTemperature();
$situacao = $weather->getDescription();
$city = $weather->getLocationCity();
$country = $weather->getLocationCountry();
$forecast = $weather->getForecastTomorrowHigh();


echo "<img src=\"../assets/img/yahoo-weather-flat/".$weather->getConditionCode().".png\" />";
echo "<br/>";
echo "It is now $temperature in $city, $country. ";
echo "Tomorrow's temperature will reach a maximum of $forecast. $situacao";
?>