const suggest = document.querySelector('.suggest');
const input = document.querySelector('.input-search');
let debounceTimer = null;

input.addEventListener('input', function () {
    clearTimeout(debounceTimer);
    suggest.innerHTML = '';
    debounceTimer = setTimeout(() => {
        suggestSearch(this.value);
    }, 300);
});

async function suggestSearch(keyword) {
    if (keyword != '') {
        const url = `${root}/api/index/search/${keyword}`;

        const request = await fetch(url);
        const result = await request.json();
        result.forEach(element => {
            const li = document.createElement('li');
            li.classList.add('list-group-item', 'd-flex', 'flex-row', 'justify-content-between', 'row');
            li.innerHTML = `<div class="col-2">
                                <img src="/images/placeholder.png" alt="" width="50" height="50">
                            </div>
                            <div class="col-10">
                                <h5 class="mb-1">${element.title}</h5>
                                <p class="mb-1">${element.author.author_name}</p>
                                <small>Price: ${element.price}</small>
                            </div>`;
            suggest.append(li);
        });
    }
    var instance = new Mark(suggest);
    instance.mark(keyword);
}
