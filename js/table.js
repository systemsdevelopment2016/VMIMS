
$(document).ready(function() {
	$(".action-menu .glyphicon-plus-sign").on('click', add);
	$(".action-menu .glyphicon-pencil").on('click', modify);
	$(".action-menu .glyphicon-print").on('click', printTable);
    $(".action-menu .glyphicon-trash").on('click',deleteRow);
    $("#exp").datepicker(); 

});


/***DEFAULT VARIABLES FOR LOCATION**/
var qty = "quantity";
var pName = "pname";
var cat = "category";
var expD = "exp";
var retName = "rname";
var retAdrs = "raddress";
var b_price = "bprice";
var s_price = "sprice";
/****END*****/

var tempErrors = new Array();

/******************************************** ADD ************************************************/
function add() {

    var freeToGo = false;

    if ( $(".form-container").is(':visible') ) {
        $(".form-container").hide(150, function(){ $(".form-container") });
        return;
    }

    var filename = location.href.match(/([^\/]*?)$/)[1]; // filename of the HTML webpage

    var l_name = filename.slice(0, -4); // (!) NOTE: 4 indices for 'html' and 1 index for '.' (period); IMPLIES that the filename is of type HTML


    // NOTE: filename will allow us to infer l_id so that we can query the tables WHERE L_ID = $l_id
    
    $(".form-container").show(150);

    $("#submit").click(function(){

        var tempQuantity = $("#quantity").val();
        var name = $("#pname").val();
        var category = $("#category").val();
        var expiryDate = $("#exp").val();
        var retailerName = $("#rname").val();
        var retailerAddress = $("#raddress").val();
        var tempBuyPrice = $("#bprice").val();
        var tempSellPrice = $("#sprice").val();

        var freeToGo = checkFields(name,category,tempQuantity,expiryDate,retailerName,retailerAddress,tempBuyPrice,tempSellPrice);

        if(freeToGo == true){

                var quantity = parseInt(tempQuantity);
                var buyPrice = parseFloat( Math.round(tempBuyPrice * 100) / 100).toFixed(2);
                var sellPrice = parseFloat( Math.round(tempSellPrice * 100) / 100).toFixed(2);

               $.post(
                 "../php/base.php",
                  {
                    addData:"addData",
                    pname: name.toString(),
                    category: category.toString(),
                    quantity: quantity.toString(),
                    exp: expiryDate.toString(),
                    rname: retailerName.toString(),
                    raddress: retailerAddress.toString(),
                    bprice: buyPrice,
                    sprice: sellPrice,
                    comment:$("#comment").val(),
                    l_name:l_name
                  },
                  function(data){location.reload();}
                );
        }
        else{

            for(var a=0; a < tempErrors.length-1; a++){
                if( $("#"+tempErrors[a]).val() != "" ){

                    $("#"+tempErrors[a]).css("background-color","white");
                }
            }

            tempErrors = freeToGo;

            if(freeToGo[freeToGo.length-1] === "empty"){

                for(var i=0; i<=freeToGo.length-1; i++){

                    $("#"+freeToGo[i]).css("background-color","#cc0000");
                }
            }
            else{

                for(var i=0; i<=freeToGo.length; i++){

                    $("#"+freeToGo[i]).css("background-color","#cc0000");
                }

            }


        }

     });
}

/* ADD legacy code 
function add_old() {

    var generatedID = Math.floor(1000 + Math.random() * 9000);
    console.log(generatedID);

	$(".action-menu .glyphicon-trash").on('click',deleteRow);
    
        if(document.getElementById("deleteFeatures")){
            var div = document.getElementById("deleteFeatures");
            $(div).remove();
        }
        
	if ( $(".table tr:last td input").length && $(".table tr:last td input").attr("class").indexOf("empty") >= 0 ) {
		$(".table .empty").focus();
		return;
	}

	var noOfFields = $(".table > thead").find("> tr:first > th").length;

	var fieldWidth = $(".table > thead").find("> tr:first > th:first").css("width"); // includes padding and border; expressed in px
	var fieldPadding = $(".table > thead").find("> tr:first > th:first").css("padding");

	if($(".table tbody tr").length == 0){
		$(".table tbody").append('<tr class="input-row" id='+ generatedID+'></tr>');
	}
	else{
		$(".table tr:last").after('<tr class="input-row" id='+ generatedID+'></tr>');
	}
	

	for (var i = 1; i <= noOfFields; i++)
		$(".input-row:last").append("<td><input class='form-control empty' type='text'></td>");

	$(".input-row td").css({"width" : fieldWidth});
	$(".input-row td").css({"padding" : parseInt(fieldPadding)/2+"px"});
	$(".input-row td:first input").focus();
	$(".table .empty:first").focus();

	$(".input-row td input").blur(function() {
		var parent = $(this).parent();
		var input = $(this).val();

		if (input == "") {
			$(this).css("border", "solid 1px red");
			$(this).focus();
			return;
		}
		
		$(this).remove();
		parent.text(input);
		parent.css({"padding" : fieldPadding});

		parent.next().children(0).focus();
	});

	$(".table tr:last").removeClass("empty");
}*/

