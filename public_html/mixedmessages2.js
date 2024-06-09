let adjectives = []
let nouns = []
let verbs = []
let who = []
let weatherDataKesklinn = []
let weatherDataCuba = []
let weatherDataMustamae = []
let weatherDataTurba = []
const messageBoxRandomSentence = document.getElementById('message')
const messageBoxWeatherDataKesklinn = document.getElementById('weather')
const messageBoxWeatherDataCuba = document.getElementById('weather4')
const messageBoxWeatherDataMustamae = document.getElementById('weather2')
const messageBoxWeatherDataTurba = document.getElementById('weather3')
let responseFromBackend = ''

// eslint-disable-next-line no-unused-vars
async function sendNewWord (theTable, theWord) {
  const formData = new FormData()
  formData.append('table', theTable)
  formData.append('word', theWord)
  const response = await fetch('http://localhost/MixedMessages2/setwords', {
    method: 'POST',
    body: formData
  })
  responseFromBackend = await response.json()
  if (responseFromBackend !== "Don't send empty strings" && responseFromBackend !== 'Duplicate entry') {
    bringWordsAndWeatherData()
  }
  document.getElementById('errorMessage').innerHTML = responseFromBackend
}

async function bringWordsAndWeatherData () {
  const response = await fetch('http://localhost/MixedMessages2/getwords', { method: 'POST' })
  const data = await response.json();

  [adjectives, nouns, verbs, who, weatherDataKesklinn, weatherDataCuba, weatherDataMustamae, weatherDataTurba] = data

  showCurrentWeather()
  calcRandAndShow()
}

function calcRandAndShow () {
  const n = Math.floor(Math.random() * nouns.length)
  const v = Math.floor(Math.random() * verbs.length)
  const a = Math.floor(Math.random() * adjectives.length)
  let n1 = Math.floor(Math.random() * nouns.length)
  while (n1 === n) {
    n1 = Math.floor(Math.random() * nouns.length)
  }
  let a1 = Math.floor(Math.random() * adjectives.length)
  while (a1 === a) {
    a1 = Math.floor(Math.random() * adjectives.length)
  }
  const w = Math.floor(Math.random() * who.length)
  messageBoxRandomSentence.classList.add('message')
  messageBoxRandomSentence.innerHTML = `${who[w]} ${adjectives[a]} ${nouns[n]} is ${verbs[v]} the ${adjectives[a1]} ${nouns[n1]}`
}

