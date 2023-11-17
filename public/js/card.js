// function addToCart(id) {
//     const card = localStorage.getItem('card');
//     if (!card) {
//         localStorage.setItem('card', JSON.stringify([{id: id, quantity: 1}]));
//         bucket();
//     }else {
//         const cardArray = JSON.parse(card);
//         const book = cardArray.find((item) => item.id === id);
//         if (book) {
//             book.quantity++;
//             localStorage.setItem('card', JSON.stringify(cardArray));
//             console.log(localStorage.getItem('card'));

//             bucket();
//             return;
//         }
//         cardArray.push({
//             id: id,
//             quantity: 1
//         });
//         localStorage.setItem('card', JSON.stringify(cardArray));
//     }
//     bucket();
// }

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
    sum += item.quantity;
  });
  if (sum > 9) {
    document.getElementById("bucket").innerText = 9 + "+";
    return;
  }
  document.getElementById("bucket").innerText = sum;
}

window.onload = function () {
  bucket();
};

function addToCart(book) {
  console.log(book);
  const id = book.getAttribute("book-id");
  const name = book.getAttribute("book-name");
  const price = book.getAttribute("book-price") || 100;
  const image = book.getAttribute("book-img");
  let card = getCard();
  if (!card) {
    const book = { id, name, price, image, quantity: 1 };
    document.cookie = "card=" + JSON.stringify([book]) + ";expires=Thu, 01 Jan 2030 00:00:00 UTC;";
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