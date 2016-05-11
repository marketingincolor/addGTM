<div class="wrap">
    <h2>Add Google Tag Manager</h2>
    <form method="post" action="options.php">
        <?php @settings_fields('AddGTM-group'); ?><!-- creates hidden form content -->
        <?php @do_settings_fields('AddGTM-group'); ?>
        <?php do_settings_sections('AddGTM'); ?><!--displays all form content-->
        <?php @submit_button(); ?>
    </form>
</div>
