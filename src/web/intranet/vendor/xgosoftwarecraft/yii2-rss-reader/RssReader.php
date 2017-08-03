<?php

namespace xgosoftwarecraft\RssFeed;

class RssReader {

    /**
     * @var array
     */
    private $sources;

    /**
     * @var array
     */
    public $items = array();

    public function read($sources) {
        $this->sources = $sources;

        foreach ($sources as $sc => $au) {
            $xml = simplexml_load_file($sc);

            foreach ($xml->xpath('//item') as $item) {
                $item->author = $au;
                array_push($this->items, $item);
            }
        }
        usort($this->items, function($a, $b) {
            return strtotime($b->pubDate) - strtotime($a->pubDate);
        });
    }

}
