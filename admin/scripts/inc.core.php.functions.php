<?php
//////////////////////////////////////////
//////////////////////////////////////////
////////// Alpha functions PHP ///////////
//////////////////////////////////////////

//////////////////////////////////////////
//////////////////////////////////////////
// delete folder and content
//////////////////////////////////////////
function deleteDirectory($dirname) {
         if (is_dir($dirname))
           $dir_handle = opendir($dirname);
     if (!$dir_handle)
          return false;
     while($file = readdir($dir_handle)) {
           if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                     unlink($dirname."/".$file);
                else
                     deleteDirectory($dirname.'/'.$file);
           }
     }
     closedir($dir_handle);
     rmdir($dirname);
     return true;
}
//////////////////////////////////////////

//////////////////////////////////////////
//////////////////////////////////////////
// copy folder and content
//////////////////////////////////////////
function copieRep ($orig,$dest) { 
  mkdir ($dest,0755);
  $dir = dir($orig); 
  while ($entry=$dir->read()) { 
    $pathOrig = "$orig/$entry"; 
    $pathDest = "$dest/$entry"; 
    // repertoire ->copie récursive
    if (is_dir($pathOrig) and (substr($entry,0,1)<>'.')) copieRep ($pathOrig,$pathDest);     
   // fichier -> copie simple
   if (is_file($pathOrig) and ($pathDest<>'') and ($fp=fopen($pathOrig,'rb'))) { 
      $buf = fread($fp,filesize($pathOrig)); 
      $cop = fopen($pathDest,'ab+'); 
      fputs ($cop,$buf); 
      fclose ($cop); 
      fclose ($fp); 
    } 
  } 
  $dir->close(); 
} 

//////////////////////////////////////////
//////////////////////////////////////////
// generate strong password
//////////////////////////////////////////
function generateStrongPassword ($length = 11, $add_dashes = false, $available_sets = 'luds') 
{
	$sets = array();
	if(strpos($available_sets, 'l') !== false)
		$sets[] = 'abcdefghjkmnpqrstuvwxyz';
	if(strpos($available_sets, 'u') !== false)
		$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
	if(strpos($available_sets, 'd') !== false)
		$sets[] = '23456789';
	if(strpos($available_sets, 's') !== false)
		$sets[] = '!@#$%&*?';

	$all = '';
	$password = '';
	foreach($sets as $set)
	{
		$password .= $set[array_rand(str_split($set))];
		$all .= $set;
	}

	$all = str_split($all);
	for($i = 0; $i < $length - count($sets); $i++)
		$password .= $all[array_rand($all)];

	$password = str_shuffle($password);

	if(!$add_dashes)
		return $password;

	$dash_len = floor(sqrt($length));
	$dash_str = '';
	while(strlen($password) > $dash_len)
	{
		$dash_str .= substr($password, 0, $dash_len) . '-';
		$password = substr($password, $dash_len);
	}
	$dash_str .= $password;
	return $dash_str;
}



/*
	
	== PHP FILE TREE ==
	
		Let's call it...oh, say...version 1?
	
	== AUTHOR ==
	
		Cory S.N. LaViska
		http://abeautifulsite.net/
		
	== DOCUMENTATION ==
	
		For documentation and updates, visit http://abeautifulsite.net/notebook.php?article=21
		
*/


function php_file_tree($directory, $return_link, $extensions = array()) {
	// Generates a valid XHTML list of all directories, sub-directories, and files in $directory
	// Remove trailing slash
	if( substr($directory, -1) == "/" ) $directory = substr($directory, 0, strlen($directory) - 1);
	$code .= php_file_tree_dir($directory, $return_link, $extensions);
	return $code;
}

