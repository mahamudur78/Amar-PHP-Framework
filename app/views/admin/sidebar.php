<div class="sidebar dashboard-manu">
    <h3>Site Option</h3>
    <nav>
        <ul>
            <li><a href="<?php echo BASE_URL; ?>/Admin">Home</a></li>
            <li><a href="<?php echo BASE_URL; ?>/Logout">Logout</a></li>
        </ul>
    </nav>

    <?php if(Session::get('level') == '1'): ?>
    <h3>Manage User</h3>
    <nav>
        <ul>
            <li><a href="<?php echo BASE_URL; ?>/User/makeUser">Make User</a></li>
            <li><a href="<?php echo BASE_URL; ?>/User/userList">User List</a></li>
        </ul>
    </nav>
    <?php endif ?>

    <h3>Category Option</h3>
    <nav>
        <ul>
            <li><a href="<?php echo BASE_URL; ?>/Admin/addCategory">Add Category</a></li>
            <li><a href="<?php echo BASE_URL; ?>/Admin/categoryList">Category list</a></li>
        </ul>
    </nav>

    <h3>Post Option</h3>
    <nav>
        <ul>
            <li><a href="<?php echo BASE_URL; ?>/Admin/addArtical">Add Article</a></li>
            <li><a href="<?php echo BASE_URL; ?>/Admin/articleList">Article list</a></li>
        </ul>
    </nav>
</div>