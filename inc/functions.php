<?php 

// get all category 
function post_cat($category = 'category'){
    $categories = get_categories( array(
        'taxonomy' => $category,
        'orderby' => 'name',
        'order'   => 'ASC',
    ) );
    $cat_list = [];
    foreach($categories as $cat){
        $cat_list[$cat->slug] = $cat->name;
    }
    return $cat_list;
}

// get all post 
function get_all_post($post_type_name = 'post'){
    $posts = get_posts( array(
        'post_type' => $post_type_name,
        'orderby' => 'name',
        'order'   => 'ASC'
    ) );
    $posts_list = [];
    foreach($posts as $post){
        $posts_list[$post->ID] = $post->post_title;
    }
    return $posts_list;
}

// get cat slug and name 
function get_cat_slugs($categories = [],$delimeter = ' ',$term = 'slug'){
    // $slugs = array_map(function($cat) use ($term){
    //     // var_dump($cat);
    //     if ($term == 'slug'){
    //         return $cat->slug;
    //     }
    //     if ($term == 'name'){
    //         return $cat->name;
    //     }
        
    // },$categories);

    $slugs = [];
    foreach($categories as $cat){
        if ($term == 'slug'){
           array_push($slugs, $cat->slug);
        }
        if ($term == 'name'){
            $slugs[] =  $cat->name;
        }
    }
    return implode($delimeter, $slugs);
}

/** Custom kses function */
function persona_kses($persona_custion_tag = ''){

    $persona_allowed_html = [
		'svg'  => [
			'xmlns'       => [],
			'fill'        => [],
			'viewbox'     => [],
			'role'        => [],
			'aria-hidden' => [],
			'focusable'   => [],
			'height'      => [],
			'width'       => [],
		],
		'path' => [
			'd'    => [],
			'fill' => [],
		],
        'a' => [
            'class' => [],
            'href' => [],
        ]
    ];

    return wp_kses($persona_custion_tag, $persona_allowed_html);
}
