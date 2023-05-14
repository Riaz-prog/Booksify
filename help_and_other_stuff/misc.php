<?php 
ob_start();
require_once('../Front_page/header.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
if (isset($_SESSION['user_id'])) {
?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      var navlinkfir = $('#navlinkfir');
      if (navlinkfir.length > 0) {
        navlinkfir.html("<a class='nav-link fir' href='../login_join/logout.php' style='display: inline-block;'>Sign Out</a>");
      }
    });
  </script>
<?php
} else {
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var navlinkfir = $('#navlinkfir');
      if (navlinkfir !== null) {
        navlinkfir.html("<a class='nav-link fir' href='../login_join/log_reg.php' style='display: inline-block;'>Sign In/Join</a>");
      }
    });
  </script>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    #hidden-link{
        display:block;
    }
    .hidden{
        display:none;
    }
    .hidden2{
      display:none;
    }
    #search{
      display:none;
    }
    .thirdnav{
        border-bottom:1px solid black;
    }
    #main {
    background-color: #f8f8f8;
    padding: 20px;
    font-family: Arial, sans-serif;
  }

  ul>li {
    margin-right:1rem;
    list-style: none;
    margin-bottom: 10px;
    font-size: 16px;
  }
  h1 {
  padding-left: 1rem;
  font-weight: bold;
  font-style: italic;
  color: #333;
  margin-bottom: 10px;
}

  h4 {
    font-size: 20px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
  }

  .p {
    margin-left:1em;
    margin-right:1rem;
    font-size: 16px;
    line-height: 1.5;
    color: #666;
    margin-bottom: 20px;
  }
        </style>
</head>
<body>
    <div id="main">
<h1 id="terms">Terms of Use</h1>
<p class="p">
        These terms and conditions apply to your use of the website www.Booksify.com, which is owned and operated by Famriazily Ecommerce Factory Pvt. Ltd. These terms apply irrespective of whether you are accessing the website through a computer system, a mobile phone, or an app provided by Booksify.
        These terms define the relationship between Booksify and you, including the terms on which Booksify provides the website as well as the terms on which products are sold on the website. If you do not agree to these terms, you may not use the website or proceed to purchase any product or service being offered on the website.

Nothing in these terms affects your statutory rights, either as a consumer or otherwise.
</p><ol>
<li><h4>Your Profile</h4></li>
    <ul>
        <li>It is necessary for you to complete your registration before you can purchase any products from our website. You may register with us and buy products from our website only if your membership has not been previously barred or suspended by Booksify.</li>
        <li>The confidentiality of your account is your own responsibility. Preventing unauthorized access and protecting your account username and password is in the user's hands. You are urged to inform Booksify in case of any suspicious activity or if you have reason to believe that your account information has been made known to someone else.</li>

<li>By providing information on the website, you warrant that the information provided by you is accurate and complete. You also agree that you will notify Booksify of any changes in your email, contact number, or postal address in a timely manner. You can update this information in the "My Account" section of our website.</li>

<li>There is no charge for registering on our website or for browsing through it, although you will have to pay for the products you purchase and the taxes or delivery charges associated with that purchase.</li>
</ul>

<li><h4 id="order">Orders and Payment</h4></li>
<ul>
  <li>When you place an order to purchase a product, we collect personal and transactional data from you, such as your name, address, contact information, and card details. For more information about how we use this data, please refer to our Privacy Policy.</li>
  <li>We accept payment for products using credit and debit cards only. Cheques, COD, and other payment methods are not accepted on our website.</li>
  <li>If you pre-order a product, simply add it to your cart and proceed to checkout to complete the transaction. You will receive an order confirmation once your transaction is complete, and your product will be shipped to you as soon as it becomes available in our stock.</li>
  <li>Booksify accepts orders subject to product availability. If the product you ordered is not available, we will offer you a product of similar value or a full refund.</li>
  <li>All products are invoiced in INR at the prevailing price at the time of purchase. We do our best to keep prices on the site up-to-date, but in case of any discrepancy, we will contact you to confirm the correct price. If we are unable to reach you, your order will be canceled due to incorrect pricing.</li>
  <li>When you order products from our website, you are responsible for all associated costs, such as shipping costs. If the issuer of your credit or debit card declines payment authorization, we will cancel your order and contact you to set up an alternative payment method. We are not responsible for any delays caused by payment authorization issues.</li>
  <li>It is your responsibility to keep track of your order.</li>
  <li>Booksify will not be liable for any losses you incur due to unauthorized access to the personal or transactional information you provide while placing an order, unless it is due to fraudulent or negligent behavior on our part.</li>
  <li>We reserve the right to cancel any order, fully or partially, that contains more than two quantities of the same item.</li>
  <li>If you are under 18, you acknowledge that you have parental or guardian permission to use this website and purchase products.</li>
  <li>Booksify reserves the right to limit selected promotional orders to a maximum of two units per order.</li>
