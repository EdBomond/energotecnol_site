<?php
//if (!eregi("index.php", $PHP_SELF)) { die ("Access denied"); }

$Picture=Array('lic1','lic12','lic2','lic22','sert');

$Pict= isset($_GET['pict']) ? basename($_GET['pict']) : -1;
echo "
<table width='100%' border='0' cellpadding='0' cellspacing='0'> ";

switch($Pict)
{
   case -1:
        //вывести все
        for($i=0;$i<count($Picture)/2;$i++)
          { $y=$i*2;
            $y1=$i*2+1;
            $Img1="img/$Picture[$y].jpg";
            $Img2="img/$Picture[$y1].jpg";
            if(file_exists($Img1))
              $scr="<a href='index.php?mod=lic&pict=$y'>
                     <IMG onmouseover=nereidFade(this,100,30,10) style='FILTER: alpha(opacity=80)' onmouseout=nereidFade(this,80,50,5) width=300 alt='Лицензия на осуществление строительства' src=$Img1  vspace=2 border=0 >
                    </a> ";
            else
              $scr="";
            echo "<tr>";
            echo   "<td align='center' bgcolor='#FFFFFF' width=50%>
                     <div id='img'>
                      $scr";
            echo   " </div>
                    </td>";
            if(file_exists($Img2))
              $scr="<a href='index.php?mod=lic&pict=$y1'>
                     <IMG onmouseover=nereidFade(this,100,30,10) style='FILTER: alpha(opacity=80)' onmouseout=nereidFade(this,80,50,5) width=300 alt='Лицензия на осуществление строительства' src=$Img2  vspace=2 border=0 >
                    </a>";
            else
              $scr="";
            echo   "<td align='center' bgcolor='#FFFFFF' width='50%'>
                     <div id='img'>
                      $scr";
            echo   "</div>
                    </td>";
            echo "</tr>";
         }
         break;
    case $Pict:
         //сначала выводим нужную увеличенную картинку а потом все остальные
            $Img="img/$Picture[$Pict]big.jpg";
            if(file_exists($Img))
               $scr="<a href='index.php?mod=lic'>
                     <IMG width=600 height=800 alt='Лицензия на осуществление строительства' src=$Img  vspace=2 border=0 >
                     </a> ";
            else
              $scr="";
            echo "<tr>";
            echo   "<td align='center' bgcolor='#FFFFFF' width=100%>
                     <div id='img'>
                      $scr";
            echo   " </div>
                    </td>";
            echo "</tr>";
         break;
}
echo "
</table> ";
