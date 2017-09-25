<?php

//user helper functions

function is_login() {
    if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] != '')) {
        return true;
    } else {
       return false;
    }
}

function is_admin() {
    if (isset($_SESSION['admin_id']) && ($_SESSION['admin_id'] != '')) {
        return true;
    } else {
       return false;
    }
}

function is_case() {
    if (isset($_SESSION['permissionsession']['cases'])) {
   // if (isset($_SESSION['permissionsession']['cases']) && ($_SESSION['permissionsession']['cases'] == '1')) {
   // if (isset($_SESSION['permissionsession']['cases']) && ($_SESSION['permissionsession']['cases'] == '1' || $_SESSION['permissionsession']['cases'] == '2')) {
        return true;
    } else {
       return false;
    }
}

function is_document(){
     if (isset($_SESSION['permissionsession']['documents']) && ($_SESSION['permissionsession']['documents'] != '3')) {
        return true;
    } else {
       return false;
    }
}

function is_event(){
     if (isset($_SESSION['permissionsession']['events']) && ($_SESSION['permissionsession']['events'] != '3')) {
        return true;
    } else {
       return false;
    }
}

function is_message(){
     if (isset($_SESSION['permissionsession']['messaging']) && ($_SESSION['permissionsession']['messaging'] != '3')) {
        return true;
    } else {
       return false;
    }
}

function is_comment(){
     if (isset($_SESSION['permissionsession']['commenting']) && ($_SESSION['permissionsession']['commenting'] != '3')) {
        return true;
    } else {
       return false;
    }
}

function is_reporting(){
     if (isset($_SESSION['permissionsession']['Reporting']) && ($_SESSION['permissionsession']['Reporting'] != '6')) {
        return true;
    } else {
       return false;
    }
}

function is_billing(){
     if (isset($_SESSION['permissionsession']['billing']) && ($_SESSION['permissionsession']['billing'] != '3')) {
        return true;
    } else {
       return false;
    }
}
