<?php get_header() ?>
<section class="banner">


      <div class="container">
        <div class="banner__wrapper">
          <h1>The Blog</h1>
          <div class="banner__grid">
            <div class="banner__main">
                <?php 
                    $main = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 1,
                        'meta_key' => 'main',
                        'meta_value' => 'true'
                    ))
                ?>
                <?php if($main->have_posts()) : while($main->have_posts()) : $main->the_post() ?>
              <article class="banner__story">
                    <?php if(has_post_thumbnail()){
                        the_post_thumbnail();
                    } 
                    ?>
                    <div class="banner__story__content">
                    <small><?php the_date()?></small>
                    <h2><?php the_title()?></h2>
                
                        <?php echo wp_trim_words(get_the_content(), 25)?>
                   
                    <a href="<?php the_permalink()?>">Read More...</a>
                    </div>
              </article>
              <?php 
                endwhile;
            else: 
                echo "no post";
            endif;
            wp_reset_postdata();
              ?>
            </div>

            <div class="banner__sidebar">
                <?php 
                    $aside = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'meta_query' => array(
                            array(
                                'meta_key' => "main",
                                'meta_value' => "true",
                                'compare' => "!="
                            )
                        )
                    ))
                ?>
                <?php if($aside->have_posts()) : while($aside->have_posts()): $aside->the_post()?>
                    <div class="card__sm">
                    <?php
                        if(has_post_thumbnail()){
                            the_post_thumbnail('', array(
                                'class' => 'img-sm'
                            ));
                        }
                    ?>
                    <div class="card__sm__content">
                        <small><?php echo get_the_date('M j, Y')?></small>
                        <h3><?php echo get_the_title()?></h3>
                        <a href="<?php the_permalink()?>">Read More...</a>
                        </div>
                    </div>
                <?php
                    endwhile;
                else:
                    echo "No more post";
                endif;
                wp_reset_postdata();
                ?>
            
            </div>
          </div>
        </div>
      </div>
    </section>





    <section class="latest">
      <div class="container">
        <h2>Latest Story</h2>
        <div class="latest__wrapper">
            <?php $latest = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'meta_query' => array(array(
                    'key' => 'latest',
                    'value' => 'true',
                    'compare' => "="
                ))
            )) ?>

            <?php if($latest->have_posts()) : while($latest->have_posts()) : $latest->the_post() ?>
          <div class="card__md">
                 <?php
                        if(has_post_thumbnail()){
                            the_post_thumbnail('', array(
                                'alt' => get_the_title()
                            ));
                        }
                    ?>
            <div class="card__md__content">
              <ul>
                <li><small><?php the_date()?></small></li>
                <li><small><?php echo get_the_category()[0]->name?></small></li>
              </ul>
              <h3>
              <?php the_title()?>
              </h3>

              <p>
              <?php echo wp_trim_words(get_the_content(), 20)?>
              </p>
              <a href="<?php the_permalink();?>">Read More...</a>
            </div>
          </div>
          <?php endwhile;
        else:
            echo "no more post";
        endif;
        wp_reset_postdata();
          ?>
        </div>
      </div>
    </section>

    <section class="feature">
      <div class="feature__content">
        <?php 
            $mainFeature = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 1,
            'meta_key' => 'mainFeature',
            'meta_value' => 'true'           
            ))
        ?>
        <?php if($mainFeature->have_posts()) : while($mainFeature->have_posts()) : $mainFeature->the_post() ?>
        <h2>Feature New</h2>
        <h3 class="block__header">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit.
        </h3>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga id
          perferendis quisquam error culpa non iure blanditiis placeat rem
          itaque autem nihil ducimus
        </p>
      </div>

      <div class="container">
        <div class="feature__img">
        <?php
            if(has_post_thumbnail()){
                the_post_thumbnail('', array(
                'alt' => get_the_title()
                ));
            }
        ?>
        </div>
      </div>
      <?php endwhile;
        else:
            echo "no more post";
        endif;
        wp_reset_postdata();
          ?>
      <div class="container">
        <div class="feature__wrapper">
          <div class="feature__main">
          <?php $feature = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'meta_query' => array(array(
                    'key' => 'feature',
                    'value' => 'true',
                    'compare' => "="
                ))
            )) ?>

          <?php if($feature->have_posts()) : while($feature->have_posts()): $feature->the_post()?>
            <article class="card__lg">
                    <?php
                        if(has_post_thumbnail()){
                            the_post_thumbnail('', array(
                                'alt' => get_the_title()
                            ));
                        }
                    ?>
              <div class="card__lg__content">
                <small><?php echo get_the_date('M j, Y')?></small>
                <h3>
                  <?php the_title()?>
                </h3>
                <p>
                <?php echo wp_trim_words(get_the_content(), 20)?>
                </p>
                <a href="<?php the_permalink()?>">Read More...</a>
              </div>
            </article>
            <?php endwhile;
            else:
                echo "no more post";
            endif;
            wp_reset_postdata();
            ?>

          </div>
          <div class="feature__sidebar">
          <?php $mini = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 6,
                'meta_query' => array(array(
                    'key' => 'mini',
                    'value' => 'true',
                    'compare' => "="
                ))
            )) ?>

          <?php if($mini->have_posts()) : while($mini->have_posts()): $mini->the_post()?>
            <div class="card__mini">
              <small><?php echo get_the_date('M j, Y')?></small>
              <h4>
                <?php the_title()?>
              </h4>
              <a href="<?php the_permalink()?>">Read More ...</a>
            </div>
            <?php endwhile;
            else:
                echo "no more post";
            endif;
            wp_reset_postdata();
            ?>
          </div>
        </div>
      </div>
    </section>
<?php get_footer() ?>


