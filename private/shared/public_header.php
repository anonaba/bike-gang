<!doctype html>

<html lang="en">

<head>
  <title>Chain Gang <?php if (isset($page_title)) {
                      echo '- ' . h($page_title);
                    } ?></title>
  <meta charset="utf-8">
  <link rel="stylesheet" media="all" href="<?php echo url_for('public/stylesheets/public.css'); ?>" />
</head>

<body>

  <header>
    <h1>
      <a href="<?php echo url_for('/'); ?>">
        <img class="bike-icon" src="<?php echo url_for('public/images/USDOT_bicycle_symbol.svg') ?>" /><br />
        Chain Gang
      </a>
    </h1>
  </header>