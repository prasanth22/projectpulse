<?php

function sanitize_html($dirtyHtml)
{
    $config = \HTMLPurifier_Config::createDefault();

    // Allow HTML tags + class (no style)
    $config->set('HTML.Allowed', 'p,b,strong,i,em,u,a[href],ul,ol,li,br,img[src|alt|class],h1,h2,h3,h4,h5,h6,blockquote,table,tr,td,th,span');

    // Optional cache/definition settings
    $config->set('HTML.DefinitionID', 'img_class_support');
    $config->set('HTML.DefinitionRev', 1);
    $config->set('Cache.DefinitionImpl', null);

    $purifier = new \HTMLPurifier($config);
    return $purifier->purify($dirtyHtml);
}

