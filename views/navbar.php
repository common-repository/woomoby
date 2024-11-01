<nav class="navbar navbar-toggleable-md navbar-light navbar-menu">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="?page=cp-woomoby">
        <img height="44" src="<?= $this->globals['plugin_url']; ?>assets/images/mobile-app-nav.png" alt="<?= $this->globals['plugin_name']; ?>">
        <span class="plugin-name">WOOMOBY</span>
    </a>
    <div class="collapse navbar-collapse" id="main-navbar">
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link ml-4 active" href="?page=cp-woomoby"><i class="icon cp-equalizer position-left"></i>Settings</a>
            <?php
//                foreach ( $this->page_tabs as $tab_key => $tab_caption ) {
//                    $active = $current_tab == $tab_key ? 'active' : '';
//                    echo '<a class="nav-item nav-link ml-4 ' . $active . '" href="?page=cp-woomoby&tab=' . $tab_key . '">' . $tab_caption . '</a></li>';    
//                }
            ?>
<!--            <li class="nav-item dropdown ml-4">
                <a class="nav-link dropdown-toggle" href="#" id="more-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon cp-grid52"></i> More
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="more-dropdown">
                    <a class="dropdown-item" href="http://helpcommerce.com" target="_blank">HelpCommerce</a>
                    <a class="dropdown-item" href="http://support.helpcommerce.com" target="_blank">Knowledge Base</a>
                    <a class="dropdown-item" href="http://support.helpcommerce.com" target="_blank">Support Center</a>
                </div>
            </li>-->
        </div>
    </div>
</nav>