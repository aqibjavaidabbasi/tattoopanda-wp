<?php 
/* Template Name: Work */
get_header();
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css')">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css">
<style>
.site-content {
    padding-top: calc(20vh + 50px);
}

/* Artist Sections */
.artist-section {
    margin-bottom: 60px;
    scroll-margin-top: 100px;
}

.artist-heading {
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 10px;
    padding-left: 20px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.work_wrapper {
    margin-top: 10px;
}

/* Desktop Slider */
.desktop-slider {
    display: block;
}

/* Mobile Grid - Hidden on Desktop */
.mobile-grid {
    display: none;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    padding: 0 15px;
}

.mobile-work-item {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
}

.mobile-work-item img {
    width: 100%;
    height: auto;
    display: block;
}

/* Swiper Navigation */
.swiper-button-next,
.swiper-button-prev {
    color: #1a1a1a;
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 50%;
}

.swiper-button-next:after,
.swiper-button-prev:after {
    font-size: 18px;
    font-weight: bold;
}

@media (max-width: 991px) {
    .site-content {
        padding-top: 120px;
    }
}

@media (max-width: 767px) {
    .site-content {
        padding-top: 0;
    }

    /* Keep slider on mobile, hide grid */
    .mobile-grid {
        display: none !important;
    }

    /* Show slider on mobile */
    .desktop-slider {
        display: block !important;
    }

    /* Slider container */
    .work_slider {
        width: 100%;
        overflow: hidden;
    }

    .work_slider .swiper-wrapper {
        display: flex;
        align-items: center;
    }

    .work_slider .swiper-slide {
        flex-shrink: 0;
        width: 90vw !important;
        height: auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .work_slider .swiper-slide a {
        width: 100%;
        display: block;
    }

    .work_slider .swiper-slide img {
        width: 100%;
        height: auto;
        max-height: 70vh;
        display: block;
        object-fit: contain;
        border-radius: 8px;
    }

    /* Hide text info on mobile */
    .work_info {
        display: none;
    }

    .artist-section {
        margin-bottom: 40px;
        scroll-margin-top: 80px;
    }

    .artist-heading {
        font-size: 22px;
        padding-left: 15px;
        margin-bottom: 15px;
    }

}
</style>

<?php
// Get artists from Contentful
$artists = get_contentful_artists(['limit' => 10, 'order' => 'fields.artistName']);

$artists_data = [];
foreach ($artists as $artist) {
    if (!empty($artist['portfolio_images'])) {
        $artists_data[] = [
            'name' => $artist['name'],
            'slug' => $artist['slug'],
            'images' => $artist['portfolio_images']
        ];
    }
}

// Build optimized Contentful image URLs.
$contentful_image_url = static function($url, $params = []) {
    if (empty($url)) {
        return '';
    }

    $defaults = [
        'fm' => 'webp',
        'q' => 75,
    ];

    return add_query_arg(array_merge($defaults, $params), $url);
};
?>

<div class="main_work_layout">
    <!-- Original Gallery Slider -->
    <section class="original-gallery">
        <div class="work_wrapper">
            <div class="swiper work_slider desktop-slider">
                <div class="swiper-wrapper work_data_wrapper">
                    <?php
                    $args = array(
                        'post_type' => 'work',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );
                    $work_query = new WP_Query($args);
                    $count = 1;
                    if ($work_query->have_posts()) :
                        while ($work_query->have_posts()) : $work_query->the_post();
                            $featured_img_id = get_post_thumbnail_id(get_the_ID());
                            $featured_img_full = wp_get_attachment_image_url($featured_img_id, 'full');
                            ?>
                            <div class="swiper-slide work_data">
                                <a data-fancybox="gallery-main" href="<?php echo esc_url($featured_img_full); ?>">
                                    <?php
                                    // Responsive image with srcset and lazy loading
                                    echo wp_get_attachment_image($featured_img_id, 'medium_large', false, array(
                                        'alt' => get_the_title(),
                                        'loading' => 'lazy',
                                        'decoding' => 'async',
                                        'sizes' => '(max-width: 767px) 80vw, (max-width: 1024px) 40vw, 30vw'
                                    ));
                                    ?>
                                </a>
                            </div>
                            <?php
                            $count++;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>

        </div>
    </section>

    <!-- Artist Sections -->
    <?php if (!empty($artists_data)): ?>
        <?php foreach ($artists_data as $artist): ?>
            <section id="<?php echo esc_attr($artist['slug']); ?>" class="artist-section">
                <h2 class="artist-heading"><?php echo esc_html($artist['name']); ?></h2>
                <div class="work_wrapper">
                    <!-- Desktop Slider -->
                    <div class="swiper work_slider desktop-slider">
                        <div class="swiper-wrapper work_data_wrapper">
                            <?php
                            $count = 1;
                             foreach ($artist['images'] as $img):
                                if (empty($img['url'])) continue;
                                $img_original = $img['url'];
                                $img_full = $contentful_image_url($img_original, [
                                    'w' => 2000,
                                    'fit' => 'scale'
                                ]);
                                $img_src = $contentful_image_url($img_original, [
                                    'w' => 900,
                                    'h' => 900,
                                    'fit' => 'thumb',
                                    'f' => 'center'
                                ]);
                                $img_srcset = implode(', ', [
                                    esc_url($contentful_image_url($img_original, [
                                        'w' => 480,
                                        'h' => 480,
                                        'fit' => 'thumb',
                                        'f' => 'center'
                                    ])) . ' 480w',
                                    esc_url($contentful_image_url($img_original, [
                                        'w' => 768,
                                        'h' => 768,
                                        'fit' => 'thumb',
                                        'f' => 'center'
                                    ])) . ' 768w',
                                    esc_url($contentful_image_url($img_original, [
                                        'w' => 1200,
                                        'h' => 1200,
                                        'fit' => 'thumb',
                                        'f' => 'center'
                                    ])) . ' 1200w'
                                ]);
                                $img_alt = !empty($img['alt']) ? $img['alt'] : $artist['name'] . ' - ' . $count;
                            ?>
                                <div class="swiper-slide work_data">
                                    <a data-fancybox="gallery-<?php echo esc_attr($artist['slug']); ?>" href="<?php echo esc_url($img_full); ?>">
                                        <img
                                            src="<?php echo esc_url($img_src); ?>"
                                            srcset="<?php echo esc_attr($img_srcset); ?>"
                                            sizes="(max-width: 767px) 80vw, (max-width: 1024px) 40vw, 30vw"
                                            alt="<?php echo esc_attr($img_alt); ?>"
                                            loading="lazy"
                                            decoding="async"
                                        >
                                    </a>
                                </div>
                            <?php
                                $count++;
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
    <?php endif; ?>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize all sliders with mobile support
        document.querySelectorAll('.work_slider').forEach(function(slider) {
            new Swiper(slider, {
                slidesPerView: 3.5,
                spaceBetween: 30,
                centeredSlides: false,
                loop: true,
                mousewheel: {
                    forceToAxis: true,
                    sensitivity: 1,
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 3.5,
                    },
                    768: {
                        slidesPerView: 2.5,
                    },
                    480: {
                        slidesPerView: 1.5,
                    },
                    320: {
                        slidesPerView: 1.2,
                    }
                }
            });
        });

        // Handle hash navigation for artist sections
        if (window.location.hash) {
            const targetSection = document.querySelector(window.location.hash);
            if (targetSection) {
                setTimeout(function() {
                    targetSection.scrollIntoView({ behavior: 'smooth' });
                }, 100);
            }
        }
    });
