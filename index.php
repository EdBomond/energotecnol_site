
<?php
$sys_def_mod="main";
$colapse="";

$PHP_SELF=$_SERVER[PHP_SELF];
include("include/config.php");
$mod = isset($_GET['mod']) ? basename($_GET['mod']) : $sys_def_mod;
$colapse = isset($_GET['men']) ? basename($_GET['men']) : "";
if(!file_exists("mods/$mod.php")) $mod = $sys_def_mod;

include("connectbd.php");

$SqlQuery="select headline from pages where NameFile='".$mod."'";
$Result = mysql_query($SqlQuery);

$R=mysql_fetch_row($Result);
$PAGE_TITLE=$R[0];

include("top.php");
include("mods/$mod.php");
include("bottom.php");
mysql_close($linkdb);

?>