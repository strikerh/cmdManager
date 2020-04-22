<?php


$usernsme = "HazemSafwat";
$password = "HazemNabil321";
$auth = false;
$startTime = time();

$log_file_data = './log_' . date('d-M-Y') . '.log';
$line_prefix   = "User: " . $_SERVER['REMOTE_ADDR'] . ' - ' . date("F j, Y, g:i a") . ' - ';
$system_prefix = "System: >" . date("F j, Y, g:i a") . ' - ' ;


/////////////// code main //////////////////////

echo "<h1>Clone Process ...</h1>";

//print_r($_POST);
if ($_POST["user"] == $usernsme && $_POST["pass"] == $password )
    $auth = true;

wh_log("\n"."start ...\n", true);
wh_log("User: " . $_SERVER['REMOTE_ADDR'] . ' - ' . date("F j, Y, g:i a"), true);
echo "<pre>";



wh_log( "\n---------------\n");
$output = system("../wp-cli/wp-cli.phar --info");

wh_log( $output);
wh_log( "\n---------------");

  //system_log("../wp-cli/wp-cli.phar search-replace 'https://mamydays.com' 'https://dev.mamydays.com' --path='../v2_dev'" );

if ($auth) {
    if(isset($_POST["cloning"]))
        cloneAndFixConfig();
    

  if(isset($_POST["export_import_db"]))
        exportImportDb();
   // wh_log("Clone database is success :)");
   
    if(isset($_POST["update_db"]))
   // update();
    update_old();
   // wh_log("update database is success :)");
    
    wh_log("... Process id done successefuly ...");
    
    
    
} else {
    wh_log("No Access");
    
}
$totalTime = time() -$GLOBALS['startTime'] ;
wh_log("\n Total Time: $totalTime sec", true);
wh_log("\n--------------------------------------------\n\n", true);
echo "</pre>";





////////////////  Functions /////////////////////////

function wh_log($log_msg, $basic = false)
{
    if (!$basic) {
        $log = PHP_EOL.  $GLOBALS['line_prefix']   . $log_msg  ;
        
    } else {
        $log =  $log_msg;
    }
    
    file_put_contents($GLOBALS['log_file_data']  , $log, FILE_APPEND);
    echo $log ;
}



function system_log($system, $description = "")
{

    $log     = $GLOBALS['system_prefix'] . $description . " ...  ";
    
    
    
    file_put_contents($GLOBALS['log_file_data'], "\n" . $log, FILE_APPEND);
    echo  $log;
    
    exec($system . ' 2>&1', $output, $retVal);
    
    
    file_put_contents($GLOBALS['log_file_data'] , " > Done.", FILE_APPEND);
    echo " > Done.";
    
    foreach ($output as $value) {
        $sys_log = "\n   >>>>> " . $value;
    }
    
    
    file_put_contents($GLOBALS['log_file_data'] ,  $sys_log, FILE_APPEND);
    echo $sys_log  ;
}



function exportImportDb()
{
    /********************* START CONFIGURATION *********************/
    $DB_SRC_HOST = 'localhost';
    $DB_SRC_USER = 'stereoth_mamyday';
    $DB_SRC_PASS = 'Mamy321654987';
    $DB_SRC_NAME = 'stereoth_mamydays_v2';
    $DB_DST_HOST = $DB_SRC_HOST;
    $DB_DST_USER = $DB_SRC_USER;
    $DB_DST_PASS = $DB_SRC_PASS;
    $DB_DST_NAME = 'stereoth_mamydays_v2_dev';
    
    $filename = "../db_backup/" . $DB_SRC_NAME . "_" . date('Y-m-d-h:i:sa') . ".sql";
    
    
    
    //   system_log("mysqldump  --opt -u $DB_SRC_USER -p".$DB_SRC_PASS."  $DB_SRC_NAME >  $filename");
    
    
    // system_log("mysql  -u $DB_DST_USER -p".$DB_DST_PASS."  $DB_DST_NAME <  $filename") ;
    
    
    
    
    
    system_log("mysqldump --defaults-extra-file=../db_backup/_dbinfo.cnf --opt   $DB_SRC_NAME >  $filename", "Saving The Production Db");
    system_log("mysql  -u $DB_DST_USER -p" . $DB_DST_PASS . "  $DB_DST_NAME <  $filename", "Importing in Development Db");
    //system_log("mysql --defaults-extra-file=../db_backup/_dbinfo.cnf   $DB_DST_NAME <  $filename") ;
    
}


function cloneAndFixConfig()
{
   // wh_log("Removing the Old dev folder ...");
    system_log("rm -r " . escapeshellarg('../v2_dev_old'),"Removing the Old dev folder");
    
    
    system_log("mv -f " . escapeshellarg('../v2_dev') . " " . escapeshellarg('../v2_dev_old'),"Renaming the Dev folder with Old Dev");
    
    system_log("cp -Rf " . escapeshellarg('../v2') . " " . escapeshellarg('../v2_dev'),"Cloning The Production Folder");
    system_log("chmod +xr " . escapeshellarg('../v2_dev'),"Changing the permission Mode of the dev folder");
    
    
    wh_log("copy is success :)");
    
    
    if(isset($_POST["wp_config"])){
        
        $path_to_file  = '../v2_dev/wp-config.php';
        $file_contents = file_get_contents($path_to_file);
        $file_contents = str_replace("'stereoth_mamydays_v2'", "'stereoth_mamydays_v2_dev'", $file_contents);
        
        wh_log("fixing the config file ...  ");
        file_put_contents($path_to_file, $file_contents);
       
        
        wh_log("> done.", true);
     }
    
}

function update()
{

    // system_log("cd " . escapeshellarg('../v2_dev'),"Changing directory to the dev folder");
    
        $log     = $GLOBALS['system_prefix'] . $description . " ...  ";
    
    
    

                
     system_log("../wp-cli/wp-cli.phar search-replace 'https://mamydays.com' 'https://dev.mamydays.com' --path='../v2_dev'" );
    
}

function update_old()
{
       wh_log("fixing the home page serring on DB ");
    
    $servername = 'localhost';
    $username   = 'stereoth_mamyday';
    $password   = 'Mamy321654987';
    $dbname     = 'stereoth_mamydays_v2_dev';
    
    echo " $servername $username $password $dbname ";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "UPDATE wp_md2_options SET option_value='https://dev.mamydays.com' WHERE option_name = 'siteurl' or option_name = 'home'";
    
    if ($conn->query($sql) === TRUE) {
        wh_log("> done." ,true);
    } else {
        wh_log(' > Error updating record: ' . $conn->error ,true);
    }
    
    $conn->close();
    
    
    
}



function git_pull()
{
    system_log('git clone ');


}

?>