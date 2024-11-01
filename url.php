<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php
    $url = (isset($_GET['id'])) ? $_GET['id'] : 'Lw==';
    $wp_letsfxurl_arr = array();
    if(file_exists(realpath("../").'/wp_letsfxurl.set'))      
      $wp_letsfxurl_arr = unserialize(file_get_contents(realpath("../").'/wp_letsfxurl.set')); 
      
    if(count($wp_letsfxurl_arr)==0){
       $wp_letsfxurl_arr['hide'] = 11;
       $wp_letsfxurl_arr['delay'] = 10;
       $wp_letsfxurl_arr['red'] = 0;
       $wp_letsfxurl_arr['top'] = '<iframe src="http://tr.cpaera.com/aff_ad?campaign_id=5&aff_id=1003&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="728" height="90"></iframe>';
       $wp_letsfxurl_arr['other1'] = '<iframe src="http://tr.cpaera.com/aff_ad?campaign_id=3&aff_id=1003&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="300" height="250"></iframe>';
       $wp_letsfxurl_arr['other2'] = '<iframe src="http://tr.cpaera.com/aff_ad?campaign_id=3&aff_id=1003&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="300" height="250"></iframe>';
    }
    
    if(strpos($url,'http://')===false&&strpos($url,'https://')===false) $url = base64_decode($url);
    
    //if(!$wp_letsfxurl_arr['red']) {header("Location: http://letsw.com/?".$url ); return;}
     
       ?><div align="center"><?
      
      echo html_entity_decode($wp_letsfxurl_arr['top']);    
      
      //echo '<br><br><p align="center">.. Please wait ..</p><br>';
      echo "<br><br><span id=\"link\" >.. Please wait seconds to get your link..</span><br>";
      //echo '<p align="center">..You will be directed to link within seconds..</p><br>';
     
     ?></div>
     <div align="center"> 
           <table align="center">
              <tr>
                 <td>
                    <? echo html_entity_decode ($wp_letsfxurl_arr['other1']);  ?>
                 </td>
                 <td>
                    <?  echo html_entity_decode ($wp_letsfxurl_arr['other2']);  ?>
                 </td>
              </tr>
           </table>
      </div>
      <br><br>
      <small>Powered by <a href="http://www.letsfx.com/URLCloaker"> URL Cloaker for Wordpress</a></small>
      <?
    
   if($wp_letsfxurl_arr['red']>0) 
        echo '<meta http-equiv="refresh" content="'.($wp_letsfxurl_arr['red']).';url=http://letsw.com/?'.$url.'">';
   $aurl = "<a href=\"http://letsw.com/?$url\" style=\"text-align:center;\" rel=\"nofollow\">$url</a><br>";
      
?>
<script type="text/javascript">
   var tout = '<?echo html_entity_decode($wp_letsfxurl_arr['delay']);?>';
   var aurl = '<? echo $aurl?>';
   setTimeout('document.getElementById("link").innerHTML = aurl', parseInt(tout)*1000);
</script>