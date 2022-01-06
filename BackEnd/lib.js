/* A Javascript library, intended to make everything easier*/


/**
 * If a value is null, it will automatically be set to 1, else returns the passed in value.
 */ 
function nullTo1(value) {
    if (value == null || value == NaN)
        return 1;
    return value;
}
function elementFromName(name) {
    return document.getElementById(name);
}
function elmenetFromClass(className, id) {
    return document.getElementsByClassName(className)[((id==null) ? 0 : id)];
}