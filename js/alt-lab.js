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