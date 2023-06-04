<h3><?php echo $pageTitle; ?></h3>
<div class="content">

    <article class="post">  
        <?php foreach($allpost as $key => $value): ?>
            <div class="post-content">
                
                <h2><a href="<?php echo BASE_URL ?>/index/postDetails/<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a></h2>
                <p><?php 
                    $text = $value['content'];
                    if($text > 200){
                        echo substr($text, 0, 200);
                    }

                ?></p>
                <a class="read-more" href="<?php echo BASE_URL ?>/index/postDetails/<?php echo $value['id'] ?>">Read More...</a>
            </div>
        <?php endforeach ?>
    </article>

            
