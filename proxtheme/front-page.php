<?php get_header(); ?>

<div id="FrontPage">
    <?php $main_slider = get_field('main_slider');
    if ($main_slider) { ?>
        <div class="mainslider">
            <?php foreach ($main_slider as $slide) { ?>
                <div class="bgimg" style="background-image:url('<?php echo $slide['background']; ?>')">
                    <div class="d-flex  align-items-end justify-content-center" style="height:90vh;background-color:rgba(0,0,0,0.48)">
                        <div class="container c16 pb-5">
                            <div class="row align-items-center justify-content-between pb-5">
                                <div class="col-md-6">
                                    <h4 class="Niloofar sc1 mhfs30 " style="font-size:130px;"><?php echo $slide['title']; ?></h4>
                                </div>
                                <div class="col-md-5">
                                    <div class="fs25 sc1">
                                        <?php echo $slide['paragraph']; ?>
                                    </div>
                                    <div class="d-flex mt-4" style="gap:15px">
                                        <?php $link1 = $slide['link_1'];
                                        if ($link1) { ?>
                                            <a href="<?php echo $link1['url']; ?>" class="d-block fbold fs25 link1">
                                                <?php echo $link1['title']; ?>
                                            </a>
                                        <?php } ?>
                                        <?php $link2 = $slide['link_2'];
                                        if ($link2) { ?>
                                            <a href="<?php echo $link2['url']; ?>" class="d-block fbold fs25 link2">
                                                <?php echo $link2['title']; ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <?php $finds = get_field('finds');
    if ($finds) { ?>
        <div class="py-5" style="background-color:#016D47">
            <div class="container c16">
                <h4 class="sectiontitle sc1 text-center Niloofar"><?php echo get_field('find_t'); ?></h4>
                <div class="harmony-wrapper mt-5">
                    <?php $i = 1;
                    foreach ($finds as $find) { ?>
                        <div class="harmony-item <?php if ($i == 1) echo 'left pt-5 d-flex flex-row-reverse align-items-center';
                                                    elseif ($i == 2) echo 'center d-flex align-items-center flex-column';
                                                    else echo 'right  d-flex align-items-center mt-5 pt-5'; ?>">
                            <div class="icon <?php if ($i == 2) echo 'main'; ?>">
                                <img src="<?php echo $find['icon']['url']; ?>" alt="<?php echo $find['icon']['alt']; ?>">
                            </div>
                            <h4 class="fs25 fbold sc1 itemtitle"><?php echo $find['title']; ?></h4>
                        </div>

                    <?php $i++;
                    } ?>


                </div>
            </div>
        </div>
    <?php } ?>
    <?php $numbers = get_field('numbers');
    if ($numbers) { ?>
        <div class=" sectionPadding" style="background-color:#013020">
            <div class="container c16">
                <h4 class="sectiontitle sc1 text-center Niloofar"><?php echo get_field('society_t'); ?></h4>
                <div class="mt-5 sc3 fs43 pb-5 text-center Niloofar d-flex w-75 mx-auto justify-content-center  align-items-end flex-wrap " style="gap:5px;">
                    <?php
                    $society_p = get_field('society_p');

                    if ($society_p) {
                        // Split the text by commas
                        $words = explode(',', $society_p);

                        // Get the last word separately
                        $last_word = array_pop($words);

                        // Display words with a span and class
                        foreach ($words as $word) {
                            echo '<span class="highlighted-word Niloofar d-block">' . trim($word) . '</span>, ';
                        }

                        // Display the last word without wrapping it in a span
                        echo trim($last_word);
                    }
                    ?>
                </div>

                <div class="row pt-5 justify-content-between mt-5">
                    <?php foreach ($numbers as $number) { ?>
                        <div style="gap:10px" class="d-flex align-items-center col-md-2">
                            <img src="<?php echo $number['icon']['url']; ?>" alt="<?php echo $number['icon']['alt']; ?>">
                            <h4 class="sc1 fs25 mb-0"><?php echo $number['title']; ?></h4>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php $reasons = get_field('reasons');
    if ($reasons) { ?>
        <div class="sectionPadding" style="background-color:#016D47">
            <div class="container c16 ">
                <div class="row align-items-center">
                    <div class="col-md-4 mb-5 pb-5">
                        <img class="circle" src="<?php echo get_template_directory_uri() . '/images/circle.svg'; ?>" alt="Circle">
                        <h4 class="sc1 fs60 Niloofar sectiontitle2 position-relative"><?php echo get_field('reasons_t'); ?>

                        </h4>
                    </div>
                    <?php foreach ($reasons as $reason) { ?>
                        <div class="col-md-4 mb-5 pb-5">
                            <img src="<?php echo $reason['icon']['url']; ?>" alt="<?php echo $reason['icon']['alt']; ?>">
                            <div class="mt-5    ">
                                <h4 class="sc1 fs25 fbold"><?php echo $reason['title']; ?></h4>
                                <div class="sc1 fs25"><?php echo $reason['desc']; ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php $vision_link = get_field('vision_link');
            if ($vision_link) { ?>
                <div style="height:200px">

                </div>
            <?php } ?>
        </div>

    <?php } ?>
    <?php $vision_link = get_field('vision_link');
    if ($vision_link) { ?>
        <div class="bgimg position-relative" style="height:110vh;background-image:url('<?php echo geT_field('vision_bg'); ?>">
            <div style="position:absolute;height:100%;width:100%;background-color:rgba(0,0,0,0.48)"></div>
            <div class="container c16 p-5 position-relative" style="top:-315px;border-radius:8px;background-color:#EFDDCE">
                <h4 class="fs60 Niloofar sc4 fbold"><?php echo get_field('vision_t'); ?></h4>
                <div class="row mt-4 mb-5 pb-5">
                    <div class="col-md-6 fs25 sc4">
                        <?php echo get_field('vision_p1'); ?>
                    </div>
                    <div class="col-md-6 sc4 fs25">
                        <?php echo get_field('vision_p2'); ?>
                    </div>
                </div>
                <a class="d-block alink mx-auto" href="<?php echo $vision_link['url']; ?>">
                    <?php echo $vision_link['title']; ?>
                </a>
            </div>
        </div>
    <?php } ?>
</div>

<?php get_footer(); ?>