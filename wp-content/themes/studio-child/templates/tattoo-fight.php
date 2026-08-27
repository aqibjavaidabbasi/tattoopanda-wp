<?php 
error_reporting(E_ALL);
/* Template Name: Tattoo Fight */
get_header();
?>

<?php
$title = get_field('hero_title');
$subtitle = get_field('hero_subtitle');
$cta_button_text = get_field('cta_button_text');
$cta_button_link = get_field('cta_button_link');
$shortcode = get_field('shortcode');
$result = display_contest_countdown();
$post_id = get_the_ID(); 

?>

<div class="main_layout">
	<div class="tattoo">
		<div class="banner_wrapper">
			<div class="left_section">
			</div>
			<div class="right_section">
				<div class="ct_info">
					<div class="content_wrap">
						<?php if ($title): ?>
						<div class="content fs_20">
							<?php echo $title; ?>
						</div>
						<?php endif; ?>

						<?php if ($subtitle): ?>
						<h3><?php echo $subtitle; ?></h3>
						<?php endif; ?>
						<?php if ($cta_button_text): ?>
							<button class="button" onclick="window.open('<?php echo $cta_button_link; ?>', '_blank')">
									<span class="button-content"><?php echo $cta_button_text; ?></span>
							</button>
						<?php endif; ?>
					</div>
				</div>
			</div>

		</div>
		
		<section class="section_wrapper" id="nominate">
			<div class="left_section">
					<h2 class=""><?php the_field('intro_text'); ?></h2>
			</div>
			<div class="right_section">
				<div class="form_wrap">
					<div class="giveaway_form">
						<?php echo do_shortcode($shortcode); ?>
					</div>
				</div>
			</div>

		</section>
		
		<?php
		// Get cached active contest ID
		$active_contest_id = get_transient('active_contest_id');

		if ($active_contest_id === false) {
			$current_date = current_time('timestamp');
			$current_time = time();

			// Query for active contests
			$args = array(
				'post_type' => 'contests',
				'post_status' => 'publish',
				'fields' => 'ids',
				'meta_query' => array(
					'relation' => 'AND',
					array(
						'key' => 'activeinactive',
						'value' => 'active',
						'compare' => '='
					),
					array(
						'key' => 'end_date',
						'value' => date('Y-m-d H:i:s', $current_date),
						'compare' => '>=',
						'type' => 'DATETIME'
					)
				),
				'meta_key' => 'end_date',
				'orderby' => 'meta_value',
				'order' => 'ASC',
				'posts_per_page' => 1,
				'no_found_rows' => true,
				'update_post_meta_cache' => false,
				'update_post_term_cache' => false
			);

			$contest_query = new WP_Query($args);
			$active_contest_id = 0;

			if ($contest_query->have_posts()) {
				foreach ($contest_query->posts as $contest_id) {
					$end_date = get_post_meta($contest_id, 'end_date', true);
					$start_date = get_post_meta($contest_id, 'start_date', true);

					$end_timestamp = strtotime($end_date);
					$start_timestamp = strtotime($start_date);

					if ($start_timestamp && $end_timestamp && $current_time >= $start_timestamp && $current_time <= $end_timestamp) {
						$active_contest_id = $contest_id;
						break;
					}
				}
			}
			wp_reset_postdata();
			
			// Cache for 5 minutes
			set_transient('active_contest_id', $active_contest_id, 300);
		}
	?>
	
	<section class="section_wrapper artists-grid">
	  <?php
			if ($active_contest_id):
			// Optimized query with contest filter in SQL
			$args = array(
			  'post_type'      => 'voting-leaderboard',
			  'posts_per_page' => 8,
			  'post_status'    => 'publish',
			  'meta_query' => array(
				  array(
					  'key' => 'contest',
					  'value' => $active_contest_id,
					  'compare' => '='
				  )
			  ),
			  'no_found_rows' => true,
			  'update_post_meta_cache' => true,
			  'update_post_term_cache' => false
			);

			$artist_query = new WP_Query($args);

			if ($artist_query->have_posts()):
			  while ($artist_query->have_posts()): $artist_query->the_post();
				$post_id = get_the_ID();
				$instagram = get_field('ig_handle', $post_id);
				$votes = get_field('votes', $post_id);
				$artist_photo = get_field('artist_photo', $post_id);
		  ?>
			<div class="artist-card">
			  <?php if ($artist_photo): ?>
				<img src="<?php echo esc_url($artist_photo); ?>" alt="<?php the_title_attribute(); ?>">
			  <?php else: ?>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" alt="Artist">
			  <?php endif; ?>

			  <h3><?php the_title(); ?></h3>
			  <p><?php echo esc_html($instagram); ?></p>
			  <p><b>Votes:</b> <?php echo esc_html($votes); ?></p>
				<button class="button" onclick="openVoteModal(<?php echo $post_id; ?>);">
					<span class="button-content vote-now-btn">Vote Now</span>
				</button>
			</div>
		  <?php
			  endwhile;
			  wp_reset_postdata();
			else:
			  echo '<p>No artists found.</p>';
			endif;
		  ?>
			<?php else: ?>
			<div class="no-contest-message">
				<h2>No active giveaways right now</h2>
				<p>Follow us on Instagram for updates and future contests!</p>
			</div>
		  <?php endif; ?>
		</section>


		<section class="voting-status">
		  <div class="container">
			  <div class="box">
				<h2>Thanks for voting!</h2>
				<p>Share your support</p>
				<img src="https://static.vecteezy.com/system/resources/previews/036/594/092/non_2x/man-empty-avatar-photo-placeholder-for-social-networks-resumes-forums-and-dating-sites-male-and-female-no-photo-images-for-unfilled-user-profile-free-vector.jpg" alt="User" />
				<br>
				<button>Share</button>
			  </div>
			  <div class="right-section">
				<div class="arrow-box">You’re in 3<sup>rd</sup> place!</div>
				<div class="arrow-box">Just 5 votes behind 1st</div>
			  </div>
			</div>
		</section>
		

		<!-- SECTION 1: Countdown + Progress Bar -->
		<?php if ($active_contest_id): ?>
		<section class="round-status">
			<div class="timer-box">
				<p class="timer-text">Round ends in : <strong><?php		echo $result['countdown']; ?></strong></p>
				<div class="progress-bar">
					<div class="progress-fill" style="width:<?php echo $result['progress'];?>%!important ">
						<span class="progress-label"><?php echo $result['progress'];?>%</span>
					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>

		<section class="past-battles">
    <h2>Watch Past Battles</h2>

    <?php 
    // Get all battle clips at once (optimized)
    $battle_clips = get_field('battle_clips');
    
    if ($battle_clips && is_array($battle_clips)): 
    ?>
        <div class="battle-videos">
            <?php foreach ($battle_clips as $clip): 
                $platform = isset($clip['video_platform']) ? $clip['video_platform'] : array();
                $embed_code = isset($clip['embed_url']) ? $clip['embed_url'] : '';
                
                if (empty($embed_code)) continue;
            ?>
                <div class="video-card">
                    <?php if (isset($platform['value']) && $platform['value'] == 'Tiktok'): ?>
                        <div class="tiktok-container">
                            <?php echo wp_kses_post($embed_code); ?>
                        </div>
                    <?php else: ?>
                        <?php echo wp_kses_post($embed_code); ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </Div>

        <!-- Load TikTok embed script (once) -->
        <script async src="https://www.tiktok.com/embed.js"></script>
    <?php else: ?>
        <p>No past battle clips found.</p>
    <?php endif; ?>
