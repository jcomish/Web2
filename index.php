<?php

include 'model.php';
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


switch ($action) {

    
   case 'get_userpass' :
        $userpass = get_userpass($_POST['id']);
        if ($userpass) {
            $id = $userpass['id'];
            $username = $userpass['username'];
            $password= $userpass['password'];
            //$active = $ym_info['active'];
            include 'userpass_admin_view.php';
        } else {
            $message = 'There was a retrival error to members database.';
            include 'userpass_admin_view.php';
        }
        break;
        
    case 'Update Member' :
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
      //   $active = $_POST['active'];
        $result = update_userpass($id, $username, $password);
        if ($result) {
            $message = 'Update Member Successful';
            include 'userpass_admin_view.php';
        } else {
            $message = 'There was an update error.';
            include 'usernpass_admin_view.php';
        }

        break;
        
    case 'Add Member' :
        $username = $_POST['username'];
        $password = $_POST['password'];
//         $active = $_POST['active'];
        $result = add_member($username, $password);
        if ($result) {
            $message = 'Add Member Successful';
            include 'userpass_admin_view.php';
        } else {
            $message = 'There was an error adding the member.';
            include 'userpass_admin_view.php';
        }

        break;
        
        // case 'Delete Member Profile' :
//         $id = $_POST['id'];
//         $result = delete_($id);
//         if ($result) {
//             $message = 'Delete YM Successful';
//             include 'admin_ym_view.php';
//         } else {
//             $message = 'There was an error deleting the ym.';
//             include 'admin_ym_view.php';
//         }
// 
//         break;

  default:
        $members = get_all_members();
        include 'userpass_admin_view.php';
}











   

?>