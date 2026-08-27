<?php 
/* Template Name: Contact */
get_header();
?>

<div class="main_layout">
	<div class="contact_wrapper">
		<div class="left_section">
			<div class="ct_info">
				<?php the_field('contact_info'); ?>
			</div>

			<div class="vat_profile">
				<?php the_field('vat_info'); ?>
			</div>
		</div>
		<div class="right_section">
			<div class="form_wrap">
				<iframe
					src="https://link.smartwebsite360.com/widget/form/B1LLvOARhRLPJ7570tJD"
					style="width:100%;height:100%;border:none;border-radius:3px"
					id="inline-B1LLvOARhRLPJ7570tJD" 
					data-layout="{'id':'INLINE'}"
					data-trigger-type="alwaysShow"
					data-trigger-value=""
					data-activation-type="alwaysActivated"
					data-activation-value=""
					data-deactivation-type="neverDeactivate"
					data-deactivation-value=""
					data-form-name="Contact Form"
					data-height="581"
					data-layout-iframe-id="inline-B1LLvOARhRLPJ7570tJD"
					data-form-id="B1LLvOARhRLPJ7570tJD"
					title="Contact Form"
						>
				</iframe>
				<script src="https://link.smartwebsite360.com/js/form_embed.js"></script>
<!-- 				<h2 class="ft_50"><?php the_field('contact_form_title'); ?></h2>
				<div class="main_form">
					<?php the_field('contact_form_code'); ?>
				</div> -->
			</div>
			<div class="studio_logo">
				<?php the_field('logo'); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>