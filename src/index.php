<?php
/*---------------------------------------------------------------------
naam script     : index.php
omschrijving    : Dit is de hoofdpagina van de webshop. Hier kan de gebruiker navigeren naar de verschillende productcategorieën en inloggen of uitloggen.
Auteur          : hussen brasco dominik
project         : peridode 3
Aanmaakdatum    : 01-02-2024
*/

// Start de sessie
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Set character encoding for the document -->
    <meta charset="UTF-8">
    <!-- Viewport for responsive web design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the document -->
    <title>SD Sports</title>
    <!-- Link to the stylesheet -->
    <link rel="stylesheet" href="styles/style.css">
    <!-- Link to the boxicons stylesheet -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Link to the favicon -->
    <link rel="icon" href="assets/favicon.png" type="image/x-icon">
    <!-- Link to the font-awesome stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <!-- Navigation links -->
                <li><a href="index.php"><img src="assets/SDLOGO.png" alt="SD Logo"></a></li>
                <li><a href="index.php">Home</a></li>
                <li class="dropdown">
                    <a href="html/producten.php" class="dropbtn">Alle Producten</a>
                    <div class="dropdown-content">
                        <!-- Dropdown links -->
                        <a href="html/basketbal.php">Basketbal schoenen</a>
                        <a href="html/voetbal.php">Voetbal schoenen</a>
                        <a href="html/running.php">Ren schoenen</a>
                    </div>
                 </li>
                 <!-- Cart icon -->
                 <p id="cart-icon">Winkelwagen</p>

                <?php
// Controleer of de gebruiker is ingelogd
if (isset($_SESSION['login'])) {
    // Gebruiker is ingelogd, toon de uitlogknop
    echo '<li><a href="php/logout.php">Uitloggen</a></li>';
} else {
    // Gebruiker is niet ingelogd, toon de inlogknop
    echo '<li><a href="php/login.php">Inloggen</a></li>';
}
?>
                <!-- Search icon -->
                <div id="search-icon"><i class="fas fa-search"></i></div>
            </ul>
        </nav>
                   <!-- CART  -->
                   <div class="cart">
                       <h2 class="cart-title">Your Cart</h2>
       
                       <!-- CONTENT  -->
                       <div class="cart-content">
                       </div>
       
                       <!-- TOTAL   -->
                       <div class="total">
                           <div class="total-title">Total</div>
                           <div class="total-price">$0</div>
                       </div>
                       <!-- BUY BUTTON  -->
                       <button type="button" class="btn-buy">Buy Now</button>
                       <!-- CART CLOSE  -->
                       <i class='bx bx-x' id="cart-close"></i>
                   </div>
                   <!-- Search bar -->
                   <input type="text" id="searchBar" onkeyup="searchFunction()" placeholder="Search">
                    <!-- List for search results -->
                    <ul id="myList">
                    <li><a href="html/producten.php">Producten</a></li>
                    <li><a href="html/basketbal.php">Basketbal</a></li>
                    <li><a href="html/running.php">Running</a></li>
                    <li><a href="html/voetbal.php">Voetbal</a></li>
                    <!-- Add more list items as needed -->
                    </ul>
                    <!-- Style for search results -->
                    <style>
                        #myList li {
                          display: none;
                        }
                      </style>
                      <!-- Script for showing list items -->
                      <script>
                        function showListItem(event) {
                          event.target.style.display = 'block';
                        }
                      </script>
                      <!-- Script for search function -->
                      <script>
                        function searchFunction() {
                          var input, filter, ul, li, a, i, txtValue;
                          input = document.getElementById('searchBar');
                          filter = input.value.toUpperCase();
                          ul = document.getElementById("myList");
                          li = ul.getElementsByTagName('li');
                        
                          for (i = 0; i < li.length; i++) {
                            a = li[i].getElementsByTagName("a")[0];
                            txtValue = a.textContent || a.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              li[i].style.display = "list-item"; // Show the list item if it matches
                            } else {
                              li[i].style.display = "none"; // Hide the list item if it doesn't match
                            }
                          }
                        }
                        </script>
                        <!-- Script for showing and hiding search bar -->
                        <script>
                            document.getElementById('search-icon').addEventListener('click', function() {
                              var searchBar = document.getElementById('searchBar');
                              if (searchBar.style.display === 'none') {
                                searchBar.style.display = 'block';
                              } else {
                                searchBar.style.display = 'none';
                              }
                            });
                            </script>
        <!-- Advertisements -->
        <section id="ads">
            <div class="ad" id="ad1">
                <div class="ad-content">
                    <a href="html/basketbal.php">
                    <h1>Basketbal</h1></a>
                </div>
            </div>
            <div class="ad" id="ad2">
                <div class="ad-content">
                    <a href="html/running.php"><h1>Running</h1></a>
                </div>
            </div>
            <div class="ad" id="ad3">
                <div class="ad-content">
                    <a href="html/voetbal.php"><h1>Voetbal</h1></a>
                </div>
            </div>
        </section>
    </header>
    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h4>Over ons</h4>
                <p>Welkom bij SDsports, SDsports bevat al jou SportDesires. Onze webwinkel is sinds kort geopend en wij hebben een groeiende selectie van limited of moeilijk te verkrijgen sportschoenen. Zie je een product hier niet staat terwijl jij denkt dat het wel daar zou moeten staan? laat het weten op onze sociale media of stuur een mail. infoSD@gmail.com</p>
            </div>

            <div class="footer-section">
                <h4>Volg ons op</h4>
                <!-- Social media links -->
                <a href="https://facebook.com" class="fa fa-facebook"> Facebook</a>
                <a href="https://twitter.com" class="fa fa-twitter"> Twitter</a>
                <a href="https://www.instagram.com" class="fa fa-instagram"> Instagram</a>
            </div>
            
            <div class="footer-section">
                <h4>Alle producten</h4>
                <!-- Product links -->
                <a href="producten.html">Basketbal schoenen</a>
                <a href="producten.html">Voetbal schoenen</a>
                <a href="producten.html">Ren schoenen</a>
            </div>
        </div>
        
        <div class="footer-bottom">
            <!-- Copyright notice -->
            <p>&copy; 2023 SD Sports. All rights reserved.</p>
        </div>
    </footer>
    <!-- Link to the cart script -->
    <script src="JS/cart.js"></script>
</body>
</html>