<?php
function debug($arr)
{
	$bt = debug_backtrace();
	$caller = array_shift($bt);
	echo  '<pre class="debug" style =" color: green;">' . $caller['file'] . " (on line: " . $caller['line'] . ")" . '</pre>' ;
	echo '<pre class="debug" style =" color: #cc0000;">' . print_r($arr, true) . '</pre>';
}
/**
 *
 * PHP doesn't handle UTF-8 or Unicode all that well,
 * so if that is a concern
 * then you can replace \w for [^\s,\.;\?\!] and \W for [\s,\.;\?\!].
 * */
function get_words($sentence, $count = 10) {
	preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
	return $matches[0];
}