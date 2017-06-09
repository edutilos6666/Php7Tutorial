<?php
/*
 * import functions
 * $file = fopen($filename, $mode) or die("could not open file");
 * fclose($file);
 * $chunk = fread($file , filesize($filename));
 * $line = fgets($file);
 * $single_char = fgetc($file);
 * $eof = feof($file);
 */
echo readfile("out.txt");
define("NL", "\n");
echo NL. NL ;

$filename = "out.txt";
$file = fopen($filename, "r") or die("Could not open $filename");
$chunk = fread($file, filesize($filename));
echo $chunk;
echo NL. NL ;
fclose($file);


$file = fopen($filename, "r") or die("Could not open $filename");
while(!feof($file)) {
    $line = fgets($file);
    echo $line;
}
echo NL. NL ;
fclose($file);


$file = fopen($filename, "r") or die("Could not open $filename");
while(!feof($file)) {
    $ch = fgetc($file);
    echo $ch;
}
echo NL. NL;
fclose($file);



function file_props($filename) {
    /*
     * is_dir()	Checks whether a file is a directory
is_executable()	Checks whether a file is executable
is_file()	Checks whether a file is a regular file
is_link()	Checks whether a file is a link
is_readable()	Checks whether a file is readable
is_uploaded_file()	Checks whether a file was uploaded via HTTP POST
is_writable()	Checks whether a file is writeable
is_writeable()	Alias of is_writable()
    */
   echo "is_dir() = ". is_dir($filename). NL;
   echo "is_executable() = ". is_executable($filename). NL;
   echo "is_file() = ". is_file($filename). NL
       . "is_link() = ". is_link($filename). NL
       . "is_readable() = ". is_readable($filename). NL
       . "is_uploaded_file() = ".is_uploaded_file($filename). NL
       . "is_writable() = ". is_writable($filename). NL;

    /*
    fileatime()	Returns the last access time of a file
filectime()	Returns the last change time of a file
filegroup()	Returns the group ID of a file
fileinode()	Returns the inode number of a file
filemtime()	Returns the last modification time of a file
fileowner()	Returns the user ID (owner) of a file
fileperms()	Returns the permissions of a file
filesize()	Returns the file size
    */
    echo "fileatime() = ". fileatime($filename). NL
        . "filectime() = ". filectime($filename).NL
        . "filegroup() = ". filegroup($filename). NL
        . "fileinode() = ". fileinode($filename). NL
        . "filemtime() = ". filemtime($filename). NL
        . "fileowner() = ". fileowner($filename). NL
        . "fileperms() = ". fileperms($filename). NL
        . "filesize() = ". filesize($filename). NL;
    /*
    basename()	Returns the filename component of a path
    dirname()	Returns the directory name component of a path
    disk_free_space()	Returns the free space of a directory
disk_total_space()	Returns the total size of a directory
diskfreespace()	Alias of disk_free_space()
    linkinfo()	Returns information about a hard link
lstat()	Returns information about a file or symbolic link
    pathinfo()	Returns information about a file path
    realpath()	Returns the absolute pathname
realpath_cache_get()	Returns realpath cache entries
realpath_cache_size()	Returns realpath cache size
    stat()	Returns information about a file
     */
    echo "basename() = ". basename($filename). NL
        . "dirname() = ". dirname($filename). NL
        . "disk_free_space() = ". disk_free_space($filename). NL
        . "disk_total_space() = ". disk_total_space($filename). NL
        . "linkinfo() = ". linkinfo($filename). NL
        . "lstat() = ". join(", ", lstat($filename)). NL
        . "pathinfo() = " . join(", ", pathinfo($filename)). NL
        . "realpath() = ". realpath($filename). NL
     #   . "realpath_cache_get() = ". join(", ", realpath_cache_get()).NL
        . "realpath_cache_size() = ". realpath_cache_size().NL
        . "stat() = ". join(", ", stat($filename)).NL ;


    print_r(lstat($filename));
    print_r(stat($filename));
    print_r(pathinfo($filename));
}



file_props($filename);




/*
 * Open file for writing
 */
$filename = "out2.txt";
$file = fopen($filename, "w") or die("Could not open $filename");
$name = "foo";
$age = 10 ;
$wage = 100.0 ;
$active = false ;
$arr = array("foo", "bar", "bim");

fwrite($file, $name. NL);
fwrite($file, $age. NL);
fwrite($file, $wage. NL);
fwrite($file, $active?"true".NL : "false". NL);
fwrite($file , join(", ", $arr). NL);

fclose($file);



$file = fopen($filename , "r") or die("Could not open $filename");
while(!feof($file)) {
    echo fgets($file);
}

fclose($file);