function php_file_tree_dir($directory, $return_link, $extensions = array(), $first_call = true) {
	// Recursive function called by php_file_tree() to list directories/files
	
	// Get and sort directories/files
	if( function_exists("scandir") ) $file = scandir($directory); else $file = php4_scandir($directory);
	natcasesort($file);
	// Make directories first
	$files = $dirs = array();
	foreach($file as $this_file) {
		if( is_dir("$directory/$this_file" ) ) $dirs[] = $this_file; else $files[] = $this_file;
	}
	$file = array_merge($dirs, $files);
	
	// Filter unwanted extensions
	if( !empty($extensions) ) {
		foreach( array_keys($file) as $key ) {
			if( !is_dir("$directory/$file[$key]") ) {
				$ext = substr($file[$key], strrpos($file[$key], ".") + 1); 
				if( !in_array($ext, $extensions) ) unset($file[$key]);
			}
		}
	}
	
	if( count($file) > 2 ) { // Use 2 instead of 0 to account for . and .. "directories"
		$php_file_tree = "<ul";
		if( $first_call ) { $php_file_tree .= " class=\"php-file-tree\""; $first_call = false; }
		$php_file_tree .= ">";
		foreach( $file as $this_file ) {
			if( $this_file != "." && $this_file != ".." ) {
				if( is_dir("$directory/$this_file") ) {
					// Directory
					$php_file_tree .= "<li class=\"pft-directory\"><a href=\"#fileTree\">" . htmlspecialchars($this_file) . "</a>";
					$php_file_tree .= php_file_tree_dir("$directory/$this_file", $return_link ,$extensions, false);
					$php_file_tree .= "</li>";
				} else {
					// File
					// Get extension (prepend 'ext-' to prevent invalid classes from extensions that begin with numbers)
					$ext = "ext-" . substr($this_file, strrpos($this_file, ".") + 1); 
					$link = str_replace("[link]", "$directory/" . urlencode($this_file), $return_link);
					$php_file_tree .= "<li class=\"pft-file " . strtolower($ext) . "\"><a href=\"$link\">" . htmlspecialchars($this_file) . "</a></li>";
				}
			}
		}
		$php_file_tree .= "</ul>";
	}
	return $php_file_tree;
}

// For PHP4 compatibility
function php4_scandir($dir) {
	$dh  = opendir($dir);
	while( false !== ($filename = readdir($dh)) ) {
	    $files[] = $filename;
	}
	sort($files);
	return($files);
}


//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////

// check if internet connection exist 
function is_connected()
{
    $connected = @fsockopen("www.google.com", 80); 
                                        //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
    return $is_conn;
}




//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
/*---------------------------------------------------------------*/
/*
    Titre : Calcul la taille d'un dossier en Octet                                                                        
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=688
    Auteur           : miistracy                                                                                          
    Date édition     : 22 Aout 2013                                                                                       
    Date mise à jour : 21 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
function getSizeRep($Rep)
{
	$Racine=opendir($Rep);
	$Taille=0;
	while($Dossier = readdir($Racine))
	{
	  if ( $Dossier != '..' And $Dossier !='.' )
	  {
		//Ajoute la taille du sous dossier
		if(is_dir($Rep.'/'.$Dossier)) $Taille += getSizeRep($Rep.'/'.
$Dossier);
		//Ajoute la taille du fichier
		else $Taille += filesize($Rep.'/'.$Dossier);

	  }
	}
	closedir($Racine);
	return $Taille;
}
//$sizeProject = getSizeRep('../../');
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
function getSizeName($octet)
{
    // Array contenant les differents unités 
    $unite = array(' octet',' Ko',' Mo',' Go');
    
    if ($octet < 1000) // octet
    {
        return $octet.$unite[0];
    }
    else 
    {
        if ($octet < 1000000) // ko
        {
            $ko = round($octet/1024,2);
            return $ko.$unite[1];
        }
        else // Mo ou Go 
        {
            if ($octet < 1000000000) // Mo 
            {
                $mo = round($octet/(1024*1024),2);
                return $mo.$unite[2];
            }
            else // Go 
            {
                $go = round($octet/(1024*1024*1024),2);
                return $go.$unite[3];    
            }
        }
    }
}

//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
// get single value 
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
function getSingleValue($table, $field, $value, $columnName) {
	// connect db
	require("scripts/inc.core.connectDB.php");
	// anti hack on $value
	require("scripts/inc.core.antiHack.php");
	// limit max 11 characters like idMCode
	if(strlen($value)==32) {
		// select 
		$dbRequest=$connectDBIntelApp->query("select * from ".$table." where ".$field."='$value'");
		$dbRequest->setFetchMode(PDO::FETCH_OBJ);
		if( $getResult = $dbRequest->fetch() ) {	
			$result = $getResult->$columnName;
		}
	}
	return $result;
}

/*$singleValue = getSingleValue("members", "idMember", "1", "pseudo"); // table, where field, value, columnName
echo("result ".$singleValue);exit(0);*/


?>