import axios from 'axios';

// axiosリクエストにCSRFトークン追加
axios.defaults.headers.common["X-CSRF-TOKEN"] = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

const debouncedToggle = debounce(toggle, 300);
    // 300msの間隔を空けて実行
    function debounce(func, wait) {
    let timeout;
    return function (...args) {
        const context = this;
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(context, args), wait);
    };
}

async function toggle(e) {
    // クリックされた要素、もしくはその親要素がハートアイコンである場合のみ、イベントを止める
    const target = e.target.closest('.heart-wrapper');
    if (!target) return;
    e.preventDefault();
    e.stopPropagation();
    const prefectureId = target.dataset.prefectureId;
    const heartIcon = target.querySelector('.like-btn');
    try {
        const response = await axios.post(`/likes/${prefectureId}`);
        if (response.status === 200) {
            const countElement = document.querySelector(`.count[data-id="${prefectureId}"]`);
            countElement.textContent = response.data.count;
            heartIcon.classList.toggle('fa-solid');
            heartIcon.classList.toggle('fa-regular');
        }
    } catch (error) {
        console.error(error);
    }
}

document.querySelectorAll('.heart-wrapper').forEach(wrapper => {
    wrapper.addEventListener('click', debouncedToggle);
});


// サジェスト
const searchForm = document.getElementById('search');
const searchInput = document.getElementById('search-input');
const suggestionsList = document.getElementById('suggestions-list');

searchForm.addEventListener('input', async (e) => {
    const trimQuery = searchInput.value.trim();// 前後の空白を削除
    if(trimQuery.length > 0){
        try {
            const response = await axios.get(`/api/search?query=${trimQuery}`);
            if (response.status === 200) {
                const results = response.data;
                // サジェスト結果を表示する処理を実装してください
                suggestionsList.innerHTML = '';
                suggestionsList.style.display = 'block';
                results.forEach(result => {
                    const list = document.createElement('li');
                    list.textContent = result.name;
                    list.addEventListener('click', ()=>{
                        searchInput.value = result.name;
                        suggestionsList.style.display = 'none';
                    })
                    suggestionsList.appendChild(list);
                })
            }
        } catch (error) {
            console.error(error);
        }
    }else {
        suggestionsList.style.display = 'none';
    }
});
searchInput.addEventListener('blur', async (event) => {
    if(searchInput.value.length < 1){
        suggestionsList.style.display = 'none';
    }
})