/****************************** MODIFY **********************************/
function modify() {
	$("body").append('<div class="overlay"></div>');
	$(".overlay").css("display", "block");

	$("table").addClass("table-top");

	$(document).mouseup(function (e)
	{
	    var container = $(".table-top");

	    if (!container.is(e.target) // if the target of the click isn't the container...
	        && container.has(e.target).length === 0) // ... nor a descendant of the container
	    {
	        $(".overlay").remove();
			$(".table-top td").off("click");
			$(".table").removeClass("table-top");
			$(document).off("mouseup");
	    }
	});

	$(".table-top td").click(function() {

		var oldContent = $(this).text();
        var codeParent = "";
        var codeIndex = "";

		var fieldWidth = $(this).width();
		var fieldPadding = $(".table > thead").find("> tr:first > th:first").css("padding");

		$(this).text("");
		$(this).append("<input class='form-control empty' type='text'></td>");

		$(this).css({"width" : fieldWidth+"px"});
		$(this).css({"padding" : parseInt(fieldPadding)/4+"px"});
		$(this).children(0).focus();

         var parentTag = $(this).parent();
         var parentID = parentTag.attr('id');
         codeParent = parentID;
         var columnIndex = $(this).parent().children().index($(this));
         codeIndex = columnIndex;

		$(this).children(0).blur(function(){
			var parent = $(this).parent();
			var input = $(this).val();

			$(this).remove();
			if ( input == "") {
				parent.text(oldContent);
				parent.css({"padding" : fieldPadding});
			}
			else {
				parent.text(input);
				parent.css({"padding" : fieldPadding});
				$(".overlay").remove();
				$(".table-top td").off("click");
				$(".table").removeClass("table-top");
				$(document).off("mouseup");

                $.post(
                 "../php/base.php",
                  {
                    UrowID: codeParent,
                    columnNmb: codeIndex,
                    newValue: input
                  },
                  function(data){}
                );
			}
		});

		
	});
}

/* PRINT */
function printTable(){  
   window.print();
}

/*DELETE ROW*/
function deleteRow(event){
    
    var row_id = "";

    //doesn't allow the event to be executed more than once
    if($("#deleteFeatures").is(":visible"))
    {
        $("#deleteFeatures").hide(150, function(){ $("#deleteFeatures") });
        return;
    }
    
    //create a div element as container for the text instruction and button
    var divTag =  document.createElement("div");
    divTag.id = "deleteFeatures";
    divTag.style.marginTop = "20px";
    
    //create text instruction
    var para = document.createElement("p");
    para.innerHTML = "Selectionnez une rangée et appuyer sur supprimer";
    para.style.color = "black";
    para.id="info";
    
    //create button
    var button = document.createElement("button");
    button.id = "delete";
    button.innerHTML = "Supprimer";
    button.style.color = "black";
    
    //append it to the container
    divTag.appendChild(para);
    divTag.appendChild(button);
    
    //insert the div container after the div table container
    $(divTag).insertAfter($(".table-div"));
    
   
    /**
    *This code lets the user to click on the rows.
    *the row that has selected the user by clicking
    *is assigned a class name of 'selected' and changes background color
    *if the user clicks on another the row, the row that contains the class name
    *'selected' is removed as well is the background color and given it to the new row
    **/
    $(".table tbody").on('click','tr', function(){
       if($(this).hasClass("selected")){
           $(this).removeClass("selected");
       }
       else{
           $('tr.selected').css("background","rgba(172,186,213,0)");
           $('tr.selected').removeClass("selected");
           $(this).addClass("selected");
           $(this).css("background","#acbad5");
           row_id = $(this).attr('id');
       }
    });
    
    //function when clicking the delete button
    $("#delete").click(function(){
                
    //add a transparent black overlay
    $("body").append('<div class="overlay"></div>');
	   $(".overlay").css("display", "block");
        
        var decision  = window.confirm("La suppresion de cette rangée de donnée sera irréversible! \nÊtes-vous sûr de vouloir supprimer cette rangée?");
        if(decision){

            $.post(
                 "../php/base.php",
                  {
                    deleteRow:"deleteRow",
                    rowDBID:row_id
                  },
                  function(data){location.reload();}
            );
            
            var row = $("tr.selected").closest('tr');
            row.remove();
            $(".overlay").remove();
        }
        else{
            $(".overlay").remove();
        }
        
        var rowCount = $('.table tr').length;
         
        // if there is no more data, then it displays a message
        //by displaying a new paragraph
        if(rowCount === 1){
			para.innerHTML = "Aucune donnée à montrer";
            para.style.fontSize = "20px";
            var tableWidth = $(".table").width() / $(".table").parent().width()*100;
            console.log(tableWidth);
            para.style.marginLeft = ((tableWidth/2))/1.5 + "%";
            $(button).remove();
        }
    });
      
}

