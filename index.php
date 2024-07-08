<?php 
// include('connect.php');
$status = "";
    if(isset($_POST["submit"])){
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name=$_POST["name"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        $message=$_POST["message"];
        if(empty($name) || empty($email) || empty($message)) {
            $status = "All fields are required.";
        } else {
            if(strlen($name) >= 50 || !preg_match("/^[a-zA-Z-'\s]+$/", $name)) {
                $status = "Please enter a valid name";
            } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $status = "Please enter a valid email";
            } else {
                include('connect.php');
                $sql = "INSERT INTO user_info (name, phone, email, message) VALUES (:name, :phone, :email, :message)";
                $stmt = $conn->prepare($sql);
                $stmt->execute(['name' => $name, 'email' => $email,'phone' => $phone, 'message' => $message]);
                $status = "Your message was sent";
                $name = "";
                $email = "";
                $message = "";
            }
        }
        }
        }
        $stat="";
        if(isset($_POST["submit-login"])){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Email=$_POST['Email'];
            $pass=$_POST['pass'];
            if(empty($Email) || empty($pass)) {
                $stat = "All fields are required.";
            }
            elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                $stat = "invalid email.";
            }
            else{
                    $sname= "localhost";
                    $uname= "root";
                    $password = "";
                    $db_name = "gym";
                    $conn =new mysqli($sname, $uname, $password, $db_name);
                    if ($conn->connect_error) {
                        die ("Connection failed:".$conn->connect_error);
                    }
                        $sql = "SELECT * from login WHERE Email='".$_POST['Email']."' AND pass='".$_POST['pass']."' ";
                        $result = mysqli_query($conn, $sql);
                        $user = $result->fetch_assoc();
                    if ($user == null){
                        $stat="Incorrect Email or password";
                    }
                    else{
                        session_start();
                        $_SESSION['Email']=$user['Email'];
                        header('Location:'.'Couches.php');
                    }
                }
            }}
        //     }
        // if(isset($_POST["submit-login"])){
            // if($_POST["Email"]=="" or $_POST["pass"]==""){
            //     $stat = "please, enter email and password";
            // }else{
            //     $Email=trim($_POST["Email"]);
            //     $pass=strip_tags(trim($_POST["pass"]));
            //     $query=$conn->prepare("SELECT * FROM login WHERE Email=? AND pass=? ");
            //     // $query="SELECT * FROM 'login' WHERE email= ? AND pass= ? ";
            //     $query->execute(array($Email,$pass));
            //     $control=$query->fetch(PDO::FETCH_OBJ);
            //     if($control>0){
            //             $_SESSION["Email"]=$Email;
            //             header("Location:Couches.php");
            //         }
            //         $stat = " Incorrect email OR password !";
                
    //         if($count>0){
    //             $_SESSION["Email"]=$_POST=["$Email"] ;
    //             header("Location:Couches.php");
    //         }else
    //         {
    //             $stat = " Incorrect email OR password !";
    //         }
?>
<?php
// session_start();
// if(isset($_SESSION["submit-login"]))
// {
// 	header("location: Couches.php");
// }
            ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elhadba_Gym</title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/gym.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&#038;display=swap" rel="stylesheet" />
</head>

