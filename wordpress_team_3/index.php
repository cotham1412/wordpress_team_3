<?php get_header(); ?>

<div class="content">
    <div class="container">
        <!-- <header>
            <img src="  ?php bloginfo('template_directory'); ?>/img/hinh1.jpeg" width="100%">
        </header> -->
        <section class="content"> 

        <!-- phan` sesion kinh -->
            <div class="post"> 
                <div class="post-content">
                    <div class="post-detail">
                        <h2>KÍNH SEESON</h2>
                        <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident
                            voluptate ipsam voluptas, quisquam tenetur id ipsa placeat non, aut rerum odio atque dolorum
                            quia eos facilis nemo unde dolorem praesentium?</p>
                        <button class="btn">Read more</button>
                    </div>
                </div>
                <div class="post-img">
                    <img src="<?php bloginfo('template_directory'); ?>/img/hinh1.jpeg" alt="" width="100%">
                </div>
            </div>
            <!-- phan` sesion kinh/ -->

            <!-- phan` hien. kinh' -->
            <div class="product">
                <h2>LIST KÍNH</h2>
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                ?>
                        <div class="product-list">
                            <div class="product-item">
                                <img src="<?php bloginfo('template_directory'); ?>/img/2.jpg" width="100%" alt="">
                                <div class="product-detail">
                                    <h3>Giày Nike Air Jordan 1 Retro High OG Black Toe</h3>
                                    <span class="product-price"> $690.000 </span>
                                    <button class="btn-product btn">Chọn mẫu</button>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                endif;
                ?>
            </div>
            <!-- phan` hien. kinh'/ -->
            
        </section>
    </div>
 
    <!-- phan` phan trang -->
    <div id="main-content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php get_template_part('content', get_post_format()); ?>
            <?php endwhile; ?>
            <?php wp_team_3_pagination(); ?>
            <!-- phân trang chưa chạy -->
        <?php else : ?>
            <?php get_template_part('content', 'none'); ?>
        <?php endif; ?>
    </div>
    <!-- phan` phan trang -->

    <div id="sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>