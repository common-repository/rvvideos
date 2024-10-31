var $j = jQuery.noConflict();

// On page load, binding
$j(function() {
	check_ratio();
	bind_ratio_clk();
	bind_width_fld();	
	bind_form_submit();
});

// Whenever the form is submitted
// Enabling the Height field again
// Otherwise it is not posted
var bind_form_submit = function() {
	$j('#rvvideo_form').submit(function(e) {
		var width	= $j('#rvvideos_width').val();
		var height	= $j('#rvvideos_height').val();
		
		if (isNaN(width) || width < 100 || width > 1000) {
			window.alert(rvvideos_js_i18n.rvvideos_invalid_width);
			e.stopPropagation();
			return false;
		}
		
		if (isNaN(height) || height < 58 || height > 581) {
			window.alert(rvvideos_js_i18n.rvvideos_invalid_height);
			e.stopPropagation();
			return false;
		}			
	
	
		$j('#rvvideos_height').removeAttr('disabled');
		return true;
	});
}

// Binding Width field on key press
// Updates the Height if applicable
var bind_width_fld = function() {
	$j('#rvvideos_width').keyup(function() {
		set_ratio_size();
		return true;
	});		
}

// Binding ratio checkbox
var bind_ratio_clk = function() {
	$j('#rvvideos_ratio').click(function() {
		toggle_height();
		return true;
	});	
}

// When ratio checkbox is clicked
// Enabling or disabling Height field
var toggle_height = function() {
	if ($j('#rvvideos_ratio').prop('checked') == true) {
		$j('#rvvideos_height').attr('disabled', 'disabled').css('background-color', '#EEE');
		set_ratio_size();
	}
	else {
		$j('#rvvideos_height').removeAttr('disabled').css('background-color', '#FFF');
	}
}

// When pages loads, check current ratio
// If ratio seems correct, check ratio field
var check_ratio = function() {
	var width	= $j('#rvvideos_width').val();
	var height	= $j('#rvvideos_height').val();
	var ratio	= Math.round(width / height * 10) / 10;
	
	if (ratio == 1.7) {
		$j('#rvvideos_ratio').attr('checked', 'checked');
	}
	else {
		$j('#rvvideos_ratio').removeAttr('checked');
	}
	
	toggle_height();
}

// Calculates the ratio 
// Update the Height field
// Only if ratio checkbox is checked
var set_ratio_size = function() {
	if ($j('#rvvideos_ratio').prop('checked') == true) {
		var width	= $j('#rvvideos_width').val();
		var height	= Math.round(width / 1.72);
		$j('#rvvideos_height').val(height);
	}		
}