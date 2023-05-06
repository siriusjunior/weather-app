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

async function toggle(e){
    e.preventDefault();
    const target = e.target;
    const prefectureId = target.dataset.prefectureId;
    try {
        const response = await axios.post(`/likes/${prefectureId}`);
        if (response.status === 200) {
            const countElement = document.querySelector(`.count[data-id="${prefectureId}"]`);
            countElement.textContent = response.data.count;
            target.classList.toggle('fa-solid');
            target.classList.toggle('fa-regular');
        }
    } catch (error) {
        console.error(error);
    }
}

document.querySelectorAll('.like-btn').forEach(btn => {
    btn.addEventListener('click', debouncedToggle);
});
