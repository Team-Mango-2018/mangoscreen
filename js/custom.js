var thehours = new Date().getHours();
	var themessage;
	var morning = ('Good morning');
	var afternoon = ('Good afternoon');
	var evening = ('Good evening');

	if (thehours >= 0 && thehours < 12) {
		themessage = morning; 

	} else if (thehours >= 12 && thehours < 18) {
		themessage = afternoon;

	} else if (thehours >= 18 && thehours < 24) {
		themessage = evening;
	}

	$('.greeting').append(themessage);

