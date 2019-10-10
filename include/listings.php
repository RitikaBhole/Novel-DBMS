<?php 
    class Listing{
        // constructor("More from Science", rows)
        // toHTML() => <h1><div>
        public $name;
        public $rows;

        public function __construct($name, $rows) {
            $this->rows = $rows;
            $this->name = $name;
        }
        
        public function toHTML() {
            $name = $this->name;
            $rows = $this->rows;
            echo "

            <h1>$name</h1>
            <div class='$name'>
            <ul>
            ";
            
            foreach($rows as $book){
                $img_url = $book['image'];
                
                echo "<li><img src = '/res/$img_url'></li>";
                
            }
            echo "</ul>
            </div>";
        }

        public static function getListOfListings($result){
            $genres = array(); //"science" => array(books of the science genre)
            foreach($result as $row){
                if(isset($genres[$row['genre']])){
                    array_push($genres[$row['genre']], $row);
                }else{
                    $genres[$row['genre']] = array($row);
                }
            }

            $listings = array();

            foreach($genres as $genre => $genre_books){
                $listing = new Listing($genre, $genre_books);
                array_push($listings, $listing);
                $listing->toHTML();
            }
            return $listings;
        }
    }

?>