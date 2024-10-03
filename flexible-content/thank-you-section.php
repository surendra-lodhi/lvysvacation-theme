<?php 
    $thank_you_title = get_sub_field('thank_you_title');
    $thank_you_content = get_sub_field('thank_you_content');
    $cta_one = get_sub_field('button_one');
    $cta_two = get_sub_field('button_two');
    $wave_colour = get_sub_field('wave_colour');
?>
<section class="content-full-section thank-you-section wave-line-right <?php echo $wave_colour; ?>">
    <div class="wave-line-wrap">
        <svg xmlns="http://www.w3.org/2000/svg" width="282.28" height="14.349" viewBox="0 0 282.28 14.349">
          <path id="Squiggle_line" data-name="Squiggle line" d="M279.984,0h0a18.525,18.525,0,0,0-13.089,5.33,13.922,13.922,0,0,1-10.035,4.236,13.952,13.952,0,0,1-10.038-4.236c-.189-.185-.409-.31-.606-.485V4.8c-.242-.216-.519-.363-.768-.564a18.369,18.369,0,0,0-2.018-1.48c-.227-.14-.473-.238-.708-.367a18.517,18.517,0,0,0-2.51-1.192c-.159-.057-.322-.087-.477-.14a18.626,18.626,0,0,0-2.9-.761c-.087-.015-.178-.011-.265-.026a18.654,18.654,0,0,0-15.913,5.065,13.918,13.918,0,0,1-10,4.228,13.921,13.921,0,0,1-10-4.232,18.8,18.8,0,0,0-26.224,0,13.908,13.908,0,0,1-10,4.232,13.916,13.916,0,0,1-9.989-4.228,18.511,18.511,0,0,0-2-1.62c-.125-.091-.231-.2-.356-.288a18.139,18.139,0,0,0-2.059-1.215c-.2-.106-.4-.22-.6-.318a18.713,18.713,0,0,0-2.351-.927c-.117-.038-.235-.068-.356-.106A18.291,18.291,0,0,0,141.362,0a1.649,1.649,0,0,0-.2.042,1.824,1.824,0,0,0-.2-.042,18.518,18.518,0,0,0-13.089,5.33,13.922,13.922,0,0,1-10.035,4.236,13.946,13.946,0,0,1-10.038-4.236,18.72,18.72,0,0,0-26.167,0A13.923,13.923,0,0,1,71.611,9.565,13.929,13.929,0,0,1,61.581,5.329a18.717,18.717,0,0,0-26.16,0A13.915,13.915,0,0,1,25.4,9.568,13.923,13.923,0,0,1,15.37,5.336,18.486,18.486,0,0,0,2.3,0a2.392,2.392,0,0,0,0,4.781A13.911,13.911,0,0,1,12.32,9.019,18.492,18.492,0,0,0,25.4,14.349a18.5,18.5,0,0,0,13.078-5.33,14,14,0,0,1,19.8-.257c.087.083.174.17.257.257a18.491,18.491,0,0,0,13.078,5.33,18.5,18.5,0,0,0,13.078-5.33,14,14,0,0,1,19.8-.257c.087.083.174.17.257.257a18.518,18.518,0,0,0,13.089,5.33,18.516,18.516,0,0,0,13.086-5.33,13.946,13.946,0,0,1,10.038-4.236,1.824,1.824,0,0,0,.2-.042,1.649,1.649,0,0,0,.2.042,13.959,13.959,0,0,1,2.729.269V5.06c.235.049.462.136.7.2a13.385,13.385,0,0,1,1.567.485c.386.148.765.329,1.139.515.333.163.655.341.973.53.4.242.8.481,1.177.761.208.155.4.337.594.5a13.252,13.252,0,0,1,1.094.969,18.489,18.489,0,0,0,13.074,5.33l.027,0,.03,0a18.5,18.5,0,0,0,13.078-5.33,13.942,13.942,0,0,1,19.748-.257c.087.083.174.17.257.257a18.5,18.5,0,0,0,13.082,5.33l.026,0,.026,0a18.492,18.492,0,0,0,13.078-5.33,13.942,13.942,0,0,1,19.748-.257c.087.083.174.17.257.257a18.51,18.51,0,0,0,13.1,5.33,18.516,18.516,0,0,0,13.086-5.33,13.952,13.952,0,0,1,10.038-4.236,2.392,2.392,0,0,0,0-4.781" transform="translate(0 0)" fill="#94e3e1"></path>
        </svg>
    </div>
    <div class="container">
        <h2><?php echo $thank_you_title; ?></h2>
        <?php if(!empty($thank_you_content)){ ?>
        <div class="content-inner">
            <h3><?php echo $thank_you_content; ?></h3>
        </div>
        <?php } ?>
        <div class="btn-block">
            <?php if(!empty($cta_one)){ ?>
                <a href="<?php echo $cta_one['url']; ?>" class="btn-primary pink-bg"><?php echo $cta_one['title']; ?></a>
            <?php } ?>
            <?php if(!empty($cta_two)){ ?>
                <a href="<?php echo $cta_two['url']; ?>" class="btn-primary blue-bg"><?php echo $cta_two['title']; ?></a>
            <?php } ?>
        </div>
    </div>
</section>