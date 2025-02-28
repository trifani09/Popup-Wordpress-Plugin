document.addEventListener('DOMContentLoaded', function () {
  fetch(popupPluginData.api_url)
    .then((response) => response.json())
    .then((data) => {
      const currentPath = window.location.pathname.replace(/^\/+|\/+$/g, ''); // Hapus '/' di awal & akhir URL

      // Filter pop-up berdasarkan halaman
      const filteredPopups = data.filter(
        (popup) => !popup.page || popup.page === currentPath
      );

      if (filteredPopups.length > 0) {
        let popupHTML = `
            <div id="popup-overlay" style="
                position: fixed; top: 0; left: 0; width: 100%; height: 100%;
                background: rgba(0, 0, 0, 0.5); z-index: 999;">
            </div>
            <div id="popup-container" 
                    style="
                        position: fixed; 
                        top: 50%; 
                        left: 50%; 
                        transform: translate(-50%, -50%);
                        width: 350px; 
                        background: ${
                          popupPluginData.background_color || '#2ECC71'
                        }; 
                        color: white !important; 
                        padding: 20px;
                        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3); 
                        border-radius: 10px;
                        text-align: center; z-index: 1000;">
                <h2 style="margin-top: 0;">${filteredPopups[0].title}</h2>
                <div>${filteredPopups[0].content}</div>
                <button id="close-popup" style="
                    margin-top: 15px; padding: 10px 20px;
                    background: white; color: ${
                      popupPluginData.background_color || '#2ECC71'
                    };
                    border: none;
                    font-weight: bold; cursor: pointer; border-radius: 5px;">
                    Close
                </button>
            </div>
        `;

        document.body.insertAdjacentHTML('beforeend', popupHTML);

        document
          .getElementById('close-popup')
          .addEventListener('click', function () {
            document.getElementById('popup-container').style.display = 'none';
            document.getElementById('popup-overlay').style.display = 'none';
          });

        document
          .getElementById('popup-overlay')
          .addEventListener('click', function () {
            document.getElementById('popup-container').style.display = 'none';
            document.getElementById('popup-overlay').style.display = 'none';
          });
      }
    })
    .catch((error) => console.log('Error fetching popups:', error));
});
