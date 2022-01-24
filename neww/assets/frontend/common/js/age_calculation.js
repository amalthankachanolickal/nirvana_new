function calc_age(birthday) {
	var dob = new Date(birthday);
	var today = new Date();
	var age = today.getFullYear() - dob.getFullYear();
	var m = today.getMonth() - dob.getMonth();
	if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
		age--;
	}
	alert(age);
	/*var ageDifMs = Date.now() - birthday.getTime();
	var ageDate = new Date(ageDifMs);
	return Math.abs(ageDate.getUTCFullYear() - 1970);*/
}