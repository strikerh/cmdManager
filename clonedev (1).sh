echo "<h3>starting cloning</h3>";
 cd ~/public_html/_mamydays.com/; 
 #rm v2_dev;
 #cp -rf v2 v2_dev;
 cd v2_dev;
# /usr/local/bin/wp config set DB_NAME stereoth_mamydays_v2_dev;
 php -a;
 $path_to_file = '../v2_dev/wp-config.php';
$file_contents = file_get_contents($path_to_file);
$file_contents = str_replace("'stereoth_mamydays_v2'","'stereoth_mamydays_v2_dev'",$file_contents);
file_put_contents($path_to_file,$file_contents);
exit;
 
echo "<h3>Done</h3>";
  
 #ls -l;
