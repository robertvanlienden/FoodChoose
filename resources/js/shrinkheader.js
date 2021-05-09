// // window.onscroll = function() {shrinkHeader()};
//
// window.addEventListener('scroll', _.throttle(shrinkHeader, 1000));
//
// function shrinkHeader() {
//     let headerLogos = document.querySelectorAll(".logo-img");
//     let headerBtns = document.querySelectorAll(".btn-header");
//     console.log(window.scrollY)
//     if (window.scrollY > 50) {
//         if(headerBtns.length > 0){
//             for(i = 0; i < headerBtns.length; i++){
//                 if (headerBtns[i].classList.contains("btn-lg")) {
//                     headerBtns[i].classList.remove("btn-lg");
//                     headerBtns[i].classList.add("btn-sm");
//                 }
//             }
//         }
//         if(headerLogos.length > 0){
//             for(i = 0; i < headerLogos.length; i++){
//                 headerLogos[i].style.height = "75px";
//             }
//         }
//     } else {
//         console.log('else');
//         if(headerBtns.length > 0){
//             for(i = 0; i < headerBtns.length; i++){
//                 if (headerBtns[i].classList.contains("btn-sm")) {
//                     headerBtns[i].classList.remove("btn-sm");
//                     headerBtns[i].classList.add("btn-lg");
//                 }
//             }
//         }
//
//         if(headerLogos.length > 0){
//             for(i = 0; i < headerLogos.length; i++){
//                 headerLogos[i].style.height = "125px";
//             }
//         }
//     }
// }
