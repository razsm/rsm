<?php session_start(); ?>
<html>
    <title>RS </title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="page.css" rel="stylesheet" type="text/css">

    
    <body>
        <div id="container">
        <!--HEADER-->
        <div id="header">
            <div id="logo"> LOGO </div>
            <div id="top_right">
               <ul>
                <li><a href="login.php">login</a></li>
                    <li><a href="register.php">signup</a></li>
                    <!--<li><div id="search"> -->
                   <li>
                <form action="index.html" method="POST">
                 <input id="search" type="text" name="search" placeholder="Type here">
                 <input id="submit" type="submit" value="Search">
                </form>
                       </li>
                </ul> 
               
                </div>
                <div id="navbar">
                    <!--<ul>
                      <li><a href="cart.php"> Cart </a></li>
                      <li><a href="category.php"> Catagory </a></li>
                      <li><a href="aboutus.php"> About Us </a></li>
                      <li><a href="home.php"> Home </a></li>
                      </ul>-->
                      <div class="dropdown">
                          <span><a>Women</a></span>
                          <!-- <span>Mouse over me</span>-->
                             <div class="dropdown-content">
                                  <p><a href=ladies.php>Ladies Item</a></p>
                                 <p><a href=zents.php>Zents Item</a></p>
                              </div>
                      </div>
                      <div class="dropdown">
                         <span><a>Men</a></span>
                         <!-- <div class="mens">
                              <ul>
                              <li><a>Clothing</a></li>
                              <li><a>Accessories</a></li>
                              </ul>-->
                          <!-- <span>Mouse over me</span>-->
                             <div class="dropdown-content">
                                 <ul>
                                 <li><h>Clothing</h>
                                     <p><a href="tsrt.php">T-Shirt</a></p>
                                     <p><a>Polo-Shirt</a></p>
                                     <p><a>Trouser</a></p>
                                     <p><a>Jeans</a></p>
                                     <p><a>Shorts</a></p>
                                     </li>
                                 <li><h>Accessories</h>
                                     <p><a>Belt</a></p>
                                     <p><a>Wallet</a></p>
                                     <p><a>Bags & Backpack</a></p>
                                     <p><a>Braclets</a></p>
                                     <p><a>Sock</a></p>
                                 </li>
                                 <li><h>Fragrance</h></li>
                                 <li><h>Footwear</h></li>
                                 <li><h>Grooming</h></li>
                                 </ul>
                                 <!-- <p><a href=ladies.php>Ladies Item</a></p>
                                 <p><a href=zents.php>Zents Item</a></p>-->
                                 </div>
                             </div>
                     <div class="dropdown">
                        <span><a>Kids</a></span>
                          <!-- <span>Mouse over me</span>-->
                             <div class="dropdown-content">
                                  <p><a href=ladies.php>Ladies Item</a></p>
                                 <p><a href=zents.php>Zents Item</a></p>
                            </div>
                       </div>
                      <div class="dropdown">
                         <span><a>Electronics</a></span>
                          <!-- <span>Mouse over me</span>-->
                             <div class="dropdown-content">
                                  <p><a href=ladies.php>Ladies Item</a></p>
                                 <p><a href=zents.php>Zents Item</a></p>
                                  </div>
                      </div>
                      <div class="dropdown">
                        <span><a>Home Appliances</a></span>
                          <!-- <span>Mouse over me</span>-->
                             <div class="dropdown-content">
                                  <p><a href=ladies.php>Ladies Item</a></p>
                                 <p><a href=zents.php>Zents Item</a></p>
                              </div>
                      </div>
                      <div class="dropdown">
                          <span><a>Health & Fitness</a></span>
                          <!-- <span>Mouse over me</span>-->
                             <div class="dropdown-content">
                                  <p><a href=ladies.php>Ladies Item</a></p>
                                 <p><a href=zents.php>Zents Item</a></p>
                              </div>
                      </div>
                       <div class="dropdown">
                           <span><a>Living</a></span>
                          <!-- <span>Mouse over me</span>-->
                             <div class="dropdown-content">
                                  <p><a href=ladies.php>Ladies Item</a></p>
                                 <p><a href=zents.php>Zents Item</a></p>
                             </div>
                        </div>
                        <div class="dropdown">
                          <span><a>Grocery</a></span>
                          <!-- <span>Mouse over me</span>-->
                             <div class="dropdown-content">
                                  <p><a href=ladies.php>Ladies Item</a></p>
                                 <p><a href=zents.php>Zents Item</a></p>
                              </div>
                        </div>
                       <div class="dropdown">
                         <span><a>Gift & Stationery</a></span>
                          <!-- <span>Mouse over me</span>-->
                             <div class="dropdown-content">
                                  <p><a href=ladies.php>Ladies Item</a></p>
                                 <p><a href=zents.php>Zents Item</a></p>
                            </div>
                      </div>
                      <div class="dropdown">
                         <span><a>Offer Zone</a></span>
                          <!-- <span>Mouse over me</span>-->
                             <div class="dropdown-content">
                                  <p><a href=ladies.php>Ladies Item</a></p>
                                 <p><a href=zents.php>Zents Item</a></p>
                             </div>
                    </div>
                </div>
        </div>
        
        <main>
            <aside>
            <div id="location">Location</div>
                <div id="filter">Filter</div>
            </aside>
            <div class="page-content">
               <div id="right"> Right</div>
               <div id="pic1">
                    <div id="left_row">Row 1</div>
                    <div id="middle_row">LEFT Row CONTENT</div>
                    <div id="right_row">RIGHT Row CONTENT</div>
              </div>
                </div>
        </main>
        </div>
    