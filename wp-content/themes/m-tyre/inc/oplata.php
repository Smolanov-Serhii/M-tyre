<div class="pay__list">
    <?php
    if( have_rows('zapisi_dostavka_i_oplata', 27) ):
        while( have_rows('zapisi_dostavka_i_oplata', 27) ) : the_row();
            $itemimage = get_sub_field('kartinka_zapisi_oplatydostavki', 27);
            $itemtitle = get_sub_field('zagolovok_dlya_zapisi_dostavkaoplata', 27);
            $itemcontent = get_sub_field('opisanie_dlya_bloka_dostavkaoplata', 27);
            ?>
            <div class="pay__item">
                <div class="pay__item-header">
                    <img src="<?php echo $itemimage;?>" alt="<?php echo $itemtitle;?>">
                    <h2 class="pay__item-title">
                        <?php echo $itemtitle;?>
                    </h2>
                </div>
                <div class="pay__item-content">
                    <?php echo $itemcontent;?>
                </div>
            </div>
        <?php
        endwhile;
    else :
    endif;?>
</div>