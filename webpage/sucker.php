<!DOCTYPE html>
<html>
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="http://www.cs.washington.edu/education/courses/cse190m/12sp/labs/4/buyagrade.css" type="text/css" rel="stylesheet" />
</head>
<body>


<?php

//IF the form is submitted, process the data
if(isset($_POST['filename']) && isset($_POST['section']) && isset($_POST['crd_card']) && isset($_POST['card'])) {
    if($_POST['fname'] == '' && $_POST['section'] == '' && $_POST['crd_card'] == '' && $_POST['card'] == '') {
        $name = $_POST['name'];
        $section = $_POST['section'];
        $crd_card = $_POST['crd_card'];
        $card = $_POST['card'];

        //Save to a text file
        $file = fopen('sucker.txt', 'a');
        $text = $name.';'.$section.';'.$crd_card.';'.$card."\n";
        fwrite($file, $text);
        fclose($file);

        $cnt = file_get_contents('sucker.txt');

        if(strlen($crd_card) == 16) {
            if(($card=='Mastercard' && $crd_card[0] == 5) || ($card=='Visa') && $crd_card[0] == 4 ) {
            }

            ?>
            <h1>Thanks, sucker!</h1>
            <p>Your information has been recorded</p>
            <dl>
                <dt>Name</dt>
                <dd><?=$name?></dd>

                <dt>Section</dt>
                <dd><?=$section?></dd>

                <dt>Credit Card</dt>
                <dd><?=$crd_card?> (<?=$card?>)</dd>
            </dl>
            <p>Here are all the suckers who have submitted here:</p>
            <pre>
					<?=$cnt?>
				</pre>

            <?php
        }

        else {
            print "<h1>Sorry</h1>";
            print "You didn't provide a valid credit card number. Click <a href='buyagrade.html'>here</a> to go back.";
        }
    }
    else {
        print "<h1>Sorry</h1>";
        print "You must fill out all the fields. Click <a href='buyagrade.html'>here</a> to go back.";
    }
}

else {
    print "You must fill out all the fields. Click <a href='buyagrade.html'>here</a> to go back.";
}

?>
</body>
</html>