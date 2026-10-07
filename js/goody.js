
/*const usfootprint= document.getElementById('usfootprint');
const showsentence= document.getElementById('showsentence');



showsentence.addEventListener('mouseenter', event =>{

	usfootprint.style.backgroundColor='blue';
	usfootprint.textContent = "Ouch";
});

showsentence.addEventListener('click', event =>{
	usfootprint.style.backgroundColor='yellow';
	usfootprint.textContent = "No";
	
});

showsentence.addEventListener('mouseout', event => {
	usfootprint.style.backgroundColor='orange';
	usfootprint.textContent = "yes";

});
*/
function myFunction() {
	var x = document.getElementById("myDIV");
	if (x.style.display === "none") {
	  x.style.display = "block";
	  
	} else {
	  x.style.display = "none";
	}
	
  }
  function myFunction2() {
	var x = document.getElementById("myDIV2");
	if (x.style.display === "none") {
	  x.style.display = "block";
	} else {
	  x.style.display = "none";
	}
	
  }
  
  function myFunction5() {
	var x = document.getElementById("myDIV5");
	if (x.style.display === "none") {
	  x.style.display = "block";
	} else {
	  x.style.display = "none";
	}
	
  }
  function myFunction6() {
	var x = document.getElementById("myDIV6");
	if (x.style.display === "none") {
	  x.style.display = "block";
	} else {
	  x.style.display = "none";
	}
	
  }
  function myFunction7() {
	var x = document.getElementById("myDIV7");
	if (x.style.display === "none") {
	  x.style.display = "block";
	 
	} else {
	  x.style.display = "none";
	}
	
  }
  
$(document).ready(function() {

// US
	$('#usfootprint').mouseenter(function() {
	   $('#usfootprint img').animate({
	       width: '+=600px', left: '-=0px', top: '-=0px'
	   });
	   $('#myDIV').animate({
	       opacity: '1', left: '0%',
		   
	   });
	});
	$('#usfootprint img').mouseleave(function() {
	   $('#usfootprint img').animate({
	       width: '-=6px', left: '+=0px', top: '+=0px'
	   });
	   $('#myDIV').animate({
	       opacity: '0'
	   });
	});


// China

	$('#chinafootprint').mouseenter(function() {
	   $('#chinafootprint img').animate({
	       width: '+=60px', left: '-=0px', top: '-=0px'
	   });
	   $('#myDIV2').animate({
	       opacity: '1'
	   });
	});
	$('#chinafootprint img').mouseleave(function() {
	   $('#chinafootprint img').animate({
	       width: '-=6px', left: '+=0px', top: '+=0px'
	   });
	   $('#myDIV2').animate({
	       opacity: '0',
	   });
	});

// South America

	$('#southamericafootprint').mouseenter(function() {
	   $('#southamericafootprint img').animate({
	       width: '+=60px', left: '-=0px', bottom: '-=0px'
	   });
	   $('#myDIV5').animate({
	       opacity: '1'
	   });
	});
	$('#southamericafootprint img').mouseleave(function() {
	   $('#southamericafootprint img').animate({
	       width: '-=6px', left: '+=0px', bottom: '+=0px'
	   });
	   $('#myDIV5').animate({
	       opacity: '0'
	   });
	});


	//Africa
	$('#africafootprint').mouseenter(function() {
		 $('#africafootprint img').animate({
				 width: '+=60px', left: '-=0px', top: '-=0px'
		 });
		 $('#myDIV6').animate({
				 opacity: '1'
		 });
	});
	$('#africafootprint img').mouseleave(function() {
		 $('#africafootprint img').animate({
				 width: '-=6px', left: '+=0px', top: '+=0px'
		 });
		 $('#myDIV6').animate({
				 opacity: '0'
		 });
	});
});
