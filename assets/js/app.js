// no resubmitting form on reload
if (window.history.replaceState) {
	window.history.replaceState(null, null, window.location.href);
}
