<?

require("modules/base/includes/users.inc.php");

$uid = $_GET["uid"];

$data = "";
if ($uid) {
    $infos = getDetailedUser($uid);
    if (!isXMLRPCError()) $data = $infos["jpegPhoto"][0]->scalar;
}
if (!$data) {
  $f = fopen("img/users/icn_users_large.gif", "r");
  while (!feof($f)) $data .= fread($f, 4096);  
  fclose($f);
}

header("Content-type: image/jpeg");
print $data;
?>