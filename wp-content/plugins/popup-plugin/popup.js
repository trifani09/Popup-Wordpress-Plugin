const { useState, useEffect } = React;

function Popup() {
  const [popups, setPopups] = useState([]);

  useEffect(() => {
    fetch(popupPluginData.api_url)
      .then((response) => response.json())
      .then((data) => setPopups(data))
      .catch((error) => console.error('Error fetching popups:', error));
  }, []);

  if (popups.length === 0) return null;

  return React.createElement(
    'div',
    { className: 'popup-container' },
    popups.map((popup) =>
      React.createElement(
        'div',
        {
          key: popup.id,
          className: 'popup',
          style: { backgroundColor: popupPluginData.background_color },
        },
        React.createElement('h3', null, popup.title),
        React.createElement('div', {
          dangerouslySetInnerHTML: { __html: popup.content },
        })
      )
    )
  );
}

// Render ke halaman
document.addEventListener('DOMContentLoaded', function () {
  const rootElement = document.createElement('div');
  document.body.appendChild(rootElement);
  ReactDOM.createRoot(rootElement).render(React.createElement(Popup));
});
