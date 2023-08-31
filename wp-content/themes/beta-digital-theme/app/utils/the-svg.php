<?php
//GET SVG FILE
function the_SVG($file) {
	echo get_the_SVG($file);
}

function get_the_SVG($file) {
	// $ch = curl_init();
    // curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    // curl_setopt($ch, CURLOPT_HEADER, 0);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch, CURLOPT_URL, SVGPATH . $file . ".svg");
    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

    // $data = curl_exec($ch);
    // curl_close($ch);

    //return $data;
    $stream_opts = [
	    "ssl" => [
	        "verify_peer"=>false,
	        "verify_peer_name"=>false,
	    ]
	];  

	return file_get_contents(SVGPATH . $file . ".svg",false, stream_context_create($stream_opts));
}
?>