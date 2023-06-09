<div class="search-option">
    <div class="menu">
        <a href="<?php echo BASE_URL;?>">Home</a>
    </div>
    <div class="search">
        <form action="<?php echo BASE_URL; ?>/Index/search" method="post">
            <input type="text" name="keyword" placeholder="Search Hear..."/>

            <select class="catsearch" name="cat">
                <option value="0">Select One</option>
                <?php foreach($catlist as $key => $value): ?>
                    <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <button class="submitbtn" type="submit">Search</button>
        </form>
    </div>
</div> 