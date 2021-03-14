<form action="<?php echo get_site_url() . '/'?>" method="get" class="searchform">
    <label for="search">Search</label>
    <div class="search-container">
        <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
        <button type="submit" alt="Search" class="button primary"><i class="fas fa-search"></i></button>
    </div>
</form>