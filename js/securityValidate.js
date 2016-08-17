// Expire Date, validFunc, invalidFunc
function securityValidate(expire, valid, invalid) {
	var today = new Date();
	var expireDate = new Date(expire);
	var rest = expireDate.getTime() - today.getTime();

	if (rest >= 0) {
		valid();
	} else {
		invalid();
	}
  // Print
	// $('#rest-days').text(rest);
}
// Format: MM/DD/YYYY HH:MM:SS
securityValidate(

	'8/15/2025 9:00',

	// Valido
	function() {
		// Action Here
	},

	function() {
		alert("URGENT:ERROR::\n\nCallback Error. Contact your Web Master!");// Callback == payment
		window.location = 'not-fount.html';
	}

);
