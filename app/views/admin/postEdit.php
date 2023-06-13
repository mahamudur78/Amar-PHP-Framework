<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
<div class="content">
    <h1>Edit Post</h1>
    <?php foreach($postByID as $key => $value): ?>
        <form action="<?php echo BASE_URL ?>/Admin/postUpdate/<?php echo $value['id'] ?>" method="post">
            <table> 
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" require="1" value="<?php echo $value['title'] ?>"></td>
                </tr>
                <tr>
                    <td>content</td>
                    <td><textarea type="text" name="content" id="editor" require="1" ><?php echo $value['content'] ?></textarea></td>
                    <script> ClassicEditor .create( document.querySelector( '#editor' ) ) .catch( error => { console.error( error ); });</script>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select class="categoryList" name="cat">
                            <option value="0">Select One</option>
                            
                            <?php foreach($catlist as $catKey => $catValue): ?>
                                <option value="<?php echo $catValue['id']; ?>" <?php echo (($value['cat'] == $catValue['id'])) ? 'selected' : ''; ?>><?php echo $catValue['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Update"></td>
                </tr>
            </table>
        </form>
    <?php endforeach; ?>
</div>