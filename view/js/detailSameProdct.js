document.querySelector(".prevAndNextSameProduct .next").onclick =
  function next() {
    var listSameProduct = document.querySelectorAll(".itemSameCate");
    document
      .querySelector(".listSameCate")
      .appendChild(
        listSameProduct[0],
        listSameProduct[1],
        listSameProduct[2],
        listSameProduct[3]
      );
  };
