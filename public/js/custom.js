
var actionKey = ['Delete','Backspace','ArrowLeft','ArrowRight','Tab'];
var numeric_input = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '.'];

$('input[type="number"]').on('keypress', function (event) {

    if ($.inArray(event.key, actionKey) == "-1") {
        return isNumber(event.key);
    }

});



var isNumber = function(str) {
    var pattern = /^[\d\.]+$/;
    return pattern.test(str);  // returns a boolean
};