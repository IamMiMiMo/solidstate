<?php
    if( ! function_exists( 'comment_styling' ) ):
    function comment_styling($comment, $args, $depth) {
?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div class="comment-meta">
            <div class="comment-avatar">
                <?php echo get_avatar($comment,$size='56',$default='http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g' ); ?>
            </div>
            <div class="comment-by">
                <label><?php echo get_comment_author() ?></label>
                <span><?php printf(esc_html__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></span>
            </div>
        </div>
        <?php comment_text() ?>
        <ul class="actions small">
            <li>
                <?php 
                    $myclass = 'button small fit';
                    echo preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $myclass, 
                        get_comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))), 1 ); 
                ?>
            </li>
        </ul>
    </li>
<?php
    }
    endif;
?>