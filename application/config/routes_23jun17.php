<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Site';
$route['loginform'] = 'Site/loginform';
$route['saveUser'] = 'Site/saveUser';
$route['loginPassword'] = 'Site/loginPassword';
$route['laywerLogin'] = 'Site/laywerLogin';
$route['lawyerdashboard'] = 'LawyerAdmin';
$route['userlogout/(:any)'] = 'Site/userlogout/$1';
$route['permission_error'] = 'Site/permission_error';

//<!------------------------------SUPER ADMIN START----------------------------------->
// SYSTEM ADMINISTRATOR

$route['admin'] = 'SystemAdministrator';
$route['employeelogin'] = 'SystemAdministrator/employeelogin';
$route['employeeregistrationform'] = 'SystemAdministrator/employeeregistrationform';
$route['admindashboard'] = 'SystemAdministrator/admindashboard';
$route['paralegaldashboard'] = 'SystemAdministrator/paralegaldashboard';
$route['staffdashboard'] = 'SystemAdministrator/staffdashboard';
$route['adminlogout'] = 'SystemAdministrator/adminlogout';

//MANAGE COUNTRY

$route['managecountry'] = 'CountrySystem/managecountry';
$route['addNewCountry'] = 'CountrySystem/addNewCountry';
$route['createcountry'] = 'CountrySystem/createcountry';
$route['editcountry/(:any)'] = 'CountrySystem/editcountry/$1';
$route['updatecountry/(:any)'] = 'CountrySystem/updatecountry/$1';
$route['deletecountry/(:any)'] = 'CountrySystem/deletecountry/$1';


//MANAGE STATE

$route['managestate'] = 'StateSystem/managestate';
$route['addNewState'] = 'StateSystem/addNewState';
$route['createstate'] = 'StateSystem/createstate';
$route['editstate/(:any)'] = 'StateSystem/editstate/$1';
$route['updatestate/(:any)'] = 'StateSystem/updatestate/$1';
$route['deletestate/(:any)'] = 'StateSystem/deletestate/$1';

//MANAGE TIMEZONE

$route['managetimezones'] = 'TimezoneSystem/managetimezone';
$route['addNewtimezone'] = 'TimezoneSystem/addNewtimezone';
$route['createtimezone'] = 'TimezoneSystem/createtimezone';
$route['edittimezone/(:any)'] = 'TimezoneSystem/edittimezone/$1';
$route['updatetimezone/(:any)'] = 'TimezoneSystem/updatetimezone/$1';
$route['deletetimezone/(:any)'] = 'TimezoneSystem/deletetimezone/$1';


//MANAGE PACKAGE

$route['managepackage'] = 'PackageSystem/managepackage';
$route['addNewpackage'] = 'PackageSystem/addNewpackage';
$route['createpackage'] = 'PackageSystem/createpackage';
$route['editpackage/(:any)'] = 'PackageSystem/editpackage/$1';
$route['updatepackage/(:any)'] = 'PackageSystem/updatepackage/$1';
$route['deletepackage/(:any)'] = 'PackageSystem/deletepackage/$1';

//MANAGE CASES
$route['viewallcasesadmin'] = 'CaseSystem/viewallcasesadmin';
$route['viewcaseadmin/(:any)'] = 'CaseSystem/viewcaseadmin/$1';
$route['viewallopencasesadmin'] = 'CaseSystem/viewallopencasesadmin';
$route['viewallclosecasesadmin'] = 'CaseSystem/viewallclosecasesadmin';
$route['editcase/(:any)'] = 'CaseSystem/editcase/$1';
$route['addNewCase'] = 'CaseSystem/addNewCase';
//$route['getalldatabyfirmid'] = 'CaseSystem/getalldatabyfirmid';

//23May 2017
$route['submitcase'] = 'CaseSystem/submitcase';
$route['getalldatabyfirmid'] = 'CaseSystem/getalldatabyfirmid';
$route['updatecase/(:any)'] = 'CaseSystem/updatecase/$1';
$route['deletecase/(:any)'] = 'CaseSystem/deletecase/$1';
$route['archivecase/(:any)'] = 'CaseSystem/archivecase/$1';
$route['practicearea'] = 'CaseSystem/allpracticearea';
$route['addNewPracticeArea'] = 'CaseSystem/addNewPracticeArea';
$route['createpracticearea'] = 'CaseSystem/createpracticearea';
$route['editpracticearea/(:any)'] = 'CaseSystem/editpracticearea/$1';
$route['updatepracticearea/(:any)'] = 'CaseSystem/updatepracticearea/$1';
$route['deletepractice/(:any)'] = 'CaseSystem/deletepractice/$1';



