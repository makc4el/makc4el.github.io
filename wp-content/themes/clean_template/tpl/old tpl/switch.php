

    <?php
         if(ICL_LANGUAGE_CODE=='en'){
           $cnc_text=get_field('cnc_text_en', 1249);
           $cnc_link=get_field('cnc_link_en', 1249);
          $yachts_text_en=get_field('yachts_text_en', 1249);
          $yachts_link_en=get_field('yachts_link_en', 1249);
         }
         if(ICL_LANGUAGE_CODE=='fr'){
           $cnc_text=get_field('cnc_text_en', 1249);
           $cnc_link=get_field('cnc_link_en', 1249);
          $yachts_text_en=get_field('yachts_text_fr', 1249);
          $yachts_link_en=get_field('yachts_link_fr', 1249);
         }
         if(ICL_LANGUAGE_CODE=='de'){
           $cnc_text=get_field('cnc_text_en', 1249);
           $cnc_link=get_field('cnc_link_en', 1249);
          $yachts_text_en=get_field('yachts_text_de', 1249);
          $yachts_link_en=get_field('yachts_link_de', 1249);
         }
         if(ICL_LANGUAGE_CODE=='it'){
           $cnc_text=get_field('cnc_text_en', 1249);
           $cnc_link=get_field('cnc_link_en', 1249);
          $yachts_text_en=get_field('yachts_text_it', 1249);
          $yachts_link_en=get_field('yachts_link_it', 1249);
         }
         if(ICL_LANGUAGE_CODE=='ru'){
           $cnc_text=get_field('cnc_text_en', 1249);
           $cnc_link=get_field('cnc_link_en', 1249);
          $yachts_text_en=get_field('yachts_text_ru', 1249);
          $yachts_link_en=get_field('yachts_link_ru', 1249);
         }
         if(ICL_LANGUAGE_CODE=='es'){
           $cnc_text=get_field('cnc_text_en', 1249);
           $cnc_link=get_field('cnc_link_en', 1249);
          $yachts_text_en=get_field('yachts_text_es', 1249);
          $yachts_link_en=get_field('yachts_link_es', 1249);
         }
         if(ICL_LANGUAGE_CODE=='pl'){
           $cnc_text=get_field('cnc_text_pl', 1249);
           $cnc_link=get_field('cnc_link_pl', 1249);
          $yachts_text_en=get_field('yachts_text_pl', 1249);
          $yachts_link_en=get_field('yachts_link_pl', 1249);
         }
         if(ICL_LANGUAGE_CODE=='zh-hans'){
           $cnc_text=get_field('cnc_text_en', 1249);
           $cnc_link=get_field('cnc_link_en', 1249);
          $yachts_text_en=get_field('yachts_text_zh_hans', 1249);
          $yachts_link_en=get_field('yachts_link_zh_hans', 1249);
         }
         if(ICL_LANGUAGE_CODE=='ar'){
           $cnc_text=get_field('cnc_text_en', 1249);
           $cnc_link=get_field('cnc_link_en', 1249);
          $yachts_text_en=get_field('yachts_text_ar', 1249);
          $yachts_link_en=get_field('yachts_link_ar', 1249);
         }
     ?>

     <ul class="tabs-list">
       <li class="tabs__item"><a href="<?= $cnc_link ?>"><?=$cnc_text?></a></li>
       <li  class="tabs__item tabs__item--boats"> <a href="<?= $yachts_link_en ?>"><?= $yachts_text_en ?></a></li>
     </ul>
