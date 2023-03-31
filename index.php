<?php
session_start();
if (!$_SESSION["uID"] || !$_SESSION["username"]) {
    header("Location: login.php");
    echo "<a href='./login.php'>Please login to continue</a>";
    die();
}
?>

<!-- Nav bar and header info -->
<?php
	 require("header.php");
     require_once("navbar.php");
?>
         
<!-- post -->
<?php


// Fetch the post component (form_post)
    // include("post.php");
// Fetch the component that allows a user to make a new post
include("createPost.php");
// Fetch DB information
// include("database.php");

// start session
// session_start();


require("paginatePost.php");

?>

    <script>

        var currPage = 1;
        function Page() {
            var p = 1;
            currPage = function() {
                return p++;
            }
        }
            
        
        function paginate(event) {

            /*
            var page = ( function () {
                var pg = 1;
                return function() {
                return pg++;
                }
                })();
            */
            
            if ( (window.innerHeight + window.pageYOffset ) >= document.body.offsetHeight ) {
                window.removeEventListener("scroll", paginate, false);
                
                
                fetch("paginatePost.php?page="+String(currPage) )
                    .then( (response) => {
                            console.log(currPage);
                            currPage++;
                            return response.text();
                        
                        } )
                    .then( (html) => {
              
                            document.body.insertAdjacentHTML('beforeend', html);

                            window.addEventListener("scroll", paginate, false);
                        
                        } )
            
                    }
        };

window.addEventListener("scroll", paginate, false);


        
    </script>
    
</body>
</html>

<?php
    
?>
