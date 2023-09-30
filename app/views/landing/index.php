<?php
session_start();
?>

<!DOCTYPE html>    
    <html>

        <head>
            <title>
                Landing Page
            </title>

            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width=device=width, initial-scale=1.0">
            <link rel="stylesheet" href="../../../public/css/landingPage.css">
        </head>

        <body>
            <main>
                <div class="big-wrapper">
                    <header>
                        <div class="container">
                            <div class="logo">
                                <img src="../../../public/img/logo.jpg" alt="Logo">
                                <h3>Darmodar</h3>
                            </div>

                            <div class="links">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Flag</a></li>
                                    <?php
                                        // Cek apakah sesi pengguna ada
                                        if (isset($_SESSION['username'])) {
                                            // Jika sesi username ada, tampilkan username sebagai teks tombol
                                            echo '<li><a href="../dashboard" class = "btn">' . $_SESSION['username'] . '</a></li>';
                                        } else {
                                            // Jika sesi username tidak ada, tampilkan tombol Sign In
                                            echo '<li><a href="../login/" class="btn">Sign in</a></li>';
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </header>

                    <div class="showcase-area">
                        <div class="container">
                            <div class="left">
                                <div class="big-title">
                                    <h1>Hello there,</h1>
                                    <h1>here is your flag:</h1>
                                </div>
                                <p class="text">
                                    CTFITB{l34rn1n9_15_fun_y0u_kn0w?}
                                    
                                </p>
                                <div class="cta">
                                    <a href="#" class="btn">Get started</a>
                                </div>
    
                            </div>
                            <div class="right"> 
                                <img src="../../../public/img/desktop-wallpaper-weightlifting-background-gym-equipment-thumbnail.jpg" alt="Person image" class="person">
    
                            </div>
                        </div>
                        
                        
                        <div class="bottom-area">
                            <div class="container"></div>
                        </div>
                    </div>
                    
                    <footer>
                        <div class="container">
                            <div class="links2">
                                <ul>
                                    <img src="../../../public/img/logo.jpg" alt="Test">
                                    <a href="#" class="">&copy; 2023 Darmodar. All rights reserved.</a>
                                    
                                
                                    <svg class="Icontact" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 0C60.7 0 32 28.7 32 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H96zM208 288h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H144c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V80zM496 192c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V336z"/></svg>
                                    <a href="#">Contact Us</a>
                                        
                                    
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    
                                    
                                    
                                </ul>
                            </div> 
                        </div>   
                            
                    </footer>
                
                </div>
            </main>
            
        </body>
    </html> 
    <!-- wow you found the 2nd flag :D -->
    <!-- <h3> Here is your flag CTFITB{S4n7a1_Du1u_g4k51h}</h3> -->
