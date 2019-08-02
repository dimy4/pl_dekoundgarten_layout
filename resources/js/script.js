Vue.filter("variationSelectIsDisabled", function (selectedAttributes, attributeId, attributeValueId, variations) {
  const attributes = JSON.parse(JSON.stringify(selectedAttributes));
  attributes[attributeId] = attributeValueId;

  let result = variations.filter(variation => {
    for (let i = 0; i < variation.attributes.length; i++) {
      const id = variation.attributes[i].attributeId;
      const val = variation.attributes[i].attributeValueId;

      if (!!attributes[id] && attributes[id] != val) {
        return false;
      }

      if (attributes[id] && attributes[id] == val && !variation.isSalable) {
        return false;
      }
    }

    return variation.attributes.length > 0;
  });
  return result.length <= 0;
});