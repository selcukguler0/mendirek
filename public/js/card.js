window.onload = function () {
  bucket();
  updateTotalPrice();
};

function removeFromCart(id) {
  const card = getCard();
  if (!card) {
    return;
  }
  const cardArray = JSON.parse(card);
  const book = cardArray.find((item) => item.id == id);
  if (!book) {
    return;
  }
  const index = cardArray.indexOf(book);
  cardArray.splice(index, 1);
  setDocumentCookie(cardArray)
  bucket();
  window.location.reload();
}

function removeFromCartMulti(){
  const card = getCard();
  if (!card) {
    return;
  }
  const cardArray = JSON.parse(card);
  const books = document.getElementsByClassName("remove-checkbox");
  for (let i = 0; i < books.length; i++) {
    if(books[i].checked){
      const book = cardArray.find((item) => item.id == books[i].value);
      if (!book) {
        return;
      }
      const index = cardArray.indexOf(book);
      cardArray.splice(index, 1);
    }
  }
  setDocumentCookie(cardArray)
  bucket();
  window.location.reload();
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
  // Encode the book name here
  const name = encodeURIComponent(book.getAttribute("book-name"));
  const price = book.getAttribute("book-price") || 100;
  const image = book.getAttribute("book-img");
  let card = getCard();

  Toastify({
    text: "Kitap sepete eklendi",
    duration: 3000,
  }).showToast();

  if (!card) {
    const book = {
      id,
      name, // This name is now URL encoded
      price,
      image,
      quantity: 1,
      total: price,
    };
    setDocumentCookie([book]);
    bucket();
  } else {
    const cardArray = JSON.parse(card);
    const book = cardArray.find((item) => item.id === id);
    if (book) {
      book.quantity++;
      setDocumentCookie(cardArray)
      bucket();
      return;
    }
    cardArray.push({
      id,
      name, // This name is now URL encoded
      price,
      image,
      quantity: 1,
      total: (price * book?.quantity) | price,
    });
    setDocumentCookie(cardArray)
    bucket();
  }
}


function getCard() {
  let name = "card" + "=";
  let decodedCookie = decodeURIComponent(document.cookie); // This decodes the entire cookie string
  let ca = decodedCookie.split(";");
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      // Decode each book name or the entire card array here if necessary
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
  setDocumentCookie(cardArray)
  bucket();
  updateTotalPrice();
}

//card sayfası toplam fiyatı güncelleme
function updateTotalPrice() {
  const prices = document.getElementsByClassName("book-total-price");
  let totalPrice = 0;
  for (let i = 0; i < prices.length; i++) {
    totalPrice += parseInt(prices[i].innerText);
  }
  if (document.getElementById("total-price")) {
    document.getElementById("total-price").innerText = totalPrice + " ₺";
  }
}

function setDocumentCookie(cardArray) {
  const year = new Date().getFullYear() + 2;
  document.cookie =
    "card=" +
    JSON.stringify(cardArray) +
    `;expires=Thu, 01 Jan ${year} 00:00:00 UTC;path=/;`;
}
