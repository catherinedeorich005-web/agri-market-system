<!DOCTYPE html>
<html>
<head>
<title>Agri Market</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{
font-family:Arial,sans-serif;
background:#f5f5f5;
line-height:1.6;
}

/* HEADER */

header{
background:#2E7D32;
color:white;
text-align:center;
padding:25px;
}

.logo{
font-size:50px;
margin-bottom:10px;
}

header h1{
font-size:42px;
}

header p{
font-size:18px;
}

/* NAVIGATION */

nav{
background:#F9A825;
padding:15px;
text-align:center;
}

nav a{
color:white;
text-decoration:none;
margin:0 15px;
font-weight:bold;
font-size:16px;
transition:0.3s;
}

nav a:hover{
color:#2E7D32;
}

/* HERO */

.hero{
background:linear-gradient(
rgba(46,125,50,0.85),
rgba(46,125,50,0.85)
);
color:white;
text-align:center;
padding:100px 20px;
}

.hero h1{
font-size:50px;
margin-bottom:20px;
}

.hero p{
font-size:22px;
margin-bottom:30px;
}

.btn{
display:inline-block;
background:#F9A825;
color:white;
padding:12px 25px;
text-decoration:none;
border-radius:25px;
font-weight:bold;
transition:0.3s;
}

.btn:hover{
transform:scale(1.05);
}

/* STATS */

.stats{
display:flex;
justify-content:center;
flex-wrap:wrap;
background:white;
padding:50px 20px;
}

.stat-box{
width:220px;
margin:15px;
padding:25px;
text-align:center;
background:#f9f9f9;
border-radius:15px;
box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

.stat-box h2{
color:#2E7D32;
font-size:35px;
}

.stat-box p{
font-weight:bold;
}

/* FEATURES */

.container{
width:90%;
margin:auto;
padding:60px 0;
}

.section-title{
text-align:center;
color:#2E7D32;
font-size:35px;
margin-bottom:40px;
}

.cards{
display:flex;
justify-content:center;
flex-wrap:wrap;
}

.card{
width:320px;
background:white;
margin:15px;
padding:30px;
text-align:center;
border-radius:40px 10px 40px 10px;
box-shadow:0 4px 10px rgba(0,0,0,0.15);
transition:0.3s;
}

.card:hover{
transform:translateY(-8px);
}

.card h3{
color:#2E7D32;
margin-bottom:15px;
}

.card p{
color:#555;
}

/* CTA */

.cta{
background:#2E7D32;
color:white;
text-align:center;
padding:60px 20px;
}

.cta h2{
font-size:35px;
margin-bottom:15px;
}

.cta p{
margin-bottom:25px;
}

/* FOOTER */

footer{
background:#1b5e20;
color:white;
text-align:center;
padding:20px;
}

@media(max-width:768px){

.hero h1{
font-size:35px;
}

.hero p{
font-size:18px;
}

.card{
width:95%;
}

.stat-box{
width:90%;
}

}

</style>

</head>

<body>

<header>

<div class="logo">🌿</div>

<h1>AGRI MARKET</h1>

<p>
Connecting Farmers and Customers Directly
</p>

</header>

<nav>

<a href="index.php">Home</a>
<a href="products.php">Products</a>
<a href="about.php">About</a>
<a href="contact.php">Contact</a>
<a href="login.php">Login</a>

</nav>

<section class="hero">

<h1>Fresh Farm Products Delivered</h1>

<p>
Buy directly from trusted farmers and support local agriculture.
</p>

<a href="products.php" class="btn">
Explore Products
</a>

</section>

<section class="stats">

<div class="stat-box">
<h2>500+</h2>
<p>Farmers</p>
</div>

<div class="stat-box">
<h2>1000+</h2>
<p>Customers</p>
</div>

<div class="stat-box">
<h2>2500+</h2>
<p>Products</p>
</div>

<div class="stat-box">
<h2>98%</h2>
<p>Satisfaction</p>
</div>

</section>

<div class="container">

<h2 class="section-title">
Why Choose Agri Market?
</h2>

<div class="cards">

<div class="card">
<h3>Farmers</h3>
<p>
Sell products directly to customers and increase profits by reducing middlemen.
</p>
</div>

<div class="card">
<h3>Customers</h3>
<p>
Purchase fresh agricultural products directly from trusted farmers.
</p>
</div>

<div class="card">
<h3>Community</h3>
<p>
Connect, learn and share agricultural knowledge with others.
</p>
</div>

</div>

</div>

<section class="cta">

<h2>Start Buying Fresh Farm Products Today</h2>

<p>
Join our growing agricultural marketplace.
</p>

<a href="login.php" class="btn">
Get Started
</a>

</section>

<footer>

<p>
Copyright © 2026 Agri Market | All Rights Reserved
</p>

</footer>

</body>
</html>