<?php  /* --- ?  ---> text { encoding:utf-8;bom:no;linebreaks:unix;tabs:4sp; } */
                                            $simple_upoad['version'] = '0.9.6';
/*
    corz (much used!) uploading script

    corz simple upload now has its own page! (at last!) here:

        http://corz.org/server/tools/simple-upload/

    Note: simple upload can now zip and attach uploaded files to your admin
    email notifications! Multiple uploads are also supported - all the files go
    in the zip (which is named "first-uploaded-file.zip").


    To Use:

        You MUST ensure that both post_max_size and upload_max_filesize php
        directives are large enough to handle the largest file you expect to
        upload, or the upload will fail. The "MAX_FILE_SIZE" (in bytes) hidden
        form element is often (usually) ignored by browsers, don't trust it.

        In this example, the upload filesize is set to 10MB, as are the php
        directives at my site, in the relevant .htaccess file..

            php_value upload_max_filesize 10M
            php_value post_max_size 10M

        If you run php as a CGI, the equivalent directives would go in your
        php.ini/.user.ini..

            upload_max_filesize = 10M
            post_max_size = 10M


    Have fun (check your uploads folder)!

    ;o) Cor

    ps. I don't know who "Diana" is, but I want more!


    (c) 2004->tomorrow! ~ cor + corz.org ;o)

    Please view the license for this free software, here:

        http://corz.org/free-scripts-licence.nfo
*/



/*
    prefs..
*/


//    number of upload spaces to provide in the form..
$simple_upoad['upload_slots'] = 1;

/*
Final Destination

This MUST be writable by the server process (either chmod 777 (php as Module)
or 644 (php as CGI)). Ideally, this should be outside the web tree.
If not, use .htaccess to protect the directory. */
//$simple_upoad['destination']  = $_SERVER['DOCUMENT_ROOT'].'/images/sidepics';
$simple_upoad['destination']  = './';    //    use same directory as script

// put a comment form below the upload slots? (comments will be sent in the body of the notification email)
$simple_upoad['user_comments']  = false;
// NOTE: If you disable email notifications, the comments will be lost.


// uploaded file permissions..
$simple_upoad['permissions'] = '0777';

// leave this blank to NOT send an email when there is a new upload..
//$simple_upoad['email_address'] = 'youraddress@gmail.com';
//THIS ONE $simple_upoad['email_address'] = 'uploads@'.$_SERVER['HTTP_HOST'];


// mail headers..
//$simple_upoad['email_subject'] = 'New upload at '.$_SERVER['HTTP_HOST'];

// End-Of-Line used by the mailer - PHP_EOL should work in most situations.
//$simple_upoad['mail_eol'] = PHP_EOL;

// mail a copy of the uploaded file with the nofitication?
//$simple_upoad['mail_upload'] = true;

// The big bold title above the upload slots..
$simple_upoad['upload_title'] = '<span class="h2" id="link-external-corz-simple-upload" >MayapurTV Website <br>(channel thumbnail image)</small></span>';

$simple_upload['transform_types'] = 'php,php3,php4,php5,phtml,py,rb,rhtml,htm,shtml,inc,ini,com,blog,asp,aspx,html,cgi,pl,asp,aspx,axd,asmx,ashx,asx,cfm,yaws,svg,swf,xhtml,jhtml,jsp,jspx,wss,js,hta,htc,css,rss,xml,do,action,atom,dll';

/*
    end prefs.
*/



// running in stand-alone mode..
if  (realpath ($_SERVER['SCRIPT_FILENAME']) == __FILE__)  {
    do_header();
}

echo '
<form id="upload-form" method="post" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
<div class="upload-form">
    <div class="uptitle">
        upload files <small>(150Kb max)</small> ..
    </div>
    ';

// create a POST array
for ($i=0; $i<$simple_upoad['upload_slots']; $i++) {
    echo '
    <input id="upload-slot-',$i,'" class="upload-slot" type="file" name="files[',$i,']" title="upload-slot-',$i,'" />
    <div class="clear-minute"></div>';
}
echo '
    <input type="submit" name="action" id="upload-submit" value="upload file now" />';

