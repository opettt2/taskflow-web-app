import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//OpenWeatherApi
// const apiKey = "c7dd1e6a4a21f769aac71e90cd102d31";
// let city = "Jakarta";
// const api = "https://api.openweathermap.org/data/2.5/weather?q=jakarta&appid=${apiKey}&units=metric";
// let pageData = document.getElementById("data");
// let img = document.getElementById("img");
// function fetchApi(){
//     fetch(api)
//     .then((res)=> res.json())
//     .then((data) => {
//         console.log(data);
//         let temp = Math.round(data.main.temp);
//         let icon = data.weather[0].icon;

//         let iconUrl = `https://openweathermap.org/img/wn/${icon}@4x.png`;   
//         pageData.innerHTML= temp+"°C";
//         img.src=iconUrl;
//     });
// } 

// weather widget
const apiKey = import.meta.env.VITE_OPENWEATHER_KEY || 'c7dd1e6a4a21f769aac71e90cd102d31';
const city = import.meta.env.VITE_OPENWEATHER_CITY || 'Jakarta';

function loadWeather(){
  const tempEl = document.getElementById('weatherTemp');
  const iconEl = document.getElementById('weatherIcon');
  if(!tempEl || !iconEl) return;

  fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`)
    .then(r => r.json())
    .then(d => {
      tempEl.textContent = `${Math.round(d.main.temp)}°C`;
      iconEl.src = `https://openweathermap.org/img/wn/${d.weather[0].icon}@2x.png`;
      iconEl.alt = d.weather[0].description || 'weather';
    })
    .catch(() => { tempEl.textContent = '--°C'; });
}

document.addEventListener('DOMContentLoaded', () => {
  loadWeather();
});