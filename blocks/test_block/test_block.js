const blockButtonEl = document.getElementById("block-button");
const blockEl = document.querySelector(".block-js");

if (blockButtonEl) {
  blockButtonEl.addEventListener("click", (e) => {
    e.preventDefault;
    blockEl.classList.toggle("active");
  });
}