//MANAGE FIRM

$route['managefirm'] = 'FirmSystem/managefirm';
$route['addNewfirm'] = 'FirmSystem/addNewfirm';
$route['createfirm'] = 'FirmSystem/createfirm';
$route['viewfirm/(:any)'] = 'FirmSystem/viewfirm/$1';
$route['editfirm/(:any)'] = 'FirmSystem/editfirm/$1';
$route['updatefirm/(:any)'] = 'FirmSystem/updatefirm/$1';
$route['deletefirm/(:any)'] = 'FirmSystem/deletefirm/$1';
$route['firmlogo/(:any)'] = 'FirmSystem/firmlogoupload/$1';

//DOCUMENT MANAGE 
$route['showcasedocument'] = 'DocumentSystem/managedocument';
$route['unreadcasedocument'] = 'DocumentSystem/unreadcasedocument';
$route['firmdocuments'] = 'DocumentSystem/firmdocuments';


//BILLING MANAGE 
$route['billingDashboard'] = 'BillingSystem/billingDashboard';
$route['invoiceslist'] = 'BillingSystem/invoiceslist';
$route['viewinvoicedetials/(:any)'] = 'BillingSystem/viewinvoicedetials/$1';

//TIME ENTRIES
$route['alltimeentries'] = 'TimeentriesSystem/viewalltimeentries';

//MANAGE MESSAGE 
$route['inboxmsg'] = 'MessageSystem/inboxshow';
$route['viewmsg/(:any)'] = 'MessageSystem/viewmsg/$1';
$route['getallsitecaseinfoformsg'] = 'MessageSystem/getallsitecaseinfoformsg';
$route['getallmessagebycaseinfo'] = 'MessageSystem/getallmessagebycaseinfo';
$route['addgroupbymsg/(:any)'] = 'MessageSystem/addgroupbymsg/$1';
$route['insertnewmessage'] = 'MessageSystem/insertnewmessage';
$route['caseLinkAutocomplete'] = 'MessageSystem/caseLinkAutocomplete';
$route['sentToEmailAutocomplete'] = 'MessageSystem/sentToEmailAutocomplete';


//MANAGE WORKFLOW
$route['setworkflow'] = 'WorkflowSystem/setworkflow';

//MANAGE USER

$route['manageuser'] = 'ManageuserSystem/manageuser';
$route['manageusergroup'] = 'ManageuserSystem/manageusergroup';
$route['editusergroup/(:any)'] = 'ManageuserSystem/editusergroup/$1';
$route['updateusergroup/(:any)'] = 'ManageuserSystem/updateusergroup/$1';
$route['manageadminstaff'] = 'ManageuserSystem/manageadminstaff';
$route['editadminstaff/(:any)'] = 'ManageuserSystem/editadminstaff/$1';
$route['updateadminstaff/(:any)'] = 'ManageuserSystem/updateadminstaff/$1';
$route['addadminstaff'] = 'ManageuserSystem/addadminstaff';
$route['createadminstaff'] = 'ManageuserSystem/createadminstaff';
$route['deleteadminstaff/(:any)'] = 'ManageuserSystem/deleteadminstaff/$1';
$route['manageuserpermission'] = 'ManageuserSystem/manageuserpermission';
$route['viewuserpermission/(:any)'] = 'ManageuserSystem/viewuserpermission/$1';
$route['createpermission'] = 'ManageuserSystem/createpermission';
$route['insertpermission'] = 'ManageuserSystem/insertpermission';
$route['updateadminuserpermission'] = 'ManageuserSystem/updateadminuserpermission';
$route['addNewuser'] = 'ManageuserSystem/addNewuser';
$route['createuser'] = 'ManageuserSystem/createuser';
$route['edituser/(:any)'] = 'ManageuserSystem/edituser/$1';
$route['updateuser/(:any)'] = 'ManageuserSystem/updateuser/$1';
$route['deleteuser/(:any)'] = 'ManageuserSystem/deleteuser/$1';


