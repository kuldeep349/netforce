<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */
define('COMP_USER_ID', '123456');
define('COMP_USERNAME', 'company');
define('COMP_NOM_ID', 'cmp');
define('COMP_REF_ID', 'cmp');
///////////////////////////////
define('COMP_USER_ID1', '12346');
define('COMP_USERNAME1', 'company1');

//define('TEST_SECRET_KEY', 'sk_test_cc7744ef5dd61089a608b1f987749aa6d46bc878');
//define('TEST_PUBLIC_KEY', 'pk_test_c0b8fc5cf2e0c44091b8b9b13faaee74b26d89e6');
define('TEST_PUBLIC_RATE', '518');

define('TEST_SECRET_KEY', 'sk_live_2c0fe446ff4ae19c7eee3d19c304d5f1cfcf6018');
define('TEST_PUBLIC_KEY', 'pk_live_38d37ee2d9181b6a91200a0fd870a3d158bd27c7');

/*@payfast*/
define('PAYFAST_MODE', 'LIVE');
define('TEST_PAYFAST_URL', 'https://sandbox.payfast.co.za/eng/process/');
define('TEST_PAYFAST_MERCHANT_KEY', 'm8vh0dspefz0t');
define('TEST_PAYFAST_MERCHANT_ID', '10013558');
///////////////////
define('LIVE_PAYFAST_URL', 'https://www.payfast.co.za/eng/process');
//define('LIVE_PAYFAST_MERCHANT_KEY', 'ifgapnn7kp1az');
//define('LIVE_PAYFAST_MERCHANT_ID', '13988431');
define('LIVE_PAYFAST_MERCHANT_KEY', 'a1nnwiadykgmv');
define('LIVE_PAYFAST_MERCHANT_ID', '14000600');