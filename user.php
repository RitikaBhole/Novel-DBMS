<?php
    require_once "../include/listings.php";
?>

<html>
    <head>
        <title>Novels Management System! User Page</title>
        <link rel="stylesheet" href="/dependencies/jquery.flipster.min.css">
	    <script
	    src = "https://code.jquery.com/jquery-3.4.1.min.js"
	    integrity = "sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	    crossorigin = "anonymous"></script>
    </head>

    <body>

    <?php
        $conn = mysqli_connect("localhost","root","","novel_db");
        $query = mysqli_query($conn, "SELECT image FROM novel_db.novel");
    ?>

    <?php
        $query = mysqli_query($conn, "SELECT * FROM novel_db.novel");
        $books = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $listings = Listing::getListOfListings($books);
    ?>

    <script type="text/javascript" src="/dependencies/jquery.flipster.min.js"></script>
        <script>
            <?php
                foreach($listings as $listing){
                    $name = $listing->name;
                    echo "\$('.$name').flipster();\n";
                }
            ?>
        </script>
    </body>

</html>