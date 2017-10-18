<?php

require_once '../settings.php';

if (isset($_POST['upload_song'])) {
    echo "WE GOT IT!";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MusicMaker Client - by Drew Jex</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="custom-style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="css/grayscale.min.css" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="57x57" href="/musicmaker/client/img/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/musicmaker/client/img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/musicmaker/client/img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/musicmaker/client/img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/musicmaker/client/img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/musicmaker/client/img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/musicmaker/client/img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/musicmaker/client/img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/musicmaker/client/img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/musicmaker/client/img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/musicmaker/client/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/musicmaker/client/img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/musicmaker/client/img/favicon-16x16.png">
    <link rel="manifest" href="/musicmaker/client/img/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/musicmaker/client/img/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
        function init() {
            document.getElementById("upload_song_file").onsubmit=function(event) {
                document.getElementById("upload_song_file").target = "iframe_upload_target";
                document.getElementById("iframe_upload_target").onload = uploadDone;
                document.getElementById("uploading").style.display = "inline-block";
            }
        }
    </script>
    <script type="text/javascript">
        window.onload=init; 
    </script>
    <script type="text/javascript">
        function uploadDone() {
            document.getElementById("uploading").style.display = "none";
            /*document.getElementById("submit_upload").value = "Success";
            document.getElementById("submit_upload").disabled = true;*/
            document.getElementById("submit_upload").className = "btn btn-default btn-lg";
            document.getElementById("play_upload").style.display = "inline-block";
            document.getElementById("stop_upload").style.display = "inline-block";
            var response = frames['iframe_upload_target'].document.getElementsByTagName("body")[0].innerHTML;
            var data = eval("("+response+")"); 
            document.getElementById("file_name").value = data.file_name;
            document.getElementById("q3").value = data.file_name;
        }
    </script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i> <span class="light">Music</span> Maker <small>Beta</small>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#intro">Test</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">MusicMaker</h1>
                        <p class="intro-text">An Experiment in Algorithmic Music Composition
                            <br>[by Drew Jex]</p>
                        <a href="#intro" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="intro" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2"> 
                    <h3>About MusicMaker</h3>
                    <p>
                        MusicMaker is a computer program that generates new music by imitating the style and structure of existing songs.
                        Although MusicMaker is an ongoing project, it can generate new, interesting music to some degree. The purpose of this 
                        survey is simply to get some feedback for the current state of MusicMaker as well as to help us know what to improve
                        moving forward. 
                    </p>
                    <p>
                        The survey should take around 8-10 minutes to complete. You will be asked to listen and to evaluate several
                        computer-generated songs that MusicMaker has created.
                        <strong>Important: Before starting, make sure you are either using headphones or you are in a place where it's okay for sound to come from your computer.</strong>
                    </p>
                    <p>
                        If you have any questions or run into any problems (the songs won't play, etc.), feel free to contact me at drewjex28@gmail.com.
                    </p>
                    <p>
                        Finally, be patient when waiting for songs to play-back &mdash; it sometimes takes a few seconds.
                    </p>
                    <a href="#test1" class="btn btn-circle page-scroll">
                        <i class="fa fa-angle-double-down animated"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Test Section -->

    <input type="hidden" name="q3" id="q3" />
    <input type="hidden" name="q4" id="q4" />

    <section id="test1" class="container content-section text-center">
        <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h3>(1) For each of the two following songs, first listen to the original song and then choose the computer-generated song that you believe was generated from it.</h3> 
                    
                    <div class='row'>

                        <div class='form-group'>
                            <h2>#1</h2>
                        </div>

                        <div class='col-lg-4 col-sm-4'>
                            <button onclick='playGivenSong(event, "Revised Highway 101.mid")' class="btn btn-default btn-sm pull-left">Play Original Song</button>
                            <button onclick='stop(event)'class="btn btn-warning btn-sm pull-left">Stop</button>
                        </div>
                        <div class='col-lg-4 col-sm-4'>
                            <button onclick='playGivenSong(event, "smarter_rr_84rhythm_81notes_3.mid")' class="btn btn-default btn-sm pull-left">Play Song #1</button>
                            <button onclick='stop(event)' class="btn btn-warning btn-sm pull-left">Stop</button>
                        </div>
                        <div class='col-lg-4 col-sm-4'>
                            <button onclick='playGivenSong(event, "New Song_4_1_h2PWd.mid")' class="btn btn-default btn-sm pull-left">Play Song #2</button>
                            <button onclick='stop(event)' class="btn btn-warning btn-sm pull-left">Stop</button>
                        </div>
                    </div>
                    <br><br>
                    <div class='row'>
                        <div class='form-group' style='max-width:300px; float: none;margin: 0 auto;'>
                            <label>Choose the computer-generated song that imitates the original song.</label>
                            <select name='q1_1' id='q1_1' class='form-control'>
                                <option value='0'>--Please Select--</option>
                                <option value='1'>Song #1</option>
                                <option value='2'>Song #2</option>
                            </select>
                        </div>
                    </div>

                    <br><br><br><br><br>

                    <div class='row'>

                        <div class='form-group'>
                            <h2>#2</h2>
                        </div>

                        <div class='col-lg-4 col-sm-4'>
                            <button onclick='playGivenSong(event, "A_Sky_Full_Of_Stars.mid")' class="btn btn-default btn-sm pull-left">Play Original Song</button>
                            <button onclick='stop(event)'class="btn btn-warning btn-sm pull-left">Stop</button>
                        </div>
                        <div class='col-lg-4 col-sm-4'>
                            <button onclick='playGivenSong(event, "New Song_4_1_rixnh.mid")' class="btn btn-default btn-sm pull-left">Play Song #1</button>
                            <button onclick='stop(event)' class="btn btn-warning btn-sm pull-left">Stop</button>
                        </div>
                        <div class='col-lg-4 col-sm-4'>
                            <button onclick='playGivenSong(event, "New Song_4_1_6FOJh.mid")' class="btn btn-default btn-sm pull-left">Play Song #2</button>
                            <button onclick='stop(event)' class="btn btn-warning btn-sm pull-left">Stop</button>
                        </div>
                    </div>
                    <br><br>
                    <div class='row'>
                        <div class='form-group' style='max-width:300px; float: none;margin: 0 auto;'>
                            <label>Choose the computer-generated song that imitates the original song.</label>
                            <select name='q1_2' id='q1_2' class='form-control'>
                                <option value='0'>--Please Select--</option>
                                <option value='1'>Song #1</option>
                                <option value='2'>Song #2</option>
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <a href="#test2" class="btn btn-circle page-scroll">
                        <i class="fa fa-angle-double-down animated"></i>
                    </a>
                </div>
        </div>
    </section>

    <section id="test2" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-9 col-lg-offset-2"> 
                    <h3>(2) For each of the two following songs, first listen to the computer-generated song and then choose the original song from which it was derived.</h3> 
                    
                    <div class='row'>

                        <div class='form-group'>
                            <h2>#1</h2>
                        </div>

                        <div class='col-lg-5 col-sm-5'>
                            <button onclick='playGivenSong(event, "New Song_4_1_Fo6Sn.mid")'  class="btn btn-default btn-sm pull-left">Play Computer-Generated Song</button>
                            <button onclick='stop(event)' class="btn btn-warning btn-sm pull-left">Stop</button>
                        </div>
                        <div class='col-lg-3 col-sm-3'>
                            <button onclick='playGivenSong(event, "Suite_Bergamasque_2.mid")' class="btn btn-default btn-sm pull-left">Play Song #1</button>
                            <button onclick='stop(event)' class="btn btn-warning btn-sm pull-left">Stop</button>
                        </div>
                        <div class='col-lg-3 col-sm-3'>
                            <button onclick='playGivenSong(event, "clair_de_lune.mid")' class="btn btn-default btn-sm pull-left">Play Song #2</button>
                            <button onclick='stop(event)' class="btn btn-warning btn-sm pull-left">Stop</button>
                        </div>
                    </div>
                    <br><br>
                    <div class='row'>
                        <div class='form-group' style='max-width:300px; float: none;margin: 0 auto;'>
                            <label>Choose the original song from which the computer-generated song was derived.</label>
                            <select name='q2_1' id='q2_1' class='form-control'>
                                <option value='0'>--Please Select--</option>
                                <option value='1'>Song #1</option>
                                <option value='2'>Song #2</option>
                            </select>
                        </div>
                    </div>

                    <br><br><br><br><br>

                    <div class='row'>

                        <div class='form-group'>
                            <h2>#2</h2>
                        </div>

                        <div class='col-lg-5 col-sm-5'>
                            <button onclick='playGivenSong(event, "New Song_4_1_ADu3F.mid")'  class="btn btn-default btn-sm pull-left">Play Computer-Generated Song</button>
                            <button onclick='stop(event)' class="btn btn-warning btn-sm pull-left">Stop</button>
                        </div>
                        <div class='col-lg-3 col-sm-3'>
                            <button onclick='playGivenSong(event, "Bells_Of_Freedom_-_Jon_Schmidt.mid")' class="btn btn-default btn-sm pull-left">Play Song #1</button>
                            <button onclick='stop(event)' class="btn btn-warning btn-sm pull-left">Stop</button>
                        </div>
                        <div class='col-lg-3 col-sm-3'>
                            <button onclick='playGivenSong(event, "Waterfall.mid")' class="btn btn-default btn-sm pull-left">Play Song #2</button>
                            <button onclick='stop(event)' class="btn btn-warning btn-sm pull-left">Stop</button>
                        </div>
                    </div>
                    <br><br>
                    <div class='row'>
                        <div class='form-group' style='max-width:300px; float: none;margin: 0 auto;'>
                            <label>Choose the original song from which the computer-generated song was derived.</label>
                            <select name='q2_2' id='q2_2' class='form-control'>
                                <option value='0'>--Please Select--</option>
                                <option value='1'>Song #1</option>
                                <option value='2'>Song #2</option>
                            </select>
                        </div>
                    </div>

                    <br><br>
                    <a href="#test3" class="btn btn-circle page-scroll">
                        <i class="fa fa-angle-double-down animated"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

     <section id="test3" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <!--<h2>Test MusicMaker</h2>-->
                <h3>(3) Upload a song to imitate</h3>
                <ol style='text-align:left;'>
                    <li>Follow <a href="https://musescore.com/sheetmusic?instruments=0" target='_blank'>this link.</a></li>
                    <!--<li>If you are using a desktop computer, click on "Piano" on the left side of the screen. If you are using a mobile device, select the "Piano" option from the filter drop-down at the top of the screen.</li>-->
                    <li>In the top right corner, click "Log In". Use these credentials when you are taken to the login screen: Username: <strong>musicmakersurvey</strong> <br> Password: <strong>musicmaker123</strong></li>
                    <li>After you are logged in, search for the song you want MusicMaker to imitate in the search bar at the top of the screen and press enter.</li>
                    <li>From the results provided, select a song that does NOT contain percussion. <strong>For best results, select piano music or music which only contains 1 or 2 instruments and that is in 4/4 time.</strong>.</li>
                    <li>Once you've reached the main page for the song you selected, click <strong>Download</strong> and then click <strong>MIDI</strong> for the file-type to save the file to your computer.</li>
                    <li>Once the file is saved on your computer, upload it to MusicMaker by clicking <strong>Choose File</strong> below and clicking <strong>Upload.</strong></li>
                </ol>
                <br><br>
                <form id='upload_song_file' method='post' action='upload_song.php' style='display:inline-block;' enctype="multipart/form-data" >
                    <iframe id="iframe_upload_target" onload="uploadDone()" name="iframe_upload_target" src="" style="width:1px;height:1px;display:none"></iframe>
                    <input type="file" class="btn btn-default btn-sm" name="upload_song" accept=".mid,.MID" style='display:inline-block;'>
                    <input type="submit" id='submit_upload' class="btn btn-success btn-lg" value="upload">
                    <img id='uploading' style='display:none' src='../client/img/loading.gif' width='75px' height='75px' />
                </form>
                <input type='hidden' id='file_name' />
                <button onclick='playSong()' id='play_upload' style='display:none;' class="btn btn-default btn-lg">Play</button>
                <button onclick='stopSong()' id='stop_upload' style='display:none;' class="btn btn-warning btn-lg">Stop</button>

                <div style='margin-top:50px;'></div>

                <a href="#test4" class="btn btn-circle page-scroll">
                    <i class="fa fa-angle-double-down animated"></i>
                </a>
            </div>
        </div>
    </section>

    <section id="test4" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2"> 
                    <h3>(4) Listen to your new song!</h3> <img id='loading' style='display:none' src='../client/img/loading.gif' width='75px' height='75px' /></p>
                    <button onclick='generateSong()' class="btn btn-default btn-lg">Generate!</button>
                    <button onclick='downloadSong()' class="btn btn-default btn-lg">Download</button>
                    <button onclick='stopSong()' class="btn btn-warning btn-lg">Stop</button><br>
                    <a href="#test5" class="btn btn-circle page-scroll">
                        <i class="fa fa-angle-double-down animated"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="test5" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h3>(5) Answer the following question:</h3>
                <label style='font-size:20px;'> On a scale of 1 to 5, how well did the computer-generated song imitate the song you uploaded?</label>
                <!--<input type='number' name='q5' id='q5' class="form-control" style='max-width:100px; display:inline-block; margin-left:10px;' min='1' max='5'/><br>-->
                <div class='form-group' style='max-width:300px; float: none;margin: 0 auto;'>
                    <select name='q5' id='q5' class='form-control'>
                        <option value='0'>--Please Select--</option>
                        <option value='1'>1 - Not Similar at All</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5 - Very Similar</option>
                    </select>
                </div>
                <br>
                <a href="#test6" class="btn btn-circle page-scroll">
                    <i class="fa fa-angle-double-down animated"></i>
                </a>
            </div>
        </div>
    </section>

    <section id="test6" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h3>(6) Answer the following question:</h3>
                    <label style='font-size:20px;'> How many years of musical training have you had?</label>
                    <input type='number' name='q6' id='q6' class="form-control" style='max-width:100px; display:inline-block; margin-left:10px;' min='0' /><br>
                    <br><br>
                    <button onclick='submitForm();' id='submit_button' class='btn btn-default btn-lg'>Submit Results!</button>
                </div>
            </div>
        </div>
    </section>

    </form>


    <iframe id="iframe" style="display:none;"></iframe>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About MusicMaker</h2>
                <p>MusicMaker was started in the Fall of 2015. I first wanted to build it so I could have some simple program generate new song ideas for me.</p>
                <a href="https://wiki.cs.byu.edu/mind/musicmaker" class="btn btn-default btn-lg">Visit Wiki Page</a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <!--<section id="feedback" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Under Construction</h2>
                <!--<p>Feel free to email us to provide some feedback on our templates, give us suggestions for new templates and themes, or to just say hello!</p>
                <p><a href="mailto:feedback@startbootstrap.com">feedback@startbootstrap.com</a>
                </p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                </ul>-->
            <!--</div>
        </div>
    </section>-->

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Drew Jex MusicMaker 2017</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Theme JavaScript -->
    <script src="js/grayscale.min.js"></script>

    <!-- Listen JavaScript -->
    <script src="js/listen.js"></script>

    <script src='http://www.midijs.net/lib/midi.js'></script>

</body>

</html>
