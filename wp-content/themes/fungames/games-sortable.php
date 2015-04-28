<?php if ( get_option('fungames_games_box') == 'enable' ) : ?>

  <?php do_action('fungames_before_sortable_game_box'); ?>

  <div id="sortable-game-box" class="fullcontent">
    <h2>
      <?php echo get_option("fungames_sortable_game_box_title"); ?>
    </h2>

    <div id="sortable-game-box-inner">
      <div id="sortable-game-box-inner-content">

        <div id="sortable-game-box-loader" style="display:none;">
          <div id="sortable-game-box-loader-content" style="text-align:center;">
              <img src="<?php echo get_template_directory_uri(); ?>/images/loading.gif" alt="loading.." style="border:none;" /><br />
              <?php _e('Loading...', 'fungames'); ?>
          </div>
        </div>

        <div id="sortable-game-box-list">
          <?php
          global $query_string;

          $blog = get_cat_ID( get_option('fungames_blog_category') );
          if ( $blog ) {
            $exclude_blog = '&cat=-'.$blog;
          }
          else {
            $exclude_blog = '';
          }

          $gamelimit = get_option('fungames_games_box_count');
          query_posts( $query_string . '&posts_per_page=' . $gamelimit . $exclude_blog );

          if ( have_posts() ) {
            ?>
            <ul>
              <?php while ( have_posts() ) : the_post(); ?>
              <li>
                <a href="<?php the_permalink() ?>" class="thumb_link" rel="bookmark" title="<?php echo the_title_attribute(); ?>"><?php myabp_print_thumbnail(100, 100); ?></a>
              </li>
              <?php
            endwhile;
            wp_reset_query();
          } else {
            _e("No games found", 'fungames');
          }
          ?>
          </ul>
          <div class="clear"></div>
        </div><?php // end sortable-game-box-list ?>
      </div><?php // end sortable-game-box-inner-content ?>
    </div><?php // end sortable-game-box-inner ?>

    <div class="clear"></div>

    <div id="sortable-game-box-order">
      <?php _e('Sort by', 'fungames'); ?>
      <select>
        <option value="?orderby=date&order=desc" selected="selected"><?php _e('Newest First', 'fungames'); ?></option>
        <option value="?orderby=date&order=asc"><?php _e('Oldest First', 'fungames'); ?></option>
        <?php if( function_exists('the_ratings') ) : ?>
        <option value="?r_sortby=highest_rated&r_orderby=desc"><?php _e('Highest Rated', 'fungames'); ?></option>
        <?php endif; ?>
        <?php if ( function_exists('the_views') ) : ?>
        <option value="?v_sortby=views&v_orderby=desc"><?php _e('Most Played', 'fungames'); ?></option>
        <?php endif; ?>
        <option value="?orderby=comment_count"><?php _e('Most Discussed', 'fungames'); ?></option>
        <option value="?orderby=title&order=asc"><?php _e('Alphabetically (A-Z)', 'fungames'); ?></option>
        <option value="?orderby=title&order=desc"><?php _e('Alphabetically (Z-A)', 'fungames'); ?></option>
      </select>
    </div>
  </div><?php // end sortable-game-box ?>
  <div class="clear"></div>

  <?php do_action('fungames_after_sortable_game_box'); ?>

<?php endif; ?>