<?php
    class Prispevek {
        public $id;
        public $nadpis;
        public $text;
        public $datum;

        public function nastavHodnoty($nadpis, $text, $datum, $id = null) {
            $this->id = $id;
            $this->nadpis = $nadpis;
            $this->text = $text;
            $this->datum = $datum;
        }

        public function vypis() {
           echo "<section>
                <div>
            	     <h2>$this->nadpis</h2>
                    <p>$this->text</p>
                    <p>$this->datum</p>
                </div>
                <div>
                    <a href='http://localhost/www/testPHP/edit.php?id=$this->id'>edit</a>
                    <a href='http://localhost/www/testPHP/delete.php?id=$this->id'>smazat</a>
                </div>
            </section>";
        }
    }
?>