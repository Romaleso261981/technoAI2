document.addEventListener("DOMContentLoaded", function () {
  const filterButtons = document.querySelectorAll(".btn-filter");
  const portfolioItems = document.querySelectorAll(".portfolio-item");
  const noResults = document.querySelector(".no-results");
  const loadMoreBtn = document.getElementById("load-more-portfolio");

  // Фільтрація
  filterButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const filter = this.getAttribute("data-filter");

      // Оновлюємо активну кнопку
      filterButtons.forEach((btn) => btn.classList.remove("active"));
      this.classList.add("active");

      // Фільтруємо роботи
      let visibleCount = 0;
      portfolioItems.forEach((item) => {
        const categories = item.getAttribute("data-category").split(" ");

        if (filter === "all" || categories.includes(filter)) {
          item.style.display = "block";
          visibleCount++;
        } else {
          item.style.display = "none";
        }
      });

      // Показуємо/ховаємо повідомлення про відсутність результатів
      if (visibleCount === 0) {
        noResults.style.display = "block";
      } else {
        noResults.style.display = "none";
      }

      // Оновлюємо кнопку "Завантажити ще"
      if (loadMoreBtn) {
        loadMoreBtn.setAttribute("data-category", filter);
        loadMoreBtn.setAttribute("data-page", "1");
      }
    });
  });

  // Завантаження додаткових робіт
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener("click", function () {
      const currentPage = parseInt(this.getAttribute("data-page"));
      const currentCategory = this.getAttribute("data-category");

      // Тут можна додати AJAX запит для завантаження додаткових робіт
      // loadMorePortfolioWorks(currentPage + 1, currentCategory);

      // Поки що просто оновлюємо лічильник
      this.setAttribute("data-page", currentPage + 1);
    });
  }
})();
