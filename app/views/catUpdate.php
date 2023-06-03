<?php include_once 'header.php'; ?>
    <h1>Update Category</h1>

    <?php 
        if( isset($msg)){
            echo "<span style='color:blue; font-weight:bold'>". $msg."</span>";
        }
    ?>
    
    <form action="http://localhost/amar-mvc/Category/updateCat" method="post">
        <table>
            <?php 
            if(isset($catUpdate)):
                foreach( $catUpdate as $value): ?>
                    <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                <tr>
                    <td>ID: <?php echo $value['id'] ?></td>
                </tr>   
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" require="1" value="<?php echo $value['name'] ?>"></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" require="1" value="<?php echo $value['title'] ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Update"></td>
                </tr>

            <?php 
                endforeach;
            endif;
            ?>
        </table>
    </form>

<?php include_once 'fooder.php'; ?>