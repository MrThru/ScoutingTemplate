/*IMPORTANT - This IS a template with "pre-function", do NOT make changes to this
file unless creating new "pre-function".*/

/*Retrieves the data from the main index file(s) and creates cookies, contatining
those values. The "dbHandler" sends the important data to the database by retrieving
values from the cookis made in the this file.*/


function initialize() {

}
function getPreFuncObjectFromName(array, name) {
    for(var i = 0; i < array.length;i++) {
        if (name == (array[i].name)) {
            return array[i]
        }
    }
}

var stepperFunctionList = [];
/**
 * A Stepper function is used to increase, or decrease a value
 * @param {object} stepUpBtn - The StepUp HTML element
 * @param {object} stepDownBtn - The StepDown HTML element
 * @param {Object} numberDisplayInput - A Number display/input element
 * @param {String} stepperName - The name of the stepperFunction for accessing later to retrieve data.
 */
function createStepperFunction(stepUpBtn, stepDownBtn, numberDisplayInput, stepperName) {
    var newStepperFunction = new StepperFunction(stepUpBtn, stepDownBtn, numberDisplayInput, stepperName);
    stepUpBtn.addEventListener("click", function() {newStepperFunction.stepUp()});
    stepDownBtn.addEventListener("click", function() {newStepperFunction.stepDown()});
    stepperFunctionList.push(newStepperFunction);
}

class StepperFunction {
    constructor(stepUpBtn, stepDownBtn, numberDisplayInput, stepperName) {
        this.stepUpObject = stepUpBtn;
        this.stepDownObject = stepDownBtn;
        this.displayInput = numberDisplayInput;
        this.currentValue = 0;
        this.canBeNegative = false;
        this.name = stepperName;
    }
    stepUp(incrementValue) {
        this.manualValue(this.currentValue + nullTo1(incrementValue));
    }
    stepDown(decrementValue) {
        this.manualValue(this.currentValue - nullTo1(decrementValue));
    }
    manualValue(setValue) {
        if(!this.canBeNegative) {
            this.currentValue = minValue(setValue);
        } else {
            this.currentValue = setValue;
        }
        this.updateDisplay();
    }
    canBeNegative(booleanValue) {
        this.canBeNegative = booleanValue;
    }
    updateDisplay() {
        this.displayInput.value = this.currentValue;
    }


}
/**
 * A Toggle Function that can be toggled with one, or two buttons(one button is on, and the other is off)
 * @param {object} toggleButton - This button is required, and either acts as a toggleable switch, or a on switch state
 * @param {object} [secondToggleButton] - A optional toggle button that acts like an off switch state | Requires a Display Element
 * @param {object} [display] - A display element that is required if there are two buttons. This element will be green when true, and red when false
 * 
 */ 
class ToggleFunction {
    constructor(toggleButton, secondToggleButton, display) {
        this.trueStateColor = "Green";
        this.falseStateColor = "Red";

        this.toggleObject = toggleButton;
        this.secondToggleObject = secondToggleButton;
        this.stateDisplay = display;

        this.toggleState = false;
        this.dualToggleMode = (secondToggleButton == null) ? false : true;
    }
    toggleButton() {
        if(!this.dualToggleMode) {
            this.toggleState = !this.toggleState;
        } else {
            this.updateDisplay();
        }
    }
    updateDisplay(overrideState) {
        var displayColor;
        if (overrideState == null) 
            displayColor = (this.toggleState) ? this.trueStateColor : this.falseStateColor;
        else 
            displayColor = (overrideState) ? this.trueStateColor : this.falseStateColor;

        this.stateDisplay.style.backgroundColor = displayColor;
    }
}

function createEventUpdateFunction(input, updateFunction, activationMode) {
    var newEventUpdateFunction = new EventUpdateFunction(input, updateFunction, activationMode);
    input.addEventListener(activationMode, function() {updateFunction()});
}

class EventUpdateFunction {
    constructor(input, updateFunction, activationMode) {
        this.inputEvent = input;
        this.updateFunction = updateFunction;
        this.activationMode = activationMode;
    }
    update() {

    }
}