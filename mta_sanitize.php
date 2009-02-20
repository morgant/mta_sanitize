<?php

// This is a PLUGIN TEMPLATE.

// Copy this file to a new name like abc_myplugin.php.  Edit the code, then
// run this file at the command line to produce a plugin for distribution:
// $ php abc_myplugin.php > abc_myplugin-0.1.txt

// Plugin name is optional.  If unset, it will be extracted from the current
// file name. Uncomment and edit this line to override:
$plugin['name'] = 'mta_sanitize';

$plugin['version'] = '0.1';
$plugin['author'] = 'Morgan Aldridge';
$plugin['author_uri'] = 'http://www.makkintosshu.com/';
$plugin['description'] = 'Sanitize text for URLs';

// Plugin types:
// 0 = regular plugin; loaded on the public web side only
// 1 = admin plugin; loaded on both the public and admin side
// 2 = library; loaded only when include_plugin() or require_plugin() is called
$plugin['type'] = 0; 


@include_once('zem_tpl.php');

if (0) {
?>
# --- BEGIN PLUGIN HELP ---

This plug-in implements a container tag (@mta_sanitize@) which will "sanitize" any text contained between the opening & closing tag for use in a URL. This is a wrapper around the built-in @sanitizeForUrl()@ function and will also parse other textpattern tags that it contains.

h3. Syntax

The @mta_sanitize@ tag has the following syntactic structure:

p. @<txp:mta_sanitize>Some Text</mta_sanitize>@

h3. Attributes

The @mta_sanitize@ tag will accept the following attribute (note: attributes are *case sensitive*):

p. @tolower="integer"@

When set to *1* the sanitized text will be converted to lowercase. Available values: *0* or *1* (default).

h3. Change Log

v0.1 Initial release.

# --- END PLUGIN HELP ---
<?php
}

# --- BEGIN PLUGIN CODE ---


function mta_sanitize($atts, $thing)
{
	extract(lAtts(array(
		'tolower' => 1,
	),$atts));
	
	$out = sanitizeForUrl(parse($thing));
	
	return $tolower ? strtolower($out) : $out;
}

# --- END PLUGIN CODE ---

?>