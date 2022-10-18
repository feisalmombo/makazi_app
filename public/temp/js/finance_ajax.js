$(document).ready(function(){
   
    $( function() {
        $( '#no_costs' ).change(  function() {
            // $("#ad").val("0");
            
            if ($('#eng_transport_cost').val()=="") {
            $("#eng_transport_cost").val("0");
                
            }
            else{
            $("#eng_transport_cost").val("");
            }
            if ($('#spare_transport_cost').val()=="") {
                $("#spare_transport_cost").val("0");
                    
                }
                else{
                $("#spare_transport_cost").val("");
                }
            if ($('#tools_cost').val()=="") {
                $("#tools_cost").val("0");
                    
                }
                else{
                $("#tools_cost").val("");
                }
                if ($('#man_cost').val()=="") {
                    $("#man_cost").val("0");
                        
                    }
                    else{
                    $("#man_cost").val("");
                    }
                    if ($('#per_diem').val()=="") {
                        $("#per_diem").val("0");
                            
                        }
                        else{
                        $("#per_diem").val("");
                        }
                        if ($('#spare_cost').val()=="") {
                            $("#spare_cost").val("0");
                                
                            }
                            else{
                            $("#spare_cost").val("");
                            }
                            
            
            $( this ).next().text( $( this ).is( ':checked' ) ? 'remove no cost' : 'no cost' );
        });
       
    });
    $('#other').click(function() {
        if ($(this).prop("checked") == true) {
            hide_other()
       
         }
         else if($(this).prop("checked") == false){
            show_other()
               
        
         }
    });
    
    //  $('#problem_type').change(function(){
    //     problem=document.getElementById('problem_type').value;
    //     if (problem=="7") {
    //         $("#incident").hide()
    //         $("#incidents").show()
    //     }
    //     else{
    //         $("#incidents").hide()
    //         $("#incident").show()
    //     }
    // });
    
});
function hide_other() {
    
    $("#costdiv").show();
    $("#descriptiondiv").show();

    
}
function show_other() {
    $("#otherdiv").show();
    $("#othersdiv").hide();
    $("#costdiv").hide();
    $("#descriptiondiv").hide();
}