<?php

/*
Plugin Name: URL Cloak & Encrypt 
Version: 3.8.0
Plugin URI: http://www.letsfx.com/URLCloaker
Author: aqlan
Author URI: http://blog.letsfx.com/
Description: SEO, Privacy, Encryption, Redirect, Invest and Affiliate Link Cloaker of URL inside your posts. Build in between page with delay sometime to show your ADs before directing visitors to trargeted page.
*/

/*
    This program is free software; you can redistribute it
    under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/

// Displays Simple Ad Campaign Options menu
function ad_letsfxurl_option_page() {
    if (function_exists('add_options_page')) {
        add_options_page('url-cloaker', 'url-cloaker', 8, __FILE__, 'letsfxurl_insertion_options_page');
    }
}

function letsfxurl_insertion_options_page() {
    if (isset($_POST['info_update']))
    {
        echo '<div id="message" class="updated fade"><p><strong>';
        
        $tmpCode1 = htmlentities(stripslashes($_POST['wp_letsfxurl_hide']) , ENT_COMPAT);
        $wp_letsfxurl_arr['hide'] = $tmpCode1;
        update_option('wp_letsfxurl_hide', $tmpCode1); 
        
        $tmpCode1 = htmlentities(stripslashes($_POST['wp_letsfxurl_red']) , ENT_COMPAT);
        $wp_letsfxurl_arr['red'] = $tmpCode1;
        update_option('wp_letsfxurl_red', $tmpCode1); 
        
        $tmpCode1 = htmlentities(stripslashes($_POST['wp_letsfxurl_top']) , ENT_COMPAT);
        $wp_letsfxurl_arr['top'] = $tmpCode1;
        update_option('wp_letsfxurl_top', $tmpCode1); 
        
        $tmpCode1 = htmlentities(stripslashes($_POST['wp_letsfxurl_delay']) , ENT_COMPAT);
        $wp_letsfxurl_arr['delay'] = $tmpCode1;
        update_option('wp_letsfxurl_delay', $tmpCode1); 
        
        $tmpCode1 = htmlentities(stripslashes($_POST['wp_letsfxurl_other1']) , ENT_COMPAT);
        $wp_letsfxurl_arr['other1'] = $tmpCode1;
        
        $tmpCode1 = htmlentities(stripslashes($_POST['wp_letsfxurl_other2']) , ENT_COMPAT);
        $wp_letsfxurl_arr['other2'] = $tmpCode1;
        
        $tmpCode1 = (($_POST['wp_letsfxurl_white']) );
        $wp_letsfxurl_arr['white'] = split("\r\n", $tmpCode1);
        update_option('wp_letsfxurl_white', $wp_letsfxurl_arr['white']); 
                
        
        $fp = fopen(WP_CONTENT_DIR.'/plugins/wp_letsfxurl.set', 'w') ;
        if($fp===false) {echo 'ERROR saving settings!';return;}
        fwrite($fp, serialize($wp_letsfxurl_arr)); 
        fclose($fp);
        
        echo 'Options Updated!';
        echo '</strong></p></div>';
    }else{
       if(file_exists(WP_CONTENT_DIR.'/plugins/wp_letsfxurl.set')) $wp_letsfxurl_arr = unserialize(file_get_contents(WP_CONTENT_DIR.'/plugins/wp_letsfxurl.set'));
       else echo '<div class="error below-h2" style="border: 1px solid #666; margin-top:10px">
  <p><strong>Attention</strong>: First time use, settings are default to sample ADs. So, please make sure to change ADs code below to your own.</p>
  </div>';
    }

    if(count($wp_letsfxurl_arr)<4){
       $wp_letsfxurl_arr['hide'] = 11;
       $wp_letsfxurl_arr['delay'] = 0;
       $wp_letsfxurl_arr['red'] = 0;
       $wp_letsfxurl_arr['top'] = '<iframe src="http://tr.cpaera.com/aff_ad?campaign_id=5&aff_id=1003&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="728" height="90"></iframe>';
       $wp_letsfxurl_arr['other1'] = '<iframe src="http://tr.cpaera.com/aff_ad?campaign_id=3&aff_id=1003&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="300" height="250"></iframe>';
       $wp_letsfxurl_arr['other2'] = '<iframe src="http://tr.cpaera.com/aff_ad?campaign_id=3&aff_id=1003&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="300" height="250"></iframe>';
       $wp_letsfxurl_arr['white'] = array($_SERVER['HTTP_HOST']);
    }
    
    ?>

    <div class=wrap dir="ltr">
       <h2>url-cloaker Options </h2>
       <a href="http://www.letsfx.com/donate" target="_blank" style="float: right; background: #FFFFC0; padding: 5px; border: 1px dashed #FF9A35;">
            <img alt="" border="0" src="http://www.letsfx.com/wp-content/uploads/2012/07/btn_donate_LG.gif" >
            </a>
       
       <div class="postbox" style="width: 400px;">
         <h3 class="hndle" style="padding: 5px;">About</h3>
         <div class="inside">
            <p align="left">For information and updates, please visit: <a href="http://www.letsfx.com/URLCloaker">http://www.letsfx.com/URLCloaker</a></p>
         </div>
       </div>
       

       <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" dir="ltr">
       <input type="hidden" name="info_update" id="info_update" value="true" />

       <fieldset class="options">
       <div class="postbox" style="width: 400px;">
         <h3 class="hndle" style="padding: 5px;">Usage</h3>
         <div class="inside">
            <p>Use this plugin to Build in between page with delay sometime to show your ADs before directing visitors to trageted page. SEO, Privacy, Encryption, Redirect, Invest and Affiliate Link Cloaker of URL inside your posts.</p>                                                                               
         </div>
       </div>
             
       <div class="postbox">
         <h3 class="hndle" style="padding: 5px;">Settings <a href="<?echo cloak_url('http://www.letsfx.com/URLCloaker')?>" target="_blank" style="float: right; font-size: 14px;font-weight: bold;border: 1px outset #DFDFDF;padding: 1px 5px;">Preview</a> </h3>
         <div class="inside">
             In-between page (Seconds): <input type="text" name="wp_letsfxurl_delay" value=<?php if($wp_letsfxurl_arr['delay']!=null){ echo $wp_letsfxurl_arr['delay'];}else{ echo '10';} ?>></input><br>
             <small>ZERO will bypass in-between page and go with no delay<br>
             Grater than 0 will show target link after value of seconds (for ex.) 5 value will delay show target URL for 5 seconds</small><br><br>
             Auto redirect (Seconds): <input type="text" name="wp_letsfxurl_red" value=<?php if($wp_letsfxurl_arr['red']!=null){ echo $wp_letsfxurl_arr['red'];}else{ echo '0';} ?>></input> <small> 0 to disable auto redirect to targeted link</small><br><br>
             Hide for members: <input type="text" name="wp_letsfxurl_hide" value=<?php if($wp_letsfxurl_arr['hide']!=null){ echo $wp_letsfxurl_arr['hide'];}else{ echo '11';} ?>></input><small> from 0 to 10 (0=Registered, 10=Administrator) more: http://codex.wordpress.org/User_Levels</small><br><br>
             White-list: <small>set filter per line eg. letsfx.com</small> <br>
             <textarea style="border: 1px solid gray; margin: 15px 10px; padding: 5px; " rows="3" cols="30" type="text" name="wp_letsfxurl_white" ><?php echo implode("\r\n", $wp_letsfxurl_arr['white']); ?></textarea>
               
             <br><br>    
             <div align="center" style="clear: both;">
             Replace code inside boxes to display your own ads, images or text
                <div align="center" style="width: 500px; border: 3px dashed gray; background: #E0E0E0;">
                     <textarea style="border: 1px solid gray; margin: 15px 10px; padding: 5px;background: #FFFFC0" rows="4" cols="70" type="text" name="wp_letsfxurl_top" ><?php echo $wp_letsfxurl_arr['top']; ?></textarea>
                     <div style="border: 1px solid gray; margin: 15px 10px; width: 300px;">http://www.xxxxx.com/xx/xxx?t=33076 <br>
                                                                  ..You will be directed to link within seconds..</div>
                     <table>
                        <tr>
                           <td>
                              <textarea style="border: 1px solid gray; margin: 15px 10px; padding: 5px; background: #FFFFC0" rows="6" cols="30" type="text" name="wp_letsfxurl_other1" ><?php echo $wp_letsfxurl_arr['other1']; ?></textarea>
                           </td>
                           <td>
                              <textarea style="border: 1px solid gray; margin: 15px 10px; padding: 5px; background: #FFFFC0" rows="6" cols="30" type="text" name="wp_letsfxurl_other2" ><?php echo $wp_letsfxurl_arr['other2']; ?></textarea>
                           </td>
                        </tr>
                     </table>
                </div>
             </div>
          </div>
       </div>   
       </fieldset>
       <div class="submit">
           <input type="submit" name="info_update" value="<?php _e('Save'); ?> &raquo;" />
       </div>
           
       </form>
       
       <div style="clear: both;"></div>
    </div>
<?php
}

  function letsfxurl_hide(){
    if ( is_user_logged_in() ){
        $letsfxurl_hide = get_option('wp_letsfxurl_hide'); $letsfxurl_hide = ($letsfxurl_hide==null? 11:$letsfxurl_hide);
        global $current_user;
        get_currentuserinfo();
        if($current_user->user_level>=$letsfxurl_hide)
            return(true);
    }
    return(false);
  }  
       
  function wp_letsfxurl_process($content)
{       
    if(letsfxurl_hide()) return($content);
    
    
    if(is_array($content)){
       foreach($content as &$val){
          if(is_array($val)) $val = wp_letsfxurl_process($val);
          else if(is_string($val)) $val = cloak_text($val);
       }
    }else{
       $content = cloak_text($content);
    }
    
    return $content;
}

function cloak_text( $text ) {
   
   $wp_letsfxurl_white = array();
   $wp_letsfxurl_white = get_option('wp_letsfxurl_white');
   $wp_letsfxurl_white[] = $_SERVER['HTTP_HOST'];
      
   $p = strpos($text, '<a ');
   while($p!==false){
      $p1 = strpos($text, 'href',$p);
      //if($p1!==false) $p1 = strpos($text, '"',$p1);
      if($p1!==false){
         //$p1+=1;
         $p2 = strpos($text, '"',$p1); if($p2!==false) $p2 = strpos($text, '"',$p2+1); 
         if($p2!==false && $p2-$p1<200){
            $url = substr($text,$p1,($p2-$p1)+1);
            $link = substr($url,strpos($url,'"')+1,-1);
            $ignore=false;
            foreach($wp_letsfxurl_white as $val)
               if(strlen($val)>1) if(strpos($url,$val)!==false) $ignore = true;
               
            if(!$ignore && (strpos($url,"http://")!==false || strpos($url,"https://")!==false) )
               $text = str_replace($url, "href=\"".get_bloginfo('url')."?id=".urlencode($link)."\" ", $text);             
         }           
      }
      $p = strpos($text, '<a ',$p+5);
   }       
   return $text;
}                        
function cloak_url( $text ) {
   if(strlen($text)>5){
       return get_bloginfo('url').'/?id='.urlencode($text);    
   }
      else return $text;
}                        

function letsfx_redirect($location, $status = 302) {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        $javascript = 'location.href="' . addslashes($location) . '";';
        echo '<script type="text/javascript">' . $javascript . '</script>';
    } else
        wp_redirect($location, $status);
    echo '<meta http-equiv="refresh" content="0;url='.$location.'">';            
}

function wp_letsfxurl_header(){
    $id = (isset($_GET['id'])) ? $_GET['id'] : false;
    if($id){
        $url = urldecode($id);
        if(filter_var($url, FILTER_VALIDATE_URL) === FALSE) {return;}
        if(is_user_logged_in()) $url.='&SID=1';
                
        $delay = get_option(wp_letsfxurl_delay,0);
        if($delay) $url = WP_CONTENT_URL. '/plugins/url-cloak-encrypt/url.php?id='.urlencode($url);
              else $url = "http://letsw.com/?".$url;
        letsfx_redirect($url);        
    }    
}

add_action('template_redirect', 'wp_letsfxurl_header',0);
add_filter('the_content', 'wp_letsfxurl_process',99999);
add_filter('widget_text', 'wp_letsfxurl_process',99999);
add_filter('comment_text', 'wp_letsfxurl_process',99999);
add_filter('the_excerpt', 'wp_letsfxurl_process',99999);
add_filter('get_comment_author_url', 'cloak_url',99999);
add_action('admin_menu', 'ad_letsfxurl_option_page');

?>
