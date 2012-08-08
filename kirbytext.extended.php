<?php

class kirbytextExtended extends kirbytext {

  function __construct($text, $markdown=true) {
  
    parent::__construct($text, $markdown);
    $this->addTags('minigallery');
    $this->addAttributes('crop', 'quality', 'titles', 'rel', 'fancybox');
  
  }

  function minigallery($params) {
    
    /**
     * Default values set them to your preferences.
    **/
    $defaults = array(
      'width'    => 200,
      'height'   => 200,
      'crop'     => false,
      'quality'  => 100,
      'rel'      => "gallery",  // if you want to create several different galleries on one page, you must specify a different relation
      'titles'   => "",         // image titles seperated with | 
      'fancybox' => "true"      // should there be a link to the original?
    );

    global $site;

    $options = array_merge($defaults, $params);
    $files = $params['minigallery'];
    $titles = $options['titles'];
    $fancybox = $options['fancybox'];
    $page    = ($this->obj) ? $this->obj : $site->pages()->active();

    // explode images and titles
    $filesArr = explode("|", $files);
    $titlesArr = explode("|", $titles);

    // html output 
    $output  = "<section class=\"minigallery\">";

    foreach ($filesArr as $key => $img) {
      $currentImage =  $page->images()->find($img);

      if ($fancybox == "true") {
        $output .= "<a href=\"".$currentImage->url()."\" class=\"fancybox\" rel=\"".$options['rel']."\""; 

        // is there a title?
        if (count($titlesArr) > 0 && isset($titlesArr[$key]) && $titlesArr[$key] != "")
           $output .=" title= \"".$titlesArr[$key]."\" ";

        $output .= ">";
      }


      // call thumb method
      $output .= thumb($currentImage, array( 
                                        'width'   => $options['width'], 
                                        'height'  => $options['height'],
                                        'crop'    => $options['crop'], 
                                        'quality' => $options['quality']
                                     ));
      if ($fancybox)
        $output .= "</a>";
    }

    $output .= "</section>";

    return $output;
  }

}

?>