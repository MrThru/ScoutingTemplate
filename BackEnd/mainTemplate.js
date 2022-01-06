/*IMPORTANT - This IS a template with "pre-function", do NOT make changes to this
file unless creating new "pre-function".*/

/*Retrieves the data from the main index file(s) and creates cookies, contatining
those values. The "dbHandler" sends the important data to the database by retrieving
values from the cookis made in the this file.*/


function initialize() {

}





/**
 * A Stepper function is used to increase, or decrease a value
 * @param {object} stepUpBtn - The StepUp HTML element
 * @param {object} stepDownBtn - The StepDown HTML element
 * @param {Object} numberDisplayInput - A Number display/input element
 * 
 */
function StepperFunction(stepUpBtn, stepDownBtn, numberDisplayInput) {
    var currentValue = 0;
    var stepUpButton = stepDownBtn;
    var stepDownButton = stepDownBtn;
    var displayInput = numberDisplayInput;

    stepUpButton.addEventListener("click", stepUp());
    stepDownButton.addEventListener("click", this.stepDown);

    function stepUp(incrementValue) {
        alert("ISSAC");        
        this.manualValue(currentValue + nullTo1(incrementValue));
        alert("test");
    };
    this.stepDown = function(reductionValue) {
        this.manualValue(currentValue - nullTo1(reductionValue));
    };
    this.manualValue = function(manualValue) {
        currentValue = manualValue;
        this.updateInputDisplay();
    };
    this.updateInputDisplay = function() {
        displayInput.value = currentValue;
    };
}
/**
 * A Toggle Function that can be toggled with one, or two buttons(one button is on, and the other is off)
 * @param {object} toggleButton - This button is required, and either acts as a toggleable switch, or a on switch state
 * @param {object} [secondToggleButton] - A optional toggle button that acts like an off switch state | Requires a Display Element
 * @param {object} [display] - A display element that is required if there are two buttons. This element will be green when true, and red when false
 * 
 */ 
function ToggleFunction(toggleButton, secondToggleButton, display) {
    var toggleState = false;

    const onColor = "Green";
    const offColor = "Red";

    var toggleButton = toggleButton;
    var secondToggleButton = secondToggleButton;
    var display = display;
    var singleButtonToggleMode = (secondToggleButton == null) ? false : true;
    
    if (singleButtonToggleMode)
        toggleButton.addEventListener("click", this.toggle());
    else
        toggleButton.addEventListener("click", this.toggle(true));
        secondToggleButton.addEventListener("click", this.secondToggleButton(false));
    this.toggle = function(switchState) {
        if (switchState == null) {
            toggleState = !toggleState;
        } else {
            toggleState = switchState;
            updateDisplay();
        }
    };
    this.updateDisplay = function() {
        if (toggleState) {
            display.style.backgroundColor = onColor;
        } else {
            display.style.backgroundColor = offColor;
        }
    };
}