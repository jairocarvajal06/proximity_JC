const requestHandler = (...args) => {
    var [ type, url, async, data={} ] = args;

    return new Promise((resolve, reject) => {
        $.ajax({
            type,
            url,
            async,
            data,

            success: function(response) {
               
                resolve(response);
            },

            statusCode: {
                400: function (response) {
                    // Only if your server returns a 400 status code can it come in this block. :-)
                    reject(response);
                }
            },

            error: function(response) {
               
                reject(response);
            }
        });
    });
}


//FUNCTION TO SHOW A MESAGE IN CASE OF ERRORS
function alertHandler() {

    alert('KeyWord Not Found');
   
}