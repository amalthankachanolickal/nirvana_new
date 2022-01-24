function isAmountKey(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode != 46) {
		return false;
	} else {
		return true;
	}
}

function isNumberKey(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		return false;
	} else {
		return true;
	}
}

function isIntegerKey(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode == 190 || charCode == 189)) {
		return false;
	} else {
		return true;
	}
}