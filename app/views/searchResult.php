<h3><?php echo $pageTitle; ?></h3>
<div class="content">

    <article class="post">         
        <?php
        if(!empty($searchResult)):
            foreach($searchResult as $key => $value): ?>
                <div class="post-content">
                    <div class="title">
                        <h2>
                            <a href="<?php echo BASE_URL ?>/index/postDetails/<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a>
                        </h2>
                    </div>
                    <p><?php 
                        $text = $value['content'];
                        if($text > 300){
                            echo substr($text, 0, 300);
                        }

                    ?></p>
                    <a class="read-more" href="<?php echo BASE_URL ?>/index/postDetails/<?php echo $value['id'] ?>">Read More...</a>
                </div>
        <?php endforeach;
        else:
            echo "<h3>Category Not Found!</h3>";
        endif;
        ?>
                
    </article>

            
