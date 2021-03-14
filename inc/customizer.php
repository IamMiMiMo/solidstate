<?php

function solidstate_customize_register( $wp_customize ){

    function solidstate_sanitize_file( $file, $setting ) {
          
        //allowed file types
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/jpg',
            'png'          => 'image/png'
        );
            
        //check file type from file name
        $file_ext = wp_check_filetype( $file, $mimes );
            
        //if file has a valid mime type return it, otherwise return default
        return ( $file_ext['ext'] ? $file : $setting->default );
    }

    function solidstate_sanitize_radio( $input, $setting ){
          
        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);

        //get the list of possible radio box options 
        $choices = $setting->manager->get_control( $setting->id )->choices;
                          
        //return input if valid or return default option
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
          
    }

    function solidstate_sanitize_select( $input, $setting ){
          
        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);

        //get the list of possible select options 
        $choices = $setting->manager->get_control( $setting->id )->choices;
                          
        //return input if valid or return default option
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
          
    }

    //front page
    $wp_customize->add_section('frontpage', array(
        'title' => __('Front Page', 'frontpage'),
        'priority' => 20,
    ));

    $wp_customize->add_setting('frontpage_icon', array(
        'default' => 'fab fa-wordpress'
    ));
    $wp_customize->add_control( 'frontpage_icon', array(
        'label' => __( 'Front Page Icon', 'front page icon'),
        'description' => 'Enter a font awesome icon ID. Example: fas fa-gem',
        'section' => 'frontpage',
        'settings' => 'frontpage_icon',
    ) );

    $wp_customize->add_setting('frontpage_session',array(
        'default' => 3,
        'sanitize_callback' => 'solidstate_sanitize_select',
    ));
    $wp_customize->add_control('frontpage_session', array(
        'type' => 'select',
        'section' => 'frontpage',
        'label' => __( 'Number of sessions' ),
        'choices' => array(
            'none' => '0',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
            6 => '6',
        ),
    ));

    for($i = 1; $i <= 6; $i++){

        $wp_customize->add_setting('frontpage_session_' . $i . '_title', array(
            'default' => 'Magna arcu feugiat'
        ));
        $wp_customize->add_control( 'frontpage_session_' . $i . '_title', array(
            'label' => __( 'Front Page Session ' . $i . ' Title'),
            'section' => 'frontpage',
            'settings' => 'frontpage_session_' . $i . '_title',
        ) );

        $wp_customize->add_setting('frontpage_session_' . $i . '_content', array(
            'default' => 'Lorem ipsum dolor sit amet, etiam lorem adipiscing elit. Cras turpis ante, nullam sit amet turpis non, sollicitudin posuere urna. Mauris id tellus arcu. Nunc vehicula id nulla dignissim dapibus. Nullam ultrices, neque et faucibus viverra, ex nulla cursus.',
            'sanitize_callback' => 'wp_filter_nohtml_kses',
        ));
        $wp_customize->add_control( 'frontpage_session_' . $i . '_content', array(
            'type' => 'textarea',
            'label' => __( 'Front Page Session ' . $i . ' Content'),
            'section' => 'frontpage',
            'settings' => 'frontpage_session_' . $i . '_content',
        ) );

        $wp_customize->add_setting( 'frontpage_session_' . $i . '_image', array(
            'default' => get_theme_file_uri('images/pic01.jpg'),
            'sanitize_callback' => 'solidstate_sanitize_file',
        ));
     
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'frontpage_session_' . $i . '_image', array(
            'label' => __( 'Front Page Session ' . $i . ' Image'),
            'section' => 'frontpage',
            'settings' => 'frontpage_session_' . $i . '_image',
            'button_labels' => array(
                'select' => 'Select Image',
                'remove' => 'Remove Image',
                'change' => 'Change Image',
            ),
        )));

        $wp_customize->add_setting('frontpage_session_' . $i . '_buttontext', array(
            'default' => 'Read More'
        ));
        $wp_customize->add_control( 'frontpage_session_' . $i . '_buttontext', array(
            'label' => __( 'Front Page Session ' . $i . ' Button Text'),
            'section' => 'frontpage',
            'settings' => 'frontpage_session_' . $i . '_buttontext',
        ) );

        $wp_customize->add_setting('frontpage_session_' . $i . '_url', array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control( 'frontpage_session_' . $i . '_url', array(
            'type' => 'url',
            'label' => __( 'Front Page Session ' . $i . ' Button Link'),
            'section' => 'frontpage',
            'settings' => 'frontpage_session_' . $i . '_url',
        ) );

    }

    $wp_customize->add_setting('frontpage_article_title', array(
        'default' => 'Recent Articles'
    ));
    $wp_customize->add_control( 'frontpage_article_title', array(
        'label' => __( 'Article Title', 'front page article title'),
        'section' => 'frontpage',
        'settings' => 'frontpage_article_title',
    ) );

    $wp_customize->add_setting('frontpage_article_number', array(
        'default' => 4,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control( 'frontpage_article_number', array(
        'type' => 'number',
        'label' => __( 'Number of Articles'),
        'section' => 'frontpage',
        'settings' => 'frontpage_article_number',
    ) );

    $wp_customize->add_setting('frontpage_article_description', array(
        'default' => 'Cras mattis ante fermentum, malesuada neque vitae, eleifend erat. Phasellus non pulvinar erat. Fusce tincidunt, nisl eget mattis egestas, purus ipsum consequat orci, sit amet lobortis lorem lacus in tellus. Sed ac elementum arcu. Quisque placerat auctor laoreet.'
    ));
    $wp_customize->add_control( 'frontpage_article_description', array(
        'type' => 'textarea',
        'label' => __( 'Article Description'),
        'section' => 'frontpage',
        'settings' => 'frontpage_article_description',
    ) );

    $wp_customize->add_setting('frontpage_article_readall',array(
        'default' => 'Browse All',
    ));
    $wp_customize->add_control('frontpage_article_readall', array(
        'type' => 'text',
        'section' => 'frontpage',
        'setting' => 'frontpage_article_readall',
        'label' => 'Front Page "Browse All" text',
    ));

    //blog customize
    $wp_customize->add_section('blog', array(
        'title' => __('Blog', 'blog'),
        'priority' => 21,
    ));

    $wp_customize->add_setting('blog_readmore',array(
        'default' => 'Read More',
    ));
    $wp_customize->add_control('blog_readmore', array(
        'type' => 'text',
        'section' => 'blog',
        'label' => 'Blog "Read More" text',
    ));
        
    //footer customize
    $wp_customize->add_section('footer', array(
        'title' => __('Footer', 'footer'),
        'priority' => 30,
    ));
    $wp_customize->add_setting('footer_type',array(
        'default' => 'html',
        'sanitize_callback' => 'solidstate_sanitize_radio',
    ));
    $wp_customize->add_control('footer_type', array(
        'type' => 'radio',
        'section' => 'footer',
        'label' => 'Footer Type',
        'choices' => array(
            'html' => __( 'Custom HTML' ),
            'columns' => __( 'Pre-defined columns' ),
        ),
    ));
    $wp_customize->add_setting('footer_html',array(
        'default' => '
            <h2 class="major">Get in touch</h2>
            <p>Cras mattis ante fermentum, malesuada neque vitae, eleifend erat. Phasellus non pulvinar erat. Fusce tincidunt, nisl eget mattis egestas, purus ipsum consequat orci, sit amet lobortis lorem lacus in tellus. Sed ac elementum arcu. Quisque placerat auctor laoreet.</p>
            <form method="post" action="#" class="default-contact-form">
            <div class="fields">
                <div class="field">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" />
                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" />
                </div>
                <div class="field">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="4"></textarea>
                </div>
            </div>
            <ul class="actions">
                <li><input type="submit" value="Send Message" /></li>
            </ul>
            </form>
            <ul class="contact">
            <li class="icon solid fa-home">
                Untitled Inc<br />
                1234 Somewhere Road Suite #2894<br />
                Nashville, TN 00000-0000
            </li>
            <li class="icon solid fa-phone">(000) 000-0000</li>
            <li class="icon solid fa-envelope"><a href="#">information@untitled.tld</a></li>
            <li class="icon brands fa-twitter"><a href="#">twitter.com/untitled-tld</a></li>
            <li class="icon brands fa-facebook-f"><a href="#">facebook.com/untitled-tld</a></li>
            <li class="icon brands fa-instagram"><a href="#">instagram.com/untitled-tld</a></li>
            </ul>
        ',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new WP_Customize_Code_Editor_Control($wp_customize, 'footer_html', array(
        'label' => 'Footer HTML',
        'description' => 'Enter in HTML format',
        'code_type' => 'text/html',
        'section' => 'footer',
        'settings' => 'footer_html',
    )));
    $wp_customize->add_setting('footer_column_number',array(
        'default' => '1',
        'sanitize_callback' => 'solidstate_sanitize_select'
    ));
    $wp_customize->add_control('footer_column_number', array(
        'type' => 'select',
        'section' => 'footer',
        'label' => __( 'Number of footer columns' ),
        'description' => __('Content of columns can be edited in Appearance->Widgets'),
        'choices' => array(
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
        ),
    ));
}



add_action( "customize_register", "solidstate_customize_register" );

?>