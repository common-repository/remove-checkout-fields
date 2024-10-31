<?php
/*
** adding necessarey files
*/
function RemoveCheckoutFieldsAdminFiles() {
    wp_enqueue_style('RemoveCheckoutFieldsAdminFilesMainStyle', plugins_url('/css/style.css', __FILE__));
    wp_enqueue_style('RemoveCheckoutFieldsAdminFilesFontAwesome', plugins_url('/font-awesome/css/font-awesome.min.css', __FILE__));
    wp_enqueue_script('RemoveCheckoutFieldsAjaxPost', plugins_url('/js/logic.js',__FILE__ ));
     wp_localize_script('RemoveCheckoutFieldsAjaxPost', 'ajax_var', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax-nonce')
    ));
}
add_action('admin_enqueue_scripts', 'RemoveCheckoutFieldsAdminFiles');
add_action('wp_ajax_nopriv_RemoveCheckoutFieldsAjaxPost', 'RemoveCheckoutFieldsAjaxPost');    
add_action('wp_ajax_RemoveCheckoutFieldsAjaxPost', 'RemoveCheckoutFieldsAjaxPost');
/*Theme customize */
add_action( 'admin_menu', 'RemoveCheckoutFieldsAdminPage' );
/**
 * Adds a new settings page under Setting menu
*/
function RemoveCheckoutFieldsAdminPage() {
    add_options_page( __( 'Remove Checkout fields' ), __( 'Remove Checkout fields' ), 'manage_options', 'RemoveCheckoutFieldsAdminMainPage', 'RemoveCheckoutFieldsAdminPageDisplay' );
}
/**
* Tabs Method 
*/
function RemoveCheckoutFieldsAdminTabs( $current = 'first' ) {
    $tabs = array(
        'first'   => __( 'Shipping address', 'plugin-textdomain' ), 
        );
    $html = '<h2 class="wooLiveSalenav-tabnav-tab-wrapper">';
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $current ) ? 'nav-tab-active' : '';
        $html .= '<a class="nav-tab ' . esc_html($class) . '" href="?page=RemoveCheckoutFieldsAdminMainPage&tab=' . esc_html($tab) . '">' . esc_html($name) . '</a>';
    }
    $html .= '</h2>';
    echo $html ;
}
function RemoveCheckoutFieldsAdminPageDisplay(){
    ?>
    <div class="cont-p-dashboard">
        <div class="post_like_dislike_header wrap">Dashboard<span>Contact me for further customization, start from $5. 
            <a href="https://www.fiverr.com/aliali44">Contact</a>
        </span>
    </div>
    <?php
    // ================== Tabs ========================//
     $tab = ( ! empty( $_GET['tab'] ) ) ? esc_attr( $_GET['tab'] ) : 'first';
    RemoveCheckoutFieldsAdminTabs( $tab )
     ?>
     <?php
       global $wpdb;
        $tableName = $wpdb->prefix . 'checkout_remove';
        $result = $wpdb->get_results( "SELECT * FROM $tableName");         
        foreach ( $result as $print )   {
               $userfName  =  sanitize_text_field($print->fName);
            $userfName  =  trim($userfName);
            $userlName  =  sanitize_text_field($print->lName);
            $userlName  =  trim($userlName);
          $usercompany  =  sanitize_text_field($print->company);
          $usercompany  =  trim($usercompany );
            $useraddr1  =  sanitize_text_field($print->addr1);
            $useraddr1  =  trim($useraddr1);
           $useraddr2   =  sanitize_text_field($print->addr2);
            $useraddr2  =  trim($useraddr2);
             $usercity  =  sanitize_text_field($print->city);
              $usercity =  trim($usercity);
          $userzipcode  = sanitize_text_field ($print->zipcode);
          $userzipcode  =  trim($userzipcode);
         $usercountry   = sanitize_text_field($print->country);
           $usercountry =  trim($usercountry);
            $userstate  = sanitize_text_field($print->state);
            $userstate  =  trim($userstate);
            $userphone  = sanitize_text_field($print->phone);
             $userphone =  trim($userphone);
            $useremail  = sanitize_text_field($print->email);
            $useremail  =  trim($useremail);
             $usernotes = sanitize_text_field($print->notes); 
            $usernotes  =  trim($usernotes);  
}
?>
</div>
       <div class="Remove_info">
        <form id="form_1" method="POST"  action="admin.php">

        <div class="row1">
            <label>First Name</label>
            <?php if ($userfName=="0"): ?>
                <input type="checkbox" name="fname" class="f_name" value="first_name"> 
            <?php else: ?>
                <input type="checkbox" name="fname" class="f_name" value="first_name" checked=""> 
                 <?php endif ?>   
        </div>
         <div class="row1">
            <label>Last Name</label>
             <?php if ($userlName=="0"): ?>
               <input type="checkbox" name="lname" class="l_name" value="last_name">
            <?php else: ?>
                <input type="checkbox" name="lname" class="l_name" value="last_name" checked="">
                 <?php endif ?>    
        </div>
        <div class="row1">
            <label>Company</label>
            <?php if ($usercompany=="0"): ?>
               <input type="checkbox" name="Company" value="Com_pany" >
            <?php else: ?>
                <input type="checkbox" name="Company" value="Com_pany" checked="">
                 <?php endif ?>   
        </div>
        <div class="row1">
            <label>Address 1</label>
              <?php if ($useraddr1=="0"): ?>
               <input type="checkbox" name="addr1" value="address_1">
            <?php else: ?>
                <input type="checkbox" name="addr1" value="address_1" checked="">
                 <?php endif ?>
              </div>
        <div class="row1">
            <label>Address 2</label>
            <?php if ($useraddr2=="0"): ?>
               <input type="checkbox" name="addr2" value="address_2">
            <?php else: ?>
                <input type="checkbox" name="addr2" value="address_2" checked="">
                 <?php endif ?>
        </div>
        <div class="row1">
            <label>City</label>
              <?php if ($usercity=="0"): ?>
              <input type="checkbox" name="city" value="city_1">
            <?php else: ?>
                <input type="checkbox" name="city" value="city_1" checked="">
                 <?php endif ?>    
       </div>
         <div class="row1">
            <label>Post/Zip Code</label>
                  <?php if ($userzipcode=="0"): ?>
             <input type="checkbox" name="zipcode" value="zip_code">
            <?php else: ?>
               <input type="checkbox" name="zipcode" value="zip_code" checked="">
                 <?php endif ?>
      </div>
        <div class="row1">
            <label>Country/region</label>
            <?php if ($usercountry=="0"): ?>
            <input type="checkbox" name="country" value="country_1">
            <?php else: ?>
              <input type="checkbox" name="country" value="country_1" checked="">
                <?php endif ?>  
                  </div>
         <div class="row1">
             <label>State/County</label>
              <?php if ($userstate=="0"): ?>
             <input type="checkbox" name="state" value="stat_county">
            <?php else: ?>
             <input type="checkbox" name="state" value="stat_county" checked="">
                 <?php endif ?>
             </div>
         <div class="row1">
            <label>Phone</label>
                <?php if ($userphone=="0"): ?>
            <input type="checkbox" name="phone" value="phone_client">
            <?php else: ?>
            <input type="checkbox" name="phone" value="phone_client" checked="">
                 <?php endif ?>    
        </div>
         <div class="row1">
            <label>Email</label>
              <?php if ($useremail=="0"): ?>
          <input type="checkbox" name="email" value="email_client">
            <?php else: ?>
          <input type="checkbox" name="email" value="email_client" checked="">
                 <?php endif ?>   
        </div>
        <div class="row1">
            <label>Notes</label>
              <?php if ($usernotes=="0"): ?>
          <input type="checkbox" name="notes" value="notes_client">
            <?php else: ?>
        <input type="checkbox" name="notes" value="notes_client" checked="">
                 <?php endif ?>    
        </div>
          <div class="row-btn">
        <button class="btn" type="button" name="btn_sub">Submit</button>
           </div>
    </form>
        </div>
        <?php 
    }
