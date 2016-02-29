<?php ?>
<div class="site-header">

	<div class="top-banner">

		<div class="banner">
		   <?php print render($page['header']); ?>

		</div>

	</div>
	<?php if ($page['topmenu']): ?>

		<div class="main-navigation">

			<div class="top-nav">

				<div class="top-menu-container">
					<?php print render($page['topmenu']); ?>

					<!-- ?php
						$menu = menu_navigation_links('main-menu');
						print theme('links', array('links'=>$menu));
					? -->

					<?php print $search_box ?>

				</div>

			</div>
			
		</div>
	<?php endif; ?>

</div>

<?php if ($breadcrumb): ?>
	<div id="breadcrumb" class="breadcrumb"><?php print $breadcrumb; ?></div>
 <?php endif; ?>
<div class="content-pane">
    <?php if ($page['sidebar']): ?>
      <div id="sidebar" class="column sidebar">
      		<div class="section">
      	  		<?php print render($page['sidebar']); ?>
      		</div>
      	</div> <!-- /.section, /#sidebar-first -->
    <?php endif; ?>


	<div id="main-content" class="main-content">
		<?php if (drupal_is_front_page()) : ?>
			<div class="title-overlay">
				<h1>ACORN</h1>
				<h2>Australian Cybercrime Online Reporting Network</h2>
			</div>
		<?php elseif ($title): ?>
     			<h1 class="title" id="page-title">
       				<?php print $title; ?>
     			</h1>
   			<?php endif; ?>
		<?php print render($page['content']); ?>

	</div>

</div>
<?php if ($page['footer']): ?>
	<div id="footer">
    <?php print render($page['footer']); ?>
  </div>
<?php endif; ?>