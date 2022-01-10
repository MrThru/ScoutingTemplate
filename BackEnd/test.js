createStepperFunction(elementFromName("stepUp1"), elementFromName("stepDown1"), elementFromName("numInput1"), "autoBottomPort");
createStepperFunction(elementFromName("stepUp2"), elementFromName("stepDown2"), elementFromName("numInput2"), "autoOuterPort");
createStepperFunction(elementFromName("stepUp3"), elementFromName("stepDown3"), elementFromName("numInput3"), "autoInnerPort");
createStepperFunction(elementFromName("stepUp4"), elementFromName("stepDown4"), elementFromName("numInput4"), "teleBottomPort");
createStepperFunction(elementFromName("stepUp5"), elementFromName("stepDown5"), elementFromName("numInput5"), "teleOuterPort");
createStepperFunction(elementFromName("stepUp6"), elementFromName("stepDown6"), elementFromName("numInput6"), "teleInnerPort");


function saveData() {
    createCookie("scouterName", getElementInputValue("scouterName"));
    createCookie("teamNumber", getElementInputValue("teamNumberInput"));
    createCookie("matchNumber", getElementInputValue("matchNumber"));
    createCookie("dataArray", getElementInputValue("numInput1") + "," + getElementInputValue("numInput4"));
    createCookie("submitted", "true");
    return true;
}