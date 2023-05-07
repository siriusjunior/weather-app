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
