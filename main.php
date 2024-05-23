<?php 
include("headre.php");
if(isset($_POST['logout'])) {
session_destroy();
// Perform the redirection
header("Location: index.php");
exit();

}
?>
 <body style=" background-image: url(img/bgm.jpg);  
            background-size: cover;  
            background-position: center; ">
 


<header>
        <div id="Nav">
            <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #234;">
               <!-- <a class="navbar-brand" href="#">Saurabh</a>-->
                <a class="navbar-brand" href="#"><img src="img\images-K.png" alt="logo" style="width: 40px;height: auto"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                         
                    </ul>
                    <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
						<div class="mx-2">
						<input type="submit" class="btn btn-danger" type="submit" name="logout" value="Logout">
					</div>
				</form>


                </div>
            </nav>
        </div>
		
		<!-- login modal -->
		
		<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login to our websit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
	  <!-- login ke liye  -->
     <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  </form>
     
	 </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>


	<!-- singup modal -->
		
		<!-- Button trigger modal -->
 

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Get an Accoutn on our websit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- this is for siongup	  -->
	  
	    
    </header>
<main>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="5000" style="width: 100%; max-height: 400px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
        <div class="carousel-inner">
            <div class="carousel-item">
                <img src="img/slide1.jpg" alt="First slide" style="  object-fit: cover; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="carousel-caption d-md-block">
                    <h5>Explore the World of Programming</h5>
                    <p>Unlock the power of code and algorithms to create innovative solutions</p>
                </div>
            </div>
            <div class="carousel-item active">
                <img src="img/cloude.jpg" alt="Second slide" style="  object-fit: cover; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="carousel-caption d-md-block">
                    <h5>Dive into the World of Coding</h5>
                    <p>Transform ideas into reality through the art of coding and development.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/slide3.jpg" alt="Third slide" style="  object-fit: cover; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="carousel-caption d-md-block text-white">
                    <h5>Empower Your Skills as a Developer</h5>
                    <p>Explore the world of development and bring innovation to life with your coding expertise.</p>
                    <a href="#" class="btn btn-danger">Red Button</a>
                    <a href="#" class="btn btn-success ml-2">Green Button</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</main>
<div id="bich_ka" class="mt-5">
<div class="container my-2">

<!-- first about section -->
    <div class="row featurette d-flex justify-content-center aling-items-center">
        <div class="col-md-7 d-flex align-items-center order-md-1">
            <div>
                <h2 class="featurette-heading fw-normal lh-1">Mastering the Art of Algorithms. <span class="text-body-secondary">Unleash Your Problem-Solving Skills!</span></h2>
<p class="lead">Delve into the realm of algorithms, where logic meets creativity. Learn how to tackle complex problems and optimize solutions, mastering the cornerstone of computer science.</p>
<p class="lead">Whether you're a seasoned developer or just starting your coding journey, there's always something new to learn and discover in the dynamic field of programming.</p>

            </div>
        </div>
        <div class="col-md-5 order-md-2">
            <img src="https://source.unsplash.com/450x300/?coding,laptop,coffei,success" alt="Coding Image" class="img-fluid mx-auto shadow-lg p-3 mb-5 bg-white rounded img-fluid ">
        </div>
    </div>
 
	
	<!-- second about section -->
<!-- <div class="container my-1"> -->
<div class="row featurette d-flex justify-content-center aling-items-center">
        <div class="col-md-7 d-flex align-items-center order-md-2">
            <div>
                <h2 class="featurette-heading fw-normal lh-1">Discovering the World of Data Structures. <span class="text-body-secondary">Building Blocks of Efficient Programming!</span></h2>
<p class="lead">Explore the fascinating world of data structures, the backbone of every efficient program. From arrays to trees, understand how to organize and manipulate data for maximum efficiency.</p>
<p class="lead">Whether you're a seasoned developer or just starting your coding journey, there's always something new to learn and discover in the dynamic field of programming.</p>

            </div>
        </div>
        <div class="col-md-5 order-md-1">
            <img src="https://source.unsplash.com/450x300/?coding,laptop" alt="Coding Image" class="img-fluid mx-auto shadow-lg p-3 mb-5 bg-white rounded img-fluid">
        </div>
    </div>	
	
<!-- third about section	 -->
 
 <div class="row featurette d-flex justify-content-center aling-items-center">
        <div class="col-md-7 d-flex align-items-center order-md-1">
            <div>
                <h2 class="featurette-heading fw-normal lh-1">From Code to Creation. <span class="text-body-secondary">Navigating the Software Development Lifecycle!</span></h2>
<p class="lead">Embark on a journey through the software development lifecycle, from conceptualization to deployment. Learn best practices, collaboration strategies, and the art of turning ideas into reality.</p>
<p class="lead">Whether you're a seasoned developer or just starting your coding journey, there's always something new to learn and discover in the dynamic field of programming.</p>
            </div>
        </div>
        <div class="col-md-5 order-md-2">
            <img src="https://source.unsplash.com/450x300/?programming,laptop" alt="Coding Image" class="img-fluid mx-auto shadow-lg p-3 mb-5 bg-white rounded img-fluid">
        </div>
    </div>	
 
 <!-- forth about section -->
 <div class="row featurette d-flex justify-content-center aling-items-center">
        <div class="col-md-7 d-flex align-items-center order-md-2">
            <div>
                <h2 class="featurette-heading fw-normal lh-1">Unlock the Power of Coding. <span class="text-body-secondary">Create, Innovate, Code!</span></h2>
                <p class="lead">Explore the endless possibilities of coding and programming. Dive into the world of algorithms, data structures, and creative problem-solving to craft innovative solutions.</p>
                <p class="lead">Whether you're a seasoned developer or just starting your coding journey, there's always something new to learn and discover in the dynamic field of programming.</p>
            </div>
        </div>
        <div class="col-md-5 order-md-1">
            <img src="https://source.unsplash.com/450x300/?coding,database" alt="Coding Image" class="img-fluid mx-auto shadow-lg p-3 mb-5 bg-white rounded img-fluid">
        </div>
    </div>	
 
 
   </div>	<!--finixe contineer -->
 
</div>
</body>
<?php 
include("footer.php");
?>
