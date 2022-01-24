function calc_date(sdate, d, m, y) {

	var tdate = new Date(sdate);

	tdate.setFullYear(tdate.getFullYear() + parseInt(y));
	tdate.setMonth(tdate.getMonth() + parseInt(m));
	tdate.setDate((tdate.getDate() - 1) + parseInt(d));

	return date_arrangement(tdate);
}

function date_arrangement(passedDate) {

	var year = passedDate.getFullYear().toString();
	var month = (passedDate.getMonth() + 1).toString();
	var day = passedDate.getDate().toString();

	if (month.length < 2) month = '0' + month;
	if (day.length < 2) day = '0' + day;
	return [year, month, day].join('-');
	console.log([day, month, year.slice(-2)].join('-'));
}