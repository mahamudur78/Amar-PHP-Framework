<div class="content">
    <h1>Add Category</h1>
    
    <form action="<?php echo BASE_URL ?>/Admin/insertCategory" method="post">
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
</div>