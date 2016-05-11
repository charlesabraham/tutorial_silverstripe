<?php

class HomePage extends Page {

}

class HomePage_Controller extends Page_Controller {


public function LatestPlayers($count = 3) { 
    return Player::get()
               ->sort('Created', 'DESC')
               ->limit($count);
  } 

public function FeaturedProperties() {
        return Property::get()
                ->filter(array(
                    'FeaturedOnHomepage' => true
                ))
                ->limit(6);
    }   


}
