<?php require('partials/header.php'); ?>

<section>
	<div class="shell">
		<h1>Welcome</h1>
	</div><!-- .shell -->
</section>

<section class="section-form">
	<div class="shell">
		<div class="section__head">
			<h2>Create a post</h2>
		</div><!-- .section__head -->

		<div class="section__body">
			<div class="form-posts">
				<form action="<?php echo BASE_URL . 'posts' ?>" method="POST">
					<div class="form__row">
						<input name="title" type="text" />
					</div><!-- .form__row -->

					<div class="form__row">
						<textarea name="body"></textarea>
					</div><!-- .form__row -->

					<div class="form__actions">
						<input type="submit" />
					</div><!-- .form__actions -->
				</form>
			</div><!-- .form-posts -->
		</div><!-- .section__body -->
	</div><!-- .shell -->
</section><!-- .section-form -->

<?php require('partials/footer.php'); ?>
