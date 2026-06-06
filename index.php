<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Agri Market - Connecting Farmers and Customers</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
scroll-behavior:smooth;
}

body{
background:#f5f5f5;
color:#333;
}

/* HEADER */

header{
background:#2E7D32;
color:white;
padding:15px 8%;
display:flex;
justify-content:space-between;
align-items:center;
position:sticky;
top:0;
z-index:1000;
box-shadow:0 2px 10px rgba(0,0,0,0.2);
}

.logo{
display:flex;
align-items:center;
gap:10px;
}

.logo span{
font-size:40px;
}

.logo h1{
font-size:32px;
}

nav a{
color:white;
text-decoration:none;
margin-left:20px;
font-weight:bold;
transition:0.3s;
}

nav a:hover{
color:#F9A825;
}

/* HERO */

.hero{
height:90vh;
background:
linear-gradient(
rgba(0,0,0,0.45),
rgba(46,125,50,0.65)
),
url('https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=1600&q=80');

background-size:cover;
background-position:center;
display:flex;
justify-content:center;
align-items:center;
text-align:center;
color:white;
padding:20px;
}

.hero-content{
max-width:900px;
}

.hero-content h1{
font-size:70px;
margin-bottom:20px;
text-shadow:0 4px 15px rgba(0,0,0,0.4);
}

.hero-content p{
font-size:24px;
margin-bottom:35px;
line-height:1.7;
}

.btn{
display:inline-block;
background:#F9A825;
color:white;
padding:15px 35px;
border-radius:50px;
text-decoration:none;
font-size:18px;
font-weight:bold;
transition:0.3s;
}

.btn:hover{
background:#ffb300;
transform:translateY(-4px);
}

/* STATS */

.stats{
padding:70px 5%;
display:flex;
justify-content:center;
flex-wrap:wrap;
gap:25px;
background:white;
}

.stat-box{
width:220px;
padding:30px;
text-align:center;
background:#f8f8f8;
border-radius:20px;
box-shadow:0 3px 12px rgba(0,0,0,0.1);
}

.stat-box h2{
font-size:42px;
color:#2E7D32;
margin-bottom:10px;
}

/* FEATURES */

.section{
padding:80px 8%;
}

.section-title{
text-align:center;
font-size:40px;
color:#2E7D32;
margin-bottom:50px;
}

.cards{
display:flex;
justify-content:center;
flex-wrap:wrap;
gap:25px;
}

.card{
width:320px;
background:white;
padding:30px;
text-align:center;
border-radius:25px;
box-shadow:0 5px 15px rgba(0,0,0,0.15);
transition:0.3s;
}

.card:hover{
transform:translateY(-8px);
}

.card h3{
color:#2E7D32;
margin-bottom:15px;
font-size:24px;
}

.card p{
color:#555;
line-height:1.7;
}

/* GALLERY */

.gallery{
padding:80px 8%;
background:white;
}

.gallery-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
gap:20px;
}

.gallery-grid img{
width:100%;
height:250px;
object-fit:cover;
border-radius:15px;
box-shadow:0 4px 12px rgba(0,0,0,0.2);
}

/* BENEFITS */

.benefits{
padding:80px 8%;
background:#f8f8f8;
}

.benefit-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:25px;
}

