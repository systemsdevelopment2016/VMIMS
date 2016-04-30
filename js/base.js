$(document).ready(function() {

	$('[data-toggle="popover"]').popover();
	
	/* Toggle sidebar menu and sidebar glyphicon (except .glyphicon-home) */
    $(".sidebar-ul li").click(function() {
		$(this).find("ul li").toggle(500);
		if ( $(this).find("span").attr("class").indexOf("glyphicon-home") < 0 )
	    	$(this).find("span").toggleClass("glyphicon-menu-down glyphicon-menu-right");
	});

    $("span.glyphicon").hover(
	function(){
		if ( isChildOfActionmenu( $(this) ) ){
			$(this).css("background-color","rgba(0,174,239,0.5)");
			$(this).css("color", "white");
		}
	},
	function(){
		if ( isChildOfActionmenu( $(this) ) ) {
			$(this).css("background-color","rgba(0,174,239,0)");
			$(this).css("color", "black");
		}
	});			

});

function isChildOfActionmenu(target) {
	return ( target.hasClass("glyphicon-plus-sign") || target.hasClass("glyphicon-pencil") || target.hasClass("glyphicon-trash") ||
		 target.hasClass("glyphicon-pushpin") || target.hasClass("glyphicon-floppy-disk") || target.hasClass("glyphicon-print") );
}
