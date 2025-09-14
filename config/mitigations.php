<?php
    header("X-Frame-Options: DENY");
    header("Content-Security-Policy-Report-Only: default-src 'none'; form-action 'none'; frame-ancestors 'none'; ");
    // header("X-Frame-Options: SAMEORIGIN");
    // $IncludeFrameBustingJavascript = TRUE;
    // header("Content-Security-Policy: default-src filesystem: http://localhost/L9_HoWinthrop%20-%20SST/Project_VSC/");
    // header("Content-Security-Policy: default-src 'self' https://thyeshan.com/terms-and-conditions; child-src 'none'; object-src 'none';");
    // header("Content-Security-Policy: default-src 'self' https://www.facebook.com/thyeshanmedicalhall; child-src 'none'; object-src 'none'; ");
    // header("Content-Security-Policy: default-src 'self' https://www.instagram.com/thyeshanmedicalhall  ; child-src 'none'; object-src 'none'; ");
    // header("Content-Security-Policy: default-src filesystem: http://localhost/L9_HoWinthrop%20-%20SST/Project_VSC/; child-src 'none'; object-src 'none'; ");
    // header("Content-Security-Policy: frame-ancestors 'self': http://localhost/L9_HoWinthrop%20-%20SST/Project_VSC/; child-src 'none'; object-src 'none';");
    // header("Content-Security-Policy: form-action 'self' http://localhost/L9_HoWinthrop%20-%20SST/Project_VSC/; child-src 'none'; object-src 'none';");
    // header("Content-Security-Policy: child-src https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8164097608696!2d103.84148931475396!3d1.284057999063459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da19735db7c2e1%3A0x4e7915050c9d49c7!2zVGh5ZSBTaGFuIE1lZGljYWwgSGFsbCBGbGFnc2hpcCBTdG9yZSAoMjAxIE5ldyBCcmlkZ2UgUm9hZCkg5rOw5bGx6I2v6KGMICgyMDHmlrDmoaXot68p!5e0!3m2!1sen!2ssg!4v1627745432513!5m2!1sen!2ssg; child-src 'none'; object-src 'none';");
    // header("Content-Security-Policy: child-src https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8197404700068!2d103.84280631475397!3d1.2819217990650091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da190d2ba2e0a7%3A0x2438452f1027ce34!2zVGh5ZSBTaGFuIE1lZGljYWwgSGFsbCAoMjY2IFNvdXRoIEJyaWRnZSBSb2FkKSDms7DlsbHoja_ooYwgKDI2NuahpeWNl-i3ryk!5e0!3m2!1sen!2ssg!4v1627745545209!5m2!1sen!2ssg; child-src 'none'; object-src 'none';");
    // header("Content-Security-Policy: child-src https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.7872754708433!2d103.83312741475393!3d1.3025943990499391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da1991f188a283%3A0x1b3d17f5c2ce6ef5!2sTakashimaya!5e0!3m2!1sen!2ssg!4v1627745586276!5m2!1sen!2ssg; child-src 'none'; object-src 'none';");
    // header("Content-Security-Policy: connect-src 'none'");
    // header("Content-Security-Policy: font-src 'none'");
    // header("Content-Security-Policy: frame-src https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8164097608696!2d103.84148931475396!3d1.284057999063459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da19735db7c2e1%3A0x4e7915050c9d49c7!2zVGh5ZSBTaGFuIE1lZGljYWwgSGFsbCBGbGFnc2hpcCBTdG9yZSAoMjAxIE5ldyBCcmlkZ2UgUm9hZCkg5rOw5bGx6I2v6KGMICgyMDHmlrDmoaXot68p!5e0!3m2!1sen!2ssg!4v1627745432513!5m2!1sen!2ssg; child-src 'none'; object-src 'none';");
    // header("Content-Security-Policy: frame-src https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8197404700068!2d103.84280631475397!3d1.2819217990650091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da190d2ba2e0a7%3A0x2438452f1027ce34!2zVGh5ZSBTaGFuIE1lZGljYWwgSGFsbCAoMjY2IFNvdXRoIEJyaWRnZSBSb2FkKSDms7DlsbHoja_ooYwgKDI2NuahpeWNl-i3ryk!5e0!3m2!1sen!2ssg!4v1627745545209!5m2!1sen!2ssg; child-src 'none'; object-src 'none';");
    // header("Content-Security-Policy: frame-src https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.7872754708433!2d103.83312741475393!3d1.3025943990499391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da1991f188a283%3A0x1b3d17f5c2ce6ef5!2sTakashimaya!5e0!3m2!1sen!2ssg!4v1627745586276!5m2!1sen!2ssg; child-src 'none'; object-src 'none';");
    // header("Content-Security-Policy: img-src 'none'");
    // header("Content-Security-Policy: manifest-src filesystem http://localhost/L9_HoWinthrop%20-%20SST/Project_VSC/; child-src 'none'; object-src 'none';");
    // header("Content-Security-Policy: object-src 'none' ");
    // header("Content-Security-Policy: prefetch-src filesystem http://localhost/L9_HoWinthrop%20-%20SST/Project_VSC/; child-src 'none'; object-src 'none'; ");
    // header("Content-Security-Policy: script-src 'self' https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js; child-src 'none'; object-src 'none';");
    // header("Content-Security-Policy: style-src filesystem http://localhost/L9_HoWinthrop%20-%20SST/Project_VSC/; child-src 'none'; object-src 'none';");
    // header("Content-Security-Policy: worker-src filesystem http://localhost/L9_HoWinthrop%20-%20SST/Project_VSC/");

    // $doc = new DOMDocument();

    // // load the HTML string we want to strip
    // $doc->loadHTML($html);

    // // get all the script tags
    // $script_tags = $doc->getElementsByTagName('script');

    // $length = $script_tags->length;

    // // for each tag, remove it from the DOM
    // for ($i = 0; $i < $length; $i++) {
    // $script_tags->item($i)->parentNode->removeChild($script_tags->item($i));
    // }

    // // get the HTML string back
    // $no_script_html_string = $doc->saveHTML();
?>

