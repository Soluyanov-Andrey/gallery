<?php
echo($_SERVER['DOCUMENT_ROOT']);
if(!@copy('https://img.freepik.com/premium-photo/medical-workers-healthcare-covid-19-and-vaccination-concept_1258-19616.jpg',$_SERVER['DOCUMENT_ROOT'].'images/images.jpg'))
    {
        $errors= error_get_last();
        echo "COPY ERROR: ".$errors['type'];
        echo "<br />\n".$errors['message'];
    } else {
        echo "File copied from remote!";
    }