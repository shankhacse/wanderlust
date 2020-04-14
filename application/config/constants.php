<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


define  ("LAYOUT_TYPES", 
            json_encode(
                array(
                    "EDITOR" => "Editor",
                    "LINK" => "Link"
                )
            )
        );    

/**
 * List Of possible Error Message
 */

defined('SAVE_SUCCESS')   OR define('SAVE_SUCCESS', 'Successfully Saved'); 
defined('SAVE_ERROR')     OR define('SAVE_ERROR', 'Error Occured.Data not saved.Try again'); 
defined('RECORD_EXIST')     OR define('RECORD_EXIST', 'This record already exist'); 
defined('UPLOAD_SUCCESS')   OR define('UPLOAD_SUCCESS', 'File Successfully uploaded'); 
defined('UPDATE_SUCCESS')   OR define('UPDATE_SUCCESS', 'Updated Successfully'); 
defined('UPDATE_ERROR')   OR define('UPDATE_ERROR', 'Error Occured.Data not updated.Try again'); 
defined('PUBLISH_SUCCESS')   OR define('PUBLISH_SUCCESS', 'Published Successfully'); 

/**
 * Css Class
 */
defined('ALERT_CLASS')     OR define('ALERT_CLASS', 'alert-danger');
defined('SUCCESS_CLASS')     OR define('SUCCESS_CLASS', 'alert-success');

defined('MEDIA_UPLOAD_PATH')   OR define('MEDIA_UPLOAD_PATH', $_SERVER['DOCUMENT_ROOT'].'/southpgs/assets/webdoc/mediaupload/'); 
defined('MEDIA_UPLOAD_THUMBNAIL_PATH')   OR define('MEDIA_UPLOAD_THUMBNAIL_PATH', $_SERVER['DOCUMENT_ROOT'].'/southpgs/assets/webdoc/mediaupload/thumbnail/'); 
defined('MEDIA_UPLOAD_THUMBNAIL_SUFFIX')   OR define('MEDIA_UPLOAD_THUMBNAIL_SUFFIX', '_thumb'); 

defined('UPDATE_VALUE')   OR define('UPDATE_VALUE', 'UPDATE'); 
defined('PUBLISH_VALUE')   OR define('PUBLISH_VALUE', 'PUBLISH'); 

/**
 * Static Dropdown Array Used in Admin Section
 */


define ("TABLE_HEADER_INPUT_TYPES", json_encode(array (
    "text" => "TEXT",
    "date" => "DATE",
    "none" => "NONE"
))); 

define ("DIST_BLOCK_OPTIONS", json_encode(array (
    "DIST" => "District",
    "BLOCK" => "Block"
))); 