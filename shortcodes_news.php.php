<?php 

/* 

** Add Shortcode Address Page 

*/

function regal_news_func($post){

  ob_start();

  extract(shortcode_atts(array('limit' => 99), $post));

  // echo ("<pre>");

  // print_r($tax_terms);

  // echo ("</pre>"); 

  ?>

  <div class="regal-utilities">

    <input type="hidden" id="data_terms" val="">

    <div class="wap">

      <div class="inner">


        <div class="regal-utilities-content">

          <div class="row row-collapse">

            <div class="col small-12 large-12 wap-content">

              <div class="lists">

                <?php 

                $args = array(

                  'post_type'   => 'news',

                  'post_status' => 'publish',

                  'posts_per_page' => $limit,

                //   'tax_query' => array(

                //     array(

                //       'taxonomy' => 'tien-ich',

                //       'field' => 'slug',

                //       'terms' => 'khach-san',

                //       'include_children' => true,

                //       'operator' => 'IN'

                //     )

                //   ),

                );

                $loop = new WP_Query( $args ); ?>

                <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();

                  $postID = get_the_ID();

                  ?>

                  <div class="item item-<?php echo $postID ?>" id="postID-<?php echo $postID ?>">

                    <div class="thumbnail">

                      <a class="link-to" href="<?php echo get_permalink(); ?>">

                        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($postID), 'image-regal-utilities' ); ?>

                        <img src="<?php echo $url; ?>" alt="<?php the_title(); ?>"/>

                      </a>

                    </div>

                    <div class="description">

                      <h3 class="title">

                        <a class="link-to"  href="<?php echo get_permalink(); ?>"> <?php the_title(); ?></a>

                      </h3>


                    </div>

                  </div>

                  <?php endwhile;

                  endif;

                wp_reset_postdata(); ?>

              </div>


            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

  <?php

  return ob_get_clean();

}

add_shortcode( "regal_news_shortcode", "regal_news_func" );