document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search');
    const suggestionsContainer = document.getElementById('suggestions');
    const animalList = document.getElementById('animalList');

    searchInput.addEventListener('input', debounce(handleInput, 300));

    function handleInput() {
        const query = searchInput.value.trim();
        if (query.length > 0) {
            fetch(`autocomplete.php?search=${encodeURIComponent(query)}`)
                .then(response => response.text())
                .then(data => {
                    suggestionsContainer.innerHTML = data;
                    suggestionsContainer.style.display = 'block';
                });
        } else {
            suggestionsContainer.innerHTML = '';
            suggestionsContainer.style.display = 'none';
        }
    }

    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('suggestion')) {
            searchInput.value = e.target.textContent;
            suggestionsContainer.style.display = 'none';
            fetchAnimals(searchInput.value);
        }
    });

    function fetchAnimals(query) {
        fetch(`recherche.php?search=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(animals => {
                animalList.innerHTML = animals.map(animal => `
                    <div class="animal-card">
                        <img src="${animal.photo}" alt="${animal.nom}">
                        <h2>${animal.nom}</h2>
                    </div>
                `).join('');
            });
    }

    function debounce(func, delay) {
        let timeoutId;
        return function (...args) {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => func.apply(this, args), delay);
        };
    }
});