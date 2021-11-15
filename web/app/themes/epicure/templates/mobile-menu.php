<!-- Mobile Modal -->
    <div class="modal-dialog mobile-dialog" role="document">
        <div class="modal-content mobile-modal-content">
            <div class="mobile-menu-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="mobile-menu-body">
                    <?php
                    $args = array(
                        'theme_location' => 'mobile-menu',
                        'container'      => 'nav',
                        'container_class' => 'site-nav'
                    );
                    wp_nav_menu($args);
                    ?>
            </div>
            <div class="border-menu"></div>
            <div class=" mobile-menu-footer">
                    <?php
                    $args = array(
                        'theme_location' => 'mobile-menu-user-options',
                        'container'      => 'nav',
                        'container_class' => 'site-nav'
                    );
                    wp_nav_menu($args);
                    ?>
            </div>
        </div>
    </div>
