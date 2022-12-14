const menu = document.querySelector(".menu");
const menuMain = menu.querySelector(".menu-main");
const goBack = menu.querySelector(".go-back");
const menuTrigger = document.querySelector(".mobile-menu-trigger");
const closeMenu = menu.querySelector(".mobile-menu-close");
let subMenu;
menuMain.addEventListener("click", (e) => {
  if (!menu.classList.contains("active")) {
    return;
  }
  if (e.target.closest(".menu-item-has-children")) {
    const hasChildren = e.target.closest(".menu-item-has-children");
    showSubMenu(hasChildren);
  }
});
goBack.addEventListener("click", () => {
  hideSubMenu();
});
menuTrigger.addEventListener("click", () => {
  toggleMenu();
});
closeMenu.addEventListener("click", () => {
  toggleMenu();
});
document.querySelector(".menu-overlay").addEventListener("click", () => {
  toggleMenu();
});
function toggleMenu() {
  menu.classList.toggle("active");
  document.querySelector(".menu-overlay").classList.toggle("active");
}
function showSubMenu(hasChildren) {
  subMenu = hasChildren.querySelector(".sub-menu");
  subMenu.classList.add("active");
  subMenu.style.animation = "slideLeft 0.5s ease forwards";
  const menuTitle =
    hasChildren.querySelector("i").parentNode.childNodes[0].textContent;
  menu.querySelector(".current-menu-title").innerHTML = menuTitle;
  menu.querySelector(".mobile-menu-head").classList.add("active");
}

function hideSubMenu() {
  subMenu.style.animation = "slideRight 0.5s ease forwards";
  setTimeout(() => {
    subMenu.classList.remove("active");
  }, 300);
  menu.querySelector(".current-menu-title").innerHTML = "";
  menu.querySelector(".mobile-menu-head").classList.remove("active");
}

window.onresize = function () {
  if (this.innerWidth > 991) {
    if (menu.classList.contains("active")) {
      toggleMenu();
    }
  }
};

var tabLinks = document.querySelectorAll(".tablinks");
var tabContent = document.querySelectorAll(".tabcontent");

tabLinks.forEach(function (el) {
  el.addEventListener("click", openTabs);
});

function openTabs(el) {
  var btnTarget = el.currentTarget;
  var country = btnTarget.dataset.country;

  tabContent.forEach(function (el) {
    el.classList.remove("active");
  });

  tabLinks.forEach(function (el) {
    el.classList.remove("active");
  });

  document.querySelector("#" + country).classList.add("active");

  btnTarget.classList.add("active");
}

const qtyInput = document.querySelector("#qty");

const numB = 1;
const numM = 100;
qtyInput.setAttribute("value", numB);
const minnum = qtyInput.setAttribute("min", numB);
let minV = qtyInput.getAttribute("min");
qtyInput.setAttribute("max", numM);
if (qtyInput.value < 1) {
  qtyInput.value = 1;
}
if (minV < 1) {
  document.querySelector("#decrement").disabled = true;
  qtyInput.setAttribute("min", 1);
} else {
  document.querySelector("#decrement").disabled = false;
}

//* set l???i value cho s??? l?????ng s???n ph???m
function stepper(btn) {
  let id = btn.getAttribute("id");
  let min = qtyInput.getAttribute("min");
  let max = qtyInput.getAttribute("max");
  let step = qtyInput.getAttribute("step");
  let value = qtyInput.getAttribute("value");
  let calcDesc = id == "increment" ? step * 1 : step * -1;
  let newValue = parseInt(value) + calcDesc;
  if (newValue >= min && newValue <= max) {
    qtyInput.setAttribute("value", newValue);
    prd_amount = qtyInput.value;
  }

  //* g???i l???i ????? set l???i gi?? tr??? trong onclick
  payBtn();
}
