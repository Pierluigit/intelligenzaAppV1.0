/*
Template Name: Infinite Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7 & Bootstrap 4
Version: 1.3.0
Author: Sean Ngu
Website: http://www.seantheme.com/infinite-admin/admin/html/
*/

/*
// this script is in the index 
var handleRenderCountdownTimer = function() {
	//var newYear = new Date();
	//alert(newYear);
	//newYear = new Date(newYear.getFullYear() + 1, 1 - 1, 1);
	$('#timer').countdown({until: new Date(2020, 3, 30)});
};*/

/* Controller
------------------------------------------------ */
var ComingSoon = function () {
	"use strict";
	
	return {
		//main function
		init: function () {
			handleRenderCountdownTimer();
		}
	};
}();