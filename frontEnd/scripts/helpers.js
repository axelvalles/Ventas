const toUpperString = function (element) {
  element.value = element.value.toUpperCase();
};

const formatNumberPhone = function (element) {
  element.value = element.value
    //quita carateres que no sean un número
    .replace(/\D/g, "")
    .replace(/([0-9]{4})/, "($1) ");
};

const formatLetter = function (element) {
  element.value = element.value
    //quita carateres que no sean una letra
    .replace(/[^a-zA-Z ]/g, "")
    .toUpperCase();
};
