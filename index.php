<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    include('admin/db_connect.php');
    ob_start();
        $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
         foreach ($query as $key => $value) {
          if(!is_numeric($key))
            $_SESSION['system'][$key] = $value;
        }
    ob_end_flush();
    ?>
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>RKU Alumni</title>
  <link rel="stylesheet" href="css/styles.css">
  <script src="js/scripts.js"></script>
  <script src="js/jquery-3.7.1.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="icon" type="image/x-icon" href="/images/1.ico">
</head>

<body>
    
    <style>
        .upcominevents {
            overflow: hidden;
          }
      
          .upcominevents h3 {
            animation: marquee 10s linear infinite;
          }
      
          @keyframes marquee {
            0% {
              transform: translateX(100%);
            }
      
            100% {
              transform: translateX(-100%);
            }
          }
          * {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
            color: white;
            box-sizing: border-box;
          }
          .container-fluid {
            display: flex;
            /* justify-content: center;
            align-items: center; */
          }
          .square-container-fluid {
            position: relative;
            width: 30%;
          }
          .square {
            width: 100%; /* Adjust as needed */
            padding-bottom: 100%; /* This makes it a square */
            position: relative;
            background: linear-gradient(to top left, blue 50%, lightblue 50%);
            overflow: hidden; /* Ensure content does not overflow */
          }
          .compartment {
            position: absolute;
            width: 50%;
            height: 50%;
            animation: fadeSlideIn 1s forwards, bounce 1s forwards; /* Apply animations */
          }
          .top-left {
            background: rgb(2,0,36);
            background: linear-gradient(27deg, rgba(2,0,36,1) 0%, rgba(46,46,160,0.9601891782103467) 45%);
            top: 0;
            left: 0;
          }
          .top-right {
            background: rgb(0,0,0);
            background: linear-gradient(180deg, rgba(0,0,0,1) 49%, rgba(30,30,30,1) 64%);
            top: 0;
            right: 0;
          }
          .bottom-left {
            background: rgb(0,0,0);
            background: linear-gradient(180deg, rgba(0,0,0,1) 49%, rgba(30,30,30,1) 64%);
            bottom: 0;
            left: 0;
          }
          .bottom-right {
            background: rgb(255,140,0);
            background: linear-gradient(270deg, rgba(255,140,0,1) 49%, rgba(255,165,0,1) 64%);
            bottom: 0;
            right: 0;
          }
          .right-column {
            width: 60%;
            padding-left: 40px;
          }
          .row {
            padding: 10px;
            border-bottom: 1px solid rgba(232, 228, 7, 0.956);
            animation: bounceRow 1s forwards; /* Apply animation */
          }
          .row h2 {
            font-weight: bold;
            color:#cfd0cf;
          }
          .row .highlight {
            color: black; /* Change color as needed */
          }
          .row p {
            font-size: 22px;
            color :#898c8a;
          }
          
          /* Animation keyframes for content entering the square */
          @keyframes fadeSlideIn {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
          }
          
          /* Animation keyframes for rows */
          @keyframes bounceRow {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            70% {
                opacity: 1;
                transform: translateY(0);
            }
            85% {
                transform: translateY(-15px);
            }
            100% {
                transform: translateY(0);
            }
          }
          .square-container-fluid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
            padding: 10px;
            box-sizing: border-box;
        }
        
        .square {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 10px;
            padding: 10px;
            box-sizing: border-box;
        }
        
        .compartment {
            padding: 20px;
            box-sizing: border-box;
            background-color: #f0f0f0;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        
        @media (max-width: 768px) {
            .square {
                grid-template-columns: 1fr;
                grid-template-rows: repeat(4, 1fr);
            }
        }
        .responsive-text {
          font-size: clamp(1rem, 5vw, 2rem);
        }
        
        .square {
          width: 100%;
          max-width: 600px;
          margin: 0 auto;
        }
        
        .compartment {
          padding: 20px;
          box-sizing: border-box;
          background-color: #f0f0f0;
          border-radius: 5px;
          display: flex;
          align-items: center;
          justify-content: center;
          text-align: center;
        }
          
    </style>
  
	<?php include 'navbar.php';
          include 'db_connect.php';
    ?>
<div class="stars">
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
</div>
  <div class="slider">
    <script src="js/jssor.slider-28.1.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        window.jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
              [{b:500,d:1000,x:0,e:{x:6}}],
              [{b:-1,d:1,x:100,p:{x:{d:1,dO:9}}},{b:0,d:2000,x:0,e:{x:6},p:{x:{dl:0.1}}}],
              [{b:-1,d:1,x:200,p:{x:{d:1,dO:9}}},{b:0,d:2000,x:0,e:{x:6},p:{x:{dl:0.1}}}],
              [{b:-1,d:1,rX:20,rY:90},{b:0,d:4000,rX:0,e:{rX:1}}],
              [{b:-1,d:1,rY:-20},{b:0,d:4000,rY:-90,e:{rY:7}}],
              [{b:-1,d:1,sX:2,sY:2},{b:1000,d:3000,sX:1,sY:1,e:{sX:1,sY:1}}],
              [{b:-1,d:1,sX:2,sY:2},{b:1000,d:5000,sX:1,sY:1,e:{sX:3,sY:3}}],
              [{b:-1,d:1,tZ:300},{b:0,d:2000,o:1},{b:3500,d:3500,tZ:0,e:{tZ:1}}],
              [{b:-1,d:1,x:20,p:{x:{o:33,r:0.5}}},{b:0,d:1000,x:0,o:0.5,e:{x:3,o:1},p:{x:{dl:0.05,o:33},o:{dl:0.02,o:68,rd:2}}},{b:1000,d:1000,o:1,e:{o:1},p:{o:{dl:0.05,o:68,rd:2}}}],
              [{b:-1,d:1,da:[0,700]},{b:0,d:600,da:[700,700],e:{da:1}}],
              [{b:600,d:1000,o:0.4}],
              [{b:-1,d:1,da:[0,400]},{b:200,d:600,da:[400,400],e:{da:1}}],
              [{b:800,d:1000,o:0.4}],
              [{b:-1,d:1,sX:1.1,sY:1.1},{b:0,d:1600,o:1},{b:1600,d:5000,sX:0.9,sY:0.9,e:{sX:1,sY:1}}],
              [{b:0,d:1000,o:1,p:{o:{o:4}}}],
              [{b:1000,d:1000,o:1,p:{o:{o:4}}}]
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 16,
                $SpacingY: 16
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 2080;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin-ext,cyrillic-ext,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,regular,italic,700,700italic&subset=latin-ext,greek-ext,cyrillic-ext,greek,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />
    <style>
        /*jssor slider loading skin double-tail-spin css*/
        .jssorl-004-double-tail-spin img {
            animation-name: jssorl-004-double-tail-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-004-double-tail-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 031 css*/
        .jssorb031 {position:absolute;}
        .jssorb031 .i {position:absolute;cursor:pointer;}
        .jssorb031 .i .b {fill:#000;fill-opacity:0.6;stroke:#fff;stroke-width:1600;stroke-miterlimit:10;stroke-opacity:0.8;}
        .jssorb031 .i:hover .b {fill:#fff;fill-opacity:1;stroke:#000;stroke-opacity:1;}
        .jssorb031 .iav .b {fill:#fff;stroke:#000;stroke-width:1600;fill-opacity:.6;}
        .jssorb031 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 051 css*/
        .jssora051 {display:block;position:absolute;cursor:pointer;}
        .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
        .jssora051:hover {opacity:.8;}
        .jssora051.jssora051dn {opacity:.5;}
        .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
        
    </style>
    <div class="container">
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-004-double-tail-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="images/double-tail-spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
            <div style="background-color:#000000;">
                <img data-u="image" style="opacity:0.5;" src="images/2.jpg" />
                <div data-ts="flat" data-p="320" style="left:144px;top:80px;width:550px;height:90px;position:absolute;overflow:hidden;">
                    <div data-to="50% 50%" data-ts="preserve-3d" data-t="0" style="left:550px;top:0px;width:550px;height:90px;position:absolute;overflow:hidden;">
                        <div data-to="50% 50%" data-ts="preserve-3d" data-arr="1" style="left:20px;top:18px;width:200px;height:20px;position:absolute;color:#edf1f2;font-size:16px;font-weight:700;line-height:1.2;letter-spacing:0.1em;">Fast and furious</div>
                        <div data-to="50% 50%" data-ts="preserve-3d" data-arr="2" style="left:19px;top:36px;width:600px;height:30px;position:absolute;color:#edf1f2;font-size:24px;line-height:1.2;letter-spacing:0.05em;"><span style="font-weight:900;color:#e04338;">DON'T JUST</span> CHASE YOUR DREAMS...</div>
                    </div>
                </div>
            </div>
            <div>
                <img data-u="image" src="images/3.jpg" />
                <div data-ts="flat" data-p="2720" data-po="50% 48%" style="left:0px;top:0px;width:980px;height:380px;position:absolute;">
                    <div data-to="50% 50%" data-ts="preserve-3d" data-t="3" style="left:400px;top:-30px;width:500px;height:400px;position:absolute;">
                        <div data-to="50% 50%" data-ts="preserve-3d" data-t="4" style="left:0px;top:0px;width:500px;height:400px;position:absolute;">
                            <div data-to="50% 50%" data-ts="preserve-3d" data-t="5" style="left:0px;top:0px;width:500px;height:400px;position:absolute;">
                                <div data-to="50% 50%" data-ts="preserve-3d" data-t="6" style="left:0px;top:0px;width:500px;height:400px;position:absolute;">
                                    <div data-to="50% 50%" data-t="7" style="left:-50px;top:175px;width:600px;height:38px;position:absolute;opacity:0;color:#162321;font-size:32px;font-weight:700;line-height:1.2;text-align:center;">Create your kind of holiday with your friends</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <img data-u="image" src="images/4.jpg" />
                <div data-ts="flat" data-p="2720" data-po="50% 48%" style="left:0px;top:0px;width:980px;height:380px;position:absolute;">
                    <div data-to="50% 50%" data-ts="preserve-3d" data-arr="8" style="left:-2px;top:20px;width:1000px;height:20px;position:absolute;opacity:0;color:#0ff2f2;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:1.2;letter-spacing:1.3em;text-align:center;">CHAMPIONS ARE MADE WHEN NO ONE IS WATCHING</div>
                </div>
            </div>
            <div style="background-color:#000000;">
                <img data-u="image" style="opacity:0.5;" src="images/5.jpg" />
                <div data-ts="flat" data-p="1800" data-po="50% -100%" style="left:120px;top:90px;width:600px;height:300px;position:absolute;">
                    <svg viewbox="0 0 200 200" width="200" height="200" data-t="10" style="left:66px;top:21px;display:block;position:absolute;opacity:0.6;overflow:visible;">
                        <path stroke-dasharray="0,700" fill="none" stroke="#ffffff" d="M0,100C0,44.77152 44.77152,0 100,0C155.22848,0 200,44.77152 200,100C200,155.22848 155.22848,200 100,200C44.77152,200 0,155.22848 0,100Z" data-t="9"></path>
                    </svg>
                    <svg viewbox="0 0 80 80" width="80" height="80" data-t="12" style="left:3px;top:124px;display:block;position:absolute;opacity:0.6;overflow:visible;">
                        <path stroke-dasharray="0,400" fill="none" stroke="#ffffff" shape-rendering="crispEdges" d="M80,80L0,80L0,0L80,0Z" data-t="11"></path>
                    </svg>
                    <svg viewbox="0 0 500 200" data-to="50% 50%" width="500" height="200" data-t="13" style="left:50px;top:50px;display:block;position:absolute;opacity:0;overflow:visible;">
                        <g>
                            <text fill="#ffffff" x="17" y="110" style="position:absolute;font-family:Montserrat,sans-serif;font-size:32px;font-weight:300;overflow:visible;">MODERN
                            </text>
                            <text fill="#ffffff" x="188" y="110" style="position:absolute;font-family:Montserrat,sans-serif;font-size:32px;font-weight:500;letter-spacing:0.1em;overflow:visible;">WEBSITE
                            </text>
                            <text fill="#ff3700" x="218" y="130" style="position:absolute;font-family:Montserrat,sans-serif;font-size:16px;font-weight:900;letter-spacing:0.1em;overflow:visible;">TO JOIN
                            </text>
                            <text fill="#ff3700" x="333" y="130" style="position:absolute;opacity:0.8;font-family:Montserrat,sans-serif;font-size:16px;font-weight:700;letter-spacing:0.1em;overflow:visible;">OUR STUDENTS
                            </text>
                        </g>
                    </svg>
                </div>
            </div>
            <div>
                <img data-u="image" src="images/px-bloom-blossom-flora-65219-image.jpg" />
                <div data-ts="flat" data-p="500" style="left:160px;top:-30px;width:800px;height:200px;position:absolute;">
                    <div data-arr="14" style="left:0px;top:36px;width:800px;height:70px;position:absolute;opacity:0;color:#199494;font-family:'Roboto Condensed',sans-serif;font-size:32px;font-weight:400;line-height:1.2;letter-spacing:-0.05em;text-align:center;text-shadow:2px 1px #d9d99a;">ADDING&nbsp;&nbsp;<span style="font-size:2em;">PERFECTION</span>&nbsp; TO&nbsp; YOUR&nbsp;&nbsp;<span style="font-size:1.6em;">JOINING</span></div>
                    <div data-arr="15" style="left:0px;top:106px;width:800px;height:48px;position:absolute;opacity:0;color:#0d4d4d;font-family:'Roboto Condensed',sans-serif;font-size:20px;font-weight:400;line-height:1.2;letter-spacing:0.2em;text-align:center;text-shadow:1px 1px #d9d99a;">CREATING EVENTS <span style="font-size:2em;">FOR</span> REUNION OUR STUDENTS WITH EACH OTHER</div>
                </div>
            </div>
        </div><a data-scale="0" href="https://www.jssor.com" style="display:none;position:absolute;">slider html</a>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb031" style="position:absolute;bottom:16px;right:16px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:13px;height:13px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
  </div>
  </div>
  <div class="container-fluid">
    <!-- <div class="container"> -->
      <div class="square-container-fluid">
          <div class="square">
              <div class="compartment top-left">200+ Companies For Campus Placement In RKU</div>
              <div class="compartment top-right">2000 + Student For Convocation</div>
              <div class="compartment bottom-left">2000+ Student Waiting For Events to meet friends </div>
              <div class="compartment bottom-right">1000+ Studen Join Our ALumni events</div>
          </div>
      </div>
      <div class="right-column">
          <div class="row">
              <h2><span class="highlight">Most</span> Memoreable</h2>
              <p>We Celebrate Most Memorable Events For Passout STUDENTS </p>
          </div>
          <div class="row">
            <h2><span class="highlight">Meet</span> Friend</h2>
            <p>Celebrate Your Kind Of Holiday With Your Best Friend After A very Long time</p>
        </div>
        <div class="row">
          <h2><span class="highlight">Memorise</span> Old Memories</h2>
          <p>Gosiiping Your Old Memories And Your Present With Your Friends</p>
      </div>
      </div>
  </div>
  
  
    <div class="box-info">
      <li>
        <i class="fa fa-users"></i>
        <span class="text">
          <h3>1.5K</h3>
          <p>Alumni</p>
        </span>
      </li>
      <li>
        <i class="fa fa-comments"></i>
        <span class="text">
          <h3>4</h3>
          <p>Posted Forums</p>
        </span>
      </li>
      <li>
        <i class="fa fa-university"></i>
        <span class="text">
          <h3>University</h3>
          <p>RK University</p>
        </span>
      </li>
      <li>
        <i class="fa fa-calendar-day"></i>
        <span class="text">
          <h3>1</h3>
          <p>Upcoming Events</p>
        </span>
      </li>
      
    </div>

    <div class="upcominevents">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <h3 class="mt-0 text-white">Upcoming Events.. :) Alumni meet in next month</h3>
            <hr class="divider my-4" />
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div class="lin">
      <a href="#" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="#" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
      <a href="https://www.facebook.com/rkuindia" class="me-4 text-reset">
        <i class="fab fa-facebook"></i>
      </a>
      <a href="https://www.rku.ac.in" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="https://www.instagram.com/rkuniversity/" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="https://www.youtube.com/user/rkuniversity" class="me-4 text-reset">
        <i class="fab fa-youtube"></i>
      </a>
      </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>University name
          </h6>
          <p>
            here you login and check gallery and alumni name and check upcoming events
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful Pages
          </h6>
          <p>
            <a href="#!" class="text-reset">Home</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Alumni</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Gallery</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Contact us</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Google</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Linkedin</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Facebook</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Instagram</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> RK university bhavnagar road</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            <?php echo $_SESSION['system']['email'] ?>
          </p>
          <p><i class="fas fa-phone me-3"></i><?php echo $_SESSION['system']['contact'] ?></p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="#">RK Alumni</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
    <!-- login form section -->
    
      
    <script type="text/javascript">jssor_1_slider_init();
    </script>
    <script>
      const sidebarToggle = document.querySelector('.checkbtn');
      const sidebar = document.querySelector('.sidebar ul');
    
      sidebarToggle.addEventListener('click', () => {
        sidebar.classList.toggle('active');
      });
    </script>
</body>

</html>