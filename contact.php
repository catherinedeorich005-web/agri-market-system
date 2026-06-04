<?php include("db.php"); ?>

<style>
:root {
  --primary-green: #2E7D32;
  --accent-yellow: #F9A825;
  --white: #FFFFFF;
}

body {
  background: var(--white);
  font-family: Arial, sans-serif;
}

/* Center wrapper */
.contact-wrapper {
  min-height: 80vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px 15px;
}

/* Card box */
.contact-box {
  width: 100%;
  max-width: 500px;
  background: #fff;
  border: 2px solid #eaeaea;
  border-radius: 12px;
  padding: 30px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

/* Title */
.contact-box h2 {
  text-align: center;
  color: var(--primary-green);
  margin-bottom: 10px;
}

.contact-box p {
  text-align: center;
  margin-bottom: 25px;
  color: #666;
}

/* Inputs */
.contact-box input,
.contact-box textarea {
  width: 100%;
  padding: 12px;
  margin-bottom: 15px;
  border: 1px solid #ddd;
  border-radius: 8px;
  outline: none;
  font-size: 14px;
}

.contact-box input:focus,
.contact-box textarea:focus {
  border-color: var(--primary-green);
}

/* Button */
.contact-box button {
  width: 100%;
  padding: 12px;
  background: var(--primary-green);
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s;
}

.contact-box button:hover {
  background: #256428;
}

/* Highlight bar */
.highlight {
  height: 4px;
  width: 60px;
  background: var(--accent-yellow);
  margin: 0 auto 20px auto;
  border-radius: 2px;
}
</style>

<div class="contact-wrapper">
  <div class="contact-box">

    <h2>Contact Us</h2>
    <div class="highlight"></div>
    <p>We’d love to hear from farmers, buyers, and partners.</p>

    <form action="#" method="POST">
      <input type="text" name="name" placeholder="Your Name" required>
      
      <input type="email" name="email" placeholder="Your Email" required>
      
      <input type="text" name="subject" placeholder="Subject" required>
      
      <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
      
      <button type="submit">Send Message</button>
    </form>

  </div>
</div>

