<?php
function wolf_breadcrumbs(){

    if( ! is_home() && ! is_search() ) {
    
        $breadcrumb = '<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
        $breadcrumb .= '<ul class="breadcrumb">';

        $page_id = get_the_ID();
        
        if( is_page() ) {
        
            $breadcrumb .= wolf_breadcrumbs_get_home_link() . wolf_breadcrumbs_get_parent_page_link( $page_id );
            
        } elseif( is_single() ) {
        
            if( '' != get_query_var( 'attachment_id' ) || '' != get_query_var( 'attachment' ) ) {
            
                $post = get_post( get_post_field( 'post_parent', get_the_ID() ) );
                $breadcrumb .= wolf_breadcrumbs_get_home_link() . wolf_breadcrumbs_get_category_links( $post->ID ) . wolf_breadcrumbs_get_parent_page_link( $post->ID ) . wolf_breadcrumbs_get_page_title($page_id);
                
            } else {
                $breadcrumb .= wolf_breadcrumbs_get_home_link() . wolf_breadcrumbs_get_category_links( $page_id ) . wolf_breadcrumbs_get_page_title( $page_id );
            }
            
        } elseif( is_archive() ) {

            if( is_author() ) {
                $breadcrumb .= wolf_breadcrumbs_get_home_link() . __( 'Archives', 'wolf' ) . ' ' . __( '/', 'wolf' ) . ' ' . wolf_breadcrumbs_get_author_display_name(); 
            } elseif( '' != get_query_var( 'year' ) || '' != get_query_var( 'monthnum' ) || '' != get_query_var( 'm' ) || '' != get_query_var( 'day' ) ) {
                $breadcrumb .= wolf_breadcrumbs_get_home_link() . __( 'Archives', 'wolf' ) . ' ' . __( '/', 'wolf' ) . ' ' . wolf_breadcrumbs_get_date_labels(); 
            } else {
                $breadcrumb .= wolf_breadcrumbs_get_home_link() . __( 'Archives', 'wolf' ) . ' ' . __( '/', 'wolf' ) . ' ' . wolf_breadcrumbs_get_category_links();
            }
        }
        
        $breadcrumb .= '</ul></div>';

        return $breadcrumb;
        
    }
    
}

function wolf_breadcrumbs_get_home_link() {
    return '<li class="home-breadcrumb"><a href="' . home_url() . '" itemprop="url"><span itemprop="title">' . __( 'Home', 'wolf' ) . '</span></a><span class="divider">/</span></li>';
}

function wolf_breadcrumbs_get_category_links( $page_id = '' ) {
    if( strlen( trim( $page_id ) ) > 0 ) {
        $cat_name = '';
        $cat_url = '';
        $cats = get_the_category( $page_id );
        if( count( $cats) > 0 ) {
            $cat = $cats[0];
            $cat_id = $cat->cat_ID;
            $cat_name = $cat->cat_name;
            $cat_url = get_category_link( $cat_id );
        }
    } else {
        if( single_tag_title( '', false == '' ) ) {
            $cat_id = get_query_var( 'cat' );
            $cat_name = get_cat_name( $cat_id );
            $cat_url = get_category_link( $cat_id );
        } else {
            $cat_url = get_tag_link( get_query_var( 'tag_id' ) );
            $cat_name = single_tag_title( '', false );
        }
    }
    $cat_link = '<li>';
        $cat_link .= '<a href="' . $cat_url . '" itemprop="url"><span itemprop="title">' . $cat_name . '</span></a>';
        if( strlen( trim( $page_id ) ) > 0 && strlen( trim( $cat_name ) ) > 0)
            $cat_link .= '<span class="divider">/</span>';
    $cat_link .= '</li>';

    return $cat_link;    
}


function wolf_breadcrumbs_get_date_labels() {
    $date_label = '<li>';
    if( '' != get_query_var( 'day' ) ) {
        $date_label .= date( get_option( 'date_format' ), mktime(0, 0, 0, get_query_var( 'monthnum' ), get_query_var( 'day' ), get_query_var( 'year' ) ) );
    } elseif( '' != get_query_var( 'monthnum' ) ) {
        $date_label = get_the_time( 'F Y' );
    } elseif( '' != get_query_var( 'm' ) ) { 
        if( strlen( get_query_var( 'm' ) ) == 6 ) {
            $date_label .= get_the_time( 'F Y' );
        } else {
            $year = substr( get_query_var( 'm' ), 0, 4 );
            $month = substr( get_query_var( 'm' ), 4, 2);
            $day = substr( get_query_var( 'm' ), 6, 2 );
            $date_label .= date( get_option( 'date_format' ), mktime(0, 0, 0, $month, $day, $year ) );
        }
    } elseif( '' != get_query_var( 'year' ) ) {
        $date_label .= get_query_var( 'year' );
    }
    $date_label .= '</li>';
    return $date_label;
}

function wolf_breadcrumbs_get_parent_page_link( $page_id ) {
    $page = get_page( $page_id );
    $page_link = '';
    if( $page->post_parent ) {
        $page_link = wolf_breadcrumbs_get_parent_page_link( $page->post_parent );
    }
    $page_link .= '<li>';
        if( get_the_ID() == $page->ID ) {
            $page_link .= get_the_title();
        } else {
            $page_link .= '<a href="' . get_permalink( $page_id ) . '" itemprop="url"><span itemprop="title">' . get_the_title( $page_id ) . '</span></a>';
            $page_link .= '<span class="divider">/</span>';
        }
    $page_link .= '</li>';
    return $page_link;
}

function wolf_breadcrumbs_get_page_title( $page_id ) {
    
    $page_title = '<li class="active">';
        if( is_single() ) {
            if( strlen( $the_title = get_the_title( $page_id ) ) ) {
                $page_title .= $the_title;
            } else {
                $page_title .= get_permalink( $page_id );
            }
        } else {
            $categories = get_the_category();
            $category = $categories[0];
            $page_title .= $category->name;
        }
    $page_title .= '</li>'; 
    return $page_title;
}

function wolf_breadcrumbs_get_author_display_name() {

    $author_data = get_userdata( get_query_var( 'author' ) );
    return '<a href="' . esc_html( get_author_posts_url( $author_data->ID ) ) . '">' . $author_data->display_name .'</a>';
}