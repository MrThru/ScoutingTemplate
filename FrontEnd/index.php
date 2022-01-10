<?php
    include("../BackEnd/dbHandler.php");
    function saveData() {
        $scouterName = $_COOKIE["scouterName"];
        $teamNumber = $_COOKIE["teamNumber"];
        $matchNumber = $_COOKIE["matchNumber"];
        $dataArray = $_COOKIE["dataArray"];

        DataBase::addData($scouterName, $matchNumber, $teamNumber, explode(",", $dataArray));
    }

    if(isset($_POST["submit"])) {
        saveData();
    }
    
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="1323, team 1323, frc, scouting, madtown, madera, robotics">
    <meta name="description" content="Scouting Web Application used by FRC Team 1323 for scouting.">
    <meta name="author" content="FRC Team 1323">
    <title>Madtown Scouting</title>
    <!-- favicon below -->
    <link rel="icon" type="image/x-icon" href="assets/coyoteBlueTransparent100.ico"> 
    <!-- styling files for desktop/landscape and mobile/portrait -->
    <link rel="stylesheet" media="screen and (orientation: landscape)" href="desktopStylesheet.css">
    <link rel="stylesheet" media="screen and (orientation: portrait)" href="mobileStylesheet.css">
</head>
<body>
    <div id="beginPage">
        <!-- begin page logo below -->
        <img src="assets/1323coyoteBlueTransparent50.png" alt="1323 blue coyote logo">
        <div>
            <h2>Scouter:</h2><input type="text" placeholder="First Name, Last Name" id="scouterName">
            <h2>Match Number:</h2><input type="text" placeholder="Quals 1" id="matchNumber">
            <h2>Team Number:</h2><input type="text" placeholder="1323" id="teamNumberInput">
            <button id="beginBtn" class="buttonStyling">BEGIN</button> 
        </div>
    </div>
    <div id="mainPage">
        <!-- field map for desktop view below -->
        <img id="fieldMap" src="assets/fieldMap.png" alt="field map of the year vertical">
        <!-- field map for mobile view below -->
        <img id="fieldMapRotated" src="assets/fieldMap90Deg.png" alt="field map of the year horizontal">
        <div id="dataInput">
            <div id="gamePeriodTitles">
                <h2 id="autoTab" class="activeGamePeriodTitle">Auto</h2>
                <h2 id="teleTab" class="gamePeriodTitle">Tele</h2>
                <h2 id="endTab" class="gamePeriodTitle">Endgame</h2>
            </div>
            <div id="autoInput" class="gameSecInput">
                <h2>Initiation Line Exited:</h2><div class="inputSec"><input type="checkbox" class="checkbox"></div>
                <!-- change titles and add/remove as needed -->
                <h2>Bottom Goal:</h2><div class="inputSec"><button id="stepDown1" class="decrementNum increDecreNum">-</button><input id="numInput1" type="number" class="numberInput" value="0" min="0"><button id="stepUp1" class="incrementNum increDecreNum">+</button></div>
                <h2>Outer Goal:</h2><div class="inputSec"><button id="stepDown2" class="decrementNum increDecreNum">-</button><input id="numInput2" type="number" class="numberInput" value="0" min="0"><button id="stepUp2" class="incrementNum increDecreNum">+</button></div>
                <h2>Inner Goal:</h2><div class="inputSec"><button id="stepDown3" class="decrementNum increDecreNum">-</button><input id="numInput3" type="number" class="numberInput" value="0" min="0"><button id="stepUp3" class="incrementNum increDecreNum">+</button></div>
            </div>
            <div id="teleInput" class="gameSecInput">
                <!-- change titles and add/remove as needed -->
                <h2>Bottom Goal:</h2><div class="inputSec"><button id="stepDown4" class="decrementNum increDecreNum">-</button><input id="numInput4" type="number" class="numberInput" value="0" min="0"><button id="stepUp4" class="incrementNum increDecreNum">+</button></div>
                <h2>Outer Goal:</h2><div class="inputSec"><button id="stepDown5" class="decrementNum increDecreNum">-</button><input id="numInput5" type="number" class="numberInput" value="0" min="0"><button id="stepUp5" class="incrementNum increDecreNum">+</button></div>
                <h2>Inner Goal:</h2><div class="inputSec"><button id="stepDown6" class="decrementNum increDecreNum">-</button><input id="numInput6" type="number" class="numberInput" value="0" min="0"><button id="stepUp6" class="incrementNum increDecreNum">+</button></div>
            </div>
            <div id="endInput" class="gameSecInput">
                <!-- add/remove endgame positions as required -->
                <h2>Hang:</h2><div class="inputSec"><input type="checkbox" class="checkbox"></div>
                <h2>Level:</h2><div class="inputSec"><input type="checkbox" class="checkbox"></div>
                <h2>Park:</h2><div class="inputSec"><input type="checkbox" class="checkbox"></div>
                <h2>Out of Parking Area:</h2><div class="inputSec"><input type="checkbox" class="checkbox"></div>
            </div>
            <div id="notesInput" class="gameSecInput">
                <h2>Notes:</h2><textarea></textarea>
            </div>
            <button id="doneButton" class="floatingBtns">✓</button>
        </div>
        <button id="backButton" class="floatingBtns">←</button>
    </div>
    <div id="submitPage">
        <div>
            <form method="post">
                <h2 id="submitPageText"></h2>
                <button id="submitButton" class="buttonStyling" name="submit" type="submit">YES</button>
                <button id="cancelSubmission" class="buttonStyling">NO</button>
            </form>
        </div>
    </div>
