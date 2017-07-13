/* 
 * 
 */
'use strict';

/*----------------------------------------------------------
 * NEAREST DRIVERS
 *   gets origin coordinates from user and output json with nearest drivers
 * ---------------------------------------------------------*/

//fd.append("CustomField", "This is some extra data");
//$.ajax({
//  url: "drivers",
//  type: "POST",
//  data: fd,
//  processData: false,  // tell jQuery not to process the data
//  contentType: false   // tell jQuery not to set contentType
//});


//        $('#btn').on('click', function(){
//            
//           var fd = new FormData(document.querySelector("#coordinates"));
//            console.log( fd );
//           $.ajax ({
//              url: 'drivers',
//              data: fd,
//              success: function(res) {
//                  console.log(res);
//              },
//              type: 'POST',
//              processData: false,  // tell jQuery not to process the data
//              contentType: false,   // tell jQuery not to set contentType
//              error: function() {
//                 throw new Error('err!!!');
//              }
//           }); 
//        });

(function () {
    
    
    

    document.querySelector("#coordinates").addEventListener("submit", function(e) {

        //document.querySelector('.icon-load').style.display = 'block';


        //var formData = new FormData(document.querySelector('#coordinates'));
        
        //formData.append('chosenOption', dataOpt);

        var xhttp = new XMLHttpRequest();
        
        //console.log( formData );

        xhttp.open("POST", "drivers", true);

        xhttp.onload = function(oEvent) {
            if (xhttp.status == 200) {
                
                //var jsonOptions = JSON.parse(this.responseText);
                
                console.log(this.responseText);
                
                //document.querySelector('.icon-load').style.display = 'none';
                //document.querySelector('#contactModal').style.display = 'block';
            } else {
                throw new Error("Error! not sent!");
            }
        };
        xhttp.send();
        e.preventDefault();
    });
})();