$route['testmail'] = 'ManageuserSystem/testmail';

//STAFF
$route['viewallcases'] = 'CaseSystem/viewallcases';
$route['viewcase/(:any)'] = 'CaseSystem/viewcase/$1';

//DOCUMENT
$route['casedocument'] = 'DocumentAdmin/casedocument';


//MANAGE TASKS

$route['taskmanager'] = 'TaskSystem/taskmanager';
$route['getallsitecaseinfo'] = 'TaskSystem/getallsitecaseinfo';
$route['getalltaskbycaseinfo'] = 'TaskSystem/getalltaskbycaseinfo';
$route['getalltaskbycriteria'] = 'TaskSystem/getalltaskbycriteria';
$route['addTask'] = 'TaskSystem/insertTaskform';
$route['searchfirmnamebycaseid'] = 'TaskSystem/searchfirmnamebycaseid';
$route['inserttask'] = 'TaskSystem/inserttask';
$route['getalltaskbyuserid'] = 'TaskSystem/getalltaskbyuserid';
$route['getalltaskbygroupby'] = 'TaskSystem/getalltaskbygroupby';



$route['edittask/(:any)'] = 'TaskSystem/edittask/$1';
$route['updatetask/(:any)'] = 'TaskSystem/updatetask/$1';
$route['deletetask/(:any)'] = 'TaskSystem/deletetask/$1';
$route['viewtask/(:any)'] = 'TaskSystem/viewtask/$1';


//ALL ADMIN PDF
$route['countryPDFReport'] = 'CountrySystem/pdfreportgenerate';
$route['statePDFReport'] = 'StateSystem/statepdfreportgenerate';
$route['timezonePDFReport'] = 'TimezoneSystem/timezonepdfreportgenerate';
$route['packagePDFReport'] = 'PackageSystem/packagepdfreportgenerate';
$route['taskPDFReport'] = 'TaskSystem/taskpdfreportgenerate';
$route['manageuserPDFReport'] = 'ManageuserSystem/manageuserpdfreportgenerate';
$route['adminstaffPDFReport'] = 'ManageuserSystem/adminstaffpdfreportgenerate';
$route['firmPDFReport'] = 'FirmSystem/firmpdfreportgenerate';
$route['casePDFReport'] = 'CaseSystem/casepdfreportgenerate';


//ALL ADMIN XML/CSV
$route['countryEXLReport'] = 'CountrySystem/exlreportgenerate';
$route['stateEXLReport'] = 'StateSystem/stateexlreportgenerate';
$route['timezoneEXLReport'] = 'TimezoneSystem/timezoneexlreportgenerate';
$route['packageEXLReport'] = 'PackageSystem/packageexlreportgenerate';
$route['taskEXLReport'] = 'TaskSystem/taskexlreportgenerate';
$route['manageuserEXLReport'] = 'ManageuserSystem/manageuserexlreportgenerate';
$route['adminstaffEXLReport'] = 'ManageuserSystem/adminstaffexlreportgenerate';
$route['firmEXLReport'] = 'FirmSystem/firmexlreportgenerate';
$route['caseEXLReport'] = 'CaseSystem/caseexlreportgenerate';

