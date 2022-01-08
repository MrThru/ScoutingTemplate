<?php
require __DIR__ . '/vendor/autoload.php';
$client = new \Google_Client();
$client->setApplicationName('Google Sheets');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__ . '/credentials.json');

$service = new Google_Service_Sheets($client);
$spreadsheetID = "13rIxkjKQaMI7t5B-tH6fSLR3BqNv6QFFbgu4NuK7rgU";

$range = "DB1!A1:B10";
$values = [
    ["Test", "Test1"],
];

$body = new Google_Service_Sheets_ValueRange([
    'values' => $values
]);
$params = [
    'valueInputOption' => 'RAW'
];
$result = $service->spreadsheets_values->update(
    $spreadsheetID,
    $range,
    $body,
    $params
);
?>