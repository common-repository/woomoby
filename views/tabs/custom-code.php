<div class="tab-pane fade" id="custom_code" role="tabpanel">
    <div class="card">
        <div class="card-block p-md-5">
<h4 class="mb-0"><?php _e('CSS Style', 'woomoby'); ?></h4>
<p><?php esc_html_e('Add your own CSS style, please DO NOT include the &lt;style&gt; &lt;/style&gt; tag.', 'woomoby'); ?></p>
<div class="content-group mb-5">
<div id="css_editor">
<?= $settings_options['custom_code']['css']; ?>
</div>
</div>
<br>            
<h4 class="mb-0"><?php _e('JavaScript', 'woomoby'); ?></h4>
<p><?php esc_html_e('Add your own custom JavaScript to the footer, please DO NOT include the &lt;script&gt; &lt;/script&gt; tag.', 'woomoby'); ?></p>
<div class="content-group mb-5">
<div id="javascript_editor">
<?= $settings_options['custom_code']['js']; ?>
</div>
</div>
<br>
<h4 class="mb-0"><?php _e('Analytics', 'woomoby'); ?></h4>
<p><?php esc_html_e('This will be added just before the closing </head> tag, please DO NOT include the &lt;script&gt; &lt;/script&gt; tag.', 'woomoby'); ?></p>
<div class="content-group">
<div id="analytics_editor">
<?= $settings_options['custom_code']['analytics']; ?>
</div>
</div>

        </div>
    </div>
</div>