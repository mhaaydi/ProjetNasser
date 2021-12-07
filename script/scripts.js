//Getting value from "ajax.php".
function fill(Value) {
   //Assigning value to "search" div in "search.php" file.
   $('#search').val(Value);
   //Hiding "display" div in "search.php" file.
   $('#display').hide();
}
$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#search").keyup(function() {
       //Assigning search box value to javascript variable motd as "mot".
       var mot = $('#search').val();
       //Validating, if "mot" is empty.
       if (mot == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display").html("");
       }
       //If mot is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "ajax.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "mot" into "search" variable.
                   search: mot
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display").html(html).show();
               }
           });
       }
   });
});
