<footer class="" style="background-color:#013020;">
	<div class="container c16 py-5">
		<div class="row justify-content-between">
			<div class="col-md-3">
				<?php $logo = get_field('logo', 'options');
				if ($logo) { ?>
					<a class="d-block" href="<?php echo get_option('home'); ?>">
						<img alt="<?php echo $logo['alt']; ?>" class="d-block mx-auto imgc" src="<?php echo $logo['url']; ?>" />
					</a>
				<?php } ?>
				<?php $socials = get_field('social_media', 'options');
				if ($socials) { ?>
					<div class="d-flex align-items-center justify-content-center mt-4" style="gap:15px;">
						<?php foreach ($socials as $social) { ?>
							<a href="<?php echo $social['link']; ?>" target="_blank">
								<img style="max-width:32px;" src="<?php echo $social['icon']['url']; ?>" class="d-block mx-auto imgc" />
							</a>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
			<div class="col-md-3 row mx-0">
				<div class="col">
					<nav id="FooterNav">
						<?php wp_nav_menu(array('theme_location' => 'footer-menu', 'depth' => '1', 'container_class' => 'main_menu')); ?>
					</nav>
				</div>
				<div class="col">
					<nav id="FooterNav">
						<?php wp_nav_menu(array('theme_location' => 'legal-menu', 'depth' => '1', 'container_class' => 'main_menu')); ?>
					</nav>
				</div>
			</div>
			<div class="col-md-5">
				<h4 class="text-center fs60 Niloofar sc3"><?php echo get_field('newletter_t', 'options'); ?></h4>
				<h4 class="text-center fs22 sc1"><?php echo get_field('newletter_st', 'options'); ?></h4>
				<div class="newsletterform pb-3 mt-4" style="    border-bottom: 2px solid #efddce;">
					<?php echo do_shortcode('[contact-form-7 id="6ac2584" title="Newletter Form"]'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="text-center">
		<h4 class="fs20 py-3" style="color:#83A89C;opacity:0.54">
			<?php echo get_field('rights', 'options'); ?>
		</h4>
	</div>
</footer>

<?php wp_footer(); ?>
</body>

</html>