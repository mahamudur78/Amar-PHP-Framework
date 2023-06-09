<h3><?php echo $pageTitle; ?></h3>
<div class="content">

    <article class="post post-details">
        
        <?php 
        if(!empty($postbyid)):
            foreach($postbyid as $key => $value): ?>
                <div class="details">
                    <div class="title">
                        <h2><?php echo $value['title'] ?></h2>
                        <p>Category: <a href="<?php echo BASE_URL; ?>/index/postByCat/<?php echo $value['cat'] ?>"><?php echo $value['name'] ?></a></p>
                    </div>
                    <div class="desc">
                        <p><?php echo $value['content'] ?></p>
                    </div>
                </div> 
        <?php 
            endforeach;
        else:; ?>
            <h3>Category Not Found</h3>
        <?php endif; ?>
       
    </article>

            
