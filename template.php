<?php

/* 
 * Implements hook_preprocess_html().
 */
function spirit_preprocess_html(&$variables, $hook) {
  // If the content type is 'blog' then remove any 
  $node = menu_get_object();
  if ($node && $node->type == 'blog') {
    if ($key = array_search('has-banner', $variables['classes_array'])) {
      unset($variables['classes_array'][$key]);
    }
  }
}

/**
 * Implements hook_form_alter().
 * Changes to search.
 */
// change the name of your form alter
function spirit_form_alter(&$form, &$form_state, $form_id) {
	
		// search--navigation 
	if ($form_id == 'search_api_page_search_form_site_search') {
	$form['#prefix'] = '<div id="navigation-search" class="search search--navigation u-clearfix"><div class="search__wrapper wrapper"><h3 class="search__title" id="site-search-tile">Site Search</h3>';
  	$form['#suffix'] = '</div></div>';
    //unset($form['search_api_page_search_form_site_search']['#title_display']);
    $form['#attributes'] = array('class' => array('search__search-form', 'search-form'), 'role' => array('search'), 'aria-labelledby'=> array('site-search-tile'));
    $form['keys_1']['#title_display'] = 'before';
    $form['keys_1']['#title_class'] = 'search-form__label';
    $form['keys_1']['#title'] = t('Enter keywords to search the site');
    $form['keys_1']['#attributes']['size'] = '12';
	// SH 25-01-16 remove placeholder in shelterbox as lable is being shown for search. 
    $form['keys_1']['#attributes']['placeholder'] = 'Search';
    //$form['keys_1']['#prefix'] = '<fieldset class="search-form__fieldset"><legend class="visually-hidden"><h3 class="search-form__legend ">Site Search</h3></legend>';
    //$form['keys_1']['#suffix'] = '</fieldset>';  
    
  }
  
  /*if ($form_id == 'search-api-page-search-form') {
    unset($form['search-api-page-search-form']['#title_display']);
    //unset($form['search_block_form']['#attributes']['placeholder']);
    $form['#attributes'] = array('class' => array('search__search-form', 'search-form'), 'role' => array('search'));
    $form['search-api-page-search-form']['#attributes']['size'] = '12';
    $form['search-api-page-search-form']['#prefix'] = '<fieldset class="search-form__fieldset"><legend class="visually-hidden"><h3 class="search-form__legend ">Site Search</h3></legend>';
    $form['search-api-page-search-form']['#suffix'] = '</fieldset>';
  }*/
  
  // Search--page
  if ($form_id == 'search_api_page_search_form') {
    unset($form['search_api_page_search_form']['#title_display']);
	$form['#prefix'] = '<div id="main-search" class="search search--page u-clearfix"><div class="search__wrapper wrapper">';
  	$form['#suffix'] = '</div></div>';
	 $form['#attributes'] = array('class' => array('search__search-form', 'search-form'), 'role' => array('search'));
	/* not working? 
	//$form['keys']['#prefix'] = '<fieldset class="search-form__fieldset"><legend class="u-visually-hidden"><h3 class="search-form__legend">Site Search</h3></legend>';
    //$form['keys']['#suffix'] = '</fieldset>';  
   	//$form['#attributes'] = array('class' => array('search__search-form', 'search-form'), 'role' => array('search'));
    //$form['keys_1']['#title_display'] = 'invisible';
    //$form['keys']['#title_class'] = 'search-form__label';
    //$form['keys']['#title'] = t('Search this site');
    //$form['keys']['#attributes']['size'] = '12';*/
	$form['keys_1']['#attributes']['placeholder'] = 'Search';
  }

  	//mailchimp form in the footers 
    if ($form_id == 'mailchimp_signup_subscribe_block_sign_up_to_our_mailing_list_form' || $form_id == 'webform_client_form_408') {
		$form['#attributes'] = array('class' => array('form--newsletter', 'o-grid', 'grid--4up', 'grid--gutter'));
		unset($form['mergevars']['#prefix']);
		unset($form['mergevars']['#suffix']);
		$form['mergevars']['EMAIL']['#wrapper_class'] = array('o-grid__item');
		$form['mergevars']['FNAME']['#wrapper_class'] = array('o-grid__item');
		$form['mergevars']['LNAME']['#wrapper_class'] = array('o-grid__item');
		$form['actions']['#attributes'] = array('class' => array('o-grid__item'));
	}
	
	//user forms
	//user login
  if ($form_id == 'user_login') {
	  $form['#prefix'] = '<div class="section__hgroup hgroup"><h2 class="subtitle subtitle--lg">Please login</h2></div>';
  }
  // user password
   if ($form_id == 'user_pass') {
	  $form['#prefix'] = '<div class="section__hgroup hgroup"><h2 class="subtitle subtitle--lg">Find your password</h2></div>';
	  
  }
}

/**
 * Implements template_preprocess_entity().
 */
function spirit_preprocess_entity(&$variables) {
	
	//Added by Sonia on 24-7-17 to pick up paragraph template in women theme.
	$entity = $variables['elements']['#entity'];
	$entity_type = $variables['elements']['#entity_type'];
	list(, , $bundle) = entity_extract_ids($entity_type, $entity);
	
	// Add suggestions.
  $variables['theme_hook_suggestions'][] = $entity_type . '__' . $bundle;
	
	
	if($variables['paragraphs_item']->field_name == 'field_paragraph_button'){
		
		$buttonUrl = $variables['paragraphs_item']->field_button['und'][0]['url'];
		
		if($buttonUrl){
			$urlSplit = parse_url($buttonUrl);
			
			if(trim($urlSplit['host']) == 'www.universe.com'){
				drupal_add_js('https://www.universe.com/embed2.js', 'external');
			}
		}
	}
}

function spirit_fieldset($variables) {
  $element = $variables['element'];
  element_set_attributes($element, array('id'));
  _form_set_class($element, array('form-wrapper'));

  $output = '<fieldset' . drupal_attributes($element['#attributes']) . '>';
  if (!empty($element['#title'])) {
    // Always wrap fieldset legends in a SPAN for CSS positioning.
		
		if(in_array('fieldset--step-1', $element['#attributes']['class']) && in_array('tab-interface__fieldset', $element['#attributes']['class'])){
			
			$extraClass = 'tab-interface__panel-child';
		}
		else{
			$extraClass = "";
		}
		
    $output .= '<legend><span class="fieldset__legend '.$extraClass.'">' . $element['#title'] . '</span></legend>';
  }
  $output .= '<div class="fieldset__wrapper">';
  if (!empty($element['#description'])) {
    $output .= '<div class="fieldset__description">' . $element['#description'] . '</div>';
  }
  $output .= $element['#children'];
  if (isset($element['#value'])) {
    $output .= $element['#value'];
  }
  $output .= '</div>';
  $output .= "</fieldset>\n";
  return $output;
}