function checkFields(pName, pCategory, pQuantity,date,rName,rAddress,bPrice,sPrice){

    var args = [].slice.call(arguments);
    var arrayReturn = new Array();
    var i=0;

    while( i < args.length) {

        if(args[i] == ""){
            var loc = locationForm(i);
            arrayReturn.push(loc);
             
        }
        i++;
    }

    if(i > args.length-1 && arrayReturn.length != 0){
        arrayReturn.push("empty");
        return arrayReturn;
    }

    var nmbLocation;
    if(isNaN(args[2]) )
    {
        nmbLocation = locationForm(2);
        return arrayReturn = [args[2],nmbLocation];
    }
    if( isNaN(args[6]) )
    {
        nmbLocation = locationForm(6);
        return arrayReturn = [args[6],nmbLocation];;

    }
    if (isNaN(args[7]) )
    {
        nmbLocation = locationForm(7);
        return arrayReturn = [args[7],nmbLocation];
    }

    return true;
}

function locationForm(index){

    switch(index)
    {
        case 0: 
            return pName;
        case 1:
            return cat;
        case 2:
            return qty;
        case 3: 
            return expD;
        case 4:
            return retName;
        case 5:
            return retAdrs;
        case 6:
            return b_price;
        case 7:
            return s_price;
    } 
}

/*function addNote(event){

	$(this).off(event);

	var divTag =  document.createElement("div");
    divTag.id = "deleteFeatures";
    divTag.style.marginTop = "50px";
    
	var para = document.createElement("p");
    para.innerHTML = "Selectionnez une rangée et écrivez vos notes dans la boite ci-dessous";
    para.style.color = "black";
    para.id="info";

    var textBox = document.createElement("textarea");
    textBox.cols="80";
    textBox.rows="5";
    textBox.id="textarea";
    textBox.style.color = "Black";
    
    var button = document.createElement("button");
    button.id = "b_addNote";
    button.innerHTML = "Ajouter note";
    button.style.color = "black";
    button.style.display = "block";

    divTag.appendChild(para);
    divTag.appendChild(textBox);
    divTag.appendChild(button);
    
    $(divTag).insertAfter($(".table-div"));

    var anon; //used to store the anonymous function used after

    $(".table tbody").on('click','tr', anon = function(){
       if($(this).hasClass("addNote")){
           $(this).removeClass("addNote");
       }
       else{
           $('tr.addNote').css("background","rgba(172,186,213,0)");
           $('tr.addNote').removeClass("addNote");
           $(this).addClass("addNote");
           $(this).css("background","#acbad5");
       }
    });

    $("#b_addNote").click(function(){

    	if(document.getElementsByClassName("addNote").length != 0){

       $(".table tbody").off('click','tr', anon);  
       $(".action-menu .glyphicon-pushpin").on('click',addNote);      

    		$("tr.addNote").addClass("hasNote");
    		$("tr.addNote").removeClass("addNote");		
    		var text = document.getElementById("textarea").value;
    		$("#deleteFeatures").remove();
    		var notes = document.createElement("p");
    		notes.innerHTML = "Note: " + text;
    		notes.style.color = "black"
    		notes.style.fontSize = "16px";
    		notes.id = "notesCurrentRow";
    		notes.style.marginLeft = "5%";
    		$(".hasNote").css("background","rgba(172,186,213,0)");
    		$(notes).insertAfter($(".table-div"));
    		notes.style.display = "none";

    		var countColumns = $(".table").find('tr')[0].cells.length;
        var span = document.createElement("span");
        span.class = "glyphicon glyphicon-pushpin";
        $(".hasNote td:last-child").append(span);
        


    	}
    });
*/