<body>
    <!-- start header  -->
    <div class="header" id="header">
        <div class="container">
            <a href="#" class="logo">Power_Gym</a>
            <ul class="main-nav">
                <li><a href="#Home">Home</a></li>
                <li><a href="#scaduale">Scaduale</a></li>
                <li><a href="#gallery">Gallary</a></li>
                <li><a href="#Services">Services</a></li>
                <li><a href="#team"> Coachs</a></li>
                <li><a href="#Feadback"> Feadback</a></li>
                <li><a href="#contact"> Contact Us</a></li>
                <li><a href="#login"> Login</a></li>
            </ul>
        </div>

    </div>
    <!-- <li>
                    <a href="#">Other-linls</a>
                    start megamumio
                    <div class="mega-menu">
                        <div class="image">
                            <img src="images/megamanu.jpg" alt="">
                        </div>
                        <ul class="links">
                            <li><a href="#People's Opinions"><i class="far fa-comments fa-fw"></i> People's Opinions</a>
                            </li>
                            <li>
                                <a href="#team"><i class="far fa-user fa-fw"></i> Team Members</a>
                            </li>
                            <li>
                                <a href="#services"><i class="far fa-building fa-fw"></i> Services</a>
                            </li>
                            <li>
                                <a href="#our-skills"><i class="far fa-check-circle fa-fw"></i> Our Skills</a>
                            </li>
                            <li>
                                <a href="#work-steps"><i class="far fa-clipboard fa-fw"></i> How It Works</a>
                            </li>
                        </ul>
                        <ul class="links">
                            <li>
                                <a href="#events"><i class="far fa-calendar-alt fa-fw"></i> Events</a>
                            </li>
                            <li>
                                <a href="#pricing"><i class="fas fa-server fa-fw"></i> Pricing Plans</a>
                            </li>
                            <li>
                                <a href="#video"><i class="far fa-play-circle fa-fw"></i> Top Videos</a>
                            </li>
                            <li>
                                <a href="#stats"><i class="far fa-chart-bar fa-fw"></i> Stats</a>
                            </li>
                            <li>
                                <a href="#discount"><i class="fas fa-percent fa-fw"></i> Request A Discount</a>
                            </li>

                        </ul>
                    </div>
                    end megamumio 
                </li>-->
    <!-- End header -->
    <!-- start landing -->
    <div class="landing" id="Home">
        <div class="container">
            <div class="text">
                <h1>Welcome, To Power_Gym</h1>
                <p>We all know there are many benefits of the gym. But why do you go to the gym? To get good physic,
                    look younger, and stay in shape? Or just because everyone else goes there too? I will say it doesn’t
                    matter what the reason is but going to the gym does.</p>
            </div>
            <div class="image">
                <img src="images/landing.jpg" alt="">
            </div>
        </div>
        <a href="#scaduale" class="go-down">
            <i class="fas fa-angle-double-down fa-2x"></i>
        </a>
    </div>
    </div>
    <!-- end landing -->
    <!-- Start Scadule -->
    <div class="scaduale" id="scaduale">
        <h2 class="main-title">Scaduale</h2>
        <div class="container">
            <div class="box1">
                <ul class="one">
                    <li class="sat">Saturday</li>
                    <div class="fit">
                        <li>Fitness</li>
                        <li>Male</li>
                        <li>10:12 AM</li>
                    </div>
                    <div class="fit">
                        <li>Yoga</li>
                        <li>FeMale</li>
                        <li>1:2 PM</li>
                    </div>
                    <div class="fit">
                        <li>Cardio</li>
                        <li>Male</li>
                        <li>3:5 PM</li>
                    </div>
                    <div class="fit">
                        <li>Runing</li>
                        <li>Male</li>
                        <li>6:8 AM</li>
                    </div>
                </ul>
            </div>
            <div class="box2">
                <ul class="two">
                    <li class="sat">Sunday</li>
                    <div class="fit">
                        <li>Yoga</li>
                        <li>Male</li>
                        <li>10:12 AM</li>
                    </div>
                    <div class="fit">
                        <li>Fitness</li>
                        <li>Male</li>
                        <li>1:2 PM</li>
                    </div>
                    <div class="fit">
                        <li>Runing</li>
                        <li>FeMale</li>
                        <li>3:5 PM</li>
                    </div>
                    <div class="fit">
                        <li>Cardio</li>
                        <li>Male</li>
                        <li>6:8 AM</li>
                    </div>
                </ul>
            </div>
            <div class="box3">
                <ul class="three">
                    <li class="sat">Monday</li>
                    <div class="fit">
                        <li>Runing</li>
                        <li>Male</li>
                        <li>10:12 AM</li>
                    </div>
                    <div class="fit">
                        <li>Yoga</li>
                        <li>FeMale</li>
                        <li>1:2 PM</li>
                    </div>
                    <div class="fit">
                        <li>Fitness</li>
                        <li>Male</li>
                        <li>3:5 PM</li>
                    </div>
                    <div class="fit">
                        <li>Cardio</li>
                        <li>Male</li>
                        <li>6:8 AM</li>
                    </div>
                </ul>
            </div>
            <div class="box4">
                <ul class="four">
                    <li class="sat">Tuesday</li>
                    <div class="fit">
                        <li>Cardio</li>
                        <li>Male</li>
                        <li>10:12 AM</li>
                    </div>
                    <div class="fit">
                        <li>Fitness</li>
                        <li>FeMale</li>
                        <li>1:2 PM</li>
                    </div>
                    <div class="fit">
                        <li>Yoga</li>
                        <li>Male</li>
                        <li>3:5 PM</li>
                    </div>
                    <div class="fit">
                        <li>Runing</li>
                        <li>Male</li>
                        <li>6:8 AM</li>
                    </div>
                </ul>
            </div>
            <div class="box5">
                <ul class="five">
                    <li class="sat">Wednessday</li>
                    <div class="fit">
                        <li>Yoga</li>
                        <li>Male</li>
                        <li>10:12 AM</li>
                    </div>
                    <div class="fit">
                        <li>Fitness</li>
                        <li>FeMale</li>
                        <li>1:2 PM</li>
                    </div>
                    <div class="fit">
                        <li>Runing</li>
                        <li>Male</li>
                        <li>3:5 PM</li>
                    </div>
                    <div class="fit">
                        <li>Cardio</li>
                        <li>Male</li>
                        <li>6:8 AM</li>
                    </div>
                </ul>
            </div>
            <div class="box6">
                <ul class="six">
                    <li class="sat">Thursday</li>
                    <div class="fit">
                        <li>Fitness</li>
                        <li>Male</li>
                        <li>10:12 AM</li>
                    </div>
                    <div class="fit">
                        <li>Yoga</li>
                        <li>FeMale</li>
                        <li>1:2 PM</li>
                    </div>
                    <div class="fit">
                        <li>Cardio</li>
                        <li>Male</li>
                        <li>3:5 PM</li>
                    </div>
                    <div class="fit">
                        <li>Runing</li>
                        <li>Male</li>
                        <li>6:8 AM</li>
                    </div>
                </ul>
            </div>
        </div>
        <p class="contact-text">Contact us if you have special request</p>
        <a href="#contact" class="contact-link">Contact Us</a>
    </div>
    </div>
    </div>
    <!-- end scaduale -->
    <!-- <div class="articles" id="articles">
        <h2 class="main-title">Articles</h2>
        <div class="container">
            <div class="box">
                <img src="images/one.jpg" alt="" />
                <div class="content">
                    <h3>Elhadb_Gym</h3>
                    <p>Elhadb_Gym This research employed Pierre Bourdieu’s model of capital accumulation to frame the
                        benefits
                        conferred by gym use</p>
                </div>
                <div class="info">
                    <a href="">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="images/two.jpg" alt="" />
                <div class="content">
                    <h3>Tridmil</h3>
                    <p>Trdmile This research employed Pierre Bourdieus model of capital accumulation to frame the
                        benefits
                        conferred by gym use</p>
                </div>
                <div class="info">
                    <a href="">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="images/three.jpg" alt="" />
                <div class="content">
                    <h3>Danbils</h3>
                    <p>Danbils This research employed Pierre Bourdieus model of capital accumulation to frame the
                        benefits
                        conferred by gym use</p>
                </div>
                <div class="info">
                    <a href="">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="images/four.jpg" alt="" />
                <div class="content">
                    <h3>another component</h3>
                    <p>all componant This research employed Pierre Bourdieus model of capital accumulation to frame the
                        benefits
                        conferred by gym use</p>
                </div>
                <div class="info">
                    <a href="">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="images/five.jpg" alt="" />
                <div class="content">
                    <h3>Cardio</h3>
                    <p>Cardio This research employed Pierre Bourdieus model of capital accumulation to frame the
                        benefits
                        conferred by gym use</p>
                </div>
                <div class="info">
                    <a href="">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="images/six.jpg" alt="" />
                <div class="content">
                    <h3>Peoples</h3>
                    <p>Peoples in Gym This research employed Pierre Bourdieus model of capital accumulation to frame the
                        benefits
                        conferred by gym use</p>
                </div>
                <div class="info">
                    <a href="">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="images/seven.jpg" alt="" />
                <div class="content">
                    <h3>Exercises</h3>
                    <p>Exercises This research employed Pierre Bourdieus model of capital accumulation to frame the
                        benefits
                        conferred by gym use</p>
                </div>
                <div class="info">
                    <a href="">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="images/eight.jpg" alt="" />
                <div class="content">
                    <h3>personal trainer</h3>
                    <p>A personal trainer This research employed Pierre Bourdieus model of capital accumulation to frame
                        the benefits
                        conferred by gym use</p>
                </div>
                <div class="info">
                    <a href="">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="spikes"></div> -->
    <!-- End Articles -->
    <!-- Start Gallery -->
    <div class="gallery" id="gallery">
        <h2 class="main-title">Gallery</h2>
        <div class="container">
            <div class="box">
                <div class="image">
                    <img src="images/nine.jpg" alt="" />
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="images/ten.jpg" alt="" />
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="images/eleven.jpg" alt="" />
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="images/twelve.jpg" alt="" />
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="images/thrten2.jpg" alt="" />
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="images/fourten2.jpg" alt="" />
                </div>
            </div>
            <!-- </div>
        <p class="contact-text">Contact us if you have special request</p>
        <a href="#contact" class="contact-link">Contact Us</a>
    </div> -->
        </div>
    </div>
    <!-- End Gallery -->
    <!-- Start Features -->
    <div class="features" id="Services">
        <h2 class="main-title">Services</h2>
        <div class="container">
            <div class="box quality">
                <div class="img-holder"><img src="images/feathure1.jpg" alt="" /></div>
                <h2>Exercises To be Fitness</h2>
                <p> Exercises This research employed Pierre Bourdieus model of capital accumulation to frame the
                    benefits A gym has many benefits for the one who is going there. </p>
                <a href="Exercises To be Fitness.html" target="_blank">More</a>
            </div>
            <div class="box time">
                <div class="img-holder"><img src="images/feature2.jpg" alt="" /></div>
                <h2>Good Trainers</h2>
                <p>A personal trainer This research employed Pierre Bourdieus model of capital accumulation to frame
                    the benefits
                    conferred by gym use Devices,welcome Elhadb-Gym.com </p>
                <a href="Good Trainers.html" target="_blank">More</a>
            </div>
            <div class="box passion">
                <div class="img-holder"><img src="images/mokamalat.jpg" alt="" /></div>
                <h2>Nutritional Supplements</h2>
                <p>Buy natural Vitamin E for food. Manufacture and global distribution. Contact us! Industrial suppliers
                    of Vitamin E for food, cosmetics & feed.
                </p>
                <a href="Nutritional Supplements.html" target="_blank">More</a>
            </div>
            <!-- </div>
        <p class="contact-text">Contact us if you have special request</p>
        <a href="#contact" class="contact-link">Contact Us</a>
    </div> -->
        </div>
    </div>
    <!-- End Features -->
    <!-- Start Team -->
    <div class="team" id="team">
        <h2 class="main-title">Coachs</h2>
        <div class="container">
            <div class="box">
                <div class="data">
                    <img src="images/te11.jpg" alt="" />
                    <div class="social">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="info">
                    <h3>Name</h3>
                    <p>Hassan Tarek</p>
                </div>
            </div>
            <div class="box">
                <div class="data">
                    <img src="images/te2.jpg" alt="" />
                    <div class="social">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="info">
                    <h3>Name</h3>
                    <p>Aya Kamal</p>
                </div>
            </div>
            <div class="box">
                <div class="data">
                    <img src="images/te33.jpg" alt="" />
                    <div class="social">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="info">
                    <h3>Name</h3>
                    <p>Kahlid Walid</p>
                </div>
            </div>
            <div class="box">
                <div class="data">
                    <img src="images/te4.jpg" alt="" />
                    <div class="social">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="info">
                    <h3>Name</h3>
                    <p>Rawan Mohamed</p>
                </div>
            </div>
            <div class="box">
                <div class="data">
                    <img src="images/te44.jpg" alt="" />
                    <div class="social">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="info">
                    <h3>Name</h3>
                    <p>Kahlid Mohsen</p>
                </div>
            </div>
            <div class="box">
                <div class="data">
                    <img src="images/te6.jpg" alt="" />
                    <div class="social">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="info">
                    <h3>Name</h3>
                    <p>Yossef Ahmed</p>
                </div>
            </div>
            <div class="box">
                <div class="data">
                    <img src="images/te77.jpg" alt="" />
                    <div class="social">
                        <a href="https://www.Google.com">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="info">
                    <h3>Name</h3>
                    <p>Ahmed Elsaka</p>
                </div>
            </div>
            <div class="box">
                <div class="data">
                    <img src="images/te9.jpg" alt="" />
                    <div class="social">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="info">
                    <h3>Name</h3>
                    <p>Tom Couroz</p>
                </div>
            </div>
            <!-- </div>
        <p class="contact-text">Contact us if you have special request</p>
        <a href="#contact" class="contact-link">Contact Us</a>
    </div> -->
        </div>
    </div>
    <div class="spikes"></div>
    <!-- End Team -->
    <!-- Start Testimonials -->
    <div class="testimonials" id="Feadback">
        <h2 class="main-title">Feadback</h2>
        <div class="container">
            <div class="box">
                <img src="images/op1.jpg" alt="" />
                <h3>Mohamed Farag</h3>
                <span class="title">Full Stack Developer</span>
                <div class="rate">
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>
                    The Gym Is very Good And It Helped Me to Be Fitness And It Helped Me To Made Musles
                </p>
            </div>
            <div class="box">
                <img src="images/op2.jpg" alt="" />
                <h3>Mohamed Ibrahim</h3>
                <span class="title">Mecanical Ingineer</span>
                <div class="rate">
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>
                    The Gym Is very Good And It Helped Me To Improve My Healthe But There Is one problem The Responed
                    For my answers is slow
                </p>
            </div>
            <div class="box">
                <img src="images/op3.jpg" alt="" />
                <h3>Reham Elsayed</h3>
                <span class="title">Actor</span>
                <div class="rate">
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>
                    The Gym Is very Good And It Helped Me To Be Fit And I am Very Habby To Subscribe In the website
                </p>
            </div>
            <div class="box">
                <img src="images/op4.jpg" alt="" />
                <h3>Amr Hendawy</h3>
                <span class="title">Lawyer</span>
                <div class="rate">
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                </div>
                <p>
                    The Gym Is very Good And It Helped Me To Be Good Person And Helped Me To Stop Smooking
                </p>
            </div>
            <div class="box">
                <img src="images/op5.jpg" alt="" />
                <h3>Sherief Ashraf</h3>
                <span class="title">Director</span>
                <div class="rate">
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>
                    The Gym Is very Good And It Helped Me To be Good And Helbed me To be succssful Person
                </p>
            </div>
            <div class="box">
                <img src="images/op66.jpg" alt="" />
                <h3>Afaf Mahmoud</h3>
                <span class="title">Doctor</span>
                <div class="rate">
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="filled fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>
                    The Gym Is very Good And It Helped Me to be fitness And helbed me in My work
                </p>
            </div>
            <!-- <div class="contact-text">
                <form action="">
                    <input class="contact-link" type="text" placeholder="your Comment" name="Comment">
                    <input class="contact-link" type="submit" value="Send" name="submit">
                </form>
            </div> -->
            <!-- </div>
        <p class="contact-text">Contact us if you have special request</p>
        <a href="#contact" class="contact-link">Contact Us</a>
    </div> -->
        </div>
    </div>
    <!-- End Testimonials -->
    <!-- start login  -->
    <div class="login" id="login">
        <h2 class="main-title">Login</h2>
        <!-- <div class="container"> -->
        <div class="form">
        <form action="" target="_blank" method="post">
                <label>Your Email: </label>
                <input type="email" placeholder="Your Email" name="Email" required>
                <label>Your password: </label>
                <input type="password" placeholder="Your password" name="pass" required>
                <input class="input" type="submit" value="Login Only Admin" name="submit-login">
                <!-- <a href="Couches.php" target="_blank" class="input">Login Only Admin</a> -->
                <!-- <button type="submit" class="input">Login Only Admin</button> -->
                <div class="form-status">
                        <?php echo $stat ?>
                    </div>
                
            </form>
        </div>
        <!-- </div> -->
    </div>
    <!-- end login  -->
    <!-- start contact  -->
    <div class="contact" id="contact">
        <!-- <h2 class="main-title">Contact Us</h2> -->
        <div class="image">
            <div class="content">
                <h2>You can Contact Us </h2>
                <p>If You Need To Contact Us To Need More For Gym You Can Write Your Information</p>
                <img src="images/te7.jpg" alt="">
            </div>
        </div>
        <div class="form">
            <div class="content">
                <h2>Write Your Information</h2>
                <form action="" method="post">
                    <input class="input" type="text" placeholder="Your Name" name="name">
                    <input class="input" type="email" placeholder=" Your Email" name="email">
                    <input class="input" type="text" placeholder="Your Phone" name="phone">
                    <textarea class="input" placeholder="Tell Us About Your Need" name="message"></textarea>
                    <input type="submit" value="send" name="submit">
                    <div class="form-status">
                        <?php echo $status ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end contact  -->
    <!-- start footer  -->
    <div class="footer">
        <div class="container">
            <div class="box">
                <h3>Power_Gym</h3>
                <ul class="social">
                    <li>
                        <a href="#" class="facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="youtube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
                <div class="text">
                    <p>Power_Gym This research employed Pierre Bourdieu’s model of capital accumulation to frame the
                        benefits
                        conferred by gym use</p>
                </div>
            </div>
            <div class="box">
                <div class="line">
                    <i class="fas fa-map-marker-alt fa-fw"></i>
                    <div class="info">Egypt, Elqalubia, Banha, </div>
                </div>
                <div class="line">
                    <i class="far fa-clock fa-fw"></i>
                    <div class="info">Business Hours: From 10:00 To 18:00</div>
                </div>
                <div class="line">
                    <i class="fas fa-phone-volume fa-fw"></i>
                    <div class="info">
                        <span>+201096461733</span>
                        <span>+201096461767</span>
                    </div>
                </div>
            </div>
            <div class="box footer-gallery">
                <img src="images/megamanu.jpg" alt="" />
                <img src="images/te11.jpg" alt="" />
                <img src="images/te33.jpg" alt="" />
                <img src="images/te44.jpg" alt="" />
                <img src="images/one.jpg" alt="" />
                <img src="images/te9.jpg" alt="" />
            </div>
        </div>
        <p class="copyright">&copy; Made With &lt;3 Power team</p>
    </div>
    <!-- end footer  -->

</body>

</html>