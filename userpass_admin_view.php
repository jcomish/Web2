<?php require('../inc/header.php'); ?><?php $INC_DIR = $_SERVER["DOCUMENT_ROOT"]."/inc/";?><?php require($INC_DIR. "header.php");?>


<head>
  <title></title>
</head>


<body class="body">
  <?php require($INC_DIR. "menu.php");?>
  <div id="clear_both"></div>
  
<div id="assignments1">

<h1>Add Username and Password</h1>

<? echo $message; ?>

<form action='.' method='POST'>
	<input type='hidden' name='action' value='get_userpass'>
	Member ID<br />
	<input type='text' name='id'><br />
	<input type='submit' value='Get Member Info'><br />
	
	</form>

<hr>

<form action='.' method='POST'>

<input type='hidden' name='id' value='<?php echo $id ?>'>
            Enter Username <br/>
            <input type='text' name='username' value='<?php echo $username ?>'><br/>
            Enter Password<br/>
            <input type='text' name='password' value='<?php echo $password ?>'><br/>
            <!-- 
Active (enter 0 if you want the YM to be inactive in the database)<br/>
            <input type='text' name='active' value='<?php echo $active ?>'><br/>
 -->
           
            <input type='submit' name='action' value=''>
           <!--  <input type='submit' name='action' value='Update Member'> -->
	        <input type='submit' name='action' value='Add Member'>

        </form>
</div>


<div id="admin_table">
<h1>Username and Passwords</h1>
        <table>
            <tr>
           		<td>ID</td>
                <td>Username</td> 
                <td>Password</td>
                <!-- <td>Active</td> -->
            </tr>

            <?php
            include_once 'model.php';
            $members = get_all_members();
            foreach ($members as $index):
                ?>

                <tr>
                    <td><?php echo $index['id'] ?></td>
                    <td><?php echo $index['username'] ?></td>
                    <td><?php echo $index['password'] ?></td>
                  <!--   <td><?php echo $index['active'] ?></td> -->
                </tr>
            <?php endforeach; ?>
        </table>
    </div>




      <?php include '../inc/footer.php' ?>
   
 
</body>