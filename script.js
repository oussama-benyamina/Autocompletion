document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search');
    const suggestionsContainer = document.getElementById('suggestions');

    searchInput.addEventListener('input', debounce(handleInput, 300));

    function handleInput() {
        const query = searchInput.value.trim();
        if (query.length > 0) {
            fetch(`autocomplete.php?search=${encodeURIComponent(query)}`)
                .then(response => response.text())
                .then(data => {
                    suggestionsContainer.innerHTML = data;
                    suggestionsContainer.style.display = 'block';
                })
                .catch(error => {
                    console.error('Error fetching suggestions:', error);
                });
        } else {
            // Show initial suggestions when the input is empty
            fetch('autocomplete.php')
                .then(response => response.text())
                .then(data => {
                    suggestionsContainer.innerHTML = data;
                    suggestionsContainer.style.display = 'block';
                })
                .catch(error => {
                    console.error('Error fetching initial suggestions:', error);
                });
        }
    }

    // Show initial suggestions when the page loads
    handleInput();

    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('suggestion')) {
            searchInput.value = e.target.textContent.trim();
            suggestionsContainer.style.display = 'none';
        } else if (e.target !== searchInput && e.target !== suggestionsContainer) {
            suggestionsContainer.style.display = 'none';
        }
    });

    searchInput.addEventListener('focus', () => {
        if (suggestionsContainer.innerHTML.trim() !== '') {
            suggestionsContainer.style.display = 'block';
        }
    });

    function debounce(func, delay) {
        let timeoutId;
        return function (...args) {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => func.apply(this, args), delay);
        };
    }
});