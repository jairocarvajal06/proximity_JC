//FUNCTION TO GET THE RESULT FROM THE PHP file

async function getResults() {

    //Get the value;

    let dataForm= $("#search_Keyword_Form").serializeArray();
    let params = {}; //OBJECT FOR SAVING THE VALUES
    dataForm.forEach(e => {
        params[e.name] = e.value;
    });

    //SEND THE DATA TO THE PHP FILE TO PROCESS 
    let url = './api.php'
    requestHandler('get', url ,true, params)
    .then((response) => {

        //READ THE RESPONSE 
       if (response != "") {
           var result = "";
           for (let i = 0; i < response.length; i++) {
            result += `<tr>
                       
            <td>${response[i].name}</td>
            <td>${response[i].city}</td>
            <td>${response[i].state}</td>`;

           }

           $("#table_Result").html(result);
       }else{
           alert("Key Word Not Found, try again!");//IF DOES NOT EXIST SHOW A MESSAGE
           $("#table_Result").html("");
       }
       

    }).catch((response) => {

        alertHandler();
    });

}