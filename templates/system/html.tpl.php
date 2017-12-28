<!DOCTYPE html>
<!--[if lt IE 7]><html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7 ie6"><![endif]-->
<!--[if IE 7]><html lang="en" class="no-js lt-ie9 lt-ie8 ie7"><![endif]-->
<!--[if IE 8]><html lang="en" class="no-js lt-ie9 ie8"><![endif]-->
<!--[if IE 9]><html lang="en" class="no-js lt-ie10 ie9"><![endif]-->
<!--[if gt IE 9]><!--><html lang="en" class="no-js"><!--<![endif]-->

<head<?php print $rdf->profile; ?>>
<?php print $head; ?>
<meta name="format-detection" content="telephone=no">
<title><?php print $head_title; ?></title>
<!-- viewport tag -->
<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- load css -->
<?php print $styles; ?>

<?php
/* remove IE8 styles 
<!--[if (lt IE 9) & (!IEMobile) & (gt IE 7)]>
<link href="/<?php print $theme_path; ?>/css/theme_oldIE.css" type="text/css" rel="stylesheet" media="all" />
<![endif]-->
*/
?>

<link href="/sites/all/themes/common/css/theme_print.css" type="text/css" rel="stylesheet" media="print" />

<!-- load js that has to be in the header  -->
<!--[if gt IE 8]><!-->
<?php print $head_scripts; ?>
<!--<![endif]-->

<!--[if lt IE 9]>
<script src="/sites/all/themes/common/js/html5shiv-printshiv.js"></script>
<script src="/sites/all/themes/common/js/selectivizr-min.js"></script>
<![endif]-->


<!-- 
 ======================================================================
        
	Big Mallet's Redpill
	Version: 3.0.1
	URL: http://bigmallet.co.uk
	Made from bits and pieces from the internet. 
	Roughly based on:
    320andup by Andy Clarke
    Stark by John Albin
    inuitcss by Harry roberts
    the work of Sara Soueidan

=======================================================================
-->


</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
    <?php print $page_top; ?>
    <?php print $page; ?> 
    <?php print $page_bottom; ?>
  

  <!-- load js --> 
<?php print $scripts; ?> 

<!--[if gt IE 8]><!-->
<script>  
  // load fonts for everything except ie6-7
  WebFontConfig = {
  google: {
    families: ['Open+Sans:300,400,700', 'Playfair+Display:400,400i' ]
  }	
  };
  
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
              '://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();
</script>
<!--<![endif]-->

  </body>
</html>