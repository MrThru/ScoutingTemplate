<?php

$spreadsheetID = "";

class DataBase {

    public static function connect() {
        require __DIR__ . '/vendor/autoload.php';
        $client = new \Google_Client();
        $client->setApplicationName('Google Sheets');
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAccessType('offline');
        $client->setAuthConfig(__DIR__ . '/credentials.json');

        $service = new Google_Service_Sheets($client);
        return $service;
    }




    public static function addData($scouterName, $matchNumber, $teamNumber, $dataArray) {
        print("ran");
        $service = self::connect();
        $range = "DB1!A2:Z1000";
        $values = [
            [$scouterName, $matchNumber, $teamNumber]
        ];
        foreach ($dataArray as $index => $value) {
            array_push($values[0], $value); 
        }
        $body = new Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);
        $params = [
            'valueInputOption' => 'RAW'
        ];
        $insert = [
            "insertDataOption" => "INSERT_ROWS"
        ];
        $result = $service->spreadsheets_values->append(
            "",
            $range,
            $body,
            $params,
            $insert
        );
    }
}    


?>