add_action('wp_ajax_rcf_update_setting', 'RemoveCheckoutFields_ajax_post');
function RemoveCheckoutFields_ajax_post(){
    //check nonce
    $nonce = trim(sanitize_text_field( $_POST['nonce'] ));
    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Busted!'); 
    ?>
    <?php
    // use global variable for database opertation
    global $wpdb;
    // assign value that pass from form 
    $user_fName    =    sanitize_text_field($_POST['fname']);
     $user_fName   =    trim($user_fName);
    $user_lName     =    sanitize_text_field($_POST['lname']);
    $user_lName     =    trim($user_lName);
    $user_Company   =    sanitize_text_field($_POST['Company']);
    $user_Company   =    trim($user_Company);
    $user_addr1     =    sanitize_text_field($_POST['addr1']);
    $user_addr1     =    trim($user_addr1);
    $user_addr2     =    sanitize_text_field($_POST['addr2']);
    $user_addr2     =    trim($user_addr2);
    $user_city      =    sanitize_text_field($_POST['city']);
    $user_city      =    trim($user_city);
    $user_zipcode   =    sanitize_text_field($_POST['zipcode']);
    $user_zipcode   =    trim($user_zipcode);
    $user_country   =    sanitize_text_field($_POST['country']);
    $user_country   =    trim($user_country );
    $user_state     =    sanitize_text_field($_POST['state']);
    $user_state     =    trim($user_state);
    $user_phone     =    sanitize_text_field($_POST['phone']);
    $user_phone     =   trim($user_phone);
    $user_email     =    sanitize_text_field($_POST['email']);
    $user_email     =    trim($user_email);
    $user_notes     =    sanitize_text_field($_POST['notes']); 
    $user_notes     =    trim($user_notes);
    // call Update method of wpdb for  update values
 $table_name = $wpdb->prefix . 'checkout_remove';
 $wpdb->query("UPDATE $table_name SET fName='$user_fName', lName = '$user_lName', company = '$user_Company' , addr1 = '$user_addr1', addr2 = '$user_addr2', city = '$user_city', zipcode = '$user_zipcode', country = '$user_country', state = '$user_state', phone = '$user_phone', email = '$user_email', notes = '$user_notes' WHERE id='1'");
 echo esc_html('1');
exit();
}