</section>


		
	</div>
	
	<!-- VOTE MODAL -->
	<div class="tattoo-vote-modal-overlay" id="voteModal">
		<div class="tattoo-vote-modal">
			<button type="button" class="tattoo-close-btn" onclick="closeVoteModal()">×</button>
			<h2>Cast Your Vote</h2>

			<form id="cast-vote">
				<input type="hidden" name="artist_id" id="voteArtistId">

				<div class="tattoo-vote-step-email">
					<input type="email" name="email" placeholder="Enter your email" required>
					<button type="submit" id="sendOtpBtn">Verify</button>
				</div>

				<div class="tattoo-vote-step-otp" style="display: none;">
					<input type="text" name="otp" placeholder="Enter OTP" maxlength="6">
					<button type="button" id="verifyOtpBtn">Submit Vote</button>
				</div>

				<div id="vote-response" class="tattoo-vote-response"></div>
			</form>

			<div class="tattoo-vote-thankyou" style="display: none;">
				<p>🎉 Thank you! Your vote has been recorded.</p>
				<button onclick="closeVoteModal()">Close</button>
			</div>
		</div>
	</div>

</div>


<script>
	const castVoteForm = document.getElementById('cast-vote');
	const sendOtpBtn = document.getElementById('sendOtpBtn');
	const verifyOtpBtn = document.getElementById('verifyOtpBtn');
	
	function openVoteModal(artistId) {
		document.body.classList.add('tattoo-body-lock'); // Prevent scroll
		document.getElementById('voteArtistId').value = artistId;
		document.getElementById('voteModal').style.display = 'flex';
	}

	function closeVoteModal() {
		document.getElementById('voteModal').style.display = 'none';
		document.body.classList.remove('tattoo-body-lock');
	}
	
	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape') {
		  closeVoteModal();
		}
	  });
	
	castVoteForm.addEventListener('submit', function (e) {
		e.preventDefault();
		const email = this.email.value;
		const artistId = document.getElementById('voteArtistId').value;

		sendOtpBtn.disabled = true;
		fetch(vote_ajax.ajax_url, {
			method: 'POST',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
			body: new URLSearchParams({
				action: 'send_otp_vote',
				email: email,
				artist_id: artistId
			})
		}).then(res => res.json())
		  .then(data => {
			  sendOtpBtn.disabled = false;
			  if (data.success) {
				  document.querySelector('.tattoo-vote-step-email').style.display = 'none';
				  document.querySelector('.tattoo-vote-step-otp').style.display = 'block';
				  showVoteResponse('OTP sent. Please check your email.', 'success');
			  } else {
				  showVoteResponse(data.data.message, 'error');
			  }
		  });
	});

	verifyOtpBtn.addEventListener('click', function () {
		const form = document.getElementById('cast-vote');
		const email = form.email.value;
		const otp = form.otp.value;
		const artistId = document.getElementById('voteArtistId').value;

		verifyOtpBtn.disabled = true;
		fetch(vote_ajax.ajax_url, {
			method: 'POST',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
			body: new URLSearchParams({
				action: 'verify_otp_vote',
				email: email,
				otp: otp,
				artist_id: artistId
			})
		}).then(res => res.json())
		  .then(data => {
			  verifyOtpBtn.disabled = false;
			  if (data.success) {
				  form.style.display = 'none';
				  document.querySelector('.tattoo-vote-thankyou').style.display = 'block';
				  showVoteResponse('', ''); // Clear message
			  } else {
				  showVoteResponse(data.data.message, 'error');
			  }
		  });
	});

	function showVoteResponse(msg, type) {
		const resDiv = document.getElementById('vote-response');
		resDiv.textContent = msg;
		resDiv.className = 'tattoo-vote-response ' + type;
	}

	function closeVoteModal() {
		const modal = document.getElementById('voteModal');
		modal.style.display = 'none';

		// Reset modal fields
		document.querySelector('.tattoo-vote-step-email').style.display = 'block';
		document.querySelector('.tattoo-vote-step-otp').style.display = 'none';
		document.querySelector('.tattoo-vote-thankyou').style.display = 'none';

		const form = document.getElementById('cast-vote');
		form.reset();
		form.style.display = 'block';
		document.getElementById('vote-response').textContent = '';
		document.getElementById('voteArtistId').value = '';
	}
	// Example click trigger
