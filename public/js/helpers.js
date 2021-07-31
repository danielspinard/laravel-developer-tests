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

/**
 * @param {HTMLFormElement} formElement
 * @param {String} redirectOnSuccess 
 */
function ajaxStoreUpdateRequest(formElement, redirectOnSuccess = "") {
    $.ajax({
        url: formElement.attr("action"),
        data: new FormData(formElement[0]),
        method: "POST",
        enctype: "multipart/form-data",
        processData: false,
        contentType: false,
        success: (response) => {
            return swal(response.data).then(() => {
                $(location).attr("href", redirectOnSuccess);
            });
        },
        error: function (response) {
            let error = response.responseJSON;
            
            return swal({
                title: error.message,
                text: getErrorsFromLaravelValidator(error),
                icon: "error",
                button: false,
                timer: 3500,
            });
        }
    });
}