</ul>

<li><h4>Cancellations, Exchanges, and Refunds</h4></li>
<ul>
<li>If you wish to cancel your order, please contact Booksify customer service. While we will do our best to assist you, it may not be possible to cancel your order if it has already been shipped.</li>

<li>If you receive an incorrect or damaged product, please notify our customer service within 72 hours of delivery, and we will send you the correct item.</li>

<li>Booksify reserves the right to refuse any refund if it is evident that the product has been used.</li>

<li>All pre-order transactions are final and not eligible for exchange or refund.</p>
</ul>
<li><h4>Delivery</h4></li>
<ul>
  <li>Deliveries are made all week except national holidays through third party service providers appointed by Booksify.</li>
  <li>If you do not receive your package within the specified time, please contact our customer service with the order reference number.</li>
  <li>When you sign for the delivered product, our responsibility towards the order ends there and the ownership of the product passes on to you.</li>
  <li>We will not be liable for any loss, damage, or breakage that takes place after the completion of delivery.</li>
  <li>If you are not present at the time of delivery, Booksify will assume that any adult at the provided address has been authorized to accept the orders on your behalf.</li>
  <li>Please note that our delivery personnel will deliver your products at your front door only.</li>
</ul>

<li><h4 >Orders and Delivery Outside of India</h4></li>
<ul>
  <li>Booksify offers worldwide shipping.</li>
  <li>If you are using foreign debit or credit cards to make a purchase on our website, banks may levy some additional charges as per their conversion rates.</li>
  <li>These additional charges are not a responsibility of Booksify.</li>
</ul>

<li><h4>Prices</h4></li>
<ul>
  <li>The prices that we post on this website can be changed without any notice.</li>
  <li>The prices at the time of the order will be considered during the payment process.</li>
  <li>The prices that are posted also include charges and taxes.</li>
  <li>In case, if there are any additional charges, it will be notified on the website.</li>
</ul>

<li><h4>Use of The Website</h4></li>
<ul>
  <li>Booksify tries to ensure that all the information provided on the website is accurate but that might not be the case at times.</li>
  <li>You should independently check the information you are using on our website and access the Website on your own risk.</li>
  <li>If you find any incorrect information, you should notify the same by reaching us via phone or email.</li>
  <li>Users should not use the website for promoting or conducting any illegal activities.</li>
  <li>This may include any activities that breach copyright, infringe on privacy, violate any third party rights, or are defamatory in nature.</li>
  <li>To do so may lead to persecution.</li>
  <li>You must not use this website to generate unsolicited emails, promotional materials, or spam to other users.</li>
  <li>You must not do anything that would cause harm to the website or any internal damage to other computers.</li>
  <li>You must not send any viruses or other material designed to adversely affect the operations of the website, the users accessing the website, or to affect any data present on the website.</li>
  <li>You must not interfere with the security of the website, its services, network, or system resources.</li>
  <li>You must not use the website in any manner which would result in overburden or impairment.</li>
  <li>Harvesting or otherwise collecting information is also prohibited.</li>
  <li>You must not hyperlink or frame Booksify without gaining prior written consent.</li>
  <li>You must not commercialize or charge third parties for accessing the website.</li>
  <li>You must not produce the content of this website anywhere else in any form.</li>
  <li>It is illegal to place orders under a fake name or using a card of someone else without their consent.</li>
  <li>
