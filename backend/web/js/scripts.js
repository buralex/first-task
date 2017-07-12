/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */





//fd.append("CustomField", "This is some extra data");
//$.ajax({
//  url: "drivers",
//  type: "POST",
//  data: fd,
//  processData: false,  // tell jQuery not to process the data
//  contentType: false   // tell jQuery not to set contentType
//});


        $('#btn').on('click', function(){
            
           var fd = new FormData(document.querySelector("#coordinates"));
            
           $.ajax ({
              url: 'drivers',
              data: fd,
              success: function(res) {
                  console.log(res);
              },
              type: 'POST',
              processData: false,  // tell jQuery not to process the data
              contentType: false,   // tell jQuery not to set contentType
              error: function() {
                 throw new Error('err!!!');
              }
           }); 
        });