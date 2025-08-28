/**
 * Portfolio functionality
 * - Filtering by categories
 * - Load more works via AJAX
 */

document.addEventListener("DOMContentLoaded", function () {
  const filterButtons = document.querySelectorAll(".btn-filter");
  const portfolioItems = document.querySelectorAll(".portfolio-item");
  const noResults = document.querySelector(".no-results");
  const loadMoreBtn = document.getElementById("load-more-portfolio");

  // Фільтрація по категоріях
  if (filterButtons.length > 0) {
    filterButtons.forEach((button) => {
      button.addEventListener("click", function () {
        const filter = this.getAttribute("data-filter");

        // Оновлюємо активну кнопку
        filterButtons.forEach((btn) => btn.classList.remove("active"));
        this.classList.add("active");

        // Фільтруємо елементи
        portfolioItems.forEach((item) => {
          if (
            filter === "all" ||
            item.getAttribute("data-category").includes(filter)
          ) {
            item.style.display = "block";
          } else {
            item.style.display = "none";
          }
        });

        // Показуємо/приховуємо повідомлення про відсутність результатів
        const visibleItems = document.querySelectorAll(
          ".portfolio-item[style*='block'], .portfolio-item:not([style*='none'])"
        );
        if (visibleItems.length === 0) {
          noResults.style.display = "block";
        } else {
          noResults.style.display = "none";
        }

        // Оновлюємо кнопку "Завантажити ще" з новою категорією
        if (loadMoreBtn) {
          loadMoreBtn.setAttribute("data-category", filter);
          loadMoreBtn.setAttribute("data-page", "1");
          loadMoreBtn.style.display = "block";
        }
      });
    });
  }

  // Завантаження додаткових робіт
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener("click", function () {
      const currentPage = parseInt(this.getAttribute("data-page"));
      const currentCategory = this.getAttribute("data-category");
      const portfolioContainer = document.querySelector("#portfolio-grid");

      // Показуємо індикатор завантаження
      this.innerHTML =
        '<span class="spinner-border spinner-border-sm me-2"></span>Завантаження...';
      this.disabled = true;

      fetch(
        `${portfolio_ajax.ajax_url}?action=get_portfolio_works&page=${
          currentPage + 1
        }&category=${currentCategory}&nonce=${portfolio_ajax.nonce}`
      )
        .then((response) => response.json())
        .then((data) => {
          console.log(data);

          if (data.success && data.data.works.length > 0) {
            // Додаємо нові роботи до контейнера
            data.data.works.forEach((work) => {
              const workElement = createPortfolioItem(work);
              portfolioContainer.appendChild(workElement);
            });

            // Оновлюємо лічильник сторінки
            this.setAttribute("data-page", currentPage + 1);

            // Приховуємо кнопку, якщо більше немає сторінок
            if (!data.data.has_more) {
              this.style.display = "none";
            }
          }
        })
        .catch((error) => {
          console.error("Error:", error);
          // Показуємо повідомлення про помилку
          alert("Помилка завантаження. Спробуйте ще раз.");
        })
        .finally(() => {
          // Відновлюємо кнопку
          this.innerHTML = "Завантажити ще";
          this.disabled = false;
        });
    });
  }

  // Функція для створення HTML елемента portfolio item
  function createPortfolioItem(work) {
    const div = document.createElement("div");
    div.className = "col-xl-4 col-md-6 portfolio-item";

    // Додаємо категорії для фільтрації
    if (work.categories && work.categories.length > 0) {
      const categorySlugs = work.categories.map((cat) =>
        cat.toLowerCase().replace(/\s+/g, "-")
      );
      div.setAttribute("data-category", categorySlugs.join(" "));
    } else {
      div.setAttribute("data-category", "all");
    }

    div.innerHTML = `
            <div class="portfolio-card">
                <div class="portfolio-image mb-3">
                    <img src="${work.thumbnail || ""}" class="img-fluid" alt="${
      work.title
    }">
                </div>
                <h4 class="portfolio-title">
                    <a href="${work.permalink}">${work.title}</a>
                </h4>
                <p class="portfolio-excerpt">
                    ${work.excerpt || ""}
                </p>
            </div>
        `;

    return div;
  }
});
