// document.addEventListener("DOMContentLoaded", function () {
//     function getLastShownTime() {
//         const sessionTime = sessionStorage.getItem('discountPopupLastShown');
//         const localTime = localStorage.getItem('discountPopupLastShown');
//         // Use the most recent timestamp if both exist
//         if (sessionTime && localTime) {
//             return Math.max(Number(sessionTime), Number(localTime));
//         } else if (sessionTime) {
//             return Number(sessionTime);
//         } else if (localTime) {
//             return Number(localTime);
//         }

//         return null;
//     }

//     function setLastShownTime(time) {
//         sessionStorage.setItem('discountPopupLastShown', time);
//         localStorage.setItem('discountPopupLastShown', time);
//     }

//     const THIRTY_MINUTES = 30 * 60 * 1000;
//     const now = Date.now();
//     const lastShown = getLastShownTime();
//     if (!lastShown || now - lastShown > THIRTY_MINUTES) {
//         $(function () {
//             const modalOverlay = $("#modalOverlay");
//             modalOverlay.fadeIn(200);

//             $("#closeBtn, #modalOverlay").on("click", function (e) {
//                 if (this.id === "closeBtn" || (this.id === "modalOverlay" && e.target === this)) {
//                     modalOverlay.fadeOut(200);
//                     setLastShownTime(Date.now());
//                 }
//             });
//         });
//     }
// });
