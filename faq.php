<?php
// Include header if your site has one
include('header.php'); 
?>

<div class="faqherosection">
    <div class="contianer">
        <div class="leftcontent">
            <h2>FAQ</h2>
            <p>Get instant answers to your questions about <strong>products, orders, shipping, returns, payments, and account support</strong>. Mobile Shopee’s FAQ section helps you shop with confidence and resolve issues quickly.</p>
        </div>
        <div class="rightcontent">
            <div class="image"><img src="assets/faq/manimage.jpg" alt=""></div>
        </div>
    </div>
</div>

<div class="faq-container" style="font-family: Arial, sans-serif;">
    <h1 style="text-align:center; margin-bottom:30px;">Frequently Asked Questions (FAQ)</h1>

    <div class="faq-item">
        <button class="faq-question">1. How can I check if a product is available?</button>
        <div class="faq-answer">
            <p>You can check product availability directly on the <strong>Mobile Shopee product page</strong>. If the item is in stock, you will see the <strong>“Add to Cart”</strong> or <strong>“Buy Now”</strong> option. Out-of-stock products may show an estimated restock date.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">2. How can I view product specifications?</button>
        <div class="faq-answer">
            <p>Each product page includes complete details such as <strong>brand, model, storage, RAM, display size, battery, camera features, warranty, and price,</strong> helping you make an informed purchase decision.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">3. Do products come with a warranty?</button>
        <div class="faq-answer">
            <p>Yes, most products available on <strong>Mobile Shopee</strong> come with a manufacturer or seller warranty. Warranty duration and terms are clearly mentioned on the product details page.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">4. Can I return or replace a product?</button>
        <div class="faq-answer">
            <p>Yes, eligible products can be returned or replaced within the return window mentioned on the product page. The product must meet the return conditions, such as being unused and in its original packaging.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">5. Will I get accessories with the mobile phone?</button>
        <div class="faq-answer">
            <p>The box contents are listed in the <strong>product description section</strong>. It may include items such as a charger, USB cable, SIM ejector tool, protective case, or user manual depending on the brand.</p>
        </div>
    </div>
    <div class="faq-item">
        <button class="faq-question">6. How do I stop receiving promotional messages?</button>
        <div class="faq-answer">
            <p>You can opt out of promotional emails, SMS, and app notifications at any time by clicking the <strong>unsubscribe link</strong>, changing your <strong>notification preferences</strong>, or updating the settings in your <strong>Mobile Shopee app account</strong>.</p>
        </div>
    </div>
    <div class="faq-item">
        <button class="faq-question">7. How can I access or update my personal information?</button>
        <div class="faq-answer">
            <p>You can easily access and update your personal details by logging into your <strong>Mobile Shopee</strong> account and visiting the <strong>Profile or Account Settings</strong> section. From there, you can edit your name, phone number, email address, delivery addresses, and saved preferences.</p>
        </div>
    </div>
</div>

<!-- JavaScript for accordion -->
<script>
let svgicon = `<svg class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-2c6d" style=""><path d="M8,10.7L1.6,5.3c-0.4-0.4-1-0.4-1.3,0c-0.4,0.4-0.4,0.9,0,1.3l7.2,6.1c0.1,0.1,0.4,0.2,0.6,0.2s0.4-0.1,0.6-0.2l7.1-6
	c0.4-0.4,0.4-0.9,0-1.3c-0.4-0.4-1-0.4-1.3,0L8,10.7z"></path></svg>`;

// Add SVG icon to each question
const faqs = document.querySelectorAll('.faq-question');
faqs.forEach(function(e){
    e.insertAdjacentHTML('beforeend', svgicon);
});

// Accordion functionality: only one open at a time
faqs.forEach(q => {
    q.addEventListener('click', () => {
        const answer = q.nextElementSibling;

        // Close all answers except the one clicked
        document.querySelectorAll('.faq-answer').forEach(a => {
            if(a !== answer) a.style.display = 'none';
        });

        // Toggle clicked answer
        answer.style.display = (answer.style.display === 'block') ? 'none' : 'block';
    });
});
</script>

<?php
// Include footer if your site has one
include('footer.php'); 
?>