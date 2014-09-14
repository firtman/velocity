<!doctype html>
<meta charset="UTF-8">
<title>Velocity 2014 Test</title>
<meta name=viewport content="width=device-width">
<style>


#output {
	position: fixed;
	width: 100%;
	bottom: 0; left: 0;
	background-color: silver;
}
dd, dl, dt {
	padding: 5px 2px;
	float: left;
}
dl {
	width: 30%;	
	font-size: small;
	font-family: sans-serif;
}
dt {
	color: blue;	
}
dd {
	font-weight: bold;	
	color: black;
	margin: 0;
}

footer {
	margin-top: 130px;
	color: gray;	
	margin-bottom: 40px;	

} 
footer a {
	color: gray;	
}
</style>
<script>
_timestamp = new Date().getTime();
// Polyfill for Navigation Timing API
if (window.performance==undefined) {
    window.performance = {
         emulated: true,
         now: function() {
             return new Date().getTime();
         },
         timing: {
             "navigationStart":_timestamp 
         }
    }
	document.addEventListener("DOMContentLoaded", function() {
    	window.performance.timing.domComplete = window.performance.now();
	});
	window.addEventListener("load", function() {
    	window.performance.timing.loadEventStart = window.performance.now();
    	window.performance.timing.loadEventEnd = window.performance.now();
	});
    
} else {
    window.performance.emulated = false;
}

window.addEventListener("load", function() {
    	setTimeout(function() {
			var timing = window.performance.timing;
    		var user = timing.loadEventEnd - timing.navigationStart;
			var fetch = timing.responseEnd - timing.fetchStart;
			var loadTime = timing.domContentLoadedEventEnd - timing.responseEnd;
			if (window.performance.emulated) {
				var html = "<dl><dt>Load: </dt><dd>" + user + "ms</dd></dl>";			
			} else {
				var html = "<dl><dt>Total: </dt><dd>" + user + "ms</dd></dl>" + 
			    	   "<dl><dt>Fetch: </dt><dd>" + fetch + "ms</dd></dl>"+
			    	   "<dl><dt>DOM: </dt><dd>" + loadTime + "ms</dd></dl>" ;
			}
			document.querySelector("div#output").innerHTML = html;
    	}, 0);
});

</script>

<!-- START TEST -->

<h1>Extreme performance</h1>
<h2>jQuery Mobile Test</h2>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css<?php echo rand(); ?>" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js<?php echo rand(); ?>"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js<?php echo rand(); ?>"></script>
<p>
  <footer>
    Test by <a href="http://twitter.com/firt" target="_blank">@firt</a> for #velocityconf
  </footer>
<div id=output>
<dl><dd>Loading data</dd></dl>
</div>