function showCurrentWeather () {
  const cardinal = getCardinalDirection(weatherDataKesklinn.wind.deg)
  const cardinal2 = getCardinalDirection(weatherDataCuba.wind.deg)
  const cardinal3 = getCardinalDirection(weatherDataMustamae.wind.deg)
  const cardinal4 = getCardinalDirection(weatherDataTurba.wind.deg)
  messageBoxWeatherDataKesklinn.innerHTML = `<h3>Ilm hetkel<br>${new Date(weatherDataKesklinn.dt * 1000).toLocaleString('et-EE', {
    dateStyle: 'long',
    timeStyle: 'short'
  })}</h3>Asukoht: ${weatherDataKesklinn.name}<br>(<strong>Kesklinn</strong>)<br><br>${weatherDataKesklinn.weather[0].description}<br>Pilvisus:  ${weatherDataKesklinn.clouds.all}%<br><br>P&auml;ike t&otilde;useb:  ${new Date(weatherDataKesklinn.sys.sunrise * 1000).toLocaleString('et-EE', { timeStyle: 'short' })}<br>P&auml;ike loojub:  ${new Date(weatherDataKesklinn.sys.sunset * 1000).toLocaleString('et-EE', { timeStyle: 'short' })}<br><br>Temperatuur:  ${weatherDataKesklinn.main.temp}&#8451<br>Tundub nagu:  ${weatherDataKesklinn.main.feels_like}&#8451<br>Niiskus:  ${weatherDataKesklinn.main.humidity}%<br><br>Tuule kiirus:  ${weatherDataKesklinn.wind.speed} m/s<br>Tuule suund:  ${cardinal}`
  messageBoxWeatherDataCuba.innerHTML = `<h3>Ilm hetkel<br>${new Date(weatherDataCuba.dt * 1000).toLocaleString('et-EE', {
    timeZone: 'Cuba',
    dateStyle: 'long',
    timeStyle: 'short'
  })}</h3>Asukoht: Cuba<br>(<strong>${weatherDataCuba.name}</strong>)<br><br>${weatherDataCuba.weather[0].description}<br>Pilvisus:  ${weatherDataCuba.clouds.all}%<br><br>P&auml;ike t&otilde;useb:  ${new Date(weatherDataCuba.sys.sunrise * 1000).toLocaleString('et-EE', {
    timeZone: 'Cuba',
    timeStyle: 'short'
  })}<br>P&auml;ike loojub:  ${new Date(weatherDataCuba.sys.sunset * 1000).toLocaleString('et-EE', {
    timeZone: 'Cuba',
    timeStyle: 'short'
  })}<br><br>Temperatuur:  ${weatherDataCuba.main.temp}&#8451<br>Tundub nagu:  ${weatherDataCuba.main.feels_like}&#8451<br>Niiskus:  ${weatherDataCuba.main.humidity}%<br><br>Tuule kiirus:  ${weatherDataCuba.wind.speed} m/s<br>Tuule suund:  ${cardinal2}`
  messageBoxWeatherDataMustamae.innerHTML = `<h3>Ilm hetkel<br>${new Date(weatherDataMustamae.dt * 1000).toLocaleString('et-EE', {
    dateStyle: 'long',
    timeStyle: 'short'
  })}</h3>Asukoht: ${weatherDataMustamae.name}<br>(<strong>Mustam&auml;e</strong>)<br><br>${weatherDataMustamae.weather[0].description}<br>Pilvisus:  ${weatherDataMustamae.clouds.all}%<br><br>P&auml;ike t&otilde;useb:  ${new Date(weatherDataMustamae.sys.sunrise * 1000).toLocaleString('et-EE', { timeStyle: 'short' })}<br>P&auml;ike loojub:  ${new Date(weatherDataMustamae.sys.sunset * 1000).toLocaleString('et-EE', { timeStyle: 'short' })}<br><br>Temperatuur:  ${weatherDataMustamae.main.temp}&#8451<br>Tundub nagu:  ${weatherDataMustamae.main.feels_like}&#8451<br>Niiskus:  ${weatherDataMustamae.main.humidity}%<br><br>Tuule kiirus:  ${weatherDataMustamae.wind.speed} m/s<br>Tuule suund:  ${cardinal3}`
  messageBoxWeatherDataTurba.innerHTML = `<h3>Ilm hetkel<br>${new Date(weatherDataTurba.dt * 1000).toLocaleString('et-EE', {
    dateStyle: 'long',
    timeStyle: 'short'
  })}</h3>Asukoht: ${weatherDataTurba.name}<br>(<strong>Turba</strong>)<br><br>${weatherDataTurba.weather[0].description}<br>Pilvisus:  ${weatherDataTurba.clouds.all}%<br><br>P&auml;ike t&otilde;useb:  ${new Date(weatherDataTurba.sys.sunrise * 1000).toLocaleString('et-EE', { timeStyle: 'short' })}<br>P&auml;ike loojub:  ${new Date(weatherDataTurba.sys.sunset * 1000).toLocaleString('et-EE', { timeStyle: 'short' })}<br><br>Temperatuur:  ${weatherDataTurba.main.temp}&#8451<br>Tundub nagu:  ${weatherDataTurba.main.feels_like}&#8451<br>Niiskus:  ${weatherDataTurba.main.humidity}%<br><br>Tuule kiirus:  ${weatherDataTurba.wind.speed} m/s<br>Tuule suund:  ${cardinal4}`
}

function getCardinalDirection (angle) {
  const directions = ['P&#245;hjast', 'Kirdest', 'Idast', 'Kagust', 'L&otilde;unast', 'Edelast', 'L&auml;&auml;nest', 'Loodest']
  return directions[Math.round(angle / 45) % 8]
}

async function checkAuthentication () {
  const response = await fetch('http://localhost/MixedMessages2/checkAuthentication', { method: 'POST' })
  const data = await response.json()

  if (data.isAuthenticated) {
    document.getElementById('logout').style.display = 'inline-block'
  } else {
    document.getElementById('logout').style.display = 'none'
  }
}

// eslint-disable-next-line no-unused-vars
async function logout () {
  const response = await fetch('http://localhost/MixedMessages2/logout', { method: 'POST' })
  const data = await response.json()

  if (data.status === 'success') {
    window.location.href = 'http://localhost/MixedMessages2'
  } else {
    console.error('Logout failed')
  }
}

bringWordsAndWeatherData()
setInterval(calcRandAndShow, 5000)
setInterval(showCurrentWeather, 50000)
checkAuthentication()
