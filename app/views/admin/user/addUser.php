<div class="content">
    <h1>Add User</h1>
    <?php 
		if(!empty($_GET['errorMessage'])){
			$errorMessage = unserialize(urldecode($_GET['errorMessage']));
            // echo "<pre>";
            // print_r($errorMessage);
            
            echo '<div style="color:red; border:1px solid red; padding:5px 10px; margin:5px;">';
                foreach($errorMessage as $key => $value){
                    switch ($key) {
                        case 'username':
                            foreach($value as $val){
                                echo "Username: {$val}</br>";
                            }
                            break;

                        case 'password':
                            foreach($value as $val){
                                echo "Password: {$val}</br>";
                            }
                            break;
                        case 'level':
                            foreach($value as $val){
                                echo "User Level: {$val}</br>";
                            }
                            break;
                    }
                }
            echo '</div>';
		}
	?>
    <form action="<?php echo BASE_URL ?>/User/addNewUser" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" require="1"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" require="1"></td>
            </tr>
            <tr>
                <td>User Roles</td>
                <td>
                    <select class="user-roles-list" name="level">
                        <option>Select User Roles</option>
                        <option value="1">Administrator</option>
                        <option value="2">Author</option>
                        <option value="3">Contributor</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Make User"></td>
            </tr>
        </table>
    </form>
</div>