<?php
require 'vendor/autoload.php';
use Plivo\RestClient;
use Plivo\Exceptions\PlivoRestException;
$client = new RestClient("Auth ID", "Auth token");

$customers_real_number = $_POST["Customer_Phonenumber"];
try {
    $response = $client->calls->create(
        '3213213213',
        [$customers_real_number],
        'https://gist.githubusercontent.com/loki-NK/dc4c5d9a9cf9407c50668a73f170505a/raw/d68f369eaed70701ae70f4fafdb0b9a925029da2/conference.xml',
        'GET'
    );
    $t=$response->getStatusCode();
    if ($t=200)
      {
        echo "Here";
        try {
            $response = $client->calls->create(
                '3213213213',
                ["Agents number"],
                'https://gist.githubusercontent.com/loki-NK/dc4c5d9a9cf9407c50668a73f170505a/raw/d68f369eaed70701ae70f4fafdb0b9a925029da2/conference.xml',
                'GET'
            );
          } catch (PlivoRestException $exc) {
              echo($exc);
          };
      }
    else echo ("Call failed");
  }
  catch (PlivoRestException $ex) {
    echo($ex);
};
header("Location: confirmation.html");
?>
