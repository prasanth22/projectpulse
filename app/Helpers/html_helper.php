<?php

function sanitize_html($dirtyHtml)
{
    $config = \HTMLPurifier_Config::createDefault();

    // Optional: Restrict to safe tags/attributes only
    $config->set('HTML.Allowed', 'p,b,strong,i,em,u,a[href],ul,ol,li,br,img[src|alt|width|height],h1,h2,h3,h4,h5,h6,blockquote,table,tr,td,th');

    $purifier = new \HTMLPurifier($config);
    return $purifier->purify($dirtyHtml);
}
