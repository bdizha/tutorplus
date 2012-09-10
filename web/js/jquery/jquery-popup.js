$(document).ready(function(){
	var $about = $("#about");    
	$("#subscribers li a:first-child").click(function(){
	    $about.dialog({
            title: "New System User",
            width: 600,
            close: function(){
               $about.dialog("destroy");
               $about.hide();
            },
            buttons:{
                close : function(){
                    $about.dialog("close");
                }
            }
        }).show();
	});
});