$(function() {
		$("#mobile_number").intlTelInput({
			allowExtensions: true,
			autoFormat: true,
			autoHideDialCode: false,
			autoPlaceholder: false,
			defaultCountry: "auto",
			ipinfoToken: "yolo",
			nationalMode: false,
			numberType: "MOBILE",
			onlyCountries: ['SA', 'QA', 'AE', 'KW','IN'],
			//preferredCountries: ['cn', 'jp'],
			preventInvalidNumbers: true,
			utilsScript: "lib/libphonenumber/build/utils.js"
	});
});
