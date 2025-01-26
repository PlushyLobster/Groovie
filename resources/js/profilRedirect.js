/*** SCRIPT HOME PAGE ***/

const cardLeft = document.getElementById("profilRedirect-cardLeft");
const cardLeftH2 = document.getElementById("hl-h2");
const cardLeftP = document.getElementById("hl-p");
const cardLeftIco = document.getElementById("hl-picto");
const cardLeftArrow = document.getElementById("hl-arrow");

if (window.innerWidth > 500) {
  cardLeft.addEventListener("mouseover", function imgHover() {
    if (cardLeft.style.background.match("var(--GRV_Profil)")) {
      cardLeft.style.background = "var(--GRV_Profil)";
    } else {
      cardLeft.style.background = "url(storage/images/h-img-groovie.jpg)";
      cardLeft.style.backgroundPosition = "center";
      cardLeft.style.backgroundSize = "cover";
      cardLeft.style.backgroundRepeat = "no-repeat";
      cardLeft.style.borderRadius = "39px";
      cardLeftH2.style.color = "var(--whiteBkg)";
      cardLeftP.style.color = "transparent";
      cardLeftIco.style.display = "none";
      cardLeftArrow.style.display = "block";
    }
  });

  cardLeft.addEventListener("mouseout", function imgMouseOut() {
    cardLeft.style.background = "var(--GRV_Profil)";
    cardLeftH2.style.color = "";
    cardLeftP.style.color = "";
    cardLeftIco.style.display = "flex";
    cardLeftArrow.style.display = "none";
  });




const cardMiddle = document.getElementById("profilRedirect-cardMiddle");
const HomeMiddleH2 = document.getElementById("hm-h2");
const HomeMiddleP = document.getElementById("hm-p");
const HomeMiddleIco = document.getElementById("hm-picto");
const HomeMiddleArrow = document.getElementById("hm-arrow");

cardMiddle.addEventListener("mouseover", function imgHover() {
    if (cardMiddle.style.background.match("var(--PRFL_Bkg)")) {
      cardMiddle.style.background = "var(--PRFL_Bkg)";
    } else {
      cardMiddle.style.background = "url(storage/images/h-img-profil.jpg)";
      cardMiddle.style.backgroundPosition = "center";
      cardMiddle.style.backgroundSize = "cover";
      cardMiddle.style.backgroundRepeat = "no-repeat";
      cardMiddle.style.borderRadius = "39px";
      HomeMiddleH2.style.color = "var(--whiteBkg)";
      HomeMiddleP.style.color = "transparent";
      HomeMiddleIco.style.display = "none";
      HomeMiddleArrow.style.display = "block";
    }
  });

  cardMiddle.addEventListener("mouseout", function imgMouseOut() {
    cardMiddle.style.background = "var(--PRFL_Bkg)";
    HomeMiddleH2.style.color = "";
    HomeMiddleP.style.color = "";
    HomeMiddleIco.style.display = "flex";
    HomeMiddleArrow.style.display = "none";
  });





  const cardRight = document.getElementById("profilRedirect-cardRight");
  const HomeRightH2 = document.getElementById("hr-h2");
  const HomeRightP = document.getElementById("hr-p");
  const HomeRightIco = document.getElementById("hr-picto");
  const HomeRightArrow = document.getElementById("hr-arrow");

  cardRight.addEventListener("mouseover", function imgHover() {
    if (cardRight.style.background.match("var(--MFEST_Bkg)")) {
      cardRight.style.background = "var(--MFEST_Bkg)";
    } else {
      cardRight.style.background = "url(storage/images/h-img-fest.jpg)";
      cardRight.style.backgroundPosition = "center";
      cardRight.style.backgroundSize = "cover";
      cardRight.style.backgroundRepeat = "no-repeat";
      cardRight.style.borderRadius = "39px";
      HomeRightH2.style.color = "var(--whiteBkg)";
      HomeRightP.style.color = "transparent";
      HomeRightIco.style.display = "none";
      HomeRightArrow.style.display = "block";
    }
  });

  cardRight.addEventListener("mouseout", function imgMouseOut() {
    cardRight.style.background = "var(--MFEST_Bkg)";
    HomeRightH2.style.color = "";
    HomeRightP.style.color = "";
    HomeRightIco.style.display = "flex";
    HomeRightArrow.style.display = "none";
  });
} else {
  console.log("Ceci ne s'execute pas sur un appareil mobile");
}
