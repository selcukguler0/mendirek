window.onload = function () {
  bucket();
  updateTotalPrice();
};

function removeFromCart(id) {
  const card = localStorage.getItem("card");
  if (!card) {
    return;
  }
  const cardArray = JSON.parse(card);
  const book = cardArray.find((item) => item.id === id);
  if (!book) {
    return;
  }
  if (book.quantity === 1) {
    const index = cardArray.indexOf(book);
    cardArray.splice(index, 1);
  } else {
    book.quantity--;
  }
  localStorage.setItem("card", JSON.stringify(cardArray));
  console.log(localStorage.getItem("card"));
  bucket();
}

function clearCart() {
  //remove cookie card
  document.cookie = "card=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  bucket();
  window.location.reload();
}

function bucket() {
  const card = getCard();
  if (!card) {
    document.getElementById("bucket").innerText = "0";
    return;
  }
  const cardArray = JSON.parse(card);
  let sum = 0;
  cardArray.forEach((item) => {
    console.log(item.quantity);
    sum += parseInt(item.quantity);
  });
  console.log("bucket", sum);
  if (sum > 9) {
    document.getElementById("bucket").innerText = 9 + "+";
    return;
  }
  document.getElementById("bucket").innerText = sum;
}

function addToCart(book) {
  console.log(book);
  const id = book.getAttribute("book-id");
  const name = book.getAttribute("book-name");
  const price = book.getAttribute("book-price") || 100;
  const image = book.getAttribute("book-img");
  let card = getCard();
  if (!card) {
    const book = {
      id,
      name,
      price,
      image,
      quantity: 1,
      total: price,
    };
    document.cookie =
      "card=" +
      JSON.stringify([book]) +
      ";expires=Thu, 01 Jan 2030 00:00:00 UTC;";
    bucket();
  } else {
    const cardArray = JSON.parse(card);
    const book = cardArray.find((item) => item.id === id);
    if (book) {
      book.quantity++;
      document.cookie = "card=" + JSON.stringify(cardArray);
      bucket();
      return;
    }
    cardArray.push({
      id,
      name,
      price,
      image,
      quantity: 1,
      total: (price * book?.quantity) | price,
    });
    document.cookie = "card=" + JSON.stringify(cardArray);
    bucket();
  }
}

function getCard() {
  let name = "card" + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(";");
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return null;
}

function increaseQuantity(id, e) {
  const card = getCard();
  if (!card) {
    return;
  }
  const cardArray = JSON.parse(card);
  const book = cardArray.find((item) => item.id == id);
  if (!book) {
    return;
  }
  const qunatity = e.value;
  book.quantity = qunatity;

  const totalPriceEl = document.getElementById("total-price-" + id);
  book.total = qunatity * book.price;
  totalPriceEl.innerText = book.total;
  document.cookie = "card=" + JSON.stringify(cardArray);
  bucket();
  updateTotalPrice();
}

//card sayfası toplam fiyatı güncelleme
function updateTotalPrice(){
  const prices = document.getElementsByClassName("book-total-price");
  let totalPrice = 0;
  for(let i = 0; i < prices.length; i++){
    totalPrice += parseInt(prices[i].innerText);
  }
  if (document.getElementById("total-price")) {
    document.getElementById("total-price").innerText = totalPrice + " ₺";
  }
}
