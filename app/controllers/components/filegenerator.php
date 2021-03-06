<?php
/**
* Class Used to convert files.
*@author jamiescott.net
*/
class FilegeneratorComponent extends Object {

// input folder types
private $allowable_files = array ('application/msword' => 'doc' );
// variable set if the constuctor loaded correctly.
private $pass = false;
// store the file info from constuctor reference
private $fileinfo;

/**
* Enter description here...
*
* @param array $fileinfo
* Expected :
* (
[name] => test.doc
[type] => application/msword
[tmp_name] => /Applications/MAMP/tmp/php/php09PYNO
[error] => 0
[size] => 79360
)
*
*
* @return unknown
*/
function __construct($fileinfo='') {

// folder to process all the files etc
define ( 'TMP_FOLDER', TMP . 'filegenerator/tempdocs/');

// where unoconv is installed
define ( 'UNOCONV_PATH', '/usr/bin/unoconv' );
// where to store pdf files
define ( 'PDFSTORE', ROOT . 'app/webroot/generatedpdfs/' );

// where to store doc files
define ( 'DOCSTORE', ROOT . 'app/webroot/docfiles/' );
// apache home dir
define ( 'APACHEHOME', '/home/apache' );
// set some shell enviroment vars
putenv ( "HOME=".APACHEHOME );
putenv ( "PWD=".APACHEHOME );

// check the file info is passed the tmp file is there and the correct file type is set
// and the tmp folder could be created

if (is_array ( $fileinfo ) && file_exists ( $fileinfo ['tmp_name'] ) && $this->createtmp ()) {

// bass by reference

$this->fileinfo = $fileinfo;
// the constuctor ran ok
$this->pass = true;
// return true to the instantiation
return true;

} else {
// faild to instantiate
return false;

}

}

/**
*      * takes the file set in the constuctor and turns it into a pdf
* stores it in /uploads/docfiles and returns the filename
*
* @return filename if pdf was generated
*/
function convertDocToPdf($source,$desti) {
// generate a random name
$output_pdf_name = $this->generatefoldername () . '.pdf';


$command = UNOCONV_PATH;
$args = ' --server '.$_SERVER['SERVER_NAME'].' --stdout -f pdf ' .$source;

$run = $command . $args;

$pdf = shell_exec ( $run );
$end_of_line = strpos ( $pdf, "\n" );
$start_of_file = substr ( $pdf, 0, $end_of_line );

if (! eregi ( '%PDF', $start_of_file ))
return false;

//echo PDFSTORE; exit;
// file saved

if(!$this->_createandsave($pdf, $desti, $output_pdf_name)){
return false;
}
return $output_pdf_name;
}


function convertPdfToImage($source,$desti,$nameofpdf) {
// generate a random name
$output_pdf_name = $nameofpdf . '.pdf';


$command = UNOCONV_PATH;
$args = ' --server '.$_SERVER['SERVER_NAME'].' --stdout -f pdf ' .$source;

$run = $command . $args;

$pdf = shell_exec ( $run );
$end_of_line = strpos ( $pdf, "\n" );
$start_of_file = substr ( $pdf, 0, $end_of_line );

if (! eregi ( '%PDF', $start_of_file )){
return false;
}
//echo PDFSTORE; exit;
// file saved

if(!$this->_createandsave($pdf, $desti, $output_pdf_name)){
return false;
}
return $output_pdf_name;

}



/**
* Create file and store data
*
* @param unknown_type $data
* @param unknown_type $location
* @return unknown
*/
function _createandsave($data, $location, $file) {

if (is_writable ( $location )) {

// In our example we're opening $filename in append mode.
// The file pointer is at the bottom of the file hence
// that's where $somecontent will go when we fwrite() it.
if (! $handle = fopen ( $location.$file, 'w' )) {
trigger_error("Cannot open file ($location$file)");
return false;
}

// Write $somecontent to our opened file.
if (fwrite ( $handle, $data ) === FALSE) {
trigger_error("Cannot write to file ($location$file)");
return false;
}

fclose ( $handle );
return true;

} else {
trigger_error("The file $location.$file is not writable");
return false;
}

}


/**
* Return a text version of the Doc
*
* @return unknown
*/
function convertDocToTxt() {

if ($this->pass) {

// move it to the tmp folder for processing
if (! copy ( $this->fileinfo ['tmp_name'], TMP_FOLDER . 'input.doc' ))
die ( 'Error copying the doc file' );

$command = UNOCONV_PATH;
$args = ' --server localhost --port 2002 --stdout -f txt ' . TMP_FOLDER . 'input.doc';

$run = $command . $args;

//echo $run; die;
$txt = shell_exec ( $run );

// guess that if there is less than this characters probably an error
if (strlen($txt) < 10)
die ( 'Error Generating the TXT' );

// return the txt from the PDF
return $txt;

}

}

/**
* Convert the do to heml and return the html
*
* @return unknown
*/
function convertDocToHtml() {

if ($this->pass) {

// move it to the tmp folder for processing
if (! copy ( $this->fileinfo ['tmp_name'], TMP_FOLDER . 'input.doc' ))
die ( 'Error copying the doc file' );

$command = UNOCONV_PATH;
$args = ' --server localhost --port 2002 --stdout -f html ' . TMP_FOLDER . 'input.doc';

$run = $command . $args;

//echo $run; die;
$html= shell_exec ( $run );
$end_of_line = strpos ( $html, "\n" );
$start_of_file = substr ( $html, 0, $end_of_line );

if (! eregi ( 'HTML', $start_of_file ))
die ( 'Error Generating the HTML' );

// return the txt from the PDF
return $html;

}

}

/*function __destruct() {

// remove the tmp folder

if (file_exists ( TMP_FOLDER ) && strlen ( TMP_FOLDER ) > 4)
$this->removetmp ();

}*/

/**
* Create the tmp directory to hold and process the files
*
* @return unknown
*/
function createtmp() {
if (is_writable ( TMP )) {
if(mkdir(TMP . 'filegenerator/tempdocs/'))
return true;
} else {

return true;
}

return false;
}

/**
* Delete the tmp dir
*
* @return unknown
*/
function removetmp() {

if (strlen ( TMP_FOLDER ) > 3 && file_exists ( TMP_FOLDER )) {

if ($this->recursive_remove_directory ( TMP_FOLDER ))
return true;

}

return false;
}

/**
* Return a rendom string for the folder name
*
* @return unknown
*/
function generatefoldername() {

return rand();

}

/**
* Recursivly delete directroy or empty it
*
* @param unknown_type $directory
* @param unknown_type $empty
* @return unknown
*/
function recursive_remove_directory($directory, $empty = FALSE) {
// if the path has a slash at the end we remove it here
if (substr ( $directory, - 1 ) == '/') {
$directory = substr ( $directory, 0, - 1 );
}

// if the path is not valid or is not a directory ...
if (! file_exists ( $directory ) || ! is_dir ( $directory )) {
// ... we return false and exit the function
return FALSE;

// ... if the path is not readable
} elseif (! is_readable ( $directory )) {
// ... we return false and exit the function
return FALSE;

// ... else if the path is readable
} else {

// we open the directory
$handle = opendir ( $directory );

// and scan through the items inside
while ( FALSE !== ($item = readdir ( $handle )) ) {
// if the filepointer is not the current directory
// or the parent directory
if ($item != '.' && $item != '..'){
// we build the new path to delete
$path = $directory . '/' . $item;

// if the new path is a directory
if (is_dir ( $path )) {
// we call this function with the new path
recursive_remove_directory ( $path );

// if the new path is a file
} else {
// we remove the file
unlink ( $path );
}
}
}
// close the directory
closedir ( $handle );

// if the option to empty is not set to true
if ($empty == FALSE) {
// try to delete the now empty directory
if (! rmdir ( $directory )) {
// return false if not possible
return FALSE;
}
}
// return success
return TRUE;
}
}
}
?>