//FRONT END ADMIN ACCOUNT
$route['accountSettings/(:any)'] = 'Account/accountSettings/$1';
$route['mySettings/(:any)'] = 'Account/mySettings/$1';
$route['edituserprofile/(:any)'] = 'Account/edituserprofile/$1';
$route['firmuser'] = 'Account/firmuser';
$route['firmsettings'] = 'Account/firmsettings';
$route['updatefirmsettings/(:any)'] = 'Account/updatefirmsettings/$1';
$route['updatecreditcardinfo/(:any)'] = 'Account/updatecreditcardinfo/$1';
$route['updatepaypalemailinfo/(:any)'] = 'Account/updatepaypalemailinfo/$1';
$route['updatefirmpreferences/(:any)'] = 'Account/updatefirmpreferences/$1';
$route['updateuseracc/(:any)'] = 'Account/updateuseracc/$1';
$route['importExport'] = 'Account/importExport';
$route['zipFiles'] = 'Account/zipFiles';
$route['exportcontact'] = 'Account/exportcontact';
$route['exportcase'] = 'Account/exportcase';
$route['importcontact'] = 'Account/importcontact';
$route['create_zip'] = 'Account/create_zip';
$route['undoimport/(:any)'] = 'Account/undoimport/$1';
$route['viewlog/(:any)'] = 'Account/viewlog/$1';
$route['importcases'] = 'Account/importcases';
$route['customfield'] = 'Account/customfield';
$route['addcustomefield'] = 'Account/addcustomefield';
$route['editcustomedatawithid'] = 'Account/editcustomedatawithid';
$route['updatecustomefield'] = 'Account/updatecustomefield';
$route['deletecustomfield/(:any)'] = 'Account/deletecustomfield/$1';
$route['showcustomefielddata'] = 'Account/showcustomefielddata';
$route['addcontactcustomefield'] = 'Account/addcontactcustomefield';
$route['editcontactfielddatawithid'] = 'Account/editcontactfielddatawithid';
$route['updatecontactcustomefield'] = 'Account/updatecontactcustomefield';
$route['deletecontactcustomfield/(:any)'] = 'Account/deletecontactcustomfield/$1';
$route['addcompanycustomefield'] = 'Account/addcompanycustomefield';
$route['editcompanyfielddatawithid'] = 'Account/editcompanyfielddatawithid';
$route['updatecompanycustomefield'] = 'Account/updatecompanycustomefield';
$route['deletecompanycustomfield/(:any)'] = 'Account/deletecompanycustomfield';
$route['addtimecustomefield'] = 'Account/addtimecustomefield';
$route['edittimefielddatawithid'] = 'Account/edittimefielddatawithid';
$route['updatetimecustomefield'] = 'Account/updatetimecustomefield';
$route['deletetimecustomfield/(:any)'] = 'Account/deletetimecustomfield/$1';
$route['changeaccountemail/(:any)'] = 'Account/changeaccountemail/$1';
$route['changeaccountpassword/(:any)'] = 'Account/changeaccountpassword/$1';
$route['changeavater/(:any)'] = 'Account/changeavater/$1';
$route['updatenotificationinfo'] = 'Account/updatenotificationinfo';



$route['deactivatefirmuser/(:any)'] = 'Account/deactivatefirmuser/$1';
$route['activefirmuser/(:any)'] = 'Account/activefirmuser/$1';


//MANAGE CALENDAR
//24May17
$route['daycalendar'] = 'CalenderSystem/daycalendar';
$route['getcasenamebyid'] = 'CalenderSystem/getcasenamebyid';
$route['getallsitecaseinfoforcal'] = 'CalenderSystem/getallsitecaseinfoforcal';
$route['managelocation'] = 'CalenderSystem/managelocation';
$route['addNewLocation'] = 'CalenderSystem/addNewLocation';
$route['createlocation'] = 'CalenderSystem/createlocation';
$route['deletelocation/(:any)'] = 'CalenderSystem/deletelocation/$1';
$route['editlocation/(:any)'] = 'CalenderSystem/editlocation/$1';
$route['updatelocation/(:any)'] = 'CalenderSystem/updatelocation/$1';

//<!------------------------------SUPER ADMIN END----------------------------------->


//<!------------------------------FRONT END START----------------------------------->

//FOUZIA CODE START
//MANAGE FRONT TASKS

$route['Cronjob'] = 'Cronjob/powerlawaddcase';


$route['savenotes'] = 'LawyerAdmin/savenotes';