</body>
<script src="../BackEnd/lib.js"></script>
<script src="../BackEnd/mainTemplate.js"></script>
<script src="../BackEnd/test.js"></script>
<script>
var beginPage = elementFromName("beginPage");
var mainPage = elementFromName("mainPage");
var beginBtn = elementFromName("beginBtn");
var backBtn = elementFromName("backButton");
var autoTab = elementFromName("autoTab")
var teleTab = elementFromName("teleTab")
var endTab = elementFromName("endTab")
var autoInput = elementFromName("autoInput")
var teleInput = elementFromName("teleInput")
var endInput = elementFromName("endInput")
var doneBtn = elementFromName("doneButton")
var submitPage = elementFromName("submitPage")
var submitPageText = elementFromName("submitPageText")
var submitButton = elementFromName("submitButton")
var cancelSubmission = elementFromName("cancelSubmission")

beginBtn.addEventListener("click", function() {showPage(beginPage, mainPage)})

autoTab.addEventListener("click", function() {switchTab(true, false, false)})
teleTab.addEventListener('click', function() {switchTab(false, true, false)})
endTab.addEventListener("click", function() {switchTab(false, false, true)})

backBtn.addEventListener("click", function() {showPage(mainPage, beginPage)})

doneBtn.addEventListener("click", function() {showPage(null, submitPage); saveData();})
submitButton.addEventListener("click", collectAndSubmitData)
cancelSubmission.addEventListener("click", function() {showPage(submitPage, mainPage)})

elementFromName("scouterName").value = localStorage.getItem("scouterName");
createCookie("submitted", "false");

function showPage(pageToHide, pageToShow) {
    if (pageToHide == beginPage) {
        var teamNumberInput = elementFromName("teamNumberInput").value
        submitPageText.textContent = "Are you sure you want to submit the data collected for team " + teamNumberInput + "?"
    }
    if (pageToHide !== null) {
        pageToHide.style.display = "none"
        pageToShow.style.display = "flex"
    } else if (pageToHide === null) {
        pageToShow.style.display = "flex"
    }
}
function switchTab(auto, tele, end){
    autoInput.style.display = "none"
    teleInput.style.display = "none"
    endInput.style.display = 'none'
    if (auto == true) {
        autoInput.style.display = "grid"
        autoTab.className = "activeGamePeriodTitle"
        teleTab.className = "gamePeriodTitle"
        endTab.className = 'gamePeriodTitle'
    } else if (tele == true) {
        teleInput.style.display = 'grid'
        autoTab.className = "gamePeriodTitle"
        teleTab.className = 'activeGamePeriodTitle'
        endTab.className = "gamePeriodTitle"
    } else if (end == true) {
        endInput.style.display = 'grid'
        autoTab.className = "gamePeriodTitle"
        teleTab.className = "gamePeriodTitle"
        endTab.className = "activeGamePeriodTitle"
    }
}
function collectAndSubmitData() {
    // collect data before reloading here //
    localStorage.setItem("scouterName", elementFromName("scouterName").value);
    

    setTimeout(() => {
        location.reload();
    }, 5000);
}

// var form = document.getElementById("form");
// function handleForm(event) { event.preventDefault(); } 
// form.addEventListener('submit', handleForm);
</script>
</html>