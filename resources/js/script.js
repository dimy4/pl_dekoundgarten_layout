function dekoAddToBasket(variationId, qty) {
  const basketObject = {
    variationId: variationId,
    quantity: qty
  };

  window.ceresStore.dispatch("addBasketItem", basketObject).then(
    response => {
      document.dispatchEvent(new CustomEvent("afterBasketItemAdded", {
        detail: basketObject
      }));
    },
    error => {
      if (error.data) {
        window.CeresNotification.error("Failed add to basket.").closeAfter(2000);
      }
    });
}