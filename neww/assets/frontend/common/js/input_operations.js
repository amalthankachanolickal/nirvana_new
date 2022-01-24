function forceInputUppercase(id) {
	const input = document.getElementById(id);
	var start = input.selectionStart;
	var end = input.selectionEnd;
	input.value = input.value.toUpperCase();
	input.setSelectionRange(start, end);
}