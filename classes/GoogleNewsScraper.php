<?php

class GoogleNewsScraper extends Scraper {

  function name() {
    return "Google News";
  }

  function scrape($query) {
    $page = scrape_page("http://news.google.com/news?um=1&ned=us&hl=en&output=atom&q=" . urlencode($query));

    $doc = new SimpleXmlElement($page, LIBXML_NOCDATA);
    
    return $doc->entry;
  }
  
  function showResult($result) {
    echo "<li><p><a href='" . $result->link['href'] . "'>" . $result->title . "</a></p><p><small>" . $result->modified . "</small></p></li>";
  }

}

?>
