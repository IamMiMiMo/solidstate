
    <?php
        the_content();
    ?>

    <i class="fas fa-tag"></i> 
    <span class="tag">
        <?php
            foreach(get_tags() as $tag){
                $tag_link = get_tag_link( $tag->term_id );
                echo '<span><a href="' . $tag_link . '">' . $tag->name . '</a></span>';   
            }
        ?>
    </span>

    <?php
        comments_template();
    ?>
