const form = document.getElementById("form");
const user = document.getElementById("user").value;
const pass = document.getElementById("password").value;
const get = () => {
  fetch("backEnd/Functions/Login/VerifyUsers.php", {
    method: "POST",
    body: formData,
  })
    .then((res) => res.json())
    .then((data) => {
      if (data === "ok") {
        Swal.fire({
          position: "Center",
          icon: "success",
          title: "Bienvenido",
          showConfirmButton: false,
          timer: 1000,
        });

        setTimeout(function () {
          window.location = "frontEnd/views/Main.php";
        }, 1500);
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "El usuario y/o contraseña invalidos :(",
        });
      }
    });
};

const getData = async (url, method, data) => {
  const location = url;
  const settings = {
    method: method,
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
    body: data,
  };
  try {
    let res = await fetch(location, settings);
    let data = await res.json();
    console.log(data);
  } catch (e) {
    console.log(e);
  }
};
form.addEventListener("submit", (e) => {
  e.preventDefault();
  console.log("me diste un click");
  formData = new FormData(form);
  console.log(user);
  console.log(pass);
  get();
});
