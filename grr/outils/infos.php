<?php
//Au cas où les fonctions seraient désactivées par sushosin.executor.func.blacklist
//et pas par disable_function
function suhosin_function_exists($func) {
    if (extension_loaded('suhosin')) {
        $suhosin = @ini_get("suhosin.executor.func.blacklist" ) ;
        if (empty($suhosin) == false) {
            $suhosin = explode(',', $suhosin);
            $suhosin = array_map('trim', $suhosin);
            $suhosin = array_map('strtolower', $suhosin);
            return (function_exists($func) == true && array_search($func, $suhosin) === false);
        }
    }
    return function_exists($func);
}
<p>L'identifiant du Français sur ce système est :"<?php echo setlocale(LC_ALL,'fr_FR','french','French_France.1252','fr_FR.ISO8859-1','fra') ?>"</p>

phpinfo();

echo "<h1> Les fonctions définies</h1>\n";
$ref_docs = "htt p://www.php.net/manual/fr/function";
$tableau = get_defined_functions();
echo "<ul>\n";
while (list($type,$list) = each($tableau)) {
  if ($type == "internal" && is_array($list)) {
    sort($list);
    foreach ($list as $func) {
      if ($func == "_" ) $func2 = "gettext";
      else $func2 = preg_replace("/_/", "-", $func);
      echo "<li><a href=\"$ref_docs.$func2.php\">$func</a>";
      if(!suhosin_function_exists($func)) echo " ----- fonction <i>".$func."</i> n'existe pas ------"; 
      echo "</li>\n";
    }
  }
}
echo "</ul>\n";
?> 