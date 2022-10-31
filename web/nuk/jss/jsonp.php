<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "admin,member,view";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../MemSys/index.php?errMsg=2";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php require_once('../Connections/connData.php'); ?>
<?php require_once('../Connections/connSQL.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$username_Recordset1 = "-2";
if (isset($_SESSION['MM_Username'])) {
  $username_Recordset1 = $_SESSION['MM_Username'];
}
$gid_Recordset1 = "-1";
if (isset($_GET['gid'])) {
  $gid_Recordset1 = $_GET['gid'];
}
$rid_Recordset1 = "-1";
if (isset($_GET['rid'])) {
  $rid_Recordset1 = $_GET['rid'];
}
mysql_select_db($database_connSQL, $connSQL);
$query_Recordset1 = sprintf("SELECT G.g_id,G.g_sensortable,G.g_type  FROM Root AS R, MemberData AS M, Gateway AS G WHERE R.r_username=%s AND M.m_username=%s AND R.r_id=%s AND G.g_id=%s AND G.g_mac1=R.r_mac1", GetSQLValueString($username_Recordset1, "text"),GetSQLValueString($username_Recordset1, "text"),GetSQLValueString($rid_Recordset1, "int"),GetSQLValueString($gid_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $connSQL) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$table=$row_Recordset1['g_sensortable'];

date_default_timezone_set("Asia/Taipei");

$date2=date("Y-m-d H:i:s");
if (isset($_GET['date2'])) {
  $date2 =$_GET['date2'];
}
$date1=date("Y-m-d H:i:s",strtotime("-1 day"));
if (isset($_GET['date1'])) {
  $date1 =$_GET['date1'];
}


mysql_select_db($database_connData, $connData);
$query_PowerData = sprintf("SELECT * FROM %s WHERE updatetime BETWEEN %s AND %s ",$table,GetSQLValueString( $date1,date),GetSQLValueString( $date2,date));
$PowerData = mysql_query($query_PowerData, $connData) or die(mysql_error());
$row_PowerData = mysql_fetch_assoc($PowerData);
$totalRows_PowerData = mysql_num_rows($PowerData);
?>
<?php
echo $_GET['callback'].'([';
header("Content-type: application/json");


do {  


$datetime=strtotime ("+8 hours", strtotime($row_PowerData['updatetime']))*1000;
//$datetime=strtotime($row_PowerData['updatetime'])*1000;
$current=(double)$row_PowerData[$_GET['type']];
$data[]="\n\t[\n\t\t$datetime,\n\t\t$current\n\t]";
} while ($row_PowerData = mysql_fetch_assoc($PowerData)); 
$datastring=join($data,',');
echo $datastring."\n";
?>])
<?php
mysql_free_result($PowerData);

mysql_free_result($Recordset1);
?>