.benefit{
background:white;
padding:25px;
border-radius:15px;
box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

.benefit h3{
color:#2E7D32;
margin-bottom:10px;
}

/* TESTIMONIALS */

.testimonials{
padding:80px 8%;
background:white;
}

.testimonial-container{
display:flex;
justify-content:center;
flex-wrap:wrap;
gap:25px;
}

.testimonial{
width:350px;
background:#f9f9f9;
padding:25px;
border-radius:15px;
box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

.testimonial h4{
color:#2E7D32;
margin-top:15px;
}

/* CTA */

.cta{
background:#2E7D32;
color:white;
text-align:center;
padding:80px 20px;
}

.cta h2{
font-size:42px;
margin-bottom:15px;
}

.cta p{
font-size:20px;
margin-bottom:30px;
}

/* FOOTER */

footer{
background:#1B5E20;
color:white;
padding:30px;
text-align:center;
}

footer p{
margin:8px 0;
}

/* RESPONSIVE */

@media(max-width:768px){

.hero-content h1{
font-size:42px;
}

.hero-content p{
font-size:18px;
}

header{
flex-direction:column;
text-align:center;
}

nav{
margin-top:10px;
}

nav a{
display:inline-block;
margin:8px;
}

}

</style>

</head>
<body>

<header>

<div class="logo">
<span>🌿</span>
<h1>AGRI MARKET</h1>
</div>

<nav>
<a href="index.php">Home</a>
<a href="products.php">Products</a>
<a href="about.php">About</a>
<a href="contact.php">Contact</a>
<a href="login.php">Login</a>
</nav>

</header>

<section class="hero">

<div class="hero-content">

<h1>Fresh Farm Products Straight From The Source</h1>

<p>
Connecting farmers and customers through a modern agricultural marketplace.
Buy fresh vegetables, fruits, grains and livestock products directly from trusted producers.
</p>

<a href="products.php" class="btn">
Explore Products
</a>

</div>

</section>

<section class="stats">

<div class="stat-box">
<h2>500+</h2>
<p>Registered Farmers</p>
</div>

<div class="stat-box">
<h2>1000+</h2>
<p>Happy Customers</p>
</div>

<div class="stat-box">
<h2>2500+</h2>
<p>Products Available</p>
</div>

<div class="stat-box">
<h2>98%</h2>
<p>Customer Satisfaction</p>
</div>

</section>

<section class="section">

<h2 class="section-title">
Why Choose Agri Market?
</h2>

<div class="cards">

<div class="card">
<h3>👨‍🌾 Farmers</h3>
<p>
Sell products directly to customers and maximize profits without middlemen.
</p>
</div>

<div class="card">
<h3>🛒 Customers</h3>
<p>
Access fresh agricultural products from trusted local farmers.
</p>
</div>

<div class="card">
<h3>🚚 Fast Delivery</h3>
<p>
Receive your agricultural products quickly and efficiently.
</p>
</div>

</div>

</section>

<section class="gallery">

<h2 class="section-title">
Agricultural Marketplace
</h2>

<div class="gallery-grid">

<img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&w=800&q=80">

<img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=800&q=80">

<img src="https://images.unsplash.com/photo-1471193945509-9ad0617afabf?auto=format&fit=crop&w=800&q=80">

</div>

</section>

<section class="benefits">

<h2 class="section-title">
Platform Benefits
</h2>

<div class="benefit-grid">

<div class="benefit">
<h3>Fresh Products</h3>
<p>Get freshly harvested agricultural products daily.</p>
</div>

<div class="benefit">
<h3>Secure Transactions</h3>
<p>Safe order processing and payment tracking.</p>
</div>

<div class="benefit">
<h3>Easy Ordering</h3>
<p>Simple product browsing, cart management and checkout.</p>
</div>

<div class="benefit">
<h3>Farmer Empowerment</h3>
<p>Supporting local farmers through digital commerce.</p>
</div>

</div>

</section>

<section class="testimonials">

<h2 class="section-title">
Customer Reviews
</h2>

<div class="testimonial-container">

<div class="testimonial">
<p>
"The platform helped me access fresh vegetables directly from farmers."
</p>
<h4>- Customer</h4>
</div>

<div class="testimonial">
<p>
"I increased my sales after joining Agri Market."
</p>
<h4>- Farmer</h4>
</div>

<div class="testimonial">
<p>
"Easy to use, reliable and very efficient."
</p>
<h4>- Customer</h4>
</div>

</div>

</section>

<section class="cta">

<h2>
Start Buying Fresh Farm Products Today
</h2>

<p>
Join Tanzania's growing agricultural marketplace.
</p>

<a href="login.php" class="btn">
Get Started
</a>

</section>

<footer>

<p><strong>Agri Market System</strong></p>

<p>Connecting Farmers and Customers Directly</p>

<p>Copyright © 2026 Agri Market | All Rights Reserved</p>

</footer>

</body>
</html>
