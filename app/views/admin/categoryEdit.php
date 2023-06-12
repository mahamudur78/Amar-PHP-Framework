<div class="content">
    <h1>Category Edit</h1>
    <?php foreach($catUpdate as $key => $value ): ?>
        <form action="<?php echo BASE_URL ?>/Admin/categoryUpdate/<?php echo $value['id']?>" method="post">
            <table>
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
            </table>
        </form>
    <?php endforeach ?>
</div>