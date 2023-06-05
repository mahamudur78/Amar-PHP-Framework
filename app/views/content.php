<h3><?php echo $pageTitle; ?></h3>
<div class="content">

    <article class="post">  
        <?php foreach($allpost as $key => $value): ?>
            <div class="post-content">
                <div class="title">
                    <h2>
                        <a href="<?php echo BASE_URL ?>/index/postDetails/<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a>
                    </h2>
                    <?php if($pageTitle == 'Category Post'): ?>
                        <p>Category: <?php echo $value['name'] ?></p>
                    <?php else: ?>
                        <p>Category: <a href="<?php echo BASE_URL; ?>/index/postByCat/<?php echo $value['cat'] ?>"><?php echo $value['name'] ?></a></p>
                    <?php endif ?>
                    
                    
                </div>
                <p><?php 
                    $text = $value['content'];
                    if($text > 300){
                        echo substr($text, 0, 300);
                    }

                ?></p>
                <a class="read-more" href="<?php echo BASE_URL ?>/index/postDetails/<?php echo $value['id'] ?>">Read More...</a>
            </div>
        <?php endforeach ?>
                
    </article>

            
