document.addEventListener('DOMContentLoaded', function() {
  // ==================== BLOG CONTROLS ====================
  const searchInput = document.getElementById('searchInput');
  const sortDropdown = document.getElementById('sortDropdown');
  const categoryFilter = document.getElementById('categoryFilter');
  const viewToggle = document.querySelectorAll('.fc-view-toggle button');
  const articleGrid = document.getElementById('articleGrid');
  const loadMoreBtn = document.getElementById('loadMoreBtn');
  const loadMoreText = document.getElementById('loadMoreText');
  const loadingSpinner = document.getElementById('loadingSpinner');

  let currentView = 'grid';
  let allArticles = [];
  let page = 2;

  // Sample articles data
  const articlesData = [
    { img: 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400&h=300&fit=crop', title: 'Advanced React Patterns', date: 'Nov 22, 2024', views: 1456, category: 'frontend' },
    { img: 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=400&h=300&fit=crop', title: 'GraphQL Fundamentals', date: 'Nov 20, 2024', views: 2134, category: 'backend' },
    { img: 'https://images.unsplash.com/photo-1516321318423-f06f70259b51?w=400&h=300&fit=crop', title: 'Docker Containerization', date: 'Nov 18, 2024', views: 987, category: 'backend' },
    { img: 'https://images.unsplash.com/photo-1511522860904-a1159a5a68d5?w=400&h=300&fit=crop', title: 'Kubernetes Basics', date: 'Nov 15, 2024', views: 1234, category: 'backend' },
    { img: 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=400&h=300&fit=crop', title: 'Microservices Architecture', date: 'Nov 12, 2024', views: 2567, category: 'web' },
  ];

  // Search functionality
  if (searchInput) {
    searchInput.addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase();
      const cards = articleGrid.querySelectorAll('.article-item');
      
      cards.forEach(card => {
        const title = card.querySelector('h5')?.textContent.toLowerCase() || '';
        card.style.display = title.includes(searchTerm) ? '' : 'none';
      });
    });
  }

  // Sort functionality
  if (sortDropdown) {
    sortDropdown.addEventListener('change', function() {
      const sortType = this.value;
      console.log('Sorting by:', sortType);
    });
  }

  // Category filter
  if (categoryFilter) {
    categoryFilter.addEventListener('change', function() {
      const category = this.value;
      console.log('Filtering by:', category);
    });
  }

  // View toggle
  if (viewToggle.length) {
    viewToggle.forEach(button => {
      button.addEventListener('click', function() {
        viewToggle.forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        currentView = this.dataset.view;

        if (articleGrid) {
          if (currentView === 'list') {
            articleGrid.classList.remove('fc-grid-view');
            articleGrid.classList.add('fc-list-view');
          } else {
            articleGrid.classList.remove('fc-list-view');
            articleGrid.classList.add('fc-grid-view');
          }
        }
      });
    });
  }

  // Load more functionality
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener('click', function() {
      loadMoreBtn.disabled = true;
      loadingSpinner.classList.remove('d-none');
      loadMoreText.textContent = 'Loading...';

      setTimeout(() => {
        articlesData.forEach((article, index) => {
          const articleHTML = `
            <div class="article-item">
              <a href="#" class="fc-article-card">
                <img src="${article.img}" alt="${article.title}" loading="lazy">
                <div class="fc-article-body">
                  <span class="fc-badge">Article</span>
                  <h5>${article.title}</h5>
                  <div class="fc-meta">
                    <div>${article.date}</div>
                    <div>${article.views.toLocaleString()} views</div>
                  </div>
                </div>
              </a>
            </div>
          `;
          articleGrid.insertAdjacentHTML('beforeend', articleHTML);
        });

        loadMoreBtn.disabled = false;
        loadingSpinner.classList.add('d-none');
        loadMoreText.textContent = 'Load More Articles';
        page++;

        if (page > 4) {
          loadMoreBtn.textContent = '✓ No More Articles';
          loadMoreBtn.disabled = true;
        }
      }, 800);
    });
  }

  // Infinite scroll
  window.addEventListener('scroll', function() {
    if (!loadMoreBtn || loadMoreBtn.disabled) return;
    
    const scrollPos = window.innerHeight + window.scrollY;
    const pageHeight = document.documentElement.scrollHeight;
    
    if (scrollPos >= pageHeight - 300) {
      loadMoreBtn.click();
    }
  });
});