if ($_FILES) {
    $newfile = $zip_file_name = null;
    $newfiles = $email_message = '';
    $transform_types = explode(',', $simple_upload['transform_types']);
    echo '
    <div class="clear"></div>
    <div id="results">
    <br />';
    for ($i=0; $i<$simple_upoad['upload_slots']; $i++) {
        $j=$i+1;
        $name = (@$_FILES['files']['name'][$i]);
        $name = stripslashes($name);
        if (substr($name, 0, 1) == '.') $_FILES['files']['error'][$i] = 5;

        switch ($_FILES['files']['error'][$i]) {
            case 0 :
                echo '<strong>slot ',$j,': uploaded : ',$name,'</strong>';
                break 1; // exit the switch, one level - same as break;
            case 1 :
                echo '<strong>slot ',$j,': upload too big! : ',$name,'</strong>';
                break 1;
            case 2 :
                echo '<strong>slot ',$j,': upload too big! : ',$name,'</strong>';
                break 1;
            case 3 :
                echo '<strong>slot ',$j,': partial upload! : ',$name,'</strong>';
                break 1;
            case 4 :
                echo '<strong>slot ',$j,': empty',$name,'</strong>';
                break 1;
            case 5 :
                $this_name = $name;
                echo '<strong>slot ',$j,': <span class="warning">illegal file name:</span> ',$name,'</strong>';
                break 1;
        }

        if ($_FILES['files']['error'][$i] != 5) {

            $this_name = stripslashes(trim(@$_FILES['files']['name'][$i]));
            if ($this_name != '') {

                $newfile = $simple_upoad['destination'].$this_name;

                // email..
                if ($simple_upoad['email_address']) {
                    $newfiles .= "\t".$this_name."\n";    // note "s"
                    if ($simple_upoad['mail_upload']) {
                        // zip the file..
                        if (!isset($zip_file_name)) {
                            $zip_file_name = $newfile.'.zip';
                        }
                        $zip_result = su_zip_file($zip_file_name, $_FILES['files']['tmp_name'][$i], basename($newfile));
                        if ($zip_result) {
                            $email_message .= '!!!***!!! THERE WAS AN ERROR CREATING THE ZIP! Error: '.$zip_result.' !!!***!!!';
                        }
                    }
                }

                // check the extension - transform certain types ("executables")
                $fext = substr($this_name,strrpos($this_name,'.')+1);
                if (in_array($fext, $transform_types)) {
                    $newfile = $newfile.'.upload';
                }

                @move_uploaded_file($_FILES['files']['tmp_name'][$i], $newfile);
                //@system("chmod 777 \"$newfile\""); // wont work on all web hosts, but worth a try.
                //chmod($newfile, $simple_upoad['permissions']); // this probably will, though.
                // you may want different permissions, but this will at least allow *you* to access
                // the files afterwards, something that can be tricky on some server setups.
            }
        }
        if ($this_name != '') {
            if (file_exists($newfile)) {
                echo '&nbsp;&nbsp;<span class="success">success!</span>';

            } else {
                echo '&nbsp;&nbsp;<span class="warning">failed!</span>';
            }
        }
        echo '<br />';
    }
    echo '</div>';


    if ($newfiles != '' and $simple_upoad['email_address']) {

        $simple_upoad['email_headers'] =    'From: back-end@'.$_SERVER['HTTP_HOST'].$simple_upoad['mail_eol'].
                                            'X-Mailer: PHP/' . phpversion(). $simple_upoad['mail_eol'];
        $email_message .=
            'The following:'."\n\n".
             basename($newfiles)."\n\n".
            'Has been uploaded to '.$_SERVER['HTTP_HOST']."\n".
            'From: '.@$_SERVER['REMOTE_HOST'].' ['.$_SERVER['REMOTE_ADDR'].']'."\n\n";


        if (isset($_POST['upload-comment-form']) and !empty($_POST['upload-comment-form'])) {
            $email_message .= "\nUser Comment:\n\n".$_POST['upload-comment-form'];
            echo '<p class="success">Your comment has been mailed to the webmaster.';
        }


        if ($simple_upoad['mail_upload']) {

            $random_hash = md5(date('r', time()));
            $simple_upoad['email_headers'] = 'From: back-end@'.$_SERVER['HTTP_HOST'].$simple_upoad['mail_eol'];
            $simple_upoad['email_headers'] .= "Reply-To: back-end@".$_SERVER['HTTP_HOST'].$simple_upoad['mail_eol'];
            $simple_upoad['email_headers'] .= "Content-Type: multipart/mixed; boundary=\"mail-boundary-".$random_hash."\"";
            $attachment = chunk_split(base64_encode(file_get_contents($zip_file_name)));
            ob_start();
            echo '--mail-boundary-'.$random_hash.$simple_upoad['mail_eol'];
            echo 'Content-Type: text/plain; charset="iso-8859-1"'.$simple_upoad['mail_eol'];
            echo 'Content-Transfer-Encoding: 7bit'.$simple_upoad['mail_eol'];
            echo "\n".$email_message."\n--mail-boundary-".$random_hash.$simple_upoad['mail_eol'];
            echo 'Content-Type: application/zip; name="'.$zip_file_name.'"'.$simple_upoad['mail_eol'];
            echo 'Content-Transfer-Encoding: base64'.$simple_upoad['mail_eol'];
            echo 'Content-Disposition: attachment'.$simple_upoad['mail_eol'].$simple_upoad['mail_eol'];
            echo $attachment.$simple_upoad['mail_eol'];
            echo $simple_upoad['mail_eol'].'--mail-boundary-'.$random_hash.'--'.$simple_upoad['mail_eol'];
            $final_message = ob_get_clean();

        } else {
            $final_message = $email_message;
        }


        // send the mail..
        $sent_mail = mail(    $simple_upoad['email_address'],
                            $simple_upoad['email_subject'],
                            $final_message."\n\n".'-- The Upload Script',
                            $simple_upoad['email_headers']);

        // delete the zip..
        unlink($zip_file_name);
    }

}

