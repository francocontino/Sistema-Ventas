<!--/html/Login.php-->
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Login</title>
</head>
<style>
    body {
    --main-color: #1f8fc3;
    --color-primary: #009579;
    --color-primary-dark: #1D2231;
    --color-secondary: #252c6a;
    --color-error: #cc3333;
    --color-success: #4bb544;
    --border-radius: 4px;
    --color-back: #f1f5f9;

    margin: 0;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    background: var(--color-back);
}

.container {
    width: 400px;
    max-width: 400px;
    margin: 1rem;
    padding: 2rem;
    box-shadow: 0 0 40px rgba(0, 0, 0, 0.2);
    border-radius: var(--border-radius);
    background: #ffffff;
}

.container,
.form__input,
.form__button {
    font: 500 1rem 'Quicksand', sans-serif;
}

.form--hidden {
    display: none;
}

.form > *:first-child {
    margin-top: 0;
}

.form > *:last-child {
    margin-bottom: 0;
}

.form__title {
    margin-bottom: 2rem;
    text-align: center;
}

.form__message {
    text-align: center;
    margin-bottom: 1rem;
}

.form__message--success {
    color: var(--color-success);
}

.form__message--error {
    color: var(--color-error);
}

.form__input-group {
    margin-bottom: 1rem;
}

.form__input {
    display: block;
    width: 100%;
    padding: 0.75rem;
    box-sizing: border-box;
    border-radius: var(--border-radius);
    border: 1px solid #dddddd;
    outline: none;
    background: #eeeeee;
    transition: background 0.2s, border-color 0.2s;
}

.form__input:focus {
    border-color: var(--color-primary);
    background: #ffffff;
}

.form__input--error {
    color: var(--color-error);
    border-color: var(--color-error);
}

.form__input-error-message {
    margin-top: 0.5rem;
    font-size: 0.85rem;
    color: var(--color-error);
}

.form__button {
    width: 100%;
    padding: 1rem 2rem;
    font-weight: bold;
    font-size: 1.1rem;
    color: #ffffff;
    border: none;
    border-radius: var(--border-radius);
    outline: none;
    cursor: pointer;
    background: var(--main-color);
}

.form__button:hover {
    background: var(--color-primary-dark);
}

.form__button:active {
    transform: scale(0.98);
}

.form__text {
    text-align: center;
}

.form__link {
    color: var(--color-secondary);
    text-decoration: none;
    cursor: pointer;
}

.form__link:hover {
    text-decoration: underline;
}
</style>
<body>
    <div class="container">
        <form class="form" id="loginf" method="post" action="">
            <h1 class="form__title">Login</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" name="nombre" id="nombre" class="form__input" autofocus placeholder="Nombre de Usuario">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" name="passw" id="passw" class="form__input" autofocus placeholder="Contraseña">
                <div class="form__input-error-message"></div>
            </div>
            <input class="form__button" type="submit" id="login" value="Iniciar Sesion">
            <!--<p class="form__text">
                <a href="#" class="form__link">¿Olvidaste tu contraseña?</a>
            </p>-->
        </form>
    </div>
    <script>
        /*function setFormMessage(formElement, type, message) {
    const messageElement = formElement.querySelector(".form__message");

    messageElement.textContent = message;
    messageElement.classList.remove("form__message--success", "form__message--error");
    messageElement.classList.add(`form__message--${type}`);
}

function setInputError(inputElement, message) {
    inputElement.classList.add("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = message;
}

function clearInputError(inputElement) {
    inputElement.classList.remove("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = "";
}

document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login");
    const createAccountForm = document.querySelector("#createAccount");

    document.querySelector("#linkCreateAccount").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.add("form--hidden");
        createAccountForm.classList.remove("form--hidden");
    });

    document.querySelector("#linkLogin").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.remove("form--hidden");
        createAccountForm.classList.add("form--hidden");
    });

    loginForm.addEventListener("submit", e => {
        e.preventDefault();

        // Perform your AJAX/Fetch login

        setFormMessage(loginForm, "error", "Invalid username/password combination");
    });

    document.querySelectorAll(".form__input").forEach(inputElement => {
        inputElement.addEventListener("blur", e => {
            if (e.target.id === "signupUsername" && e.target.value.length > 0 && e.target.value.length < 10) {
                setInputError(inputElement, "Username must be at least 10 characters in length");
            }
        });

        inputElement.addEventListener("input", e => {
            clearInputError(inputElement);
        });
    });
});*/
    </script>
</body>
    <!--<form action="" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre de usuario">
        <br><br>
        <label for="passw">Contraseña: </label>
        <input type="password" name="passw" id="passw" placeholder="Ingrese su contraseña">
        <br><br>

        <input type="submit" value="Iniciar Sesion" id="login">
    </form>-->
