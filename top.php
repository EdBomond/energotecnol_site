<?
echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>

<meta name='keywords' content=' , , , , , , ,  , ' />
<meta name='description' content='         10 , -    , -   .' />
<link rel='shortcut icon' href='img/ico.ico' />

<title>$PAGE_TITLE </title>
<link  href='/style/admin.css' rel='stylesheet' type='text/css'>
<SCRIPT language=JavaScript src='/style/imgfade.js'></SCRIPT>
<script type='text/javascript' src='/style/jQuery 1.2.6.js'></script>

<script type='text/javascript' src='/style/ddaccordion.js'>
</script>

<style type='text/css'>

body {
        background-color: #4c87b2;
        color: #4C87B2;
}


</style>
<script type='text/javascript'>



//Initialize 2nd demo:
ddaccordion.init({
        headerclass: 'technology', //Shared CSS class name of headers group
        contentclass: 'thelanguage', //Shared CSS class name of contents group
        revealtype: 'click', //Reveal content when user clicks or onmouseover the header? Valid value: 'click', 'clickgo', or 'mouseover'
        mouseoverdelay: 200, //if revealtype='mouseover', set delay in milliseconds before header expands onMouseover
        collapseprev: true, //Collapse previous content (so only one open at any time)? true/false
        defaultexpanded: [$colapse], //index of content(s) open by default [index1, index2, etc]. [] denotes no content.
        onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
        animatedefault: false, //Should contents open by default be animated into view?
        persiststate: false, //persist state of opened contents within browser session?
        toggleclass: ['closedlanguage', 'openlanguage'], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ['class1', 'class2']
        togglehtml: ['prefix', '', ''], //Additional HTML added to the header when it's collapsed and expanded, respectively  ['position', 'html1', 'html2'] (see docs)
        animatespeed: 'fast', //speed of animation: integer in milliseconds (ie: 200), or keywords 'fast', 'normal', or 'slow'
        oninit:function(expandedindices){ //custom code to run when headers have initalized
                //do nothing
        },
        onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
                //do nothing
        }
})



</script>
<link href='img/style' rel='stylesheet' type='text/css' />
</head>

<body>

<table width=$width_global_table border='0' cellpadding='0' cellspacing='0' align='center' bgcolor='#FFFFFF'>
  <tr>
    <td width='15' height='15' background='img/topleft.gif' style='background-repeat:no-repeat; background-position:right bottom;'></td>
    <td width=$width_table height='15' colspan='6' background='img/top.gif' style='background-repeat:repeat-x; background-position:bottom'></td>
    <td width='15' height='15' background='img/topright.gif' style='background-repeat:no-repeat; background-position:bottom left;'></td>
  </tr>
  <tr>
    <td background='img/left.gif' style='background-repeat:repeat-y; background-position:right;'>&nbsp;</td>
    <td colspan='6' ><img src='img/title900x212.jpg' align  border='0' alt=''></td>
    <td background='img/right.gif' style='background-repeat:repeat-y; background-position:left;'>&nbsp;</td>
  </tr>
  <tr>
   <td width='15' background='img/left.gif' style='background-repeat:repeat-y; background-position:right;'></td>
   <td width=$width_table colspan='6' height='5'></td>
   <td width='15' background='img/right.gif' style='background-repeat:repeat-y; background-position:left;'></td>
  </tr> ";
  include("menugor.php");

  echo "<tr>
   <td width='15' background='img/left.gif' style='background-repeat:repeat-y; background-position:right;'></td>
   <td width=$width_table colspan='6' height='5'></td>
   <td width='15' background='img/right.gif' style='background-repeat:repeat-y; background-position:left;'></td>
  </tr>

  <tr>
    <td width='15' background='img/left.gif' style='background-repeat:repeat-y; background-position:right;'></td>
        <td width='$withmenuleft' style='vertical-align:top' > ";
  include("lefttd.php");
    echo     "
       </td>
    <td colspan='5' class='Table1' bgcolor='#ffffff' >

";
?>