$route['tasks'] = 'Task';
$route['tasks/delete/'] = 'Task/deleteTask';
$route['editfronttask/(:any)'] = 'Task/editfronttask/$1';
$route['updatelawyertask/(:any)'] = 'Task/updatelawyertask/$1';
$route['deletelaywertask/(:any)'] = 'Task/deletelaywertask/$1';
$route['viewlawyertask/(:any)'] = 'Task/viewlawyertask/$1';
$route['taskaddform'] = 'Task/taskaddform';
$route['insertnewtask'] = 'Task/insertnewtask';
$route['getfrontalltaskbycriteria'] = 'Task/getfrontalltaskbycriteria';
$route['getfrontalltaskbyuserid'] = 'Task/getfrontalltaskbyuserid';
$route['getfrontalltaskbygroupby'] = 'Task/getfrontalltaskbygroupby';
$route['getfrontallsitecaseinfo'] = 'Task/getfrontallsitecaseinfo';
$route['getfrontalltaskbycaseinfo'] = 'Task/getfrontalltaskbycaseinfo';
$route['getacbyuserid'] = 'Task/getacbyuserid';
$route['savetaskreminder/(:any)'] = 'Task/savetaskreminder/$1';
$route['edittaskreminder/(:any)'] = 'Task/edittaskreminder/$1';
$route['marktaskascomplete'] = 'Task/marktaskascomplete';
$route['addtaskcomment/(:any)'] = 'Task/addtaskcomment';


//fouzia 29may17
$route['getstaffnamebyfirmid'] = 'Cases/getstaffnamebyfirmid';
$route['submitnewcontact'] = 'Cases/submitnewcontact';
$route['insertlawyercase'] = 'Cases/insertlawyercase';


//30May2017
//FRONT DOCUMENT
$route['frontdocumentblankpage'] = 'Document/frontdocumentblankpage';
$route['savetemplate'] = 'Document/savetemplate';
$route['casedoc'] = 'Document/casedoc';


//31May17
//FRONT CALENDAR

$route['frontlocation'] = 'Calender/frontlocation';
$route['addfrontLocation'] = 'Calender/addfrontLocation';
$route['createfrontlocation'] = 'Calender/createfrontlocation';
$route['deletefrontlocation/(:any)'] = 'Calender/deletefrontlocation/$1';
$route['editfrontlocation/(:any)'] = 'Calender/editfrontlocation/$1';
$route['updatefrontlocation/(:any)'] = 'Calender/updatefrontlocation/$1';

//MANAGE FIRM USERS
$route['allfirmusers'] = 'Firm/allfirmusers';
$route['addFirmuser'] = 'Firm/addFirmuser';
$route['insertfirmuser'] = 'Firm/insertfirmuser';
$route['firmuserActivate/(:any)'] = 'Firm/firmuserActivate/$1';
$route['firmuserPassword'] = 'Firm/firmuserPassword';
$route['updatepermission/(:any)'] = 'Firm/updatepermission/$1';


//FRONT PDF
$route['locationPdf'] = 'Calender/locationPdf';
$route['taskpdf'] = 'Task/taskPdf';
$route['contactPdf'] = 'Contact/contactPdf';
$route['opencasePdf'] = 'Cases/opencasePdf';
$route['closecasePdf'] = 'Cases/closecasePdf';
$route['firmopencasePdf'] = 'Cases/firmopencasePdf';
$route['firmclosecasePdf'] = 'Cases/firmclosecasePdf';
$route['practiceAreapdf'] = 'Cases/practiceAreapdf';
$route['companypdf'] = 'Company/companypdf';
$route['contactgrouppdf'] = 'ContactGroup/contactgrouppdf';


//FRONT EXL
$route['locationexl'] = 'Calender/locationexl';
$route['taskexl'] = 'Task/taskexl';
$route['contactexl'] = 'Contact/contactexl';
$route['opencaseexl'] = 'Cases/opencaseexl';
$route['closecaseexl'] = 'Cases/closecaseexl';
$route['firmopencaseexl'] = 'Cases/firmopencaseexl';
$route['firmclosecaseexl'] = 'Cases/firmclosecaseexl';
$route['practiceAreaexl'] = 'Cases/practiceAreaexl';
$route['companyexl'] = 'Company/companyexl';
$route['contactgroupexl'] = 'ContactGroup/contactgroupexl';


//SHIFAT

//Billing
$route['billing/activity'] = 'Billing/activity';
$route['billing/saveActivity'] = 'Billing/saveActivity';
$route['billing/deleteActivity'] = 'Billing/deleteActivity';
$route['billing/expense'] = 'Billing/expense/$1';
$route['billing/timeEntries'] = 'Billing/timeEntries';
$route['billing/saveExpense'] = 'Billing/saveExpense';






