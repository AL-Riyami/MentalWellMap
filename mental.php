<html>
    <body>
        <?php
        class Article{
            private $title;
            private $vidSrc;
            private $readMore;
            private $imgSrc;
            private $desc;

            function __construct($title, $vidSrc, $readMore, $imgSrc, $desc)
            {
                $this->title = $title;
                $this->vidSrc = $vidSrc;
                $this->readMore = $readMore;
                $this->imgSrc = $imgSrc;
                $this->desc = $desc;
            }
            
            function get_title(){
                return $this->title;
            }
            function get_vid(){
                return $this->vidSrc;
            }
            function get_read(){
                return $this->readMore;
            }
            function get_img(){
                return $this->imgSrc;
            }
            function get_desc(){
                return $this->desc;
            }
            
        }

        // Variables
        $articles = array();

        // Create connection with SQL server
        $conn = mysqli_connect('localhost', 'root', '', 'MentalWellMap');
        if(!$conn){
            die("Connection Failed: " . mysqli_connect_error());
        }

        // Handling form submission
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            // Handle form data

            // Assuming this is the form to add a new article
            if(isset($_POST["addArticle"])){
                $title = $_POST["title"];
                $vid= $_POST["videoSrc"];
                $redM= $_POST["readMoreLink"];
                $img= $_POST["imageSrc"];
                $desc= $_POST["description"];

                $article = new Article($title, $vid, $redM, $img, $desc);
                array_push($articles, $article);

                // Insert new article into the database
                $sql = "INSERT INTO Articles (Title, VideoSource, ReadMoreLink, ImageSource, Description) 
                        VALUES ('$title', '$vid', '$redM', '$img', '$desc')";
                $result = mysqli_query($conn, $sql);
            }

            // Assuming this is the form to search for articles
            if(isset($_POST["search"])){
                $searchTerm = $_POST["searchTerm"];
                if($searchTerm){
                    $sql = "SELECT * FROM Articles WHERE LOCATE('$searchTerm', Title) OR LOCATE('$searchTerm', Description)";
                    $result = mysqli_query($conn, $sql);
                    $matchArticle = array();
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            $article = new Article($row["Title"], $row["VideoSource"], 
                                        $row["ReadMoreLink"], $row["ImageSource"], $row["Description"]);
                            array_push($matchArticle, $article);
                        }
                    }

                    displayTable($matchArticle);
                }
            }
        }

        // Retrieve existing articles from the database and add them to the array
        $sql = "SELECT * FROM Articles";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $article = new Article($row["Title"], $row["VideoSource"], 
                            $row["ReadMoreLink"], $row["ImageSource"], $row["Description"]);
                array_push($articles, $article);
            }
        }

        // Display the table of content
        displayTable($articles);

        // Display table function
        function displayTable($artArr){
            $rows = ceil(count($artArr)/3);
            $table = "<tbody>";
            for($r = 0; $r<$rows; $r++){
                $table.="<tr>";
                for($c =0; $c<3; $c++){
                    $index = $r*3 +$c;
                    if($index<count($artArr)){
                        $cell = createCol($artArr[$index]);
                        $table.="<td>$cell</td>";
                    }
                }
                $table.="</tr>";
            }
            $table.="</tbody>";
            echo $table;   
        }

        // Create column function
        function createCol($element){
            $col = "<div class=\"article-card\">";
            $col.="<h3>".$element->get_title()."</h3>";
            if($element->get_vid()){
                $col.="<div class=\"embed-responsive embed-responsive-16by9\"><iframe class=\"embed-responsive-item\" src=\"".$element->get_vid()."\" allowfullscreen></iframe></div>";
            }else{
                $col.="<img src=\"". $element->get_img()."\" alt=\"" .$element->get_title()."\" class=\"article-image\">";
            }
            $col.="</br>".$element->get_desc()."<br/> <a href=\"".$element->get_read()."\" class=\"btn btn-primary\">Read More</a>";
            $col.="</div>";
            return $col;
        }

        mysqli_close($conn);
        ?>
    </body>
</html>
