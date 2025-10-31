<!DOCTYPE html>
<html lang="sk">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UnitMate - Produkty</title>
  <link rel="stylesheet" href="../css/default.css">
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
  <!-- Navbar -->
  <?php require './header.php'; ?>

  <!-- Products Header -->
  <section class="products-header">
    <h1>Naše produkty</h1>
    <p>Inteligentné riešenia pre váš smart domov</p>
  </section>

  <!-- Search Section -->
  <section class="search-section">
    <div class="search-container">
      <div class="search-box">
        <input type="text" class="search-input" id="searchInput" placeholder="Hľadať produkt...">
        <button class="search-button" onclick="searchProducts()">🔍 Hľadať</button>
      </div>
    </div>
  </section>

  <!-- Products Grid -->
  <section class="products-container">
    <div class="products-grid" id="productsGrid">
      <!-- Products will be populated by JavaScript -->
    </div>
    <div class="no-results" id="noResults" style="display: none;">
      <h2>Žiadne výsledky</h2>
    </div>
  </section>

  <!-- Footer -->
  <?php require './footer.php'; ?>

  <script>
    let products = []; // Global products array

    async function loadProducts() {
      try {
        const response = await fetch('http://localhost/ssostaitchallenge/php/products_json_api.php');
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        products = await response.json();
        renderProducts(products);
      } catch (error) {
        console.error('Error:', error);
        renderProducts([]);
      }
    }

    function searchProducts() {
      const searchInput = document.getElementById('searchInput');
      const searchTerm = searchInput.value.toLowerCase().trim();
      const productCards = document.querySelectorAll('.product-card');
      const noResults = document.getElementById('noResults');
      let hasVisibleProducts = false;

      productCards.forEach(card => {
        const name = card.querySelector('.product-name').textContent.toLowerCase();
        const description = card.querySelector('.product-description').textContent.toLowerCase();

        if (name.includes(searchTerm) || description.includes(searchTerm) || searchTerm === '') {
          card.style.display = 'block';
          hasVisibleProducts = true;
        } else {
          card.style.display = 'none';
        }
      });

      // Show/hide no results message
      const grid = document.getElementById('productsGrid');
      if (!hasVisibleProducts) {
        grid.style.display = 'none';
        noResults.style.display = 'block';
      } else {
        grid.style.display = 'grid';
        noResults.style.display = 'none';
      }
    }

    function renderProducts(productsToRender) {
      const grid = document.getElementById('productsGrid');
      const noResults = document.getElementById('noResults');

      if (!productsToRender || productsToRender.length === 0) {
        grid.style.display = 'none';
        noResults.style.display = 'block';
        return;
      }

      grid.style.display = 'grid';
      noResults.style.display = 'none';

      grid.innerHTML = productsToRender.map(product => `
            <div class="product-card" onclick="goToProductDetail(${JSON.stringify(product).replace(/"/g, '&quot;')})">
                <div class="product-image">
                    <img src="${product.photo_link}" alt="${product.name}">
                </div>
                <div class="product-info">
                    <h3 class="product-name">${product.name}</h3>
                    <p class="product-description">${product.description}</p>
                    <div class="product-price">${product.base_price}€</div>
                    <span class="product-availability ${getAvailabilityClass(product.status)}">
                        ${getAvailabilityText(product.status)}
                    </span>
                </div>
            </div>
        `).join('');
    }

    function getAvailabilityClass(status) {
      status = parseInt(status);
      if (status > 10) return 'available';
      if (status > 0) return 'limited';
      return 'unavailable';
    }

    function getAvailabilityText(status) {
      status = parseInt(status);
      if (status > 10) return 'Skladom';
      if (status > 0) return 'Posledné kusy';
      return 'Vypredané';
    }

    function goToProductDetail(product) {
      // Store product data in sessionStorage
      sessionStorage.setItem('selectedProduct', JSON.stringify(product));
      // Redirect to product detail page
      window.location.href = 'produkt_subsite.html';
    }

    // Add event listeners
    document.addEventListener('DOMContentLoaded', () => {
      loadProducts();
      const searchInput = document.getElementById('searchInput');
      if (searchInput) {
        searchInput.addEventListener('input', searchProducts);
      }
    });
  </script>

  <!-- load shared auth UI script -->
  <script src="js/auth.js"></script>
</body>

</html>