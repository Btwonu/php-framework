<?php require('partials/header.php'); ?>

<section class="section-posts">
	<div class="shell">
		<div class="posts">
			<div class="posts__items">
				<?php foreach ($posts as $post) : ?>
					<div class="posts__item">
						<div class="post">
							<h3><?php echo $post->title ?></h3>

							<p><?php echo $post->body ?></p>		
						</div><!-- .post -->
					</div><!-- .posts__item -->
				<?php endforeach; ?>
			</div><!-- .posts__items -->
		</div><!-- .posts -->
	</div><!-- .shell -->
</section><!-- .section-posts -->

<?php require('partials/footer.php'); ?>
