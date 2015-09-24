<?PHP
require_once("./include/fg_membersite.php");

$fgmembersite = new FGMembersite();

//Provide your site name here
$fgmembersite->SetWebsiteName('example.com');

//Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail('admin@example.com');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$fgmembersite->InitDB(/*hostname*/'localhost',
                      /*username*/'u_app1_devtest',
                      /*password*/'secret_password',
                      /*database name*/'devtest',
                      /*table name*/'fgusers3');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('^XXqSR~!#(EUI#HE(&cVS6DrTzrPvrXX^');

?>
