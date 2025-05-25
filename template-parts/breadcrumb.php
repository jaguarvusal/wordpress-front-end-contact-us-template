<?php
/**
 * Template part for displaying breadcrumb navigation
 */
?>
<div class="breadcrumb">
    <?php
    // Get the current page ID and URL
    $current_page_id = get_the_ID();
    $current_url = get_permalink($current_page_id);
    
    // Start with home link
    echo '<a href="' . esc_url(home_url('/')) . '">Home</a>';
    
    // Get the primary menu items
    $menu_items = wp_get_nav_menu_items('primary');
    
    if ($menu_items) {
        // Find the current page in the menu
        $current_menu_item = null;
        $menu_path = array();
        
        // First pass: find the current page in the menu
        foreach ($menu_items as $item) {
            if ($item->url === $current_url) {
                $current_menu_item = $item;
                break;
            }
        }
        
        // If current page is not in menu, try to find parent pages
        if (!$current_menu_item) {
            $ancestors = get_post_ancestors($current_page_id);
            if ($ancestors) {
                foreach ($ancestors as $ancestor) {
                    $ancestor_url = get_permalink($ancestor);
                    foreach ($menu_items as $item) {
                        if ($item->url === $ancestor_url) {
                            $current_menu_item = $item;
                            break 2;
                        }
                    }
                }
            }
        }
        
        // Build the menu path
        if ($current_menu_item) {
            // Get all parent menu items
            $parent_id = $current_menu_item->menu_item_parent;
            while ($parent_id) {
                foreach ($menu_items as $item) {
                    if ($item->ID === $parent_id) {
                        array_unshift($menu_path, $item);
                        $parent_id = $item->menu_item_parent;
                        break;
                    }
                }
            }
            
            // Add parent menu items to breadcrumb
            foreach ($menu_path as $item) {
                echo ' / <a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
            }
            
            // Add current menu item
            if ($current_menu_item->menu_item_parent) {
                // If it's a submenu item, show it as part of the path
                echo ' / <a href="' . esc_url($current_menu_item->url) . '">' . esc_html($current_menu_item->title) . '</a>';
            } else {
                // If it's a top-level item, show it as the current page
                echo ' / <span>' . esc_html($current_menu_item->title) . '</span>';
            }
        } else {
            // If page is not in menu, just show the page title
            echo ' / <span>' . esc_html(get_the_title()) . '</span>';
        }
    } else {
        // If no menu exists, fall back to page hierarchy
        $ancestors = get_post_ancestors($current_page_id);
        if ($ancestors) {
            $ancestors = array_reverse($ancestors);
            foreach ($ancestors as $ancestor) {
                echo ' / <a href="' . esc_url(get_permalink($ancestor)) . '">' . esc_html(get_the_title($ancestor)) . '</a>';
            }
        }
        echo ' / <span>' . esc_html(get_the_title()) . '</span>';
    }
    ?>
</div> 