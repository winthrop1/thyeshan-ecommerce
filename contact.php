<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="/assets/css/Css_Reset.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/assets/css/contact.css?v=<?php echo time(); ?>">
    <?php require_once('config/cookies.php'); ?>
    <?php require_once('config/mitigations.php'); ?>
    <?php session_start(); ?>
</head>
<body>
    <main>
        <?php require("includes/nav.php"); ?>

       <div id="con_ban"></div> 
        <div id="conlocation">
            <div id="nbr">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8164097608696!2d103.84148931475396!3d1.284057999063459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da19735db7c2e1%3A0x4e7915050c9d49c7!2zVGh5ZSBTaGFuIE1lZGljYWwgSGFsbCBGbGFnc2hpcCBTdG9yZSAoMjAxIE5ldyBCcmlkZ2UgUm9hZCkg5rOw5bGx6I2v6KGMICgyMDHmlrDmoaXot68p!5e0!3m2!1sen!2ssg!4v1627745432513!5m2!1sen!2ssg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <h2>New Bridge Road Flagship Outlet (HQ)</h2>
           
                <p>201 New Bridge Road Singapore</p>
                <p>S(059428)</p>
                <p>Tel: +65 6223 1326 / +65 9623 3475</p>
                <p>Fax: +65 6221 5042</p>
                <h2>Operating Hours:</h2>
                <p>10am - 8pm</p>
                <p>(Open daily except selected public holiday)</p>
            </div>
            <div id="sbr">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8197404700068!2d103.84280631475397!3d1.2819217990650091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da190d2ba2e0a7%3A0x2438452f1027ce34!2zVGh5ZSBTaGFuIE1lZGljYWwgSGFsbCAoMjY2IFNvdXRoIEJyaWRnZSBSb2FkKSDms7DlsbHoja_ooYwgKDI2NuahpeWNl-i3ryk!5e0!3m2!1sen!2ssg!4v1627745545209!5m2!1sen!2ssg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <h2>South Bridge Road Outlet</h2>
                <p>266 South Bridge Road Singapore</p>
                <p>S(058815)</p>
                <p>Tel: +65 6323 1968 / +65 9623 3475</p>
                <p>Fax: +65 6323 5691</p>
                <h2>Operating Hours:</h2>
                <p>11am - 6.30pm</p>
                <p>(Open daily except selected public holidays)</p>
            </div>
            <div id="taka">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.7872754708433!2d103.83312741475393!3d1.3025943990499391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da1991f188a283%3A0x1b3d17f5c2ce6ef5!2sTakashimaya!5e0!3m2!1sen!2ssg!4v1627745586276!5m2!1sen!2ssg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <h2>Takashimaya Outlet</h2>
                <p>391 Orchard Road Singapore</p>
                <p>Ngee Ann City Tower A</p>
                <p>Takashimaya Department Store B2</p>
                <p>(B209-05)</p>
                <p>S(238873)</p>
                <p>Tel: +65 6733 3643 / +65 9623 3475</p>
                <p>Fax: +65 6221 5042</p>
                <h2>Operating Hours:</h2>
                <p>11am - 8pm</p>
                <p>(Open daily except selected public holidays)</p>
            </div>
        </div>
        <div id="coninfo">
            <h4>Email (Customer Service):</h4>
            <p><a href="mailto:custsvc@thyeshan.com">custsvc@thyeshan.com</a></p>
            <h4>Email (Commerical Enquiries):</h4>
            <p><a href="mailto:bd@thyeshan.com">bd@thyeshan.com</a></p>
        </div> 
</main>
    <?php require("includes/footer.php"); ?>
</body>
</html>