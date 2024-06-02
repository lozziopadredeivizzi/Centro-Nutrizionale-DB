document.addEventListener('DOMContentLoaded', () => {
    const ratingFieldset = document.getElementById("valutazione");
    const radioButtons = ratingFieldset.querySelectorAll("input[type='radio']");
    const labels = ratingFieldset.querySelectorAll("label");
  
    radioButtons.forEach((radio, index) => {
      radio.addEventListener("change", () => {
        labels.forEach((label, i) => {
          label.innerHTML = `<img src="${i <= index ? '../assets/icons/star-fill.svg' : '../assets/icons/star.svg'}" alt="rate ${i + 1}">`;
        });
      });
    });
  });
  