<?php
// SOCIAL SHARE
function shareSocial($network) {
    switch ($network) {
        case "facebook":
            $url = "https://www.facebook.com/sharer/sharer.php?u=" . get_permalink();
            break;
        case "twitter":
            $url = "https://twitter.com/share?text=" . get_the_title() . "&amp;url=" . get_permalink();
            break;
        case "linkedin":
            $url = "https://www.linkedin.com/cws/share?url=" . get_permalink();
            break;
        case "whatsapp":
            $url = "https://api.whatsapp.com/send?text=" . get_permalink();
            break;
        case "telegram":
            $url = "https://telegram.me/share/url?url=" . get_permalink();
            break;
        
    }
    return $url .'" onClick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600\');return false;';
}