echo '
<div class="clear-small"></div>
</div>';
if ($simple_upoad['user_comments']) {
    echo '<label for="upload-comment-form">Add a comment:
<textarea name="upload-comment-form" id="upload-comment-form" style="width: 100%"></textarea>';
}
echo '
</form>
</div>
<script>
parent.document.body.style.webkitTextSizeAdjust = "auto";
parent.document.body.style.zoom = "100%";
</script>
<div class="source-link" style="font-size:small;position:fixed;bottom:6px;right:6px;">
    <a href="http://corz.org/server/tools/simple-upload/" onclick="window.open(this.href); return false;"
    title="Get corz simple upload for your own site! ..from corz.org">get your own!</a>
    <!-- If you want to remove this link, go here.. http://corz.org/payme -->
</div>
</body>
</html>';


/*
    Generic File Zipping..    (from file-tools.php)

    Adds a file to a zip.

    If the zip archive does not exist, it is created.

    The optional 3rd parameter enables you to specify the name *inside* the
    archive, otherwise the full path is stored, which on most servers will
    produce an archive which requires a /lot/ of clicking to get to the file!

    e.g..
    $return_val = zip_file("./tiffs.zip", "/path/to/image.tiff", "image.tiff");

    Return values..

        0 = Success!
        1 = Error opening zip.
        2 = Error creating new zip.
        3 = Error adding files to an existing zip.

    NOTE:    You need to have the php Zip extension installed for this to work.
            To find out if you do, run my "php_extensions.php", or try zipping
            something!
                                                                              */
function su_zip_file($archive, $file, $name='') {

    $zip = new ZipArchive();

    if (file_exists($archive)) {
        // cannot open existing archive..
        if ($zip->open($archive, ZIPARCHIVE::CHECKCONS) !== TRUE) {
            return 1;
        }
    } else {
        // cannot create new archive..
        if ($zip->open($archive, ZIPARCHIVE::CM_PKWARE_IMPLODE) !== TRUE) {
            return 2;
        }
    }
    // error adding file to archive..
    if ($name) {
        if (!$zip->addFile($file, $name)) {
            return 3;
        }
    } else {
        if (!$zip->addFile($file)) {
            return 3;
        }
    }
    $zip->close();
    return 0;
}




function do_header() {
    echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, width=device-width" />
<title>corz.org upload - simple, secure php upload facility with email notifications, attached zip of uploads, multiple slots, and more..</title>
<meta name="description" content="corz.org simple php upload script, with error reporting, multiple upload slots and web master email notifications (even attaching the upload). Secure and stable php uploading is possible!" />
<meta name="generator" content="hand made by cor" />
<!-- <meta name="bitcoin" content="1EGLbAJktba42PAaFpvyvndYug8XhQTR1i" /> -->
<!-- <meta name="bitcoinmsg" content="Many thanks!"/> -->
<meta name="dcterms.rights" content="copyright © 2000-tomorrow ~ cor and corz.org, some rights reserved">
<!-- (c) copyright 2000->tomorrow ~ cor + corz.org, some rights reserved -->
<link rel="shortcut icon" href="http://corz.org/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="css/upload.css" type="text/css" media="screen" />
</head>
<body>
<div class="content" id="tool">
<h2>',$GLOBALS['simple_upoad']['upload_title'],'</h2>';
}

?>