</ul>

<li><h4 id="policy">Booksify Terms and Conditions</h4></li>
<ul>
  <li>You agree to comply with all legal requirements of the jurisdiction in which you are located with regard to your use of the Website, and you acknowledge that you are entirely responsible for ensuring your own familiarity with such requirements and your own compliance with these requirements.</li>
  <li>Members of the public are able to post comments, information and other material (“User Content”) on the Website. You must not post User Content that is offensive, indecent or objectionable or which denigrates any person or entity within the Website. You understand that the person who submits User Content is responsible for that User Content. In the same way, you are entirely responsible for the User Content that you make available to or through the Website. Booksify is not liable for any User Content. Booksify has the right (but not the obligation) to refuse, edit or remove any User Content.</li>
  <li>Whilst Booksify intends to refuse, edit, or remove any User Content that is offensive, indecent or objectionable, Booksify may not do so before you are exposed to such User Content. Please notify Booksify if you find User Content that is offensive, indecent or objectionable.</li>
  <li>Booksify does not and cannot guarantee the accuracy, integrity or quality of User Content. Additionally, Booksify is not liable for any loss or damage that you suffer because of your use of or reliance on the User Content. User Content may not be accurate – please make your own enquiries before relying on any User Content.</li>
  <li>Once you submit User Content to the Website, you grant Booksify a worldwide, royalty-free and non-exclusive license to use, exploit and modify the User Content in any way in all media. Amongst other things, it may be included within the Website.</li>
  <li>Any losses that you or any third party suffers due to Booksify breaching these terms are not a responsibility of Booksify, even when these losses were foreseeable to both you and Booksify at the time of formation of sale contract (which is formed when Booksify sends you a confirmation email).</li>
  <li>Booksify tries to ensure that the website is safe to use at all times, but we do not warrant that this website is virus free, or free from anything which may cause harm to any technology. It is your responsibility to install precautionary virus protection on your device for safeguarding. Booksify is not liable for any damage or loss caused by a virus or anything else that may cause harm to your equipment or data while using the website.</li>
  <li>While we also try to ensure that our website is constantly available, it does not warrant that this website will always be available or that it will always operate in an uninterrupted manner. Due to problems in the internet, mobile connectivity or operation of mobile applications, outages may occur. Booksify may also need to restrict access to perform maintenance, repairs, or to introduce new facilities from time to time.</li>
  <li>Booksify does not accept any liability for any content posted on the website by any third party or for the promotion of any third party.</li>
  <li>Your Booksify account may be suspended or terminated if:</li>
  <ul>
    <li>You breach these terms or other terms laid out by Booksify.</li>
    <li>Booksify has reason to suspect that you might commit a breach of these terms.</li>
    <li>You engage in any activity that is against the law.</li>
    <li>You do anything that adversely affects Booksify’s business or reputation.</li>
    <li>Booksify has reason to believe that you are a fraud risk, are operating multiple accounts, using proxy IP addresses to hide the use of multiple accounts; or</li>
<li>Booksify considers it necessary for the protection of the website or the users of the website.</li>
<li>The users can deregister their account and stop the use of website at any time. Booksify will keep your account with all its content in an inactive mode before it is deleted due to long periods of inactivity. Once deleted, no data will be recoverable and Booksify will have no liability or responsibility for this.</li>
</ul>

<li><h4>Terms and Conditions</h4></li>

