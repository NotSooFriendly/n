<html><head><base href="https://websim.example.com/interactive-home-v17/">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Glassy-Cheeks.com - Interactive Dark Glass Home</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&family=Poppins:wght@300;700&family=Orbitron:wght@400;700&display=swap');

  body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: 'Montserrat', sans-serif;
    background-color: #0a0a0a;
    color: #ffffff;
    overflow: hidden;
  }
  
  .container {
    display: flex;
    flex-direction: column;
    height: 100vh;
    position: relative;
    z-index: 1;
    transition: transform 0.5s ease-in-out;
  }
  
  nav {
    background-color: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 1rem;
    display: flex;
    justify-content: space-around;
    align-items: center;
    position: relative;
    z-index: 2;
  }
  
  nav a {
    color: #ffffff;
    text-decoration: none;
    font-size: 1.2rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: transform 0.3s ease;
  }
  
  nav a:hover {
    transform: scale(1.1);
  }
  
  nav a i {
    font-size: 1.5rem;
    margin-bottom: 0.3rem;
  }
  
  .content {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    perspective: 1000px;
    position: relative;
    z-index: 2;
  }
  
  .glass-container {
    background-color: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 2rem;
    margin: 1rem;
    width: 300px;
    height: 200px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    transition: transform 0.5s ease, box-shadow 0.5s ease;
    animation: float 8s infinite ease-in-out;
    border: 2px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
  }
  
  @keyframes float {
    0%, 100% { transform: translateY(0) rotateX(0) rotateY(0); }
    50% { transform: translateY(-5px) rotateX(1deg) rotateY(1deg); }
  }
  
  .glass-container:hover {
    transform: scale(1.03);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
  }
  
  h2 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    font-weight: 700;
  }
  
  p {
    font-size: 1rem;
    line-height: 1.4;
    font-weight: 300;
  }

  .wave-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 200%;
    z-index: 0;
    pointer-events: none;
    overflow: hidden;
  }

  .wave {
    position: absolute;
    width: 200%;
    height: 50%;
    filter: blur(50px);
  }

  .wave-pink {
    background: radial-gradient(ellipse at center, #ff1493 0%, transparent 70%);
    opacity: 0.7;
    animation: wavePink 20s infinite ease-in-out;
    top: -15%;
  }

  .wave-yellow {
    background: radial-gradient(ellipse at center, #ffff00 0%, transparent 70%);
    opacity: 0.6;
    animation: waveYellow 25s infinite ease-in-out;
    top: 15%;
  }

  @keyframes wavePink {
    0%, 100% { transform: translate(0, 0); }
    25% { transform: translate(-15%, 10%); }
    50% { transform: translate(-25%, 0); }
    75% { transform: translate(-10%, -10%); }
  }

  @keyframes waveYellow {
    0%, 100% { transform: translate(-25%, 0); }
    25% { transform: translate(-10%, -10%); }
    50% { transform: translate(0, 0); }
    75% { transform: translate(-15%, 10%); }
  }

  .streak {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s ease;
  }

  .glass-container:hover .streak {
    left: 100%;
  }

  .glassy-title {
    position: relative;
    width: 100%;
    text-align: center;
    padding: 20px 0;
    font-size: 5.25rem;
    font-family: 'Orbitron', sans-serif;
    color: rgba(255, 255, 255, 0.3);
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    letter-spacing: 2px;
    background: linear-gradient(45deg, rgba(255,255,255,0.1), rgba(255,255,255,0.3));
    background-clip: '';
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    backdrop-filter: blur(5px);
    z-index: 3;
    cursor: pointer;
    transition: transform 0.3s ease, text-shadow 0.3s ease;
  }

  .glassy-title:hover {
    transform: scale(1.05);
    text-shadow: 0 0 15px rgba(255, 255, 255, 0.8), 0 0 25px rgba(255, 255, 255, 0.6);
  }

  .modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
    backdrop-filter: blur(5px);
  }

  .modal-content {
    background-color: rgba(255, 255, 255, 0.1);
    margin: 15% auto;
    padding: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    width: 60%;
    max-width: 500px;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    position: relative;
    animation: modalFadeIn 0.5s;
  }

  @keyframes modalFadeIn {
    from {opacity: 0; transform: translateY(-50px);}
    to {opacity: 1; transform: translateY(0);}
  }

  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
  }

  .close:hover,
  .close:focus {
    color: #fff;
    text-decoration: none;
    cursor: pointer;
  }

  .modal-title {
    font-size: 2rem;
    margin-bottom: 15px;
    color: #fff;
  }

  .modal-text {
    font-size: 1rem;
    line-height: 1.6;
    color: #ddd;
  }

  .login-arrow, .upload-arrow {
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: rotateX(180deg);
    font-size: 2rem;
    color: rgba(255, 255, 255, 0.7);
    cursor: pointer;
    transition: transform 0.3s ease, color 0.3s ease;
    z-index: 100;
  }

  .login-arrow:hover, .upload-arrow:hover {
    color: rgba(255, 255, 255, 1);
  }

  .return-arrow {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: rotateX(180deg);
    font-size: 2rem;
    color: rgba(255, 255, 255, 0.7);
    cursor: pointer;
    transition: transform 0.3s ease, color 0.3s ease;
    z-index: 100;
    display: none;
  }

  .return-arrow:hover {
    color: rgba(255, 255, 255, 1);
  }

  .login-container {
    width: 320px;
    height: 280px;
    padding: 3rem;
    animation: none;
  }

  .login-form input, .login-form button {
    width: 100%;
  }

  .login-form h2 {
    margin-bottom: 2rem;
  }

  .login-form {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 10;
    display: none;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px);
  }

  .login-form input, .upload-section input[type="file"] {
    width: 300px;
    padding: 10px;
    margin: 10px 0;
    border: none;
    border-radius: 5px;
    background-color: rgba(255, 255, 255, 0.1);
    color: white;
    font-size: 1rem;
  }

  .login-form button, .upload-section button {
    width: 300px;
    padding: 10px;
    margin: 10px 0;
    border: none;
    border-radius: 5px;
    background-color: rgba(255, 255, 255, 0.2);
    color: white;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .login-form button:hover, .upload-section button:hover {
    background-color: rgba(255, 255, 255, 0.3);
  }

  .upload-section {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 11;
    display: none;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px);
  }

  .upload-container {
    width: 620px;
    height: 480px;
    padding: 3rem;
    animation: none;
  }

  .container, .login-form, .upload-section {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    transition: transform 0.5s ease-in-out;
  }

  .login-form, .upload-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px);
  }

  .login-form {
    transform: translateY(100%);
  }

  .upload-section {
    transform: translateY(200%);
  }

  .hidden {
    display: none;
  }

  .image-preview {
    width: 210px;
    height: 210px;
    border: 2px dashed rgba(255, 255, 255, 0.3);
    border-radius: 5px;
    margin: 10px auto;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
  }

  .image-preview img {
    max-width: 205px;
    max-height: 205px;
    min-height: 200px;
    min-width: 200px;
    object-fit: contain;
  }

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
  <div class="wave-background">
    <div class="wave wave-pink"></div>
    <div class="wave wave-yellow"></div>
  </div>

  <div class="container">
    <nav>
      <a href="https://websim.example.com/home"><i class="fas fa-home"></i>Home</a>
      <a href="https://websim.example.com/about"><i class="fas fa-info-circle"></i>About</a>
      <a href="https://websim.example.com/portfolio"><i class="fas fa-briefcase"></i>Portfolio</a>
      <a href="https://websim.example.com/contact"><i class="fas fa-envelope"></i>Contact</a>
    </nav>
    <div class="glassy-title" id="glassyTitle">Glassy-Cheeks.com</div>
    <div class="content">
      <div class="glass-container">
        <div class="streak"></div>
        <h2>Welcome</h2>
        <p>Explore our interactive dark-themed home page with smooth wavy pink and yellow background.</p>
      </div>
      <div class="glass-container" style="animation-delay: -2.67s;">
        <div class="streak"></div>
        <h2>Services</h2>
        <p>Discover our range of innovative solutions tailored to your needs.</p>
      </div>
      <div class="glass-container" style="animation-delay: -5.33s;">
        <div class="streak"></div>
        <h2>Latest News</h2>
        <p>Stay updated with our most recent projects and announcements.</p>
      </div>
    </div>
  </div>

  <div id="titleModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2 class="modal-title">Welcome to Glassy-Cheeks.com</h2>
      <p class="modal-text">
        Glassy-Cheeks.com is your premier destination for cutting-edge web design and interactive experiences. 
        Our name reflects our commitment to creating sleek, transparent, and visually stunning digital solutions 
        that leave a lasting impression. Just like our glassy design elements, we aim to provide clarity and 
        depth to your online presence.
      </p>
      <p class="modal-text">
        Explore our site to discover how we can transform your ideas into captivating digital realities. 
        From smooth animations to intuitive user interfaces, we're here to make your web experience truly special.
      </p>
    </div>
  </div>

  <div class="login-arrow" id="loginArrow">
    <i class="fas fa-chevron-up"></i>
  </div>

  <div class="return-arrow hidden" id="returnArrow">
    <i class="fas fa-chevron-down"></i>
  </div>

  <div class="login-form" id="loginForm">
    <div class="glass-container login-container">
      <h2>Login</h2>
      <input type="email" placeholder="Email" required>
      <input type="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </div>
  </div>

  <div class="upload-arrow hidden" id="uploadArrow">
    <i class="fas fa-chevron-up"></i>
  </div>

  <div class="upload-section" id="uploadSection">
  <div class="glass-container upload-container">
    <h2>Upload Image</h2>
    <input type="file" id="fileInput" accept="image/jpeg, image/png">
    <div id="imagePreview" class="image-preview"></div>
    <button id="uploadBtn">Upload</button>
  </div>
