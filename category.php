<?php
	get_header();
?>
    <section id="wrapper">
        <header>
            <div class="inner">
                <h2>Blog post(s) about "<?php $term = get_queried_object(); echo $term->name?>"</h2>
                <p><?php echo $term->count?> Result(s)</p>
            </div>
        </header>	
        <div class="wrapper">
            <div class="inner">				
                <section class="features">
                    <?php
                        if (have_posts()){
                            
                            while (have_posts()){

                                the_post();
                                //get template-parts/content-archive
                                get_template_part("template-parts/content", "archive");
                                
                            }
                            
                        }
                    ?>
                </section>
                <?php 
                    if (have_posts()){
                        solidstate_numeric_posts_nav(); 
                    }
                ?>
            </div>
        </div>
    </section>
<?php
	get_footer();
?>