//SHATHI
//Lawyer Admin
$route['account'] = 'account';
$route['account/accountNotification'] = 'Account/accountNotification';
$route['account/accountPicture'] = 'Account/accountPicture';
$route['account/changePassword'] = 'Account/changePassword';

$route['firm'] = 'firm';
$route['firm/firmNotification'] = 'Firm/firmNotification';


//contact
$route['contact'] = 'Contact';
$route['contact/addContact'] = 'Contact/addContact';
$route['contact/delete/(:any)'] = 'Contact/delete';
$route['contact/update/(:any)'] = 'Contact/updateForm';
$route['contact/updated/(:any)'] = 'Contact/updated';
$route['contacts/users/(:any)'] = 'Contact/userDetail';
$route['users/caseLink/(:any)'] = 'Contact/caseLink';
$route['users/(:any)/removecaseLink/(:any)'] = 'Contact/removecaseLink';
$route['contact/caseLink/rateUpdate'] = 'Contact/rateUpdate';
$route['contactdel/(:any)'] = 'Contact/contactdel/$1';
$route['contactarchive/(:any)'] = 'Contact/contactarchive/$1';
$route['getcontactbygroupid'] = 'Contact/getcontactbygroupid';
$route['getactivecontact'] = 'Contact/getactivecontact';
$route['getarchivecontact'] = 'Contact/getarchivecontact';

//company
$route['company'] = 'Company';
$route['company/addCompany'] = 'Company/addCompany';
$route['company/add'] = 'Company/add';
$route['company/contactDetails/(:any)'] = 'Company/contactDetails';
$route['company/delete/(:any)'] = 'Company/delete';
$route['company/update/(:any)'] = 'Company/updateForm';
$route['company/updated/'] = 'Company/updated';
$route['company/companyDetails/(:any)'] = 'Company/companyDetails';
$route['company/caseLink/(:any)'] = 'Company/caseLink';
$route['company/contactcaseLink/(:any)'] = 'Company/contactcaseLink';
$route['company/(:any)/removecaseLink/(:any)'] = 'Company/removecaseLink';
$route['company/caseLinkUpdate/Update'] = 'Company/rateUpdate';
$route['getactivecompany'] = 'Company/getactivecompany';
$route['getarchivecompany'] = 'Company/getarchivecompany';
$route['removecaselink'] = 'Company/removecaselinkthroughmodal';
$route['existingcasecontactlink'] = 'Company/existingcasecontactlink';
$route['savecompanynotes/(:any)'] = 'Company/savecompanynotes/$1';
$route['updatecompanynotes/(:any)'] = 'Company/updatecompanynotes/$1';
$route['deletenote/(:any)/(:any)'] = 'Company/deletenote/$1/$1';
$route['getnotebyid'] = 'Company/getnotebyid';
$route['savetrustdeposit'] = 'Company/savetrustdeposit';
$route['companyarchive/(:any)'] = 'Company/companyarchive/$1';


//group
$route['contactGroup'] = 'ContactGroup';
$route['contactGroup/addContactGroup'] = 'ContactGroup/addContactGroup';
$route['contactGroup/create'] = 'ContactGroup/add';
$route['contactGroup/update/(:any)'] = 'ContactGroup/updateForm';
$route['contactGroup/updated/(:any)'] = 'ContactGroup/updated';
$route['contactGroup/delete/(:any)'] = 'ContactGroup/delete';



//case
$route['cases/AddCase'] = 'Cases/AddCase';
$route['caseView/(:any)'] = 'Cases/casedetail';
$route['cases/update/(:any)'] = 'Cases/caseUpdate';
$route['allCases'] = 'Cases/allCases';
$route['allClosedCases'] = 'Cases/allClosedCases';
$route['allFirmOpenCases'] = 'Cases/allFirmOpenCases';
$route['allClosedCases'] = 'Cases/allClosedCases';
$route['cases/practiceArea'] = 'Cases/AddPracticeArea';
$route['cases/aPracticeArea/(:any)'] = 'Cases/aPracticeArea';//incomplete
$route['cases/edit/(:any)'] = 'Cases/aPracticeAreaEdit';//incomplete
$route['Cases/editPracticeArea/(:any)'] = 'Cases/editPracticeArea';
$route['apactiseArea/update'] = 'Cases/PractiseareaUpdate';
$route['allPracticeArea'] = 'Cases/allPracticeArea';

