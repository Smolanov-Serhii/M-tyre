<div class="pay__list">
    <?php
    if( have_rows('zapisi_dostavka_i_oplata', 198) ):
        while( have_rows('zapisi_dostavka_i_oplata', 198) ) : the_row();
            $itemimage = get_sub_field('kartinka_zapisi_oplatydostavki', 198);
            $itemtitle = get_sub_field('zagolovok_dlya_zapisi_dostavkaoplata', 198);
            $itemcontent = get_sub_field('opisanie_dlya_bloka_dostavkaoplata', 198);
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