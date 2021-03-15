<article>
    <a href="<?php the_permalink() ?>" class="image"><img src="<?php the_post_thumbnail_url( array(500,300) )?>" alt="" /></a>
    <i class="far fa-folder"></i> 
    <span class="category">
        <?php
            foreach(get_the_category() as $cat){
                $cat_link = get_category_link( $cat->term_id );
                echo '<span><a href="' . $cat_link . '">' . $cat->cat_name . '</a></span>';  
            }
        ?>
    </span>
    <a href="<?php the_permalink() ?>"><h2 class="major"><?php the_title(); ?></h2></a>
    <?php the_excerpt() ? the_excerpt() : "<p>(No excerpt)</p>" ?>
    <a href="<?php the_permalink() ?>" class="special"><?php echo get_theme_mod('blog_readmore') ? get_theme_mod('blog_readmore') : "Read More" ?></a>
</article>
