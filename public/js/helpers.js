/**
 * @param {JSON} response
 * @return {String}
 */
function getErrorsFromLaravelValidator(response) {
    let errors = " ";
    
    $.each(response, function (attribute, value) {
        if($.isPlainObject(value)) {
            $.each(value, function (input, error) {
                errors = errors + error + "\n";
            });
        }
    });

    return errors;
}