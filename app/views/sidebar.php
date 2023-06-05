<aside class="sidebar">
        <h3>Category</h3>
        <ul>
            <?php
                // echo "<pre>";
                // print_r($catlist);
             ?>

             <?php foreach($catlist as $key => $value): ?>
                <li><a href="<?php echo BASE_URL ?>/index/postByCat/<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></li>
            <?php endforeach ?>
            
        </ul>

        <h3>Latest Post</h3>
        <ul>
            <li><a href="#">My Blog Post Title</a></li>
            <li><a href="#">My Blog Post Title</a></li>
            <li><a href="#">My Blog Post Title</a></li>
            <li><a href="#">My Blog Post Title</a></li>
        </ul>
</aside>