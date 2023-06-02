<?php include_once 'header.php'; ?>
    <h1>Add Category</h1>

    <?php 
        if( isset($msg)){
            echo "<span style='color:blue; font-weight:bold'>". $msg."</span>";
        }
    ?>
    
    <form action="http://localhost/amar-store/Category/insertCategory" method="post">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" require="1"></td>
            </tr>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" require="1"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Save"></td>
            </tr>
        </table>
    </form>

<?php include_once 'fooder.php'; ?>