</div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const containers = document.querySelectorAll('.glass-container');
      const glassyTitle = document.getElementById('glassyTitle');
      const modal = document.getElementById('titleModal');
      const closeBtn = document.querySelector('.close');
      const loginArrow = document.getElementById('loginArrow');
      const uploadArrow = document.getElementById('uploadArrow');
      const returnArrow = document.getElementById('returnArrow');
      const container = document.querySelector('.container');
      const loginForm = document.getElementById('loginForm');
      const uploadSection = document.getElementById('uploadSection');
      
      containers.forEach(container => {
        let tiltAnimation;
        const streak = container.querySelector('.streak');
        
        container.addEventListener('mousemove', (e) => {
          const rect = container.getBoundingClientRect();
          const x = e.clientX - rect.left;
          const y = e.clientY - rect.top;
          
          const centerX = rect.width / 2;
          const centerY = rect.height / 2;
          
          const angleX = (y - centerY) / 40;
          const angleY = (centerX - x) / 40;
          
          cancelAnimationFrame(tiltAnimation);
          tiltAnimation = requestAnimationFrame(() => {
            container.style.transform = `rotateX(${angleX}deg) rotateY(${angleY}deg) scale(1.03)`;
          });
        });
        
        container.addEventListener('mouseleave', () => {
          cancelAnimationFrame(tiltAnimation);
          container.style.transition = 'transform 0.5s ease';
          container.style.transform = '';
          setTimeout(() => {
            container.style.transition = '';
          }, 500);

          streak.style.transition = 'left 0.5s ease';
          streak.style.left = '-100%';
        });

        container.addEventListener('mouseenter', () => {
          streak.style.transition = 'none';
          streak.style.left = '-100%';
          setTimeout(() => {
            streak.style.transition = 'left 0.5s ease';
            streak.style.left = '100%';
          }, 10);
        });
      });

      glassyTitle.addEventListener('click', () => {
        modal.style.display = 'block';
      });

      closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
      });

      window.addEventListener('click', (event) => {
        if (event.target === modal) {
          modal.style.display = 'none';
        }
      });

      function showSection(section) {
        section.style.display = 'flex';
        setTimeout(() => {
          section.style.transform = 'translateY(0)';
        }, 50);
      }

      function hideSection(section) {
        section.style.transform = '';
        setTimeout(() => {
          section.style.display = 'none';
        }, 500);
      }

      loginArrow.addEventListener('click', () => {
        container.style.transform = 'translateY(-100%)';
        showSection(loginForm);
        loginArrow.style.display = 'none';
        returnArrow.style.display = 'block';
        uploadArrow.style.display = 'block';
      });

      uploadArrow.addEventListener('click', () => {
        loginForm.style.transform = 'translateY(-100%)';
        showSection(uploadSection);
        container.style.transform = 'translateY(-200%)';
        uploadArrow.style.display = 'none';
      });

      returnArrow.addEventListener('click', () => {
        if (uploadSection.style.display !== 'none') {
          hideSection(uploadSection);
          loginForm.style.transform = 'translateY(0)';
          container.style.transform = 'translateY(-100%)';
          uploadArrow.style.display = 'block';
        } else {
          hideSection(loginForm);
          container.style.transform = 'translateY(0)';
          loginArrow.style.display = 'block';
          returnArrow.style.display = 'none';
          uploadArrow.style.display = 'none';
        }
      });
    });

    document.addEventListener('DOMContentLoaded', () => {
  const fileInput = document.getElementById('fileInput');
  const imagePreview = document.getElementById('imagePreview');
  const uploadBtn = document.getElementById('uploadBtn');

  fileInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (file && (file.type === 'image/jpeg' || file.type === 'image/png')) {
      const reader = new FileReader();
      reader.onload = (e) => {
        const img = document.createElement('img');
        img.src = e.target.result;
        imagePreview.innerHTML = '';
        imagePreview.appendChild(img);
      };
      reader.readAsDataURL(file);
    } else {
      imagePreview.innerHTML = 'Please select a valid JPG or PNG image.';
    }
  });

  uploadBtn.addEventListener('click', () => {
    const file = fileInput.files[0];
    if (file && (file.type === 'image/jpeg' || file.type === 'image/png')) {
      const reader = new FileReader();
      reader.onload = (e) => {
        const base64Image = e.target.result.split(',')[1]; // Remove the data:image/jpeg;base64, part
        uploadImageToServer(base64Image);
      };
      reader.readAsDataURL(file);
    } else {
      alert('Please select a valid JPG or PNG image.');
    }
  });

  function uploadImageToServer(base64Image) {
  fetch('/routes/api.php', {  // Make sure this matches your API route
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({ image: base64Image })
  })
  .then(response => {
    if (!response.ok) {
      return response.text().then(text => {
        throw new Error(`HTTP error! status: ${response.status}, message: ${text}`);
      });
    }
    return response.json();
  })
  .then(data => {
    if (data.success) {
      alert('Image uploaded successfully!');
      // Reset the form
      fileInput.value = '';
      imagePreview.innerHTML = '';
    } else {
      throw new Error(data.error || 'Unknown error occurred');
    }
  })
  .catch(error => {
    console.error('Error details:', error);
    alert('An error occurred while uploading the image: ' + error.message);
  });
}
});
  </script>
</body>
</html>