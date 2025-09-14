<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="/assets/css/Css_Reset.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/assets/css/about.css?v=<?php echo time(); ?>">
    <?php require_once('config/cookies.php'); ?>
    <?php session_start(); ?>

    <?php require_once('config/mitigations.php'); ?>

</head>
<body>
    <main>
    <?php
        require("includes/nav.php");
        require("includes/aboutnav.php");
    ?>
        
        <div id="aboutban">

        </div>

        <div id="ab_text">
            <p>Thye Shan Medical Hall was founded in 1955 by Chan Chak Poey who had migrated to Singapore from China’s Guangdong province.

                Mr Chan was an apprentice in his Father’s TCM Hall when he was growing up in Guangzhou.
                
                In Singapore, after a series of hardships, he finally fulfilled his dream of setting up his own TCM Hall in Chinatown to provide quality medicine and services to all.</p>
        </div>
        <div id="aboutstuff">

            <div id="aboutstuff1">
                <img src="/assets/images/Old-Thye-Shan-photo-1094x800.jpg.webp" alt="Old Thye Shan">
                <div id="ab_content1">
                    <h2>Our Founder – Chan Chak Poey</h2>
                    <p>Thye Shan Medical Hall was founded in 1955 by Chan Chak Poey who had migrated to Singapore from China’s Guangdong province.

                        Mr Chan was an apprentice in his Father’s TCM Hall when he was growing up in Guangzhou.
                        
                        In Singapore, after a series of hardships, he finally fulfilled his dream of setting up his own TCM Hall in Chinatown to provide quality medicine and services to all.</p>
                </div>
            </div>

            <div id="aboutstuff2">
                <div id="abt_content2">
                <h2>Our Beginnings in 1955 
                    (Pre-Independence Singapore)</h2>
                <p>The first Thye Shan Medical Hall was started at 207 New Bridge Road. It was a corner shophouse at the intersection of Pagoda Street and New Bridge Road. You will notice People’s Park Market on the top right with pre-World War II Singapore Improvement Trust (SIT) flats at Smith Street in the background.

                    This was a time before the Independence of Singapore in 1965 and before World War II. Quite noticeably, there was no overhead bridge linking New Bridge Road to Eu Tong Sen Street, and the Chinatown MRT was not built then.
                
                    Photo of Chinatown in 1955, Source: Yip Cheong Fun, National Archives of Singapore</p>
                </div>
                    <img src="/assets/images/old-Thye-Shan-Photo-1955-4.png.webp" alt="Old Thye Shan">
                
            </div>
        </div>
    </main>
    <?php require("includes/footer.php");?>
</body>
</html>