<?php





/*FIRST CHECK GET ID FOUND OR NOT. IF NOT FOUND THEN RUN FIRST CASE...*/



if(!isset($install)){

$install = 0;

}



/*==================================================================*/





if(isset($_GET['submit'])){



$install  = $_GET['step'];



}









$step = $install;



switch($step)



{

/***************************/

case 0:

echo "<center>";



echo "<h3>WELCOME TO DATABASE INSTALLATION PAGE.</h3>";

echo "<h3>PROVIDE INFORMATION ABOUT DATABASE SERVER TO CREATE DATABASE.</h3>";



echo "<form action=\"install.php\" method=\"GET\" >";



echo "<input type=\"hidden\" name=\"step\" value=\"1\" >";

echo "<input type=\"text\" name=\"servername\" placeholder=\"HOST SERVER NAME\" >";

echo "<br>";

echo "<br>";





echo "<input type=\"text\" name=\"serveruser\" placeholder=\"HOST USER NAME\" >";

echo "<br>";

echo "<br>";





echo "<input type=\"text\" name=\"serverpassword\" placeholder=\"HOST USER PASSWORD\" >";

echo "<br>";

echo "<br>";





echo "<input type=\"text\" name=\"serverdatabase\" placeholder=\"HOST DATABASE NAME\" >";

echo "<br>";

echo "<br>";







echo "<input type=\"submit\" name=\"submit\" value=\"step_1\" >";



echo "</form>";



echo "</center>";

break;

/***************************/





/***************************/

case 1:







$name =  $_GET['servername'];

$user = $_GET['serveruser'];

$password = $_GET['serverpassword'];

$database = $_GET['serverdatabase'];



$one = "<?php ";

$two = "\$dbhost = "."'".$name."'"."; ";

$three = "\$dbusername = "."'".$user."'"."; ";

$four = "\$dbpassword = "."'".$password."'"."; ";

$five = "\$dbname = "."'".$database."'"."; ";

$six = "\$connect_db = mysqli_connect(\$dbhost, \$dbusername, \$dbpassword, \$dbname); ";

$seven = "?>";



$config_create = fopen("config.php","w");

fwrite($config_create, $one."\r\n".$two."\r\n".$three."\r\n".$four."\r\n".$five."\r\n".$six."\r\n".$seven);





echo '<h2>Your Config File Created Successfully...</h2><br>';



echo '<form action="install.php" method="GET">

<input type="hidden" name="step" value="2">

<input type="submit" name="submit" value="Go to Second Step to Create parcel_list table">

</form>';







break;



/*****************************************/





case 2:



include("config.php");



$sql = "	CREATE TABLE `$dbname`.`parcel_list` ( `id` INT NOT NULL AUTO_INCREMENT , 

`b_status` TEXT  , 

`d_status` TEXT  , 

`sl_no` TEXT  , 

`pis` INT  , 

`name` TEXT  , 

`address` TEXT  , 

`number` TEXT  , 

`kg` INT  , 

`air_bl_no` TEXT, 

`lot_no` INT , 

`shipment` INT, 

`party_name` TEXT , 

`sb_cn_no` TEXT  , 

`data_entry_date` DATE  , 

`office_entry_date` DATE  , 

`booking_date` DATE  , 

`delivered_date` DATE  , 

`phone_called` TEXT  , 

`last_edited_by` TEXT  , 

`remark` TEXT  , 

PRIMARY KEY (`id`)) ENGINE = InnoDB;";



$msg = mysqli_query($connect_db, $sql);



if(!$msg)

{

echo 'Table Already Created <br>';

echo '<a href="index.php">GO TO HOME PAGE</a><br>';





echo '<form action="install.php" method="GET">

<input type="hidden" name="step" value="3">

<input type="submit" name="submit" value="Go to 3rd Step to Create User table">

</form>';





}



else

