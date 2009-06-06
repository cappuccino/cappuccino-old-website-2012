	<div id="subNavigation">
		<ul>
		
            <h3>Discuss</h3>
                <ul>
                    <?php
                    
                    if( $wp_query->get_queried_object_id() != 9)
                    {
                    ?>
                    <li class="active"><a href="/discuss/">Cappuccino Blog</a></li>
                    <li><a href="http://www.reddit.com/r/Cappuccino/">Latest News</a></li>
                    <li><a href="/discuss/events/">Events</a></li>
                    <?php
                    }
                    else
                    {
                    ?>
                    <li><a href="/discuss/">Cappuccino Blog</a></li>
                    <li><a href="http://www.reddit.com/r/Cappuccino/">Latest News</a></li>
                    <li class="active"><a href="/discuss/events/">Events</a></li>
                    <?php
                    }
                    
                    ?>
                    <li><a href="/discuss/list.php">Mailing List &amp; IRC</a></li>
                    <li><a href="/discuss/faq.php">Frequently Asked Questions</a></li>
                </ul>

			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

			<!-- Author information is disabled per default. Uncomment and fill in your details if you want to use it.
			<li><h2>Author</h2>
			<p>A little something about you, the author. Nothing lengthy, just an overview.</p>
			</li>
			-->

			<?php if ( is_404() || is_category() || is_day() || is_month() ||
						is_year() || is_search() || is_paged() ) {
			?> <li>

			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>

			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for the day <?php the_time('l, F jS, Y'); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for <?php the_time('F, Y'); ?>.</p>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for the year <?php the_time('Y'); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
			<p>You have searched the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for <strong>'<?php the_search_query(); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p>You are currently browsing the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives.</p>

			<?php } ?>

			</li> <?php }?>

			<?php wp_list_categories('show_count=1&title_li=<h3>Categories</h3>'); ?>

			<li><h3>Archives</h3>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>


			<li>
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</li>

			<?php endif; ?>
		</ul>
	</div>