$route['closeCase/(:any)'] = 'Cases/closeCase/$1';
$route['reopenCase/(:any)'] = 'Cases/reopenCase/$1';


//FOUZIA 20JUN 17
$route['searchmycases'] = 'Cases/searchmycases';
$route['searchmyfirmcases'] = 'Cases/searchmyfirmcases';
$route['searchopencases'] = 'Cases/searchopencases';
$route['searchclosecases'] = 'Cases/searchclosecases';
$route['searchcasesbypracticearea'] = 'Cases/searchcasesbypracticearea';

$route['searchmycasesClose'] = 'Cases/searchmycasesClose';
$route['searchmyfirmcasesClose'] = 'Cases/searchmyfirmcasesClose';
$route['searchopencasesClose'] = 'Cases/searchopencasesClose';
$route['searchclosecasesClose'] = 'Cases/searchclosecasesClose';
$route['searchcasesbypracticeareaClose'] = 'Cases/searchcasesbypracticeareaClose';

$route['searchmyfirmopencases'] = 'Cases/searchmyfirmopencases';
$route['searchfirmopencases'] = 'Cases/searchfirmopencases';
$route['searchfirmclosecases'] = 'Cases/searchfirmclosecases';
$route['searchfirmcasesbypracticearea'] = 'Cases/searchfirmcasesbypracticearea';


//INVOICE//

$route['invoices'] = 'Billing/invoices';
$route['addinvoices'] = 'Billing/newInvoices';
$route['searchcaselink'] = 'Billing/searchcaselink';

//tasks 18/17

//$route['tasks'] = 'Task';
//$route['tasks/delete/'] = 'Task/deleteTask';
////tasks 20/17
//$route['Task/editTask/(:any)'] = 'Task/editTask';


//21/17
$route['Cases/viewCase/(:any)'] = 'Cases/viewCase';
//21/17
$route['Contact/AddcontactImage/(:any)'] = 'Contact/AddcontactImage';

//23/17
$route['cases/update/(:any)'] = 'Cases/caseUpdate';
$route['cases/updated'] = 'Cases/updated';
$route['closecases/update/(:any)'] = 'Cases/caseUpdate';
$route['firmopencases/update/(:any)'] = 'Cases/caseUpdate';
$route['firmclosecases/update/(:any)'] = 'Cases/caseUpdate';
$route['messageing/compose'] = 'Messaging/compose';
$route['messageing/inbox'] = 'Messaging/inbox';
$route['messaging/send'] = 'Messaging/send';


$route['message/details/(:any)'] = 'Messaging/details';
$route['Messaging/reply'] = 'Messaging/reply';
$route['messageing/draft'] = 'Messaging/draft';
$route['messageing/archived'] = 'Messaging/archived';
$route['message/delete/(:any)'] = 'Messaging/delete';
$route['getallcasebyuserid'] = 'Messaging/getallcasebyuserid';
$route['getallmessagebycaseinfobyuserid'] = 'Messaging/getallmessagebycaseinfobyuserid';

//SABINA
$route['atviewmsg/(:any)'] = 'Messaging/viewmsg/$1';
$route['ataddgroupbymsg/(:any)'] = 'Messaging/addgroupbymsg/$1';
$route['atinsertnewmessage'] = 'Messaging/insertnewmessage';
$route['getcases'] = 'Messaging/getcases';
$route['atinboxmsg'] = 'Messaging/inboxshow';

$route['company/updateRate'] = 'Company/rateUpdatecase';

//28
$route['messageing/draft'] = 'Messaging/draftshow';
$route['Contact/AddcontactImageuser/(:any)'] = 'Contact/AddcontactImageuser';
$route['archivedmessage/details/(:any)'] = 'Messaging/archivedmessagedetails';
$route['message/draftsend/(:any)'] = 'Messaging/draftsend';
$route['Comment/allcomment'] = 'Comment/allcomment';
$route['Comment/unreadcomment'] = 'Comment/unreadcomment';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
