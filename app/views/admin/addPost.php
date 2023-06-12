<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
<div class="content">
    <h1>Add Post</h1>
    
    <form action="<?php echo BASE_URL ?>/Admin/insertPost" method="post">
        <table>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" require="1"></td>
            </tr>
            <tr>
                <td>content</td>
                <td><input type="text" name="content" id="editor" require="1"></td>
                <script> ClassicEditor .create( document.querySelector( '#editor' ) ) .catch( error => { console.error( error ); });</script>
            </tr>
            <tr>
                <td>Category</td>
                <td>
                    <select class="categoryList" name="cat">
                        <option value="0">Select One</option>
                        <?php foreach($catlist as $key => $value): ?>
                            <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Save"></td>
            </tr>
        </table>
    </form>
</div>