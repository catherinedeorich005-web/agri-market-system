<?php include("db.php"); ?>

<style>
.about-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 70vh;
}

.about-box {
    width: 60%;
    background: white;
    padding: 30px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
}

.about-box h1 {
    color: #2E7D32;
    margin-bottom: 15px;
}

.about-box ul {
    list-style: none;
    padding: 0;
}

.about-box ul li {
    padding: 5px 0;
}

.tagline {
    color: #F9A825;
    font-weight: bold;
    margin-top: 15px;
}
</style>

<div class="about-wrapper">
    <div class="about-box">

        <h1>About Agri Market 🌾</h1>

        <p>
            Agri Market is a digital platform that connects farmers and buyers directly,
            helping improve agricultural trade by removing middlemen and ensuring fair prices.
        </p>

        <h3 style="color:#2E7D32;">Our Mission</h3>
        <p>
            To empower farmers through technology and provide fresh produce to customers at fair prices.
        </p>

        <h3 style="color:#2E7D32;">What We Offer</h3>
        <ul>
            <li>🌱 Fresh farm produce</li>
            <li>💰 Fair pricing system</li>
            <li>🚜 Direct farmer-to-buyer trade</li>
            <li>🔒 Secure transactions</li>
        </ul>

        <div class="tagline">
            Empowering agriculture through technology 🌾
        </div>

    </div>
</div>

