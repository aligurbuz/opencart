<?php 

$language_id = 2;
foreach($data['languages'] as $language) {
	if($language['language_id'] != 1) {
		$language_id = $language['language_id'];
	}
}

$output = array();
$output["faq_module"] = array (
  'items' => 
  array (
    1 => 
    array (
      'question' => 
      array (
        1 => 'How long does delivery take?',
        $language_id => 'How long does delivery take?',
      ),
      'answer' => 
      array (
        1 => '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur enim ac rhoncus tempor. Suspendisse porta lorem vitae porttitor porta. Mauris massa tellus, finibus volutpat eros in, ultrices porttitor augue. Fusce aliquam tincidunt rhoncus. Cras non ultricies risus. Vivamus fermentum vulputate eros, eget efficitur tellus vehicula et. Integer at vehicula nisl, nec sodales neque. Nunc tincidunt posuere dui, et consectetur felis consequat elementum. Duis sodales urna non erat gravida, non pharetra dolor iaculis. Morbi imperdiet facilisis elementum. Nunc sagittis enim sapien, sit amet posuere magna facilisis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus.&lt;br&gt;&lt;/p&gt;',
        $language_id => '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur enim ac rhoncus tempor. Suspendisse porta lorem vitae porttitor porta. Mauris massa tellus, finibus volutpat eros in, ultrices porttitor augue. Fusce aliquam tincidunt rhoncus. Cras non ultricies risus. Vivamus fermentum vulputate eros, eget efficitur tellus vehicula et. Integer at vehicula nisl, nec sodales neque. Nunc tincidunt posuere dui, et consectetur felis consequat elementum. Duis sodales urna non erat gravida, non pharetra dolor iaculis. Morbi imperdiet facilisis elementum. Nunc sagittis enim sapien, sit amet posuere magna facilisis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus.&lt;br&gt;&lt;/p&gt;',
      ),
      'section_id' => '561fd603a03f3',
      'order' => '1',
    ),
    2 => 
    array (
      'question' => 
      array (
        1 => 'How do I pay?',
        $language_id => 'How do I pay?',
      ),
      'answer' => 
      array (
        1 => '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur enim ac rhoncus tempor. Suspendisse porta lorem vitae porttitor porta. Mauris massa tellus, finibus volutpat eros in, ultrices porttitor augue. Fusce aliquam tincidunt rhoncus. Cras non ultricies risus. Vivamus fermentum vulputate eros, eget efficitur tellus vehicula et. Integer at vehicula nisl, nec sodales neque. Nunc tincidunt posuere dui, et consectetur felis consequat elementum. Duis sodales urna non erat gravida, non pharetra dolor iaculis. Morbi imperdiet facilisis elementum. Nunc sagittis enim sapien, sit amet posuere magna facilisis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus.&lt;br&gt;&lt;/p&gt;',
        $language_id => '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur enim ac rhoncus tempor. Suspendisse porta lorem vitae porttitor porta. Mauris massa tellus, finibus volutpat eros in, ultrices porttitor augue. Fusce aliquam tincidunt rhoncus. Cras non ultricies risus. Vivamus fermentum vulputate eros, eget efficitur tellus vehicula et. Integer at vehicula nisl, nec sodales neque. Nunc tincidunt posuere dui, et consectetur felis consequat elementum. Duis sodales urna non erat gravida, non pharetra dolor iaculis. Morbi imperdiet facilisis elementum. Nunc sagittis enim sapien, sit amet posuere magna facilisis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus.&lt;br&gt;&lt;/p&gt;',
      ),
      'section_id' => '561fd603a03f3',
      'order' => '1',
    ),
    3 => 
    array (
      'question' => 
      array (
        1 => 'How much is the shipping?',
        $language_id => 'How much is the shipping?',
      ),
      'answer' => 
      array (
        1 => '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur enim ac rhoncus tempor. Suspendisse porta lorem vitae porttitor porta. Mauris massa tellus, finibus volutpat eros in, ultrices porttitor augue. Fusce aliquam tincidunt rhoncus. Cras non ultricies risus. Vivamus fermentum vulputate eros, eget efficitur tellus vehicula et. Integer at vehicula nisl, nec sodales neque. Nunc tincidunt posuere dui, et consectetur felis consequat elementum. Duis sodales urna non erat gravida, non pharetra dolor iaculis. Morbi imperdiet facilisis elementum. Nunc sagittis enim sapien, sit amet posuere magna facilisis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus.&lt;br&gt;&lt;/p&gt;',
        $language_id => '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur enim ac rhoncus tempor. Suspendisse porta lorem vitae porttitor porta. Mauris massa tellus, finibus volutpat eros in, ultrices porttitor augue. Fusce aliquam tincidunt rhoncus. Cras non ultricies risus. Vivamus fermentum vulputate eros, eget efficitur tellus vehicula et. Integer at vehicula nisl, nec sodales neque. Nunc tincidunt posuere dui, et consectetur felis consequat elementum. Duis sodales urna non erat gravida, non pharetra dolor iaculis. Morbi imperdiet facilisis elementum. Nunc sagittis enim sapien, sit amet posuere magna facilisis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus.&lt;br&gt;&lt;/p&gt;',
      ),
      'section_id' => '561fd603a03f3',
      'order' => '2',
    ),
    4 => 
    array (
      'question' => 
      array (
        1 => 'When will I receive my refund?',
        $language_id => 'When will I receive my refund?',
      ),
      'answer' => 
      array (
        1 => '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur enim ac rhoncus tempor. Suspendisse porta lorem vitae porttitor porta. Mauris massa tellus, finibus volutpat eros in, ultrices porttitor augue. Fusce aliquam tincidunt rhoncus. Cras non ultricies risus. Vivamus fermentum vulputate eros, eget efficitur tellus vehicula et. Integer at vehicula nisl, nec sodales neque. Nunc tincidunt posuere dui, et consectetur felis consequat elementum. Duis sodales urna non erat gravida, non pharetra dolor iaculis. Morbi imperdiet facilisis elementum. Nunc sagittis enim sapien, sit amet posuere magna facilisis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus.&lt;br&gt;&lt;/p&gt;',
        $language_id => '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur enim ac rhoncus tempor. Suspendisse porta lorem vitae porttitor porta. Mauris massa tellus, finibus volutpat eros in, ultrices porttitor augue. Fusce aliquam tincidunt rhoncus. Cras non ultricies risus. Vivamus fermentum vulputate eros, eget efficitur tellus vehicula et. Integer at vehicula nisl, nec sodales neque. Nunc tincidunt posuere dui, et consectetur felis consequat elementum. Duis sodales urna non erat gravida, non pharetra dolor iaculis. Morbi imperdiet facilisis elementum. Nunc sagittis enim sapien, sit amet posuere magna facilisis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus.&lt;br&gt;&lt;/p&gt;',
      ),
      'section_id' => '561fd603a03f3',
      'order' => '2',
    ),
    5 => 
    array (
      'question' => 
      array (
        1 => 'What is 3D secure',
        $language_id => 'What is 3D secure',
      ),
      'answer' => 
      array (
        1 => '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur enim ac rhoncus tempor. Suspendisse porta lorem vitae porttitor porta. Mauris massa tellus, finibus volutpat eros in, ultrices porttitor augue. Fusce aliquam tincidunt rhoncus. Cras non ultricies risus. Vivamus fermentum vulputate eros, eget efficitur tellus vehicula et. Integer at vehicula nisl, nec sodales neque. Nunc tincidunt posuere dui, et consectetur felis consequat elementum. Duis sodales urna non erat gravida, non pharetra dolor iaculis. Morbi imperdiet facilisis elementum. Nunc sagittis enim sapien, sit amet posuere magna facilisis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus.&lt;br&gt;&lt;/p&gt;',
        $language_id => '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur enim ac rhoncus tempor. Suspendisse porta lorem vitae porttitor porta. Mauris massa tellus, finibus volutpat eros in, ultrices porttitor augue. Fusce aliquam tincidunt rhoncus. Cras non ultricies risus. Vivamus fermentum vulputate eros, eget efficitur tellus vehicula et. Integer at vehicula nisl, nec sodales neque. Nunc tincidunt posuere dui, et consectetur felis consequat elementum. Duis sodales urna non erat gravida, non pharetra dolor iaculis. Morbi imperdiet facilisis elementum. Nunc sagittis enim sapien, sit amet posuere magna facilisis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus.&lt;br&gt;&lt;/p&gt;',
      ),
      'section_id' => '561fd603a0400',
      'order' => '3',
    ),
    6 => 
    array (
      'question' => 
      array (
        1 => 'What countries do you ship to?',
        $language_id => 'What countries do you ship to?',
      ),
      'answer' => 
      array (
        1 => '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur enim ac rhoncus tempor. Suspendisse porta lorem vitae porttitor porta. Mauris massa tellus, finibus volutpat eros in, ultrices porttitor augue. Fusce aliquam tincidunt rhoncus. Cras non ultricies risus. Vivamus fermentum vulputate eros, eget efficitur tellus vehicula et. Integer at vehicula nisl, nec sodales neque. Nunc tincidunt posuere dui, et consectetur felis consequat elementum. Duis sodales urna non erat gravida, non pharetra dolor iaculis. Morbi imperdiet facilisis elementum. Nunc sagittis enim sapien, sit amet posuere magna facilisis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus.&lt;br&gt;&lt;/p&gt;',
        $language_id => '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur enim ac rhoncus tempor. Suspendisse porta lorem vitae porttitor porta. Mauris massa tellus, finibus volutpat eros in, ultrices porttitor augue. Fusce aliquam tincidunt rhoncus. Cras non ultricies risus. Vivamus fermentum vulputate eros, eget efficitur tellus vehicula et. Integer at vehicula nisl, nec sodales neque. Nunc tincidunt posuere dui, et consectetur felis consequat elementum. Duis sodales urna non erat gravida, non pharetra dolor iaculis. Morbi imperdiet facilisis elementum. Nunc sagittis enim sapien, sit amet posuere magna facilisis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus.&lt;br&gt;&lt;/p&gt;',
      ),
      'section_id' => '561fd603a0400',
      'order' => '3',
    ),
    7 => 
    array (
      'question' => 
      array (
        1 => 'Can I return an item',
        $language_id => 'Can I return an item',
      ),
      'answer' => 
      array (
        1 => '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur enim ac rhoncus tempor. Suspendisse porta lorem vitae porttitor porta. Mauris massa tellus, finibus volutpat eros in, ultrices porttitor augue. Fusce aliquam tincidunt rhoncus. Cras non ultricies risus. Vivamus fermentum vulputate eros, eget efficitur tellus vehicula et. Integer at vehicula nisl, nec sodales neque. Nunc tincidunt posuere dui, et consectetur felis consequat elementum. Duis sodales urna non erat gravida, non pharetra dolor iaculis. Morbi imperdiet facilisis elementum. Nunc sagittis enim sapien, sit amet posuere magna facilisis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus.&lt;br&gt;&lt;/p&gt;',
        $language_id => '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur enim ac rhoncus tempor. Suspendisse porta lorem vitae porttitor porta. Mauris massa tellus, finibus volutpat eros in, ultrices porttitor augue. Fusce aliquam tincidunt rhoncus. Cras non ultricies risus. Vivamus fermentum vulputate eros, eget efficitur tellus vehicula et. Integer at vehicula nisl, nec sodales neque. Nunc tincidunt posuere dui, et consectetur felis consequat elementum. Duis sodales urna non erat gravida, non pharetra dolor iaculis. Morbi imperdiet facilisis elementum. Nunc sagittis enim sapien, sit amet posuere magna facilisis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus.&lt;br&gt;&lt;/p&gt;',
      ),
      'section_id' => '561fd603a0400',
      'order' => '4',
    ),
    8 => 
    array (
      'question' => 
      array (
        1 => 'Why can I not pay by voice',
        $language_id => 'Why can I not pay by voice',
      ),
      'answer' => 
      array (
        1 => '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur enim ac rhoncus tempor. Suspendisse porta lorem vitae porttitor porta. Mauris massa tellus, finibus volutpat eros in, ultrices porttitor augue. Fusce aliquam tincidunt rhoncus. Cras non ultricies risus. Vivamus fermentum vulputate eros, eget efficitur tellus vehicula et. Integer at vehicula nisl, nec sodales neque. Nunc tincidunt posuere dui, et consectetur felis consequat elementum. Duis sodales urna non erat gravida, non pharetra dolor iaculis. Morbi imperdiet facilisis elementum. Nunc sagittis enim sapien, sit amet posuere magna facilisis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus.&lt;br&gt;&lt;/p&gt;',
        $language_id => '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur enim ac rhoncus tempor. Suspendisse porta lorem vitae porttitor porta. Mauris massa tellus, finibus volutpat eros in, ultrices porttitor augue. Fusce aliquam tincidunt rhoncus. Cras non ultricies risus. Vivamus fermentum vulputate eros, eget efficitur tellus vehicula et. Integer at vehicula nisl, nec sodales neque. Nunc tincidunt posuere dui, et consectetur felis consequat elementum. Duis sodales urna non erat gravida, non pharetra dolor iaculis. Morbi imperdiet facilisis elementum. Nunc sagittis enim sapien, sit amet posuere magna facilisis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus.&lt;br&gt;&lt;/p&gt;',
      ),
      'section_id' => '561fd603a0400',
      'order' => '4',
    ),
  ),
  'sections' => 
  array (
    1 => 
    array (
      'id' => '561fd603a03f3',
      'title' => 
      array (
        1 => 'Payments',
        $language_id => 'Payments',
      ),
      'hidden' => '1',
      'order' => '1',
    ),
    2 => 
    array (
      'id' => '561fd603a0400',
      'title' => 
      array (
        1 => 'Order &amp; Delivery',
        $language_id => 'Order &amp; Delivery',
      ),
      'hidden' => '1',
      'order' => '2',
    ),
  ),
  'settings' => 
  array (
    'collapse' => '1',
  ),
); 

$this->model_setting_setting->editSetting( "faq", $output );	

?>