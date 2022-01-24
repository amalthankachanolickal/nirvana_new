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




/*----Site Constants Starts----*/
define('COMPANY_TITLE', 'SkyNet&nbsp;Infusions');
define('WEBSITE_TITLE', 'RWA');
/*----Site Constants Ends----*/

/*----HREF Link Type Constants Starts----*/
define('HREF_COMMON', '');
define('HREF_TEL', 'tel');
define('HREF_MAIL', 'mailto');
define('HREF_GEO', 'geo');
/*----HREF Link Type Constants Ends----*/

/*----Account Type Constants Starts----*/
define('ADMIN', 'admin');
define('MEMBER', 'member');
/*----Account Type Constants Ends----*/

/*----Status Constants Starts----*/
define('STATUS_INACTIVE', 0);
define('STATUS_ACTIVE', 1);
define('STATUS_ALL', 2);
/*----Status Constants Ends----*/
/*----Device Type Constants Starts----*/
define('WEB', 'web');
define('APP', 'app');
/*----Device Type Constants Ends----*/

/*----Account Login Constants Starts----*/
define('LOGIN_SUCCESS', 1);
define('LOGIN_FAILED', 0);
define('WRONG_CREDENTIALS', 1);
define('WRONG_PASSWORD', 2);
define('ACCOUNT_INACTIVE', 3);
/*----Account Login Constants Ends----*/

/*----Account Login Message Constants Starts----*/
define('MESSAGE_LOGIN_SUCCESS', 'LOGIN SUCCESSFUL');
define('MESSAGE_WRONG_CREDENTIALS', 'INCORRECT CREDENTIALS..!!');
define('MESSAGE_WRONG_PASSWORD', 'INCORRECT PASSWORD..!!');
define('MESSAGE_ACCOUNT_INACTIVE', 'ACCOUNT INACTIVE..!!');
/*----Account Login Message Constants Ends----*/

/*----Database Operation Constants Starts----*/
define('DB_INSERT', 1);
define('DB_UPDATE', 2);
define('DB_DELETE', 3);
/*----Database Operation Constants Ends----*/

/*----Account Type Checking String Constants Starts----*/
define('CS_ADMIN', 'ADM');
define('CS_MEMBER', 'MR');
define('CS_STAFF', 'AG');
/*----Account Type Constants Ends----*/

define('ALL_PRODUCT', 'all');

/*----State Constants Starts----*/
define('FAILURE', 0);
define('SUCCESS', 1);
/*----State Constants Ends----*/

/*----Gender Type Constants Starts----*/
define('GENDER_ALL', 'All');
define('GENDER_FEMALE', 'Female');
define('GENDER_MALE', 'Male');
/*----Gender Type Constants Ends----*/

/*----Upload File Type Constants Starts----*/
define('UPLOAD_FILE_ALL', 'all');
define('UPLOAD_FILE_IMAGE', 'image');
define('UPLOAD_FILE_VIDEO', 'video');
define('UPLOAD_FILE_LINK', 'link');
define('UPLOAD_FILE_PDF', 'pdf');
define('UPLOAD_FILE_NOTES', 'notes');
/*----Upload File Type Constants Ends----*/

/*----Decision Constants Starts----*/
define('YES', 1);
define('NO', 0);
/*----Decision Constants Ends----*/

/*----Views Folder Path Constants Starts----*/
define('FRONTEND_VIEWS_FOLDER', 'frontend/');
define('FRONTEND_COMMONS_VIEWS_FOLDER', FRONTEND_VIEWS_FOLDER . 'commons');
define('FRONTEND_PRODUCT_VIEWS_FOLDER', FRONTEND_VIEWS_FOLDER . 'product');
define('FRONTEND_CART_VIEWS_FOLDER', FRONTEND_VIEWS_FOLDER . 'cart');
define('FRONTEND_COMPANY_VIEWS_FOLDER', FRONTEND_VIEWS_FOLDER . 'company');

define('WEBSITE_DESIGN_FRONTEND_IMAGE_PATH', 'assets/frontend/img/');
define('WEBSITE_DESIGN_FRONTEND_FONT_PATH', 'assets/frontend/icon-fonts/');
define('WEBSITE_DESIGN_FRONTEND_CSS_PATH', 'assets/frontend/css/');
define('WEBSITE_DESIGN_FRONTEND_JS_PATH', 'assets/frontend/js/');

