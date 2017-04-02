<?php
/**
 * Default Layout - a Layout similar with the classic Header and Footer files.
 */
// Generate the Language Changer menu.
$language = Language::code();

$languages = Config::get('languages');

//
ob_start();

foreach ($languages as $code => $info) {
?>
<li  <?php if($language == $code) echo 'class="active"'; ?>>
    <a class="waves-effect waves-light btn" href='<?= site_url('language/' .$code); ?>' title='<?= $info['info']; ?>'><?= $info['name']; ?></a>
</li>
<?php
}

$langMenuLinks = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="<?= $language; ?>">
<head>
    <meta charset="utf-8">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta property="fb:app_id" content="1732300390419025" /> 
    <title><?= $title .' - ' .Config::get('app.name', SITETITLE); ?></title>
    <meta name="description" content="<?= isset($description) ? $description : ''; ?>">
    <meta property="og:title" content="<?= $title .' - ' .Config::get('app.name', SITETITLE); ?>" />
    <meta property="og:type" content="<?= isset($type) ? $type : ''; ?>" />
    <meta property="og:url" content="<?= isset($url) ? $url : ''; ?>" />
    <meta name="og:description" content="<?= isset($description) ? $description : ''; ?>">
    <meta property="og:site_name" content="<?= strtoupper(Config::get('app.name', SITETITLE)); ?>" />
    <meta property="og:image" content="<?= isset($image) ? $image : ''; ?>" />
    <meta property="og:image:secure_url" content="<?= isset($image) ? $image : ''; ?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="300" />
    <meta property="og:audio" content="<?= isset($audio) ? $audio : ''; ?>" />
    <meta property="og:audio:secure_url" content="<?= isset($audio) ? $audio : ''; ?>" />
    <meta property="og:audio:type" content="audio/mpeg" />
    <meta property="og:video" content="<?= isset($video) ? $video : ''; ?>" />
    <meta property="og:video:secure_url" content="<?= isset($video) ? $video : ''; ?>" />
    <meta property="og:video:type" content="application/mp4" />
    <meta property="og:video:width" content="400" />
    <meta property="og:video:height" content="300" />
    <meta name="author" content="Oj Obasi">
    <!-- Chrome for Android theme color -->
    <meta name="theme-color" content="#00838F">
<?php
echo isset($meta) ? $meta : ''; // Place to pass data / plugable hook zone
 Assets::js(array(
          
            'https://content.jwplatform.com/libraries/RpYFdGm7.js',
  ));
Assets::css([
    //vendor_url('dist/css/bootstrap.min.css', 'twbs/bootstrap'),
   // vendor_url('dist/css/bootstrap-theme.min.css', 'twbs/bootstrap'),
    'http://fonts.googleapis.com/icon?family=Material+Icons',
    'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css',
    theme_url('css/style.css', 'Bootstrap'),
]);

echo isset($css) ? $css : ''; // Place to pass data / plugable hook zone
?>

