<?php
/**
 * Template part for displaying page header
 */
?>
<div class="page-header">
    <?php get_template_part('template-parts/breadcrumb'); ?>
    <h2><?php the_title(); ?></h2>
    <?php if (get_the_content()): ?>
        <div class="page-content">
            <?php the_content(); ?>
        </div>
    <?php endif; ?>
</div> 