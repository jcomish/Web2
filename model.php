<?php

require '../inc/connect.php';

$db = dbConnect();

?>

<?php

// function get_userpass($userpass) {
// 
//     global $db;
// 
//     try {
//         $query = 'SELECT id, username, password FROM members WHERE quorum=:quorum';
//         $stmt = $db->prepare($query);
//         $stmt->bindValue(':quorum', $quorum);
//         $stmt->execute();
//         $ymdata = $stmt->fetchAll();
//         $stmt->closeCursor();
//         return $ymdata;
//     } catch (Exception $ex) {
//         return FALSE;
//     }
// }

function get_all_members() {
    global $db;
    try {
        $query = 'SELECT * FROM members';
        $stmt = $db->prepare($query);
        $stmt->execute();
        $members = $stmt->fetchAll();
        $stmt->closeCursor();
        return $members;
    } catch (Exception $ex) {
        return FALSE;
    }
}

function get_userpass($id) {
    global $db;
    try {
        $query = 'SELECT * FROM members WHERE id=:id';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $members = $stmt->fetch();
        $stmt->closeCursor();
        return $members;
    } catch (Exception $ex) {
        return FALSE;
    }
}

function update_userpass($id, $username, $password) {
    global $db;
    try {
        $query = 'UPDATE members SET username=:username,'
                . 'password:password WHERE id=:id';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
//         $stmt->bindValue(':active', $active);
        $stmt->execute();
        $stmt->closeCursor();
        return TRUE;
    } catch (Exception $ex) {
        return FALSE;
    }
}

function add_member($username, $password) {
    global $db;
    try {
    	$password =password_hash('$password', PASSWORD_DEFAULT);
        $query = 'INSERT INTO members(username, password) VALUES (:username,:password)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        $stmt->closeCursor();
        return TRUE;
    } catch (Exception $ex) {
        return FALSE;
    }
}



// function compare_user_pass($myusername, $mypassword) {
//     global $db;
//     try {
//         $query = 'SELECT * FROM members WHERE username=:username AND password=:password';
//         $stmt = $db->prepare($query);
//         $stmt->bindValue(':username', $myusername);
//         $stmt->bindValue(':password', $mypassword);
//         $stmt->execute();
//         $userpass= $stmt->fetch();
//         $stmt->closeCursor();
//         return $userpass;
//     } catch (Exception $ex) {
//         return FALSE;
//     }
// }