</head>
<body>
<div class="navbar-fixed">
<nav class="cyan darken-2" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="<?= site_url(); ?>" class="brand-logo"><img src='<?= theme_url('images/logo_h.png', 'Bootstrap'); ?>' alt='<?= Config::get('app.name', SITETITLE); ?>'></a>
      <ul class="right hide-on-med-and-down">
        <li>
            <div class="s-container">
               <form class="searchbox" method="GET" action="<?= site_url('search'); ?>/">
                   <input type="search" placeholder="Enter Search Term" name="search_term" class="searchbox-input" onkeyup="buttonUp();" required>
                     <input type="submit" name="submit" class="searchbox-submit" value="GO">
                    <span class="searchbox-icon"><i class="material-icons">search</i></span>
                  </form>
           </div>
        </li>
        
        <li class="ink"><a href="<?= site_url('add') ?>"><i class="material-icons">add</i> Add</a></li>
         <?php if (Auth::check()) { ?>
         <li>
            <a  href='<?= site_url('admin/profile'); ?>'> <img class="header-avatar" src="http://weytindey.dev/assets/images/users/no-image.png" alt="username"> <?= __d('admin_lite', 'Profile'); ?></a>
         </li>
         <li class="ink">
           <a href='<?= site_url('logout'); ?>'><i class="material-icons">remove_circle_outline</i> <?= __d('admin_lite', 'Logout'); ?></a>
         </li>
         <?php } else { ?>
         <li class="ink"><a href="<?= site_url('register') ?>"><i class="material-icons">fingerprint</i> Sign up</a></li>
        <li class="ink"><a href="<?= site_url('login') ?>"><i class="material-icons">lock_open</i> Log in</a></li>
        <?php } ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="<?= site_url() ?>">Weytindey</a></li>
        <li><a href="<?= site_url('search') ?>"><i class="material-icons">search</i> Search Site</a></li>
        
        <li><a href="<?= site_url('add') ?>"><i class="material-icons">add</i> Add</a></li>
                <?php if (Auth::check()) { ?>
         <li>
            <a  href='<?= site_url('admin/profile'); ?>'> <img class="header-avatar" src="<?php ROOTDIR ?>assets/images/users/no-image.png" alt="username"> <?= __d('admin_lite', 'Profile'); ?></a>
         </li>
         <li>
           <a href='<?= site_url('logout'); ?>'><i class="material-icons">remove_circle_outline</i> <?= __d('admin_lite', 'Logout'); ?></a>
         </li>
         <?php } else { ?>
         <li><a href="<?= site_url('register') ?>"><i class="material-icons">fingerprint</i> Sign up</a></li>
        <li><a href="<?= site_url('login') ?>"><i class="material-icons">lock_open</i> Log in</a></li>
        <?php } ?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
</div>


<?= isset($afterBody) ? $afterBody : ''; // Place to pass data / plugable hook zone ?>
  <div class="container">
    <div class="section main">
       <?= $content ?>
    </div>
  </div>

  <footer class="page-footer cyan darken-2">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <img src='<?= theme_url('images/logo.png', 'Bootstrap'); ?>' alt='<?= Config::get('app.name', SITETITLE); ?>'>
          <p class="grey-text text-lighten-4">We are just a team of like minded people with love for motherland. We are trying to make information about Africa easily available</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Meet Us</h5>
          <ul>
            <li><a class="white-text" href="<?= site_url('contact') ?>">About Us</a></li>
            <li><a class="white-text" href="<?= site_url('contact') ?>">Contact Us</a></li>
            <li><a class="white-text" href="<?= site_url('contact') ?>">Advertise with Us</a></li>
            <li><a class="white-text" href="<?= site_url('contact') ?>">Join Our Team</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Terms Of Service</h5>
          <ul>
            <li><a class="white-text" href="<?= site_url('terms') ?>">Terms of Use</a></li>
            <li><a class="white-text" href="<?= site_url('terms') ?>">Terms Of Service</a></li>
            <li><a class="white-text" href="<?= site_url('add') ?>">Sharing With Us</a></li>
            <li><a class="white-text" href="<?= site_url('dmca') ?>">DMCA</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
          <div class="row">
          <div class="col s12 m6">
          Copyright &copy; <?php echo date('Y'); ?> <a href="https://www.weytindey.com/" target="_blank"><b class="white-text">Weytindey </b></a>
        </div>
        <div class="col s12 m6 white-text">
          <ul class="language">
            <?= $langMenuLinks; ?>
          </ul>
        </div>
        </div>
      </div>
    </div>
  </footer>


<?php
Assets::js([
    'https://code.jquery.com/jquery-2.1.1.min.js',
    'http://malsup.github.com/jquery.form.js',
    //vendor_url('dist/js/bootstrap.min.js', 'twbs/bootstrap'),
    'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js',
    theme_url('js/main.js', 'Bootstrap'),
]);

echo isset($js) ? $js : ''; // Place to pass data / plugable hook zone

echo isset($footer) ? $footer : ''; // Place to pass data / plugable hook zone
?>

<!-- DO NOT DELETE! - Forensics Profiler -->

</body>
</html>
