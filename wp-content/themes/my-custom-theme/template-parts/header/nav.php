<?php
/**
 * Header Navigation template
 */

 // get the get_menu_id function from Menus class (class-menus.php)
$menu_class = \MY_CUSTOM_THEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('primary');

$header_menus = wp_get_nav_menu_items($header_menu_id);

?>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <?php
      if (function_exists('the_custom_logo')) {
        the_custom_logo();
      }
    ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php if (!empty($header_menus) && is_array($header_menus)) { ?>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php foreach($header_menus as $menu_item) {
              if (!$menu_item->menu_item_parent) {
                $child_menu_items = $menu_class->get_child_menu_items($header_menus, $menu_item->ID);
                $has_children = !empty($child_menu_items) && is_array($child_menu_items);

                if (!$has_children) {
                  ?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?= esc_url($menu_item->url); ?>">
                        <?= esc_html($menu_item->title); ?>
                      </a>
                    </li>
                  <?php 
                } else {
                  ?>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="<?= esc_url($menu_item->url); ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= esc_html($menu_item->title); ?>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php 
                          foreach ($child_menu_items as $child_menu_item) : ?>
                            <a class="dropdown-item" href="<?= esc_url($child_menu_item->url); ?>">
                              <?= esc_html($child_menu_item->title); ?> 
                            </a>
                        <?php endforeach; ?>
                      </div>
                    </li>
                  <?php
                }
              }
            } ?>
    <?php } ?>
          </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
