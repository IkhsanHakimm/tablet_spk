document.addEventListener("DOMContentLoaded", function() {
    const faqCards = document.querySelectorAll(".faq__card");
  
    faqCards.forEach(card => {
      card.addEventListener("click", () => {
        const answer = card.querySelector(".faq__answer");
        // Jika jawaban sudah terbuka, tutup semuanya
        if (answer.style.maxHeight) {
          answer.style.maxHeight = null;
          answer.style.opacity = 0;
        } else {
          // Tutup jawaban lain
          faqCards.forEach(otherCard => {
            if (otherCard !== card) {
              const otherAnswer = otherCard.querySelector(".faq__answer");
              if (otherAnswer) {
                otherAnswer.style.maxHeight = null;
                otherAnswer.style.opacity = 0;
              }
            }
          });
          // Buka jawaban yang dipilih
          answer.style.maxHeight = answer.scrollHeight + "px";
          answer.style.opacity = 1;
        }
      });
    });
  });
  