{



echo "CONNECTION SUCCESSFULL";



echo '<a href="index.php">GO TO HOME PAGE</a><br>';





echo '<form action="install.php" method="GET">

<input type="hidden" name="step" value="3">

<input type="submit" name="submit" value="Go to 3rd Step to Create User table">

</form>';



}

break;





/********************************************************************/







case 3:



include("config.php");



$sql = "CREATE TABLE `$dbname`.`user` 

( 

`id` INT NOT NULL AUTO_INCREMENT , 

`password` TEXT, 

`full_name` TEXT, 

PRIMARY KEY (`id`)) ENGINE = InnoDB;";



$msg = mysqli_query($connect_db, $sql);



if(!$msg)

{



	echo "User Table Already Created<br>";

	echo "Create Stuff User Data<br>";



	echo '<form action="install.php" method="GET">

<input type="hidden" name="step" value="4">

<input type="submit" name="submit" value="Ceate User data">

</form>';



}else{



	echo "Table Created Successfully....<br>";

	echo "Create Stuff User Data<br>";



	echo '<form action="install.php" method="GET">

<input type="hidden" name="step" value="4">

<input type="submit" name="submit" value="Ceate User data">

</form>';



}



break;



case 4:



include("config.php");



$password_100 = password_hash('@manna@', PASSWORD_DEFAULT);

$password_101 = password_hash('@admin@', PASSWORD_DEFAULT);

$password_102 = password_hash('@admin@', PASSWORD_DEFAULT);

$password_103 = password_hash('@anis14109@', PASSWORD_DEFAULT);

$password_104 = password_hash('@admin@', PASSWORD_DEFAULT);

$password_105 = password_hash('@admin@', PASSWORD_DEFAULT);

$password_106 = password_hash('@admin@', PASSWORD_DEFAULT);

$password_107 = password_hash('@admin@', PASSWORD_DEFAULT);

$password_108 = password_hash('@admin@', PASSWORD_DEFAULT);

$password_109 = password_hash('@admin@', PASSWORD_DEFAULT);

$password_110 = password_hash('@admin@', PASSWORD_DEFAULT);





$sql = "INSERT INTO `user` (`id`, `password`, `full_name`) VALUES ('100', '$password_100', '100_MANNA');";

$sql .= "INSERT INTO `user` (`id`, `password`, `full_name`) VALUES ('101', '$password_101', '101_SEKANDER');";

$sql .= "INSERT INTO `user` (`id`, `password`, `full_name`) VALUES ('102', '$password_102', '102_SALAUDDIN');";

$sql .= "INSERT INTO `user` (`id`, `password`, `full_name`) VALUES ('103', '$password_103', '103_ANISUR_RAHMAN');";

$sql .= "INSERT INTO `user` (`id`, `password`, `full_name`) VALUES ('104', '$password_104', '104_SOBUJ');";

$sql .= "INSERT INTO `user` (`id`, `password`, `full_name`) VALUES ('105', '$password_105', '105_BAPPY');";

$sql .= "INSERT INTO `user` (`id`, `password`, `full_name`) VALUES ('106', '$password_106', '106_MITHU_SUPERVISOR');";

$sql .= "INSERT INTO `user` (`id`, `password`, `full_name`) VALUES ('107', '$password_107', '107_AMRAN_SUPERVISOR');";

$sql .= "INSERT INTO `user` (`id`, `password`, `full_name`) VALUES ('108', '$password_108', '108_MITHU_DRIVER');";

$sql .= "INSERT INTO `user` (`id`, `password`, `full_name`) VALUES ('109', '$password_109', '109_JOLIL_DRIVER');";

$sql .= "INSERT INTO `user` (`id`, `password`, `full_name`) VALUES ('110', '$password_110', '110_REJAUL_DRIVER')";



$msg = mysqli_multi_query($connect_db, $sql);



if(!$msg)

{

	echo "User Already Created";

echo '<a href="index.php">GO TO HOME PAGE</a><br>';



}else{

	echo "Successfully Created";

echo '<a href="index.php">GO TO HOME PAGE</a><br>';

	



}





break;



}



?>



