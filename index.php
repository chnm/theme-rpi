<?php head(array('bodyid'=>'home')); ?>	

<div id="primary">
    <?php if ($homepageText = strip_formatting(get_theme_option('Homepage Text'))): ?>
    <p><?php echo $homepageText; ?></p>
	<?php endif; ?>
	
	<?php if (get_theme_option('Display Featured Item') == 1): ?>
	<!-- Featured Item -->
	<div id="featured-item">
	    <?php echo display_random_featured_item(); ?>
	</div><!--end featured-item-->	
	<?php endif; ?>
	
	<div id="recent-items">
		<h2>Recently Added Items</h2>
		<?php 
		$homepageRecentItems = (int)get_theme_option('Homepage Recent Items') ? get_theme_option('Homepage Recent Items') : '3';
		set_items_for_loop(recent_items($homepageRecentItems));
		if (has_items_for_loop()): 
		?>
		<div class="items-list">
			<?php while (loop_items()): ?>
			    
			<div class="item">
			    
				<h3><?php echo link_to_item(); ?></h3>
				
				<?php if(item_has_thumbnail()): ?>
    				<div class="item-img">
    				<?php echo link_to_item(item_square_thumbnail()); ?>						
    				</div>
				<?php endif; ?>
				
				<?php if ($desc = item('Dublin Core', 'Description', array('snippet'=>150))): ?>
				    
				    <div class="item-description"><?php echo $desc; ?><p><?php echo link_to_item('see more',(array('class'=>'show'))) ?></p></div>
				
				<?php endif; ?>	

			</div>
			<?php endwhile; ?>	
		</div>
		
		<?php else: ?>
			<p>No recent items available.</p>
			
		<?php endif; ?>
		
		<p class="view-items-link"><a href="<?php echo html_escape(uri('items')); ?>">View All Items</a></p>
		
	</div><!--end recent-items -->		
</div>
<div id="secondary">
	<?php if (get_theme_option('Display Featured Collection') == 1): ?>
		<!-- Featured Collection -->
    	<div id="featured-collection">
    	    <?php echo display_random_featured_collection(); ?>
    	</div><!-- end featured collection -->
	<?php endif; ?>	

	<?php if ((get_theme_option('Display Featured Exhibit') == 1) && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
		<!-- Featured Exhibit -->
		<?php echo exhibit_builder_display_random_featured_exhibit(); ?>
	<?php endif; ?>
	
</div>
	
<?php foot(); ?>