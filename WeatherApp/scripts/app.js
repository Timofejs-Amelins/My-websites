const output = document.getElementById("output");

import * as keys from "apikey.js.gitignore"
const options = {
  method: "GET",
  headers: {
    "X-RapidAPI-Key": keys.key,
    "X-RapidAPI-Host": keys.host,
  },
};

// pass the geolocation to function "displayLocalWeather"
function passGeolocationToFunction() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(displayLocalWeather);
  } else {
    webpage.innerText = "Geolocation not supported";
  }
}

// display 3 day 9am to 5pm forcast for current location
function displayLocalWeather(position) {
  latitude = position.coords.latitude;
  longitude = position.coords.longitude;
  const url = `https://weatherapi-com.p.rapidapi.com/forecast.json?q=${latitude},${longitude}&days=3`;
  fetch(url, options)
    .then((res) => res.json())
    .then((res) => {
      output.innerHTML = `<p class="h2">Current weather in ${res.location.name}</p><ul class="list-group" id="current-local-weather"><li class="list-group-item list-group-item-info"><img src=https:${res.current.condition.icon} alt="Weather condition icon"></li><li class="list-group-item list-group-item-info">${res.current.condition.text}</li><li class="list-group-item list-group-item-info">${res.current.temp_c}°C</li><li class="list-group-item list-group-item-info">Humidity: ${res.current.humidity}%</li></ul>`;
      output.innerHTML += `<div id="three-day-forecast"><p class="h2">3 day forecast for ${res.location.name}</p></div>`;
      threeDayForecast = document.getElementById("three-day-forecast");
      for (const day of res.forecast.forecastday) {
        threeDayForecast.innerHTML += `<p class="h4">Weather forecast for ${new Date(
          day.date
        ).toLocaleDateString(
          "en-GB"
        )}</p><ul class="list-group"><li class="list-group-item list-group-item-info"><img src=https:${day.day.condition.icon
          } alt="Weather condition icon"></li><li class="list-group-item list-group-item-info">${day.day.condition.text
          }</li><li class="list-group-item list-group-item-info">Minimum temperature: ${day.day.mintemp_c
          }°C</li><li class="list-group-item list-group-item-info">Maximum temperature: ${day.day.maxtemp_c
          }°C</li></ul>`;
        threeDayForecast.innerHTML += `<div class="row" id="hourly-forecast-${day.date}"></div>`;
        hourlyForecast = document.getElementById(`hourly-forecast-${day.date}`);
        for (hour = 9; hour <= 17; hour++) {
          hourlyForecast.innerHTML += `<div class="col bg-text-info"><p class="h6">${new Date(
            day.hour[hour].time
          ).toLocaleTimeString(
            "en-GB"
          )}</p><ul class="list-group"><li class="list-group-item list-group-item-info"><img src=https:${day.hour[hour].condition.icon
            } alt="Weather condition icon"></li><li class="list-group-item list-group-item-info">${day.hour[hour].condition.text
            }</li><li class="list-group-item list-group-item-info">${day.hour[hour].temp_c
            }°C</li><li class="list-group-item list-group-item-info">Humidity: ${day.hour[hour].humidity
            }%</li></ul></div>`;
        }
      }
    });
}

passWeatherToGeolocation();