define('WEBSITE_DESIGN_FRONTEND_LIB_PATH', 'assets/frontend/lib/');
define('WEBSITE_DESIGN_FRONTEND_SOURCE_PATH', 'assets/frontend/js/Source');

define('WEBSITE_DESIGN_COMMON_IMAGE_PATH', 'assets/frontend/common/images/');
define('WEBSITE_DESIGN_COMMON_JS_PATH', 'assets/frontend/common/js/');
define('WEBSITE_DESIGN_COMMON_VIDEO_PATH', 'assets/frontend/common/videos/');
define('WEBSITE_DESIGN_COMMON_CSS_PATH', 'assets/frontend/common/css/');
 
define('WEBSITE_DESIGN_BACKEND_IMAGE_PATH', 'assets/frontend/images/');
define('WEBSITE_DESIGN_BACKEND_FONT_PATH', 'assets/frontend/fonts/');
define('WEBSITE_DESIGN_BACKEND_CSS_PATH', 'assets/frontend/css/');
define('WEBSITE_DESIGN_BACKEND_JS_PATH', 'assets/frontend/js/');

define('BACKEND_VIEWS_FOLDER', 'frontend/');
define('BACKEND_COMMONS_VIEWS_FOLDER', BACKEND_VIEWS_FOLDER . 'commons');
define('BACKEND_COMPANY_VIEWS_FOLDER', BACKEND_VIEWS_FOLDER . 'company');
define('BACKEND_PRODUCT_VIEWS_FOLDER', BACKEND_VIEWS_FOLDER . 'product');
define('BACKEND_SERVICE_VIEWS_FOLDER', BACKEND_VIEWS_FOLDER . 'service');
define('BACKEND_STAFF_VIEWS_FOLDER', BACKEND_VIEWS_FOLDER . 'staff');
define('BACKEND_PRICE_VIEWS_FOLDER', BACKEND_VIEWS_FOLDER . 'price');

define('BACKEND_GALLERY_VIEWS_FOLDER', BACKEND_VIEWS_FOLDER . 'gallery');
define('BACKEND_FILES_VIEWS_FOLDER', BACKEND_VIEWS_FOLDER.'files');

define('BACKEND_REPEATS_VIEWS_FOLDER', BACKEND_VIEWS_FOLDER . 'repeats');
define('BACKEND_TABLES_VIEWS_FOLDER', 'tables');
define('BACKEND_ROWS_VIEWS_FOLDER', 'rows');
define('BACKEND_OPTIONS_VIEWS_FOLDER', 'options');
/*----Views Folder Path Constants Ends----*/

/*----Website Default Image Constants Starts----*/
define('DEFAULT_MESSAGE_BACKGROUND', WEBSITE_DESIGN_COMMON_IMAGE_PATH . 'default_message_background.jpg');
define('DEFAULT_SERVICE_IMAGE', WEBSITE_DESIGN_COMMON_IMAGE_PATH . 'default_service.jpg');
define('DEFAULT_PRODUCT_IMAGE', WEBSITE_DESIGN_COMMON_IMAGE_PATH . 'default_product.png');
define('DEFAULT_STAFF_PIC', WEBSITE_DESIGN_COMMON_IMAGE_PATH . 'default_gallery_pic.png');

define('DEFAULT_UPLOAD_IMAGE', WEBSITE_DESIGN_COMMON_IMAGE_PATH . 'default_upload_image.png');
define('DEFAULT_UPLOAD_VIDEO', WEBSITE_DESIGN_COMMON_VIDEO_PATH . 'default_upload_video.mp4');
/*----Website Default Image Constants Starts----*/

/*----Uploads Folder Path Constants Starts----*/
define('UPLOAD_SERVICE_COVER_PATH', 'assets/frontend/uploads/service/cover/');
define('UPLOAD_PRODUCT_IMAGE_PATH', 'assets/frontend/uploads/product/pic/');
define('UPLOAD_STAFF_IMAGE_PATH', 'assets/frontend/uploads/staff/');

define('UPLOAD_DEPT_GALLERY_IMAGE_PATH', 'assets/frontend/uploads/gallery/files/images/');
define('UPLOAD_DEPT_GALLERY_VIDEO_PATH', 'assets/frontend/uploads/gallery/files/video/');
/*----Uploads Folder Path Constants Ends----*/

