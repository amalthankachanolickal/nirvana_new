function readURL(input, id) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#' + id).attr('src', e.target.result);
			$('#' + id).removeAttr('hidden', 'true');
		};
		reader.readAsDataURL(input.files[0]);
	}
}