// 	document.querySelectorAll('.vote-now-btn').forEach(btn => {
// 		btn.addEventListener('click', function () {
// 			const artistId = this.getAttribute('data-artist-id');
// 			openVoteModal(artistId);
// 		});
// 	});
jQuery(function($) {
	
	const fileInput = document.querySelector('.modern-upload');

	if (!fileInput) return;

	// Create a container for image preview
	const previewContainer = document.createElement('div');
	previewContainer.style.marginTop = '10px';
	fileInput.parentNode.appendChild(previewContainer);

	fileInput.addEventListener('change', function () {
		const file = this.files[0];
		previewContainer.innerHTML = ''; // Clear previous preview

		if (file && file.type.startsWith('image/')) {
			const reader = new FileReader();
			reader.onload = function (e) {
				const img = document.createElement('img');
				img.src = e.target.result;
				img.style.maxWidth = '50px';
				img.style.height = 'auto';
				img.style.border = '1px solid #ccc';
				img.style.borderRadius = '5px';
				previewContainer.appendChild(img);
			};
			reader.readAsDataURL(file);
		}
	});
	
	document.getElementsByTagName('body').style.overflow = 'scroll';
	const windowHeight = $(window).height();
	const $mainSlider = $('.tattoo'); // Adjusted selector for Tattoo page
	const $sections = $mainSlider.children('div, section'); // All direct sections
	let sectionCount = $sections.length;
	let currentY = 0;
	let targetY = 0;

	// Correct maxScroll using reduce instead of buggy outerHeight math
	let totalHeight = 0;
	$sections.each(function() {
		totalHeight += $(this).outerHeight(true);
	});
	let maxScroll = -(totalHeight - windowHeight);

	// Animate the scroll
	function animateScroll() {
		currentY += (targetY - currentY) * 0.08;
		currentY = Math.max(currentY, maxScroll); // Lower bound
		currentY = Math.min(currentY, 0);         // Upper bound (top)
		$mainSlider.css('transform', `translateY(${currentY}px)`);
		requestAnimationFrame(animateScroll);
	}

	animateScroll();

	// Scroll event
	window.addEventListener('wheel', function(e) {
		const delta = e.deltaY;
		targetY -= delta;
		targetY = Math.min(0, Math.max(targetY, maxScroll));
		e.preventDefault(); // Stop native scroll
	}, { passive: false });

	// Resize logic
	$(window).on('resize', function() {
		totalHeight = 0;
		$sections.each(function() {
			totalHeight += $(this).outerHeight(true);
		});
		maxScroll = -(totalHeight - $(window).height());
		if ($(window).height() !== windowHeight) {
			window.location.reload();
		}
	});
});



</script>

<script>
  const bullet = document.querySelector('.bullet');
  let mouseX = 0, mouseY = 0;
  let currentX = 0, currentY = 0;

  document.addEventListener('mousemove', (e) => {
    mouseX = e.pageX;
    mouseY = e.pageY;
  });

  function animate() {
    currentX += (mouseX - currentX) * 0.08;
    currentY += (mouseY - currentY) * 0.08;

    bullet.style.left = `${currentX}px`;
    bullet.style.top = `${currentY}px`;

    requestAnimationFrame(animate);
  }

  animate();
</script>
<?php 
get_footer();
?>