/*----Service Message Constants Starts----*/
define('MESSAGE_SERVICE_ADD_SUCCESS', 'SERVICE ADDITION SUCCESSFUL');
define('MESSAGE_SERVICE_ADD_FAILURE', 'SERVICE ADDITION UNSUCCESSFUL..!!');
define('MESSAGE_SERVICE_UPD_SUCCESS', 'SERVICE UPDATE SUCCESSFUL');
define('MESSAGE_SERVICE_UPD_FAILURE', 'SERVICE UPDATE UNSUCCESSFUL..!!');

define('MESSAGE_SUB_SERVICE_ADD_SUCCESS', 'SUB SERVICE ADDITION SUCCESSFUL');
define('MESSAGE_SUB_SERVICE_ADD_FAILURE', 'SUB SERVICE ADDITION UNSUCCESSFUL..!!');
define('MESSAGE_SUB_SERVICE_UPD_SUCCESS', 'SUB SERVICE UPDATE SUCCESSFUL');
define('MESSAGE_SUB_SERVICE_UPD_FAILURE', 'SUB SERVICE UPDATE UNSUCCESSFUL..!!');


/*----Gallery Message Constants Starts----*/
define('MESSAGE_GALLERY_ADD_SUCCESS', 'GALLERY ADDITION SUCCESSFUL');
define('MESSAGE_GALLERY_ADD_FAILURE', 'GALLERY ADDITION UNSUCCESSFUL..!!');
define('MESSAGE_GALLERY_UPD_SUCCESS', 'GALLERY UPDATE SUCCESSFUL');
define('MESSAGE_GALLERY_UPD_FAILURE', 'GALLERY UPDATE UNSUCCESSFUL..!!');

define('MESSAGE_FILES_ADD_SUCCESS', 'FILES ADDITION SUCCESSFUL');
define('MESSAGE_FILES_ADD_FAILURE', 'FILES ADDITION UNSUCCESSFUL..!!');
define('MESSAGE_FILES_UPD_SUCCESS', 'FILES UPDATE SUCCESSFUL');
define('MESSAGE_FILES_UPD_FAILURE', 'FILES UPDATE UNSUCCESSFUL..!!');

/*----Complaint Message Constants Ends----*/

/*----Editor Message Constants Starts----*/
define('MESSAGE_STAFF_ADD_SUCCESS', 'STAFF ADDITION SUCCESSFUL');
define('MESSAGE_STAFF_ADD_FAILURE', 'STAFF ADDITION UNSUCCESSFUL..!!');
define('MESSAGE_STAFF_UPD_SUCCESS', 'STAFF UPDATE SUCCESSFUL');
define('MESSAGE_STAFF_UPD_FAILURE', 'STAFF UPDATE UNSUCCESSFUL..!!');
/*----Editor Message Constants Ends----*/

define('MESSAGE_PRODUCT_ADD_SUCCESS', 'PRODUCT ADDITION SUCCESSFUL');
define('MESSAGE_PRODUCT_ADD_FAILURE', 'PRODUCT ADDITION UNSUCCESSFUL..!!');
define('MESSAGE_PRODUCT_UPD_SUCCESS', 'PRODUCT UPDATE SUCCESSFUL');
define('MESSAGE_PRODUCT_UPD_FAILURE', 'PRODUCT UPDATE UNSUCCESSFUL..!!');
/*----Service Message Constants Ends----*/

/*----Pagination Variable Constants Starts----*/
define('PAGINATION_SERVICE_SEGMENT', 5);
define('PAGINATION_SERVICE_LIMIT', 15);

define('PAGINATION_STAFF_SEGMENT', 5);
define('PAGINATION_STAFF_LIMIT', 15);

define('PAGINATION_SUB_SERVICE_SEGMENT', 6);
define('PAGINATION_SUB_SERVICE_LIMIT', 15);

define('PAGINATION_FRONT_PRODUCT_SEGMENT', 3);
define('PAGINATION_PRODUCT_SEGMENT', 5);
define('PAGINATION_PRODUCT_LIMIT', 15);

define('PAGINATION_AJAX_PRODUCT_SEGMENT',4);
define('PAGINATION_AJAX_PRODUCT_LIMIT', 15);

define('PAGINATION_AJAX_SERVICE_SEGMENT',4);
define('PAGINATION_AJAX_SERVICE_LIMIT', 15);

/*----Pagination Variable Constants eNDS----*/
