jQuery(document).ready(function() {
	jQuery.noConflict();
	jQuery("blockquote p:first").addClass('first');
	jQuery("#navigation .menu li:last-child, .home-row li:last-child, blockquote p:last").addClass('last');
});