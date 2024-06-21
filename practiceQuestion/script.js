document.addEventListener("DOMContentLoaded", function() {
  const faqItems = document.querySelectorAll(".faq-item");

  faqItems.forEach(item => {
    const h3 = item.querySelector("h3");
    const icon = item.querySelector(".faq-toggle");

    function toggleFaq() {
      item.classList.toggle("faq-active");
    }

    h3.addEventListener("click", toggleFaq);
    icon.addEventListener("click", toggleFaq);
  });
});
