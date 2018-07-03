//ALT LAB STUFF

// When the user scrolls the page, execute myFunction 
window.onscroll = function() {stickyMenu()};

// Get the navbar
var navbar = document.getElementById("wrapper-navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop+60;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function stickyMenu() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

//PUBLICATIONS EXPAND/HIDE Excerpt

abstractMother();

function abstractMother(){
	if (document.getElementsByClassName('abstract-button')){
		var buttons = document.getElementsByClassName('abstract-button');
		for (var i = 0; i < buttons.length; i++) {
			var theAbstractButton = buttons.item(i);
			theAbstractButton.addEventListener('click', function(){abstractModifier()});
		}
	}
}

function abstractModifier(){
	var theAbstract = document.getElementById('abstract-container');
	theAbstract.classList.toggle('hide');

	var theAbstractButton = document.getElementById('abstract-button');
	theAbstractButton.classList.toggle('active');	
  
  var theAbstractState = document.getElementById('abstract-status');
  if (theAbstractState.innerHTML === ' +'){
        theAbstractState.innerHTML = ' -';
  } else {
    theAbstractState.innerHTML = ' +';
  }
}




/*

NO LONGER NEEDED BC OF DIFFERENT DESIRE FOR FACULTY STRUCTURE 

var theStaffButton = document.getElementById('staff_button');
theStaffButton.addEventListener('click', function(){peopleSorter('staff')});

var theAcademicButton = document.getElementById('academic_button');
theAcademicButton.addEventListener('click', function(){peopleSorter('academic')});

var theAcademicButton = document.getElementById('adjunct_button');
theAcademicButton.addEventListener('click', function(){peopleSorter('adjunct')});

function peopleSorter (level){
		buttonStatus(level);
		var theClasses = ['.staff','.academic','.adjunct'];
		var index = theClasses.indexOf('.'+level);		
		if (index > -1) {
		  theClasses.splice(index, 1);
		}
		theClasses = theClasses.join();
		var els = document.querySelectorAll(theClasses);
		Array.prototype.forEach.call(els, function(el) {
		    // Do stuff here
		    console.log('el.tagName');
		    el.classList.toggle('hide');
		});
}


function buttonStatus(level){
	var theButton = document.getElementById(level+'_button');
	theButton.classList.toggle('activated');
	//NEED TO ADD SOMETHING IN HERE TO REMOVE CLASS IF EXISTS


}
*/