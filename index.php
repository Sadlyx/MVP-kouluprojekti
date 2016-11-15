<?php

/*URL siistimis funktio*/
function parse_path() {
  $path = array();
  if (isset($_SERVER['REQUEST_URI'])) {
    $request_path = explode('?', $_SERVER['REQUEST_URI']);

    $path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
    $path['call_utf8'] = substr(urldecode($request_path[0]), strlen($path['base']) + 1);
    $path['call'] = utf8_decode($path['call_utf8']);
    if ($path['call'] == basename($_SERVER['PHP_SELF'])) {
      $path['call'] = '';
    }
    $path['call_parts'] = explode('/', $path['call']);

    $path['query_utf8'] = urldecode($request_path[1]);
    $path['query'] = utf8_decode(urldecode($request_path[1]));
    $vars = explode('&', $path['query']);
    foreach ($vars as $var) {
      $t = explode('=', $var);
      $path['query_vars'][$t[0]] = $t[1];
    }
  }
return $path;
}
/*URLit viittaa tiedostoihin*/
$path_info = parse_path();
switch($path_info['call_parts'][0]) {
  case '/': include 'etusivu.html';
    break;
  case 'etusivu': include 'etusivu.html';
    break;
  case 'it-alat': include 'it-tehtavat.html';
    break;
  case 'it-tehtavat': include 'it-tehtavat.html';
    break;
  case 'tekijat': include 'tekijat.html';
    break;
  case 'pohja': include 'pohja.html';
    break;
  default:
    include 'etusivu.html';
}
?>