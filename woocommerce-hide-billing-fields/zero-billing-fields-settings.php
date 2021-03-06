<?php 
function woohide_billing_fields( $fields ) {
	global $woocommerce;

  if( get_option( 'wcbilling_hide_zerototal' ) == "no"){ 
  	// if the total is more than 0 then we still need the fields
  	if ( 0 != $woocommerce->cart->total ) {
  		return $fields;
  	}
  };

  if( get_option( 'wcbilling_hide_shippingrequired' ) == "no"){ 
  	// return the regular billing fields if we need shipping fields
  	if ( $woocommerce->cart->needs_shipping() ) {
  		return $fields;
  	}
  };


  // we don't need the billing fields so empty all of them except the email

  if( get_option( 'wcbilling_hide_country' ) == "yes"){ unset( $fields['billing_country']); };
  if(get_option( 'wcbilling_hide_fn' ) == "yes"){unset( $fields['billing_first_name'] );}
  if(get_option( 'wcbilling_hide_ln' ) == "yes"){unset( $fields['billing_last_name'] );}
  if(get_option( 'wcbilling_hide_company' ) == "yes"){unset( $fields['billing_company'] );}
  if(get_option( 'wcbilling_hide_address1' ) == "yes"){unset( $fields['billing_address_1'] );}
  if(get_option( 'wcbilling_hide_address2' ) == "yes"){unset( $fields['billing_address_2'] );}
  if(get_option( 'wcbilling_hide_city' ) == "yes"){unset( $fields['billing_city'] );}
  if(get_option( 'wcbilling_hide_state' ) == "yes"){unset( $fields['billing_state'] );}
  if(get_option( 'wcbilling_hide_postcode' ) == "yes"){unset( $fields['billing_postcode'] );}
  if(get_option( 'wcbilling_hide_email' ) == "yes"){unset( $fields['billing_email'] );}
  if(get_option( 'wcbilling_hide_phone' ) == "yes"){unset( $fields['billing_phone'] );}
	return $fields;
}
add_filter( 'woocommerce_billing_fields', 'woohide_billing_fields', 20 );
?>