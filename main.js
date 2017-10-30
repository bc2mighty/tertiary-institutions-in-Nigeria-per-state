$(document).ready(function(){
    var $options = "";
    $.getJSON("states.json",function(json){
        $.each(json, function(index,states){
            $.each(states, function(index,state){
                $options += "<option value='" + index + "'>" + index + "</option>";
            });
        });
        $(".states").append($options + "");
    });

    var $states = $(".states");
    var $sch_opt = "";
    $states.on("change",function(e){
         $state_val = $(this).val();
         $sch_opt = "";
         $.getJSON("states.json",function(json){
            $.each(json, function(index,states){
                $.each(states, function(index,state){
                    if(index == $state_val){
                        $.each(state, function(index,schools){
                            $sch_opt +="<option value='" + schools + "'>" + schools + "</option>";
                        });
                        console.log($sch_opt);
                         $(".schools").html($sch_opt);
                    }
                });
            });
        });

    })
});