</script>


<!-- <script>

document.addEventListener('DOMContentLoaded', function () {
  const slider = document.querySelector('.work_slider .swiper-wrapper');
  const container = document.querySelector('.work_slider');

  let targetScroll = 0;
  let currentScroll = 0;
  let isDragging = false;
  let startX = 0;
  let scrollStart = 0;

  function smoothScroll() {
    currentScroll += (targetScroll - currentScroll) * 0.1;
    slider.style.transform = `translateX(${currentScroll}px)`;
    requestAnimationFrame(smoothScroll);
  }

  smoothScroll();

  container.addEventListener('wheel', function (e) {
    e.preventDefault();
    targetScroll -= e.deltaY;

    const maxScroll = 0;
    const minScroll = -(slider.scrollWidth - container.clientWidth);
    targetScroll = Math.max(Math.min(targetScroll, maxScroll), minScroll);
  }, { passive: false });

  container.addEventListener('mousedown', function (e) {
    isDragging = true;
    startX = e.clientX;
    scrollStart = targetScroll;
    container.classList.add('dragging');
  });

  window.addEventListener('mousemove', function (e) {
    if (!isDragging) return;
    const dx = e.clientX - startX;
    targetScroll = scrollStart + dx;

    const maxScroll = 0;
    const minScroll = -(slider.scrollWidth - container.clientWidth);
    targetScroll = Math.max(Math.min(targetScroll, maxScroll), minScroll);
  });

  window.addEventListener('mouseup', function () {
    isDragging = false;
    container.classList.remove('dragging');
  });

  container.addEventListener('dragstart', e => e.preventDefault());
});

</script> -->

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<?php 
get_footer();
?>