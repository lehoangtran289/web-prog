<?php

    class Page {
        private $page;
        private $title;
        private $year;
        private $copyRight;

        public function __construct($title, $year, $copyRight) {
            $this->title = $title;
            $this->year = $year;
            $this->copyRight = $copyRight;
            $this->page = "
                <!doctype html>
                    <html lang=\"en\">
                        <head>
                            <meta charset=\"UTF - 8\">
                            <meta name=\"viewport\"
                                  content=\"width = device - width, user - scalable = no, initial - scale = 1.0, maximum - scale = 1.0, minimum - scale = 1.0\">
                            <meta http-equiv=\"X - UA - Compatible\" content=\"ie = edge\">
                            <title>" . $this->title . "</title>
                        </head>
                        <body>
            ";
            $this->addHeader();
        }

        private function addHeader() {
            $this->page .= "<div class='container'><header> " . "This is page header" . " </header>";
        }

        public function addContent(string $content) {
            $this->page .= "Page Content: " . $content;
        }

        private function addFooter() {
            $this->page .= "<footer> This is the page Footer: " . $this->year . " - " . $this->copyRight . " </footer></div></body></html>";
        }

        public function get() {
            $this->addFooter();
            return $this->page;
        }
    }

    $page = new Page("Demo page", 2020, "HUST");
    $page->addContent("Hello World");
    echo $page->get();

    echo "<br>";

    $page2 = new Page("Demo page2", 2020, "HUST2");
    $page2->addContent("Hello World2");
    echo $page2->get();


