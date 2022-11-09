<?php


function display_update($web_name,    $logo,    $title_intro,    $content_intro,    $fb_url, $insta_url,    $twitter_url,    $pinterest_url)
{

    $sql = "UPDATE web_settings SET web_name='$web_name',logo='$logo',title_intro='$title_intro',	content_intro='$content_intro',	fb_url='$fb_url',insta_url='$insta_url'	,twitter_url='$twitter_url',	pinterest_url='$pinterest_url'";
    pdo_execute($sql);
}

function display_select_all(){
    $sql = "SELECT * FROM web_settings";
   return pdo_query_one($sql);
}