// Quantity buttons discover
	function qtySum_discover(){
    var arr = document.getElementsByName('qtyInput_discover');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }

    var cardQty = document.querySelector(".qtyTotal.discover");
    cardQty.innerHTML = tot;
	} 
	qtySum_discover();

	$(function() {

	   $(".qtyButtons.discover input").after('<div class="qtyInc discover"></div>');
	   $(".qtyButtons.discover input").before('<div class="qtyDec discover"></div>');
	   $(".qtyDec.discover, .qtyInc.discover").on("click", function() {

		  var $button = $(this);
		  var oldValue = $button.parent().find("input").val();

		  if ($button.hasClass('qtyInc discover')) {
			 var newVal = parseFloat(oldValue) + 1;
		  } else {
			 // don't allow decrementing below zero
			 if (oldValue > 0) {
				var newVal = parseFloat(oldValue) - 1;
			 } else {
				newVal = 0;
			 }
		  }

		  $button.parent().find("input").val(newVal);
		  qtySum_discover();
		  $(".qtyTotal.discover").addClass("rotate-x");

	   });

	   function removeAnimation() { $(".qtyTotal.discover").removeClass("rotate-x"); }
	   const counter = document.querySelector(".qtyTotal.discover");
	   counter.addEventListener("animationend", removeAnimation);

	});

// Quantity buttons flights
	function qtySum_flights(){
    var arr = document.getElementsByName('qtyInput_flights');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }

    var cardQty = document.querySelector(".qtyTotal.flights");
    cardQty.innerHTML = tot;
	} 
	qtySum_flights();

	$(function() {

	   $(".qtyButtons.flights input").after('<div class="qtyInc flights"></div>');
	   $(".qtyButtons.flights input").before('<div class="qtyDec flights"></div>');
	   $(".qtyDec.flights, .qtyInc.flights").on("click", function() {

		  var $button = $(this);
		  var oldValue = $button.parent().find("input").val();

		  if ($button.hasClass('qtyInc flights')) {
			 var newVal = parseFloat(oldValue) + 1;
		  } else {
			 // don't allow decrementing below zero
			 if (oldValue > 0) {
				var newVal = parseFloat(oldValue) - 1;
			 } else {
				newVal = 0;
			 }
		  }

		  $button.parent().find("input").val(newVal);
		  qtySum_flights();
		  $(".qtyTotal.flights").addClass("rotate-x");

	   });

	   function removeAnimation() { $(".qtyTotal.flights").removeClass("rotate-x"); }
	   const counter = document.querySelector(".qtyTotal.flights");
	   counter.addEventListener("animationend", removeAnimation);

	});	