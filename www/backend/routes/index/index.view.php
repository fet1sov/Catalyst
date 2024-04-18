<?php
    Renderer::includeTemplate("frontend/components/cubeback.php", []);
?>

<style>
	div.description-block {
		display: flex;
		justify-content: space-between;
		flex-direction: row;

		animation-name: appearAnimation-Y;
		animation-duration: 0.5s;
	}

	div.description-block .secondary-description {
		color: var(--secondary-color-02);
		font-size: 16px;

		display: flex;
		justify-content: flex-start;
		flex-direction: column;
		align-items: end;
	}

	div.description-block h2 {
		font-size: 48px;
		font-weight: bold;
	}

	.offer-block {
		display: flex;
		justify-content: center;
		flex-direction: column;
	}

	.offer-block div h2{
		margin-right: 50px;
	}

	#aboutusBlock div.description-block.offer-block {
		display: flex;
		flex-direction: column;
	}

	#aboutusBlock div.offers-block {
		display: flex;
		flex-direction: row;
	}

	#aboutusBlock div.offers-block div {
		margin: 10px;
		background-color: var(--secondary-color-04);

		border-radius: 10px;
		padding: 15px;
	}

	#aboutusBlock {
		display: flex;
		flex-direction: column;
		position: relative;
	}

	#aboutusBlock a {
		position: absolute;
		top: -20px;
	}

	@media (max-width: 600px) {
		#contactForm {
			display: flex;
			flex-direction: column;
		}

		div.description-block {
			flex-direction: column;
		}

		div.description-block:nth-child(n) {
			margin-bottom: 10px;
		}

		form.primary-form {
			margin-top: 50px;
		}
	}

	@media (max-width: 820px) {
		#aboutusBlock div.offers-block {
			flex-direction: column;
		}
	}
</style>


<section>
	<div class="description-block">
		<h2>
			<?= $GLOBALS["locale"]["agencyDescription"]["mainDescription"] ?>
			<span class="red-text bold-text">
			Catalyst
			</span>
		</h2>
		<div class="secondary-description">
			<p><?= $GLOBALS["locale"]["agencyDescription"]["secondaryDescription"] ?></p>
			<a href="#aboutus" class="link-button"><?= $GLOBALS["locale"]["moreButton"] ?></a>
		</div>
	</div>
</section>
<section id="aboutusBlock">
	<a name="aboutus"></a>
	<div class="description-block offer-block">
		<h2>
			<?= $GLOBALS["locale"]["aboutusDescription"]["aboutusBlockName"] ?>
		</h2>
		<div class="offers-block">
			<div>
				<h3>
					<?= $GLOBALS["locale"]["aboutusDescription"]["aboutusmainDescription1"] ?>
				</h3>
				<p>
					<?= $GLOBALS["locale"]["aboutusDescription"]["aboutussecondDescription1"] ?>
				</p>
			</div>
			<div>
				<h3>
					<?= $GLOBALS["locale"]["aboutusDescription"]["aboutusmainDescription2"] ?>
				</h3>
				<p>
					<?= $GLOBALS["locale"]["aboutusDescription"]["aboutussecondDescription2"] ?>
				</p>
			</div>
			<div>
				<h3>
					<?= $GLOBALS["locale"]["aboutusDescription"]["aboutusmainDescription3"] ?>
				</h3>
				<p>
					<?= $GLOBALS["locale"]["aboutusDescription"]["aboutussecondDescription3"] ?>
				</p>
			</div>
			<div>
				<h3>
					<?= $GLOBALS["locale"]["aboutusDescription"]["aboutusmainDescription4"] ?>
				</h3>
				<p>
					<?= $GLOBALS["locale"]["aboutusDescription"]["aboutussecondDescription4"] ?>
				</p>
			</div>
			<div>
				<h3>
					<?= $GLOBALS["locale"]["aboutusDescription"]["aboutusmainDescription5"] ?>
				</h3>
				<p>
					<?= $GLOBALS["locale"]["aboutusDescription"]["aboutussecondDescription5"] ?>
				</p>
			</div>
		</div>
	</div>
</section>
<section>
	<a name="form"></a>
	<div class="description-block offer-block" id="contactForm">
		<div>
			<h2>
				<?= $GLOBALS["locale"]["agencyDescription"]["formBlockName"] ?>
			</h2>
		</div>
		<div>
		</div>
		<div>
			<form class="primary-form" method="POST" action="/register">
				<input type="text" name="name" placeholder="<?= $GLOBALS["locale"]["placeholders"]["name"] ?>">
				<input type="text" name="company" placeholder="<?= $GLOBALS["locale"]["placeholders"]["company"] ?>">
				<input type="email" name="email" placeholder="<?= $GLOBALS["locale"]["placeholders"]["email"] ?>">
				<button class="button-primary button-secondary"><?= $GLOBALS["locale"]["placeholders"]["contactButton"] ?></button>
			</form>
		</div>
	</div>
</section>