<?php 
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$form_shortcode = get_sub_field('form_shortcode');
$background_colour = get_sub_field('background_colour');

?>
<?php if(!empty($form_shortcode)) { ?>
<section class="newsletter-section <?php echo $background_colour; ?>">
    <div class="container">
        <div class="newsletter-wrap">
            <div class="mail-icon">
                <svg id="Icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="123.045" height="68.213" viewBox="0 0 123.045 68.213">
                  <defs>
                    <clipPath id="clip-path">
                      <rect id="Rectangle_319" data-name="Rectangle 319" width="123.045" height="68.213" fill="#94e3e1"/>
                    </clipPath>
                  </defs>
                  <g id="Group_272" data-name="Group 272" clip-path="url(#clip-path)">
                    <path id="Path_1497" data-name="Path 1497" d="M293.682,11.076,231.968.1a6.7,6.7,0,0,0-7.751,5.411l-7.8,43.872a6.7,6.7,0,0,0,5.411,7.751L283.542,68.11a6.7,6.7,0,0,0,7.751-5.411l7.8-43.872a6.7,6.7,0,0,0-5.411-7.751M291.993,15.3,256.884,39.81,232.118,4.656ZM220.966,49.258l7.481-42.076,17.4,24.7Zm2.551,3.653,24.9-17.383,6.1,8.661a2.228,2.228,0,0,0,3.1.544l8.508-5.939,17.288,24.766Zm63.551,8.1-17.29-24.766,24.767-17.289Z" transform="translate(-176.151 0)" fill="#94e3e1"/>
                    <path id="Path_1498" data-name="Path 1498" d="M9.282,81.021A13.179,13.179,0,0,0,1.063,83.7,2.323,2.323,0,0,0,.415,86.96a2.387,2.387,0,0,0,3.371.5A11.938,11.938,0,0,1,6.38,86.133a9.292,9.292,0,0,1,8.642,1.479,13.9,13.9,0,0,0,16.266.116c1.288-.957,1.594-2.237.809-3.384a2.351,2.351,0,0,0-3.443-.437,9.29,9.29,0,0,1-11.145-.224,13.515,13.515,0,0,0-8.228-2.661m13.994,23.216a13.214,13.214,0,0,0,8.213-2.7,2.28,2.28,0,0,0,.591-3.261,2.364,2.364,0,0,0-3.282-.524,12.967,12.967,0,0,1-2.69,1.378,9.448,9.448,0,0,1-8.821-1.618A13.835,13.835,0,0,0,1.2,97.549a2.377,2.377,0,0,0-.767,3.4,2.371,2.371,0,0,0,3.458.383,9.265,9.265,0,0,1,11.054.206,13.581,13.581,0,0,0,8.326,2.7M23.22,76.351a13.2,13.2,0,0,0,8.309-2.733,2.278,2.278,0,0,0,.516-3.272,2.349,2.349,0,0,0-3.207-.5,13,13,0,0,1-2.174,1.209,9.441,9.441,0,0,1-9.338-1.4,13.872,13.872,0,0,0-16.17.045A2.388,2.388,0,0,0,.4,73.026a2.363,2.363,0,0,0,3.448.45,9.271,9.271,0,0,1,11.14.212,13.534,13.534,0,0,0,8.228,2.663" transform="translate(0 -54.623)" fill="#94e3e1"/>
                    <path id="Path_1499" data-name="Path 1499" d="M9.281,142.185a13.51,13.51,0,0,1,8.228,2.66,9.29,9.29,0,0,0,11.145.224,2.351,2.351,0,0,1,3.443.437c.784,1.148.478,2.427-.809,3.384a13.9,13.9,0,0,1-16.266-.116A9.292,9.292,0,0,0,6.38,147.3a11.936,11.936,0,0,0-2.594,1.329,2.386,2.386,0,0,1-3.371-.5,2.323,2.323,0,0,1,.648-3.261,13.176,13.176,0,0,1,8.219-2.677" transform="translate(0 -115.786)" fill="#94e3e1"/>
                    <path id="Path_1500" data-name="Path 1500" d="M23.291,226.51a13.581,13.581,0,0,1-8.327-2.7,9.266,9.266,0,0,0-11.054-.206,2.371,2.371,0,0,1-3.458-.383,2.377,2.377,0,0,1,.767-3.4,13.835,13.835,0,0,1,16.082-.035,9.448,9.448,0,0,0,8.821,1.618,12.976,12.976,0,0,0,2.689-1.378,2.363,2.363,0,0,1,3.282.524,2.28,2.28,0,0,1-.591,3.261,13.215,13.215,0,0,1-8.213,2.7" transform="translate(-0.016 -176.895)" fill="#94e3e1"/>
                    <path id="Path_1501" data-name="Path 1501" d="M23.252,76.351a13.534,13.534,0,0,1-8.228-2.663,9.272,9.272,0,0,0-11.14-.212,2.363,2.363,0,0,1-3.448-.45A2.387,2.387,0,0,1,1.188,69.7a13.872,13.872,0,0,1,16.17-.045,9.44,9.44,0,0,0,9.337,1.4,13,13,0,0,0,2.174-1.209,2.349,2.349,0,0,1,3.207.5,2.278,2.278,0,0,1-.516,3.272,13.2,13.2,0,0,1-8.308,2.733" transform="translate(-0.031 -54.623)" fill="#94e3e1"/>
                  </g>
                </svg>
            </div>
            <div class="newsletter-content">
                <?php if(!empty($heading)) { ?>
                    <h3><?php echo $heading; ?></h3>
                <?php } ?>
                <?php if(!empty($content)) { ?>
                    <p><?php echo $content; ?></p>
                <?php } ?>
            </div>
            <div class="newsletter-form">
                <?php echo do_shortcode($form_shortcode); ?>
            </div>
        </div>
    </div>
</section>

<?php } ?>