<ul>
  <li><strong>Force Majeure:</strong> Neither party will be liable to the other under these Terms or any other agreement between the parties, for any loss or damage which may be suffered by the other party due to any cause beyond the first party’s reasonable control including without limitation any act of God, exceptionally severe weather, failure of shortage of power supplies, flood, drought, lightning or fire, strike, lock-out, trade dispute or labor disturbance (other than those of the parties), the act or omission of government, highways authorities, other telecommunications operators or administrators or other competent authority, war, military operations, acts of terrorism or riot, royal demise etc.</li>
  
  <li><strong>Electronic Communication:</strong> Booksify may send you promotional emails. You can discontinue these by opting out of our promotional emailer and newsletter services.</li>
  
  <li><strong>Intellectual Property Rights:</strong> All the content (graphics, text, button icons, logos, digital downloads, audio clips, etc.) on the website is protected by copyright, trademark and other intellectual property rights. Booksify retains all rights in such content. This website may only be accessed for personal uses. Any use of the website for commercial purposes, including advertising purposes or for revenue generation activity is prohibited. You may not transmit, copy, modify, publish, display, distribute, license, reproduce, commercially exploit, perform, transfer, create derivative works from or sell any content or software contained within the website. The graphics, page headers, logos, icons, scripts are trademarks of the site. These trademarks should not be used in relation to products and services that are not associated with Booksify.</li>
  
  <li><strong>Governing Law and Jurisdiction:</strong> The above mentioned terms and conditions will be in use in accordance with the Indian laws. If there are matters of disputed from it related to the terms and conditions of the website, the competent Courts at Delhi, Delhi will have the complete jurisdiction for the matter and all the other courts will be excluded.</li>
  
  <li><strong>Policies of the Site, Modification, and Severability:</strong> You should review our other policies, as well. We have the right to make any change in our website, the terms and conditions and the policies at any point of time.</li>
</ul>
</ol>
<h1 id="privacy">Privacy Policy</h1>
<ul>
<li>Booksify is committed to protecting the privacy of its users. We collect personal and transactional information from our users in order to provide them with the products they need and to ensure that their shopping experience is smooth and hassle-free.</li>

<li>The information we collect includes but is not limited to your name, address, contact information, card information, and browsing behavior on our website. We use this information to process your orders, personalize your shopping experience, and improve our services. We do not sell, rent or share your personal information with any third party without your prior consent.</li>

<li>We may use cookies to track your browsing behavior and to personalize your shopping experience on our website. You can disable cookies on your browser, but this may affect your user experience on our website.</li>

<li>We may use your contact information to send you promotional emails and newsletters about our products and services. If you do not wish to receive these emails, you can unsubscribe at any time by clicking on the “unsubscribe” link provided in the email.</li>

<li>We take all necessary measures to ensure the security of your personal and transactional information. We use industry-standard encryption protocols to protect your data from unauthorized access or disclosure. However, we cannot guarantee the security of your data transmitted over the internet, and you transmit it at your own risk.</li>

<li>We may disclose your personal information to law enforcement agencies, regulatory bodies, or other third parties if we are required to do so by law or if we believe that such disclosure is necessary to protect our rights, property, or safety or that of our customers or others.</li>

<li>We reserve the right to modify or update this Privacy Policy from time to time. We encourage you to review this policy periodically for any changes. Your continued use of our website after any modifications to this policy will constitute your acceptance of such modifications.</li>
</ul>
<h1 id="AboutUs">About Us</h1>
<ul>
<li>Dear readers,</li>

<li>Welcome to Booksify, your ultimate destination for an extensive collection of books spanning various genres such as Fiction, Non-fiction, Biographies, History, Religion, Self-Help, and more. Immerse yourself in the world of knowledge and adventure with our diverse selection of books.</li>

<li>At Booksify, we are committed to ensuring your utmost satisfaction. Our user-friendly search engine empowers you to find the perfect book with ease. We offer seamless payment options and efficient delivery systems, ensuring that your reading journey is hassle-free from start to finish.</li>

<li>To enhance your shopping experience, we are delighted to present you with exclusive deals and discounts on our products. Dive into the realm of imagination and expand your horizons without breaking the bank.</li>

<li>We also extend an open invitation to all Publishers, Distributors, and Authors across the country to join our ever-growing Booksify family. Together, let's foster a community of literary enthusiasts and elevate the joy of reading.</li>

<li>We sincerely appreciate our valued customers for choosing to shop with us. Your support means the world to us. Please feel free to reach out to us via email to share any suggestions or feedback you may have regarding our website or services. We are committed to continually improving and catering to your needs.</li>

<li>Thank you for being a part of Booksify, where the magic of words awaits.</li>

<li>Warm regards,</li>
<li>The Booksify Team</li>
</ul>
</div>
<?php require_once('../Front_page/footer.php');?>
</body>
</html>